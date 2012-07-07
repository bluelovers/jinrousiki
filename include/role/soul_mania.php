<?php
/*
  ◆覚醒者 (soul_mania)
  ○仕様
  ・コピー：特殊
  ・変化：上位種
*/
RoleManager::LoadFile('mania');
class Role_soul_mania extends Role_mania {
  public $copied = 'copied_soul';
  public $delay_copy = true;
  public $copy_list = array(
    'human'		=> 'executor',
    'mage'		=> 'soul_mage',
    'necromancer'	=> 'soul_necromancer',
    'medium'		=> 'revive_medium',
    'priest'		=> 'high_priest',
    'guard'		=> 'poison_guard',
    'common'		=> 'ghost_common',
    'poison'		=> 'strong_poison',
    'poison_cat'	=> 'revive_cat',
    'pharmacist'	=> 'alchemy_pharmacist',
    'assassin'		=> 'soul_assassin',
    'mind_scanner'	=> 'clairvoyance_scanner',
    'jealousy'		=> 'miasma_jealousy',
    'brownie'		=> 'history_brownie',
    'wizard'		=> 'soul_wizard',
    'doll'		=> 'doll_master',
    'escaper'		=> 'divine_escaper',
    'wolf'		=> 'sirius_wolf',
    'mad'		=> 'whisper_mad',
    'fox'		=> 'cursed_fox',
    'child_fox'		=> 'jammer_fox',
    'cupid'		=> 'minstrel_cupid',
    'angel'		=> 'sacrifice_angel',
    'quiz'		=> 'quiz',
    'vampire'		=> 'soul_vampire',
    'chiroptera'	=> 'boss_chiroptera',
    'fairy'		=> 'ice_fairy',
    'ogre'		=> 'sacrifice_ogre',
    'yaksa'		=> 'dowser_yaksa',
    'duelist'		=> 'critical_duelist',
    'avenger'		=> 'revive_avenger',
    'patron'		=> 'sacrifice_patron');
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if ($ROOM->date == 2) OutputSelfAbilityResult($this->result);
  }

  protected function GetManiaRole($user){ return $user->DistinguishRoleGroup(); }

  //覚醒コピー
  function DelayCopy($user){
    global $ROOM;

    $actor = $this->GetActor();
    $role  = $user->IsRoleGroup('mania', 'copied') ? 'human' :
      $this->copy_list[$user->IsRole('changed_therian') ? 'mad' : $user->DistinguishRoleGroup()];
    $actor->ReplaceRole($this->role, $role);
    $actor->AddRole($this->copied);
    $ROOM->ResultAbility($this->result, $role, $actor->handle_name, $actor->user_no);
  }
}
