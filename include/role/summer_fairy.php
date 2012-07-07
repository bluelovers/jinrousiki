<?php
/*
  ◆夏妖精 (summer_fairy)
  ○仕様
  ・悪戯：発言妨害 (夏ですよー)
*/
RoleManager::LoadFile('fairy');
class Role_summer_fairy extends Role_fairy {
  public $bad_status = '夏ですよー';
  function __construct(){ parent::__construct(); }
}
