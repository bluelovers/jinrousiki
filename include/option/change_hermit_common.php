<?php
class Option_change_hermit_common extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '隠者村';
		$this->explain = '隠者村';
	}
}
