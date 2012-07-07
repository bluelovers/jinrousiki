<?php
/*
  ◆白狼登場 (boss_wolf)
  ○仕様
  ・配役：人狼 → 白狼
*/
class Option_boss_wolf extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '白狼登場';
		$this->explain = '占い結果が「村人」・霊能結果が「白狼」と表示される狼です [人狼1→白狼1]';
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['wolf'] > 0){
      $list['wolf']--;
      $list[$this->name]++;
    }
  }
}
