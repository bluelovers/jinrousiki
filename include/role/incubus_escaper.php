<?php
/*
  ◆一角獣 (incubus_escaper)
  ○仕様
  ・逃亡失敗：女性以外
*/
RoleManager::LoadFile('escaper');
class Role_incubus_escaper extends Role_escaper{
  function __construct(){ parent::__construct(); }

  protected function EscapeFailed($user){ return ! $user->IsFemale(); }
}
