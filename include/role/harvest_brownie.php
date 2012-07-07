<?php
/*
  ◆豊穣神 (harvest_brownie)
  ○仕様
  ・処刑得票：会心 (村人陣営) or 凍傷 (処刑)
*/
class Role_harvest_brownie extends Role {
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
	if ($user->IsDead(true) || mt_rand(0, 9) > 2) continue;
	if ($flag) {
	  $user->AddDoom(1, 'frostbite');
	}
	elseif ($user->IsCamp('human', true)) {
	  $user->AddRole('critical_voter');
	}
      }
    }
  }
}
