<?php
/*
  ◆狡狼 (trap_wolf)
  ○仕様
*/
RoleManager::LoadFile('wolf');
class Role_trap_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2) OutputAbilityResult('ability_trap_wolf', NULL);
  }

  function SetTrap($uname){ $this->AddStack($uname, 'trap'); }
}
