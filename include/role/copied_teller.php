<?php
/*
  ◆元夢語部 (copied_teller)
  ○仕様
  ・結果表示：4日目
*/
RoleManager::LoadFile('copied');
class Role_copied_teller extends Role_copied{
  public $display_date = 4;
  function __construct(){ parent::__construct(); }
}
