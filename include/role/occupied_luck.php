<?php
/*
  ◆ひんな持ち (occupied_luck)
  ○仕様
  ・得票数：+1 (付加者生存) / +3 (付加者全滅)
*/
class Role_occupied_luck extends Role{
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ global $ROOM; return $ROOM->date < 2; }

  function FilterVotePoll(&$number){ $number += $this->IsLivePartner() ? 1 : 3; }
}
