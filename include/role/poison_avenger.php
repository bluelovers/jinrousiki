<?php
/*
  ◆山わろ (poison_avenger)
  ○仕様
  ・毒：人狼系 + 妖狐陣営 + 自分の仇敵
*/
RoleManager::LoadFile('avenger');
class Role_poison_avenger extends Role_avenger{
  public $mix_in = 'poison';
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){
    return $user->IsRoleGroup('wolf', 'fox') ||
      $user->IsPartner('enemy', $this->GetActor()->user_no);
  }
}
