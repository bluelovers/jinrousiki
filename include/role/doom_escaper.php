<?php
/*
  ◆半鳥女 (doom_escaper)
  ○仕様
  ・逃亡失敗：死の宣告を受けた人
  ・逃亡処理：死の宣告
*/
RoleManager::LoadFile('escaper');
class Role_doom_escaper extends Role_escaper{
  function __construct(){ parent::__construct(); }

  protected function EscapeFailed($user){ return $user->IsRole('death_warrant'); }

  protected function EscapeAction($user){ $user->AddDoom(4); }
}
