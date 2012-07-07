<?php
/*
  ◆子狐登場 (child_fox)
  ○仕様
  ・配役：妖狐 → 子狐
*/
class Option_child_fox extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '子狐登場';
		$this->explain = "限定的な占い能力を持ち、占い結果が「村人」・霊能結果が「子狐」となる妖狐です \n　　　[妖狐1→子狐1]";
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['fox'] > 0){
      $list['fox']--;
      $list[$this->name]++;
    }
  }
}
