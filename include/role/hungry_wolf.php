<?php
/*
  ◆餓狼 (hungry_wolf)
  ○仕様
  ・襲撃：人狼系・妖狐陣営以外無効
*/
RoleManager::LoadFile('wolf');
class Role_hungry_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  function IsWolfEatTarget($id){ return true; }

  function WolfEatSkip($user){ return false; }

  function WolfEatAction($user){ return ! $user->IsRoleGroup('wolf', 'fox'); }

  function WolfKill($user){
    global $USERS;
    $USERS->Kill($user->user_no, 'HUNGRY_WOLF_KILLED');
  }
}
