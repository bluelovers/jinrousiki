<?php
error_reporting(E_ALL);
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('ROOM_CONF', 'GAME_CONF', 'CAST_CONF', 'GAME_OPT_MESS', 'ROLE_DATA');
$INIT_CONF->LoadFile('game_vote_functions', 'request_class');

OutputHTMLHeader('裏・闇鍋モード配役テストツール', 'role_table');
OutputRoleTestForm();

if (@$_POST['command'] == 'role_test') {
  $RQ_ARGS = new RequestBase();
  $RQ_ARGS->TestItems->is_virtual_room = true;

  $stack = new StdClass();
  $stack->game_option = array('chaos_verso');
  $stack->option_role = array();

  $RQ_ARGS->TestItems->test_room['game_option'] = implode(' ', $stack->game_option);
  $RQ_ARGS->TestItems->test_room['option_role'] = implode(' ', $stack->option_role);
  $ROOM = new Room($RQ_ARGS);
  $ROOM->LoadOption();

  $user_count = @(int)$_POST['user_count'];
  $try_count  = @(int)$_POST['try_count'];
  $str = '%0' . strlen($try_count) . 'd回目: ';
  for ($i = 1; $i <= $try_count; $i++) {
    printf($str, $i);
    $role_list = GetRoleList($user_count);
    if ($role_list == '') break;
    PrintData(GenerateRoleNameList(array_count_values($role_list), true));
  }
}
OutputHTMLFooter(true);

function OutputRoleTestForm(){
  global $ROOM_CONF, $GAME_OPT_MESS;

  foreach (array('user_count' => 20, 'try_count' => 100) as $key => $value) {
    $$key = isset($_POST[$key]) && $_POST[$key] > 0 ? $_POST[$key] : $value;
  }
  $id_u = 'user_count';
  $id_t = 'try_count';

  echo <<<EOF
</head>
<body>
<form method="POST" action="chaos_verso.php">
<input type="hidden" name="command" value="role_test">
<label for="{$id_u}">人数</label><input type="text" id="{$id_u}" name="{$id_u}" size="2" value="{$$id_u}">
<label for="{$id_t}">試行回数</label><input type="text" id="{$id_t}" name="{$id_t}" size="2" value="{$$id_t}">
<input type="submit" value=" 実 行 "><br>
</form>

EOF;
}
