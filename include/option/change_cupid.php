<?php
class Option_change_cupid extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = 'キューピッド置換村';
		$this->explain = 'キューピッド置換村';
	}
}
