<?php
/*
  ◆埋毒者登場 (poison)
  ○仕様
  ・配役：村人2 → 埋毒者1・人狼1
*/
class Option_poison extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '埋毒者登場';
		$this->explain = '処刑されたり狼に食べられた場合、道連れにします [村人2→埋毒1・人狼1]';
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
