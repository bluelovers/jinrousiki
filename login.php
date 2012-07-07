<?php
require_once('include/init.php');
$INIT_CONF->LoadClass('SESSION', 'GAME_CONF'); //セッションスタート
$INIT_CONF->LoadRequest('RequestLogin'); //引数を取得
$DB_CONF->Connect(); //DB 接続

//-- ログイン処理 --//
//DB 接続解除は結果出力関数が行う
if ($RQ_ARGS->login_manually) { //ユーザ名とパスワードで手動ログイン
  if (LoginManually()) {
    OutputLoginResult('ログインしました', 'game_frame');
  }
  else {
    OutputLoginResult('ログイン失敗', null, 'ユーザ名とパスワードが一致しません。<br>' .
		      '(空白と改行コードは登録時に自動で削除されている事に注意してください)');
  }
}

if ($SESSION->Certify(false)) { //セッション ID から自動ログイン
  OutputLoginResult('ログインしています', 'game_frame');
}
else { //単に呼ばれただけなら観戦ページに移動させる
  OutputLoginResult('観戦ページにジャンプ', 'game_view', '観戦ページに移動します');
}

//-- 関数 --//
//結果出力関数
function OutputLoginResult($title, $jump, $body = null){
  global $RQ_ARGS;

  if (is_null($body)) $body = $title;
  if (is_null($jump)) {
    $url = '';
  }
  else {
    $url = $jump . '.php?room_no=' . $RQ_ARGS->room_no;
    $body .= '。<br>' . "\n" . '切り替わらないなら <a href="' . $url . '" target="_top">ここ</a> 。';
  }
  OutputActionResult($title, $body, $url);
}

//手動ログイン処理
/*
  セッションを失った場合、ユーザ名とパスワードでログインする
  ログイン成功/失敗を true/false で返す
*/
function LoginManually(){
  global $SESSION, $RQ_ARGS;

  extract($RQ_ARGS->ToArray());
  if ($uname == '' || $password == '') return false;

  //$ip_address = $_SERVER['REMOTE_ADDR']; //IPアドレス取得 //現在は IP アドレス認証は行っていない
  $crypt_password = CryptPassword($password);
  //$crypt_password = $password; //デバッグ用

  //該当するユーザ名とパスワードがあるか確認
  $where = sprintf("WHERE room_no = %d AND uname = '%s' AND live <> 'kick'", $room_no, $uname);
  $query = "SELECT uname FROM user_entry {$where} AND password = '{$crypt_password}'";
  if (FetchCount($query) != 1) return false;

  //DB のセッション ID を再登録
  $session_id = $SESSION->Get(true); //新しいセッション ID を取得
  return FetchBool("UPDATE user_entry SET session_id = '{$session_id}' {$where}");
}
