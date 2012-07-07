<p>
※「alpha」が付いているバージョンは、ほとんどテストを行っていません。取り扱い要注意。
</p>
<p>
※「beta」が付いているバージョンは開発チーム内の情報交換用です。基本的に安定性は保証されません。
</p>
<p>
※Ver. 1.4.0β18 よりからは <a href="http://sourceforge.jp/projects/jinrousiki/">SourceForge</a> にパッケージをアップロードしています。
</p>
<table id="download">
<caption>定置ファイル</caption>
<?php
$caption = <<<EOF
<tr class="caption">
<td>ファイル</td>
<td>拡張子</td>
<td>サイズ</td>
<td>説明</td>
<td>作成者</td>
<td>日時</td>
</tr>

EOF;
echo $caption;
?>
<tr>
<td class="link"><a href="fix/jinrousiki-1.3.1.zip">Ver. 1.3.1</a></td>
<td class="type">zip</td>
<td class="size">1.27 Mbyte</td>
<td class="explain">Ver. 1.3.1　PHPの浮動小数点数に関するバグに対応</td>
<td class="name">埋めチル</td>
<td class="date">2011/01/09</td>
</tr>
<tr>
<td class="link"><a href="fix/jinro_php_1.3.0.zip">Ver. 1.3.0</a></td>
<td class="type">zip</td>
<td class="size">1.25 Mbyte</td>
<td class="explain">Ver. 1.3.0　正式リリース。過去ログのTITLE変更、「」追加オプション実装</td>
<td class="name">お肉</td>
<td class="date">2009/07/11</td>
</tr>
<tr>
<td class="link"><a href="fix/jinro_php_1.2.3.UTF-8.zip">Ver. 1.2.3.UTF-8</a></td>
<td class="type">zip</td>
<td class="size">1.19 Mbyte</td>
<td class="explain">Ver. 1.2.2 の UTF-8 対応版（文字コード変更、旧ログ化ける）</td>
<td class="name">ねこねこ</td>
<td class="date">2009/06/23</td>
</tr>
<tr>
<td class="link"><a href="fix/jinro_php_1.2.2a.zip">Ver. 1.2.2a</a></td>
<td class="type">zip</td>
<td class="size">1.21 Mbyte</td>
<td class="explain">ソースコード Ver. 1.2.2a</td>
<td class="name">埋めチル</td>
<td class="date">2009/06/04</td>
</tr>
<tr>
<td class="link"><a href="fix/jinro_php_1.2.1.zip">Ver. 1.2.1</a>
<td class="type">zip</td>
<td class="size">1.19 Mbyte</td>
<td class="explain">ソースコード Ver. 1.2.1</td>
<td class="name">お肉</td>
<td class="date">2009/04/15</td>
</tr>
</table>
<?php
$array = array();
if($handle = opendir('html')){
  while(($file = readdir($handle)) !== false){
    if($file != '.' && $file != '..' && $file != 'index.html') $array[] = $file;
  }
  closedir($handle);
}
if(count($array) < 1) return;
rsort($array);

$str = '<table id="download">'."\n" . '<caption>アップロードされたファイル</caption>' . $caption;
foreach($array as $key => $file){
  $str .= '<tr>'."\n";
  if($html = file_get_contents('html/' . $file)){
    $str .= $html;
  }
  else{
    $str .= '<td colspan="6">読み込み失敗: ' . $file . '</td>'."\n";
  }
  $str .= '<tr>'."\n";
}
echo $str . '</table>'."\n";
