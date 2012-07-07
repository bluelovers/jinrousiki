<?php
class Option_festival extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = 'お祭り村';
		$this->explain = '管理人がカスタムする特殊設定です';
	}
}
