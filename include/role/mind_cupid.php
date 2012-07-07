<?php
/*
  ◆女神 (mind_cupid)
  ○仕様
  ・追加役職：両方に共鳴者 + 他人撃ちなら自分に受信者
*/
RoleManager::LoadFile('cupid');
class Role_mind_cupid extends Role_cupid{
  function __construct(){ parent::__construct(); }

  protected function AddCupidRole($user, $flag){
    $user->AddRole($this->GetActor()->GetID('mind_friend'));
    if(! $flag) $this->GetActor()->AddRole($user->GetID('mind_receiver'));
  }
}
