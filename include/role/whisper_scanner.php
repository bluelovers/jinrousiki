<?php
/*
  ◆囁騒霊 (whisper_scanner)
  ○仕様
  ・追加役職：なし
  ・投票：なし
  ・発言透過対象：共有者
*/
RoleManager::LoadFile('mind_scanner');
class Role_whisper_scanner extends Role_mind_scanner{
  public $action    = NULL;
  public $mind_role = NULL;
  public $mind_read_target = 'common';
  function __construct(){ parent::__construct(); }

  function IsMindRead(){
    global $ROOM;
    return $ROOM->date > 1 && $this->GetTalkFlag($this->mind_read_target);
  }
}
