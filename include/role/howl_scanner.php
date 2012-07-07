<?php
/*
  ◆吠騒霊 (howl_scanner)
  ○仕様
  ・発言透過対象：人狼
*/
RoleManager::LoadFile('whisper_scanner');
class Role_howl_scanner extends Role_whisper_scanner{
  public $mind_read_target = 'wolf';
  function __construct(){ parent::__construct(); }
}
