<?php
/*
  ◆執筆者 (scripter)
  ○仕様
  ・投票数：+1 (5日目以降)
*/
class Role_scripter extends Role{
  function __construct(){ parent::__construct(); }

  function OutputResult(){ if($this->IsActive()) OutputAbilityResult('ability_scripter', NULL); }

  function FilterVoteDo(&$number){ if($this->IsActive()) $number++; }

  private function IsActive(){ global $ROOM; return $ROOM->date > 4; }
}
