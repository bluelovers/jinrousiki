<?php
/*
  ◆縁切地蔵 (divorce_jealousy)
  ○仕様
  ・処刑得票：恋色迷彩付加 (恋人・一定確率)
*/
RoleManager::LoadFile('jealousy');
class Role_divorce_jealousy extends Role_jealousy{
  function __construct(){ parent::__construct(); }

  function VoteKillReaction(){
    global $USERS;
    foreach(array_keys($this->GetStack()) as $uname){
      if($this->IsVoted($uname)) continue;
      foreach($this->GetVotedUname($uname) as $voted_uname){
	$user = $USERS->ByRealUname($voted_uname);
	if($user->IsLive(true) && $user->IsLovers() && mt_rand(0, 9) < 4) $user->AddRole('passion');
      }
    }
  }
}
