<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
OutputHTMLHeader('開発版ソースダウンロード', 'src');
?>
</head>
<body>
<a href="../">←戻る</a><br>
<?php include_once('download.php'); ?>

<form method="POST" action="upload.php" enctype="multipart/form-data">
<table id="upload">
<tr>
  <td><label>ファイル選択</label></td>
  <td><input type="file" name="file" size="60"></td>
</tr>
<tr>
  <td><label>ファイル名</label></td>
  <td><input type="text" name="name" maxlength="20" size="20"></td>
</tr>
<tr>
  <td><label>ファイルの説明</label></td>
  <td><input type="text" name="caption" maxlength="80" size="80"></td>
</tr>
<tr>
  <td><label>作成者名</label></td>
  <td><input type="text" name="user" maxlength="20" size="20"></td>
</tr>
<tr>
  <td><label>パスワード</label></td>
  <td><input type="password" name="password" maxlength="20" size="20"></td>
</tr>
<tr>
  <td><input type="submit" value="アップロード"></td>
  <td><label>対応拡張子は zip, lzh のみ</label></td>
</tr>
</table>
</form>
</body></html>
