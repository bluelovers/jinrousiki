<?php
/*
  ◆境界師 (border_priest)
  ○仕様
  ・司祭：自分への投票人数 (2日目以降)
*/
RoleManager::LoadFile('priest');
class Role_border_priest extends Role_priest{
  function __construct(){ parent::__construct(); }

  protected function GetOutputRole(){
    global $ROOM;
    return $ROOM->date > 2 ? $this->role : null;
  }

  protected function SetPriest(){
    global $ROOM;
    if($ROOM->date > 1) parent::SetPriest();
    return false;
  }

  function Priest($role_flag){
    global $ROOM, $USERS;

    $event = $this->GetEvent();
    foreach($role_flag->{$this->role} as $uname){
      $user  = $USERS->ByUname($uname);
      $count = 0;
      foreach($ROOM->vote as $vote_stack){
	foreach($vote_stack as $stack){
	  if($stack['target_no'] == $user->user_no) $count++;
	}
      }
      $ROOM->ResultAbility($event, $count, null, $user->user_no);
    }
  }
}
