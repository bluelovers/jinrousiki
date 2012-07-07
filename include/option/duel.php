<?php
class Option_duel extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '決闘村';
		$this->explain = '決闘村';
	}
}
