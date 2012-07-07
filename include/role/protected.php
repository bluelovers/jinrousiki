<?php
/*
  ◆庇護者 (protected)
  ○仕様
  ・人狼襲撃耐性：身代わり (庇護者付加者)
*/
class Role_protected extends Role{
  function __construct(){ parent::__construct(); }

  function WolfEatResist(){
    global $USERS;

    if($this->IgnoreSacrifice()) return false;
    $stack = array();
    foreach($this->GetActor()->GetPartner($this->role) as $id){
      if($USERS->ByID($id)->IsLive(true)) $stack[] = $id;
    }
    return $this->Sacrifice($stack);
  }

  //身代わり無効判定
  function IgnoreSacrifice(){
    global $ROOM;
    return $ROOM->IsEvent('no_sacrifice');
  }

  //身代わり処理
  function Sacrifice($stack){
    global $USERS;

    //PrintData($stack, "Sacrifice [{$this->role}]");
    if(count($stack) < 1) return false;
    $USERS->Kill(GetRandom($stack), 'SACRIFICE');
    return true;
  }

  //人狼襲撃得票カウンター (Mixin 用)
  function WolfEatReaction(){
    if($this->IgnoreSacrifice()) return false;
    $stack = array();
    $class = $this->GetClass($method = 'IsSacrifice');
    foreach($this->GetUser() as $user){
      if($user->IsLive(true) && $class->$method($user)) $stack[] = $user->user_no;
    }
    return $this->Sacrifice($stack);
  }
}
