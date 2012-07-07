<?php
/*
  ◆草刈り (mower)
  ○仕様
  ・変換リスト：草消去
*/
RoleManager::LoadFile('passion');
class Role_mower extends Role_passion{
  public $convert_say_list = array('w' => '', 'ｗ' => '', 'W' => '', 'Ｗ' => '');
  function __construct(){ parent::__construct(); }
}
