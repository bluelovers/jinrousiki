<?php
/*
  ◆錬金術師 (alchemy_pharmacist)
  ○仕様
  ・毒能力鑑定/毒対象変化
  ・毒対象制限：村人陣営以外
*/
RoleManager::LoadFile('pharmacist');
class Role_alchemy_pharmacist extends Role_pharmacist{
  public $mix_in = 'poison';
  function __construct(){ parent::__construct(); }

  protected function SetDetoxFlag($uname){
    if(! $this->GetActor()->detox) $this->GetActor()->{$this->role} = true;
  }

  function IsPoisonTarget($user){ return ! $user->IsCamp('human'); }
}
