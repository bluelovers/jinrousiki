<?php
/*
  ◆天狼登場 (sirius_wolf)
  ○仕様
  ・配役：人狼 → 天狼
*/
class Option_sirius_wolf extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '天狼登場';
		$this->explain = '仲間が減ると特殊能力が発現する狼です [人狼1→天狼1]';
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['wolf'] > 0){
      $list['wolf']--;
      $list[$this->name]++;
    }
  }
}
