<?php
/*
  ◆憑狼登場 (possessed_wolf)
  ○仕様
  ・配役：人狼 → 憑狼
*/
class Option_possessed_wolf extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '憑狼登場';
		$this->explain = '襲撃した人に憑依して乗っ取ってしまう狼です [人狼1→憑狼1]';
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['wolf'] > 0){
      $list['wolf']--;
      $list[$this->name]++;
    }
  }
}
