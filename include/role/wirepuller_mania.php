<?php
/*
  ◆黒衣 (wirepuller_mania)
  ○仕様
  ・追加役職：入道
*/
RoleManager::LoadFile('unknown_mania');
class Role_wirepuller_mania extends Role_unknown_mania {
  function __construct(){ parent::__construct(); }

  protected function GetManiaRole($user){ return $user->GetID('wirepuller_luck'); }
}
