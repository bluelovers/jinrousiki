<?php
/*
  ◆夜雀 (blind_guard)
  ○仕様
  ・護衛失敗：制限なし
  ・護衛処理：目隠し
  ・狩り：なし
*/
RoleManager::LoadFile('guard');
class Role_blind_guard extends Role_guard{
  function __construct(){ parent::__construct(); }

  function GuardFailed(){ return NULL; }

  function GuardAction($user, $flag){ $user->AddRole('blinder'); }

  protected function IsHunt($user){ return false; }
}
