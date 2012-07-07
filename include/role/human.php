<?php
/*
  ◆村人 (human)
  ○仕様
  ・投票数：+1 (座敷童子生存 / 天候「疎雨」)
*/
class Role_human extends Role{
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ if($this->IsBrownie()) $number++; }

  //投票数増加判定
  private function IsBrownie(){
    global $ROOM;

    if(is_null($flag = $this->GetStack())){
      $role = 'brownie';
      $flag = $ROOM->IsEvent($role); //天候判定
      foreach($this->GetUser() as $user){ //座敷童子の生存判定
	if($flag) break;
	$flag = $user->IsLiveRole($role);
      }
      $this->SetStack($flag);
    }
    return $flag;
  }
}
