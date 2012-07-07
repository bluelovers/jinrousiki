<?php
/*
  ◆役者 (actor)
  ○仕様
  ・変換リスト：サーバ設定 (GameConfig->actor_replace_list)
*/
RoleManager::LoadFile('passion');
class Role_actor extends Role_passion{
  function __construct(){ parent::__construct(); }

  protected function GetConvertSayList(){
    global $GAME_CONF;
    return $GAME_CONF->actor_replace_list;
  }
}
