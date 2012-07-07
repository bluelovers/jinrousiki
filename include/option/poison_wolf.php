<?php
/*
  ◆毒狼登場 (poison_wolf)
  ○仕様
  ・配役：人狼 → 毒狼 / 村人 → 薬師
*/
class Option_poison_wolf extends CheckRoomOptionItem {
  function __construct(){
		parent::__construct(RoomOption::ROLE_OPTION);
	}

	function  LoadMessages() {
		$this->caption = '毒狼登場';
		$this->explain = "処刑時にランダムで村人一人を巻き添えにする狼です\n　　　[人狼1→毒狼1 / 村人1→薬師1]";
	}

  function SetRole(&$list, $count){
    global $CAST_CONF;
    if($count >= $CAST_CONF->{$this->name} && $list['wolf'] > 0 && $list['human'] > 0){
      $list['wolf']--;
      $list[$this->name]++;
      $list['human']--;
      $list['pharmacist']++;
    }
  }
}
