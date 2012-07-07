<?php
require_once('include/init.php');
$INIT_CONF->LoadFile('game_vote_functions', 'user_class');
$INIT_CONF->LoadClass('SESSION', 'ROLES', 'ICON_CONF', 'ROOM_OPT', 'GAME_OPT_CONF');

//-- データ収集 --//
$INIT_CONF->LoadRequest('RequestGameVote'); //引数を取得
$DB_CONF->Connect(); //DB 接続
$SESSION->Certify(); //セッション認証

//ロック処理
if (! $DB_CONF->Transaction()) OutputVoteResult('サーバが混雑しています。再度投票をお願いします。');

$ROOM = new Room($RQ_ARGS, true); //村情報をロード
if ($ROOM->IsFinished()) OutputVoteError('ゲーム終了', 'ゲームは終了しました');
$ROOM->system_time = TZTime(); //現在時刻を取得

$USERS = new UserDataSet($RQ_ARGS, true); //ユーザ情報をロード
$SELF = $USERS->BySession(); //自分の情報をロード

//-- メインルーチン --//
if ($RQ_ARGS->vote) { //投票処理
  if ($ROOM->IsBeforeGame()) { //ゲーム開始 or Kick 投票処理
    switch ($RQ_ARGS->situation) {
    case 'GAMESTART':
      $INIT_CONF->LoadClass('CAST_CONF'); //配役情報をロード
      VoteGameStart();
      break;

    case 'KICK_DO':
      VoteKick();
      break;

    default: //ここに来たらロジックエラー
      OutputVoteError('ゲーム開始前投票');
      break;
    }
  }
  elseif ($SELF->IsDead()) { //死者の霊界投票処理
    if ($SELF->IsDummyBoy() && $RQ_ARGS->situation == 'RESET_TIME') {
      VoteResetTime();
    }
    else {
      VoteDeadUser();
    }
  }
  elseif ($RQ_ARGS->target_no == 0) { //空投票検出
    OutputVoteError('空投票', '投票先を指定してください');
  }
  elseif ($ROOM->IsDay()) { //昼の処刑投票処理
    VoteDay();
  }
  elseif ($ROOM->IsNight()) { //夜の投票処理
    VoteNight();
  }
  else { //ここに来たらロジックエラー
    OutputVoteError('投票コマンドエラー', '投票先を指定してください');
  }
}
else { //シーンに合わせた投票ページを出力
  $INIT_CONF->LoadClass('VOTE_MESS');
  if ($SELF->IsDead()) {
    $SELF->IsDummyBoy() ? OutputVoteDummyBoy() : OutputVoteDeadUser();
  }
  else {
    switch ($ROOM->scene) {
    case 'beforegame':
      OutputVoteBeforeGame();
      break;

    case 'day':
      OutputVoteDay();
      break;

    case 'night':
      OutputVoteNight();
      break;

    default: //ここに来たらロジックエラー
      OutputVoteError('投票シーンエラー');
      break;
    }
  }
}
$DB_CONF->Disconnect(); //DB 接続解除

//-- 関数 --//
//エラーページ出力
function OutputVoteError($title, $str = null){
  global $RQ_ARGS;

  $header = '<div align="center"><a id="game_top"></a>';
  $footer = "<br>\n" . $RQ_ARGS->back_url . '</div>';
  if (is_null($str)) $str = 'プログラムエラーです。管理者に問い合わせてください。';
  OutputActionResult('投票エラー [' . $title . ']', $header . $str . $footer);
}

//ゲーム開始投票の処理
function VoteGameStart(){
  global $DB_CONF, $GAME_CONF, $ROOM, $SELF;

  CheckSituation('GAMESTART');
  $str = 'ゲーム開始';
  if ($SELF->IsDummyBoy(true)) { //出題者以外の身代わり君
    if ($GAME_CONF->power_gm) { //強権モードによる強制開始処理
      if (! AggregateVoteGameStart(true)) $str .= '：開始人数に達していません。';
      $DB_CONF->Commit();
      OutputVoteResult($str);
    }
    else {
      OutputVoteResult($str . '：身代わり君は投票不要です');
    }
  }

  //投票済みチェック
  $ROOM->LoadVote();
  if (in_array($SELF->user_no, $ROOM->vote)) OutputVoteResult($str . '：投票済みです');

  if ($SELF->Vote('GAMESTART')) { //投票処理
    AggregateVoteGameStart(); //集計処理
    $DB_CONF->Commit();
    OutputVoteResult($str . '：投票完了');
  }
  else {
    OutputVoteResult($str . '：データベースエラー');
  }
}

//開始前の Kick 投票の処理
function VoteKick(){
  global $DB_CONF, $GAME_CONF, $RQ_ARGS, $ROOM, $USERS, $SELF;

  CheckSituation('KICK_DO'); //コマンドチェック
  $str = 'Kick 投票：';
  $target = $USERS->ByID($RQ_ARGS->target_no); //投票先のユーザ情報を取得
  if ($target->uname == '' || $target->live == 'kick') {
    OutputVoteResult($str . '投票先が指定されていないか、すでに Kick されています');
  }
  if ($target->IsDummyBoy()) OutputVoteResult($str . '身代わり君には投票できません');
  if (! $GAME_CONF->self_kick && $target->IsSelf()) {
    OutputVoteResult($str . '自分には投票できません');
  }

  //ゲーム開始チェック
  if (FetchResult($ROOM->GetQueryHeader('room', 'scene')) != 'beforegame') {
    OutputVoteResult($str . '既にゲーム開始されています');
  }

  $ROOM->LoadVote(true); //投票情報をロード
  $id = $SELF->user_no;
  if (isset($ROOM->vote[$id]) && in_array($target->user_no, $ROOM->vote[$id])) {
    OutputVoteResult($str . "{$target->handle_name} さんへ Kick 投票済み");
  }

  if ($SELF->Vote('KICK_DO', $target->user_no)) { //投票処理
    $ROOM->Talk($target->handle_name, 'KICK_DO', $SELF->uname); //投票しました通知
    $vote_count = AggregateVoteKick($target); //集計処理
    $DB_CONF->Commit();
    $str .= "投票完了：{$target->handle_name} さん：{$vote_count} 人目 ";
    OutputVoteResult($str . "(Kick するには {$GAME_CONF->kick} 人以上の投票が必要です)");
  }
  else {
    OutputVoteResult($str . 'データベースエラー');
  }
}

//Kick 投票の集計処理 ($target : 対象 HN, 返り値 : 対象 HN の投票合計数)
function AggregateVoteKick($target){
  global $GAME_CONF, $MESSAGE, $RQ_ARGS, $ROOM, $USERS, $SELF;

  CheckSituation('KICK_DO'); //コマンドチェック

  //今回投票した相手にすでに投票している人数を取得
  $vote_count = 1;
  foreach ($ROOM->vote as $stack) {
    if (in_array($target->user_no, $stack)) $vote_count++;
  }

  //規定数以上の投票があった / キッカーが身代わり君 / 自己 KICK が有効の場合に処理
  if ($vote_count < $GAME_CONF->kick && ! $SELF->IsDummyBoy() &&
     ! ($GAME_CONF->self_kick && $target->IsSelf())) {
    return $vote_count;
  }
  $query = "UPDATE user_entry SET live = 'kick', session_id = NULL " .
    "WHERE room_no = {$ROOM->id} AND user_no = '{$target->user_no}'";
  SendQuery($query);

  //通知処理
  $ROOM->Talk($target->handle_name . $MESSAGE->kick_out);
  $ROOM->Talk($MESSAGE->vote_reset);

  //投票リセット処理
  $ROOM->UpdateVoteCount();
  $ROOM->UpdateTime();
  return $vote_count;
}

//死者の投票処理
function VoteDeadUser(){
  global $DB_CONF, $ROOM, $SELF;

  CheckSituation('REVIVE_REFUSE'); //コマンドチェック
  if ($SELF->IsDrop())     OutputVoteResult('蘇生辞退：投票済み'); //投票済みチェック
  if ($ROOM->IsOpenCast()) OutputVoteResult('蘇生辞退：投票不要です'); //霊界公開判定

  //-- 投票処理 --//
  if (! $SELF->Update('live', 'drop')) OutputVoteResult('データベースエラー');

  //システムメッセージ
  $str = 'システム：' . $SELF->handle_name . 'さんは蘇生を辞退しました。';
  $ROOM->Talk($str, null, $SELF->uname, 'heaven', null, 'normal');

  $DB_CONF->Commit();
  OutputVoteResult('投票完了');
}

//最終更新時刻リセット投票処理 (身代わり君専用)
function VoteResetTime(){
  global $DB_CONF, $ROOM, $SELF;

  CheckSituation('RESET_TIME'); //コマンドチェック

  //-- 投票処理 --//
  $ROOM->UpdateTime(); //更新時間リセット

  //システムメッセージ
  $str = 'システム：投票制限時間をリセットしました。';
  $ROOM->Talk($str, null, $SELF->uname, $ROOM->scene, 'dummy_boy');
  $DB_CONF->Commit();
  OutputVoteResult('投票完了');
}

//開始前の投票ページ出力
function OutputVoteBeforeGame(){
  global $GAME_CONF, $ICON_CONF, $VOTE_MESS, $RQ_ARGS, $ROOM, $USERS, $SELF;

  CheckScene(); //投票する状況があっているかチェック
  OutputVotePageHeader();
  echo '<input type="hidden" name="situation" value="KICK_DO">'."\n";
  echo '<table class="vote-page"><tr>'."\n";

  $count  = 0;
  $header = '<input type="radio" name="target_no" id="';
  foreach ($USERS->rows as $id => $user) {
    if ($count > 0 && $count % 5 == 0) echo "</tr>\n<tr>\n"; //5個ごとに改行
    $count++;

    $checkbox = ! $user->IsDummyBoy() && ($GAME_CONF->self_kick || ! $user->IsSelf()) ?
      $header . $id . '" value="' . $id . '">'."\n" : '';
    echo $user->GenerateVoteTag($ICON_CONF->path . '/' . $user->icon_filename, $checkbox);
  }

  echo <<<EOF
</tr></table>
<span class="vote-message">* Kick するには {$GAME_CONF->kick} 人の投票が必要です</span>
<div class="vote-page-link" align="right"><table><tr>
<td>{$RQ_ARGS->back_url}</td>
<td><input type="submit" value="{$VOTE_MESS->kick_do}"></form></td>
<td>
<form method="POST" action="{$RQ_ARGS->post_url}">
<input type="hidden" name="vote" value="on">
<input type="hidden" name="situation" value="GAMESTART">
<input type="submit" value="{$VOTE_MESS->game_start}">
</form>
</td>
</tr></table></div>
</body></html>

EOF;
}

//昼の投票ページを出力する
function OutputVoteDay(){
  global $ICON_CONF, $VOTE_MESS, $RQ_ARGS, $ROOM, $USERS, $SELF;

  CheckScene(); //投票する状況があっているかチェック
  if ($ROOM->date == 1) OutputVoteResult('処刑：初日は投票不要です');
  $revote_count = $ROOM->revote_count;

  //投票済みチェック
  $query = $ROOM->GetQuery(true, 'vote') . " AND scene = '{$ROOM->scene}' " .
    "AND vote_count = {$ROOM->vote_count} AND revote_count = {$revote_count} " .
    "AND user_no = {$SELF->user_no}";
  if (FetchResult($query) > 0) OutputVoteResult('処刑：投票済み');
  if (isset($ROOM->event->vote_duel) && is_array($ROOM->event->vote_duel)) { //特殊イベントを取得
    $user_stack = array();
    foreach ($ROOM->event->vote_duel as $id) $user_stack[$id] = $USERS->rows[$id];
  }
  else {
    $user_stack = $USERS->rows;
  }
  $virtual_self = $USERS->ByVirtual($SELF->user_no); //仮想投票者を取得

  OutputVotePageHeader();
  echo <<<EOF
<input type="hidden" name="situation" value="VOTE_KILL">
<input type="hidden" name="revote_count" value="{$revote_count}">
<table class="vote-page"><tr>

EOF;

  $checkbox_header = "\n".'<input type="radio" name="target_no" id="';
  $count = 0;
  foreach ($user_stack as $id => $user) {
    if ($count > 0 && ($count % 5) == 0) echo "</tr>\n<tr>\n"; //5個ごとに改行
    $count++;
    $is_live = $USERS->IsVirtualLive($id);

    //生きていればユーザアイコン、死んでれば死亡アイコン
    $path = $is_live ? $ICON_CONF->path . '/' . $user->icon_filename : $ICON_CONF->dead;
    $checkbox = ($is_live && ! $user->IsSame($virtual_self->uname)) ?
      $checkbox_header . $id . '" value="' . $id . '">' : '';
    echo $user->GenerateVoteTag($path, $checkbox);
  }

  echo <<<EOF
</tr></table>
<span class="vote-message">* 投票先の変更はできません。慎重に！</span>
<div class="vote-page-link" align="right"><table><tr>
<td>{$RQ_ARGS->back_url}</td>
<td><input type="submit" value="{$VOTE_MESS->vote_do}"></td>
</tr></table></div>
</form></body></html>

EOF;
}

//死者の投票ページ出力
function OutputVoteDeadUser(){
  global $VOTE_MESS, $RQ_ARGS, $ROOM, $SELF;

  //投票済みチェック
  if ($SELF->IsDrop())     OutputVoteResult('蘇生辞退：投票済み');
  if ($ROOM->IsOpenCast()) OutputVoteResult('蘇生辞退：投票不要です');

  OutputVotePageHeader();
  echo <<<EOF
<input type="hidden" name="situation" value="REVIVE_REFUSE">
<span class="vote-message">* 投票の取り消しはできません。慎重に！</span>
<div class="vote-page-link" align="right"><table><tr>
<td>{$RQ_ARGS->back_url}</td>
<td><input type="submit" value="{$VOTE_MESS->revive_refuse}"></form></td>
</tr></table></div>
</body></html>

EOF;
}

//身代わり君 (霊界) の投票ページ出力
function OutputVoteDummyBoy(){
  global $VOTE_MESS, $RQ_ARGS, $ROOM, $SELF;

  OutputVotePageHeader();
  echo <<<EOF
<span class="vote-message">* 投票の取り消しはできません。慎重に！</span>
<div class="vote-page-link" align="right"><table><tr>
<td>{$RQ_ARGS->back_url}</td>
<td>
<input type="hidden" name="situation" value="RESET_TIME">
<input type="submit" value="{$VOTE_MESS->reset_time}"></form>
</td>

EOF;

  //蘇生辞退ボタン表示判定
  if (! $SELF->IsDrop() && $ROOM->IsOption('not_open_cast') && ! $ROOM->IsOpenCast()) {
    echo <<<EOF
<td>
<form method="POST" action="{$RQ_ARGS->post_url}">
<input type="hidden" name="vote" value="on">
<input type="hidden" name="situation" value="REVIVE_REFUSE">
<input type="submit" value="{$VOTE_MESS->revive_refuse}">
</form>
</td>

EOF;
  }

  echo <<<EOF
</tr></table></div>
</body></html>

EOF;
}

//投票済みチェック
function CheckAlreadyVote($action, $not_action = ''){
  if (CheckSelfVoteNight($action, $not_action)) OutputVoteResult('夜：投票済み');
}
