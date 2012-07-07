<?php
/*
  ◆寿羊狐 (critical_fox)
  ○仕様
  ・仲間表示：子狐系
  ・処刑投票：痛恨付加 (妖狐系限定)
  ・勝利：妖狐系全滅
*/
RoleManager::LoadFile('child_fox');
class Role_critical_fox extends Role_child_fox{
  public $mix_in = 'critical_mad';
  public $action = NULL;
  public $result = NULL;
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){
    $stack = array();
    foreach($this->GetUser() as $user){
      if($this->IsActor($user->uname) || $user->IsFox(true)) continue;
      if($user->IsChildFox() || $user->IsRoleGroup('scarlet')) $stack[] = $user->handle_name;
    }
    OutputPartner($stack, 'child_fox_partner');
  }

  function SetVoteAction($user){
    if(! $user->IsAvoid() && $user->IsFox()) $user->AddRole('critical_luck');
  }

  function Win($winner){
    foreach($this->GetUser() as $user){
      if($user->IsLive() && $user->IsFox() && ! $user->IsChildFox()) return false;
    }
    return true;
  }
}
