<?php
class Option_change_mad extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '狂人置換村';
		$this->explain = '狂人置換村';
	}
}
