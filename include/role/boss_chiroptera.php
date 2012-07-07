<?php
/*
  ◆大蝙蝠 (boss_chiroptera)
  ○仕様
  ・身代わり対象者：蝙蝠陣営
*/
class Role_boss_chiroptera extends Role{
  public $mix_in = 'protected';
  function __construct(){ parent::__construct(); }

  function IsSacrifice($user){
    return ! $this->IsActor($user->uname) && $user->IsRoleGroup('chiroptera', 'fairy');
  }
}
