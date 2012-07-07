<?php
/*
  ◆翠狐 (emerald_fox)
  ○仕様
  ・占い：共鳴者付加
*/
RoleManager::LoadFile('fox');
class Role_emerald_fox extends Role_fox{
  public $mix_in = 'mage';
  public $action = 'MAGE_DO';
  function __construct(){ parent::__construct(); }

  function OutputAction(){
    if($this->GetActor()->IsActive()) OutputVoteMessage('mage-do', 'mage_do', $this->action);
  }

  function IgnoreVote(){
    if(! is_null($str = parent::IgnoreVote())) return $str;
    return $this->GetActor()->IsActive() ? NULL : '能力喪失しています';
  }

  function Mage($user){
    if($this->IsJammer($user) || $this->IsCursed($user) || ! $user->IsFox() ||
       ! ($user->IsChildFox() || $user->IsLonely())) return false;
    $role = $this->GetActor()->GetID('mind_friend');
    $this->GetActor()->LostAbility();
    $this->GetActor()->AddRole($role);
    $user->AddRole($role);
  }
}
