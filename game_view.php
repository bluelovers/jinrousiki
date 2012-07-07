<?php
require_once('include/init.php');
$INIT_CONF->LoadFile('talk_class');
$INIT_CONF->LoadClass('ROLES', 'ICON_CONF');

//-- データ収集 --//
$INIT_CONF->LoadRequest('RequestBaseGame'); //引数を取得
$url = '<a href="game_view.php?room_no=' . $RQ_ARGS->room_no;

$DB_CONF->Connect(); // DB 接続

$ROOM = new Room($RQ_ARGS); //村情報をロード
$ROOM->view_mode   = true;
$ROOM->system_time = TZTime(); //現在時刻を取得
switch ($ROOM->scene) {
case 'beforegame':
  $RQ_ARGS->retrive_type = $ROOM->scene;
  break;

case 'day': //昼
  $time_message = '日没まで ';
  break;

case 'night': //夜
  $time_message = '夜明けまで ';
  break;
}

//シーンに応じた追加クラスをロード
if ($ROOM->IsFinished()) {
  $INIT_CONF->LoadClass('WINNER_MESS');
}
else {
  $INIT_CONF->LoadClass('ROOM_CONF', 'CAST_CONF', 'ROOM_IMG', 'ROOM_OPT', 'GAME_OPT_MESS');
}

$USERS = new UserDataSet($RQ_ARGS); //ユーザ情報をロード
$SELF  = new User();

//-- データ出力 --//
ob_start();
OutputHTMLHeader($SERVER_CONF->title . '[観戦]', 'game_view'); //HTMLヘッダ

if ($GAME_CONF->auto_reload && $RQ_ARGS->auto_reload > 0) { //自動更新
  echo '<meta http-equiv="Refresh" content="' . $RQ_ARGS->auto_reload . '">'."\n";
}
echo $ROOM->GenerateCSS(); //シーンに合わせた文字色と背景色 CSS をロード

$on_load = '';
if ($ROOM->IsPlaying()) { //経過時間を取得
  if ($ROOM->IsRealTime()) { //リアルタイム制
    $end_time = GetRealPassTime($left_time);
    $on_load  = ' onLoad="output_realtime();"';
    OutputRealTimer($end_time);
  }
  else { //会話で時間経過制
    $INIT_CONF->LoadClass('TIME_CONF');
    $left_talk_time = GetTalkPassTime($left_time);
  }
}

echo <<<EOF
</head>
<body{$on_load}>
<table id="game_top" class="login"><tr>
{$ROOM->GenerateTitleTag()}<td class="login-link">

EOF;

if ($GAME_CONF->auto_reload) { //自動更新設定が有効ならリンクを表示
  echo $url . ($RQ_ARGS->auto_reload > 0 ? '&auto_reload=' . $RQ_ARGS->auto_reload : '') .
    '">[更新]</a>'."\n";
  OutputAutoReloadLink($url);
}
else {
  echo $url . '">[更新]</a>'."\n";
}

echo $url . '" target="_blank">別ページ</a>' . "\n" . '<a href="./">[戻る]</a>';
if ($ROOM->IsFinished()) OutputLogLink();

echo <<<EOF
</td></tr></table>
<table class="login"><tr>
<td><form method="POST" action="login.php?room_no={$ROOM->id}">
<label for="uname">ユーザ名</label><input type="text" id="uname" name="uname" size="20" value="">
<label for="login_password">パスワード</label><input type="password" class="login-password" id="login_password" name="password" size="20" value="">
<input type="hidden" name="login_manually" value="on">
<input type="submit" value="ログイン">
</form></td>

EOF;

if ($ROOM->IsBeforeGame()) { //ゲーム開始前なら登録画面のリンクを表示
  echo '<td class="login-link">';
  echo '<a href="user_manager.php?room_no=' . $ROOM->id . '"><span>[住民登録]</span></a>';
  echo '</td>'."\n";
}
echo '</tr></table>'."\n";
if (! $ROOM->IsFinished()) OutputGameOption(); //ゲームオプションを表示

OutputTimeTable(); //経過日数と生存人数
if ($ROOM->IsPlaying()) {
  if ($ROOM->IsRealTime()) { //リアルタイム制
    echo '<td class="real-time"><form name="realtime_form">'."\n";
    echo '<input type="text" name="output_realtime" size="60" readonly>'."\n";
    echo '</form></td>'."\n";
  }
  elseif ($left_talk_time) { //会話で時間経過制
    echo '<td>' . $time_message . $left_talk_time . '</td>'."\n";
  }
}
echo '</tr></table>'."\n";
if ($ROOM->IsPlaying()) {
  if ($left_time == 0) {
    echo '<div class="system-vote">' . $time_message . $MESSAGE->vote_announce . '</div>'."\n";
  }
  elseif ($ROOM->IsEvent('wait_morning')) {
    echo '<div class="system-vote">' . $MESSAGE->wait_morning . '</div>'."\n";
  }
}

OutputPlayerList(); //プレイヤーリスト
if ($ROOM->IsFinished()) OutputWinner(); //勝敗結果
if ($ROOM->IsPlaying())  OutputRevoteList(); //再投票メッセージ
OutputTalkLog();    //会話ログ
OutputLastWords();  //遺言
OutputDeadMan();    //死亡者
OutputVoteList();   //投票結果
OutputHTMLFooter(); //HTMLフッタ
ob_end_flush();
