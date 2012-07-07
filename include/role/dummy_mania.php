<?php
/*
  ◆夢語部 (dummy_mania)
  ○仕様
  ・役職表示：覚醒者
  ・コピー：特殊
  ・変化：基本・劣化種
*/
RoleManager::LoadFile('soul_mania');
class Role_dummy_mania extends Role_soul_mania {
  public $display_role = 'soul_mania';
  public $copied = 'copied_teller';
  public $copy_list = array(
    'human'		=> 'suspect',
    'mage'		=> 'dummy_mage',
    'necromancer'	=> 'dummy_necromancer',
    'medium'		=> 'eclipse_medium',
    'priest'		=> 'dummy_priest',
    'guard'		=> 'dummy_guard',
    'common'		=> 'dummy_common',
    'poison'		=> 'dummy_poison',
    'poison_cat'	=> 'eclipse_cat',
    'pharmacist'	=> 'centaurus_pharmacist',
    'assassin'		=> 'eclipse_assassin',
    'mind_scanner'	=> 'dummy_scanner',
    'jealousy'		=> 'critical_jealousy',
    'brownie'		=> 'maple_brownie',
    'wizard'		=> 'astray_wizard',
    'doll'		=> 'silver_doll',
    'escaper'		=> 'doom_escaper',
    'wolf'		=> 'emperor_wolf',
    'mad'		=> 'immolate_mad',
    'fox'		=> 'immolate_fox',
    'child_fox'		=> 'critical_fox',
    'cupid'		=> 'snow_cupid',
    'angel'		=> 'cursed_angel',
    'quiz'		=> 'quiz',
    'vampire'		=> 'scarlet_vampire',
    'chiroptera'	=> 'dummy_chiroptera',
    'fairy'		=> 'mirror_fairy',
    'ogre'		=> 'incubus_ogre',
    'yaksa'		=> 'succubus_yaksa',
    'duelist'		=> 'cowboy_duelist',
    'avenger'		=> 'cute_avenger',
    'patron'		=> 'critical_patron');
  function __construct(){ parent::__construct(); }
}
