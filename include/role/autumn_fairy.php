<?php
/*
  ◆秋妖精 (autumn_fairy)
  ○仕様
  ・悪戯：発言妨害 (秋ですよー)
*/
RoleManager::LoadFile('fairy');
class Role_autumn_fairy extends Role_fairy {
  public $bad_status = '秋ですよー';
  function __construct(){ parent::__construct(); }
}
