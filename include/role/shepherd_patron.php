<?php
/*
  ◆羊飼い (shepherd_patron)
  ○仕様
  ・追加役職：羊
  ・投票人数：人口の 1 / 6
*/
RoleManager::LoadFile('patron');
class Role_shepherd_patron extends Role_patron{
  public $patron_role = 'mind_sheep';
  function __construct(){ parent::__construct(); }

  function GetVoteNightTargetCount(){
    global $USERS;

    $count = floor($USERS->GetUserCount() / 6);
    if($count < 1) $count++;
    return $count;
  }
}
