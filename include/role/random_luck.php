<?php
/*
  ◆波乱万丈 (random_luck)
  ○仕様
  ・得票数：-2 ～ +2
*/
class Role_random_luck extends Role{
  function __construct(){ parent::__construct(); }

  function FilterVotePoll(&$number){ $number += mt_rand(1, 5) - 3; }
}
