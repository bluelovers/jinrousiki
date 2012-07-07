<?php
/*
  ◆天人 (revive_priest)
  ○仕様
  ・司祭：蘇生
*/
RoleManager::LoadFile('priest');
class Role_revive_priest extends Role_priest{
  function __construct(){ parent::__construct(); }

  protected function GetOutputRole(){ return NULL; }

  function Priest($role_flag){
    global $ROOM, $USERS;

    $data = $this->GetStack('priest');
    if($ROOM->date != 4 && ! property_exists($data, 'crisis') && $data->count['wolf'] != 1 &&
       count($USERS->rows) < $data->count['total'] * 2) return false;

    foreach($role_flag->{$this->role} as $uname){
      $user = $USERS->ByUname($uname);
      if($user->IsLovers() || ($ROOM->date >= 4 && $user->IsLive(true))){
	$user->LostAbility();
      }
      elseif($user->IsDead(true)){
	$user->Revive();
	$user->LostAbility();
      }
    }
  }

  //帰還
  function PriestReturn(){
    global $USERS;

    $user = $this->GetActor();
    if($user->IsDummyBoy()) return;
    if($user->IsLovers()) $user->LostAbility();
    elseif($user->IsLive(true)) $USERS->Kill($user->user_no, 'PRIEST_RETURNED');
  }
}
