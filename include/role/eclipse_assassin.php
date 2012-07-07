<?php
/*
  ◆蝕暗殺者 (eclipse_assassin)
  ○仕様
  ・役職表示：暗殺者
  ・暗殺：確率反射
*/
RoleManager::LoadFile('assassin');
class Role_eclipse_assassin extends Role_assassin{
  public $display_role = 'assassin';
  function __construct(){ parent::__construct(); }

  function Assassin($user){
    global $ROOM;

    if($user->IsDead(true)) return false;
    $target = $ROOM->IsEvent('no_reflect_assassin') || mt_rand(1, 10) > 3 ? $user :
      $this->GetActor();
    parent::Assassin($target);
  }
}
