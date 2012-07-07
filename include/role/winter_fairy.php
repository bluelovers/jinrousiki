<?php
/*
  ◆冬妖精 (winter_fairy)
  ○仕様
  ・悪戯：発言妨害 (冬ですよー)
*/
RoleManager::LoadFile('fairy');
class Role_winter_fairy extends Role_fairy {
  public $bad_status = '冬ですよー';
  function __construct(){ parent::__construct(); }
}
