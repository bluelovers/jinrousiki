<?php
/*
  ◆榊鬼 (poison_ogre)
  ○仕様
  ・勝利：出題者陣営勝利 or 生存
  ・人攫い無効：出題者
  ・人攫い：解答者付加
  ・毒：人狼系 + 妖狐陣営 + 鬼陣営
*/
RoleManager::LoadFile('ogre');
class Role_poison_ogre extends Role_ogre{
  public $mix_in = 'poison';
  public $reduce_rate = 3;
  function __construct(){ parent::__construct(); }

  function Win($winner){ return $winner == 'quiz' || $this->IsLive(); }

  protected function IgnoreAssassin($user){ return $user->IsRole('quiz'); }

  protected function Assassin($user){ $user->AddRole('panelist'); }

  function IsPoisonTarget($user){ return $user->IsRoleGroup('wolf', 'fox', 'ogre', 'yaksa'); }
}
