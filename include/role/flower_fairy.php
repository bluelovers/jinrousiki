<?php
/*
  ◆花妖精 (flower_fairy)
  ○仕様
  ・悪戯：死亡欄妨害 (花)
*/
RoleManager::LoadFile('fairy');
class Role_flower_fairy extends Role_fairy {
  public $result = 'FLOWERED';
  function __construct(){ parent::__construct(); }

  function FairyAction($user){
    global $ROOM, $USERS;

    $handle_name = $USERS->GetHandleName($user->uname);
    $ROOM->ResultDead($handle_name, $this->result, GetRandom(range('A', 'Z')));
  }
}
