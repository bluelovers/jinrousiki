<?php
/*
  ◆狼少年村 (liar)
  ○仕様
*/
class Option_liar extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '狼少年村';
		$this->explain = 'ランダムで「狼少年」がつきます';
	}

  function Cast(&$list, &$rand){
    foreach(array_keys($list) as $id){ if(mt_rand(0, 9) < 6) $list[$id] .= ' ' . $this->name; }
    return array($this->name);
  }
}
