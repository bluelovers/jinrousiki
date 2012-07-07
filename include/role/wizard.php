<?php
/*
  ◆魔法使い (wizard)
  ○仕様
  ・魔法：占い師・精神鑑定士・ひよこ鑑定士・狩人・暗殺者
*/
class Role_wizard extends Role{
  public $action = 'WIZARD_DO';
  public $ignore_message = '初日は魔法を使えません';
  public $wizard_list = array(
    'mage' => 'MAGE_DO', 'psycho_mage' => 'MAGE_DO', 'guard' => 'GUARD_DO',
    'assassin' => 'ASSASSIN_DO', 'sex_mage' => 'MAGE_DO');
  public $result_list = array('MAGE_RESULT', 'GUARD_SUCCESS', 'GUARD_HUNTED');
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2) foreach($this->result_list as $result) OutputSelfAbilityResult($result);
  }

  function OutputAction(){ OutputVoteMessage('wizard-do', 'wizard_do', $this->action); }

  function IsVote(){ global $ROOM; return parent::IsVote() && $ROOM->date > 1; }

  //魔法セット (返り値：昼：魔法 / 夜：投票タイプ)
  function SetWizard(){
    global $ROOM;

    $list  = $this->GetWizard();
    $stack = is_null($this->action) ? $list : array_keys($list);
    $role  = $ROOM->IsEvent('full_wizard') ? array_shift($stack) :
      ($ROOM->IsEvent('debilitate_wizard') ? array_pop($stack) : GetRandom($stack));
    $this->GetActor()->virtual_role = is_int($role) ? $this->role : $role; //仮想役職を登録
    return is_null($this->action) ? $role : $list[$role];
  }

  //魔法リスト取得
  protected function GetWizard(){ return $this->wizard_list; }
}
