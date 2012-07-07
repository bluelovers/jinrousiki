<?php
/*
  ◆交霊術師 (spiritism_wizard)
  ○仕様
  ・魔法：霊能者・雲外鏡・精神感応者・死化粧師・性別鑑定(オリジナル)
  ・霊能：性別
*/
RoleManager::LoadFile('wizard');
class Role_spiritism_wizard extends Role_wizard{
  public $action = NULL;
  public $wizard_list = array(
    'soul_necromancer', 'necromancer', 'psycho_necromancer', 'embalm_necromancer',
    'sex_necromancer');
  public $result_list = array('SPIRITISM_WIZARD_RESULT');
  function __construct(){ parent::__construct(); }

  function Necromancer($user, $flag){ return $flag ? 'stolen' : 'sex_' . $user->sex; }
}
