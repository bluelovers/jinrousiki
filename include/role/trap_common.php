<?php
/*
  ◆策士 (trap_common)
  ○仕様
  ・処刑得票：罠死 (非村人陣営の人全てからの得票)
*/
RoleManager::LoadFile('common');
class Role_trap_common extends Role_common{
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ if($this->IsRealActor()) $this->AddStack($uname); }

  function VotedReaction(){
    global $USERS;

    if(! is_array($stack = $this->GetStack())) return;
    if(count($stack) < 1) return;
    $target_list = array();
    foreach(array_keys($this->GetStack('target')) as $uname){ //非村人陣営の ID と仮想ユーザ名を収集
      $user = $USERS->ByRealUname($uname);
      if(! $user->IsCamp('human', true)){
	$target_list[$user->user_no] = $USERS->ByVirtual($user->user_no)->uname;
      }
    }
    //PrintData($target_list, '! Human');

    foreach(array_keys($stack) as $uname){ //策士の得票リストと照合
      if($this->GetVotedUname($uname) == array_values($target_list)){
	foreach(array_keys($target_list) as $id) $USERS->Kill($id, 'TRAPPED');
      }
    }
  }
}
