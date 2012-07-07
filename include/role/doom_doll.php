<?php
/*
  ◆蓬莱人形 (doom_doll)
  ○仕様
  ・処刑：死の宣告 (人形以外)
*/
RoleManager::LoadFile('doll');
class Role_doom_doll extends Role_doll{
  function __construct(){ parent::__construct(); }

  function VoteKillCounter($list){
    global $USERS;

    $stack = array();
    foreach($list as $uname){
      $user = $USERS->ByRealUname($uname);
      if(! $user->IsAvoid() && ! $this->IsDoll($user)) $stack[] = $user->user_no;
    }
    if(count($stack) > 0) $USERS->ByID(GetRandom($stack))->AddDoom(2);
  }
}
