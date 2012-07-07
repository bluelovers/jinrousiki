<?php
class Option_full_cupid extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = 'キューピッド村';
		$this->explain = 'キューピッド村';
	}
}
