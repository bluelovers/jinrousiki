<?php
class Option_sub_role_limit_normal extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->formtype = 'radio';
	}

	function LoadMessages() {
		$this->caption = 'サブ役職制限：NORMALモード';
		$this->explain = 'サブ役職制限：NORMALモード';
	}
}
