<?php
/*
  ◆さとり (mind_scanner)
  ○仕様
  ・追加役職：サトラレ
  ・投票結果：なし
  ・投票：1日目のみ
*/
class Role_mind_scanner extends Role{
  public $action = 'MIND_SCANNER_DO';
  public $mind_role = 'mind_read';
  public $ignore_message = '初日以外は投票できません';
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){
    global $ROOM;

    if($ROOM->date < 2 || is_null($this->mind_role)) return;
    $id = $this->GetActor()->user_no;
    $stack = array();
    foreach($this->GetUser() as $user){
      if($user->IsPartner($this->mind_role, $id)) $stack[] = $user->handle_name;
    }
    OutputPartner($stack, 'mind_scanner_target');
  }

  function OutputAction(){ OutputVoteMessage('mind-scanner-do', 'mind_scanner_do', $this->action); }

  function IsVote(){ global $ROOM; return parent::IsVote() && $ROOM->date == 1; }

  function IsVoteCheckbox($user, $live){
    return parent::IsVoteCheckbox($user, $live) && ! $user->IsDummyBoy();
  }

  function IgnoreVoteNight($user, $live){
    if(! is_null($str = parent::IgnoreVoteNight($user, $live))) return $str;
    return $user->IsDummyBoy() ? '身代わり君には投票できません' : NULL;
  }

  //透視
  function MindScan($user){ $user->AddRole($this->GetActor()->GetID($this->mind_role)); }
}
