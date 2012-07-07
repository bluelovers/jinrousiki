<?php
/*
  ◆妖精 (fairy)
  ○仕様
  ・悪戯：発言妨害 (共有者の囁き)
  ・発言変換：悪戯
*/
class Role_fairy extends Role {
  public $mix_in = 'mage';
  public $action = 'FAIRY_DO';
  public $bad_status = null;
  function __construct(){ parent::__construct(); }

  function OutputAction(){ OutputVoteMessage('fairy-do', 'fairy_do', $this->action); }

  //占い (悪戯)
  function Mage($user){
    if ($this->IsJammer($user) || $this->IsCursed($user)) return false;
    $this->FairyAction($user);
  }

  //悪戯
  function FairyAction($user){
    global $ROOM;
    $date = $ROOM->date + 1;
    $user->AddRole('bad_status[' . $this->GetActor()->user_no . '-' . $date . ']');
  }

  //発言変換 (悪戯)
  function ConvertSay(){ $this->SetStack($this->GetBadStatus() . $this->GetStack('say'), 'say'); }

  //悪戯内容取得
  protected function GetBadStatus(){
    global $MESSAGE;
    return is_null($this->bad_status) ? $MESSAGE->common_talk : $this->bad_status;
  }
}
