<?php
class Option_chaos_open_cast_camp extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->formtype = 'radio';
	}

	function LoadMessages() {
		$this->caption = '配役を通知する:陣営通知';
		$this->explain = '陣営通知 (陣営ごとの合計を通知)';
	}
}
