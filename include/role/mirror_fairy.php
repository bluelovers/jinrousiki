<?php
/*
  ◆鏡妖精 (mirror_fairy)
  ○仕様
  ・悪戯：決選投票
  ・特殊イベント (昼) ：決選投票
*/
RoleManager::LoadFile('fairy');
class Role_mirror_fairy extends Role_fairy {
  public $action = 'CUPID_DO';
  public $submit = 'fairy_do';
  public $event_day = 'vote_duel';
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
      $user_list[$id] = $user->handle_name;
    }

    $this->GetActor()->AddMainRole(implode('-', array_keys($user_list)));
    $this->SetStack(implode(' ', array_keys($user_list)), 'target_no');
    $this->SetStack(implode(' ', $user_list), 'target_handle');
    $this->SetStack('FAIRY_DO', 'message'); //Talk の action は FAIRY_DO
    return null;
  }

  function VoteKillCounter($list){
    global $ROOM;
    $ROOM->SystemMessage($this->GetActor()->user_no, 'VOTE_DUEL', 1);
  }

  function SetEvent($USERS){
    global $ROOM;

    $stack = array(); //決選投票対象者の ID リスト
    foreach ($this->GetActor()->GetPartner($this->role, true) as $key => $value) { //生存確認
      if($USERS->IsVirtualLive($key))   $stack[] = $key;
      if($USERS->IsVirtualLive($value)) $stack[] = $value;
    }
    if (count($stack) > 1) $ROOM->event->{$this->event_day} = $stack;
  }
}
