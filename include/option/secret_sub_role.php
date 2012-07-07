<?php
class Option_secret_sub_role extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function LoadMessages() {
		$this->caption = 'サブ役職を表示しない';
		$this->explain = 'サブ役職が分からなくなります：闇鍋モード専用オプション';
	}
}
