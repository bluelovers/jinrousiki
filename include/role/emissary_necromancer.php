<?php
/*
  ◆密偵 (emissary_necromancer)
  ○仕様
  ・霊能：処刑者の投票先と同陣営の人数
*/
RoleManager::LoadFile('necromancer');
class Role_emissary_necromancer extends Role_necromancer{
  function __construct(){ parent::__construct(); }

  function Necromancer($user, $flag){
    global $USERS;

    $count = 0;
    $camp  = $user->GetCamp(true);
    foreach($this->GetVotedUname($user->uname) as $uname){
      if($USERS->ByRealUname($uname)->IsCamp($camp, true)) $count++;
    }
    return $count;
  }
}
