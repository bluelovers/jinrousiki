<?php
class Option_change_triangle_cupid extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '小悪魔村';
		$this->explain = '小悪魔村';
	}
}
