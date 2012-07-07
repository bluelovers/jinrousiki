<?php
/*
  ◆暴君 (critical_common)
  ○仕様
  ・投票数：+1
  ・得票数：+100 (5%)
*/
RoleManager::LoadFile('common');
class Role_critical_common extends Role_common{
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ $number++; }

  function FilterVotePoll(&$number){ if(mt_rand(1, 100) <= 5) $number += 100; }
}
