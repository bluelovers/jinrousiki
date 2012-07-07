<?php
/*
  ◆鋭狼 (sharp_wolf)
  ○仕様
  ・襲撃：危機回避
*/
RoleManager::LoadFile('wolf');
class Role_sharp_wolf extends Role_wolf{
  public $result = 'SHARP_WOLF_RESULT';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 1 && ! $ROOM->IsOption('seal_message')) OutputSelfAbilityResult($this->result);
  }

  function WolfEatAction($user){
    global $ROOM, $USERS;

    if(! $user->IsRoleGroup('mad') && ! $user->IsPoison()) return false;
    if($ROOM->IsOption('seal_message')) return true;
    $target = $USERS->GetHandleName($user->uname, true);
    $ROOM->ResultAbility($this->result, 'wolf_avoid', $target, $this->GetWolfVoter()->user_no);
    return true;
  }
}
