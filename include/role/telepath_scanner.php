<?php
/*
  ◆念騒霊 (telepath_scanner)
  ○仕様
  ・発言透過対象：妖狐
*/
RoleManager::LoadFile('whisper_scanner');
class Role_telepath_scanner extends Role_whisper_scanner{
  public $mind_read_target = 'fox';
  function __construct(){ parent::__construct(); }
}
