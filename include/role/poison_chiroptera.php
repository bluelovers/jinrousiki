<?php
/*
  ◆毒蝙蝠 (poison_chiroptera)
  ○仕様
  ・毒：人狼系 + 妖狐陣営 + 蝙蝠陣営
*/
class Role_poison_chiroptera extends Role{
  public $mix_in = 'poison';
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){ return $user->IsRoleGroup('wolf', 'fox', 'chiroptera', 'fairy'); }
}
