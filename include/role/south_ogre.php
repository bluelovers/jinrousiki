<?php
/*
  ◆隠行鬼 (south_ogre)
  ○仕様
  ・勝利条件：生存 + 自分と同列の下側にいる人の全滅 + 村人陣営勝利
*/
RoleManager::LoadFile('ogre');
class Role_south_ogre extends Role_ogre{
  public $resist_rate = 40;
  public $reduce_rate =  2;
  function __construct(){ parent::__construct(); }

  function Win($winner){
    if($winner != 'human' || $this->IsDead()) return false;
    $id = $this->GetActor()->user_no;
    foreach($this->GetUser() as $user){
      if($user->user_no <= $id) continue;
      if($user->user_no % 5 == $id % 5 && $user->IsLive()) return false;
    }
    return true;
  }
}
