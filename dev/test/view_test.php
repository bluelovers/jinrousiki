<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('ROOM_CONF', 'CAST_CONF', 'ICON_CONF');
$INIT_CONF->LoadFile('game_vote_functions', 'user_class');

//-- 仮想村データをセット --//
$INIT_CONF->LoadRequest('RequestBaseGame');
$RQ_ARGS->room_no = 1;
$RQ_ARGS->TestItems->test_room = array(
  'id' => $RQ_ARGS->room_no,
  'name' => '配役テスト村',
  'comment' => '',
  'game_option'  => 'dummy_boy real_time:6:4',
  'option_role' => '',
  'date' => 0,
  'scene' => 'day',
  'status' => 'waiting'
);
$RQ_ARGS->TestItems->is_virtual_room = true;
$RQ_ARGS->vote_times = 1;
$RQ_ARGS->TestItems->test_users = array();
for($id = 1; $id <= 11; $id++) $RQ_ARGS->TestItems->test_users[$id] = new User();

$RQ_ARGS->TestItems->test_users[1]->uname = 'dummy_boy';
$RQ_ARGS->TestItems->test_users[1]->handle_name = '身代わり君';
$RQ_ARGS->TestItems->test_users[1]->role = 'mage';
$RQ_ARGS->TestItems->test_users[1]->icon_filename = '../img/dummy_boy_user_icon.jpg';
$RQ_ARGS->TestItems->test_users[1]->color = '#000000';

$RQ_ARGS->TestItems->test_users[2]->uname = 'light_gray';
$RQ_ARGS->TestItems->test_users[2]->handle_name = '明灰';
$RQ_ARGS->TestItems->test_users[2]->role = 'human';

$RQ_ARGS->TestItems->test_users[3]->uname = 'dark_gray';
$RQ_ARGS->TestItems->test_users[3]->handle_name = '暗灰';
$RQ_ARGS->TestItems->test_users[3]->role = 'human';

$RQ_ARGS->TestItems->test_users[4]->uname = 'yellow';
$RQ_ARGS->TestItems->test_users[4]->handle_name = '黄色';
$RQ_ARGS->TestItems->test_users[4]->role = 'human';

$RQ_ARGS->TestItems->test_users[5]->uname = 'orange';
$RQ_ARGS->TestItems->test_users[5]->handle_name = 'オレンジ';
$RQ_ARGS->TestItems->test_users[5]->role = 'human';

$RQ_ARGS->TestItems->test_users[6]->uname = 'red';
$RQ_ARGS->TestItems->test_users[6]->handle_name = '赤';
$RQ_ARGS->TestItems->test_users[6]->role = 'human';

$RQ_ARGS->TestItems->test_users[7]->uname = 'light_blue';
$RQ_ARGS->TestItems->test_users[7]->handle_name = '水色';
$RQ_ARGS->TestItems->test_users[7]->role = 'necromancer';

$RQ_ARGS->TestItems->test_users[8]->uname = 'blue';
$RQ_ARGS->TestItems->test_users[8]->handle_name = '青';
$RQ_ARGS->TestItems->test_users[8]->role = 'guard';

$RQ_ARGS->TestItems->test_users[9]->uname = 'green';
$RQ_ARGS->TestItems->test_users[9]->handle_name = '緑';
$RQ_ARGS->TestItems->test_users[9]->role = 'wolf';

$RQ_ARGS->TestItems->test_users[10]->uname = 'purple';
$RQ_ARGS->TestItems->test_users[10]->handle_name = '紫';
$RQ_ARGS->TestItems->test_users[10]->role = 'wolf';

$RQ_ARGS->TestItems->test_users[11]->uname = 'cherry';
$RQ_ARGS->TestItems->test_users[11]->handle_name = 'さくら';
$RQ_ARGS->TestItems->test_users[11]->role = 'mad';

$icon_color_list = array('#DDDDDD', '#999999', '#FFD700', '#FF9900', '#FF0000',
			 '#99CCFF', '#0066FF', '#00EE00', '#CC00CC', '#FF9999');
foreach($RQ_ARGS->TestItems->test_users as $id => $user){
  $user->room_no = $RQ_ARGS->room_no;
  $user->user_no = $id;
  $user->sex = $id % 1 == 0 ? 'female' : 'male';
  $user->profile = '';
  $user->live = 'live';
  $user->last_load_scene = 'beforegame';
  if($id > 1){
    $user->color = $icon_color_list[($id - 2) % 10];
    $user->icon_filename = sprintf('%03d.gif', ($id - 2) % 10 + 1);
  }
}
//PrintData($RQ_ARGS->TestItems->test_users[22]);

//-- 設定調整 --//
#$CAST_CONF->decide = 11;
#$RQ_ARGS->TestItems->test_users[3]->live = 'kick';

//-- データ収集 --//
//$DB_CONF->Connect(); // DB 接続
$ROOM = new Room($RQ_ARGS); //村情報を取得
$ROOM->test_mode = true;
$ROOM->log_mode  = true;
switch($_GET['scene']){
case 'beforegame':
case 'day':
case 'night':
  $ROOM->scene = $_GET['scene'];
  break;
}
$USERS = new UserDataSet($RQ_ARGS); //ユーザ情報をロード
$SELF = $USERS->ByID(1);

//テストデータ設定
$USERS->rows[3]->live = 'dead';
$USERS->rows[7]->live = 'dead';
$USERS->rows[8]->live = 'dead';

if(false){
  switch(intval($_GET['dummy_boy'])){
  case '1':
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/icon/normal/dummy_boy/dummy_boy_01.jpg';
    break;

  case '2':
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/icon/normal/dummy_boy/dummy_boy_02.gif';
    break;

  case '3':
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/icon/normal/dummy_boy/gerd.jpg';
    break;
  }

  $dead_list = array();
  $dead = intval($_GET['dead']);
  if(array_key_exists($dead - 1, $dead_list)){
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/normal/dead/' . $dead_list[$dead];
  }

  $wolf = intval($_GET['wolf']) - 1;
  switch($wolf){
  case '0':
    $ICON_CONF->dead = $ICON_CONF->wolf;
    break;

  case '1':
  case '2':
  case '3':
  case '4':
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/normal/wolf/wolf_0' . $wolf . '.gif';
    break;
  }

  $t_dummy_list = array();
  $t_dummy = is_null($_GET['t_dummy_boy']) ? -1 : intval($_GET['t_dummy_boy']);
  if(array_key_exists($t_dummy, $t_dummy_list)){
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/icon/touhou/dummy_boy/' . $t_dummy_list[$t_dummy];
  }

  $t_wolf_list = array();
  $t_wolf = is_null($_GET['t_wolf']) ? -1 : intval($_GET['t_wolf']);
  if(array_key_exists($t_wolf, $t_wolf_list)){
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/icon/touhou/wolf/' . $t_wolf_list[$t_wolf];
  }

  $t_dead_list = array();
  $t_dead = is_null($_GET['t_dead']) ? -1 : intval($_GET['t_dead']);
  if(array_key_exists($t_dead, $t_dead_list)){
    $ICON_CONF->dead = JINRO_ROOT . '/dev/skin/icon/touhou/dead/' . $t_dead_list[$t_dead];
  }
}

//-- データ出力 --//
OutputHTMLHeader('表示テスト', 'game'); //HTMLヘッダ
echo '<link rel="stylesheet" href="' . JINRO_CSS . '/game_' . $ROOM->scene . '.css">'."\n";
echo '</head><body>'."\n";
//PrintData($ROOM->scene, $_GET['scene']);
OutputPlayerList(); //プレイヤーリスト
OutputHTMLFooter(true); //HTMLフッタ

//PrintData($USERS->rows[1]);
//PrintData($dead_list);
echo <<<EOF
[昼]：<br>
身代わり君：
<a href="view_test.php?dummy_boy=1">1</a> /
<a href="view_test.php?dummy_boy=2">2</a> /
<a href="view_test.php?dummy_boy=3">3</a><br>
人狼：
<a href="view_test.php?wolf=1">1</a> /
<a href="view_test.php?wolf=2">2</a> /
<a href="view_test.php?wolf=3">3</a> /
<a href="view_test.php?wolf=4">4</a> /
<a href="view_test.php?wolf=5">5</a><br>
死亡：
EOF;

foreach(array_keys($dead_list) as $id){
  echo '<a href="view_test.php?dead=' . $id . '">' . $id . '</a> /'."\n";
}

echo <<<EOF
<br>
身代わり君(東方)：
EOF;
foreach(array_keys($t_dummy_list) as $id){
  echo '<a href="view_test.php?t_dummy_boy=' . $id . '">' . $id . '</a> /'."\n";
}

echo <<<EOF
<br>
人狼(東方)：
EOF;
foreach(array_keys($t_wolf_list) as $id){
  echo '<a href="view_test.php?t_wolf=' . $id . '">' . $id . '</a> /'."\n";
}

echo <<<EOF
<br>
死亡(東方)：
EOF;
foreach(array_keys($t_dead_list) as $id){
  echo '<a href="view_test.php?t_dead=' . $id . '">' . $id . '</a> /'."\n";
}

echo <<<EOF
<br>
<br><br>
[夜]：<br>
身代わり君：
<a href="view_test.php?scene=night&dummy_boy=1">1</a> /
<a href="view_test.php?scene=night&dummy_boy=2">2</a> /
<a href="view_test.php?scene=night&dummy_boy=3">3</a><br>
人狼：
<a href="view_test.php?scene=night&wolf=1">1</a> /
<a href="view_test.php?scene=night&wolf=2">2</a> /
<a href="view_test.php?scene=night&wolf=3">3</a> /
<a href="view_test.php?scene=night&wolf=4">4</a> /
<a href="view_test.php?scene=night&wolf=5">5</a><br>
死亡：
EOF;
foreach(array_keys($dead_list) as $id){
  echo '<a href="view_test.php?scene=night&dead=' . $id . '">' . $id . '</a> /'."\n";
}

echo <<<EOF
<br>
身代わり君(東方)：
EOF;
foreach(array_keys($t_dummy_list) as $id){
  echo '<a href="view_test.php?scene=night&t_dummy_boy=' . $id . '">' . $id . '</a> /'."\n";
}

echo <<<EOF
<br>
人狼(東方)：
EOF;
foreach(array_keys($t_wolf_list) as $id){
  echo '<a href="view_test.php?scene=night&t_wolf=' . $id . '">' . $id . '</a> /'."\n";
}

echo <<<EOF
<br>
死亡(東方)：
EOF;
foreach(array_keys($t_dead_list) as $id){
  echo '<a href="view_test.php?scene=night&t_dead=' . $id . '">' . $id . '</a> /'."\n";
}

OutputHTMLFooter(); //HTMLフッタ
