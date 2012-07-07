<?php
/*
  ◆無口 (silent)
  ○仕様
  ・発言変換：文字数制限 (GameConfig->silent_length で定義)
*/
class Role_silent extends Role{
  function __construct(){ parent::__construct(); }

  function ConvertSay(){
    global $GAME_CONF;
    $str = $this->GetStack('say');
    if(mb_strlen($str) > $GAME_CONF->silent_length){
      $this->SetStack(mb_substr($str, 0, $GAME_CONF->silent_length) . '……', 'say');
    }
  }
}
