<?php
require_once('include/init.php');
$INIT_CONF->LoadClass('GAME_CONF');
$INIT_CONF->LoadRequest('RequestGameUp'); //引数を取得
OutputHTMLHeader($SERVER_CONF->title . '[発言]', 'game_up');
OutputGameUp();
OutputHTMLFooter();

//-- 関数 --//
function OutputGameUp(){
  global $RQ_ARGS;

  $header = '<form method="POST" action="game_play.php' . $RQ_ARGS->url . '" target="bottom" ';
  $reload = $header . 'name="reload_game"></form>'; //自動リロード用ダミー送信フォーム

  //送信用フォーム
  //霊話モードの時は発言用フレームでリロード・書き込みしたときに真ん中のフレームもリロードする
  $submit = $header . 'class="input-say" name="send" onSubmit="';
  if($RQ_ARGS->heaven_mode) $submit .= 'reload_middle_frame();';
  $submit .= 'set_focus();">';
  echo <<<EOF
<link rel="stylesheet" id="scene">
<script type="text/javascript" src="javascript/game_up.js"></script>
</head>
<body onLoad="set_focus(); reload_game();">
<a id="game_top"></a>
{$reload}
{$submit}
<table><tr>
<td><textarea name="say" rows="3" cols="70" wrap="soft"></textarea></td>
<td>
<input type="submit" onclick="setTimeout(&quot;auto_clear()&quot;, 10)" value="送信/リロード"><br>
<select name="font_type">
<option value="strong">強く発言する</option>
<option value="normal" selected>通常通り発言する</option>
<option value="weak">弱く発言する</option>
<option value="last_words">遺言を残す</option>
</select><br>
[<a class="vote" href="game_vote.php{$RQ_ARGS->url}">投票/占う/護衛</a>]
<a class="top-link" href="./" target="_top">TOP</a>
</td>
</tr></table>
</form>

EOF;
}
