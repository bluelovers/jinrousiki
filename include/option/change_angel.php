<?php
class Option_change_angel extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '天使村';
		$this->explain = '天使村';
	}
}
