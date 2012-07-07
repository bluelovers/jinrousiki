<?php
/*
  ◆気分屋 (random_voter)
  ○仕様
  ・投票数：-1 ～ +1
*/
class Role_random_voter extends Role {
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ $number += mt_rand(0, 2) - 1; }
}
