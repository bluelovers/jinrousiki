<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');

if (! $SERVER_CONF->debug_mode) {
  OutputActionResult('認証エラー', 'このスクリプトは使用できない設定になっています。');
}

extract($_GET, EXTR_PREFIX_ALL, 'unsafe');
$icon_no = intval($unsafe_icon_no);
$title   = 'アイコン削除[エラー]';
if ($icon_no < 1) OutputActionResult($title, '無効なアイコン番号です。');

$INIT_CONF->LoadFile('icon_functions');
$DB_CONF->Connect(); //DB 接続

$error = "サーバが混雑しています。<br>\n時間を置いてから再度アクセスしてください。";
if (! $DB_CONF->LockCount('icon')) OutputActionResult($title, $error); //トランザクション開始
if (IsUsingIcon($icon_no)) { //使用中判定
  OutputActionResult($title, '募集中・プレイ中の村で使用されているアイコンは削除できません。');
}
$file = FetchResult('SELECT icon_filename FROM user_icon WHERE icon_no = ' . $icon_no);
if ($file === false || is_null($file)) OutputActionResult($title, 'ファイルが存在しません');
if (DeleteIcon($icon_no, $file)) {
  //DB 接続解除は OutputActionResult() 経由
  $url = '../icon_upload.php';
  $str = '削除完了：登録ページに飛びます。<br>'."\n" .
    '切り替わらないなら <a href="' . $url . '">ここ</a> 。';
  OutputActionResult('アイコン削除完了', $str, $url);
}
else {
  OutputActionResult($title, $error);
}
