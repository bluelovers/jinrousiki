<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputFrameHTMLHeader('[情報一覧]');
echo <<< EOF
<frameset cols="180, *" border="1" frameborder="1" framespacing="1" bordercolor="#C0C0C0">
<frame name="menu" src="menu.php">
<frame name="body" src="history">

EOF;
OutputFrameHTMLFooter();
