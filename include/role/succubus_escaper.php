<?php
/*
  ◆水妖姫 (succubus_escaper)
  ○仕様
  ・逃亡失敗：男性以外
*/
RoleManager::LoadFile('escaper');
class Role_succubus_escaper extends Role_escaper{
  function __construct(){ parent::__construct(); }

  protected function EscapeFailed($user){ return ! $user->IsMale(); }
}
