<?php
class Option_change_whisper_mad extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '囁き狂人村';
		$this->explain = '囁き狂人村';
	}
}
