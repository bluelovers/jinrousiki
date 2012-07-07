<?php
/*
  ◆臆病者 (random_voice)
  ○仕様
  ・声量変換：ランダム
*/
RoleManager::LoadFile('strong_voice');
class Role_random_voice extends Role_strong_voice{
  function __construct(){ parent::__construct(); }

  function FilterVoice(&$voice, &$str){ $voice = GetRandom($this->voice_list); }
}
