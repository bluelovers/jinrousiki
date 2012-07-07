<?php
require_once('include/init.php');
$INIT_CONF->LoadFile('game_play_functions', 'talk_class');
$INIT_CONF->LoadClass('SESSION', 'ROLES', 'ICON_CONF', 'TIME_CONF');

//-- データ収集 --//
$INIT_CONF->LoadRequest('RequestGamePlay');
if ($RQ_ARGS->play_sound) $INIT_CONF->LoadClass('SOUND', 'COOKIE'); //音でお知らせ

$DB_CONF->Connect(); //DB 接続
$SESSION->CertifyGamePlay(); //セッション認証

$ROOM = new Room($RQ_ARGS); //村情報をロード
$ROOM->dead_mode    = $RQ_ARGS->dead_mode;
$ROOM->heaven_mode  = $RQ_ARGS->heaven_mode;
$ROOM->system_time  = TZTime();
$ROOM->sudden_death = 0; //突然死実行までの残り時間

//シーンに応じた追加クラスをロード
if ($ROOM->IsBeforeGame()) { //ゲームオプション表示
  $INIT_CONF->LoadClass('ROOM_CONF', 'CAST_CONF', 'ROOM_OPT', 'GAME_OPT_MESS', 'ROOM_IMG');
  $RQ_ARGS->retrive_type = $ROOM->scene;
}
elseif (! $ROOM->heaven_mode && $ROOM->IsDay()) {
  $RQ_ARGS->retrive_type = $ROOM->scene;
}
elseif ($ROOM->IsFinished()) { //勝敗結果表示
  $INIT_CONF->LoadClass('WINNER_MESS');
}

$USERS = new UserDataSet($RQ_ARGS); //ユーザ情報をロード
$SELF  = $USERS->BySession(); //自分の情報をロード

SendCookie($OBJECTION); //必要なクッキーをセットする

//-- 発言処理 --//
$say_limit = null;
if (! $ROOM->dead_mode || $ROOM->heaven_mode) { //発言が送信されるのは bottom フレーム
  $say_limit = ConvertSay($RQ_ARGS->say); //発言置換処理

  if ($RQ_ARGS->say == '') {
    CheckSilence(); //発言が空ならゲーム停滞のチェック(沈黙、突然死)
  }
  elseif ($RQ_ARGS->last_words && (! $SELF->IsDummyBoy() || $ROOM->IsBeforeGame())) {
    EntryLastWords($RQ_ARGS->say); //遺言登録 (細かい判定条件は関数内で行う)
  }
  elseif ($SELF->IsDead() || $SELF->IsDummyBoy() || $SELF->last_load_scene == $ROOM->scene) {
    Say($RQ_ARGS->say); //死んでいる or 身代わり君 or ゲームシーンが一致しているなら書き込む
  }
  else {
    CheckSilence(); //発言ができない状態ならゲーム停滞チェック
  }

  //ゲームシーンを更新
  if ($SELF->last_load_scene != $ROOM->scene) $SELF->Update('last_load_scene', $ROOM->scene);
}
elseif ($ROOM->dead_mode && $ROOM->IsPlaying() && $SELF->IsDummyBoy()) {
  SetSuddenDeathTime(); //霊界の GM でも突然死タイマーを見れるようにする
}

//-- データ出力 --//
ob_start();
OutputGamePageHeader();
OutputGameHeader();
if ($say_limit === false) echo '<font color="#FF0000">' . $MESSAGE->say_limit . '</font><br>';
if (! $ROOM->heaven_mode) {
  if (! $RQ_ARGS->list_down) OutputPlayerList();
  OutputAbility();
  if ($ROOM->IsDay() && $SELF->IsLive() && $ROOM->date != 1) CheckSelfVoteDay();
  if ($ROOM->IsPlaying()) OutputRevoteList();
}

($SELF->IsDead() && $ROOM->heaven_mode) ? OutputHeavenTalkLog() : OutputTalkLog(); //会話ログを出力

if (! $ROOM->heaven_mode) {
  if ($SELF->IsDead()) OutputAbilityAction(); //能力発揮結果
  OutputLastWords();
  OutputDeadMan();
  OutputVoteList();
  if (! $ROOM->dead_mode) OutputSelfLastWords();
  if ($RQ_ARGS->list_down) OutputPlayerList();
}
OutputHTMLFooter();
ob_end_flush();

//-- 関数 --//
//必要なクッキーをまとめて登録 (ついでに最新の異議ありの状態を取得して配列に格納)
function SendCookie(&$objection_list){
  global $GAME_CONF, $RQ_ARGS, $ROOM, $USERS, $SELF;

  //-- 夜明け --//
  setcookie('scene', $ROOM->scene, $ROOM->system_time + 3600); //シーンを登録

  //-- 再投票 --//
  if ($ROOM->vote_count > 1) { //再投票回数を登録
    setcookie('vote_times', $ROOM->vote_count, $ROOM->system_time + 3600);
  }
  else { //再投票が無いなら削除
    setcookie('vote_times', '', $ROOM->system_time - 3600);
  }

  //-- 入村情報 --//
  if ($ROOM->IsBeforeGame()) { //現在のユーザ人数を登録
    setcookie('user_count', $USERS->GetUserCount(), $ROOM->system_time + 3600);
  }

  //-- 「異議」あり --//
  $user_count = $USERS->GetUserCount(true); //KICK も含めたユーザ総数を取得
  $objection_list = array_fill(0, $user_count, 0); //配列をセット (index は 0 から)
  if ($ROOM->IsAfterGame()) return; //ゲーム終了ならスキップ

  //「異議」ありセット判定
  if ($RQ_ARGS->set_objection && $SELF->objection < $GAME_CONF->objection &&
      ($ROOM->IsBeforeGame() || ($SELF->IsLive() && $ROOM->IsDay()))) {
    $SELF->objection++;
    $SELF->Update('objection', $SELF->objection);
    $ROOM->Talk('', 'OBJECTION', $SELF->uname);
  }

  //ユーザ全体の「異議」ありを集計
  $count = 0;
  foreach ($USERS->names as $uname => $id) {
    $objection_list[$count++] = $USERS->ByID($id)->objection;
  }
  //PrintData($objection_list, 'objection');
  setcookie('objection', implode(',', $objection_list), $ROOM->system_time + 3600); //リストを登録
}

//遺言登録
function EntryLastWords($say){
  global $GAME_CONF, $ROOM, $USERS, $SELF;

  //スキップ判定
  if (($GAME_CONF->limit_last_words && $ROOM->IsPlaying()) || $ROOM->IsFinished()) return false;

  if ($say == ' ') $say = null; //スペースだけなら「消去」
  if ($SELF->IsLive()) { //登録しない役職をチェック
    if (! $SELF->IsLastWordsLimited()) $SELF->Update('last_words', $say);
  }
  elseif ($SELF->IsDead() && $SELF->IsRole('mind_evoke')) { //口寄せの処理
    foreach ($SELF->GetPartner('mind_evoke') as $id) { //口寄せしているイタコすべての遺言を更新する
      $target = $USERS->ByID($id);
      if ($target->IsLive()) $target->Update('last_words', $say);
    }
  }
}

//発言
function Say($say){
  global $RQ_ARGS, $ROOM, $ROLES, $USERS, $SELF;

  if (! $ROOM->IsPlaying()) return Write($say, $ROOM->scene, null, 0, true); //ゲーム開始前後
  if ($RQ_ARGS->last_words && $SELF->IsDummyBoy()) { //身代わり君のシステムメッセージ (遺言)
    return Write($say, $ROOM->scene, 'dummy_boy');
  }
  if ($SELF->IsDead()) return Write($say, 'heaven'); //死者の霊話

  if ($ROOM->IsRealTime()) { //リアルタイム制
    GetRealPassTime($left_time);
    $spend_time = 0; //会話で時間経過制の方は無効にする
  }
  else { //会話で時間経過制
    GetTalkPassTime($left_time); //経過時間の和
    $spend_time = min(4, max(1, floor(strlen($say) / 100))); //経過時間 (範囲は 1 - 4)
  }
  if ($left_time < 1) return; //制限時間外ならスキップ (ここに来るのは生存者のみのはず)

  if ($ROOM->IsDay()) { //昼はそのまま発言
    if ($ROOM->IsEvent('wait_morning')) return; //待機時間中ならスキップ
    if ($SELF->IsRole('echo_brownie')) $ROLES->LoadMain($SELF)->EchoSay(); //山彦の処理
    return Write($say, $ROOM->scene, null, $spend_time, true);
  }

  //if ($ROOM->IsNight()) { //夜は役職毎に分ける
  $user = $USERS->ByVirtual($SELF->user_no); //仮想ユーザを取得
  if ($ROOM->IsEvent('blind_talk_night')) { //天候：風雨
    $location = 'self_talk';
  }
  elseif ($user->IsWolf(true)) { //人狼
    $location = $SELF->IsRole('possessed_mad') ? 'self_talk' : 'wolf'; //犬神判定
  }
  elseif ($user->IsRole('whisper_mad')) { //囁き狂人
    $location = $SELF->IsRole('possessed_mad') ? 'self_talk' : 'mad'; //犬神判定
  }
  elseif ($user->IsCommon(true)) { //共有者
    $location = 'common';
  }
  elseif ($user->IsFox(true)) { //妖狐
    $location = 'fox';
  }
  else { //独り言
    $location = 'self_talk';
  }

  $update = $SELF->IsWolf(); //時間経過するのは人狼の発言のみ (本人判定)
  return Write($say, $ROOM->scene, $location, $update ? $spend_time : 0, $update);
}

//ゲーム停滞のチェック
function CheckSilence(){
  global $DB_CONF, $TIME_CONF, $MESSAGE, $ROOM, $USERS;

  if (! $ROOM->IsPlaying()) return true; //スキップ判定

  //経過時間を取得
  if ($ROOM->IsRealTime()) { //リアルタイム制
    GetRealPassTime($left_time);
    if ($left_time > 0) return true; //制限時間超過判定
  }
  else { //仮想時間制
    if (! $DB_CONF->Transaction()) return false; //判定条件が全て DB なので即ロック

    //現在のシーンを再取得して切り替わっていたらスキップ
    if (FetchResult($ROOM->GetQueryHeader('room', 'scene') . ' FOR UPDATE') != $ROOM->scene) {
      return $DB_CONF->RollBack();
    }
    $silence_pass_time = GetTalkPassTime($left_time, true);

    if ($left_time > 0) { //制限時間超過判定
      //最終発言時刻からの差分を取得
      $query = $ROOM->GetQueryHeader('room', 'UNIX_TIMESTAMP() - last_update_time');
      if (FetchResult($query) <= $TIME_CONF->silence) return $DB_CONF->RollBack(); //沈黙判定

      //沈黙メッセージを発行してリセット
      $str = '・・・・・・・・・・ ' . $silence_pass_time . ' ' . $MESSAGE->silence;
      $ROOM->Talk($str, null, '', '', null, null, null, $TIME_CONF->silence_pass);
      $ROOM->UpdateTime();
      return $DB_CONF->Commit();
    }
  }

  //オープニングなら即座に夜に移行する
  if ($ROOM->date == 1 && $ROOM->IsOption('open_day') && $ROOM->IsDay()) {
    if ($ROOM->IsRealTime()) { //リアルタイム制はここでロック開始
      if (! $DB_CONF->Transaction()) return false;

      //現在のシーンを再取得して切り替わっていたらスキップ
      if (FetchResult($ROOM->GetQueryHeader('room', 'scene') . ' FOR UPDATE') != $ROOM->scene) {
	return $DB_CONF->RollBack();
      }
    }
    $ROOM->ChangeNight(); //夜に切り替え
    $ROOM->UpdateTime(); //最終書き込み時刻を更新
    return $DB_CONF->Commit(); //ロック解除
  }

  if (! $ROOM->IsOvertimeAlert()) { //警告メッセージ出力判定
    if ($ROOM->IsRealTime()) { //リアルタイム制はここでロック開始
      if (! $DB_CONF->Transaction()) return false;

      //現在のシーンを再取得して切り替わっていたらスキップ
      if (FetchResult($ROOM->GetQueryHeader('room', 'scene') . ' FOR UPDATE') != $ROOM->scene) {
	return $DB_CONF->RollBack();
      }
    }

    //警告メッセージを出力 (最終出力判定は呼び出し先で行う)
    $str = 'あと' . ConvertTime($TIME_CONF->sudden_death) . 'で' . $MESSAGE->sudden_death_announce;
    if ($ROOM->OvertimeAlert($str)) { //出力したら突然死タイマーをリセットしてコミット
      $ROOM->sudden_death = $TIME_CONF->sudden_death;
      return $DB_CONF->Commit(); //ロック解除
    }
  }

  //最終発言時刻からの差分を取得
  /*  $ROOM から推定値を計算する場合 (リアルタイム制限定 + 再投票などがあると大幅にずれる) */
  //$ROOM->sudden_death = $TIME_CONF->sudden_death - ($ROOM->system_time - $end_time);
  $query = $ROOM->GetQueryHeader('room', 'UNIX_TIMESTAMP() - last_update_time');
  $ROOM->sudden_death = $TIME_CONF->sudden_death - FetchResult($query);

  //制限時間前ならスキップ (この段階でロックしているのは非リアルタイム制のみ)
  if ($ROOM->sudden_death > 0) return $ROOM->IsRealTime() ? true : $DB_CONF->RollBack();

  //制限時間を過ぎていたら未投票の人を突然死させる
  if ($ROOM->IsRealTime()) { //リアルタイム制はここでロック開始
    if (! $DB_CONF->Transaction()) return false;

    //現在のシーンを再取得して切り替わっていたらスキップ
    if (FetchResult($ROOM->GetQueryHeader('room', 'scene') . ' FOR UPDATE') != $ROOM->scene) {
      return $DB_CONF->RollBack();
    }

    //制限時間を再計算
    $query = $ROOM->GetQueryHeader('room', 'UNIX_TIMESTAMP() - last_update_time');
    $ROOM->sudden_death = $TIME_CONF->sudden_death - FetchResult($query);
    if ($ROOM->sudden_death > 0) return $DB_CONF->RollBack();
  }

  if (abs($ROOM->sudden_death) > $TIME_CONF->server_disconnect) { //サーバダウン検出
    $ROOM->UpdateTime(); //突然死タイマーをリセット
    $ROOM->UpdateOvertimeAlert(); //警告出力判定をリセット
    return $DB_CONF->Commit(); //ロック解除
  }

  $novote_list = array(); //未投票者リスト
  $ROOM->LoadVote(); //投票情報を取得
  if ($ROOM->IsDay()) {
    foreach ($USERS->rows as $user) { //生存中の未投票者を取得
      if ($user->IsLive() && ! isset($ROOM->vote[$user->user_no])) {
	$novote_list[] = $user->user_no;
      }
    }
  }
  elseif ($ROOM->IsNight()) {
    $vote_data = $ROOM->ParseVote(); //投票情報をパース
    //PrintData($vote_data, 'Vote Data');
    foreach ($USERS->rows as $user) { //未投票チェック
      if ($user->CheckVote($vote_data) === false) $novote_list[] = $user->user_no;
    }
  }

  //未投票突然死処理
  foreach ($novote_list as $id) $USERS->SuddenDeath($id, 'NOVOTED');
  LoversFollowed(true);
  InsertMediumMessage();

  $ROOM->Talk($MESSAGE->vote_reset); //投票リセットメッセージ
  $ROOM->UpdateVoteCount(true); //投票回数を更新
  $ROOM->UpdateTime(); //制限時間リセット
  //$ROOM->DeleteVote(); //投票リセット
  if (CheckWinner()) $USERS->ResetJoker(); //勝敗チェック
  return $DB_CONF->Commit(); //ロック解除
}

//超過時間セット
function SetSuddenDeathTime(){
  global $TIME_CONF, $ROOM;

  //最終発言時刻からの差分を取得
  $query = $ROOM->GetQueryHeader('room', 'UNIX_TIMESTAMP() - last_update_time');
  $last_update_time = FetchResult($query);

  //経過時間を取得
  $ROOM->IsRealTime() ? GetRealPassTime($left_time) : GetTalkPassTime($left_time, true);
  if ($left_time == 0) $ROOM->sudden_death = $TIME_CONF->sudden_death - $last_update_time;
}

//村名前、番地、何日目、日没まで～時間を出力(勝敗がついたら村の名前と番地、勝敗を出力)
function OutputGameHeader(){
  global $GAME_CONF, $TIME_CONF, $MESSAGE, $RQ_ARGS, $ROOM, $USERS, $SELF,
    $COOKIE, $SOUND, $OBJECTION;

  $url_room   = '?room_no=' . $ROOM->id;
  $url_reload = $RQ_ARGS->auto_reload > 0 ? '&auto_reload=' . $RQ_ARGS->auto_reload : '';
  $url_sound  = $RQ_ARGS->play_sound      ? '&play_sound=on'  : '';
  $url_list   = $RQ_ARGS->list_down       ? '&list_down=on'   : '';
  $url_dead   = $ROOM->dead_mode          ? '&dead_mode=on'   : '';
  $url_heaven = $ROOM->heaven_mode        ? '&heaven_mode=on' : '';

  echo '<table class="game-header"><tr>'."\n";
  if (($SELF->IsDead() && $ROOM->heaven_mode) || $ROOM->IsFinished()){ //霊界・ゲーム終了後
    echo $ROOM->IsFinished() ? $ROOM->GenerateTitleTag() :
      '<td>&lt;&lt;&lt;幽霊の間&gt;&gt;&gt;</td>'."\n";

    //過去シーンのログへのリンク生成
    echo '<td class="view-option">ログ ';
    $header     = '<a href="game_log.php' . $url_room;
    $footer     = '</a>'."\n";
    $url_date   = '&date=';
    $url_scene  = '&scene=';
    $url_header = $header . $url_date;
    $url_footer = '" target="_blank">';
    $url_day    = $url_scene . 'day'   . $url_footer;
    $url_night  = $url_scene . 'night' . $url_footer;

    echo $url_header . '0' . $url_scene . 'beforegame' . $url_footer . '0(前)' . $footer;
    if ($ROOM->IsOption('open_day')) echo $url_header . '1' . $url_day . '1(昼)' . $footer;
    echo $url_header . '1' . $url_night . '1(夜)' . $footer;
    for($i = 2; $i < $ROOM->date; $i++){
      echo $url_header . $i . $url_day   . $i . '(昼)' . $footer;
      echo $url_header . $i . $url_night . $i . '(夜)' . $footer;
    }

    if ($ROOM->heaven_mode){
      if ($ROOM->IsNight()){
	echo $url_header . $ROOM->date . $url_day . $ROOM->date . '(昼)' . $footer;
      }
      echo '</td>'."\n" . '</tr></table>'."\n";
      return;
    }

    if ($ROOM->IsFinished()){
      echo $url_header . $ROOM->date . $url_day . $ROOM->date . '(昼)' . $footer;
      if (FetchResult($ROOM->GetQuery(true, 'talk') . " AND scene = 'night'") > 0){
	echo $url_header . $ROOM->date . $url_night . $ROOM->date . '(夜)' . $footer;
      }
      echo $header . $url_scene . 'aftergame' . $url_footer . '(後)' . $footer;
      echo $header . $url_scene . 'heaven'    . $url_footer . '(霊)' . $footer;
    }
  }
  else {
    echo $ROOM->GenerateTitleTag() . '<td class="view-option">'."\n";
    if ($SELF->IsDead() && $ROOM->dead_mode){ //死亡者の場合の、真ん中の全表示地上モード
      $url = 'game_play.php' . $url_room . '&dead_mode=on' . $url_reload .
	$url_sound . $url_list;

      echo <<<EOF
<form method="POST" action="{$url}" name="reload_middle_frame" target="middle">
<input type="submit" value="更新">
</form>

EOF;
    }
  }

  if (! $ROOM->IsFinished()){ //ゲーム終了後は自動更新しない
    $url_header = '<a target="_top" href="game_frame.php' . $url_room .
      $url_dead . $url_heaven . $url_list;
    OutputAutoReloadLink($url_header . $url_sound);

    $url = $url_header . $url_reload;
    echo ' [音でお知らせ](' .
      ($RQ_ARGS->play_sound ? 'on ' . $url . '">off</a>' :
       $url . '&play_sound=on">on</a> off') . ')'."\n";
  }

  //プレイヤーリストの表示位置
  echo '<a target="_top" href="game_frame.php' . $url_room . $url_dead . $url_heaven .
    $url_reload . $url_sound  . ($RQ_ARGS->list_down ? '">↑' : '&list_down=on">↓') . 'リスト</a>';

  if ($ROOM->IsFinished()){
    echo "\n".'<a target="_blank" href="game_play.php' . $url_room . $url_list . '">' .
      '別ページ</a>';
    OutputLogLink();
  }
  else { //ログ保存用のリンク
    echo "\n".'<a target="_blank" href="game_play.php' . $url_room . $url_list . '">' .
      '別ページ</a>';
    if ($ROOM->IsBeforegame()){
      echo ' <a target="_blank" href="user_manager.php' . $url_room . '&user_no=' .
	$SELF->user_no . '">登録情報変更</a>'."\n";
    }
  }

  if ($RQ_ARGS->play_sound && ($ROOM->IsBeforeGame() || $ROOM->IsDay())){ //音でお知らせ処理
    if ($ROOM->IsBeforeGame()){ //入村・満員
      $user_count = $USERS->GetUserCount();
      $max_user   = FetchResult($ROOM->GetQueryHeader('room', 'max_user'));
      if ($user_count == $max_user && $COOKIE->user_count != $max_user){
	$SOUND->Output('full');
      }
      elseif ($COOKIE->user_count != $user_count){
	$SOUND->Output('entry');
      }
    }
    elseif ($COOKIE->scene != $ROOM->scene){ //夜明け
      $SOUND->Output('morning');
    }

    //「異議」あり
    $cookie_objection_list = explode(',', $COOKIE->objection); //クッキーの値を配列に格納する
    $count = count($OBJECTION);
    for($i = 0; $i < $count; $i++){ //差分を計算 (index は 0 から)
      //差分があれば性別を確認して音を鳴らす
      if ((int)$OBJECTION[$i] > (int)$cookie_objection_list[$i]){
	$SOUND->Output('objection_' . $USERS->ByID($i + 1)->sex);
      }
    }
  }
  echo '</td></tr>'."\n".'</table>'."\n";

  switch ($ROOM->scene) {
  case 'beforegame': //開始前の注意を出力
    echo '<div class="caution">'."\n";
    echo 'ゲームを開始するには全員がゲーム開始に投票する必要があります';
    echo '<span>(投票した人は村人リストの背景が赤くなります)</span>'."\n";
    echo '</div>'."\n";
    break;

  case 'day':
    $time_message = '日没まで ';
    break;

  case 'night':
    $time_message = '夜明けまで ';
    break;

  case 'aftergame': //勝敗結果を出力して処理終了
    OutputWinner();
    return;
  }

  if ($ROOM->IsBeforeGame()) OutputGameOption(); //ゲームオプションを説明

  OutputTimeTable(); //経過日数と生存人数を出力
  $left_time = 0;
  if ($ROOM->IsBeforeGame()){
    echo '<td class="real-time">';
    if ($ROOM->IsRealTime()){ //実時間の制限時間を取得
      echo "設定時間： 昼 <span>{$ROOM->real_time->day}分</span> / " .
	"夜 <span>{$ROOM->real_time->night}分</span>";
    }
    echo '　突然死：<span>' . ConvertTime($TIME_CONF->sudden_death) . '</span></td>';
  }
  if ($ROOM->IsPlaying()){
    if ($ROOM->IsRealTime()){ //リアルタイム制
      GetRealPassTime($left_time);
      echo '<td class="real-time"><form name="realtime_form">'."\n";
      echo '<input type="text" name="output_realtime" size="60" readonly>'."\n";
      echo '</form></td>'."\n";
    }
    else { //仮想時間制
      echo '<td>' . $time_message . GetTalkPassTime($left_time) . '</td>'."\n";
    }
  }

  //異議あり、のボタン(夜と死者モード以外)
  if ($ROOM->IsBeforeGame() ||
     ($ROOM->IsDay() && ! $ROOM->dead_mode && ! $ROOM->heaven_mode && $left_time > 0)){
    $url = 'game_play.php' . $url_room . $url_reload . $url_sound . $url_list;
    $count = $GAME_CONF->objection - $SELF->objection;
    echo <<<EOF
<td class="objection"><form method="POST" action="{$url}">
<input type="hidden" name="set_objection" value="on">
<input type="image" name="objimage" src="{$GAME_CONF->objection_image}">
({$count})</form></td>

EOF;
  }
  echo '</tr></table>'."\n";

  if (! $ROOM->IsPlaying()) return;
  if ($left_time == 0){
    echo '<div class="system-vote">' . $time_message . $MESSAGE->vote_announce . '</div>'."\n";
    if ($ROOM->sudden_death > 0){
      echo $MESSAGE->sudden_death_time . ConvertTime($ROOM->sudden_death) . '<br>'."\n";
    }
  }
  elseif ($ROOM->IsEvent('wait_morning')){
    echo '<div class="system-vote">' . $MESSAGE->wait_morning . '</div>'."\n";
  }

  if ($SELF->IsDead() && ! $ROOM->IsOpenCast()){
    echo '<div class="system-vote">' . $MESSAGE->close_cast . '</div>'."\n";
  }
}

//昼の自分の未投票チェック
function CheckSelfVoteDay(){
  global $MESSAGE, $ROOM, $USERS, $SELF;

  $str = '<div class="self-vote">投票 ' . ($ROOM->revote_count + 1) . ' 回目：';
  if (is_null($SELF->target_no)) {
    $str .= '<font color="#FF0000">まだ投票していません</font></div>'."\n" .
      '<span class="ability vote-do">' . $MESSAGE->ability_vote . '</span><br>';
  }
  else {
    $str .= $USERS->ByVirtual($SELF->target_no)->handle_name . ' さんに投票済み</div>';
  }
  echo $str."\n";
}

//自分の遺言を出力
function OutputSelfLastWords(){
  global $ROOM, $SELF;

  if ($ROOM->IsAfterGame()) return false; //ゲーム終了後は表示しない

  $query = 'SELECT last_words FROM user_entry' . $ROOM->GetQuery(false) .
    " AND user_no = {$SELF->user_no}";
  if (($str = FetchResult($query)) == '') return false;
  LineToBR($str); //改行コードを変換
  if ($str == '') return false;

  echo <<<EOF
<table class="lastwords"><tr>
<td class="lastwords-title">自分の遺言</td>
<td class="lastwords-body">{$str}</td>
</tr></table>

EOF;
}
