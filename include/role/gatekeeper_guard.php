<?php
/*
  ◆門番 (gatekeeper_guard)
  ○仕様
  ・狩り：なし
*/
RoleManager::LoadFile('guard');
class Role_gatekeeper_guard extends Role_guard{
  function __construct(){ parent::__construct(); }

  function SetGuard($uname){
    if(! parent::SetGuard($uname)) return false;
    $this->AddStack($uname);
    return true;
  }

  protected function IsHunt($user){ return false; }

  //対暗殺護衛
  function GuardAssassin($uname){
    global $ROOM, $USERS;

    $stack = array_keys($this->GetStack(), $uname); //護衛判定
    if(count($stack) < 1) return false;

    //護衛成功メッセージを登録
    if($ROOM->IsOption('seal_message')) return true;
    foreach($stack as $guard_uname){
      $user = $USERS->ByUname($guard_uname);
      if($user->IsFirstGuardSuccess($uname)){
	$target = $USERS->GetHandleName($uname, true);
	$ROOM->ResultAbility('GUARD_SUCCESS', 'success', $target, $user->user_no);
      }
    }
    return true;
  }
}
