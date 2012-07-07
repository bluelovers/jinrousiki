<?php
/*
  ◆虚弱体質村 (sudden_death)
  ○仕様
*/
class Option_sudden_death extends CheckRoomOptionItem {
  public $disable_list = array('febris', 'frostbite', 'death_warrant', 'panelist');

  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '虚弱体質村';
		$this->explain = '全員に投票でショック死するサブ役職のどれかがつきます';
	}

  function Cast(&$list, &$rand){
    global $ROLE_DATA;

    $stack = array_diff($ROLE_DATA->sub_role_group_list['sudden-death'], $this->disable_list);
    $role_list = $stack;
    //PrintData($stack, 'SuddenDeath');
    foreach(array_keys($list) as $id){ //全員に小心者系を何かつける
      $role = GetRandom($stack);
      $list[$id] .= ' ' . $role;
      if($role == 'impatience') $stack = array_diff($stack, array('impatience')); //短気は一人だけ
    }
    return $role_list;
  }
}
