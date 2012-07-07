<?php
/*
  ◆仏蘭西人形 (friend_doll)
  ○仕様
  ・仲間表示：人形遣い枠 + 人形
*/
RoleManager::LoadFile('doll');
class Role_friend_doll extends Role_doll{
  public $display_doll = true;
  function __construct(){ parent::__construct(); }
}
