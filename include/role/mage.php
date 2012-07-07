<?php
/*
  ◆占い師 (mage)
  ○仕様
  ・占い：通常
*/
class Role_mage extends Role{
  public $action = 'MAGE_DO';
  public $result = 'MAGE_RESULT';
  public $mage_failed = 'failed';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 1) OutputSelfAbilityResult($this->result);
  }

  function OutputAction(){ OutputVoteMessage('mage-do', 'mage_do', $this->action); }

  //占い
  function Mage($user){
    if($this->IsJammer($user)){
      return $this->SaveMageResult($user, $this->mage_failed, $this->result);
    }
    if($this->IsCursed($user)) return false;
    $this->SaveMageResult($user, $this->GetMageResult($user), $this->result);
  }

  //占い失敗判定
  function IsJammer($user){
    global $ROOM;

    $uname   = $this->GetUname();
    $half    = $ROOM->IsEvent('half_moon') && mt_rand(0, 1) > 0; //半月
    $phantom = $user->IsLive(true) && $user->IsRoleGroup('phantom') && $user->IsActive(); //幻系

    if($half || $phantom){ //厄神の護衛判定
      foreach($this->GetGuardCurse() as $filter){
	if($filter->IsGuard($uname)) return false;
      }
    }

    //占い妨害判定
    if($half || in_array($uname, $this->GetStack('jammer'))) return true;
    if($phantom){
      $this->AddSuccess($user->user_no, 'phantom');
      return true;
    }
    return false;
  }

  //呪返し判定
  function IsCursed($user){
    global $USERS;

    if($user->IsCursed() || in_array($user->uname, $this->GetStack('voodoo'))){
      $actor = $this->GetActor();
      foreach($this->GetGuardCurse() as $filter){ //厄神の護衛判定
	if($filter->IsGuard($actor->uname)) return false;
      }
      $USERS->Kill($actor->user_no, 'CURSED');
      return true;
    }
    return false;
  }

  //厄払いフィルタ取得
  protected function GetGuardCurse(){
    global $ROLES;
    if(! is_array($stack = $this->GetStack($data = 'guard_curse'))){
      $stack = $ROLES->LoadFilter($data);
      $this->SetStack($stack, $data);
    }
    return $stack;
  }

  //占い結果取得
  function GetMageResult($user){
    global $ROOM, $USERS;

    //憑依キャンセル判定
    if(array_key_exists($user->uname, $this->GetStack('possessed'))) $user->possessed_cancel = true;

    //呪殺判定
    if($user->IsLive(true) && ! $ROOM->IsEvent('no_fox_dead') &&
       (($user->IsFox() && ! $user->IsChildFox() &&
	 ! $user->IsRole('white_fox', 'black_fox', 'mist_fox', 'sacrifice_fox')) ||
	$user->IsRoleGroup('spell'))){
      $USERS->Kill($user->user_no, 'FOX_DEAD');
    }
    return $this->DistinguishMage($user); //占い判定
  }

  //占い判定
  function DistinguishMage($user, $reverse = false){
    //鬼火系判定
    if($user->IsDoomRole('sheep_wisp')) return $reverse ? 'wolf' : 'human';
    if($user->IsRole('wisp'))           return 'ogre';
    if($user->IsRole('foughten_wisp'))  return 'chiroptera';
    if($user->IsRole('black_wisp'))     return $reverse ? 'human' : 'wolf' ;

    //特殊役職判定
    if($user->IsOgre()) return 'ogre';
    if($user->IsRoleGroup('vampire', 'mist') || $user->IsRole('boss_chiroptera')){
      return 'chiroptera';
    }

    //人狼判定
    $flag = ($user->IsWolf() && ! $user->IsRole('boss_wolf') && ! $user->IsSiriusWolf()) ||
      $user->IsRole('suspect', 'cute_mage', 'black_fox', 'cute_chiroptera', 'cute_avenger');
    return ($flag xor $reverse) ? 'wolf' : 'human';
  }

  //占い結果登録
  function SaveMageResult($user, $result, $action){
    global $ROOM, $USERS;

    $target = $USERS->GetHandleName($user->uname, true);
    $ROOM->ResultAbility($action, $result, $target, $this->GetActor()->user_no);
  }
}
