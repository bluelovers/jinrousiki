<?php
/*
  このファイルはデータベース書き換え作業支援関数を集めたものです
  管理者が必要に応じて編集し、アップロードした後にブラウザで当ファイルに
  アクセス、という使い方を想定しています。

  開発者のテスト用コードそのままなので要注意！
*/
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');

$DISABLE_TABLE_DATA_MANIPULATOR = true; //false にすると使用可能になる
if($DISABLE_TABLE_DATA_MANIPULATOR){
  OutputActionResult('認証エラー', 'このスクリプトは使用できない設定になっています。');
}
$INIT_CONF->LoadClass('ICON_CONF');

$DB_CONF->Connect(); //DB 接続
OutputHTMLHeader('Test Tools');
//UpdateIconInfo('category', '初期設定', 1, 10);
//UpdateIconInfo('appearance', '初期設定', 1, 10);
//UpdateIconInfo('category', '東方Project', 11, 78);
//UpdateIconInfo('appearance', '東方紅魔郷', 13, 21);
//UpdateIconInfo('appearance', '東方妖々夢', 22, 33);
//UpdateIconInfo('appearance', '東方萃夢想', 34);
//UpdateIconInfo('appearance', '東方永夜抄', 35, 42);
//UpdateIconInfo('appearance', '東方花映塚', 43, 47);
//UpdateIconInfo('appearance', '東方風神録', 48, 55);
//UpdateIconInfo('appearance', '東方緋想天', 56, 57);
//UpdateIconInfo('appearance', '東方地霊殿', 58, 65);
//UpdateIconInfo('appearance', '東方香霖堂', 66, 67);
//UpdateIconInfo('appearance', '東方三月精', 68, 70);
//UpdateIconInfo('appearance', '東方求聞史紀', 71);
//UpdateIconInfo('appearance', '東方儚月抄', 72);
//UpdateIconInfo('appearance', '秘封倶楽部', 76, 77);
//UpdateIconInfo('appearance', '東方靈異伝', 91, 92);
//UpdateIconInfo('appearance', '東方夢時空', 181);
//UpdateIconInfo('appearance', '東方怪綺談', 185, 186);
//UpdateIconInfo('author', '夏蛍', 12, 77);
//ReconstructEstablishTime();
//ReconstructStartTime();
//ReconstructFinishTime();
//OptimizeTable('talk');
//DeleteUsedIcon(136, 8);
//SqueezeIcon();
//ConvertTableEncode('admin_manage');
//ConvertTableEncode('room');
//ConvertCurrentTableEncode('room', 0);
//ConvertTableEncode('system_message');
//ConvertTableEncode('talk');
//ConvertTableEncode('user_entry');
//ConvertTalkTableEncode('talk', array('uname', 'sentence'), 238);
//ConvertTableEncode('user_icon');
//ConvertTableEncode('vote');
//OutputExportIconTable();
//$DB_CONF->Commit();
OutputHTMLFooter();
//UpdateRoomInfo('room_name', 'テスト', 1);
//OutputActionResult('処理完了', '処理完了。');

//-- 関数 --//
/*
  Ver. 1.4.0 beta3 より実装されたユーザアイコンテーブルの追加情報入力支援関数
  type:[appearance / category / author] (出典 / カテゴリ / 作者)
  value: 入力内容
  from / to: 入力対象アイコン (from ～ to まで)
*/
function UpdateIconInfo($type, $value, $from, $to = NULL){
  $query = isset($to) ? "{$from} <= icon_no AND icon_no <= {$to}" : "icon_no = {$from}";
  SendQuery("UPDATE user_icon SET {$type} = '{$value}' WHERE {$query}");
}

//ファイルの IO テスト
function OpenFile($file){
  $io = file_get_contents(JINRO_ROOT . '/' . $file);
  PrintData($io);
}

//使用されているアイコンを削除する (from: 対象番号 / to: 代替番号)
/* ロック処理を再設計しているので 2.0 では使用できない */
function DeleteUsedIcon($from, $to){
  global $ICON_CONF;

  if(FetchResult("SELECT COUNT(icon_no) FROM user_icon WHERE icon_no = {$to}") < 1){
    PrintData($to, 'Invalid Icon No');
    return false;
  }
  if(LockTable('icon_delete')){
    PrintData('Lock Failed', 'icon_delete');
    return false;
  }
  if(SendQuery("UPDATE user_entry SET icon_no = {$to} WHERE icon_no = {$from}")){
    $file = FetchResult("SELECT icon_filename FROM user_icon WHERE icon_no = {$from}");
    unlink(JINRO_ROOT . '/user_icon/' . $file); //ファイルの存在をチェックしていないので要注意
    SendQuery("DELETE FROM user_icon WHERE icon_no = {$from}");
    PrintData($to, "Icon Change From {$from}");
    UnlockTable();
  }
}

//アイコンの欠番を埋める
function SqueezeIcon(){
  $query = 'SELECT icon_no, icon_filename FROM user_icon WHERE icon_no > 0 ORDER BY icon_no';
  $icon_list = FetchAssoc($query);

  $path = JINRO_ROOT . '/user_icon/';
  $query_icon = 'UPDATE user_icon SET icon_filename = ';
  $query_user = 'UPDATE user_entry SET icon_no = ';
  $icon_count = count($icon_list);
  for($i = 1; $i <= $icon_count; $i++){
    $icon = array_shift($icon_list);
    if($i == $icon['icon_no']) continue;
    $ext = array_pop(explode('.', $icon['icon_filename']));
    $file_name = sprintf("%03s.%s", $i, $ext);
    $footer = ' WHERE icon_no = ' . $icon['icon_no'];
    SendQuery($query_user . $i . $footer);
    SendQuery($query_icon . "'{$file_name}', icon_no = " . $i . $footer);
    rename($path . $icon['icon_filename'], $path . $file_name);
    PrintData($icon, $file_name);
    //break;
  }
  OptimizeTable('user_icon');
}

//村立て時刻再生成関数 (for 1.4, 1.5)
function ReconstructEstablishTime($test = false){
  $room_list = FetchArray("SELECT room_no FROM room WHERE establish_time IS NULL ORDER BY room_no");
  //PrintData($room_list);
  $keyword = '村作成：';
  foreach($room_list as $room_no){
    #if($room_no == 434) return;
    $query = "SELECT sentence, talk_id FROM talk WHERE room_no = {$room_no} AND " .
      "sentence LIKE '%{$keyword}%'";
    $talk = FetchAssoc($query, true);
    if(count($talk) > 0){
      $str = array_pop(explode($keyword, $talk['sentence']));
      if($test){
	$time = FetchResult("SELECT STR_TO_DATE('{$str}', '%Y/%m/%d (%a) %H:%i:%s')");
	PrintData($time, $room_no . ': ' . $str);
      }
      else{
	$query = "UPDATE room SET establish_time = STR_TO_DATE('{$str}', '%Y/%m/%d (%a) %H:%i:%s') " .
	  "WHERE room_no = {$room_no}";
	SendQuery($query);
	SendQuery("DELETE FROM talk WHERE talk_id = " . $talk['talk_id']);
      }
    }
    else{
      continue;
      $query = "SELECT time FROM talk WHERE room_no = {$room_no} ORDER BY talk_id";
      $talk = FetchResult($query);
      if($test){
	$time = gmdate('Y/m/d (D) H:i:s', $talk);
	$date = FetchResult('SELECT establish_time FROM room WHERE room_no = ' . $room_no);
	//$date = FetchResult("SELECT FROM_UNIXTIME('{$talk}' - 32400)");
	//$time = date('Y/m/d (D) H:i:s', $talk);
	//$date = FetchResult("SELECT FROM_UNIXTIME('{$talk}')");
	PrintData($date, $room_no . ': ' . $time);
      }
      else{
	$query = "UPDATE room SET establish_time = FROM_UNIXTIME('{$talk}' - 32400) " .
	  "WHERE room_no = {$room_no}";
	SendQuery($query);
      }
    }
  }
}

//ゲーム開始時刻再生成関数 (for 1.4, 1.5)
function ReconstructStartTime($test = false){
  $room_list = FetchArray("SELECT room_no FROM room WHERE start_time IS NULL ORDER BY room_no");
  $keyword = 'ゲーム開始：';
  //PrintData($room_list);
  foreach($room_list as $room_no){
    #if($room_no == 434) return;
    $query = "SELECT sentence, talk_id FROM talk WHERE room_no = {$room_no} " .
      "AND sentence LIKE '%{$keyword}%'";
    $talk = FetchAssoc($query, true);
    if(count($talk) > 0){
      $str = array_pop(explode($keyword, $talk['sentence']));
      if($test){
	$time = FetchResult("SELECT STR_TO_DATE('{$str}', '%Y/%m/%d (%a) %H:%i:%s')");
	PrintData($time, $room_no . ': ' . $str);
      }
      else{
	$query = "UPDATE room SET start_time = STR_TO_DATE('{$str}', '%Y/%m/%d (%a) %H:%i:%s') " .
	  "WHERE room_no = {$room_no}";
	SendQuery($query);
	SendQuery("DELETE FROM talk WHERE talk_id = " . $talk['talk_id']);
      }
    }
    else{
      continue;
      $query = "SELECT time FROM talk WHERE room_no = {$room_no} AND date = 1 ORDER BY talk_id";
      $talk = FetchResult($query);
      if($test){
	$time = gmdate('Y/m/d (D) H:i:s', $talk);
	$date = FetchResult("SELECT FROM_UNIXTIME('{$talk}' - 32400)");
	PrintData($date, $room_no . ': ' . $time);
      }
      else{
	$query = "UPDATE room SET start_time = FROM_UNIXTIME('{$talk}' - 32400) " .
	  "WHERE room_no = {$room_no}";
	SendQuery($query);
      }
    }
  }
}

//ゲーム終了時刻再生成関数 (for 1.4, 1.5)
function ReconstructFinishTime($test = false){
  $room_list = FetchArray("SELECT room_no FROM room WHERE finish_time IS NULL ORDER BY room_no");
  //PrintData($room_list);
  $keyword = 'ゲーム終了：';
  foreach($room_list as $room_no){
    #if($room_no == 434) return;
    $query = "SELECT sentence, talk_id FROM talk WHERE room_no = {$room_no} " .
      "AND sentence LIKE '%{$keyword}%'";
    $talk = FetchAssoc($query, true);
    if(count($talk) > 0){
      $str = array_pop(explode($keyword, $talk['sentence']));
      if($test){
	$time = FetchResult("SELECT STR_TO_DATE('{$str}', '%Y/%m/%d (%a) %H:%i:%s')");
	PrintData($time, $room_no . ': ' . $str);
      }
      else{
	$query = "UPDATE room SET finish_time = STR_TO_DATE('{$str}', '%Y/%m/%d (%a) %H:%i:%s') " .
	  "WHERE room_no = {$room_no}";
	SendQuery($query);
	SendQuery("DELETE FROM talk WHERE talk_id = " . $talk['talk_id']);
      }
    }
    else{
      continue;
      $query = "SELECT time FROM talk WHERE room_no = {$room_no} " .
	"AND ! (location LIKE '%aftergame%') ORDER BY talk_id DESC";
      $talk = FetchResult($query);
      if($test){
	$time = gmdate('Y/m/d (D) H:i:s', $talk);
	$date = FetchResult("SELECT FROM_UNIXTIME('{$talk}' - 32400)");
	PrintData($date, $room_no . ': ' . $time);
      }
      else{
	$query = "UPDATE room SET finish_time = FROM_UNIXTIME('{$talk}' - 32400) " .
	  "WHERE room_no = {$room_no}";
	SendQuery($query);
      }
    }
  }
}

//村情報再編集関数 (文字化け対策用)
/*
  item  : DB 項目名
  value : 入力内容
  id    : 村番号
*/
function UpdateRoomInfo($item, $value, $id){
  SendQuery("UPDATE room SET {$item} = '{$value}' WHERE room_no = {$id}");
}

//テーブルデータの文字コード変換 (for 1.4, 1.5)
/* table : TABLE  */
function ConvertTableEncode($table){
  $max = 0;
  switch($table){
  case 'admin_manage':
    $recode_list = array();
    break;

  case 'room':
    $recode_list = array('room_name', 'room_comment');
    break;

  case 'system_message':
    $recode_list = array('message');
    $room_list = FetchArray("SELECT room_no FROM {$table}");
    $alter = 'ALTER TABLE system_message_utf ADD INDEX system_message_index(room_no, date)';
    break;

  case 'talk':
    $room_list = FetchArray("SELECT room_no FROM {$table}");
    $recode_list = array('uname', 'sentence');
    $alter = array('ALTER TABLE talk_utf MODIFY talk_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY',
		   'ALTER TABLE talk_utf ADD INDEX talk_index(room_no, date, time)');
    break;

  case 'user_entry':
    $recode_list = array('uname', 'handle_name', 'profile', 'password', 'last_words');
    $room_list = FetchArray("SELECT room_no FROM {$table}");
    $alter = 'ALTER TABLE user_entry_utf ADD INDEX user_entry_index(room_no, user_no)';
    break;

  case 'user_icon':
    $recode_list = array('icon_name', 'appearance', 'category', 'author');
    break;

  case 'vote':
    $recode_list = array('uname', 'target_uname');
    $room_list = FetchArray("SELECT room_no FROM {$table}");
    $alter = 'ALTER TABLE vote_utf ADD INDEX vote_index(room_no, date)';
    break;

  default:
    return false;
  }
  $new_table = $table . '_utf';
  SendQuery("CREATE TABLE {$new_table} AS SELECT * FROM {$table}");
  if(is_array($alter)) foreach($alter as $add_query) SendQuery($alter);
  elseif(isset($alter)) SendQuery($alter);
  $query = 'SELECT ' . implode(', ', $recode_list) . ' FROM ' . $table;
  if($table == 'talk'){
    ConvertTalkTableEncode($new_table, $recode_list, 0);
  }
  elseif(is_array($room_list)){
    ConvertCurrentTableEncode($new_table, $recode_list, 0);
  }
  else{
    foreach(FetchAssoc($query) as $stack){
      foreach($recode_list as $recode){
	$from = $stack[$recode];
	$encode = mb_detect_encoding($from, 'ASCII, JIS, UTF-8, EUC-JP, SJIS');
	if($encode != '' && $encode != 'UTF-8'){
	  $to = mb_convert_encoding($from, 'UTF-8', $encode);
	  SendQuery("UPDATE {$new_table} SET {$recode} = '{$to}' WHERE {$recode} = '{$from}'");
	}
      }
    }
  }
  PrintData($new_table, 'Code Convert');
}

function ConvertCurrentTableEncode($table, $start){
  switch($table){
  case 'admin_manage':
    $recode_list = array();
    break;

  case 'room':
    $recode_list = array('room_name', 'room_comment');
    break;

  case 'system_message':
    $recode_list = array('message');
    break;

  case 'user_entry':
    $recode_list = array('uname', 'handle_name', 'profile', 'password', 'last_words');
    break;

  case 'user_icon':
    $recode_list = array('icon_name', 'appearance', 'category', 'author');
    break;

  case 'vote':
    $recode_list = array('uname', 'target_uname');
    break;

  default:
    return false;
  }

  $query = 'SELECT ' . implode(', ', $recode_list) . ' FROM ' . $table;
  $room_list = FetchArray("SELECT room_no FROM {$table} WHERE room_no > {$start} GROUP BY room_no");
  foreach($room_list as $room_no){
    foreach(FetchAssoc($query . " WHERE room_no = {$room_no}") as $stack){
      foreach($recode_list as $recode){
	$from = $stack[$recode];
	$encode = mb_detect_encoding($from, 'ASCII, JIS, UTF-8, EUC-JP, SJIS');
	if($encode != '' && $encode != 'UTF-8'){
	  $to = mb_convert_encoding($from, 'UTF-8', $encode);
	  SendQuery("UPDATE {$table} SET {$recode} = '{$to}' WHERE room_no = {$room_no} " .
		    "AND {$recode} = '{$from}'");
	}
      }
    }
  }
}

function ConvertTalkTableEncode($table, $recode_list, $start){
  $query = 'SELECT ' . implode(', ', $recode_list) . ' FROM ' . $table;
  $room_list = FetchArray("SELECT room_no FROM {$table} WHERE room_no > {$start} GROUP BY room_no");
  foreach($room_list as $room_no){
    $talk_list = FetchArray("SELECT talk_id FROM {$table} WHERE room_no = $room_no");
    foreach($talk_list as $talk_id){
      foreach(FetchAssoc($query . " WHERE room_no = {$room_no} AND talk_id = {$talk_id}") as $stack){
	foreach($recode_list as $recode){
	  $from = $stack[$recode];
	  $encode = mb_detect_encoding($from, 'ASCII, JIS, UTF-8, EUC-JP, SJIS');
	  if($encode != '' && $encode != 'UTF-8'){
	    $to = mb_convert_encoding($from, 'UTF-8', $encode);
	    SendQuery("UPDATE {$table} SET {$recode} = '{$to}' WHERE room_no = {$room_no} " .
		      "AND talk_id = {$talk_id} AND {$recode} = '{$from}'");
	  }
	}
      }
    }
  }
}

function OutputExportIconTable(){
  $query = 'SELECT * FROM user_icon ORDER BY icon_no';
  $str = 'INSERT INTO `user_icon` (`icon_no`, `icon_name`, `icon_filename`, `icon_width`, ' .
    '`icon_height`, `color`, `session_id`, `appearance`, `category`, `author`, `regist_date`, ' .
    '`disable`) VALUES'."\n".'<br>';
  foreach(FetchAssoc($query) as $stack){
    extract($stack);
    if($icon_no <= 10) continue;
    $date = is_null($regist_date) ? 'NULL' : "'$regist_date'";
    $bool = is_null($disable) ? 'NULL' : "'$disable'";
    $str .= "({$icon_no}, '{$icon_name}', '{$icon_filename}', {$icon_width}, " .
      "{$icon_height}, '{$color}', NULL, '{$appearance}', '{$category}', '{$author}', {$date}, " .
      "$bool),\n<br>";
  }
  echo $str;
}
