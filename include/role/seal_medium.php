<?php
/*
  ◆封印師 (seal_medium)
  ○仕様
  ・処刑投票：封印 (限定能力所持者 / 人外限定)
*/
RoleManager::LoadFile('medium');
class Role_seal_medium extends Role_medium{
  public $mix_in = 'critical_mad';
  public $sudden_death = 'SEALED';
  public $seal_list = array(
    'phantom_wolf', 'resist_wolf', 'revive_wolf', 'fire_wolf', 'tongue_wolf', 'trap_mad',
    'possessed_mad', 'revive_mad', 'phantom_fox', 'spell_fox', 'emerald_fox', 'revive_fox',
    'possessed_fox', 'trap_fox', 'revive_cupid', 'revive_avenger');
  function __construct(){ parent::__construct(); }

  function SetVoteAction($user){
    if(! $user->IsRole($this->seal_list)) return;
    $user->IsActive() ? $user->LostAbility() : $this->SuddenDeathKill($user->user_no);
  }
}
