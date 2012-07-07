<?php
class Option_full_vampire extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '吸血鬼村';
		$this->explain = '吸血鬼村';
	}
}
