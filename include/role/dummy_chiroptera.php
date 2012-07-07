<?php
/*
  ◆夢求愛者 (dummy_chiroptera)
  ○仕様
*/
class Role_dummy_chiroptera extends Role{
  public $mix_in = 'self_cupid';
  public $display_role = 'self_cupid';
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){
    global $USERS;

    $user   = $this->GetActor();
    $target = $user->GetPartner($this->role);
    $stack  = $target;
    if(is_array($stack)){ //仮想恋人作成結果を表示
      $stack[] = $user->user_no;
      asort($stack);
      $pair = array();
      foreach($stack as $id) $pair[] = $USERS->ById($id)->handle_name;
      OutputPartner($pair, 'cupid_pair');
    }
    //仮想恋人を表示 (憑依追跡 / 恋人・悲恋持ちなら処理委託)
    if(! is_array($target) || $this->GetActor()->IsRole('lovers', 'sweet_status')) return;
    $lovers = array();
    foreach($target as $id) $lovers[] = $USERS->GetHandleName($USERS->ById($id)->uname, true);
    OutputPartner($lovers, 'partner_header', 'lovers_footer');
  }

  function OutputAction(){ $this->filter->OutputAction(); }

  function IsVote(){ global $ROOM; return $ROOM->date == 1; }

  function SetVoteNight(){ $this->filter->SetVoteNight(); }

  function GetVoteCheckbox($user, $id, $live){
    return $this->filter->GetVoteCheckbox($user, $id, $live);
  }

  function CheckVoteNight(){ $this->filter->CheckVoteNight(); }

  function VoteNightAction($list, $flag){
    $stack = array();
    foreach($list as $user){
      $stack[] = $user->handle_name;
      if(! $this->IsActor($user->uname)) $this->GetActor()->AddMainRole($user->user_no);
    }

    $this->SetStack(implode(' ', array_keys($list)), 'target_no');
    $this->SetStack(implode(' ', $stack), 'target_handle');
  }
}
