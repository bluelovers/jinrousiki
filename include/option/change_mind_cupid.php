<?php
class Option_change_mind_cupid extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '女神村';
		$this->explain = '女神村';
	}
}
