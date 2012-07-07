<?php
/*
  ◆キューピッド登場 (cupid)
  ○仕様
  ・配役：村人 → キューピッド
*/
class Option_cupid extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = 'キューピッド登場';
		$this->explain = "初日夜に選んだ相手を恋人にします。恋人となった二人は勝利条件が変化します\n　　　[村人1→キューピッド1]";
	}

  function SetRole(&$list, $count){
    global $CAST_CONF, $ROOM;
    if($count >= $CAST_CONF->{$this->name} && ! $ROOM->IsOption('full_' . $this->name) &&
       $list['human'] > 0){
      $list['human']--;
      $list[$this->name]++;
    }
  }
}
