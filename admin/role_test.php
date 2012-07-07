<?php
//error_reporting(E_ALL);
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('ROOM_CONF', 'GAME_CONF', 'GAME_OPT_CONF', 'CAST_CONF', 'ROOM_OPT',
		      'GAME_OPT_MESS',  'ROLE_DATA');
$INIT_CONF->LoadFile('game_vote_functions', 'request_class');

OutputHTMLHeader('配役テストツール', 'role_table');
OutputRoleTestForm();

if (@$_POST['command'] == 'role_test') {
  $RQ_ARGS = new RequestBase();
  $RQ_ARGS->TestItems->is_virtual_room = true;

  $stack = new StdClass();
  $stack->game_option = array('dummy_boy');
  $stack->option_role = array();

  switch (@$_POST['game_option']) { //メインオプション
  case 'chaos':
  case 'chaosfull':
  case 'chaos_hyper':
  case 'chaos_verso':
  case 'duel':
  case 'gray_random':
  case 'quiz':
    $stack->game_option[] = $_POST['game_option'];
    break;

  case 'duel_auto_open_cast':
    $stack->game_option[] = 'duel';
    $stack->option_role[] = 'auto_open_cast';
    break;

  case 'duel_not_open_cast':
    $stack->game_option[] = 'duel';
    $stack->option_role[] = 'not_open_cast';
    break;
  }

  //置換系
  foreach (array('replace_human', 'change_common', 'change_mad', 'change_cupid') as $option) {
    if (! isset($_POST[$option]) || empty($_POST[$option])) continue;
    if (array_search(@$_POST[$option], $GAME_OPT_CONF->{$option.'_items'}) !== false) {
      $stack->option_role[] = $_POST[$option];
    }
  }

  //闇鍋用オプション
  foreach (array('topping', 'boost_rate') as $option) {
    if (! isset($_POST[$option]) || empty($_POST[$option])) continue;
    if (array_key_exists($_POST[$option], $GAME_OPT_CONF->{$option.'_items'})) {
      $stack->option_role[] = $option . ':' . $_POST[$option];
    }
  }

  //普通村向けオプション
  foreach (array('gerd', 'poison', 'assassin', 'wolf', 'boss_wolf', 'poison_wolf', 'possessed_wolf',
		 'fox', 'child_fox', 'cupid', 'medium', 'mania', 'detective') as $option) {
    if (@$_POST[$option] == 'on') $stack->option_role[] = $option;
  }

  foreach (array('festival') as $option) { //特殊村
    if (@$_POST[$option] == 'on') $stack->game_option[] = $option;
  }
  if (@$_POST['limit_off'] == 'on') $CAST_CONF->chaos_role_group_rate_list = array();

  $RQ_ARGS->TestItems->test_room['game_option'] = implode(' ', $stack->game_option);
  $RQ_ARGS->TestItems->test_room['option_role'] = implode(' ', $stack->option_role);
  $ROOM = new Room($RQ_ARGS);
  $ROOM->LoadOption();
  //PrintData($ROOM);

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
  global $ROOM_CONF, $GAME_OPT_CONF, $GAME_OPT_MESS;

  foreach (array('user_count' => 20, 'try_count' => 100) as $key => $value) {
    $$key = isset($_POST[$key]) && $_POST[$key] > 0 ? $_POST[$key] : $value;
  }
  $id_u = 'user_count';
  $id_t = 'try_count';
  echo <<<EOF
</head>
<body>
<form method="POST" action="role_test.php">
<input type="hidden" name="command" value="role_test">
<label for="{$id_u}">人数</label><input type="text" id="{$id_u}" name="{$id_u}" size="2" value="{$$id_u}">
<label for="{$id_t}">試行回数</label><input type="text" id="{$id_t}" name="{$id_t}" size="2" value="{$$id_t}">
<input type="submit" value=" 実 行 "><br>

EOF;

  $id = 'game_option';
  $stack = array(
    '' => '普通', 'chaos' => '闇鍋', 'chaosfull' => '真・闇鍋', 'chaos_hyper' => '超・闇鍋',
    'chaos_verso' => '裏・闇鍋', 'duel' => '決闘', 'duel_auto_open_cast' => '自動公開決闘',
    'duel_not_open_cast' => '非公開決闘', 'gray_random' => 'グレラン', 'quiz' => 'クイズ');
  $checked_key = isset($_POST[$id]) && array_key_exists($_POST[$id], $stack) ?
    $_POST[$id] : 'chaos_hyper';

  foreach ($stack as $key => $value) {
    $label = $id . '_' . $key;
    $checked = $checked_key == $key ? ' checked' : '';
    echo <<<EOF
<input type="radio" id="{$label}" name="{$id}" value="{$key}"{$checked}><label for="{$label}">{$value}</label>

EOF;
  }
  echo "<br>\n";

  foreach (array('replace_human', 'change_common', 'change_mad', 'change_cupid') as $option) {
    $count = 0;
    foreach ($GAME_OPT_CONF->{$option.'_items'} as $key => $mode) {
      if (++$count % 10 == 0) echo "<br>\n";
      if (is_int($key)) {
	$checked = '';
	$name    = $GAME_OPT_MESS->$mode;
	$value   = $mode;
      }
      else {
	$checked = ' checked';
	$name    = $mode;
	$value   = '';
      }
      $label = $option . '_' . $key;
      echo <<<EOF
<input type="radio" id="{$label}" name="{$option}" value="{$value}"{$checked}><label for="{$label}">{$name}</label>

EOF;
    }
    echo "<br>\n";
  }

  foreach (array('topping', 'boost_rate') as $option) {
    $count = 0;
    foreach ($GAME_OPT_CONF->{$option.'_items'} as $key => $mode) {
      if (++$count % 10 == 0) echo "<br>\n";
      $checked = $key == '' ? ' checked' : '';
      $label = $option . '_' . $key;
      echo <<<EOF
<input type="radio" id="{$label}" name="{$option}" value="{$key}"{$checked}><label for="{$label}">{$mode}</label>

EOF;
    }
    echo "<br>\n";
  }

  $stack = array(
     'gerd' => 'ゲルト君', 'poison' => '毒', 'assassin' => '暗殺', 'wolf' => '人狼',
     'boss_wolf' => '白狼', 'poison_wolf' => '毒狼', 'possessed_wolf' => '憑狼', 'fox' => '妖狐',
     'child_fox' => '子狐', 'cupid' => 'QP', 'medium' => '巫女', 'mania' => 'マニア',
     'detective' => '探偵', 'festival' => 'お祭り', 'limit_off' => 'リミッタオフ');
  foreach ($stack as $option => $name) {
    $label = 'option_' . $option;
    echo <<<EOF
<input type="checkbox" id="{$label}" name="{$option}" value="on"><label for="{$label}">{$name}</label>

EOF;
  }
  echo "</form>\n";
}
