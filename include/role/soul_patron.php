<?php
/*
  ◆家神 (soul_patron)
  ○仕様
  ・追加役職：受援者の役職結果
*/
RoleManager::LoadFile('patron');
class Role_soul_patron extends Role_patron{
  public $result = 'PATRON_RESULT';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date == 2) OutputSelfAbilityResult($this->result);
  }

  protected function AddDuelistRole($user){
    global $ROOM;

    $target = $user->handle_name;
    $ROOM->ResultAbility($this->result, $user->main_role, $target, $this->GetActor()->user_no);
  }
}
