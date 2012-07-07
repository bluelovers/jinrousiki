<?php
/*
  ◆白澤 (history_brownie)
  ○仕様
  ・人狼襲撃：特殊イベント
  ・特殊イベント (夜)：夜スキップ
*/
class Role_history_brownie extends Role {
  public $event_night = 'skip_night';
  function __construct(){ parent::__construct(); }

  function WolfEatCounter($user){ $this->AddStack($this->event_night, 'event'); }
}
