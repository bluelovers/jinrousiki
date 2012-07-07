<?php
/*
  ◆草原迷彩 (grassy)
  ○仕様
  ・発言変換：草追加 (一文字毎/行頭以外)
*/
class Role_grassy extends Role{
  function __construct(){ parent::__construct(); }

  function ConvertSay(){
    $say    = $this->GetStack('say');
    $result = '';
    $count  = mb_strlen($say);
    for($i = 0; $i < $count; $i++){
      $str = mb_substr($say, $i, 1);
      $result .= ($str == "\n" ? $str : $str . 'w '); //改行判定
    }
    $this->SetStack($result, 'say');
  }
}
