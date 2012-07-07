<?php
/*
  ◆西蔵人形 (revive_doll)
  ○仕様
*/
RoleManager::LoadFile('doll');
class Role_revive_doll extends Role_doll{
  public $mix_in = 'revive_pharmacist';
  function __construct(){ parent::__construct(); }
}
