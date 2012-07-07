<?php
/*
  ◆内弁慶 (inside_voice)
  ○仕様
  ・声量変換：昼「小声」 / 夜「大声」固定
*/
RoleManager::LoadFile('strong_voice');
class Role_inside_voice extends Role_strong_voice{
  function __construct(){ parent::__construct(); }

  function FilterVoice(&$voice, &$str){
    global $ROOM;
    $stack = $this->voice_list;
    $voice = $ROOM->IsNight() ? array_pop($stack) : array_shift($stack);
  }
}
