<?php
/*
  ◆滝夜叉姫 (cursed_yaksa)
  ○仕様
  ・勝利：生存 + 占い師系・魔法使い系全滅
  ・人攫い無効：占い師系・魔法使い系以外
*/
RoleManager::LoadFile('yaksa');
class Role_cursed_yaksa extends Role_yaksa{
  public $reduce_rate = 3;
  function __construct(){ parent::__construct(); }

  protected function IgnoreWin($winner){ return false; }

  protected function IgnoreAssassin($user){
    return ! ($user->IsRoleGroup('mage', 'wizard') || $user->IsRole('voodoo_killer'));
  }
}
