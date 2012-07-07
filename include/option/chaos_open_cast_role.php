<?php
class Option_chaos_open_cast_role extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->formtype = 'radio';
	}

	function LoadMessages() {
		$this->caption = '配役を通知する:役職通知';
		$this->explain = '役職通知 (役職の種類別に合計を通知)';
	}
}
