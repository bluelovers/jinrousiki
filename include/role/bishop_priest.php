<?php
/*
  ◆司教 (bishop_priest)
  ○仕様
  ・司祭：村人陣営以外の死者 (奇数日 / 3日目以降)
*/
RoleManager::LoadFile('priest');
class Role_bishop_priest extends Role_priest{
  public $priest_type = 'dead';
  function __construct(){ parent::__construct(); }

  protected function GetOutputRole(){
    global $ROOM;
    return $ROOM->date > 2 && ($ROOM->date % 2) == 1 ? $this->role : NULL;
  }

  protected function GetPriestRole($list){
    global $ROOM;
    return $ROOM->date > 1 && ($ROOM->date % 2) == 0 ? $this->role : NULL;
  }
}
