<?php
/*
  ◆暗殺者登場 (assassin)
  ○仕様
  ・配役：村人2 → 暗殺者1・人狼1
*/
class Option_assassin extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '暗殺者登場';
		$this->explain = '夜に村人一人を暗殺することができます [村人2→暗殺者1・人狼1]';
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['human'] > 1){
      $list['human'] -= 2;
      $list[$this->name]++;
      $list['wolf']++;
    }
  }
}
