<?php
/*
  ◆古狐 (elder_fox)
  ○仕様
  ・投票数：+1
*/
RoleManager::LoadFile('fox');
class Role_elder_fox extends Role_fox{
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ $number++; }
}
