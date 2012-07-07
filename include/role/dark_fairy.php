<?php
/*
  ◆闇妖精 (dark_fairy)
  ○仕様
  ・悪戯：迷彩 (目隠し)
*/
RoleManager::LoadFile('light_fairy');
class Role_dark_fairy extends Role_light_fairy {
  public $bad_status = 'blinder';
  function __construct(){ parent::__construct(); }
}
