<?php
/*
  ◆決定者登場 (decide)
  ○仕様
*/
class Option_decide extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '決定者登場';
		$this->explain = '投票が同数の時、決定者の投票先が優先されます [兼任]';
	}

  function Cast(&$list, &$rand){
    global $CAST_CONF, $ROLES;
    if($ROLES->stack->user_count >= $CAST_CONF->{$this->name}) return $this->CastOnce($list, $rand);
  }
}
