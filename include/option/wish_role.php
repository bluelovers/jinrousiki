<?php
class Option_wish_role extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '役割希望制';
		$this->explain = '希望の役割を指定できますが、なれるかは運です';
	}
}
