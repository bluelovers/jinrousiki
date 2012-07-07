<?php
/*
  ◆共感者 (mind_sympathy)
  ○仕様
*/
class Role_mind_sympathy extends Role{
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ global $ROOM; return $ROOM->date < 2; }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date == 2) OutputSelfAbilityResult('SYMPATHY_RESULT');
  }
}
