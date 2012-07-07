<?php
/*
  ◆連毒者 (chain_poison)
  ○仕様
  ・役職表示：村人
*/
class Role_chain_poison extends Role{
  public $display_role = 'human';
  function __construct(){ parent::__construct(); }

  //毒処理
  function Poison($user){
    global $ROOM, $ROLES, $USERS;

    $ROLES->actor = $USERS->ByVirtual($user->user_no); //解毒判定
    $ROLES->actor->detox = false;
    foreach($ROLES->LoadFilter('detox') as $filter) $filter->Detox();
    if($ROLES->actor->detox) return;

    $stack = array();
    foreach($USERS->GetLivingUsers(true) as $uname){ //生存者から常時対象外の役職を除く
      $user = $USERS->ByRealUname($uname);
      if(! $user->IsAvoid(true)) $stack[] = $user->user_no;
    }
    //PrintData($stack, "Target [{$this->role}]");

    $count = 1; //連鎖カウントを初期化
    while($count > 0){
      $count--;
      shuffle($stack); //配列をシャッフル
      //PrintData($stack, $count);
      for($i = 0; $i < 2; $i++){
	if(count($stack) < 1) return;
	$id = array_shift($stack);
	$target = $USERS->ByReal($id);

	if($target->IsActive('resist_wolf')){ //抗毒判定
	  $target->LostAbility();
	  $stack[] = $id;
	  continue;
	}
	$USERS->Kill($id, 'POISON_DEAD'); //死亡処理

	if(! $target->IsRole($this->role)) continue; //連鎖判定
	$ROLES->actor = $USERS->ByVirtual($target->user_no); //解毒判定
	$ROLES->actor->detox = false;
	foreach($ROLES->LoadFilter('detox') as $filter) $filter->Detox();
	if(! $ROLES->actor->detox) $count++;
      }
    }
  }
}
