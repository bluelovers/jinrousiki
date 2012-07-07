<?php
/*
  ◆銀狼 (silver_wolf)
  ○仕様
  ・仲間表示：なし
*/
RoleManager::LoadFile('wolf');
class Role_silver_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  function IsWolfPartner($id){ return false; }

  function Whisper($builder, $voice){
    global $ROOM;
    return $ROOM->date > 1 && $this->Howl($builder, $voice);
  }
}
