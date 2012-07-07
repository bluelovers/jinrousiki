<?php
/*
  ◆元覚醒者 (copied_soul)
  ○仕様
  ・結果表示：4日目
*/
RoleManager::LoadFile('copied');
class Role_copied_soul extends Role_copied{
  public $display_date = 4;
  function __construct(){ parent::__construct(); }
}
