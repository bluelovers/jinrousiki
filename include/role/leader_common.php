<?php
/*
  ◆指導者 (leader_common)
  ○仕様
*/
RoleManager::LoadFile('common');
class Role_leader_common extends Role_common{
  function __construct(){ parent::__construct(); }

  function IsMindRead(){ global $ROOM; return $ROOM->date > 1; }
}
