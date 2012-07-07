<?php
/*
  ◆騎士 (poison_guard)
  ○仕様
  ・護衛失敗：制限なし
*/
RoleManager::LoadFile('guard');
class Role_poison_guard extends Role_guard{
  function __construct(){ parent::__construct(); }

  function GuardFailed(){ return NULL; }
}
