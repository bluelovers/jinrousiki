<?php
/*
  ◆山彦 (echo_brownie)
  ○仕様
*/
class Role_echo_brownie extends Role {
  function __construct(){ parent::__construct(); }

  //反響
  function EchoSay(){
    global $ROOM;

    if (mt_rand(0, 9) < 6) return; //確率判定
    $query = 'SELECT uname, sentence FROM talk' . $ROOM->GetQuery() .
      ' AND scene = "' . $ROOM->scene . '" ORDER BY id DESC LIMIT 5';
    $stack = FetchAssoc($query);
    if (count($stack) < 1 || $this->IsActor($stack[0]['uname'])) return; //連続発言検出
    $str = GetRandom($stack);
    Write($str['sentence'], $ROOM->scene);
  }
}
