<?php
class Option_topping extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->label = 'モード名';
		$this->caption = '固定配役追加モード';
		$this->explain = '固定配役に追加する役職セットです';
	}
}
