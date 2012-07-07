<?php
/*
  ◆道化師 (pierrot_wizard)
  ○仕様
  ・魔法：魂の占い師・ひよこ鑑定士・暗殺(特殊)・草妖精・星妖精・花妖精・氷妖精・妖精(特殊)
  ・暗殺：死の宣告 (2-10日後)
  ・悪戯：死亡欄妨害 (特殊)
*/
RoleManager::LoadFile('wizard');
class Role_pierrot_wizard extends Role_wizard{
  public $mix_in = 'mage';
  public $wizard_list = array(
    'soul_mage' => 'MAGE_DO', 1 => 'ASSASSIN_DO', 2 => 'FAIRY_DO', 'grass_fairy' => 'FAIRY_DO',
    'star_fairy' => 'FAIRY_DO', 'flower_fairy' => 'FAIRY_DO', 'ice_fairy' => 'FAIRY_DO',
    'sex_mage' => 'MAGE_DO');
  public $result_list = array('MAGE_RESULT');
  public $result_type = 'PIERROT';
  function __construct(){ parent::__construct(); }

  function SetAssassin($user){
    global $ROLES;

    $actor = $this->GetActor();
    foreach($ROLES->LoadFilter('trap') as $filter){ //罠判定
      if($filter->TrapStack($actor, $user->uname)) return;
    }
    foreach($ROLES->LoadFilter('guard_assassin') as $filter){ //対暗殺護衛判定
      if($filter->GuardAssassin($user->uname)) return;
    }
    if($user->IsRoleGroup('escaper')) return; //逃亡者は無効
    if($user->IsRefrectAssassin()){ //反射判定
      $this->AddSuccess($actor->user_no, 'assassin');
      return;
    }
    $class = $this->GetClass($method = 'Assassin');
    $class->$method($user);
  }

  function Assassin($user){
    if($user->IsLive(true)) $user->AddDoom(mt_rand(2, 10), 'death_warrant');
  }

  function Mage($user){
    global $ROOM, $USERS;

    if($this->IsJammer($user) || $this->IsCursed($user)) return false;
    $handle_name = $USERS->GetHandleName($user->uname);
    $ROOM->ResultDead($handle_name, $this->result_type, GetRandom(range('A', 'Z')));
  }
}
