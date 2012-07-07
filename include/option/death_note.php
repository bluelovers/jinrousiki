<?php
class Option_death_note extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = 'デスノート村';
		$this->explain = '毎日、誰か一人に「デスノート」が与えられます';
	}
}
