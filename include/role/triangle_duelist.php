<?php
/*
  ◆舞首 (triangle_duelist)
  ○仕様
  ・投票人数：3人
*/
RoleManager::LoadFile('valkyrja_duelist');
class Role_triangle_duelist extends Role_valkyrja_duelist{
  public $shoot_count = 3;
  function __construct(){ parent::__construct(); }
}
