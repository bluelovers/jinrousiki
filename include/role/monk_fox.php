<?php
/*
  ◆蛻庵 (monk_fox)
  ○仕様
*/
RoleManager::LoadFile('child_fox');
class Role_monk_fox extends Role_child_fox{
  public $action = null;
  public $result = 'MONK_FOX_RESULT';
  function __construct(){ parent::__construct(); }

  //霊能
  function Necromancer($user, $flag){
    return $flag || mt_rand(0, 9) < 3 ? 'stolen' : $user->DistinguishNecromancer();
  }
}
