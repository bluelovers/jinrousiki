<?php
class Option_replace_human_selector extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->collect = 'CollectValue';
		$this->items_source = 'replace_human_items';
	}

	function LoadMessages() {
		$this->label = 'モード名';
		$this->caption = '村人置換村';
		$this->explain = '「村人」が全員特定の役職に入れ替わります';
	}
}
