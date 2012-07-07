<?php
//発言置換処理
function ConvertSay(&$say){
  global $GAME_CONF, $ROOM, $ROLES, $USERS, $SELF;

  if ($say == '') return null; //リロード時なら処理スキップ
  //文字数・行数チェック
  if (strlen($say) > $GAME_CONF->say_limit ||
     substr_count($say, "\n") >= $GAME_CONF->say_line_limit){
    $say = '';
    return false;
  }
  if ($GAME_CONF->replace_talk) $say = strtr($say, $GAME_CONF->replace_talk_list); //発言置換モード

  //死者・ゲームプレイ中以外なら以降はスキップ
  if ($SELF->IsDead() || ! $ROOM->IsPlaying()) return null;
  //if ($SELF->IsDead()) return false; //テスト用

  $ROLES->stack->say = $say;
  $ROLES->actor = ($virtual = $USERS->ByVirtual($SELF->user_no)); //仮想ユーザを取得
  do { //発言置換処理
    foreach ($ROLES->Load('say_convert_virtual') as $filter){
      if ($filter->ConvertSay()) break 2;
    }
    $ROLES->actor = $SELF;
    foreach ($ROLES->Load('say_convert') as $filter){
      if ($filter->ConvertSay()) break 2;
    }
  } while(false);

  foreach ($virtual->GetPartner('bad_status', true) as $id => $date){ //妖精の処理
    if ($date != $ROOM->date) continue;
    $ROLES->actor = $USERS->ByID($id);
    foreach ($ROLES->Load('say_bad_status') as $filter) $filter->ConvertSay();
  }

  $ROLES->actor = $virtual;
  foreach ($ROLES->Load('say') as $filter) $filter->ConvertSay(); //他のサブ役職の処理
  $say = $ROLES->stack->say;
  unset($ROLES->stack->say);
  return true;
}

//発言を DB に登録する
function Write($say, $scene, $location = null, $spend_time = 0, $update = false){
  global $RQ_ARGS, $ROOM, $ROLES, $USERS, $SELF;

  //声の大きさを決定
  $voice = $RQ_ARGS->font_type;
  if ($ROOM->IsPlaying() && $SELF->IsLive()) {
    $ROLES->actor = $USERS->ByVirtual($SELF->user_no);
    foreach ($ROLES->Load('voice') as $filter) $filter->FilterVoice($voice, $say);
  }

  if ($ROOM->IsBeforegame()) {
    $ROOM->TalkBeforegame($say, $SELF->uname, $SELF->handle_name, $SELF->color, $voice);
  }
  else {
    $role_id = $ROOM->IsPlaying() ? $SELF->role_id : null;
    $ROOM->Talk($say, null, $SELF->uname, $scene, $location, $voice, $role_id, $spend_time);
  }
  if ($update) $ROOM->UpdateTime();
  //$DB_CONF->Commit(); //必要なら global に登録すること
}

//能力の種類とその説明を出力
function OutputAbility(){
  global $MESSAGE, $ROLE_DATA, $ROLE_IMG, $ROOM, $ROLES, $USERS, $SELF;

  if (! $ROOM->IsPlaying()) return false; //ゲーム中のみ表示する

  if ($SELF->IsDead()){ //死亡したら口寄せ以外は表示しない
    echo '<span class="ability ability-dead">' . $MESSAGE->ability_dead . '</span><br>';
    if ($SELF->IsRole('mind_evoke')) $ROLE_IMG->Output('mind_evoke');
    if ($SELF->IsDummyBoy() && ! $ROOM->IsOpenCast()){ //身代わり君のみ隠蔽情報を表示
      echo '<div class="system-vote">' . $MESSAGE->close_cast . '</div>'."\n";
    }
    return;
  }
  $ROLES->LoadMain($SELF)->OutputAbility(); //メイン役職

  //-- ここからサブ役職 --//
  foreach ($ROLES->Load('display_real') as $filter) $filter->OutputAbility();

  //-- ここからは憑依先の役職を表示 --//
  $ROLES->actor = $USERS->ByVirtual($SELF->user_no);
  foreach ($ROLES->Load('display_virtual') as $filter) $filter->OutputAbility();

  //-- これ以降はサブ役職非公開オプションの影響を受ける --//
  if ($ROOM->IsOption('secret_sub_role')) return;

  $stack = array();
  foreach (array('real', 'virtual', 'none') as $name){
    $stack = array_merge($stack, $ROLES->{'display_' . $name . '_list'});
  }
  //PrintData($stack);
  $display_list = array_diff(array_keys($ROLE_DATA->sub_role_list), $stack);
  $target_list  = array_intersect($display_list, array_slice($ROLES->actor->role_list, 1));
  //PrintData($target_list);
  foreach ($target_list as $role) $ROLE_IMG->Output($role);
}

//仲間を表示する
function OutputPartner($list, $header, $footer = null){
  global $ROLE_IMG;

  if (count($list) < 1) return false; //仲間がいなければ表示しない
  $list[] = '</td>';
  $str = '<table class="ability-partner"><tr>'."\n" .
    $ROLE_IMG->Generate($header, null, true) ."\n" .
    '<td>　' . implode('さん　', $list) ."\n";
  if ($footer) $str .= $ROLE_IMG->Generate($footer, null, true) ."\n";
  echo $str . '</tr></table>'."\n";
}

//現在の憑依先を表示する
function OutputPossessedTarget(){
  global $USERS, $SELF;

  $type = 'possessed_target';
  if (is_null($stack = $SELF->GetPartner($type))) return;

  $target = $USERS->ByID($stack[max(array_keys($stack))])->handle_name;
  if ($target != '') OutputAbilityResult('partner_header', $target, $type);
}

//個々の能力発動結果を表示する
function OutputSelfAbilityResult($action){
  global $RQ_ARGS, $ROOM, $SELF;

  $header = null;
  $footer = 'result_';
  $limit  = false;
  switch($action){
  case 'MAGE_RESULT':
  case 'CHILD_FOX_RESULT':
    $type   = 'mage';
    $header = 'mage_result';
    $limit  = true;
    break;

  case 'VOODOO_KILLER_SUCCESS':
    $type   = 'mage';
    $footer = 'voodoo_killer_';
    $limit  = true;
    break;

  case 'NECROMANCER_RESULT':
  case 'SOUL_NECROMANCER_RESULT':
  case 'PSYCHO_NECROMANCER_RESULT':
  case 'EMBALM_NECROMANCER_RESULT':
  case 'ATTEMPT_NECROMANCER_RESULT':
  case 'DUMMY_NECROMANCER_RESULT':
  case 'MIMIC_WIZARD_RESULT':
  case 'SPIRITISM_WIZARD_RESULT':
  case 'MONK_FOX_RESULT':
    $type = 'necromancer';
    break;

  case 'EMISSARY_NECROMANCER_RESULT':
    $type   = 'priest';
    $header = 'emissary_necromancer_header';
    $footer = 'priest_footer';
    break;

  case 'MEDIUM_RESULT':
    $type   = 'necromancer';
    $header = 'medium';
    break;

  case 'PRIEST_RESULT':
  case 'DUMMY_PRIEST_RESULT':
  case 'PRIEST_JEALOUSY_RESULT':
    $type   = 'priest';
    $header = 'priest_header';
    $footer = 'priest_footer';
    break;

  case 'BISHOP_PRIEST_RESULT':
    $type   = 'priest';
    $header = 'bishop_priest_header';
    $footer = 'priest_footer';
    break;

  case 'DOWSER_PRIEST_RESULT':
    $type   = 'priest';
    $header = 'dowser_priest_header';
    $footer = 'dowser_priest_footer';
    break;

  case 'WEATHER_PRIEST_RESULT':
    $type   = 'weather_priest';
    $header = 'weather_priest_header';
    break;

  case 'CRISIS_PRIEST_RESULT':
    $type   = 'crisis_priest';
    $header = 'side_';
    $footer = 'crisis_priest_result';
    break;

  case 'HOLY_PRIEST_RESULT':
    $type   = 'priest';
    $header = 'holy_priest_header';
    $footer = 'dowser_priest_footer';
    $limit  = true;
    break;

  case 'BORDER_PRIEST_RESULT':
    $type   = 'priest';
    $header = 'border_priest_header';
    $footer = 'priest_footer';
    $limit  = true;
    break;

  case 'GUARD_SUCCESS':
  case 'GUARD_HUNTED':
    $type   = 'mage';
    $footer = 'guard_';
    $limit  = true;
    break;

  case 'REPORTER_SUCCESS':
    $type   = 'reporter';
    $header = 'reporter_result_header';
    $footer = 'reporter_result_footer';
    $limit  = true;
    break;

  case 'ANTI_VOODOO_SUCCESS':
    $type   = 'mage';
    $footer = 'anti_voodoo_';
    $limit  = true;
    break;

  case 'POISON_CAT_RESULT':
    $type   = 'mage';
    $footer = 'poison_cat_';
    $limit  = true;
    break;

  case 'PHARMACIST_RESULT':
    $type   = 'mage';
    $footer = 'pharmacist_';
    $limit  = true;
    break;

  case 'ASSASSIN_RESULT':
    $type   = 'mage';
    $header = 'assassin_result';
    $limit  = true;
    break;

  case 'CLAIRVOYANCE_RESULT':
    $type   = 'reporter';
    $header = 'clairvoyance_result_header';
    $footer = 'clairvoyance_result_footer';
    $limit  = true;
    break;

  case 'SEX_WOLF_RESULT':
  case 'SHARP_WOLF_RESULT':
  case 'TONGUE_WOLF_RESULT':
    $type   = 'mage';
    $header = 'wolf_result';
    $limit  = true;
    break;

  case 'FOX_EAT':
    $type   = 'fox';
    $header = 'fox_';
    $limit  = true;
    break;

  case 'VAMPIRE_RESULT':
    $type   = 'mage';
    $header = 'vampire_result';
    $limit  = true;
    break;

  case 'MANIA_RESULT':
  case 'PATRON_RESULT':
    $type  = 'mage';
    $limit = true;
    break;

  case 'SYMPATHY_RESULT':
    $type   = 'mage';
    $header = 'sympathy_result';
    $limit  = ! $SELF->IsRole('ark_angel');
    break;

  case 'PRESAGE_RESULT':
    $type   = 'reporter';
    $header = 'presage_result_header';
    $footer = 'reporter_result_footer';
    $limit  = true;
    break;

  default:
    return false;
  }

  $target_date = $ROOM->date - 1;
  if ($ROOM->test_mode){
    $stack = $RQ_ARGS->TestItems->result_ability;
    $stack = array_key_exists($target_date, $stack) ? $stack[$target_date] : array();
    $stack = array_key_exists($action, $stack) ? $stack[$action] : array();
    //PrintData($stack, $user_no);
    if ($limit){
      $limit_stack = array();
      foreach ($stack as $list){
	if ($list['user_no'] == $SELF->user_no) $limit_stack[] = $list;
      }
      $stack = $limit_stack;
      //PrintData($stack, $user_no);
    }
    $result_list = $stack;
  }
  else {
    $query = 'SELECT DISTINCT target, result FROM result_ability WHERE room_no = ' .
      "{$ROOM->id} AND date = {$target_date} AND type = '{$action}'";
    if ($limit) $query .= " AND user_no = {$SELF->user_no}";
    $result_list = FetchAssoc($query);
  }
  //PrintData($result_list);

  switch($type){
  case 'mage':
  case 'guard':
    foreach ($result_list as $result){
      OutputAbilityResult($header, $result['target'], $footer . $result['result']);
    }
    break;

  case 'necromancer':
    if (is_null($header)) $header = 'necromancer';
    foreach ($result_list as $result){
      OutputAbilityResult($header . '_result', $result['target'], $footer . $result['result']);
    }
    break;

  case 'priest':
    foreach ($result_list as $result) OutputAbilityResult($header, $result['result'], $footer);
    break;

  case 'weather_priest':
    foreach ($result_list as $result) OutputAbilityResult($header, null, $result['result']);
    break;

  case 'crisis_priest':
    foreach ($result_list as $result){
      OutputAbilityResult($header . $result['result'], null, $footer);
    }
    break;

  case 'reporter':
    foreach ($result_list as $result){
      OutputAbilityResult($header, $result['target'] . ' さんは ' . $result['result'], $footer);
    }
    break;

  case 'fox':
    foreach ($result_list as $result) OutputAbilityResult($header . $result['result'], null);
    break;
  }
}

//能力発動結果を表示する
function OutputAbilityResult($header, $target, $footer = null){
  global $ROLE_IMG;

  $str = '<table class="ability-result"><tr>'."\n";
  if (isset($header)) $str .= $ROLE_IMG->Generate($header, null, true) ."\n";
  if (isset($target)) $str .= '<td>' . $target . '</td>'."\n";
  if (isset($footer)) $str .= $ROLE_IMG->Generate($footer, null, true) ."\n";
  echo $str . '</tr></table>'."\n";
}

//夜の未投票メッセージ出力
function OutputVoteMessage($class, $sentence, $type, $not_type = ''){
  global $MESSAGE, $ROOM, $USERS;

  $stack = $ROOM->test_mode ? array() : GetSelfVoteNight($type, $not_type);
  if (count($stack) < 1){
    $str = $MESSAGE->{'ability_' . $sentence};
  }
  elseif ($type == 'WOLF_EAT' || $type == 'CUPID_DO' || $type == 'DUELIST_DO'){
    $str = '投票済み';
  }
  elseif ($type == 'SPREAD_WIZARD_DO'){
    $str_stack = array();
    foreach (explode(' ', $stack['target_no']) as $id){
      $user = $USERS->ByVirtual($id);
      $str_stack[$user->user_no] = $user->handle_name;
    }
    ksort($str_stack);
    $str = implode('さん ', $str_stack) . 'さんに投票済み';
  }
  elseif ($not_type != '' && $stack['type'] == $not_type){
    $str = 'キャンセル投票済み';
  }
  elseif ($type == 'POISON_CAT_DO' || $type == 'POSSESSED_DO'){
    $str = $USERS->ByID($stack['target_no'])->handle_name . 'さんに投票済み';
  }
  else {
    $str = $USERS->ByVirtual($stack['target_no'])->handle_name . 'さんに投票済み';
  }
  echo '<span class="ability ' . $class . '">' . $str . '</span><br>'."\n";
}
