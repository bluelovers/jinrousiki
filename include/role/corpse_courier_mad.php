<?php
/*
  ◆火車 (corpse_courier_mad)
  ○仕様
  ・処刑投票：霊能結果隠蔽 (処刑者投票限定)
*/
RoleManager::LoadFile('critical_mad');
class Role_corpse_courier_mad extends Role_critical_mad{
  function __construct(){ parent::__construct(); }

  function VoteAction(){
    global $USERS;
    foreach($this->GetStack() as $uname => $target_uname){
      if($this->IsVoted($target_uname)){
	$USERS->ByRealUname($target_uname)->stolen_flag = true;
	return;
      }
    }
  }
}
