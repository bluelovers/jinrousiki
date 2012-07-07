<?php
//error_reporting(E_ALL);
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadClass('SOUND');

//-- データ出力 --//
OutputHTMLHeader('SoundTest', 'game'); //HTMLヘッダ
OutputSoundTest();
OutputHTMLFooter(true);

//-- 関数定義 --//
function OutputSoundTest(){
  global $SOUND;
  $sound_list = array(
    'sound_morning',
    'sound_revote',
    'sound_entry',
    'sound_full',
    'sound_novote',
    'sound_alert');


  $str = '<form method="POST" action="sound_test.php"><table>';
  foreach($sound_list as $key => $value){
    $str .= '<tr><td><input type="submit" name="sound" value=" ' . $key . ' "></td></tr>';
  }
  $str .= '<tr><td><input type="submit" name="sound" value="Reset"></td></tr>';
  $str .= '</table></form>';

  $id = $_POST['sound'] != 'Reset' ? intval($_POST['sound']) : -1;
  if(0 <= $id && $id <= count($sound_list)) $str .= $SOUND->Generate(NULL, $sound_list[$id]);
  echo $str;
}