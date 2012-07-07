<?php
//-- 発言処理の基底クラス --//
class DocumentBuilder{
  public $actor;
  public $flag;
  public $filter = array();

  function __construct(){
    global $ROOM, $USERS, $SELF;

    $this->actor = $USERS->ByVirtual($SELF->user_no); //仮想ユーザを取得
    //観戦モード判定
    if ((is_null($this->actor->live) || ! $ROOM->IsOpenCast()) && ! $ROOM->IsFinished()) {
      //本人視点が変化するタイプ
      $stack = array('blinder' => $ROOM->IsDay(), 'earplug' => $ROOM->IsDay(),
		     'deep_sleep' => true);
      foreach ($stack as $role => $flag) {
	if (($flag && $ROOM->IsEvent($role)) || $ROOM->IsOption($role)) {
	  $this->actor->virtual_live = true;
	  $this->actor->role_list[]  = $role;
	}
      }
    }
    $this->LoadFilter();
    $this->SetFlag();
  }

  //フィルタ対象役職の情報をロード
  function LoadFilter(){
    global $ROLES;

    $ROLES->actor = $this->actor;
    if (! isset($ROLES->actor->virtual_live)) $ROLES->actor->virtual_live = false;
    $this->filter = $ROLES->Load('talk');
    $ROLES->stack->viewer  = $ROLES->actor;
    $ROLES->stack->builder = $this;
  }

  //フィルタ用フラグをセット
  function SetFlag(){
    global $ROOM, $SELF;

    //フラグをセット
    $this->flag->dummy_boy  = $SELF->IsDummyBoy();
    $this->flag->common     = $this->actor->IsCommon(true);
    $this->flag->wolf       = $SELF->IsWolf(true) || $this->actor->IsRole('whisper_mad');
    $this->flag->fox        = $SELF->IsFox(true);
    $this->flag->lovers     = $SELF->IsLovers();
    $this->flag->mind_read  = $ROOM->date > 1 && ($ROOM->single_view_mode || $SELF->IsLive());
    $this->flag->deep_sleep = $this->actor->IsRole('deep_sleep');
    foreach (array('whisper_ringing', 'howl_ringing', 'sweet_ringing') as $role) { //耳鳴
      $this->flag->$role = $this->actor->IsRole($role) && ! $this->flag->deep_sleep;
    }
    $this->flag->sweet_ringing  = $this->flag->sweet_ringing && $ROOM->date > 1;
    $this->flag->common_whisper = ! $SELF->IsRole('dummy_common') && ! $this->flag->deep_sleep;
    $this->flag->wolf_howl      = ! $SELF->IsRole('mind_scanner') && ! $this->flag->deep_sleep;

    //発言完全公開フラグ
    /*
      + ゲーム終了後は全て表示
      + 霊界表示オン状態の死者には全て表示
      + 霊界表示オフ状態は観戦者と同じ (投票情報は表示しない)
    */
    $this->flag->open_talk = $ROOM->IsOpenData();

    foreach (array('common', 'wolf', 'fox') as $type) { //身代わり君の上書き判定
      $this->flag->$type |= $this->flag->dummy_boy;
    }
  }

  //発言テーブルヘッダ作成
  function BeginTalk($class, $id = null){
    $this->cache = '<table' . (is_null($id) ? '' : ' id="' . $id . '"') .
      ' class="' . $class . '">' . "\n";
  }

  //基礎発言処理
  function RawAddTalk($symbol, $user_info, $str, $voice, $row_class = '',
		      $user_class = '', $say_class = ''){
    global $GAME_CONF;

    if ($row_class  != '') $row_class  = ' ' . $row_class;
    if ($user_class != '') $user_class = ' ' . $user_class;
    if ($say_class  != '') $say_class  = ' ' . $say_class;
    LineToBR($str);
    if ($GAME_CONF->quote_words) $str = '「' . $str . '」';

    $this->cache .= <<<EOF
<tr class="user-talk{$row_class}">
<td class="user-name{$user_class}">{$symbol}{$user_info}</td>
<td class="say{$say_class} {$voice}">{$str}</td>
</tr>

EOF;
    return true;
  }

  //標準的な発言処理
  function AddTalk($user, $talk, $real = null){
    global $RQ_ARGS, $ROOM, $USERS;

    //表示情報を抽出
    $color  = isset($talk->color) ? $talk->color : $user->color;
    $symbol = '<font style="color:' . $color . '">◆</font>';
    $name   = isset($talk->handle_name) ? $talk->handle_name : $user->handle_name;
    if ($RQ_ARGS->add_role && $user->user_no != 0) { //役職表示モード対応
      $real = $talk->scene == 'heaven' ? $user :
	(isset($real) ? $real : $USERS->ByReal($user->user_no));
      $name .= $real->GenerateShortRoleName();
    }
    if ($ROOM->IsNight() &&
	(($talk->type == 'self_talk' && ! $user->IsRole('dummy_common')) ||
	 $user->IsRole('leader_common', 'mind_read', 'mind_open'))) {
      $name .= '<span>の独り言</span>';
    }
    $str   = $talk->sentence;
    $voice = $talk->font_type;
    //発言フィルタ処理
    foreach ($this->filter as $filter) $filter->FilterTalk($user, $name, $voice, $str);
    if (isset($talk->date_time)) $name .= "<br><span>{$talk->date_time}</span>";
    return $this->RawAddTalk($symbol, $name, $str, $voice, $time);
  }

  function AddSystemTalk($str, $class = 'system-user'){
    LineToBR($str);
    $this->cache .= <<<EOF
<tr>
<td class="{$class}" colspan="2">{$str}</td>
</tr>

EOF;
    return true;
  }

  function AddSystemMessage($class, $str, $add_class = ''){
    if ($add_class != '') $add_class = ' ' . $add_class;
    $this->cache .= <<<EOF
<tr class="system-message{$add_class}">
<td class="{$class}" colspan="2">{$str}</td>
</tr>

EOF;
    return true;
  }

  function RefreshTalk(){
    $str = $this->cache.'</table>'."\n";
    $this->cache = '';
    return $str;
  }

  function EndTalk(){ echo $this->RefreshTalk(); }
}
