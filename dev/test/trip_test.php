<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('GAME_CONF');

OutputHTMLHeader('トリップテストツール');
  echo <<<EOF
</head>
<body>
<form method="POST" action="trip_test.php">
<input type="hidden" name="command" value="on">
<label>トリップキー</label><input type="text" name="key" size="20" value="">
</form>

EOF;
if($_POST['command'] == 'on') PrintData(ConvertTrip($_POST['key']), '変換結果');
OutputHTMLFooter();
