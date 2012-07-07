<?php
class Option_full_mania extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '神話マニア村';
		$this->explain = '神話マニア村';
	}
}
