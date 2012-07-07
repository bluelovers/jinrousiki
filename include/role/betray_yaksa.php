<?php
/*
  ◆夜叉丸 (betray_yaksa)
  ○仕様
  ・勝利：生存 + 蝙蝠陣営全滅 + 村人陣営勝利
  ・人攫い無効：蝙蝠陣営以外
*/
RoleManager::LoadFile('yaksa');
class Role_betray_yaksa extends Role_yaksa{
  function __construct(){ parent::__construct(); }

  protected function IgnoreWin($winner){ return $winner != 'human'; }

  protected function IgnoreAssassin($user){ return ! $user->IsCamp('chiroptera', true); }
}
