<?php
/*
  ◆左道使い (astray_wizard)
  ○仕様
  ・魔法：反魂師・月兎・呪術師・獏・雪女・冥狐・闇妖精
*/
RoleManager::LoadFile('wizard');
class Role_astray_wizard extends Role_wizard{
  public $wizard_list = array(
    'reverse_assassin' => 'ASSASSIN_DO', 'jammer_mad' => 'JAMMER_MAD_DO',
    'voodoo_mad' => 'VOODOO_MAD_DO', 'dream_eater_mad' => 'DREAM_EAT',
    'snow_trap_mad' => 'TRAP_MAD_DO', 'doom_fox' => 'ASSASSIN_DO', 'dark_fairy' => 'FAIRY_DO');
  public $result_list = array();
  function __construct(){ parent::__construct(); }
}
