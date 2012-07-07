<?php
class Option_no_sub_role extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->formtype = 'radio';
	}

	function LoadMessages() {
		$this->caption = 'サブ役職をつけない';
		$this->explain = 'サブ役職をつけない';
	}
}
