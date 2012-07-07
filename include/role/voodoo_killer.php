<?php
/*
  ◆陰陽師 (voodoo_killer)
  ○仕様
  ・占い：解呪
*/
class Role_voodoo_killer extends Role{
  public $action = 'VOODOO_KILLER_DO';
  public $result = 'VOODOO_KILLER_SUCCESS';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 1 && ! $ROOM->IsOption('seal_message')) OutputSelfAbilityResult($this->result);
  }

  function OutputAction(){ OutputVoteMessage('mage-do', 'voodoo_killer_do', $this->action); }

  //占い
  function Mage($user){
    global $USERS;

    //呪殺判定 (呪い所持者・憑依能力者)
    if($user->IsLive(true) && ($user->IsRoleGroup('cursed') || $user->IsPossessedGroup())){
      $USERS->Kill($user->user_no, 'CURSED');
      $this->AddSuccess($user->uname, $this->role . '_success');
    }
    if(count($stack = array_keys($this->GetStack('possessed'), $user->uname)) > 0){ //憑依妨害判定
      foreach($stack as $uname) $USERS->ByUname($uname)->possessed_cancel = true;
      $this->AddSuccess($user->uname, $this->role . '_success');
    }
    $this->AddStack($user->uname); //解呪対象リストに追加
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
