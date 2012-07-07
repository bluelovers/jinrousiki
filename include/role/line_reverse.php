<?php
/*
  ◆天地迷彩 (line_reverse)
  ○仕様
  ・発言変換：上下置換 (行単位)

  ○問題点
  ・最後が改行だった場合はカットされる (explode + implode の仕様)
*/
class Role_line_reverse extends Role{
  function __construct(){ parent::__construct(); }

  function ConvertSay(){
    $this->SetStack(implode("\n", array_reverse(explode("\n", $this->GetStack('say')))), 'say');
  }
}
