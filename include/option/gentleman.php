<?php
/*
  ◆紳士・淑女村 (gentleman)
  ○仕様
  ・配役：性別に応じた紳士・淑女 / 全員
*/
class Option_gentleman extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '紳士・淑女村';
		$this->explain = '全員に性別に応じた「紳士」「淑女」がつきます';
	}

  function Cast(&$list, &$rand){
    global $ROLES, $USERS;

    $stack = array('male' => 'gentleman', 'female' => 'lady');
    foreach(array_keys($list) as $id){
      $list[$id] .= ' ' . $stack[$USERS->ByUname($ROLES->stack->uname_list[$id])->sex];
    }
    return array('gentleman', 'lady');
  }
}
