<?php
class Option_change_immolate_mad extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->caption = '殉教者村';
		$this->explain = '殉教者村';
	}
}
