<?php
class Option_full_unknown_mania extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '鵺村';
		$this->explain = '鵺村';
	}
}
