<?php
/*
  ◆蝕仙狸 (eclipse_cat)
  ○仕様
  ・役職表示：仙狸
  ・蘇生率：40% / 誤爆率：20%
*/
RoleManager::LoadFile('poison_cat');
class Role_eclipse_cat extends Role_poison_cat{
  public $display_role  = 'revive_cat';
  public $revive_rate   = 40;
  public $missfire_rate = 20;
  function __construct(){ parent::__construct(); }
}
