<?php
/*
  ◆霊能者 (necromancer)
  ○仕様
  ・霊能：通常
*/
class Role_necromancer extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2) OutputSelfAbilityResult(strtoupper($this->role) . '_RESULT');
  }

  //霊能
  function Necromancer($user, $flag){ return $flag ? 'stolen' : $user->DistinguishNecromancer(); }
}
