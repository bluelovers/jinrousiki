<?php
/*
  ◆紅葉神 (maple_brownie)
  ○仕様
  ・処刑得票：痛恨 (村人陣営) + 凍傷 (処刑)
*/
class Role_maple_brownie extends Role {
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){
    $this->InitStack();
    if ($this->IsRealActor()) $this->AddStack($uname);
  }

  function VoteKillReaction(){
    global $USERS;
    foreach (array_keys($this->GetStack()) as $uname) {
      $flag = $this->IsVoted($uname);
      foreach ($this->GetVotedUname($uname) as $voted_uname) {
	$user = $USERS->ByRealUname($voted_uname);
	if ($user->IsDead(true)) continue;
	if ($user->IsCamp('human', true) && mt_rand(0, 9) < 3) $user->AddRole('critical_luck');
	if ($flag && mt_rand(0, 9) < 3) $user->AddDoom(1, 'frostbite');
      }
    }
  }
}
