<?php
/*
  ◆精神鑑定士 (psycho_mage)
  ○仕様
  ・占い：精神鑑定
  ・呪い：無効
*/
RoleManager::LoadFile('mage');
class Role_psycho_mage extends Role_mage{
  public $mage_failed = 'mage_failed';
  function __construct(){ parent::__construct(); }

  function IsCursed($user){ return false; }

  function GetMageResult($user){ return $user->DistinguishLiar(); }
}
