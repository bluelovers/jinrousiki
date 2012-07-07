<?php
/*
  ◆冥血鬼 (doom_vampire)
  ○仕様
  ・対吸血：無効
  ・吸血：死の宣告
  ・人狼襲撃耐性：常時無効
*/
RoleManager::LoadFile('vampire');
class Role_doom_vampire extends Role_vampire {
  function __construct(){ parent::__construct(); }

  protected function InfectVampire($user){ return; }

  function Infect($user){
    parent::Infect($user);
    $user->AddDoom(4);
  }

  function WolfEatResist(){ return true; }
}
