<?php
/*
  ◆虹色迷彩 (rainbow)
  ○仕様
  ・変換リスト：虹 (循環置換)
*/
RoleManager::LoadFile('passion');
class Role_rainbow extends Role_passion{
  var $convert_say_list = array('赤' => '橙', '橙' => '黄', '黄' => '緑', '緑' => '青',
				'青' => '藍', '藍' => '紫', '紫' => '赤');
  function __construct(){ parent::__construct(); }
}
