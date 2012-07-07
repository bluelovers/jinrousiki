<?php
/*
  ◆ジョーカー村 (joker)
  ○仕様
*/
class Option_joker extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function  LoadMessages() {
		$this->caption = 'ババ抜き村';
		$this->explain = '誰か一人に「ジョーカー」がつきます';
	}

  function Cast(&$list, &$rand){ $this->CastOnce($list, $rand, '[2]'); }
}
