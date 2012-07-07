<?php
/*
  ◆神話マニア (mania)
  ○仕様
  ・コピー：メイン役職
*/
class Role_mania extends Role {
  public $action = 'MANIA_DO';
  public $result = 'MANIA_RESULT';
  public $copied = 'copied';
  public $delay_copy = false;
  public $camp_copy  = false;
  public $ignore_message = '初日以外は投票できません';
  function __construct(){ parent::__construct(); }

  function OutputAction(){ OutputVoteMessage('mania-do', 'mania_do', $this->action); }

  function IsVote(){ global $ROOM; return $ROOM->date == 1; }

  //コピー処理
  function Copy($user){
    global $ROOM;

    $actor = $this->GetActor();
    $role  = $this->GetRole($user);
    $this->CopyAction($user, $role);

    $this->delay_copy || $this->camp_copy ? $actor->AddMainRole($user->user_no) :
      $actor->ReplaceRole($this->role, $role);
    if (! $this->delay_copy) $actor->AddRole($this->GetCopiedRole());
    if (! $this->camp_copy) {
      $ROOM->ResultAbility($this->result, $role, $user->handle_name, $actor->user_no);
    }
  }

  //コピー結果役職取得
  protected function GetRole($user){
    return $user->IsRoleGroup('mania') ? 'human' : $this->GetManiaRole($user);
  }

  //コピー役職取得
  protected function GetManiaRole($user){ return $user->main_role; }

  //特殊コピー処理
  protected function CopyAction($user, $role){}

  //コピー変化後役職取得
  protected function GetCopiedRole(){ return $this->copied; }
}
