<?php
/*
  ◆おしら様 (select_assassin)
  ○仕様
  ・暗殺：オシラ遊び付加
*/
RoleManager::LoadFile('assassin');
class Role_select_assassin extends Role_assassin{
  function __construct(){ parent::__construct(); }

  function Assassin($user){ if($user->IsLive(true)) $user->AddDoom(1, 'death_selected'); }
}
