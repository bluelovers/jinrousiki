<?php
/*
  ◆小悪魔 (triangle_cupid)
  ○仕様
  ・投票人数：3人
*/
RoleManager::LoadFile('cupid');
class Role_triangle_cupid extends Role_cupid{
  public $shoot_count = 3;
  function __construct(){ parent::__construct(); }
}
