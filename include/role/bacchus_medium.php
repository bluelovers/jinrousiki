<?php
/*
  ◆神主 (bacchus_medium)
  ○仕様
  ・処刑投票：ショック死 (鬼陣営限定)
*/
RoleManager::LoadFile('medium');
class Role_bacchus_medium extends Role_medium{
  public $mix_in = 'critical_mad';
  public $sudden_death = 'DRUNK';
  function __construct(){ parent::__construct(); }

  function SetVoteAction($user){ if($user->IsOgre()) $this->SuddenDeathKill($user->user_no); }
}
