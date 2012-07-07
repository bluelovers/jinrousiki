<?php
require_once('include/init.php');
$INIT_CONF->LoadFile('oldlog_functions');
$INIT_CONF->LoadRequest('RequestOldLog'); //引数を取得
$DB_CONF->ChangeName($RQ_ARGS->db_no); //DB 名をセット
$DB_CONF->Connect(); //DB 接続
ob_start();
if($RQ_ARGS->is_room){
  $INIT_CONF->LoadFile('game_play_functions', 'talk_class');
  $INIT_CONF->LoadClass('ROLES', 'ICON_CONF', 'WINNER_MESS');

  $ROOM = new Room($RQ_ARGS);
  $ROOM->LoadOption();
  $ROOM->log_mode         = true;
  $ROOM->watch_mode       = $RQ_ARGS->watch;
  $ROOM->single_view_mode = $RQ_ARGS->user_no > 0;
  $ROOM->personal_mode    = $RQ_ARGS->personal_result;
  $ROOM->last_date        = $ROOM->date;

  $USERS = new UserDataSet($RQ_ARGS);
  $SELF  = $ROOM->single_view_mode ? $USERS->ByID($RQ_ARGS->user_no) : new User();
  $USERS->player = $ROOM->LoadPlayer();
  if($ROOM->watch_mode) $SELF->live = 'live';
  if($ROOM->watch_mode || $ROOM->single_view_mode) $USERS->SaveRoleList();
  OutputOldLog();
}
else{
  $INIT_CONF->LoadClass('ROOM_CONF');
  OutputFinishedRooms($RQ_ARGS->page);
}
OutputHTMLFooter();
ob_end_flush();
