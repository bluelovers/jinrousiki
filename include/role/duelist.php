<?php
/*
  ◆決闘者 (duelist)
  ○仕様
  ・追加役職：受信者 (自分→相手)
*/
RoleManager::LoadFile('valkyrja_duelist');
class Role_duelist extends Role_valkyrja_duelist{
  public $self_shoot = true;
  function __construct(){ parent::__construct(); }

  protected function AddDuelistRole($user){
    if(! $this->IsActor($user->uname)) $user->AddRole($this->GetActor()->GetID('mind_receiver'));
  }
}
