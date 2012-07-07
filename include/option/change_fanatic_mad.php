<?php
class Option_change_fanatic_mad extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '狂信者村';
		$this->explain = '狂信者村';
	}
}
