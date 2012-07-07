<?php
/*
  ◆仙狐 (revive_fox)
  ○仕様
  ・蘇生率：100% / 誤爆有り
  ・蘇生後：能力喪失
*/
RoleManager::LoadFile('fox');
class Role_revive_fox extends Role_fox{
  public $mix_in = 'poison_cat';
  public $action     = 'POISON_CAT_DO';
  public $not_action = 'POISON_CAT_NOT_DO';
  public $submit     = 'revive_do';
  public $not_submit = 'revive_not_do';
  public $ignore_message = '初日は蘇生できません';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2 && ! $ROOM->IsOption('seal_message')){
      OutputSelfAbilityResult('POISON_CAT_RESULT');
    }
    parent::OutputResult();
  }

  function OutputAction(){
    global $ROOM;
    if($this->GetActor()->IsActive() && ! $ROOM->IsOpenCast()){
      OutputVoteMessage('revive-do', $this->submit, $this->action, $this->not_action);
    }
  }

  function IsVote(){ return $this->filter->IsVote(); }

  function SetVoteNight(){ $this->filter->SetVoteNight(); }

  function IgnoreVoteAction(){ return $this->GetActor()->IsActive() ? NULL : '能力喪失しています'; }

  function GetVoteIconPath($user, $live){ return $this->filter->GetVoteIconPath($user, $live); }

  function IsVoteCheckbox($user, $live){ return $this->filter->IsVoteCheckbox($user, $live); }

  function IgnoreVoteNight($user, $live){ return $this->filter->IgnoreVoteNight($user, $live); }

  function GetReviveRate(){ return 100; }

  function ReviveAction(){ $this->GetActor()->LostAbility(); }
}
