<?php
class Option_chaos_hyper extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '超・闇鍋モード';
		$this->explain = '超・闇鍋モード';
	}
}
