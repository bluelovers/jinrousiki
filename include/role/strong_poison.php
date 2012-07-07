<?php
/*
  ◆強毒者 (strong_poison)
  ○仕様
  ・毒：人狼系 + 妖狐陣営
*/
RoleManager::LoadFile('poison');
class Role_strong_poison extends Role_poison{
  public $display_role = 'poison';
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){ return $user->IsRoleGroup('wolf', 'fox'); }
}
