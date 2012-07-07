<?php
/*
  ◆ひんな神 (critical_patron)
  ○仕様
  ・追加役職：ひんな持ち
  ・得票数：+100 (5%)
*/
RoleManager::LoadFile('patron');
class Role_critical_patron extends Role_patron{
  public $patron_role = 'occupied_luck';
  function __construct(){ parent::__construct(); }

  function FilterVotePoll(&$number){ if(mt_rand(1, 100) <= 5) $number += 100; }
}
