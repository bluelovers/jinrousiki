<?php
/*
  ◆首領 (sacrifice_common)
  ○仕様
  ・身代わり対象者：村人・蝙蝠
*/
RoleManager::LoadFile('common');
class Role_sacrifice_common extends Role_common{
  public $mix_in = 'protected';
  function __construct(){ parent::__construct(); }

  function IsSacrifice($user){ return $user->IsRole('human', 'chiroptera'); }
}
