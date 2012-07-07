<?php
/*
  ◆鈴蘭人形 (poison_doll)
  ○仕様
  ・毒：人形以外
*/
RoleManager::LoadFile('doll');
class Role_poison_doll extends Role_doll{
  public $mix_in = 'poison';
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){ return ! Role_doll::IsDoll($user); }
}
