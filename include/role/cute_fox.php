<?php
/*
  ◆萌狐 (cute_fox)
  ○仕様
*/
RoleManager::LoadFile('fox');
class Role_cute_fox extends Role_fox{
  public $mix_in = 'suspect';
  function __construct(){ parent::__construct(); }
}
