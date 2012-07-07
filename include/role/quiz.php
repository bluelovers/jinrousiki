<?php
/*
  ◆出題者 (quiz)
  ○仕様
  ・処刑者決定：同一投票先
*/
class Role_quiz extends Role{
  public $mix_in = 'decide';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROLE_IMG, $ROOM;
    if($ROOM->IsOptionGroup('chaos')) $ROLE_IMG->Output('quiz_chaos');
  }

  function SetVoteDay($uname){ if($this->IsRealActor()) $this->AddStack($uname); }

  function DecideVoteKill(){ $this->DecideVoteKillSame(); }
}
