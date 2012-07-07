<?php
/*
  ◆雛狐 (sex_fox)
  ○仕様
  ・占い：性別鑑定
  ・呪い：無効
*/
RoleManager::LoadFile('child_fox');
class Role_sex_fox extends Role_child_fox{
  public $mix_in = 'sex_mage';
  public $mage_failed = 'mage_failed';
  function __construct(){ parent::__construct(); }

  function IsCursed($user){ return false; }

  protected function GetMageResult($user){ return $this->DistinguishSex($user); }
}
