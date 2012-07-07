<?php
require_once('include/init.php');
$INIT_CONF->LoadFile('icon_functions');
$INIT_CONF->LoadClass('SESSION');
$INIT_CONF->LoadRequest('RequestIconView'); //引数を取得
$DB_CONF->Connect(); //DB 接続

OutputHTMLHeader('ユーザアイコン一覧', 'icon_view');
echo <<<EOF
<script type="text/javascript" src="javascript/submit_icon_search.js"></script>
</head>
<body>
<a href="icon_view.php"><img class="title" src="img/icon_view_title.jpg" title="アイコン一覧"></a><br>
<div class="link">
<a href="./">←ホームページに戻る</a>
<a href="icon_upload.php">→アイコン登録</a>
</div>

EOF;
OutputIconList();
OutputHTMLFooter();
