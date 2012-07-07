<?php
/*
  ◆かぐや姫 (moon_cupid)
  ○仕様
  ・追加役職：両方に難題 + 自分に受信者
*/
RoleManager::LoadFile('cupid');
class Role_moon_cupid extends Role_cupid{
  public $self_shoot = true;
  function __construct(){ parent::__construct(); }

  protected function AddCupidRole($user, $flag){
    $user->AddRole('challenge_lovers');
    if(! $this->IsActor($user->uname)) $this->GetActor()->AddRole($user->GetID('mind_receiver'));
  }
}
