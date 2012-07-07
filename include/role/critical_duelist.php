<?php
/*
  ◆剣闘士 (critical_duelist)
  ○仕様
  ・投票数：+100 (5%)
*/
RoleManager::LoadFile('valkyrja_duelist');
class Role_critical_duelist extends Role_valkyrja_duelist{
  public $self_shoot = true;
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ if(mt_rand(1, 100) <= 5) $number += 100; }
}
