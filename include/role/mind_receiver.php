<?php
/*
  ◆受信者 (mind_receiver)
  ○仕様
  ・仲間表示：受信先
  ・発言透過：受信先
*/
class Role_mind_receiver extends Role{
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ global $ROOM; return $ROOM->date < 2; }

  protected function OutputPartner(){
    global $USERS;

    $stack = array();
    foreach($this->GetActor()->GetPartner($this->role, true) as $id){
      $stack[$id] = $USERS->ById($id)->handle_name;
    }
    ksort($stack);
    OutputPartner($stack, 'mind_scanner_target');
  }

  function IsMindReadActive($user){
    return $this->GetTalkFlag('mind_read') &&
      $this->GetActor()->IsPartner($this->role, $user->user_no);
  }
}
