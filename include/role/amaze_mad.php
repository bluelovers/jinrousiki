<?php
/*
  ◆傘化け (amaze_mad)
  ○仕様
  ・処刑投票：特殊イベント (投票結果隠蔽)
*/
RoleManager::LoadFile('critical_mad');
class Role_amaze_mad extends Role_critical_mad {
  public $bad_status = 'blind_vote';
  function __construct(){ parent::__construct(); }

  function VoteAction(){
    global $ROOM;

    foreach ($this->GetStack() as $uname => $target_uname) {
      if ($this->IsVoted($target_uname)) {
	$ROOM->SystemMessage($ROOM->date, 'BLIND_VOTE');
	$ROOM->SystemMessage($ROOM->date, 'BLIND_VOTE', 1);
	$ROOM->ResultDead(null, 'BLIND_VOTE');
	return;
      }
    }
  }
}
