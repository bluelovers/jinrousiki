<?php
/*
  ◆侍 (reflect_guard)
  ○仕様
  ・狩り：通常 + 鬼陣営
*/
RoleManager::LoadFile('guard');
class Role_reflect_guard extends Role_guard{
  function __construct(){ parent::__construct(); }

  protected function IsHunt($user){ return parent::IsHunt($user) || $user->IsOgre(); }
}
