<?php
/*
  ◆逃亡者 (escaper)
  ○仕様
  ・逃亡失敗：人狼系
  ・逃亡処理：なし
  ・勝利：生存
*/
class Role_escaper extends Role{
  public $action = 'ESCAPE_DO';
  public $ignore_message = '初日は逃亡できません';
  function __construct(){ parent::__construct(); }

  function OutputAction(){ OutputVoteMessage('escape-do', 'escape_do', $this->action); }

  function IsVote(){ global $ROOM; return $ROOM->date > 1; }

  //逃亡
  function Escape($user){
    global $USERS;

    $actor = $this->GetActor();
    if(in_array($user->uname, $this->GetStack('trap'))){ //罠死判定
      $USERS->Kill($actor->user_no, 'TRAPPED');
    }
    elseif($this->EscapeFailed($user)){ //逃亡失敗判定
      $USERS->Kill($actor->user_no, 'ESCAPER_DEAD');
    }
    else{
      if(in_array($user->uname, $this->GetStack('snow_trap'))){ //凍傷判定
	$this->AddStack($actor->uname, 'frostbite');
      }
      $this->EscapeAction($user); //逃亡処理
      $this->AddStack($user->uname, 'escaper'); //逃亡先をセット
    }
  }

  //逃亡失敗判定
  protected function EscapeFailed($user){ return $user->IsWolf(); }

  //逃亡処理
  protected function EscapeAction($user){}

  function Win($winner){
    $this->SetStack('escaper', 'class');
    return $this->IsLive();
  }
}
