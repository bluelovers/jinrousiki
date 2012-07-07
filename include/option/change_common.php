<?php
class Option_change_common extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '共有者置換村';
		$this->explain = '共有者置換村';
	}
}
