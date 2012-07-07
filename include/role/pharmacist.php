<?php
/*
  ◆薬師 (pharmacist)
  ○仕様
  ・毒能力鑑定/解毒
*/
class Role_pharmacist extends Role{
  public $result = 'PHARMACIST_RESULT';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2) OutputSelfAbilityResult($this->result);
  }

  function SetVoteDay($uname){
    $this->InitStack();
    if($this->IsRealActor()) $this->AddStack($uname);
  }

  //毒能力情報セット
  function SetDetox(){
    global $USERS;
    foreach($this->GetStack() as $uname => $target_uname){
      if($this->IsVoted($uname)) continue;
      $str = $this->DistinguishPoison($USERS->ByRealUname($target_uname));
      $this->AddStack($str, 'pharmacist_result', $uname);
    }
  }

  //毒能力鑑定
  protected function DistinguishPoison($user){
    global $ROOM;

    //非毒能力者・夢毒者
    if(! $user->IsRoleGroup('poison') || $user->IsRole('dummy_poison')) return 'nothing';
    if($user->IsRole('strong_poison')) return 'strong'; //強毒者
    if($user->IsRole('incubate_poison')) return $ROOM->date >= 5 ? 'strong' : 'nothing'; //潜毒者
    if($user->IsRole('poison_guard', 'guide_poison', 'chain_poison', 'poison_jealousy')){
      return 'limited'; //騎士・誘毒者・連毒者・毒橋姫
    }
    return 'poison';
  }

  //解毒
  function Detox(){
    foreach($this->GetStack() as $uname => $target_uname){
      if($this->IsVoted($uname)) continue;
      if($this->IsActor($target_uname)) $this->SetDetoxFlag($uname);
    }
  }

  //解毒フラグセット
  protected function SetDetoxFlag($uname){
    $this->GetActor()->detox = true;
    $this->AddStack('success', 'pharmacist_result', $uname);
  }

  //ショック死抑制
  function Cure(){
    foreach($this->GetStack() as $uname => $target_uname){
      if($this->IsVoted($uname) || ! $this->IsActor($target_uname)) continue;
      $this->GetActor()->cured_flag = true;
      $this->AddStack('cured', 'pharmacist_result', $uname);
    }
  }

  //鑑定結果登録
  function SaveResult(){
    global $ROOM, $USERS;
    foreach($this->GetStack($this->role . '_result') as $uname => $result){
      $user   = $USERS->ByUname($uname);
      $list   = $this->GetStack($user->GetMainRole(true));
      $target = $USERS->GetHandleName($list[$user->uname], true);
      $ROOM->ResultAbility($this->result, $result, $target, $user->user_no);
    }
  }
}
