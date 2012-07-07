<?php
/*
  ◆風祝 (revive_medium)
  ○仕様
  ・蘇生率：25% / 誤爆有り
*/
RoleManager::LoadFile('medium');
class Role_revive_medium extends Role_medium{
  public $mix_in = 'poison_cat';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    parent::OutputResult();
    $this->filter->OutputResult();
  }

  function OutputAction(){ $this->filter->OutputAction(); }

  function IsVote(){ return $this->filter->IsVote(); }

  function SetVoteNight(){ $this->filter->SetVoteNight(); }

  function GetVoteIconPath($user, $live){ return $this->filter->GetVoteIconPath($user, $live); }

  function IsVoteCheckbox($user, $live){ return $this->filter->IsVoteCheckbox($user, $live); }

  function IgnoreVoteNight($user, $live){ return $this->filter->IgnoreVoteNight($user, $live); }
}
