<?php
require_once('include/init.php');
$INIT_CONF->LoadFile('icon_functions');
$INIT_CONF->LoadRequest('RequestIconEdit'); //引数を取得
EditIcon();

//-- 関数 --//
function EditIcon(){
  global $DB_CONF, $USER_ICON, $ICON_CONF, $RQ_ARGS;

  $title = 'ユーザアイコン編集';
  //リファラチェック
  if(CheckReferer('icon_view.php')) OutputActionResult($title, '無効なアクセスです');

  //入力データチェック
  extract($RQ_ARGS->ToArray()); //引数を展開
  $back_url = "<br>\n".'<a href="icon_view.php?icon_no=' . $icon_no . '">戻る</a>';
  if($password != $USER_ICON->password){
    OutputActionResult($title, 'パスワードが違います。' . $back_url);
  }

  //アイコン名の文字列長のチェック
  if(strlen($icon_name) < 1){
    OutputActionResult($title, 'アイコン名が空欄になっています。' . $back_url);
  }
  $query_stack = array();
  foreach(CheckIconText($title, $back_url) as $key => $value){
    $query_stack[] = "{$key} = " . (is_null($value) ? 'NULL' : "'{$value}'");
  }

  if(strlen($color) > 0){ //色指定のチェック
    $color = CheckColorString($color, $title, $back_url);
    $query_stack[] = "color = '{$color}'";
  }

  $DB_CONF->Connect(); //DB 接続

  //負荷エラー用
  $str = "サーバが混雑しています。<br>\n時間を置いてから再登録をお願いします。" . $back_url;
  if(! $DB_CONF->LockCount('icon')) OutputActionResult($title, $str); //トランザクション開始

  $query_header = 'SELECT icon_no FROM user_icon WHERE ';
  if(FetchCount($query_header . 'icon_no = ' . $icon_no) < 1){ //存在チェック
    OutputActionResult($title, '無効なアイコン番号です：' . $icon_no . $back_url);
  }

  //アイコンの名前が既に登録されていないかチェック
  if(FetchCount("{$query_header}  icon_no <> {$icon_no} AND icon_name = '{$icon_name}'") > 0){
    $str = 'アイコン名 "' . $icon_name . '" は既に登録されています。';
    OutputActionResult($title, $str . $back_url);
  }

  //編集制限チェック
  if(IsUsingIcon($icon_no)){
    $str = '募集中・プレイ中の村で使用されているアイコンは編集できません。';
    OutputActionResult($title, $str . $back_url);
  }

  //非表示フラグチェック
  if(FetchCount("{$query_header} icon_no = {$icon_no} AND disable = TRUE") > 0 !== $disable){
    $query_stack[] = 'disable = ' . ($disable ? 'TRUE' : 'FALSE');
  }

  //PrintData($query_stack);
  if(count($query_stack) < 1){
    OutputActionResult($title, '変更内容はありません' . $back_url);
  }
  $query = 'UPDATE user_icon SET ' . implode(', ', $query_stack) . ' WHERE icon_no = ' . $icon_no;
  //OutputActionResult($title, $query . $back_url); //テスト用

  if(FetchBool($query, true)){
    OutputActionResult($title, '編集完了', 'icon_view.php?icon_no=' . $icon_no);
  }
  else{
    OutputActionResult($title, $str);
  }
}
