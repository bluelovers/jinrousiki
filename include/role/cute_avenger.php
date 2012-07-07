<?php
/*
  ◆草履大将 (cute_avenger)
  ○仕様
*/
RoleManager::LoadFile('avenger');
class Role_cute_avenger extends Role_avenger{
  public $mix_in = 'suspect';
  function __construct(){ parent::__construct(); }
}
