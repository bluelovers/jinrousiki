<?php
/*
  ◆囁き狂人 (whisper_mad)
  ○仕様
*/
class Role_whisper_mad extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){
    global $USERS;

    $wolf = array();
    $mad  = array();
    foreach($this->GetUser() as $user){
      if($this->IsActor($user->uname)) continue;
      if($user->IsRole('possessed_wolf')){
	$wolf[] = $USERS->GetHandleName($user->uname, true); //憑依先を追跡する
      }
      elseif($user->IsWolf(true)){
	$wolf[] = $user->handle_name;
      }
      elseif($user->IsRole($this->role)){
	$mad[] = $user->handle_name;
      }
    }
    OutputPartner($wolf, 'wolf_partner');
    OutputPartner($mad, 'mad_partner');
  }
}
