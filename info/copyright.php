<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('COPYRIGHT');
OutputInfoPageHeader('謝辞・素材', 0, 'info');
OutputCopyright();
OutputHTMLFooter();

//-- 関数 --//
//謝辞・素材情報出力
function OutputCopyright(){
  global $COPYRIGHT, $SCRIPT_INFO;

  $stack = $COPYRIGHT->list;
  foreach($COPYRIGHT->add_list as $class => $list){
    $stack[$class] = array_key_exists($class, $stack) ?
      array_merge($stack[$class], $list) : $list;
  }

  foreach($stack as $class => $list){
    $str = '<h2>' . $class . "</h2>\n<ul>\n";
    foreach($list as $name => $url){
      $str .= '<li><a href="' . $url . '">' . $name . "</a></li>\n";
    }
    echo $str . "</ul>\n";
  }

  $php = PHP_VERSION;
  echo <<<EOF
<h2>パッケージ情報</h2>
<ul>
<li>PHP Ver. {$php}</li>
<li>{$SCRIPT_INFO->package} {$SCRIPT_INFO->version} (Rev. {$SCRIPT_INFO->revision})</li>
<li>LastUpdate: {$SCRIPT_INFO->last_update}</li>
</ul>

EOF;
}
