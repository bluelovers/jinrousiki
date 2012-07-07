<?php
/*
  ◆風鬼 (east_ogre)
  ○仕様
  ・勝利条件：生存 + 自分と同列の右側にいる人の全滅 + 村人陣営勝利
*/
RoleManager::LoadFile('ogre');
class Role_east_ogre extends Role_ogre{
  public $resist_rate = 40;
  public $reduce_rate =  2;
  function __construct(){ parent::__construct(); }

  function Win($winner){
    if($winner != 'human' || $this->IsDead()) return false;
    $id = $this->GetActor()->user_no;
    foreach($this->GetUser() as $user){
      if($user->user_no > ceil($id / 5) * 5) return true;
      if($user->user_no > $id && $user->IsLive()) return false;
    }
    return true;
  }
}
