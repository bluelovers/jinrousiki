<?php
/*
  ◆一日村長 (day_voter)
  ○仕様
  ・投票数：+1 (当日限定)
*/
class Role_day_voter extends Role {
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ return ! $this->IsDoom(); }

  function FilterVoteDo(&$number){ if ($this->IsDoom()) $number++; }
}
