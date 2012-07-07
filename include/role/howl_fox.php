<?php
/*
  ◆化狐 (howl_fox)
  ○仕様
*/
RoleManager::LoadFile('child_fox');
class Role_howl_fox extends Role_child_fox{
  public $mix_in = 'silver_wolf';
  public $action = NULL;
  public $result = NULL;
  function __construct(){ parent::__construct(); }
}
