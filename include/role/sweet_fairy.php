<?php
/*
  ◆恋妖精 (sweet_fairy)
  ○仕様
  ・悪戯：悲恋 (sweet_status)
*/
RoleManager::LoadFile('fairy');
class Role_sweet_fairy extends Role_fairy {
  public $action = 'CUPID_DO';
  public $submit = 'fairy_do';
  public $ignore_message = '初日以外は投票できません';
  function __construct(){ parent::__construct(); }

  function IsVote(){ global $ROOM; return $ROOM->date == 1; }

  function GetVoteCheckboxHeader(){ return '<input type="checkbox" name="target_no[]"'; }

  function IsVoteCheckbox($user, $live){ return $live && ! $user->IsDummyBoy(); }

  function VoteNight(){
    global $USERS;

    $stack = $this->GetVoteNightTarget();
    if (count($stack) != 2) return '指定人数は2人にしてください'; //人数チェック

    $user_list = array();
    sort($stack);
    foreach ($stack as $id) {
      $user = $USERS->ByID($id);
      if (! $user->IsLive() || $user->IsDummyBoy()) { //例外判定
	return '生存者以外と身代わり君には投票できません';
      }
      $user_list[$id] = $user;
    }

    $stack = array();
    foreach ($user_list as $user) {
      $stack[] = $user->handle_name;
      $user->AddRole($this->GetActor()->GetID('sweet_status'));
    }
    $this->SetStack(implode(' ', array_keys($user_list)), 'target_no');
    $this->SetStack(implode(' ', $stack), 'target_handle');
    $this->SetStack('FAIRY_DO', 'message'); //Talk の action は FAIRY_DO
    return null;
  }
}
