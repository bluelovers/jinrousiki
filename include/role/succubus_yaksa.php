<?php
/*
  ◆荼枳尼天 (succubus_yaksa)
  ○仕様
  ・勝利：生存 + 男性の全滅
  ・人攫い無効：男性以外
*/
RoleManager::LoadFile('yaksa');
class Role_succubus_yaksa extends Role_yaksa{
  public $reduce_rate = 2;
  function __construct(){ parent::__construct(); }

  function Win($winner){
    if($this->IsDead()) return false;
    foreach($this->GetUser() as $user){
      if(! $this->IsActor($user->uname) && $user->IsLive() && $user->IsMale()) return false;
    }
    return true;
  }

  protected function IgnoreAssassin($user){ return ! $user->IsMale(); }
}
