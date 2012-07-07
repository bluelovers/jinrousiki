<?php
/*
  ◆マスク (downer_voice)
  ○仕様
  ・声量変換：下方シフト
*/
RoleManager::LoadFile('strong_voice');
class Role_downer_voice extends Role_strong_voice{
  function __construct(){ parent::__construct(); }

  function FilterVoice(&$voice, &$str){ $this->ShiftVoice($voice, $str, false); }
}
