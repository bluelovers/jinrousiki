<?php
class Option_gerd extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = 'ゲルト君モード';
		$this->explain = '役職が村人固定になります [村人が出現している場合のみ有効]';
	}
}
