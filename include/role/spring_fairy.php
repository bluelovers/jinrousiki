<?php
/*
  ◆春妖精 (spring_fairy)
  ○仕様
  ・悪戯：発言妨害 (春ですよー)
*/
RoleManager::LoadFile('fairy');
class Role_spring_fairy extends Role_fairy {
  public $bad_status = '春ですよー';
  function __construct(){ parent::__construct(); }
}
