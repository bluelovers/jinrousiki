<?php
/*
  ◆獏 (dream_eater_mad)
  ○仕様
*/
class Role_dream_eater_mad extends Role{
  public $action = 'DREAM_EAT';
  public $ignore_message = '初日は襲撃できません';
  function __construct(){ parent::__construct(); }

  function OutputAction(){ OutputVoteMessage('wolf-eat', 'dream_eat', $this->action); }

  function IsVote(){ global $ROOM; return $ROOM->date > 1; }

  //夢食い処理
  function DreamEat($user){
    global $ROOM, $USERS, $ROLES;

    $actor = $this->GetActor();
    if($user->IsLiveRole('dummy_guard', true)){ //対象が夢守人なら返り討ちに合う
      $USERS->Kill($actor->user_no, 'HUNTED');
      if(! $ROOM->IsOption('seal_message')){ //狩りメッセージを登録
	$ROOM->ResultAbility('GUARD_HUNTED', 'hunted', $actor->handle_name, $user->user_no);
      }
      return;
    }

    foreach($ROLES->LoadFilter('guard_dream') as $filter){ //夢守人の護衛判定
      if($filter->GuardDream($actor, $user->uname)) return;
    }

    //夢食い判定 (夢系能力者・妖精系)
    if($user->IsRoleGroup('dummy', 'fairy')) $USERS->Kill($user->user_no, 'DREAM_KILLED');
  }
}
