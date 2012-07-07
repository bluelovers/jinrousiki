<?php
/*
  ◆上海人形 (doll)
  ○仕様
  ・勝利：人形遣い死亡
  ・仲間表示：人形遣い枠
*/
class Role_doll extends Role{
  public $display_doll = false;
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){
    $stack = array();
    if($this->display_doll) $doll_stack = array(); //人形表示判定
    foreach($this->GetUser() as $user){
      if($this->IsActor($user->uname)) continue;
      if($user->IsRole('doll_master', 'puppet_mage') || $user->IsRoleGroup('scarlet')){
	$stack[] = $user->handle_name;
      }
      if($this->display_doll && $this->IsDoll($user)) $doll_stack[] = $user->handle_name;
    }
    OutputPartner($stack, 'doll_master_list'); //人形遣い枠
    if($this->display_doll) OutputPartner($doll_stack, 'doll_partner'); //人形
  }

  function Win($winner){
    $this->SetStack('doll', 'class');
    foreach($this->GetUser() as $user){
      if($user->IsLiveRole('doll_master')) return false;
    }
    return true;
  }

  //人形判定
  function IsDoll($user){ return $user->IsRoleGroup('doll') && ! $user->IsRole('doll_master'); }
}
