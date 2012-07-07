<?php
/*
  ◆萌狼 (cute_wolf)
  ○仕様
*/
RoleManager::LoadFile('wolf');
class Role_cute_wolf extends Role_wolf{
  public $mix_in = 'suspect';
  function __construct(){ parent::__construct(); }
}
