<?php
/*
  ◆探偵村 (detective)
  ○仕様
*/
class Option_detective extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '探偵村';
		$this->explain = '「探偵」が登場し、初日の夜に全員に公表されます';
	}

  function SetRole(&$list, $count){
    if($list['common'] > 0){
      $list['common']--;
      $list['detective_common']++;
    }
    elseif($list['human'] > 0){
      $list['human']--;
      $list['detective_common']++;
    }
  }
}
