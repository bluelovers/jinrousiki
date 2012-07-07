<?php
class Option_full_mad extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '狂人村';
		$this->explain = '狂人村';
	}
}
