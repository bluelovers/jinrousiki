<?php
/*
  ◆身代わり地蔵 (sacrifice_patron)
  ○仕様
  ・追加役職：庇護者
  ・人狼襲撃耐性：常時無効
*/
RoleManager::LoadFile('patron');
class Role_sacrifice_patron extends Role_patron{
  public $patron_role = 'protected';
  function __construct(){ parent::__construct(); }

  function WolfEatResist(){ return true; }
}
