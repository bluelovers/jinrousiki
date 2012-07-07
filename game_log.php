<?php
require_once('include/init.php');
$INIT_CONF->LoadFile('talk_class');
$INIT_CONF->LoadClass('SESSION', 'ROLES');

//-- データ収集 --//
$INIT_CONF->LoadRequest('RequestGameLog'); //引数を取得
$DB_CONF->Connect(); //DB 接続
$SESSION->Certify(); //セッション認証

$ROOM = new Room($RQ_ARGS); //村情報を取得
$ROOM->log_mode = true;
$ROOM->single_log_mode = true;

$USERS = new UserDataSet($RQ_ARGS); //ユーザ情報を取得
$SELF = $USERS->BySession(); //自分の情報をロード

if(! ($SELF->IsDead() || $ROOM->IsFinished())){ //死者かゲーム終了後だけ
  OutputActionResult('ログ閲覧認証エラー',
		     'ログ閲覧認証エラー：<a href="./" target="_top">トップページ</a>' .
		     'からログインしなおしてください');
}

switch($RQ_ARGS->scene){
case 'aftergame':
case 'heaven':
  if(! $ROOM->IsFinished()){ //霊界・ゲーム終了後はゲーム終了後のみ
    OutputActionResult('入力データエラー', '入力データエラー：まだゲームが終了していません');
  }
  break;

default:
  if($ROOM->date < $RQ_ARGS->date ||
     ($ROOM->date == $RQ_ARGS->date &&
      ($ROOM->IsDay() || $ROOM->scene == $RQ_ARGS->scene))){ //「未来」判定
    OutputActionResult('入力データエラー', '入力データエラー：無効な日時です');
  }

  $ROOM->last_date = $ROOM->date;
  $ROOM->date      = $RQ_ARGS->date;
  $ROOM->scene     = $RQ_ARGS->scene;
  $USERS->SetEvent(true);
  break;
}

//-- ログ出力 --//
OutputGamePageHeader(); //HTMLヘッダ

$str = '<h1>ログ閲覧 ';
switch($RQ_ARGS->scene){
case 'beforegame':
  $str .= '(開始前)';
  break;

case 'day':
  $str .= $ROOM->date . ' 日目 (昼)';
  break;

case 'night':
  $str .= $ROOM->date . ' 日目 (夜)';
  break;

case 'aftergame':
  $str .= $ROOM->date . ' 日目 (終了後)';
  break;

case 'heaven':
  $str .= '(霊界)';
  break;
}
echo $str . '</h1>'."\n";

if($RQ_ARGS->scene == 'heaven'){
  $ROOM->heaven_mode = true; //念のためセット
  OutputHeavenTalkLog(); //霊界会話ログ
}
else{
  if($RQ_ARGS->user_no > 0 && $SELF->IsDummyBoy() && $SELF->handle_name == '身代わり君'){
    $INIT_CONF->LoadFile('game_play_functions');
    $SELF = $USERS->ByID($RQ_ARGS->user_no);
    $SELF->live = 'live';
    OutputAbility();
  }
  OutputTalkLog(); //会話ログ
  if($ROOM->IsPlaying()){ //プレイ中は投票結果・遺言・死者を表示
    OutputAbilityAction();
    OutputLastWords();
    OutputDeadMan();
  }
  elseif($ROOM->IsAfterGame()){
    OutputLastWords(true); //遺言(昼終了時限定)
  }
  if($ROOM->IsNight()) OutputVoteList(); //投票結果
}
OutputHTMLFooter(); //HTMLフッタ
