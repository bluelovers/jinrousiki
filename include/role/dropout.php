<?php
/*
  ◆脱落者 (dropout)
  ○仕様
  ・処刑者決定：自分 + 自身と処刑投票が最多得票者
*/
RoleManager::LoadFile('decide');
class Role_dropout extends Role_decide{
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ $this->AddStack($uname); }

  function DecideVoteKill(){
    if($this->IsVoteKill()) return;
    $stack = $this->GetVotePossible();
    foreach($this->GetStack() as $actor => $target){
      if(in_array($actor,  $stack) && in_array($target, $stack)) $this->SetVoteKill($actor);
    }
  }
}
