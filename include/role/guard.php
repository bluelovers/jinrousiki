<?php
/*
  ◆狩人 (guard)
  ○仕様
  ・護衛失敗：通常
  ・護衛処理：なし
  ・狩り：通常
*/
class Role_guard extends Role{
  public $action = 'GUARD_DO';
  public $ignore_message = '初日は護衛できません';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date < 1) return;
    if(! $ROOM->IsOption('seal_message')){
      OutputSelfAbilityResult('GUARD_SUCCESS'); //護衛結果
      OutputSelfAbilityResult('GUARD_HUNTED');  //狩り結果
    }
  }

  function OutputAction(){ OutputVoteMessage('guard-do', 'guard_do', $this->action); }

  function IsVote(){ global $ROOM; return $ROOM->date > 1; }

  //護衛先セット
  function SetGuard($uname){
    global $ROOM, $ROLES;

    if($ROOM->IsEvent('no_contact')) return false; //スキップ判定 (花曇)
    $this->AddStack($uname, 'guard');
    foreach($ROLES->LoadFilter('trap') as $filter){ //罠判定
      if($filter->DelayTrap($this->GetActor(), $uname)) break;
    }
    return true;
  }

  //護衛
  function Guard($user, $flag = false){
    global $ROOM, $ROLES, $USERS;

    $stack = array(); //護衛者検出
    foreach($ROLES->LoadFilter('guard') as $filter) $filter->GetGuard($user->uname, $stack);
    //PrintData($stack, 'List [gurad/' . $this->GetVoter()->uname . ']');

    $result  = false;
    $half    = $ROOM->IsEvent('half_guard'); //曇天
    $limited = ! $ROOM->IsEvent('full_guard') && $this->IsGuardLimited($user); //護衛制限判定
    foreach($stack as $uname){
      $actor  = $USERS->ByUname($uname);
      if($actor->IsDead(true)) continue; //直前に死んでいたら無効

      $filter = $ROLES->LoadMain($actor);
      if($failed = $filter->GuardFailed()) continue; //個別護衛失敗判定
      $result |= ! ($half && mt_rand(0, 1) > 0) && (! $limited || is_null($failed));

      $filter->GuardAction($this->GetWolfVoter(), $flag); //護衛実行処理
      //護衛成功メッセージを登録
      if(! $ROOM->IsOption('seal_message') && $actor->IsFirstGuardSuccess($user->uname)){
	$target = $USERS->GetHandleName($user->uname, true);
	$ROOM->ResultAbility('GUARD_SUCCESS', 'success', $target, $actor->user_no);
      }
    }
    return $result;
  }

  //護衛者検出
  function GetGuard($uname, &$list){ $list = array_keys($this->GetStack('guard'), $uname); }

  //護衛制限判定
  private function IsGuardLimited($user){
    return $user->IsRole(
      'emissary_necromancer', 'reporter', 'detective_common', 'sacrifice_common', 'spell_common',
      'clairvoyance_scanner', 'soul_wizard', 'barrier_wizard', 'pierrot_wizard', 'doll_master') ||
      ($user->IsRoleGroup('priest') &&
       ! $user->IsRole('crisis_priest', 'widow_priest', 'revive_priest')) ||
      $user->IsRoleGroup('assassin');
  }

  //護衛失敗判定
  function GuardFailed(){ return false; }

  //護衛処理
  function GuardAction($user, $flag){}

  //狩り
  function Hunt($user){
    global $ROOM, $USERS;

    //対象が身代わり死していた場合はスキップ
    if(in_array($user->uname, $this->GetStack('sacrifice')) || ! $this->IsHunt($user)) return false;
    $USERS->Kill($user->user_no, 'HUNTED');
    if(! $ROOM->IsOption('seal_message')){ //狩りメッセージを登録
      $target = $USERS->GetHandleName($user->uname, true);
      $ROOM->ResultAbility('GUARD_HUNTED', 'hunted', $target, $this->GetActor()->user_no);
    }
  }

  //狩り対象判定
  protected function IsHunt($user){
    return $user->IsRole(
      'phantom_fox', 'voodoo_fox', 'revive_fox', 'possessed_fox', 'doom_fox', 'trap_fox',
      'cursed_fox', 'cursed_angel', 'poison_chiroptera', 'cursed_chiroptera', 'boss_chiroptera',
      'cursed_avenger', 'critical_avenger') ||
      ($user->IsRoleGroup('mad') &&
       ! $user->IsRole('mad', 'fanatic_mad', 'whisper_mad', 'therian_mad', 'revive_mad',
		       'immolate_mad')) ||
      ($user->IsRoleGroup('vampire') && ! $user->IsRole('vampire', 'scarlet_vampire'));
  }
}
