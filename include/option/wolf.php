<?php
/*
  ◆人狼追加 (wolf)
  ○仕様
  ・配役：村人 → 人狼
*/
class Option_wolf extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '人狼追加';
		$this->explain = '人狼をもう一人追加します [村人1→人狼1]';
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['human'] > 0){
      $list['human']--;
      $list[$this->name]++;
    }
  }
}
