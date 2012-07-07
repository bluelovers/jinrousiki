<?php
class Option_gm_login extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
		$this->formtype = 'radio';
	}

	function LoadMessages() {
		$this->caption = '初日の夜は身代わり君:仮想 GM';
		$this->explain = '仮想 GM が身代わり君としてログインします';
	}
}
