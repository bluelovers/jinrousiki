<?php
/*
  ◆夜行鬼 (wise_ogre)
  ○仕様
  ・勝利：生存 + 共有者系・人狼系・妖狐系全滅
*/
RoleManager::LoadFile('ogre');
class Role_wise_ogre extends Role_ogre{
  public $mix_in = 'common';
  public $resist_rate = 40;
  public $reduce_rate =  2;
  function __construct(){ parent::__construct(); }

  function Win($winner){
    if($this->IsDead()) return false;
    foreach($this->GetUser() as $user){
      if($user->IsLive() && $user->IsRoleGroup('common', 'wolf', 'fox') && ! $user->IsChildFox()){
	return false;
      }
    }
    return true;
  }
}
