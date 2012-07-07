<?php
/*
  ◆辻斬り (soul_assassin)
  ○仕様
  ・暗殺：役職判定 + 毒死(毒能力者)
*/
RoleManager::LoadFile('assassin');
class Role_soul_assassin extends Role_assassin{
  public $result = 'ASSASSIN_RESULT';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2) OutputSelfAbilityResult($this->result);
  }

  function Assassin($user){
    global $ROOM, $USERS;

    if(! parent::Assassin($user)) return false;
    $target = $USERS->GetHandleName($user->uname, true);
    $ROOM->ResultAbility($this->result, $user->main_role, $target, $this->GetActor()->user_no);

    if($user->IsPoison()) $USERS->Kill($this->GetActor()->user_no, 'POISON_DEAD'); //毒死判定
  }
}
