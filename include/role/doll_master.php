<?php
/*
  ◆人形遣い (doll_master)
  ○仕様
  ・勝利：通常
  ・仲間表示：なし
  ・身代わり対象者：人形
*/
RoleManager::LoadFile('doll');
class Role_doll_master extends Role_doll{
  public $mix_in = 'protected';
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){ return; }

  function Win($winner){ return true; }

  function IsSacrifice($user){ return Role_doll::IsDoll($user); }
}
