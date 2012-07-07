<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('ROOM_CONF', 'GAME_CONF', 'TIME_CONF', 'ROOM_IMG', 'MESSAGE');
$INIT_CONF->LoadFile('feedengine');

$DB_CONF->Connect(); // DB 接続
$site_summary = FeedEngine::Initialize('site_summary.php');
echo $site_summary->Export();
