<?php
//-- 役職コントローラークラス --//
class RoleManager{
  public $path;
  public $loaded;
  public $actor;

  //常時表示サブ役職 (本体 / 順番依存あり)
  public $display_real_list = array(
    'copied', 'copied_trick', 'copied_basic', 'copied_soul', 'copied_teller', 'lost_ability',
    'muster_ability', 'lovers', 'sweet_status', 'challenge_lovers', 'possessed_exchange', 'joker',
    'rival', 'death_note');

  //常時表示サブ役職 (仮想 / 順番依存あり)
  public $display_virtual_list = array(
    'death_selected', 'febris', 'frostbite', 'death_warrant', 'day_voter', 'wirepuller_luck',
    'occupied_luck', 'mind_open', 'mind_read', 'mind_evoke', 'mind_lonely', 'mind_receiver',
    'mind_friend', 'mind_sympathy', 'mind_sheep', 'mind_presage', 'wisp', 'black_wisp',
    'spell_wisp', 'foughten_wisp', 'gold_wisp', 'sheep_wisp');

  //非表示サブ役職 (呼び出し抑制用)
  public $display_none_list = array(
    'decide', 'plague', 'counter_decide', 'dropout', 'good_luck', 'bad_luck', 'critical_voter',
    'critical_luck', 'enemy', 'supported', 'infected', 'psycho_infected', 'possessed_target',
    'possessed', 'bad_status', 'protected','changed_therian');

  //初期配役抑制役職
  public $disable_cast_list = array(
    'febris', 'frostbite', 'death_warrant', 'panelist', 'cute_camouflage', 'day_voter',
    'wirepuller_luck', 'occupied_luck', 'mind_read', 'mind_receiver', 'mind_friend',
    'mind_sympathy', 'mind_evoke', 'mind_presage', 'mind_lonely', 'mind_sheep', 'sheep_wisp',
    'lovers', 'challenge_lovers', 'possessed_exchange', 'joker', 'rival', 'enemy', 'supported',
    'death_note', 'death_selected', 'possessed_target', 'possessed', 'infected', 'psycho_infected',
    'bad_status', 'sweet_status', 'protected', 'lost_ability', 'muster_ability', 'changed_therian',
    'copied', 'copied_trick', 'copied_basic', 'copied_soul', 'copied_teller');

  //発言表示
  public $talk_list = array('blinder', 'earplug', 'speaker');

  //発言表示 (囁き)
  public $talk_whisper_list = array('lovers');

  //発言表示 (妖狐)
  public $talk_fox_list = array('wise_wolf', 'wise_ogre');

  //発言表示 (独り言)
  public $talk_self_list = array('silver_wolf', 'howl_fox', 'mind_lonely', 'lovers');

  //発言表示 (耳鳴)
  public $talk_ringing_list = array('whisper_ringing', 'howl_ringing');

  //閲覧判定
  public $mind_read_list = array(
    'leader_common', 'whisper_scanner', 'howl_scanner', 'telepath_scanner', 'minstrel_cupid',
    'mind_read', 'mind_friend', 'mind_open');

  //閲覧判定 (能動型)
  public $mind_read_active_list = array('mind_receiver');

  //閲覧判定 (憑依型)
  public $mind_read_possessed_list = array('possessed_wolf', 'possessed_mad', 'possessed_fox');

  //発言置換 (仮想)
  public $say_convert_virtual_list = array('cute_camouflage', 'gentleman', 'lady');

  //発言置換 (本体)
  public $say_convert_list = array('suspect', 'cute_mage', 'cute_wolf', 'cute_fox',
				   'cute_chiroptera', 'cute_avenger');

  //悪戯発言変換
  public $say_bad_status_list = array('fairy', 'spring_fairy', 'summer_fairy', 'autumn_fairy',
				      'winter_fairy', 'greater_fairy');

  //発言変換 (順番依存あり)
  public $say_list = array('passion', 'actor', 'liar', 'rainbow', 'weekly', 'grassy', 'invisible',
			   'side_reverse', 'line_reverse', 'mower', 'silent');

  //声量
  public $voice_list = array('strong_voice', 'normal_voice', 'weak_voice', 'inside_voice',
			     'outside_voice', 'upper_voice', 'downer_voice', 'random_voice');

  //処刑投票(メイン)
  public $vote_do_main_list = array(
    'human', 'elder', 'scripter', 'elder_guard', 'critical_common', 'elder_wolf', 'elder_fox',
    'elder_chiroptera', 'critical_duelist', 'cowboy_duelist');

  //処刑投票(サブ)
  public $vote_do_sub_list = array(
    'authority', 'reduce_voter', 'upper_voter', 'downer_voter', 'critical_voter', 'random_voter',
    'day_voter', 'wirepuller_luck', 'watcher', 'panelist');

  //処刑得票(メイン)
  public $vote_poll_main_list = array('critical_common', 'critical_patron');

  //処刑得票(サブ)
  public $vote_poll_sub_list = array(
    'upper_luck', 'downer_luck', 'star', 'disfavor', 'critical_luck', 'random_luck',
    'occupied_luck', 'wirepuller_luck');

  //処刑投票能力者
  public $vote_day_list = array(
    'saint', 'executor', 'bacchus_medium', 'seal_medium', 'trap_common', 'spell_common',
    'pharmacist', 'cure_pharmacist', 'revive_pharmacist', 'alchemy_pharmacist',
    'centaurus_pharmacist', 'jealousy', 'divorce_jealousy', 'miasma_jealousy', 'critical_jealousy',
    'thunder_brownie', 'harvest_brownie', 'maple_brownie', 'cursed_brownie', 'corpse_courier_mad',
    'amaze_mad', 'agitate_mad', 'miasma_mad', 'critical_mad', 'follow_mad', 'critical_fox',
    'sweet_cupid', 'snow_cupid', 'quiz', 'cursed_avenger', 'critical_avenger', 'impatience',
    'decide', 'plague', 'counter_decide', 'dropout', 'good_luck', 'bad_luck', 'authority', 'rebel');

  //反逆者判定
  public $rebel_list = array('rebel');

  //処刑者決定 (順番依存あり)
  public $vote_kill_list = array('decide', 'bad_luck', 'counter_decide', 'dropout', 'impatience',
				 'good_luck', 'plague', 'quiz', 'executor', 'saint', 'agitate_mad');

  //毒能力鑑定
  public $distinguish_poison_list = array('pharmacist', 'alchemy_pharmacist');

  //解毒判定
  public $detox_list = array('pharmacist', 'cure_pharmacist', 'alchemy_pharmacist');

  //処刑者カウンター
  public $vote_kill_counter_list = array('brownie', 'sun_brownie', 'doom_doll', 'miasma_fox',
					 'mirror_fairy');

  //処刑投票能力処理 (順番依存あり)
  public $vote_action_list = array(
    'seal_medium', 'bacchus_medium', 'centaurus_pharmacist', 'spell_common', 'miasma_jealousy',
    'critical_jealousy', 'corpse_courier_mad', 'amaze_mad', 'miasma_mad', 'critical_mad',
    'critical_fox', 'critical_avenger', 'cursed_avenger', 'sweet_cupid', 'snow_cupid');

  //霊能
  public $necromancer_list = array(
    'necromancer', 'soul_necromancer', 'psycho_necromancer', 'embalm_necromancer',
    'emissary_necromancer', 'dummy_necromancer', 'monk_fox');

  //得票カウンター
  public $voted_reaction_list = array('trap_common', 'jealousy');

  //落雷判定
  public $thunderbolt_list = array('thunder_brownie');

  //ショック死(メイン)
  public $sudden_death_main_list = array('eclipse_medium', 'cursed_angel');

  //ショック死(サブ) (順番依存あり)
  public $sudden_death_sub_list = array(
    'challenge_lovers', 'febris', 'frostbite', 'death_warrant', 'panelist', 'chicken', 'rabbit',
    'perverseness', 'flattery', 'celibacy', 'nervy', 'androphobia', 'gynophobia', 'impatience');

  //ショック死抑制
  public $cure_list = array('cure_pharmacist', 'revive_pharmacist');

  //処刑得票カウンター
  public $vote_kill_reaction_list = array('divorce_jealousy', 'harvest_brownie', 'maple_brownie',
					  'cursed_brownie');

  //道連れ
  public $followed_list = array('follow_mad');

  //人狼襲撃耐性 (順番依存あり)
  public $wolf_eat_resist_list = array(
    'challenge_lovers', 'protected', 'sacrifice_angel', 'doom_vampire', 'sacrifice_patron',
    'sacrifice_mania', 'fend_guard', 'awake_wizard');

  //人狼襲撃得票カウンター (+ 身代わり能力者)
  public $wolf_eat_reaction_list = array(
    'therian_mad', 'immolate_mad', 'sacrifice_common', 'doll_master', 'sacrifice_fox',
    'sacrifice_vampire', 'boss_chiroptera', 'sacrifice_ogre');

  //人狼襲撃カウンター
  public $wolf_eat_counter_list = array(
    'ghost_common', 'presage_scanner', 'cursed_brownie', 'sun_brownie', 'history_brownie',
    'miasma_fox', 'revive_mania', 'mind_sheep');

  //襲撃毒死回避
  public $avoid_poison_eat_list = array('guide_poison', 'poison_jealousy', 'poison_wolf');

  //罠
  public $trap_list = array('trap_mad', 'snow_trap_mad');

  //護衛
  public $guard_list = array('guard', 'barrier_wizard');

  //対暗殺護衛
  public $guard_assassin_list = array('gatekeeper_guard');

  //対夢護衛
  public $guard_dream_list = array('dummy_guard');

  //厄払い
  public $guard_curse_list = array('anti_voodoo');

  //復活
  public $resurrect_list = array(
    'revive_pharmacist', 'revive_brownie', 'revive_doll', 'revive_mad', 'revive_cupid',
    'scarlet_vampire', 'revive_ogre', 'revive_avenger', 'resurrect_mania');

  //イベントセット用
  public $event_virtual_list = array('no_last_words', 'whisper_ringing', 'howl_ringing',
				     'sweet_ringing', 'deep_sleep', 'mind_open');

  //イベントセット用 (昼限定)
  public $event_virtual_day_list = array(
    'actor', 'passion', 'rainbow', 'grassy', 'invisible', 'side_reverse', 'line_reverse',
    'critical_voter', 'critical_luck', 'blinder', 'earplug', 'silent', 'mower');

  //特殊勝敗判定 (ジョーカー系)
  public $joker_list = array('joker', 'rival');

  function __construct(){
    $this->path = JINRO_INC . '/role';
    $this->stack  = new StdClass();
    $this->loaded = new StdClass();
    $this->loaded->file  = array();
    $this->loaded->class = array();
  }

  function Load($type, $shift = false, $virtual = false){
    $stack = array();
    $virtual |= $type == 'main_role';
    foreach($this->GetList($type) as $role){
      if(! ($virtual ? $this->actor->IsRole(true, $role) : $this->actor->IsRole($role))) continue;
      $stack[] = $role;
      if($this->LoadFile($role)) $this->LoadClass($role, 'Role_' . $role);
    }
    $filter = $this->GetFilter($stack);
    return $shift ? array_shift($filter) : $filter;
  }

  function LoadFile($name){
    if(is_null($name) || ! file_exists($file = $this->path . '/' . $name . '.php')) return false;
    if(in_array($name, $this->loaded->file)) return true;
    require_once($file);
    $this->loaded->file[] = $name;
    return true;
  }

  function LoadClass($name, $class){
    if(is_null($name) ||
       (array_key_exists($name, $this->loaded->class) && is_object($this->loaded->class[$name]))){
      return false;
    }
    $this->loaded->class[$name] = new $class();
    return true;
  }

  function LoadMix($name){
    if(! $this->LoadFile($name)) return null;
    $class = 'Role_' . $name;
    return new $class();
  }

  function LoadFilter($type){
    return $this->GetFilter($this->GetList($type));
  }

  function LoadMain($user){
    $this->actor = $user;
    return $this->Load('main_role', true);
  }

  function SetClass($role){
    $this->LoadFile($role);
    return $this->LoadClass($role, 'Role_' . $role);
  }

  function GetList($type){
    $stack = $type == 'main_role' ? array($this->actor->GetMainRole(true)) :
      $this->{$type . '_list'};
    return is_array($stack) ? $stack : array();
  }

  function GetFilter($list){
    $stack = array();
    foreach($list as $key){ //順番依存があるので配列関数を使わないで処理する
      if(! array_key_exists($key, $this->loaded->class)) continue;
      if(is_object(($class = $this->loaded->class[$key]))) $stack[] = $class;
    }
    return $stack;
  }
}

//-- 役職の基底クラス --//
class Role{
  public $role;
  public $action;
  public $not_action;
  public $submit;
  public $not_submit;
  public $ignore_message;
  function __construct(){
    global $ROLES;

    $this->role = array_pop(explode('Role_', get_class($this)));
    if(isset($this->mix_in)){
      $this->filter = $ROLES->LoadMix($this->mix_in);
      $this->filter->role = $this->role;
      //PrintData(get_class_vars(get_class($this)));
      if(isset($this->display_role)) $this->filter->display_role = $this->display_role;
    }
  }

  //Mixin 呼び出し用
  function __call($name, $args){
    if(! is_object($this->filter)){
      PrintData('Error: Mixin not found: ' . get_class($this) . ": {$name}()");
      return false;
    }
    if(! method_exists($this->filter, $name)){
      PrintData('Error: Method not found: ' . get_class($this) . ": {$name}()");
      return false;
    }
    return call_user_func_array(array($this->filter, $name), $args);
  }

  protected function GetClass($method){
    $class = 'Role_' . $this->role;
    return method_exists($class, $method) ? new $class() : $this;
  }

  protected function GetProperty($property){
    $class  = 'Role_' . $this->role;
    $mix_in = new $class();
    return isset($mix_in->$property) ? $mix_in->$property :
      (isset($this->$property) ? $this->$property : null);
  }

  //function __get($name){ return null; } //メモ

  //-- 汎用関数 --//
  //ユーザ取得
  protected function GetActor(){ global $ROLES; return $ROLES->actor; }

  //ユーザ名取得
  protected function GetUname($uname = null){
    return is_null($uname) ? $this->GetActor()->uname : $uname;
  }

  //ユーザ情報取得
  protected function GetUser(){ global $USERS; return $USERS->rows; }

  //データ初期化
  protected function InitStack($name = null){
    global $ROLES;
    $data = is_null($name) ? $this->role : $name;
    if(! property_exists($ROLES->stack, $data)) $ROLES->stack->$data = array();
  }

  //データ取得
  protected function GetStack($name = null, $fill = false){
    global $ROLES;
    $data = is_null($name) ? $this->role : $name;
    return property_exists($ROLES->stack, $data) ? $ROLES->stack->$data : ($fill ? array() : null);
  }

  //データセット
  protected function SetStack($data, $role = null){
    global $ROLES;
    $ROLES->stack->{is_null($role) ? $this->role : $role} = $data;
  }

  //データ追加
  protected function AddStack($data, $role = null, $uname = null){
    global $ROLES;
    $ROLES->stack->{is_null($role) ? $this->role : $role}[$this->GetUname($uname)] = $data;
  }

  //同一ユーザ判定
  protected function IsActor($uname){ return $this->GetActor()->IsSame($uname); }

  //発動日判定
  protected function IsDoom(){
    global $ROOM;
    return $this->GetActor()->GetDoomDate($this->role) == $ROOM->date;
  }

  //投票能力判定
  function IsVote(){ return ! is_null($this->action); }

  //-- 役職情報表示 --//
  //役職情報表示
  function OutputAbility(){
    global $ROOM;
    if($this->IgnoreAbility()) return;
    $this->OutputImage();
    $this->OutputPartner();
    $this->OutputResult();
    if($this->IsVote() && $ROOM->IsNight()) $this->OutputAction();
  }

  //役職情報表示判定
  protected function IgnoreAbility(){ return false; }

  //役職画像表示
  protected function OutputImage(){
    global $ROLE_IMG;
    $ROLE_IMG->Output(isset($this->display_role) ? $this->display_role : $this->role);
  }

  //仲間情報表示
  protected function OutputPartner(){}

  //能力結果表示
  protected function OutputResult(){}

  //投票能力表示
  function OutputAction(){}

  //-- 発言処理 --//
  //閲覧者取得
  protected function GetViewer(){ return $this->GetStack('viewer'); }

  //閲覧者情報取得
  protected function GetTalkFlag($data){ return $this->GetStack('builder')->flag->$data; }

  //-- 処刑投票処理 --//
  //実ユーザ判定
  protected function IsRealActor(){
    global $USERS;
    return $USERS->ByRealUname($this->GetUname())->IsRole(true, $this->role);
  }

  //生存仲間判定
  protected function IsLivePartner(){
    global $USERS;
    foreach($this->GetActor()->GetPartner($this->role) as $id){
      if($USERS->ByID($id)->IsLive(true)) return true;
    }
    return false;
  }

  protected function SuddenDeathKill($id){
    global $USERS;
    $USERS->SuddenDeath($id, 'SUDDEN_DEATH', $this->sudden_death);
  }

  //-- 処刑集計処理 --//
  //処刑者ユーザ名取得
  protected function GetVoteKill(){ return $this->GetStack('vote_kill_uname'); }

  //処刑実行判定
  protected function IsVoteKill(){ return $this->GetVoteKill() != ''; }

  //処刑者判定
  protected function IsVoted($uname = null){
    return $this->GetVoteKill() == $this->GetUname($uname);
  }

  //得票者名取得
  protected function GetVotedUname($uname = null){
    return array_keys($this->GetStack('target'), $this->GetUname($uname));
  }

  //投票先ユーザ名取得
  protected function GetVoteTargetUname($uname = null){
    $stack = $this->GetStack('target');
    return $stack[$this->GetUname($uname)];
  }

  //投票者ユーザ取得
  protected function GetVoteUser($uname = null){
    global $USERS;
    return $USERS->ByRealUname($this->GetVoteTargetUname($uname));
  }

  //-- 投票データ表示 (夜) --//
  //投票データセット (夜)
  function SetVoteNight(){
    if(is_null($this->action)){
      OutputVoteResult('夜：あなたは投票できません');
    }
    else{
      if(! is_null($str = $this->IgnoreVote())) OutputVoteResult('夜：' . $str);
      foreach(array('', 'not_') as $header){
	foreach(array('action', 'submit') as $data){
	  $this->SetStack($this->{$header . $data}, $header . $data);
	}
      }
    }
  }

  //投票スキップ判定
  function IgnoreVote(){ return $this->IsVote() ? null : $this->ignore_message; }

  //-- 投票画面表示 (夜) --//
  //投票対象ユーザ取得
  function GetVoteTargetUser(){
    global $USERS;
    return $USERS->rows;
  }

  //投票のアイコンパス取得
  function GetVoteIconPath($user, $live){
    global $ICON_CONF;
    return $live ? $ICON_CONF->path . '/' . $user->icon_filename : $ICON_CONF->dead;
  }

  //投票のチェックボックス取得
  function GetVoteCheckbox($user, $id, $live){
    return $this->IsVoteCheckbox($user, $live) ?
      $this->GetVoteCheckboxHeader() . ' id="' . $id . '" value="' . $id . '">'."\n" : '';
  }

  //投票対象判定
  protected function IsVoteCheckbox($user, $live){ return $live && ! $this->IsActor($user->uname); }

  //投票のチェックボックスヘッダ取得
  function GetVoteCheckboxHeader(){ return '<input type="radio" name="target_no"'; }

  //-- 投票処理 (夜) --//
  //投票結果チェック (夜)
  function CheckVoteNight(){
    global $RQ_ARGS;

    $this->SetStack($RQ_ARGS->situation, 'message');
    if(! is_null($str = $this->VoteNight())){
      OutputVoteResult('夜：投票先が正しくありません<br>'."\n" . $str);
    }
  }

  //投票処理 (夜)
  function VoteNight(){
    global $USERS;

    $user = $USERS->ByID($this->GetVoteNightTarget());
    $live = $USERS->IsVirtualLive($user->user_no); //仮想的な生死を判定
    if(! is_null($str = $this->IgnoreVoteNight($user, $live))) return $str;
    $this->SetStack($USERS->ByReal($user->user_no)->user_no, 'target_no');
    $this->SetStack($user->handle_name, 'target_handle');
    return null;
  }

  //投票対象者取得 (夜)
  function GetVoteNightTarget(){ global $RQ_ARGS; return $RQ_ARGS->target_no; }

  //投票スキップ判定 (夜)
  function IgnoreVoteNight($user, $live){
    return ! $live || $this->IsActor($user->uname) ? '自分・死者には投票できません' : null;
  }

  //-- 投票集計処理 (夜) --//
  //成功データ追加
  protected function AddSuccess($target, $data = null, $null = false){
    global $ROLES;
    $ROLES->stack->{is_null($data) ? $this->role : $data}[$target] = $null ? null : true;
  }

  //投票者取得
  protected function GetVoter(){ return $this->GetStack('voter'); }

  //襲撃人狼取得
  protected function GetWolfVoter(){ return $this->GetStack('voted_wolf'); }

  //人狼襲撃対象者取得
  protected function GetWolfTarget(){ return $this->GetStack('wolf_target'); }

  //-- 勝敗判定 --//
  //勝利判定
  function Win($winner){ return true; }

  //生存判定
  protected function IsLive($strict = false){ return $this->GetActor()->IsLive($strict); }

  //死亡判定
  protected function IsDead($strict = false){ return $this->GetActor()->IsDead($strict); }
}
