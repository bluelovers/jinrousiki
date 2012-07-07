<?php
/*
  ◆悲恋 (sweet_status)
  ○仕様
*/
class Role_sweet_status extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputImage(){
    global $ROOM;
    if($ROOM->date == 2) parent::OutputImage();
  }

  protected function OutputPartner(){
    global $ROOM, $USERS;

    $stack = array();
    $actor = $this->GetActor();
    if($actor->IsRole('lovers')) return; //恋人持ちなら処理委託
    foreach($this->GetUser() as $user){
      if($this->IsActor($user->uname)) continue;
      if($actor->IsPartner('dummy_chiroptera', $user->user_no) ||
	 ($ROOM->date == 1 && $user->IsPartner($this->role, $actor->partner_list))){ //夢求愛者対応
	$stack[] = $USERS->GetHandleName($user->uname, true); //憑依追跡
      }
    }
    OutputPartner($stack, 'partner_header', 'lovers_footer');
  }
}
