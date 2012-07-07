<?php
/*
  ◆酒呑童子 (sacrifice_ogre)
  ○仕様
  ・勝利：生存 + 村人陣営以外勝利
  ・仲間表示：洗脳者
  ・人攫い無効：吸血鬼陣営
  ・人攫い：洗脳者付加
  ・身代わり対象者：洗脳者
*/
RoleManager::LoadFile('ogre');
class Role_sacrifice_ogre extends Role_ogre{
  public $mix_in = 'protected';
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){
    global $ROOM;

    /* 2日目の時点で洗脳者が発生する特殊イベントを実装したら対応すること */
    if($ROOM->date < 2) return;
    $stack = array();
    foreach($this->GetUser() as $user){
      if($user->IsRole('psycho_infected')) $stack[] = $user->handle_name;
    }
    OutputPartner($stack, 'psycho_infected_list');
  }

  function Win($winner){ return $winner != 'human' && $this->IsLive(); }

  function GetResistRate(){ return 0; }

  protected function GetReduceRate(){ return 3 / 5; }

  protected function IgnoreAssassin($user){ return $user->IsCamp('vampire'); }

  protected function Assassin($user){ $user->AddRole('psycho_infected'); }

  function IsSacrifice($user){
    return ! $this->IsActor($user->uname) && $user->IsRole('psycho_infected');
  }
}
