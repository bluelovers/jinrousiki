<?php
/*
  ◆氷妖精 (ice_fairy)
  ○仕様
  ・悪戯：凍傷 (30% で反射)
*/
RoleManager::LoadFile('fairy');
class Role_ice_fairy extends Role_fairy {
  function __construct(){ parent::__construct(); }

  function FairyAction($user){
    $target = mt_rand(0, 9) < 3 ? $this->GetActor() : $user;
    $target->AddDoom(1, 'frostbite');
  }
}
