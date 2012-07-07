<?php
/*
  ◆常世神 (missfire_cat)
  ○仕様
  ・蘇生率：30% / 誤爆率：30%
*/
RoleManager::LoadFile('poison_cat');
class Role_missfire_cat extends Role_poison_cat{
  public $revive_rate   = 30;
  public $missfire_rate = 30;
  function __construct(){ parent::__construct(); }
}
