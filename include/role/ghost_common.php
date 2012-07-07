<?php
/*
  ◆亡霊嬢 (ghost_common)
  ○仕様
  ・人狼襲撃：小心者付加
*/
RoleManager::LoadFile('common');
class Role_ghost_common extends Role_common{
  function __construct(){ parent::__construct(); }

  function WolfEatCounter($user){ $user->AddRole('chicken'); }
}
