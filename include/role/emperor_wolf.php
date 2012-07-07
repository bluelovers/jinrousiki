<?php
/*
  ◆帝狼 (emperor_wolf)
  ○仕様
  ・勝利：狂人系全滅
*/
RoleManager::LoadFile('wolf');
class Role_emperor_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  function Win($winner){
    foreach($this->GetUser() as $user){
      if($user->IsLive() && $user->IsRoleGroup('mad')) return false;
    }
    return true;
  }
}
