<?php
/*
  ◆物真似師 (mimic_wizard)
  ○仕様
  ・魔法：占い師 (50%) + 霊能
  ・占い：失敗
  ・霊能：通常 (50%)
*/
RoleManager::LoadFile('wizard');
class Role_mimic_wizard extends Role_wizard{
  public $mix_in = 'mage';
  public $wizard_list = array('mage' => 'MAGE_DO', 1 => 'MAGE_DO');
  public $result_list = array('MAGE_RESULT', 'MIMIC_WIZARD_RESULT');
  function __construct(){ parent::__construct(); }

  function Mage($user){
    $this->IsJammer($user);
    $this->SaveMageResult($user, 'failed', 'MAGE_RESULT');
  }

  function Necromancer($user, $flag){
    global $ROOM, $USERS;

    if($ROOM->date < 3) return;
    $failed = ! $ROOM->IsEvent('full_wizard') &&
      ($ROOM->IsEvent('debilitate_wizard') || mt_rand(0, 1) > 0);
    $result = $flag || $failed ? 'stolen' : $user->DistinguishNecromancer();
    $target = $USERS->GetHandleName($user->uname, true);
    $ROOM->ResultAbility('MIMIC_WIZARD_RESULT', $result, $target);
  }
}
