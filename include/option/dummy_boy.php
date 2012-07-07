<?php
class Option_dummy_boy extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
		$this->formtype = 'radio';
	}

	function LoadMessages() {
		$this->caption = '初日の夜は身代わり君';
		$this->explain = '身代わり君あり (初日の夜、身代わり君が狼に食べられます)';
	}
}
