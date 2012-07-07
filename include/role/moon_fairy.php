<?php
/*
  ◆月妖精 (moon_fairy)
  ○仕様
  ・悪戯：迷彩 (耳栓)
*/
RoleManager::LoadFile('light_fairy');
class Role_moon_fairy extends Role_light_fairy {
  public $bad_status = 'earplug';
  function __construct(){ parent::__construct(); }
}
