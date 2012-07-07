<?php
/*
  ◆前鬼 (orange_ogre)
  ○仕様
  ・勝利：生存 + 人狼陣営全滅
*/
RoleManager::LoadFile('ogre');
class Role_orange_ogre extends Role_ogre{
  function __construct(){ parent::__construct(); }

  function Win($winner){
    if($winner == 'wolf' || $this->IsDead()) return false;
    foreach($this->GetUser() as $user){
      if($user->IsLive() && $user->IsCamp('wolf', true)) return false;
    }
    return true;
  }
}
