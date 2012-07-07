<?php
//-- 個別の村情報の基底クラス --//
class Room{
  public $id;
  public $name;
  public $comment;
  public $game_option = '';
  public $option_role = '';
  public $date;
  public $scene;
  public $status;
  public $system_time;
  public $sudden_death;
  public $view_mode        = false;
  public $dead_mode        = false;
  public $heaven_mode      = false;
  public $log_mode         = false;
  public $watch_mode       = false;
  public $single_log_mode  = false;
  public $single_view_mode = false;
  public $personal_mode    = false;
  public $test_mode        = false;

  function __construct($request = null, $lock = false){
    if (is_null($request)) return;
    if ($request->IsVirtualRoom()) {
      $stack = $request->TestItems->test_room;
    }
    else {
      $stack = $this->LoadRoom($request->room_no, $lock);
    }
    foreach ($stack as $name => $value) $this->$name = $value;
    $this->ParseOption();
  }

  //指定した部屋番号の DB 情報を取得する
  function LoadRoom($room_no, $lock = false){
    $query = 'SELECT room_no AS id, name, comment, game_option, status, date, scene, ' .
      'vote_count, revote_count, scene_start_time FROM room WHERE room_no = ' . $room_no;
    if ($lock) $query .= ' FOR UPDATE';
    $stack = FetchAssoc($query, true);
    if (count($stack) < 1) OutputActionResult('村番号エラー', '無効な村番号です: ' . $room_no);
    return $stack;
  }

  //option_role を追加ロードする
  function LoadOption(){
    global $RQ_ARGS;

    $option_role = $RQ_ARGS->IsVirtualRoom() ? $RQ_ARGS->TestItems->test_room['option_role'] :
      FetchResult($this->GetQueryHeader('room', 'option_role'));
    $this->option_role = new OptionParser($option_role);
    $this->option_list = array_merge($this->option_list, array_keys($this->option_role->options));
  }

  //発言を取得する
  function LoadTalk($heaven = false){
    global $GAME_CONF, $RQ_ARGS;

    if ($RQ_ARGS->IsVirtualRoom()) return $RQ_ARGS->TestItems->talk;

    $select = 'scene, location, uname, action, sentence, font_type';
    switch ($this->scene) {
    case 'beforegame':
      $table = 'talk_' . $this->scene;
      $select .= ', handle_name, color';
      break;

    case 'aftergame':
      $table = 'talk_' . $this->scene;
      break;

    default:
      $table = 'talk';
      if ($this->log_mode) $select .= ', role_id';
      break;
    }

    if ($heaven) {
      $table = 'talk';
      $scene = 'heaven';
    }
    else {
      $scene = $this->scene;
    }

    $query = "SELECT {$select} FROM {$table}" . $this->GetQuery(! $heaven) .
      " AND scene = '{$scene}' ORDER BY id DESC";
    if (! $this->IsPlaying()) $query .= ' LIMIT 0, ' . $GAME_CONF->display_talk_limit;
    return FetchObject($query, 'Talk');
  }

  //シーンに合わせた投票情報を取得する
  function LoadVote($kick = false){
    global $RQ_ARGS;

    if ($RQ_ARGS->IsVirtualRoom()) {
      if (is_null($vote_list = $RQ_ARGS->TestItems->vote->{$this->scene})) return null;
    }
    else {
      $action = "scene = '{$this->scene}' AND vote_count = {$this->vote_count}";
      switch ($this->scene) {
      case 'beforegame':
      case 'night':
	$data = 'user_no, target_no, type';
	break;

      case 'day':
	$data = 'user_no, target_no, vote_number';
	//$action .= " AND revote_count = {$this->revote_count}"; //vote_count だけで一意のはず
	break;

      default:
	return null;
      }
      $query = "SELECT {$data} FROM vote {$this->GetQuery()} AND {$action}";
      $vote_list = FetchAssoc($query);
    }

    //PrintData($vote_list);
    $stack = array();
    switch ($this->scene) {
    case 'beforegame':
      $type = $kick ? 'KICK_DO' : 'GAMESTART';
      foreach ($vote_list as $list) {
	if ($list['type'] != $type) continue;
	if ($kick) {
	  $stack[$list['user_no']][] = $list['target_no'];
	}
	else {
	  $stack[] = $list['user_no'];
	}
      }
      break;

    case 'day':
      foreach ($vote_list as $list) {
	$id = $list['user_no'];
	unset($list['user_no']);
	$stack[$id] = $list;
      }
      break;

    case 'night':
      foreach ($vote_list as $list) {
	$id = $list['user_no'];
	unset($list['user_no']);
	$stack[$id][] = $list;
      }
      break;
    }

    $this->vote = $stack;
    return count($this->vote);
  }

  //特殊イベント判定用の情報を DB から取得する
  function LoadEvent(){
    global $RQ_ARGS;

    if (! $this->IsPlaying()) return null;
    $this->event = new StdClass();
    if ($this->test_mode) {
      $stack = array();
      foreach ($RQ_ARGS->TestItems->system_message as $date => $date_list) {
	if ($date != $this->date) continue;
	//PrintData($date_list, $date);
	foreach ($date_list as $type => $type_list) {
	  switch ($type){
	  case 'WEATHER':
	  case 'EVENT':
	  case 'SAME_FACE':
	  case 'VOTE_DUEL':
	  case 'BLIND_VOTE':
	    foreach ($type_list as $event) {
	      $stack[] = array('type' => $type, 'message' => $event);
	    }
	    break;
	  }
	}
      }
      $this->event->rows = $stack;
      return;
    }
    $type_list = array("'WEATHER'", "'EVENT'", "'BLIND_VOTE'", "'SAME_FACE'");
    if ($this->IsDay()) $type_list[] = "'VOTE_DUEL'";
    $query = $this->GetQueryHeader('system_message', 'type', 'message') .
      " AND date = '{$this->date}' AND type IN (" . implode(',', $type_list) . ")";
    $this->event->rows = FetchAssoc($query);
  }

  //天候判定用の情報を DB から取得する
  function LoadWeather($shift = false){
    global $RQ_ARGS;

    if (! $this->IsPlaying()) return null;
    $date = $this->date;
    if (($shift && $RQ_ARGS->reverse_log) || $this->IsAfterGame()) $date++;
    $query = $this->GetQueryHeader('system_message', 'message') .
      " AND date = {$date} AND type = 'WEATHER'";
    $result = FetchResult($query);
    $this->event->weather = $result === false ? null : $result; //天候を格納
  }

  //勝敗情報を DB から取得する
  function LoadWinner(){
    global $RQ_ARGS;

    if (! isset($this->winner)) { //未設定ならキャッシュする
      $this->winner = $this->test_mode ? $RQ_ARGS->TestItems->winner :
	FetchResult($this->GetQueryHeader('room', 'winner'));
    }
    return $this->winner;
  }

  //player 情報を DB から取得する
  function LoadPlayer(){
    $query = 'SELECT id AS role_id, date, scene, user_no, role FROM player' .
      $this->GetQuery(false);
    $result = new StdClass();
    foreach (FetchAssoc($query) as $stack) {
      extract($stack);
      $result->roles[$role_id] = $role;
      $result->users[$user_no][] = $role_id;
      $result->timeline[$date][$scene][] = $role_id;
    }
    //PrintData($result);
    return $result;
  }

  //投票情報をコマンド毎に分割する
  function ParseVote(){
    $stack = array();
    foreach ($this->vote as $id => $vote_stack){
      if ($this->IsDay()){
	$stack[$vote_stack['type']][$id] = $vote_stack['target_no'];
      }
      else {
	foreach ($vote_stack as $list) $stack[$list['type']][$id] = $list['target_no'];
      }
    }
    return $stack;
  }

  //ゲームオプションの展開処理
  function ParseOption($join = false){
    $this->game_option = new OptionParser($this->game_option);
    $this->option_role = new OptionParser($this->option_role);
    $this->option_list = $join ?
      array_merge(array_keys($this->game_option->options),
		  array_keys($this->option_role->options)) :
      array_keys($this->game_option->options);

    if ($this->IsRealTime()){
      $this->real_time = new StdClass();
      $this->real_time->day   = $this->game_option->options['real_time'][0];
      $this->real_time->night = $this->game_option->options['real_time'][1];
    }
  }

  //今までの投票を全部削除
  function DeleteVote(){
    if (is_null($this->id)) return true;

    $query = 'DELETE FROM vote' . $this->GetQuery();
    if ($this->IsDay()) {
      $query .= " AND type = 'VOTE_KILL' AND revote_count = " . $this->revote_count;
    }
    elseif ($this->IsNight()) {
      if ($this->date == 1) {
	$query .= " AND type NOT IN ('CUPID_DO', 'DUELIST_DO')";
      }
      else {
	$query .= " AND type NOT IN ('VOTE_KILL')";
      }
    }
    SendQuery($query);
    OptimizeTable('vote');
    return true;
  }

  //共通クエリを取得
  function GetQuery($date = true, $count = null){
    $query = (is_null($count) ? '' : 'SELECT COUNT(uname) FROM ' . $count) .
      ' WHERE room_no = ' . $this->id;
    return $date ? $query . ' AND date = ' . $this->date : $query;
  }

  //共通クエリヘッダを取得
  function GetQueryHeader($data){
    $stack = func_get_args();
    $from = array_shift($stack);
    return 'SELECT ' . implode(', ', $stack) . ' FROM ' . $from . $this->GetQuery(false);
  }

  //特殊イベント判定用の情報を取得する
  function GetEvent($force = false){
    if (! $this->IsPlaying()) return array();
    if ($force || ! isset($this->event)) $this->LoadEvent();
    return $this->event->rows;
  }

  //特殊オプションの配役データ取得
  function GetOptionList($option){
    global $CAST_CONF;
    return $this->IsOption($option) ?
      $CAST_CONF->{$option.'_list'}[$this->option_role->options[$option][0]] : array();
  }

  //オプション判定
  function IsOption($option){ return in_array($option, $this->option_list); }

  //オプショングループ判定
  function IsOptionGroup($option){
    foreach ($this->option_list as $this_option) {
      if (strpos($this_option, $option) !== false) return true;
    }
    return false;
  }

  //リアルタイム制判定
  function IsRealTime(){ return $this->IsOption('real_time'); }

  //身代わり君使用判定
  function IsDummyBoy(){ return $this->IsOption('dummy_boy'); }

  //クイズ村判定
  function IsQuiz(){ return $this->IsOption('quiz'); }

  //村人置換村グループオプション判定
  function IsReplaceHumanGroup(){
    return $this->IsOption('replace_human') || $this->IsOptionGroup('full_');
  }

  //闇鍋式希望制オプション判定
  function IsChaosWish(){
    return $this->IsOptionGroup('chaos') || $this->IsOption('duel') ||
      $this->IsOption('festival') || $this->IsReplaceHumanGroup() ||
      $this->IsOptionGroup('change_');
  }

  //霊界公開判定
  function IsOpenCast(){
    global $USERS;

    if (! isset($this->open_cast)) { //未設定ならキャッシュする
      if ($this->IsOption('not_open_cast')) { //常時非公開
	$user = $USERS->ByID(1); //身代わり君の蘇生辞退判定
	$this->open_cast = $user->IsDummyBoy() && $user->IsDrop() && $USERS->IsOpenCast();
      }
      elseif ($this->IsOption('auto_open_cast')) { //自動公開
	$this->open_cast = $USERS->IsOpenCast();
      }
      else { //常時公開
	$this->open_cast = true;
      }
    }
    return $this->open_cast;
  }

  //情報公開判定
  function IsOpenData($virtual = false){
    global $SELF;
    return $SELF->IsDummyBoy() ||
      ($SELF->IsDead() && ! $this->single_view_mode && $this->IsOpenCast()) ||
      ($virtual ? $this->IsAfterGame() : ($this->IsFinished() && ! $this->single_view_mode));
  }

  //ゲーム開始前判定
  function IsBeforeGame(){ return $this->scene == 'beforegame'; }

  //ゲーム中 (昼) 判定
  function IsDay(){ return $this->scene == 'day'; }

  //ゲーム中 (夜) 判定
  function IsNight(){ return $this->scene == 'night'; }

  //ゲーム終了後判定
  function IsAfterGame(){ return $this->scene == 'aftergame'; }

  //ゲーム中判定 (仮想処理をする為、status では判定しない)
  function IsPlaying(){ return $this->IsDay() || $this->IsNight(); }

  //ゲーム終了判定
  function IsFinished(){ return $this->status == 'finished'; }

  //特殊イベント判定
  function IsEvent($type){
    if (! isset($this->event)) $this->event = new StdClass();
    return isset($this->event->$type) ? $this->event->$type : null;
  }

  //超過警告メッセージ出力済み判定
  function IsOvertimeAlert(){
    $query = $this->GetQueryHeader('room', 'overtime_alert') . ' AND overtime_alert IS FALSE';
    return FetchCount($query) < 1;
  }

  //天候セット
  function SetWeather(){
    global $ROLE_DATA;

    if ($this->watch_mode || $this->single_view_mode){
      $this->LoadWeather();
      if (isset($ROLE_DATA->weather_list[$this->event->weather])){
	$this->event->{$ROLE_DATA->weather_list[$this->event->weather]['event']} = true;
      }
    }
    $this->LoadWeather(true);
  }

  //発言登録
  function Talk($sentence, $action = null, $uname = '', $scene = '', $location = null,
		$font_type = null, $role_id = null, $spend_time = 0){
    if ($uname == '') $uname = 'system';
    if ($scene == '') {
      $scene = $this->scene;
      if (is_null($location)) $location = 'system';
    }
    if ($this->test_mode) {
      $str = "Talk: {$uname}: {$scene}: {$location}: {$action}: {$font_type}";
      PrintData(LineToBR($sentence), $str);
      return true;
    }

    switch ($scene) {
    case 'beforegame':
    case 'aftergame':
      $table = 'talk_' . $scene;
      break;

    default:
      $table = 'talk';
      break;
    }
    $items  = 'room_no, date, scene, uname, sentence, spend_time, time';
    $values = "{$this->id}, {$this->date}, '{$scene}', '{$uname}', '{$sentence}', {$spend_time}, " .
      "UNIX_TIMESTAMP()";

    if (isset($action)) {
      $items  .= ', action';
      $values .= ", '{$action}'";
    }
    if (isset($location)) {
      $items  .= ', location';
      $values .= ", '{$location}'";
    }
    if (isset($font_type)) {
      $items  .= ', font_type';
      $values .= ", '{$font_type}'";
    }
    if (isset($role_id)) {
      $items  .= ', role_id';
      $values .= ", {$role_id}";
    }
    return InsertDatabase($table, $items, $values);
  }

  //発言登録 (ゲーム開始前専用
  function TalkBeforegame($sentence, $uname, $handle_name, $color, $font_type = null){
    if ($this->test_mode) {
      $str = "Talk: {$uname}: {$handle_name}: {$color}: {$font_type}";
      PrintData(LineToBR($sentence), $str);
      return true;
    }

    $items  = 'room_no, date, scene, uname, handle_name, color, sentence, time';
    $values = "{$this->id}, 0, '{$this->scene}', '{$uname}', '{$handle_name}', '{$color}', " .
      "'{$sentence}', UNIX_TIMESTAMP()";
    if (isset($font_type)) {
      $items  .= ', font_type';
      $values .= ", '{$font_type}'";
    }
    return InsertDatabase('talk_' . $this->scene, $items, $values);
  }

  //超過警告メッセージ登録
  function OvertimeAlert($str){
    if ($this->IsOvertimeAlert()) return true;
    $this->Talk($str);
    $this->UpdateTime();
    return $this->UpdateOvertimeAlert(true);
  }

  //システムメッセージ登録
  function SystemMessage($str, $type, $add_date = 0){
    global $RQ_ARGS;

    $date = $this->date + $add_date;
    if ($this->test_mode){
      PrintData("{$type} ({$date}): {$str}", 'SystemMessage');
      if (is_array($RQ_ARGS->TestItems->system_message)){
	$RQ_ARGS->TestItems->system_message[$date][$type][] = $str;
      }
      return true;
    }
    $items = 'room_no, date, type, message';
    $values = "{$this->id}, {$date}, '{$type}', '{$str}'";
    return InsertDatabase('system_message', $items, $values);
  }

  //能力発動結果登録
  function ResultAbility($type, $result, $target = null, $user_no = null){
    global $RQ_ARGS;

    $date = $this->date;
    if ($this->test_mode){
      PrintData("{$type}: {$result}: {$target}: {$user_no}", 'ResultAbility');
      if (is_array($RQ_ARGS->TestItems->result_ability)){
	$stack = array('user_no' => $user_no, 'target' => $target, 'result' => $result);
	$RQ_ARGS->TestItems->result_ability[$date][$type][] = $stack;
      }
      return true;
    }
    $items  = 'room_no, date, type';
    $values = "{$this->id}, {$date}, '{$type}'";
    foreach (array('result', 'target', 'user_no') as $data){
      if (isset($$data)){
	$items  .= ", {$data}";
	$values .= ", '{$$data}'";
      }
    }
    return InsertDatabase('result_ability', $items, $values);
  }

  //システムメッセージ登録
  function ResultDead($name, $type, $result = null){
    global $RQ_ARGS;

    $date = $this->date;
    if ($this->test_mode){
      PrintData("{$name}: {$type} ({$date}): {$result}", 'ResultDead');
      if (is_array($RQ_ARGS->TestItems->result_dead)){
	$stack = array('type' => $type, 'handle_name' => $name, 'result' => $result);
	$RQ_ARGS->TestItems->result_dead[] = $stack;
      }
      return true;
    }
    $items = 'room_no, date, scene, type';
    $values = "{$this->id}, {$date}, '{$this->scene}', '{$type}'";
    if (isset($name)){
      $items  .= ', handle_name';
      $values .= ", '{$name}'";
    }
    if (isset($result)){
      $items  .= ', result';
      $values .= ", '{$result}'";
    }
    return InsertDatabase('result_dead', $items, $values);
  }

  //天候登録
  function EntryWeather($id, $date, $priest = false){
    global $ROLE_DATA;

    $this->SystemMessage($id, 'WEATHER', $date);
    if ($priest){ //祈祷師の処理
      $result = 'prediction_weather_' . $ROLE_DATA->weather_list[$id]['event'];
      $this->ResultAbility('WEATHER_PRIEST_RESULT', $result);
    }
  }

  //投票回数を更新
  function UpdateVoteCount($reset = false){
    if ($this->test_mode) return true;
    SendQuery('UPDATE room SET vote_count = vote_count + 1' . $this->GetQuery(false));
    $this->UpdateOvertimeAlert();
    if (! $reset && $this->date != 1) return true;
    $query = 'UPDATE vote SET vote_count = vote_count + 1' . $this->GetQuery() .
      " AND type IN ('CUPID_DO', 'DUELIST_DO')";
    return FetchBool($query);
  }

  //超過警告メッセージ判定フラグ変更
  function UpdateOvertimeAlert($bool = false){
    if ($this->test_mode) return true;
    $flag = $bool ? 'TRUE' : 'FALSE';
    return FetchBool('UPDATE room SET overtime_alert = ' . $flag . $this->GetQuery(false));
  }

  //最終更新時刻を更新
  function UpdateTime(){
    if ($this->test_mode) return true;
    $query = 'UPDATE room SET last_update_time = UNIX_TIMESTAMP()' . $this->GetQuery(false);
    return FetchBool($query);
  }

  //シーンを更新
  function UpdateScene($date = false){
    $query = "scene = '{$this->scene}', vote_count = 1, overtime_alert = FALSE, ".
      "scene_start_time = UNIX_TIMESTAMP()";
    if ($date) $query .= ", date = {$this->date}, revote_count = 0";
    return FetchBool('UPDATE room SET ' . $query . $this->GetQuery(false));
  }

  //夜にする
  function ChangeNight(){
    $this->scene = 'night';
    if ($this->test_mode) return true;
    $this->UpdateScene();
    return $this->Talk('', 'NIGHT'); //夜がきた通知
  }

  //次の日にする
  function ChangeDate(){
    $this->date++;
    $this->scene = 'day';
    if ($this->test_mode) return true;
    $this->UpdateScene(true);

    //夜が明けた通知
    $this->Talk($this->date, 'MORNING');
    $this->UpdateTime(); //最終書き込みを更新
    //$this->DeleteVote(); //今までの投票を全部削除

    $status = CheckWinner(); //勝敗のチェック
    //$DB_CONF->Commit(); //一応コミット (再検討)
    return $status;
  }

  //夜を飛ばす
  function SkipNight(){
    global $MESSAGE;

    if ($this->IsEvent('skip_night')){
      AggregateVoteNight(true);
      $this->talk($MESSAGE->skip_night);
    }
  }

  //背景設定 CSS タグを生成
  function GenerateCSS(){
    if (empty($this->scene)) return '';
    return '<link rel="stylesheet" href="'.JINRO_CSS.'/game_'.$this->scene.'.css">'."\n";
  }

  //村のタイトルタグを生成
  function GenerateTitleTag(){
    return '<td class="room"><span>' . $this->name . '村</span>　[' . $this->id .
      '番地]<br>～' . $this->comment . '～</td>'."\n";
  }
}

class RoomDataSet{
  public $rows = array();

  function LoadFinishedRoom($room_no){
    $query = <<<EOF
SELECT room_no AS id, name, comment, date, game_option, option_role, max_user, winner,
  establish_datetime, start_datetime, finish_datetime,
  (SELECT COUNT(user_no) FROM user_entry WHERE user_entry.room_no = room.room_no
   AND user_entry.user_no > 0) AS user_count
FROM room WHERE room_no = {$room_no} AND status = 'finished'
EOF;
    return FetchObject($query, 'Room', true);
  }

  function LoadEntryUser($room_no){
    $query = <<<EOF
SELECT room_no AS id, date, scene, status, max_user FROM room WHERE room_no = {$room_no}
FOR UPDATE
EOF;
    return FetchObject($query, 'Room', true);
  }

  function LoadEntryUserPage($room_no){
    $query = <<<EOF
SELECT room_no AS id, name, comment, status, game_option, option_role
FROM room WHERE room_no = {$room_no}
EOF;
    return FetchObject($query, 'Room', true);
  }

  function LoadClosedRooms($room_order, $limit_statement) {
    $sql = <<<SQL
SELECT room.room_no AS id, room.name AS name, room.comment AS comment,
    room.date AS room_date AS date, room.game_option AS room_game_option,
    room.option_role AS room_option_role, room.max_user AS room_max_user, users.room_num_user,
    room.winner AS room_winner, room.establish_datetime, room.start_datetime, room.finish_datetime
FROM room
    LEFT JOIN (SELECT room_no, COUNT(user_no) AS room_num_user FROM user_entry GROUP BY room_no) users
	USING (room_no)
WHERE status = 'finished'
ORDER BY room_no {$room_order}
{$limit_statement}
SQL;
    return self::__load($sql);
  }

  function LoadOpeningRooms($class = 'RoomDataSet') {
    $sql = <<<SQL
SELECT room_no AS id, name, comment, game_option, option_role, max_user, status
FROM room WHERE status <> 'finished' ORDER BY room_no DESC
SQL;
    return self::__load($sql);
  }

  function __load($sql, $class = 'Room') {
    $result = new RoomDataSet();
    if (($q_rooms = mysql_query($sql)) !== false){
      while (($object = mysql_fetch_object($q_rooms, $class)) !== false) {
        $object->ParseOption();
        $result->rows[] = $object;
      }
    }
    else {
      die('村一覧の取得に失敗しました');
    }
    return $result;
  }
}
