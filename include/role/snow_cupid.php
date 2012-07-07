<?php
/*
  ◆寒戸婆 (snow_cupid)
  ○仕様
  ・処刑投票：凍傷付加 (恋人限定)
*/
RoleManager::LoadFile('cupid');
class Role_snow_cupid extends Role_cupid{
  public $mix_in = 'critical_mad';
  function __construct(){ parent::__construct(); }

  function SetVoteAction($user){ if($user->IsLovers()) $user->AddDoom(1, 'frostbite'); }
}
