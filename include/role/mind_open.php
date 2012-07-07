<?php
/*
  ◆公開者 (mind_open)
  ○仕様
*/
class Role_mind_open extends Role{
  function __construct(){ parent::__construct(); }

  function IsMindRead(){ global $ROOM; return $ROOM->date > 1; }
}
