<?php
class Option_seal_message extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = '天啓封印';
		$this->explain = '一部の個人通知メッセージが表示されなくなります';
	}
}
