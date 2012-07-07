<?php
/*
  ◆扇動者 (agitate_mad)
  ○仕様
  ・処刑者決定：自分の投票先 + 残りをまとめてショック死
*/
class Role_agitate_mad extends Role{
  public $mix_in = 'decide';
  public $sudden_death = 'AGITATED';
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ if($this->IsRealActor()) $this->AddStack($uname); }

  function DecideVoteKill(){
    global $USERS;

    if($this->DecideVoteKillSame()) return;
    $uname = $this->GetVoteKill();
    foreach($this->GetStack('max_voted') as $target_uname){ //$target_uname は仮想ユーザ
      if($target_uname != $uname){
	$this->SuddenDeathKill($USERS->ByRealUname($target_uname)->user_no);
      }
    }
  }
}
