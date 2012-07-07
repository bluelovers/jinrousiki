<?php
/*
  ◆吟遊詩人 (minstrel_cupid)
  ○仕様
  ・発言透過対象：恋人
*/
RoleManager::LoadFile('cupid');
class Role_minstrel_cupid extends Role_cupid{
  function __construct(){ parent::__construct(); }

  function IsMindRead(){
    global $ROOM;
    return $ROOM->date > 1 && $this->GetTalkFlag('lovers');
  }
}
