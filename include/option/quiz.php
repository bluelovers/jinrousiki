<?php
/*
  ◆クイズ村 (quiz)
  ○仕様
  ・配役：解答者付加 (出題者以外)
*/
class Option_quiz extends CheckRoomOptionItem{
  function __construct(){
		parent::__construct(RoomOption::GAME_OPTION);
	}

	function  LoadMessages() {
		$this->caption = 'クイズ村';
		$this->explain = 'GMが出題者になり、プレイヤー全員に回答者がつきます。';
	}

  function Cast(&$list, &$rand){
    global $ROLES;

    $role = 'panelist';
    foreach(array_keys($list) as $id){
      if($ROLES->stack->uname_list[$id] != 'dummy_boy')  $list[$id] .= ' ' . $role;
    }
    return array($role);
  }
}
