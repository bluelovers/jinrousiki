<?php
/*
  ◆冥狼 (doom_wolf)
  ○仕様
  ・妖狐襲撃：死の宣告
  ・襲撃：死の宣告
*/
RoleManager::LoadFile('wolf');
class Role_doom_wolf extends Role_wolf{
  function __construct(){ parent::__construct(); }

  function FoxEatAction($user){ $user->AddDoom(2); }

  function WolfEatAction($user){
    $user->AddDoom(2);
    $user->wolf_eat = true; //襲撃は成功扱い
    return true;
  }
}
