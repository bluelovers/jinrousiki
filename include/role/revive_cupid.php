<?php
/*
  ◆邪仙 (revive_cupid)
  ○仕様
  ・追加役職：死の宣告 (7日目)
*/
RoleManager::LoadFile('cupid');
class Role_revive_cupid extends Role_cupid{
  public $mix_in = 'revive_pharmacist';
  function __construct(){ parent::__construct(); }

  protected function AddCupidRole($user, $flag){ $user->AddRole('death_warrant[7]'); }
}
