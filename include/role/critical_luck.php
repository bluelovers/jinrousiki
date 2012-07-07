<?php
/*
  ◆痛恨 (critical_luck)
  ○仕様
  ・得票数：+100 (5% / 天候「烈日」)
*/
class Role_critical_luck extends Role{
  function __construct(){ parent::__construct(); }

  function FilterVotePoll(&$number){
    global $ROOM;
    if($ROOM->IsEvent('critical') || mt_rand(1, 100) <= 5) $number += 100;
  }
}
