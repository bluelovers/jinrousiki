<?php
/*
  ◆忍者 (fend_guard)
  ○仕様
  ・人狼襲撃耐性：無効 (一回限定)
*/
RoleManager::LoadFile('guard');
class Role_fend_guard extends Role_guard{
  function __construct(){ parent::__construct(); }

  function WolfEatResist(){
    if(! $this->GetActor()->IsActive()) return false;
    $this->GetActor()->LostAbility();
    return true;
  }
}
