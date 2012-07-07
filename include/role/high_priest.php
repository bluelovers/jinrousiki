<?php
/*
  ◆大司祭 (high_priest)
  ○仕様
  ・司祭：司祭＆司教 (5日目以降)
*/
RoleManager::LoadFile('priest');
class Role_high_priest extends Role_priest{
  function __construct(){ parent::__construct(); }

  protected function GetOutputRole(){
    global $ROOM;
    return $ROOM->date > 4 ? (($ROOM->date % 2) == 0 ? 'priest' : 'bishop_priest') : NULL;
  }

  protected function GetPriestRole($list){
    global $ROOM;
    $role = ($ROOM->date % 2) == 1 ? 'priest' : 'bishop_priest';
    return $ROOM->date > 3 && ! in_array($role, $list) ? $role : NULL;
  }

  function GetPriestType(){
    global $ROOM;
    return ($ROOM->date % 2) == 1 ? 'human_side' : 'dead';
  }
}
