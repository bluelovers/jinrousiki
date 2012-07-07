<?php
/*
  ◆白夜村 (mind_open)
  ○仕様
*/
class Option_mind_open extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '白夜村';
		$this->explain = '全員に「公開者」がつきます';
	}

  function Cast(&$list, &$rand){ return $this->CastAll($list); }
}
