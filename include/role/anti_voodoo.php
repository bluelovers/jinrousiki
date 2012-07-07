<?php
/*
  ◆厄神 (anti_voodoo)
  ○仕様
*/
class Role_anti_voodoo extends Role{
  public $action = 'ANTI_VOODOO_DO';
  public $result = 'ANTI_VOODOO_SUCCESS';
  public $ignore_message = '初日の厄払いはできません';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2 && ! $ROOM->IsOption('seal_message')) OutputSelfAbilityResult($this->result);
  }

  function OutputAction(){ OutputVoteMessage('guard-do', 'anti_voodoo_do', $this->action); }

  function IsVote(){ global $ROOM; return $ROOM->date > 1; }

  //厄払い先セット
  function SetGuard($user){
    global $USERS;

    $this->AddStack($user->uname);
    if(count($stack = array_keys($this->GetStack('possessed'), $user->uname)) > 0){ //憑依妨害判定
      foreach($stack as $uname) $USERS->ByUname($uname)->possessed_cancel = true;
    }
    //憑依者なら強制送還
    elseif($user->IsPossessedGroup() && $user != $USERS->ByVirtual($user->user_no)){
      if(! array_key_exists($user->uname, $this->GetStack('possessed'))){
	$this->AddSuccess($user->uname, 'possessed', true); //憑依リストに追加
      }
      $user->possessed_reset = true;
    }
    //襲撃を行った憑狼ならキャンセル
    elseif($this->GetWolfVoter()->IsRole('possessed_wolf') &&
	   $this->GetWolfVoter()->IsSame($user->uname)){
      $this->GetWolfVoter()->possessed_cancel = true;
    }
    else return;
    $this->AddSuccess($user->uname, $this->role . '_success');
  }

  //厄払い成立判定
  function IsGuard($uname){
    if(! in_array($uname, $this->GetStack())) return false;
    $this->AddSuccess($uname, $this->role . '_success');
    return true;
  }

  //成功結果登録
  function SaveSuccess(){
    global $ROOM, $USERS;
    foreach($this->GetStack($this->role . '_success') as $target_uname => $flag){
      $target = $USERS->GetHandleName($target_uname, true);
      foreach(array_keys($this->GetStack(), $target_uname) as $uname){ //成功者を検出
	$ROOM->ResultAbility($this->result, 'success', $target, $USERS->ByUname($uname)->user_no);
      }
    }
  }
}
