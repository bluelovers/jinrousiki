<?php
/*
  ◆淑女 (lady)
  ○仕様
*/
RoleManager::LoadFile('gentleman');
class Role_lady extends Role_gentleman{
  function __construct(){ parent::__construct(); }
}
