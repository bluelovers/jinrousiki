<?php
class Option_change_cupid_selector extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::ROLE_OPTION);
		$this->collect = 'CollectValue';
		$this->items_source = 'change_cupid_items';
	}

	function LoadMessages() {
		$this->label = 'モード名';
		$this->caption = 'キューピッド置換村';
		$this->explain = '「キューピッド」が全員特定の役職に入れ替わります';
	}
}
