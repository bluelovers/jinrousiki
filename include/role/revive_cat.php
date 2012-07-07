<?php
/*
  ◆仙狸 (revive_cat)
  ○仕様
  ・蘇生率：80% (減衰 1/4) / 誤爆有り
  ・蘇生後：蘇生回数更新
*/
RoleManager::LoadFile('poison_cat');
class Role_revive_cat extends Role_poison_cat{
  public $revive_rate = 80;
  function __construct(){ parent::__construct(); }

  function GetReviveRate(){ return ceil(parent::GetReviveRate() / pow(4, $this->GetTimes())); }

  function ReviveAction(){
    $times = $this->GetTimes();
    $role  = $times > 0 ? $this->role . '[' . $times . ']' : $this->role;
    $this->GetActor()->ReplaceRole($role, $this->role . '[' . ++$times . ']');
  }

  private function GetTimes(){ return (int)$this->GetActor()->GetMainRoleTarget(); }
}
