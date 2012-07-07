<?php
/*
  ◆呪術師 (voodoo_mad)
  ○仕様
*/
class Role_voodoo_mad extends Role{
  public $action = 'VOODOO_MAD_DO';
  public $submit = 'voodoo_do';
  function __construct(){ parent::__construct(); }

  function OutputAction(){ OutputVoteMessage('wolf-eat', $this->submit, $this->action); }

  //呪術対象セット
  function SetVoodoo($user){
    global $USERS;

    if($user->IsCursed()){ //呪返し判定
      $actor = $this->GetActor();
      foreach($this->GetGuardCurse() as $filter){ //厄神の護衛判定
	if($filter->IsGuard($actor->uname)) return false;
      }
      $USERS->Kill($actor->user_no, 'CURSED');
      return false;
    }
    if(in_array($user->uname, $this->GetStack('voodoo_killer'))) //陰陽師の解呪判定
      $this->AddSuccess($user->uname, 'voodoo_killer_success');
    else
      $this->AddStack($user->uname, 'voodoo');
  }

  //呪術能力者の呪返し処理
  function VoodooToVoodoo(){
    global $USERS;

    $stack = $this->GetStack('voodoo');
    $count_list  = array_count_values($stack);
    $filter_list = $this->GetGuardCurse();
    foreach($stack as $uname => $target_uname){
      if($count_list[$target_uname] > 1){
	$user = $USERS->ByUname($uname);
	foreach($filter_list as $filter){ //厄神の護衛判定
	  if($filter->IsGuard($user->uname)) continue 2;
	}
	$USERS->Kill($user->user_no, 'CURSED');
      }
    }
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
}
