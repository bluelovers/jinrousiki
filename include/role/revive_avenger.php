<?php
/*
  ◆夜刀神 (revive_avenger)
  ○仕様
*/
RoleManager::LoadFile('avenger');
class Role_revive_avenger extends Role_avenger{
  public $mix_in = 'revive_pharmacist';
  function __construct(){ parent::__construct(); }
}
