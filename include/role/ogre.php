<?php
/*
  ◆鬼 (ogre)
  ○仕様
  ・勝利：生存 + 人狼系の生存
  ・人狼襲撃：確率無効
*/
class Role_ogre extends Role{
  public $action     = 'OGRE_DO';
  public $not_action = 'OGRE_NOT_DO';
  public $resist_rate = 30;
  public $reduce_rate =  5;
  public $ignore_message = '初日は人攫いできません';
  function __construct(){ parent::__construct(); }

  function OutputAction(){
    OutputVoteMessage('ogre-do', 'ogre_do', $this->action, $this->not_action);
  }

  function IsVote(){ global $ROOM; return $ROOM->date > 1; }

  function Win($winner){
    if($this->IsDead()) return false;
    if($winner == 'wolf') return true;
    foreach($this->GetUser() as $user){
      if($user->IsLiveRoleGroup('wolf')) return true;
    }
    return false;
  }

  function SetVoteNight(){
    global $ROOM;
    parent::SetVoteNight();
    if($ROOM->IsEvent('force_assassin_do')) $this->SetStack(NULL, 'not_action');
  }

  //人攫い情報セット
  function SetAssassin($user){
    global $ROOM, $ROLES;

    foreach($ROLES->LoadFilter('trap') as $filter){ //罠判定
      if($filter->DelayTrap($this->GetActor(), $user->uname)) return;
    }
    foreach($ROLES->LoadFilter('guard_assassin') as $filter){ //門番の護衛判定
      if($filter->GuardAssassin($user->uname)) return;
    }
    if($user->IsDead(true) || $user->IsRoleGroup('escaper')) return; //無効判定
    if($user->IsRefrectAssassin()){ //反射判定
      $this->AddSuccess($this->GetActor()->user_no, 'ogre');
      return;
    }
    if($this->IgnoreAssassin($user)) return; //個別無効判定

    //人攫い成功判定
    $times = (int)$this->GetActor()->GetMainRoleTarget();
    $event = $this->GetEvent();
    $rate  = is_null($event) ? ceil(100 * pow($this->GetReduceRate(), $times)) : $event;
    $rand  = mt_rand(1, 100); //人攫い成功判定乱数
    //$rand = 5; //テスト用
    //PrintData($rand, 'Rate [OGRE_DO]: ' . $rate);
    if($rand > $rate) return; //成功判定
    $this->Assassin($user);

    if($ROOM->IsEvent('full_ogre')) return; //成功回数更新処理 (朧月ならスキップ)
    $role = $this->role;
    if($times > 0) $role .= '[' . $times . ']';
    $this->GetActor()->ReplaceRole($role, $this->role . '[' . ($times + 1) . ']');
  }

  //人攫い失敗判定
  protected function IgnoreAssassin($user){ return false; }

  //天候情報取得
  protected function GetEvent(){
    global $ROOM;
    return $ROOM->IsEvent('full_ogre') ? 100 : ($ROOM->IsEvent('seal_ogre') ? 0 : NULL);
  }

  //人攫い成功減衰率取得
  protected function GetReduceRate(){ return 1 / $this->reduce_rate; }

  //人攫い
  protected function Assassin($user){ $this->AddSuccess($user->user_no, 'ogre'); }

  //人攫い死
  function AssassinKill(){
    global $USERS;
    foreach($this->GetStack() as $id => $flag) $USERS->Kill($id, 'OGRE_KILLED');
  }

  //人狼襲撃耐性判定
  function WolfEatResist(){
    $rand = mt_rand(1, 100);
    //$rand = 5; //テスト用
    $rate = $this->GetResistRate();
    //PrintData("{$rand} ({$rate})", 'Rate [ogre resist]');
    return $rand <= $rate;
  }

  //人狼襲撃耐性率取得
  function GetResistRate(){
    $event = $this->GetEvent();
    return is_null($event) ? $this->resist_rate : $event;
  }
}
