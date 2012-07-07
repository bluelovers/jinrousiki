<?php
class Option_boost_rate extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function LoadMessages() {
		$this->label = 'モード名';
		$this->caption = '出現率変動モード';
		$this->explain = '役職の出現率に補正がかかります';
	}
}
