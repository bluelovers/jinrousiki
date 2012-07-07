<?php
/*
  ◆雷公 (thunder_brownie)
  ○仕様
*/
class Role_thunder_brownie extends Role {
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ if ($this->IsRealActor()) $this->AddStack($uname); }

  //落雷判定
  function SetThunderbolt($list){
    if (! is_array($stack = $this->GetStack()) || $this->IsVoteKill()) return;
    if (count(array_intersect($this->GetStack('vote_possible'), array_keys($stack))) > 0) {
      $this->SetThunderboltTarget($list);
    }
  }

  //落雷対象者選出
  function SetThunderboltTarget($list){
    global $USERS;

    $stack = array();
    foreach ($list as $uname) {
      $user = $USERS->ByRealUname($uname);
      if ($user->IsLive(true) && ! $user->IsAvoid(true)) $stack[] = $user->user_no;
    }
    //PrintData($stack, 'ThunderboltBase');
    /* actor は直前に別フィルタで設定されたユーザが入るケースがあるので注意 */
    $this->AddStack($USERS->ByVirtual(GetRandom($stack))->uname, 'thunderbolt');
  }
}
