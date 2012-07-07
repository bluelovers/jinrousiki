<?php
/*
  ◆紳士 (gentleman)
  ○仕様
  ・発言変換：完全置換 (生存者ユーザ名 (ランダム) + サーバ設定)
*/
class Role_gentleman extends Role{
  function __construct(){ parent::__construct(); }

  function ConvertSay(){
    global $GAME_CONF, $MESSAGE, $USERS;

    if(mt_rand(1, 100) > $GAME_CONF->gentleman_rate) return false; //スキップ判定
    $stack = $USERS->GetLivingUsers(); //生存者のユーザ名を取得
    unset($stack[array_search($this->GetUname(), $stack)]); //自分を削除
    $target = $USERS->GetHandleName(GetRandom($stack), true);
    //PrintData($stack);
    $say = $MESSAGE->{$this->role . '_header'} . $target . $MESSAGE->{$this->role . '_footer'};
    $this->SetStack($say, 'say');
    return true;
  }
}
