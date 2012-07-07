<?php
/*
  ◆わらしべ長者 (upper_voter)
  ○仕様
  ・投票数：+1 (5日目以降)
*/
class Role_upper_voter extends Role {
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){
    global $ROOM;
    if ($ROOM->date > 4) $number++;
  }
}
