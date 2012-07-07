<?php
class Option_replace_human extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '村人置換村';
		$this->explain = '村人置換村';
	}
}
