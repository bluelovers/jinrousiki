<?php
/*
  ◆狂骨 (critical_avenger)
  ○仕様
*/
RoleManager::LoadFile('avenger');
class Role_critical_avenger extends Role_avenger{
  public $mix_in = 'critical_mad';
  function __construct(){ parent::__construct(); }
}
