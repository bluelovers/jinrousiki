<?php
class Option_chaos_verso extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '裏・闇鍋モード';
		$this->explain = '裏・闇鍋モード';
	}
}
