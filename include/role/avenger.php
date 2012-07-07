<?php
/*
  ◆復讐者 (avenger)
  ○仕様
  ・追加役職：なし
*/
RoleManager::LoadFile('valkyrja_duelist');
class Role_avenger extends Role_valkyrja_duelist{
  public $partner_role   = 'enemy';
  public $partner_header = 'avenger_target';
  public $check_self_shoot = false;
  function __construct(){ parent::__construct(); }

  function IsVoteCheckbox($user, $live){
    return parent::IsVoteCheckbox($user, $live) && ! $this->IsActor($user->uname);
  }

  function VoteNight(){
    global $USERS;

    $stack = $this->GetVoteNightTarget();
    //人数チェック
    $count = floor($USERS->GetUserCount() / 4);
    if(count($stack) != $count) return '指定人数は' . $count . '人にしてください';

    $user_list  = array();
    sort($stack);
    foreach($stack as $id){
      $user = $USERS->ByID($id);
      if($this->IsActor($user->uname) || $user->IsDead() || $user->IsDummyBoy()){ //例外判定
	return '自分・死者・身代わり君には投票できません';
      }
      $user_list[$id] = $user;
    }
    $this->VoteNightAction($user_list);
    return null;
  }

  function Win($winner){
    $actor = $this->GetActor();
    $id    = $actor->user_no;
    $count = 0;
    foreach($this->GetUser() as $user){
      if($user->IsPartner($this->partner_role, $id)){
	if($user->IsLive()) return false;
	$count++;
      }
    }
    return $count > 0 || $actor->IsLive();
  }
}
