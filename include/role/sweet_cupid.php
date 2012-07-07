<?php
/*
  ◆弁財天 (sweet_cupid)
  ○仕様
  ・追加役職：両方に共鳴者
  ・処刑投票：恋耳鳴付加
*/
RoleManager::LoadFile('cupid');
class Role_sweet_cupid extends Role_cupid{
  public $mix_in = 'critical_mad';
  function __construct(){ parent::__construct(); }

  protected function AddCupidRole($user, $flag){
    $user->AddRole($this->GetActor()->GetID('mind_friend'));
  }

  function SetVoteAction($user){ $user->AddRole('sweet_ringing'); }
}
