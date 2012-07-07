<?php
class Option_open_day extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = 'オープニングあり';
		$this->explain = 'ゲームが1日目「昼」からスタートします';
	}
}
