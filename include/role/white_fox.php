<?php
/*
  ◆白狐 (white_fox)
  ○仕様
  ・人狼襲撃耐性：無し
*/
RoleManager::LoadFile('fox');
class Role_white_fox extends Role_fox{
  public $resist_wolf = false;
  function __construct(){ parent::__construct(); }
}
