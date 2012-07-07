<?php
/*
  ◆未亡人 (widow_priest)
  ○仕様
  ・役職表示：村人
  ・司祭：共感者 (身代わり君)
*/
RoleManager::LoadFile('priest');
class Role_widow_priest extends Role_priest{
  public $display_role = 'human';
  function __construct(){ parent::__construct(); }

  protected function GetOutputRole(){ return NULL; }

  protected function SetPriest(){
    global $ROOM;
    if($ROOM->date == 1 && $ROOM->IsDummyBoy()) parent::SetPriest();
    return false;
  }

  function Priest($role_flag){
    global $ROOM, $USERS;

    $dummy_boy = $USERS->ByID(1);
    $result = $dummy_boy->main_role;
    $target = $dummy_boy->handle_name;
    foreach($role_flag->{$this->role} as $uname){
      $user = $USERS->ByUname($uname);
      if($user->IsDummyBoy()) continue;
      $user->AddRole('mind_sympathy');
      $ROOM->ResultAbility('SYMPATHY_RESULT', $result, $target, $user->user_no);
    }
  }
}
