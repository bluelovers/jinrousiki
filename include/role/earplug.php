<?php
/*
  ◆耳栓 (earplug)
  ○仕様
  ・声の大きさが一段階小さくなり、小声は共有者の囁きに見える
  ・共有者の囁きは変換対象外

  ○問題点
  ・観戦モードにすると普通に見えてしまう
*/
RoleManager::LoadFile('strong_voice');
class Role_earplug extends Role_strong_voice{
  public $mix_in = 'blinder';
  function __construct(){ parent::__construct(); }

  function IgnoreTalk(){
    global $ROOM;
    return parent::IgnoreTalk() || ! $ROOM->IsPlaying() ||
      ($ROOM->log_mode && $ROOM->IsEvent($this->role) && ! $ROOM->IsDay());
  }

  function FilterTalk($user, &$name, &$voice, &$str){
    if(! $this->IgnoreTalk()) $this->ShiftVoice($voice, $str, false);
  }

  function FilterWhisper(&$voice, &$str){
    if(! $this->IgnoreTalk()) $this->ShiftVoice($voice, $str, false);
  }
}
