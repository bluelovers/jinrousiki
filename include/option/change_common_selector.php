<?php
class Option_change_common_selector extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->collect = 'CollectValue';
		$this->items_source = 'change_common_items';
	}

	function LoadMessages() {
		$this->label = 'モード名';
		$this->caption = '共有者置換村';
		$this->explain = '「共有者」が全員特定の役職に入れ替わります';
	}
}
