<?php
require_once('include/init.php');
if(FindDangerValue($_FILES)) die;
$INIT_CONF->LoadFile('icon_functions');
$INIT_CONF->LoadClass('SESSION');

if($USER_ICON->disable_upload){
  OutputActionResult('ユーザアイコンアップロード', '現在アップロードは停止しています');
}
$INIT_CONF->LoadRequest('RequestIconUpload'); //引数を取得
isset($RQ_ARGS->command) ? UploadIcon() : OutputUploadIconPage();

//-- 関数 --//
//投稿データチェック
function UploadIcon(){
  global $DB_CONF, $ICON_CONF, $USER_ICON, $RQ_ARGS, $SESSION;

  if(CheckReferer('icon_upload.php')){ //リファラチェック
    OutputActionResult('ユーザアイコンアップロード', '無効なアクセスです');
  }
  $title    = 'アイコン登録エラー'; // エラーページ用タイトル
  $back_url = '<br>'. "\n" . '<a href="icon_upload.php">戻る</a>';
  $query_no = ' WHERE icon_no = ' . $RQ_ARGS->icon_no;

  switch($RQ_ARGS->command){
  case 'upload':
    break;

  case 'success': //セッション ID 情報を DB から削除
    $DB_CONF->Connect();
    $url = 'icon_view.php';
    $str = '登録完了：アイコン一覧のページに飛びます。<br>'."\n" .
      '切り替わらないなら <a href="' . $url . '">ここ</a> 。';
    if(! FetchBool('UPDATE user_icon SET session_id = NULL' . $query_no)){
      $str .= "\nセッションの削除に失敗しました。";
    }
    OutputActionResult('アイコン登録完了', $str, $url);
    break;

  case 'cancel': //アイコン削除
    //負荷エラー用
    $str = "サーバが混雑しているため、削除に失敗しました。<br>\n管理者に問い合わせてください。";

    $DB_CONF->Connect(); //DB 接続
    //トランザクション開始
    if(! $DB_CONF->LockCount('icon')) OutputActionResult($title, $str . $back_url);

    //アイコンのファイル名と登録時のセッション ID を取得
    $stack = FetchAssoc('SELECT icon_filename, session_id FROM user_icon' . $query_no, true);
    if(count($stack) < 1) OutputActionResult($title, $str . $back_url);
    extract($stack);

    if($session_id != $SESSION->Get()){ //セッション ID 確認
      $str = '削除失敗：アップロードセッションが一致しません';
      OutputActionResult('アイコン削除失敗', $str . $back_url);
    }

    if(! DeleteIcon($RQ_ARGS->icon_no, $icon_filename)){ //削除処理
      OutputActionResult($title, $str . $back_url);
    }
    $DB_CONF->Disconnect(); //DB 接続解除

    $url = 'icon_upload.php';
    $str = '削除完了：登録ページに飛びます。<br>'."\n" .
      '切り替わらないなら <a href="' . $url . '">ここ</a> 。';
    OutputActionResult('アイコン削除完了', $str, $url);
    break;

  default:
    OutputActionResult($title, '無効なコマンドです' . $back_url);
    break;
  }

  //アップロードされたファイルのエラーチェック
  if($_FILES['upfile']['error'][$i] != 0){
    $str = "ファイルのアップロードエラーが発生しました。<br>\n再度実行してください。";
    OutputActionResult($title, $str . $back_url);
  }
  extract($RQ_ARGS->ToArray()); //引数を展開

  //空白チェック
  if($icon_name == '') OutputActionResult($title, 'アイコン名を入力してください' . $back_url);
  CheckIconText($title, $back_url); //アイコン名の文字列長のチェック
  $color = CheckColorString($color, $title, $back_url); //色指定のチェック

  //ファイルサイズのチェック
  if($size == 0) OutputActionResult($title, 'ファイルが空です' . $back_url);
  if($size > $USER_ICON->size){
    OutputActionResult($title, 'ファイルサイズは ' . $USER_ICON->MaxFileSize() . $back_url);
  }

  //ファイルの種類のチェック
  switch($type){
  case 'image/jpeg':
  case 'image/pjpeg':
    $ext = 'jpg';
    break;

  case 'image/gif':
    $ext = 'gif';
    break;

  case 'image/png':
  case 'image/x-png':
    $ext = 'png';
    break;

  default:
    $str = $type . ' : jpg、gif、png 以外のファイルは登録できません';
    OutputActionResult($title, $str . $back_url);
    break;
  }

  //アイコンの高さと幅をチェック
  list($width, $height) = getimagesize($tmp_name);
  if($width > $USER_ICON->width || $height > $USER_ICON->height){
    $str = 'アイコンは ' . $USER_ICON->MaxIconSize() . ' しか登録できません。<br>'."\n" .
      '送信されたファイル → <span class="color">幅 ' . $width . '、高さ ' . $height . '</span>';
    OutputActionResult($title, $str . $back_url);
  }

  //負荷エラー用
  $str = "サーバが混雑しています。<br>\n時間を置いてから再登録をお願いします。" . $back_url;
  $DB_CONF->Connect(); //DB 接続
  if(! $DB_CONF->LockCount('icon')) OutputActionResult($title, $str); //トランザクション開始

  //登録数上限チェック
  if(FetchResult('SELECT COUNT(icon_no) FROM user_icon') >= $USER_ICON->number){
    OutputActionResult($title, 'これ以上登録できません');
  }

  //アイコン名チェック
  if(FetchResult("SELECT COUNT(icon_no) FROM user_icon WHERE icon_name = '{$icon_name}'") > 0){
    $str = 'アイコン名 "' . $icon_name . '" は既に登録されています';
    OutputActionResult($title, $str . $back_url);
  }

  $icon_no = FetchResult('SELECT MAX(icon_no) + 1 FROM user_icon'); //次のアイコン No を取得
  if($icon_no === false) OutputActionResult($title, $str); //負荷エラー対策

  //ファイルをテンポラリからコピー
  $file_name = sprintf("%03s.%s", $icon_no, $ext); //ファイル名の桁を揃える
  if(! move_uploaded_file($tmp_name, $ICON_CONF->path . '/' . $file_name)){
    $str = "ファイルのコピーに失敗しました。<br>\n再度実行してください。";
    OutputActionResult($title, $str . $back_url);
  }

  //データベースに登録
  $data = '';
  $session_id = $SESSION->Reset(); //セッション ID を取得
  $items = 'icon_no, icon_name, icon_filename, icon_width, icon_height, color, ' .
    'session_id, regist_date';
  $values = "{$icon_no}, '{$icon_name}', '{$file_name}', {$width}, {$height}, '{$color}', " .
    "'{$session_id}', NOW()";

  if($appearance != ''){
    $data .= '<br>[S]' . $appearance;
    $items .= ', appearance';
    $values .= ", '{$appearance}'";
  }
  if($category != ''){
    $data .= '<br>[C]' . $category;
    $items .= ', category';
    $values .= ", '{$category}'";
  }
  if($author != ''){
    $data .= '<br>[A]' . $author;
    $items .= ', author';
    $values .= ", '{$author}'";
  }

  if(InsertDatabase('user_icon', $items, $values)){
    $DB_CONF->Commit();
    $DB_CONF->Disconnect(); //DB 接続解除
  }
  else{
    OutputActionResult($title, $str);
  }

  //確認ページを出力
  OutputHTMLHeader('ユーザアイコンアップロード処理[確認]', 'icon_upload_check');
  echo <<<EOF
</head>
<body>
<p>ファイルをアップロードしました。<br>今だけやりなおしできます</p>
<p>[S] 出典 / [C] カテゴリ / [A] アイコンの作者</p>
<table><tr>
<td><img src="{$ICON_CONF->path}/{$file_name}" width="{$width}" height="{$height}"></td>
<td class="name">No. {$icon_no} {$icon_name}<br><font color="{$color}">◆</font>{$color}{$data}</td>
</tr>
<tr><td colspan="2">よろしいですか？</td></tr>
<tr><td><form method="POST" action="icon_upload.php">
  <input type="hidden" name="command" value="cancel">
  <input type="hidden" name="icon_no" value="$icon_no">
  <input type="submit" value="やりなおし">
</form></td>
<td><form method="POST" action="icon_upload.php">
  <input type="hidden" name="command" value="success">
  <input type="hidden" name="icon_no" value="{$icon_no}">
  <input type="submit" value="登録完了">
</form></td></tr></table>
</body></html>

EOF;
}

//アップロードフォーム出力
function OutputUploadIconPage(){
  global $USER_ICON;

  OutputHTMLHeader('ユーザアイコンアップロード', 'icon_upload');
  $name_length = $USER_ICON->MaxNameLength();
  $cation = isset($USER_ICON->cation) ? '<br>' . $USER_ICON->cation : '';

  echo <<<EOF
</head>
<body>
<a href="./">←戻る</a><br>
<img class="title" src="img/icon_upload_title.jpg" title="アイコン登録" alt="アイコン登録"><br>
<table align="center">
<tr><td class="link"><a href="icon_view.php">→アイコン一覧</a></td><tr>
<tr><td class="caution">＊あらかじめ指定する大きさ ({$USER_ICON->MaxIconSize()}) にリサイズしてからアップロードしてください。{$cation}</td></tr>
<tr><td>
<fieldset><legend>アイコン指定 (jpg / gif / png 形式で登録して下さい。{$USER_ICON->MaxFileSize()})</legend>
<form method="POST" action="icon_upload.php" enctype="multipart/form-data">
<table>
<tr><td><label>ファイル選択</label></td>
<td>
<input type="file" name="file" size="80">
<input type="hidden" name="max_file_size" value="{$USER_ICON->size}">
<input type="hidden" name="command" value="upload">
<input type="submit" value="登録">
</td></tr>

<tr><td><label>アイコンの名前</label></td>
<td><input type="text" name="icon_name" maxlength="{$USER_ICON->name}" size="{$USER_ICON->name}">{$name_length}</td></tr>

<tr><td><label>出典</label></td>
<td><input type="text" name="appearance" maxlength="{$USER_ICON->name}" size="{$USER_ICON->name}">{$name_length}</td></tr>

<tr><td><label>カテゴリ</label></td>
<td><input type="text" name="category" maxlength="{$USER_ICON->name}" size="{$USER_ICON->name}">{$name_length}</td></tr>

<tr><td><label>アイコンの作者</label></td>
<td><input type="text" name="author" maxlength="{$USER_ICON->name}" size="{$USER_ICON->name}">{$name_length}</td></tr>

<tr><td><label>アイコン枠の色</label></td>
<td>
<input id="fix_color" type="radio" name="color"><label for="fix_color">手入力</label>
<input type="text" name="color" size="10px" maxlength="7">(例：#6699CC)
</td></tr>

<tr><td colspan="2">
<table class="color" align="center">
<tr>

EOF;

  $color_base = array();
  for($i = 0; $i < 256; $i += 51) $color_base[] = sprintf('%02X', $i);

  $color_list = array();
  foreach($color_base as $i => $r){
    foreach($color_base as $j => $g){
      foreach($color_base as $k => $b){
	$color_list["#{$r}{$g}{$b}"] = ($i + $j + $k) < 8  && ($i + $j) < 5;
      }
    }
  }

  $count = 0;
  foreach($color_list as $color => $bright){
    if($count > 0 && ($count % 6) == 0) echo "</tr>\n<tr>\n"; //6個ごとに改行
    $count++;

    echo <<<EOF
<td bgcolor="{$color}"><label for="{$color}"><input type="radio" id="{$color}" name="color" value="{$color}">
EOF;

    if($bright) $color = '<font color="#FFFFFF">' . $color . '</font>';
    echo $color . "</label></td>\n";
  }
  echo <<<EOF
</tr>
</table>

</td></tr></table></form></fieldset>
</td></tr></table>
</body></html>

EOF;
}
