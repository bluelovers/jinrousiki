<?php
/*
  ◆執行者 (executor)
  ○仕様
  ・役職表示：村人
  ・処刑者決定：同一投票先 + 非村人
*/
class Role_executor extends Role{
  public $mix_in = 'decide';
  public $display_role = 'human';
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ if($this->IsRealActor()) $this->AddStack($uname); }

  function DecideVoteKill(){
    global $USERS;

    if($this->IsVoteKill() || ! is_array($this->GetStack())) return;
    $stack = array();
    foreach($this->GetMaxVotedUname() as $uname){
      if(! $USERS->ByRealUname($uname)->IsCamp('human', true)) $stack[$uname] = true;
    }
    if(count($stack) == 1) $this->SetVoteKill(array_shift(array_keys($stack)));
  }
}
