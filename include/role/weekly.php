<?php
/*
  ◆七曜迷彩 (weekly)
  ○仕様
  ・変換リスト：曜日 (循環置換)
*/
RoleManager::LoadFile('passion');
class Role_weekly extends Role_passion{
  public $convert_say_list = array('月' => '火', '火' => '水', '水' => '木', '木' => '金',
				   '金' => '土', '土' => '日', '日' => '月');
  function __construct(){ parent::__construct(); }
}
