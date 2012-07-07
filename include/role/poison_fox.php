<?php
/*
  ◆管狐 (poison_fox)
  ○仕様
  ・人狼襲撃耐性：無し
  ・毒：妖狐陣営以外
*/
RoleManager::LoadFile('fox');
class Role_poison_fox extends Role_fox{
  public $mix_in = 'poison';
  public $resist_wolf = false;
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){ return ! $user->IsFox(); }
}
