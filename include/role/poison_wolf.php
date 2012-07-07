<?php
/*
  ◆毒狼 (poison_wolf)
  ○仕様
  ・毒：人狼系以外
  ・襲撃毒死回避：人狼系
*/
RoleManager::LoadFile('wolf');
class Role_poison_wolf extends Role_wolf{
  public $mix_in = 'poison';
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){ return ! $user->IsWolf(); }

  function AvoidPoisonEat($user){ return $user->IsWolf(); }
}
