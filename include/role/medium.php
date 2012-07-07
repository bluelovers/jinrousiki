<?php
/*
  ◆巫女 (medium)
  ○仕様
*/
class Role_medium extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 1) OutputSelfAbilityResult('MEDIUM_RESULT');
  }
}
