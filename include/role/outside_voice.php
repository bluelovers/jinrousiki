<?php
/*
  ◆外弁慶 (outside_voice)
  ○仕様
  ・声量変換：昼「大声」 / 夜「小声」固定
*/
RoleManager::LoadFile('strong_voice');
class Role_outside_voice extends Role_strong_voice{
  function __construct(){ parent::__construct(); }

  function FilterVoice(&$voice, &$str){
    global $ROOM;
    $stack = $this->voice_list;
    $voice = $ROOM->IsDay() ? array_pop($stack) : array_shift($stack);
  }
}
