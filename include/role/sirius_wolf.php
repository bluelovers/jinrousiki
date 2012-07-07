<?php
/*
  ◆天狼 (sirius_wolf)
  ○仕様
*/
RoleManager::LoadFile('wolf');
class Role_sirius_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $USERS;

    switch(strval(count($USERS->GetLivingWolves()))){ //覚醒状態
    case '2':
      OutputAbilityResult('ability_sirius_wolf', NULL);
      break;

    case '1':
      OutputAbilityResult('ability_full_sirius_wolf', NULL);
      break;
    }
  }
}
