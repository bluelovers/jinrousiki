<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('SCRIPT_INFO');

OutputHTMLHeader($SERVER_CONF->title . $SERVER_CONF->comment . ' [初期設定]'); //HTMLヘッダ

if (! $DB_CONF->Connect(true, false)) { //DB 接続
  mysql_query("CREATE DATABASE {$DB_CONF->name} DEFAULT CHARSET utf8");
  echo "データベース {$DB_CONF->name} を作成しました。<br>";
  $DB_CONF->Connect(true); //改めて DB 接続
}
echo "</head><body>\n";

CheckTable(); //テーブル作成
OutputHTMLFooter(); //HTMLフッタ

//-- クラス定義 --//
//ユーザアイコンの初期設定
//アイコンイメージをPHP設置時に追加する場合はここの設定も追加してください
class DefaultIcon {
  //アイコンデータ
  public $data = array(
     1 => array('name' => '明灰',     'file' => '001.gif', 'width' => 32, 'height' => 32,
	       'color' => '#DDDDDD'),
     2 => array('name' => '暗灰',     'file' => '002.gif', 'width' => 32, 'height' => 32,
	       'color' => '#999999'),
     3 => array('name' => '黄色',     'file' => '003.gif', 'width' => 32, 'height' => 32,
	       'color' => '#FFD700'),
     4 => array('name' => 'オレンジ', 'file' => '004.gif', 'width' => 32, 'height' => 32,
	       'color' => '#FF9900'),
     5 => array('name' => '赤',       'file' => '005.gif', 'width' => 32, 'height' => 32,
	       'color' => '#FF0000'),
     6 => array('name' => '水色',     'file' => '006.gif', 'width' => 32, 'height' => 32,
	       'color' => '#99CCFF'),
     7 => array('name' => '青',       'file' => '007.gif', 'width' => 32, 'height' => 32,
	       'color' => '#0066FF'),
     8 => array('name' => '緑',       'file' => '008.gif', 'width' => 32, 'height' => 32,
	       'color' => '#00EE00'),
     9 => array('name' => '紫',       'file' => '009.gif', 'width' => 32, 'height' => 32,
	       'color' => '#CC00CC'),
    10 => array('name' => 'さくら色', 'file' => '010.gif', 'width' => 32, 'height' => 32,
	       'color' => '#FF9999'));
}

//身代わり君アイコン
class DummyBoyIcon {
  public $path   = '../img/dummy_boy_user_icon.jpg'; //IconConfig->path からの相対パス
  public $name   = '身代わり君用'; //名前
  public $color  = '#000000'; //色
  public $width  = 45; //幅
  public $height = 45; //高さ
}

//-- 関数 --//
//必要なテーブルがあるか確認する
function CheckTable(){
  global $SERVER_CONF, $DB_CONF, $SCRIPT_INFO;

  //前回のパッケージのリビジョン番号を取得
  $revision = $SERVER_CONF->last_updated_revision;
  if ($revision >= $SCRIPT_INFO->revision) {
    echo '初期設定はすでに完了しています。';
    return;
  }
  $table_list = FetchArray('SHOW TABLES'); //テーブルのリストを取得

  //チェックしてテーブルが存在しなければ作成する
  $footer  = '<br>'."\n";
  $success = ') を追加しました';
  $failed  = ') を追加できませんでした';

  $table = 'room';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
room_no INT NOT NULL PRIMARY KEY, name TEXT, comment TEXT, max_user INT, game_option TEXT,
option_role TEXT, status VARCHAR(16), date INT, scene VARCHAR(16), vote_count INT NOT NULL,
revote_count INT NOT NULL, scene_start_time INT(20) NOT NULL, last_update_time INT(20) NOT NULL,
overtime_alert BOOLEAN NOT NULL DEFAULT 0, winner TEXT, establisher_ip TEXT,
establish_datetime DATETIME, start_datetime DATETIME, finish_datetime DATETIME,
INDEX room_index(status)
EOF;
    CreateTable($table, $query);
  }

  $table = 'user_entry';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
room_no INT NOT NULL, user_no INT, uname TEXT, handle_name TEXT, icon_no INT, profile TEXT,
sex TEXT, password TEXT, role TEXT, role_id INT, objection INT NOT NULL, live TEXT,
session_id CHAR(32) UNIQUE, last_words TEXT, ip_address TEXT, last_load_scene VARCHAR(16),
INDEX user_entry_index(room_no, user_no)
EOF;
    CreateTable($table, $query);

    //管理者を登録
    SendQuery("INSERT INTO {$table}
		(room_no, user_no, uname, handle_name, icon_no, profile, password, role, live)
		VALUES(0, 0, 'system', 'システム', 1, 'ゲームマスター',
		'{$SERVER_CONF->system_password}', 'GM', 'live')");
  }

  $table = 'player';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, room_no INT NOT NULL, date INT, scene VARCHAR(16),
user_no INT, role TEXT, INDEX player_index(room_no)
EOF;
    CreateTable($table, $query);
  }

  $table = 'talk';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, room_no INT NOT NULL, date INT, scene VARCHAR(16),
location TEXT, uname TEXT, role_id INT, objection INT NOT NULL, action TEXT, sentence TEXT,
font_type TEXT, spend_time INT, time INT(20) NOT NULL,
INDEX talk_index (room_no, date, scene)
EOF;
    CreateTable($table, $query);
  }
  if (0 < $revision && $revision < 494) {
    $query = 'ALTER TABLE talk DROP INDEX talk_index, ADD INDEX talk_index (room_no, date, scene)';
    SendQuery($query);
    echo 'テーブル (' . $table . ') のインデックスを再生成しました<br>'."\n";
  }

  $table = 'talk_beforegame';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, room_no INT NOT NULL, date INT, scene VARCHAR(16),
location TEXT, uname TEXT, handle_name TEXT, color VARCHAR(7), action TEXT, sentence TEXT,
font_type TEXT, spend_time INT, time INT(20) NOT NULL,
INDEX talk_beforegame_index(room_no)
EOF;
    CreateTable($table, $query);
  }
  if (0 < $revision && $revision < 494) {
    $query = 'ALTER TABLE talk_beforegame DROP INDEX talk_beforegame_index, ' .
      'ADD INDEX talk_beforegame_index (room_no)';
    SendQuery($query);
    echo 'テーブル (' . $table . ') のインデックスを再生成しました<br>'."\n";
  }

  $table = 'talk_aftergame';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, room_no INT NOT NULL, date INT, scene VARCHAR(16),
location TEXT, uname TEXT, action TEXT, sentence TEXT, font_type TEXT, spend_time INT,
time INT(20) NOT NULL,
INDEX talk_aftergame_index(room_no)
EOF;
    CreateTable($table, $query);
  }
  if (0 < $revision && $revision < 494) {
    $query = 'ALTER TABLE talk_aftergame DROP INDEX talk_aftergame_index, ' .
      'ADD INDEX talk_aftergame_index (room_no)';
    SendQuery($query);
    echo 'テーブル (' . $table . ') のインデックスを再生成しました<br>'."\n";
  }

  $table = 'vote';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
room_no INT NOT NULL, date INT, scene VARCHAR(16), type TEXT, uname TEXT, user_no INT,
target_no TEXT, vote_number INT, vote_count INT NOT NULL, revote_count INT NOT NULL,
INDEX vote_index(room_no, date, scene, vote_count)
EOF;
    CreateTable($table, $query);
  }

  $table = 'system_message';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
room_no INT NOT NULL, date INT, type TEXT, message TEXT,
INDEX system_message_index(room_no, date, type(10))
EOF;
    CreateTable($table, $query);
  }

  $table = 'result_ability';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
room_no INT NOT NULL, date INT, type TEXT, user_no INT, target TEXT, result TEXT,
INDEX result_ability_index(room_no, date, type(10))
EOF;
    CreateTable($table, $query);
  }

  $table = 'result_dead';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
room_no INT NOT NULL, date INT, scene VARCHAR(16), type TEXT, handle_name TEXT, result TEXT,
INDEX result_dead_index(room_no, date, scene)
EOF;
    CreateTable($table, $query);
  }

  $table = 'result_lastwords';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
room_no INT NOT NULL, date INT, handle_name TEXT, message TEXT,
INDEX result_lastwords_index(room_no, date)
EOF;
    CreateTable($table, $query);
  }

  $table = 'result_vote_kill';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, room_no INT NOT NULL, date INT, count INT,
handle_name TEXT, target_name TEXT, vote INT, poll INT,
INDEX result_vote_kill_index(room_no, date, count)
EOF;
    CreateTable($table, $query);
  }

  $table = 'user_icon';
  if (! in_array($table, $table_list)) {
    $query = <<<EOF
icon_no INT PRIMARY KEY, icon_name TEXT, icon_filename TEXT, icon_width INT, icon_height INT,
color TEXT, session_id TEXT, category TEXT, appearance TEXT, author TEXT, regist_date DATETIME,
disable BOOL
EOF;
    CreateTable($table, $query);

    //身代わり君のアイコンを登録 (No. 0)
    $class = new DummyBoyIcon(); //身代わり君アイコンの設定をロード
    SendQuery("INSERT INTO ${table}(icon_no, icon_name, icon_filename, icon_width,
		icon_height,color)
		VALUES(0, '{$class->name}', '{$class->path}', {$class->width},
		{$class->height}, '{$class->color}')");

    //初期アイコン登録
    $class = new DefaultIcon(); //ユーザアイコンの初期設定をロード
    $query = <<<EOF
INSERT INTO {$table}(icon_no, icon_name, icon_filename, icon_width, icon_height, color)
VALUES
EOF;
    foreach ($class->data as $id => $list) {
      extract($list);
      SendQuery("{$query}($id, '$name', '$file', $width, $height, '$color')");
      echo "ユーザアイコン ($id $file $name $width × $height $color) を登録しました" . $footer;
    }
  }

  $table = 'count_limit';
  if (! in_array($table, $table_list)) {
    CreateTable($table, 'count INT NOT NULL, type VARCHAR(16)');
    SendQuery("INSERT INTO {$table} (count, type) VALUES(0, 'room')");
    SendQuery("INSERT INTO {$table} (count, type) VALUES(0, 'icon')");
  }

  mysql_query("GRANT ALL ON {$DB_CONF->name}.* TO {$DB_CONF->user}");
  //$DB_CONF->Commit();
  echo '初期設定は無事完了しました' . $footer;
}

function CreateTable($table, $query) {
  if (FetchBool("CREATE TABLE {$table}({$query}) ENGINE = InnoDB")) {
    echo 'テーブル (' . $table . ') を作成しました<br>'."\n";
  }
}