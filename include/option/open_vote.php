<?php
class Option_open_vote extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '投票した票数を公表する';
		$this->explain = '「権力者」などのサブ役職が分かりやすくなります';
	}
}
