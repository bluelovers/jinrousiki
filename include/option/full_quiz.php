<?php
class Option_full_quiz extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '出題者村';
		$this->explain = '出題者村';
	}
}
