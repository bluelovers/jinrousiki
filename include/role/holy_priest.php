<?php
/*
  ◆聖徳道士 (holy_priest)
  ○仕様
  ・司祭：身代わり君 + 自分 + 自分周辺の勝利陣営数 (5日目)
*/
RoleManager::LoadFile('priest');
class Role_holy_priest extends Role_priest{
  function __construct(){ parent::__construct(); }

  protected function GetOutputRole(){
    global $ROOM;
    return $ROOM->date == 5 ? $this->role : NULL;
  }

  protected function SetPriest(){
    global $ROOM;
    if($ROOM->date == 4) parent::SetPriest();
    return false;
  }

  function Priest($role_flag){
    global $ROOM, $USERS;

    $event = $this->GetEvent();
    $max   = count($this->GetUser());
    foreach($role_flag->{$this->role} as $uname){
      $user = $USERS->ByUname($uname);
      $num  = $user->user_no;
      $list = array();
      for($i = -1; $i < 2; $i++){ //周辺 ID を取得
	$j = $num + $i * 5;
	if($j < 1 || $max + 1 < $j) continue;
	if($j <= $max) $list[] = $j;
	if(($j % 5) != 1 && $j > 1)    $list[] = $j - 1;
	if(($j % 5) != 0 && $j < $max) $list[] = $j + 1;
      }
      if($ROOM->IsDummyBoy() && ! in_array(1, $list)) $list[] = 1; //身代わり君を追加
      //PrintData($list, $num);
      $stack = array();
      foreach($list as $id) $stack[$USERS->ByID($id)->GetCamp(true)][] = $id; //陣営カウント
      //PrintData($stack, $uname);
      $ROOM->ResultAbility($event, count(array_keys($stack)), null, $user->user_no);
    }
  }
}
