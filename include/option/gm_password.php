<?php
class Option_gm_password extends TextRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::NOT_OPTION);
		$this->formtype = 'password';
		$this->collect = null;
	}

	function LoadMessages() {
		parent::LoadMessages();
		$this->caption = 'GM ログインパスワード';
		$this->footer = "(仮想 GM モード・クイズ村モード時の GM のパスワードです)\n※ ログインユーザ名は「dummy_boy」です。GM は入村直後に必ず名乗ってください。";
	}
}
