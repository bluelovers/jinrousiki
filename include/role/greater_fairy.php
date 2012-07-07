<?php
/*
  ◆大妖精 (greater_fairy)
  ○仕様
  ・悪戯：発言妨害 (妖精・春妖精・夏妖精・秋妖精・冬妖精相当のいずれか)
*/
RoleManager::LoadFile('fairy');
class Role_greater_fairy extends Role_fairy {
  function __construct(){ parent::__construct(); }

  protected function GetBadStatus(){
    global $MESSAGE;
    $stack = array($MESSAGE->common_talk, '春ですよー', '夏ですよー', '秋ですよー', '冬ですよー');
    return GetRandom($stack);
  }
}
