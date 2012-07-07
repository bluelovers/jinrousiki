<?php
/*
  ◆影武者 (sacrifice_mania)
  ○仕様
  ・追加役職：庇護者
  ・人狼襲撃耐性：常時無効
*/
RoleManager::LoadFile('unknown_mania');
class Role_sacrifice_mania extends Role_unknown_mania {
  function __construct(){ parent::__construct(); }

  protected function GetManiaRole($user){ return $user->GetID('protected'); }

  function WolfEatResist(){ return true; }
}
