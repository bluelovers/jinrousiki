<?php
/*
  ◆預言者 (crisis_priest)
  ○仕様
  ・役職表示：村人
  ・司祭：人外勝利前日情報 (2日目以降)
*/
RoleManager::LoadFile('priest');
class Role_crisis_priest extends Role_priest{
  public $display_role = 'human';
  function __construct(){ parent::__construct(); }

  protected function GetOutputRole(){
    global $ROOM;
    return $ROOM->date > 1 ? $this->role : null;
  }

  function Priest($role_flag){
    global $ROOM;
    $data = $this->GetStack('priest');
    if(property_exists($data, 'crisis')) $ROOM->ResultAbility($this->GetEvent(), $data->crisis);
  }
}
