<?php
/**
 * 特殊配役モード(special_role)
 * 使用可能なモードは/config/game_option.phpの$special_role_listを参照してください。
 * @author enogu
 */
class Option_special_role extends SelectorRoomOptionItem {
	function  __construct() {
		parent::__construct(RoomOption::GAME_OPTION);
		$this->collect = 'CollectValue';
	}

	function  LoadMessages() {
		$this->caption = '特殊配役モード';
		$this->explain = '詳細は<a href="info/game_option.php">ゲームオプション</a>を参照してください';
		$this->label = 'モード名';
	}
}
?>
