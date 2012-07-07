<?php
/*
  ◆比丘尼 (awake_wizard)
  ○仕様
  ・魔法：占い師・ひよこ鑑定士・占星術師 (30%) → 魂の占い師 (100%)
  ・占い：失敗
  ・人狼襲撃耐性：無効 (一回限定)
*/
RoleManager::LoadFile('wizard');
class Role_awake_wizard extends Role_wizard{
  public $mix_in = 'mage';
  public $wizard_list = array(
    'mage' => 'MAGE_DO', 'stargazer_mage' => 'MAGE_DO', 'sex_mage' => 'MAGE_DO');
  public $result_list = array('MAGE_RESULT');
  function __construct(){ parent::__construct(); }

  protected function GetWizard(){
    return $this->GetActor()->IsActive() ?
      (mt_rand(1, 10) > 7 ? $this->wizard_list : array('MAGE_DO')) :
      array('soul_mage' => 'MAGE_DO');
  }

  function Mage($user){
    $this->IsJammer($user);
    $this->SaveMageResult($user, 'failed', 'MAGE_RESULT');
  }

  function WolfEatResist(){
    if(! $this->GetActor()->IsActive()) return false;
    $this->GetActor()->LostAbility();
    return true;
  }
}
