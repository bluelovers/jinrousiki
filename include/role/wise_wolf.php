<?php
/*
  ◆賢狼 (wise_wolf)
  ○仕様
*/
RoleManager::LoadFile('wolf');
class Role_wise_wolf extends Role_wolf{
  public $mix_in = 'common';
  function __construct(){ parent::__construct(); }
}
