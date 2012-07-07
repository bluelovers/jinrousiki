<?php
/*
  ◆夢毒者 (dummy_poison)
  ○仕様
  ・毒：獏・妖精系
*/
RoleManager::LoadFile('poison');
class Role_dummy_poison extends Role_poison{
  public $display_role = 'poison';
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){
    return $user->IsRole('dream_eater_mad') || $user->IsRoleGroup('fairy');
  }
}
