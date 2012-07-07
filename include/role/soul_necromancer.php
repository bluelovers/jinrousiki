<?php
/*
  ◆雲外鏡 (soul_necromancer)
  ○仕様
  ・霊能：役職
*/
RoleManager::LoadFile('necromancer');
class Role_soul_necromancer extends Role_necromancer{
  function __construct(){ parent::__construct(); }

  function Necromancer($user, $flag){ return $flag ? 'stolen' : $user->main_role; }
}
