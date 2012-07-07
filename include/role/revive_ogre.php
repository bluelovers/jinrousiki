<?php
/*
  ◆茨木童子 (revive_ogre)
  ○仕様
  ・勝利：生存 + 嘘吐き全滅
  ・人狼襲撃：確率蘇生
*/
RoleManager::LoadFile('ogre');
class Role_revive_ogre extends Role_ogre{
  public $mix_in = 'revive_pharmacist';
  public $reduce_rate = 2;
  function __construct(){ parent::__construct(); }

  function Win($winner){
    if($this->IsDead()) return false;
    foreach($this->GetUser() as $user){
      if($user->IsLive() && $user->IsLiar()) return false;
    }
    return true;
  }

  function GetResistRate(){ return 0; }

  function Resurrect(){
    $user = $this->GetActor();
    $rate = is_null($event = $this->GetEvent()) ? 40 : $event;
    if($this->IsResurrect($user) && mt_rand(1, 100) <= $rate) $user->Revive();
  }
}
