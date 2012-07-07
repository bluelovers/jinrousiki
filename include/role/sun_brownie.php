<?php
/*
  ◆八咫烏 (sun_brownie)
  ○仕様
  ・特殊イベント (昼)：目隠し
  ・特殊イベント (夜)：公開者
*/
RoleManager::LoadFile('history_brownie');
class Role_sun_brownie extends Role_history_brownie {
  public $event_day   = 'blinder';
  public $event_night = 'mind_open';
  function __construct(){ parent::__construct(); }

  function VoteKillCounter($list){
    global $ROOM;
    $ROOM->SystemMessage($this->event_day, 'EVENT', 1);
  }
}
