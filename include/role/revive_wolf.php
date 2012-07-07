<?php
/*
  ◆仙狼 (revive_wolf)
  ○仕様
  ・復活：夜に死亡 + 能力が有効な場合のみ
*/
RoleManager::LoadFile('wolf');
class Role_revive_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  function Resurrect(){
    $user = $this->GetActor();
    if($user->IsActive() && ! $user->IsLovers() && $user->IsLive() && $user->IsDead(true)){
      $user->Revive();
      $user->LostAbility();
    }
  }
}
