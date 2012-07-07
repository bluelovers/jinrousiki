<?php
/*
  ◆猫又 (poison_cat)
  ○仕様
  ・蘇生率：25% / 誤爆有り
  ・蘇生後：なし
*/
class Role_poison_cat extends Role{
  public $mix_in = 'poison';
  public $action     = 'POISON_CAT_DO';
  public $not_action = 'POISON_CAT_NOT_DO';
  public $submit     = 'revive_do';
  public $not_submit = 'revive_not_do';
  public $ignore_message = '初日は蘇生できません';
  public $revive_rate = 25;
  public $missfire_rate;
  function __construct(){ parent::__construct(); }

  //Mixin あり
  function OutputResult(){
    global $ROOM;
    if ($ROOM->date > 2 && ! $ROOM->IsOpenCast() && ! $ROOM->IsOption('seal_message')) {
      OutputSelfAbilityResult('POISON_CAT_RESULT');
    }
  }

  function OutputAction(){
    OutputVoteMessage('revive-do', $this->submit, $this->action, $this->not_action);
  }

  function IsVote(){ global $ROOM; return $ROOM->date > 1 && ! $ROOM->IsOpenCast(); }

  function IgnoreVote(){
    global $ROOM;

    if (! is_null($str = parent::IgnoreVote())) return $str;
    if ($ROOM->IsOpenCast()) return '「霊界で配役を公開しない」オプションがオフの時は投票できません';
    $self  = 'Role_' . $this->role;
    $class = $this->GetClass($method = 'IgnoreVoteAction');
    return method_exists($self, $method) ? $class->$method() : null;
  }

  function GetVoteIconPath($user, $live){
    global $ICON_CONF;
    return $ICON_CONF->path . '/' . $user->icon_filename;
  }

  function IsVoteCheckbox($user, $live){
    return ! $live && ! $this->IsActor($user->uname) && ! $user->IsDummyBoy();
  }

  function IgnoreVoteNight($user, $live){ return $live ? '死者以外には投票できません' : null; }

  //蘇生
  function Revive($user){
    global $ROOM, $USERS;

    $target = $this->GetReviveTarget($user);
    $result = is_null($target) || ! $this->ReviveUser($target) ? 'failed' : 'success';
    if ($result == 'success') {
      if (! $ROOM->IsEvent('full_revive')) { //雷雨ならスキップ
	$class = $this->GetClass($method = 'ReviveAction');
	$class->$method();
      }
    }
    else {
      $target = $user;
      $ROOM->ResultDead($USERS->GetHandleName($target->uname), 'REVIVE_FAILED');
    }
    if ($ROOM->IsOption('seal_message')) return; //蘇生結果を登録 (天啓封印ならスキップ)

    $handle_name = $USERS->GetHandleName($target->uname, true);
    $ROOM->ResultAbility('POISON_CAT_RESULT', $result, $handle_name, $this->GetActor()->user_no);
  }

  //蘇生対象者取得
  function GetReviveTarget($user){
    global $ROOM, $USERS;

    //蘇生データ取得
    $event  = $ROOM->IsEvent('full_revive') ? 100 : ($ROOM->IsEvent('no_revive') ? 0 : null);
    $class  = $this->GetClass($method = 'GetReviveRate');
    $revive = isset($event) ? $event : $class->$method(); //蘇生率
    if ($this->IsBoostRevive()) $revive = ceil($revive * 1.3);
    if ($revive > 100) $revive = 100;

    $missfire = isset($event) ? 0 :
      (isset($this->missfire_rate) ? $this->missfire_rate : floor($revive / 5)); //誤爆率
    if ($ROOM->IsEvent('missfire_revive')) $missfire *= 2;
    if ($missfire > $revive) $missfire = $revive;

    $rand = mt_rand(1, 100); //蘇生判定用乱数
    //$rand = 5; //mt_rand(1, 10); //テスト用
    //PrintData("{$revive} ({$missfire})", "Info: {$this->GetUname()} => {$user->uname}");
    //PrintData($rand, 'Rate: ' . $this->GetUname());

    if ($rand > $revive) return null; //蘇生失敗
    if ($rand <= $missfire) { //誤爆蘇生
      $stack = array();
      //現時点の身代わり君と蘇生能力者が選んだ人以外の死者と憑依者を検出
      foreach ($this->GetUser() as $target) {
	if ($target->IsDummyBoy() || $target->revive_flag || $user == $target ||
	   $target->IsReviveLimited()) continue;
	if ($target->dead_flag || ! $USERS->IsVirtualLive($target->user_no, true)) {
	  $stack[] = $target->uname;
	}
      }
      //PrintData($stack, 'Target/Missfire');
      if (count($stack) > 0) $user = $USERS->ByUname(GetRandom($stack)); //候補がいる時だけ入れ替える
    }
    //$target = $USERS->ByID(24); //テスト用
    //PrintData($user->uname, 'ReviveUser');
    return $user->IsReviveLimited() ? null : $user; //蘇生失敗判定
  }

  //蘇生率取得
  function GetReviveRate(){ return $this->revive_rate; }

  //蘇生率強化判定
  protected function IsBoostRevive(){
    $data = 'boost_revive';
    if (! is_null($flag = $this->GetStack($data))) return $flag;
    $flag = false;
    foreach ($this->GetUser() as $user) {
      if ($user->IsLiveRole('revive_brownie', true)) {
	$flag = true;
	break;
      }
    }
    $this->SetStack($flag, $data);
    return $flag;
  }

  //蘇生実行
  function ReviveUser($user){
    global $ROOM, $USERS;

    if ($user->IsPossessedGroup()){ //憑依能力者対応
      if ($user->revive_flag) return true; //蘇生済みならスキップ

      $virtual = $USERS->ByVirtual($user->user_no);
      if ($user->IsDead()) { //確定死者
	if ($user != $virtual) { //憑依後に死亡していた場合はリセット処理を行う
	  $user->ReturnPossessed('possessed_target');

	  //憑依先が他の憑依能力者に憑依されていないのならリセット処理を行う
	  $stack = $virtual->GetPartner('possessed');
	  if ($user->user_no == $stack[max(array_keys($stack))]) {
	    $virtual->ReturnPossessed('possessed');
	  }
	}
      }
      elseif ($user->IsLive(true)) { //生存者 (憑依状態確定)
	if ($virtual->IsDrop()) return false; //蘇生辞退者対応

	//見かけ上の蘇生処理
	$user->ReturnPossessed('possessed_target');
	$ROOM->ResultDead($user->handle_name, 'REVIVE_SUCCESS');

	//本当の死者の蘇生処理
	$virtual->Revive(true);
	$virtual->ReturnPossessed('possessed');

	//憑依予定者が居たらキャンセル
	if (array_key_exists($user->uname, $this->GetStack('possessed'))) {
	  $user->possessed_reset  = false;
	  $user->possessed_cancel = true;
	}
	return true;
      }
      else { //当夜に死んだケース
	if ($user != $virtual) { //憑依中ならリセット
	  $user->ReturnPossessed('possessed_target'); //本人
	  $virtual->ReturnPossessed('possessed'); //憑依先
	}

	//憑依予定者が居たらキャンセル
	if (array_key_exists($user->uname, $this->GetStack('possessed'))) {
	  $user->possessed_reset  = false;
	  $user->possessed_cancel = true;
	}
      }
    }
    elseif ($user != $USERS->ByReal($user->user_no)) { //憑依されていたらリセット
      $user->ReturnPossessed('possessed');
    }
    $user->Revive(); //蘇生処理
    return true;
  }

  //蘇生後処理
  function ReviveAction(){}
}
