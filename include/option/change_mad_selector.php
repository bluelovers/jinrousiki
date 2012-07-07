<?php
class Option_change_mad_selector extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->collect = 'CollectValue';
		$this->items_source = 'change_mad_items';
	}

	function LoadMessages() {
		$this->label = 'モード名';
		$this->caption = '狂人置換村';
		$this->explain = '「狂人」が全員特定の役職に入れ替わります';
	}
}
