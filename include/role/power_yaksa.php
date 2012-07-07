<?php
/*
  ◆阿修羅 (power_yaksa)
  ○仕様
  ・勝利：生存 + 生存陣営数が出現陣営の半分以下
  ・人攫い無効：村人陣営
*/
RoleManager::LoadFile('yaksa');
class Role_power_yaksa extends Role_yaksa{
  public $resist_rate = 30;
  function __construct(){ parent::__construct(); }

  function Win($winner){
    if($this->IsDead()) return false;
    $camp_list = array();
    $live_list = array();
    foreach($this->GetUser() as $user){
      $camp = $user->GetCamp(true);
      $camp_list[$camp] = true;
      if($user->IsLive()) $live_list[$camp] = true;
    }
    return count($live_list) <= ceil(count($camp_list) / 2);
  }

  protected function IgnoreAssassin($user){ return $user->IsCamp('human', true); }

  function GetReduceRate(){ return 3 / 5; }
}
