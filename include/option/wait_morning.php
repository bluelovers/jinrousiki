<?php
class Option_wait_morning extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '早朝待機制';
		$this->explain = '夜が明けてから一定時間の間発言ができません';
	}
}
