<?php
/*
  ◆草妖精 (grass_fairy)
  ○仕様
  ・悪戯：迷彩 (草原迷彩)
*/
RoleManager::LoadFile('light_fairy');
class Role_grass_fairy extends Role_light_fairy {
  public $bad_status = 'grassy';
  function __construct(){ parent::__construct(); }
}
