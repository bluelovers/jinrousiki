<?php
class Option_sub_role_limit extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->formtype = 'group';
		$this->collect = 'CollectValue';
	}

	function  GetItems() {
		$items = array(
				'no_sub_role' => RoomOption::Get('no_sub_role'),
				'easy' => RoomOption::Get('sub_role_limit_easy'),
				'normal' => RoomOption::Get('sub_role_limit_normal'),
				'hard' => RoomOption::Get('sub_role_limit_hard'),
				'' => new Option_sub_role_limit_none(),
		);
		if (isset($items[$this->value])) {
			$items[$this->value]->value = true;
		}
		return $items;
	}

	function LoadMessages() {
		$this->caption = 'サブ役職制限';
	}
}

class Option_sub_role_limit_none extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->formtype = 'radio';
		$this->collect = null;
	}

	function LoadMessages() {
		$this->explain = 'サブ役職制限なし';
	}
}
