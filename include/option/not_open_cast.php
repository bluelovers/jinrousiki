<?php
class Option_not_open_cast extends CheckRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
		$this->formtype = 'radio';
	}

	function LoadMessages() {
		$this->caption = '霊界で配役を公開しない';
		$this->explain = '常時非公開 (誰がどの役職なのか公開されません。蘇生能力は有効です)';
	}
}
