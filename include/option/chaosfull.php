<?php
class Option_chaosfull extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '真・闇鍋モード';
		$this->explain = '真・闇鍋モード';
	}
}
