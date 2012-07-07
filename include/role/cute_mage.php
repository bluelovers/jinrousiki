<?php
/*
  ◆萌占い師 (cute_mage)
  ○仕様
  ・役職表示：占い師
*/
RoleManager::LoadFile('mage');
class Role_cute_mage extends Role_mage{
  public $mix_in = 'suspect';
  public $display_role = 'mage';
  function __construct(){ parent::__construct(); }
}
