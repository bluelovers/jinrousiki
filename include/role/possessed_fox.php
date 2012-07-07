<?php
/*
  ◆憑狐 (possessed_fox)
  ○仕様
  ・憑依無効陣営：人狼/恋人
*/
RoleManager::LoadFile('fox');
class Role_possessed_fox extends Role_fox{
  public $mix_in = 'possessed_mad';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    $this->filter->OutputResult();
    parent::OutputResult();
  }

  function OutputAction(){ $this->filter->OutputAction(); }

  function IsVote(){ return $this->filter->IsVote(); }

  function IsMindReadPossessed($user){ return $this->GetTalkFlag('fox'); }

  function SetVoteNight(){ $this->filter->SetVoteNight(); }

  function GetVoteIconPath($user, $live){ return $this->filter->GetVoteIconPath($user, $live); }

  function IsVoteCheckbox($user, $live){ return $this->filter->IsVoteCheckbox($user, $live); }

  function IgnoreVoteNight($user, $live){ return $this->filter->IgnoreVoteNight($user, $live); }

  function IgnorePossessed($camp){ return $camp == 'wolf' || $camp == 'lovers'; }
}
