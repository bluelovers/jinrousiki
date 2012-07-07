<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('ROLE_DATA');

//-- 表示 --//
OutputHTMLHeader('役職名表示ツール', 'game');
OutputNameTest();
OutputHTMLFooter();

//-- 関数 --//
function OutputNameTest(){
  global $ROLE_DATA;

  echo <<<EOF
</head>
<body>
<form method="POST" action="name_test.php">
<input type="hidden" name="command" value="name_test">
<input type="submit" value=" 実 行 "><br>
<input type="radio" name="type" value="all-all" checked>全て

EOF;

  $stack = new StdClass();
  foreach (array_keys($ROLE_DATA->main_role_list) as $role) { //役職データ収集
    $stack->group[$ROLE_DATA->DistinguishRoleGroup($role)][] = $role;
    $stack->camp[$ROLE_DATA->DistinguishCamp($role, true)][] = $role;
  }
  $count = 0;
  foreach (array('camp' => '陣営', 'group' => '系') as $type => $name) {
    foreach (array_keys($stack->$type) as $role) {
      $count++;
      if ($count > 0 && $count % 9 == 0) echo "<br>\n";
      $value = $role . '-' . $type;
      $label = $ROLE_DATA->main_role_list[$role] . $name;
      echo <<<EOF
<input type="radio" name="type" id="{$value}" value="{$value}"><label for="{$value}">{$label}</label>

EOF;
    }
  }
  echo "</form>\n";

  if (@$_POST['command'] != 'name_test') return; //実行判定
  list($role, $type) = explode('-', @$_POST['type']);
  switch ($type) {
  case 'all':
    $stack = array_keys($ROLE_DATA->main_role_list);
    break;

  case 'camp':
  case 'group':
    $stack = $stack->{$type}[$role];
    break;

  default:
    return;
  }
  foreach ($stack as $role) PrintData($ROLE_DATA->GenerateMainRoleTag($role));
}
