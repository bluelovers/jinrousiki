<?php
class Option_weather extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '天候あり';
		$this->explain = '「天候」と呼ばれる特殊イベントが発生します';
	}
}
