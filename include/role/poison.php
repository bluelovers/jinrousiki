<?php
/*
  ◆埋毒者 (poison)
  ○仕様
  ・毒：制限なし
*/
class Role_poison extends Role{
  function __construct(){ parent::__construct(); }

  //毒対象者選出 (処刑)
  function GetPoisonVoteTarget($list){
    global $USERS;

    $stack = array();
    $class = $this->GetClass($method = 'IsPoisonTarget');
    foreach($list as $uname){
      $user = $USERS->ByRealUname($uname);
      if($user->IsLive(true) && ! $user->IsAvoid(true) && $class->$method($user)){
	$stack[] = $user->user_no;
      }
    }
    return $stack;
  }

  //毒対象者判定
  function IsPoisonTarget($user){ return true; }
}
