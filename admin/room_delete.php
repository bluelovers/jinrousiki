<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');

if (! $SERVER_CONF->debug_mode) {
  OutputActionResult('認証エラー', 'このスクリプトは使用できない設定になっています。');
}

extract($_GET, EXTR_PREFIX_ALL, 'unsafe');
$room_no = intval($unsafe_room_no);
if ($room_no < 1) OutputActionResult('部屋削除[エラー]', '無効な村番号です。');

$DB_CONF->Connect(); //DB 接続
if ($DB_CONF->LockCount('room') && DeleteRoom($room_no)) {
  OptimizeTable();
  OutputActionResult('部屋削除', $room_no . ' 番地を削除しました。トップページに戻ります。', '../');
}
else {
  OutputActionResult('部屋削除[エラー]', $room_no . ' 番地の削除に失敗しました。');
}
