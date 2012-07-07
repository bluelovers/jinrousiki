<?php
/*
  ◆夢守人 (dummy_guard)
  ○仕様
*/
RoleManager::LoadFile('guard');
class Role_dummy_guard extends Role_guard{
  public $display_role = 'guard';
  function __construct(){ parent::__construct(); }

  function SetGuard($uname){
    global $ROOM;
    if(! $ROOM->IsEvent('no_dream')) $this->AddStack($uname); //スキップ判定 (熱帯夜)
    return false;
  }

  //夢防衛
  function GuardDream($user, $uname){
    global $ROOM, $USERS;

    if(! in_array($uname, $this->GetStack())) return false;
    $flag = false;
    foreach(array_keys($this->GetStack(), $uname) as $guard_uname){ //護衛者を検出
      $guard_user = $USERS->ByUname($guard_uname);
      if($guard_user->IsDead(true)) continue; //直前に死んでいたら無効

      $flag = true;
      if(! $ROOM->IsOption('seal_message')){ //狩りメッセージを登録
	$ROOM->ResultAbility('GUARD_HUNTED', 'hunted', $user->handle_name, $guard_user->user_no);
      }
    }
    if($flag) $USERS->Kill($user->user_no, 'HUNTED');
    return $flag;
  }

  //護衛処理
  function DreamGuard(&$list){
    global $ROOM, $USERS;

    foreach($this->GetStack() as $uname => $target_uname){
      $user = $USERS->ByUname($uname);
      if($user->IsDead(true)) continue; //直前に死んでいたら無効

      $target = $USERS->ByUname($target_uname);
      if(($target->IsRole('dream_eater_mad') || $target->IsRoleGroup('fairy')) &&
	 $target->IsLive(true)){ //狩り判定 (獏・妖精系)
	$list[$user->user_no] = $target;
      }
      //常時護衛成功メッセージだけが出る
      $name = $USERS->GetHandleName($target->uname, true);
      $ROOM->ResultAbility('GUARD_SUCCESS', 'success', $name, $user->user_no);
    }
  }

  //狩り処理
  function DreamHunt($list){
    global $ROOM, $USERS;

    foreach($list as $id => $target){
      $USERS->Kill($target->user_no, 'HUNTED');
      //憑依能力者は対象外なので仮想ユーザを引く必要なし
      if(! $ROOM->IsOption('seal_message')){ //狩りメッセージを登録
	$ROOM->ResultAbility('GUARD_HUNTED', 'hunted', $target->handle_name, $id);
      }
    }
  }
}
