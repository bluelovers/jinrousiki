<?php
/*
  ◆星狐 (stargazer_fox)
  ○仕様
  ・占い：投票能力鑑定
  ・呪い：無効
*/
RoleManager::LoadFile('child_fox');
class Role_stargazer_fox extends Role_child_fox{
  public $mix_in = 'stargazer_mage';
  function __construct(){ parent::__construct(); }

  function IsCursed($user){ return false; }

  protected function GetMageResult($user){ return $this->Stargazer($user); }
}
