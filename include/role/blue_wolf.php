<?php
/*
  ◆蒼狼
  ○仕様
  ・妖狐襲撃：はぐれ者
*/
RoleManager::LoadFile('wolf');
class Role_blue_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  function FoxEatAction($user){ if(! $user->IsLonely()) $user->AddRole('mind_lonely'); }
}
