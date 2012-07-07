<?php
/*
  ◆鏡面迷彩 (side_reverse)
  ○仕様
  ・発言変換：左右置換 (行単位)
*/
class Role_side_reverse extends Role{
  function __construct(){ parent::__construct(); }

  function ConvertSay(){
    $say    = $this->GetStack('say');
    $result = '';
    $line   = array();
    $count  = mb_strlen($say);
    for($i = 0; $i < $count; $i++){
      $str = mb_substr($say, $i, 1);
      if($str == "\n"){
	if(count($line) > 0) $result .= implode('', array_reverse($line));
	$result .= $str;
	$line = array();
      }
      else{
	$line[] = $str;
      }
    }
    if(count($line) > 0) $result .= implode('', array_reverse($line));
    $this->SetStack($result, 'say');
  }
}
