<?php
class Option_full_chiroptera extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '蝙蝠村';
		$this->explain = '蝙蝠村';
	}
}
