<?php
/*
  ◆暗殺者 (assassin)
  ○仕様
  ・暗殺：標準
*/
class Role_assassin extends Role{
  public $action     = 'ASSASSIN_DO';
  public $not_action = 'ASSASSIN_NOT_DO';
  public $ignore_message = '初日は暗殺できません';
  function __construct(){ parent::__construct(); }

  function OutputAction(){
    OutputVoteMessage('assassin-do', 'assassin_do', $this->action, $this->not_action);
  }

  function IsVote(){ global $ROOM; return $ROOM->date > 1; }

  function SetVoteNight(){
    global $ROOM;
    parent::SetVoteNight();
    if($ROOM->IsEvent('force_assassin_do')) $this->SetStack(NULL, 'not_action');
  }

  //暗殺先セット
  function SetAssassin($user){
    global $ROLES;

    $actor = $this->GetActor();
    foreach($ROLES->LoadFilter('trap') as $filter){ //罠判定
      if($filter->TrapStack($actor, $user->uname)) return;
    }
    foreach($ROLES->LoadFilter('guard_assassin') as $filter){ //対暗殺護衛判定
      if($filter->GuardAssassin($user->uname)) return;
    }
    if($user->IsRoleGroup('escaper')) return; //逃亡者は無効
    if($user->IsRefrectAssassin()){ //反射判定
      $this->AddSuccess($actor->user_no, 'assassin');
      return;
    }
    $class = $this->GetClass($method = 'Assassin');
    $class->$method($user);
  }

  //暗殺処理 (protected)
  function Assassin($user){
    if($flag = $user->IsLive(true)) $this->AddSuccess($user->user_no, 'assassin');
    return $flag;
  }

  //暗殺死処理
  function AssassinKill(){
    global $USERS;
    foreach($this->GetStack() as $id => $flag) $USERS->Kill($id, 'ASSASSIN_KILLED');
  }
}
