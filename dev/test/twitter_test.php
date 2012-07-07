<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');

$DISABLE_TWITTER_TEST = true; //false にすると使用可能になる
if($DISABLE_TWITTER_TEST){
  OutputActionResult('認証エラー', 'このスクリプトは使用できない設定になっています。');
}
$INIT_CONF->LoadClass('ROOM_CONF', 'TWITTER');

//-- 投稿テスト用データ --//
$room_no      = 'xxx';
$room_name    = 'Twitter投稿テスト';
$room_comment = 'Twitter投稿テストです';

//-- 表示 --//
OutputHTMLHeader('Twitter投稿テストツール', 'game');
if($TWITTER->Send($room_no, $room_name, $room_comment)) echo 'Twitter投稿成功'."\n";
OutputHTMLFooter();
