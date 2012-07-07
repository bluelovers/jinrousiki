<?php
require_once('include/init.php');
$INIT_CONF->LoadClass('GAME_CONF');
$INIT_CONF->LoadRequest('RequestGameFrame'); //引数を取得
OutputFrameHTMLHeader($SERVER_CONF->title . '[プレイ]');
OutputGameFrame();
OutputFrameHTMLFooter();

//-- 関数 --//
function OutputGameFrame(){
  global $RQ_ARGS;

  $option = ' border="1" frameborder="1" framespacing="1" bordercolor="#C0C0C0"';
  if($RQ_ARGS->dead_mode){
    $url = $RQ_ARGS->url . '&dead_mode=on';
    echo <<<EOF
<frameset rows="100, *, 20%"{$option}>
<frame name="up" src="game_up.php{$url}&heaven_mode=on">
<frame name="middle" src="game_play.php{$url}">
<frame name="bottom" src="game_play.php{$RQ_ARGS->url}&heaven_mode=on">

EOF;
  }
  else{
    echo <<<EOF
<frameset rows="100, *"{$option}>
<frame name="up" src="game_up.php{$RQ_ARGS->url}">
<frame name="bottom" src="game_play.php{$RQ_ARGS->url}">

EOF;
  }
}
