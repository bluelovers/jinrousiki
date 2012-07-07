<?php
/*
  ◆神話マニア登場 (mania)
  ○仕様
  ・配役：村人 → 神話マニア
*/
class Option_mania extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '神話マニア登場';
		$this->explain = '初日夜に他の村人の役職をコピーします [村人1→神話マニア1]';
	}

  function SetRole(&$list, $count){
    global $CAST_CONF, $ROOM;
    if($count >= $CAST_CONF->{$this->name} && ! $ROOM->IsOption('full_' . $this->name) &&
       $list['human'] > 0){
      $list['human']--;
      $list[$this->name]++;
    }
  }
}
