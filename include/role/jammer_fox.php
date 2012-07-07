<?php
/*
  ◆月狐 (jammer_fox)
  ○仕様
  ・占い妨害：70%
*/
RoleManager::LoadFile('child_fox');
class Role_jammer_fox extends Role_child_fox{
  public $mix_in = 'jammer_mad';
  public $result = NULL;
  function __construct(){ parent::__construct(); }

  function OutputAction(){ $this->filter->OutputAction(); }

  function SetVoteNight(){ $this->filter->SetVoteNight(); }

  function SetJammer($user){
    if($this->IsJammer($user) && mt_rand(0, 9) < 7) $this->AddStack($user->uname, 'jammer');
  }
}
