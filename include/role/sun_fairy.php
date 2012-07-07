<?php
/*
  ◆日妖精 (sun_fairy)
  ○仕様
  ・悪戯：迷彩 (光学迷彩)
*/
RoleManager::LoadFile('light_fairy');
class Role_sun_fairy extends Role_light_fairy {
  public $bad_status = 'invisible';
  function __construct(){ parent::__construct(); }
}
