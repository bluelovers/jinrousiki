<?php
/*
  ◆妖狐追加 (fox)
  ○仕様
  ・配役：村人 → 妖狐
*/
class Option_fox extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '妖狐追加';
		$this->explain = '妖狐をもう一人追加します [村人1→妖狐1]';
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['human'] > 0){
      $list['human']--;
      $list[$this->name]++;
    }
  }
}
