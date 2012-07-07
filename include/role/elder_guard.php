<?php
/*
  ◆老兵 (elder_guard)
  ○仕様
  ・護衛失敗：30%
  ・狩り：なし
  ・投票数：+1
*/
RoleManager::LoadFile('guard');
class Role_elder_guard extends Role_guard{
  function __construct(){ parent::__construct(); }

  function GuardFailed(){ return mt_rand(0, 9) < 3; }

  protected function IsHunt($user){ return false; }

  function FilterVoteDo(&$number){ $number++; }
}
