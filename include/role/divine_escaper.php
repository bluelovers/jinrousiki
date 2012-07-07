<?php
/*
  ◆麒麟 (divine_escaper)
  ○仕様
  ・逃亡失敗：人狼系・暗殺者系・鬼陣営
  ・逃亡処理：一日村長 (村人陣営限定)
*/
RoleManager::LoadFile('escaper');
class Role_divine_escaper extends Role_escaper{
  function __construct(){ parent::__construct(); }

  protected function EscapeFailed($user){
    return $user->IsWolf() || $user->IsRoleGroup('assassin') || $user->IsOgre();
  }

  protected function EscapeAction($user){
    if($user->IsCamp('human')) $user->AddDoom(1, 'day_voter');
  }
}
