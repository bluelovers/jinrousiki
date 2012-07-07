<?php
/*
  ◆会心 (critical_voter)
  ○仕様
  ・投票数：+100 (5% / 天候「烈日」)
*/
class Role_critical_voter extends Role {
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){
    global $ROOM;
    if ($ROOM->IsEvent('critical') || mt_rand(1, 100) <= 5) $number += 100;
  }
}
