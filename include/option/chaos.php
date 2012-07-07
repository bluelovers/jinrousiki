<?php
class Option_chaos extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '闇鍋モード';
		$this->explain = '闇鍋モード';
	}
}
