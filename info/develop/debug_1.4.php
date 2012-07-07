<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputInfoPageHeader('デバッグ情報 / ～ 1.4', 1, 'debug');
?>
<p><a href="debug.php">最新情報</a></p>
<p>
Ver. 1.4.x</a><br>
<a href="#ver146">6</a>
</p>
<p>
Ver. 1.4.0</a><br>
<a href="#ver140a24">α24</a>
<a href="#ver140b2">β2</a>
<a href="#ver140b3">β3</a>
<a href="#ver140b4">β4</a>
<a href="#ver140b11">β11</a>
<a href="#ver140b12">β12</a>
<a href="#ver140b13">β13</a>
<a href="#ver140b16">β16</a>
<a href="#ver140b17">β17</a>
<a href="#ver140b18">β18</a>
<a href="#ver140b19">β19</a>
<a href="#ver140b20">β20</a>
<a href="#ver140b21">β21</a>
<a href="#ver140b22">β22</a>
<a href="#ver140">Release</a>
</p>
<p>
Ver. 1.3.x</a><br>
<a href="#ver133">3</a>
</p>

<h2><a id="ver146">Ver. 1.4.6</a></h2>
<h3>include/game_vote_functions.php % 2488行目付近 (2011/02/24 (Thu) 08:24)</h3>

<h4>[before]</h4>
<pre>
$target->ReturnPossessed('possessed_target', $ROOM->date + 1);
</pre>
<h4>[after]</h4>
<pre>
$target->ReturnPossessed('possessed_target', $ROOM->date + 1);
<span>$stack = $virtual_target->GetPartner('possessed');
if($target->user_no == $stack[max(array_keys($stack))]){
  $virtual_target->ReturnPossessed('possessed', $ROOM->date + 1);
}</span>
</pre>
<h3>include/game_vote_functions.php % 1970行目付近 (2011/02/25 (Fri) 02:54)</h3>
<h4>[before]</h4>
<pre>
else{
  continue;
}
</pre>

<h4>[after]</h4>
<pre>
<span>elseif($voted_wolf->IsRole('possessed_wolf') && $voted_wolf->IsSame($target->uname)){
  $voted_wolf->possessed_cancel = true;
}</span>
else{
  continue;
}
</pre>

<h2 id="ver140">Ver. 1.4.0</h2>
<h3>room_manager.php % 312行目付近 (2010/12/28 (Tue) 19:10)</h3>
<pre>
× <span>0</span>, in_array('gerd', $option_role_list) ? $USER_ICON->gerd : 0)) break;
○ <span>1</span>, in_array('gerd', $option_role_list) ? $USER_ICON->gerd : 0)) break;
</pre>
<h3>config/server_config % 93行目付近 (2010/12/28 (Tue) 19:10)</h3>
<h4>[before]</h4>
<pre>
  //表示する他のサーバのリスト
  var $server_list = array(
     /* 設定例
    'cirno' => array('name' => 'チルノ鯖',
                     'url' => 'http://www12.atpages.jp/cirno/',
                     'encode' => 'UTF-8',
                     'separator' =&gt; '&lt;!-- atpages banner tag --&gt;',
                     'footer' =&gt; '&lt;/a&gt;&lt;br&gt;',
                     'disable' => false),
     */
}
</pre>
<h4>[after]</h4>
<pre>
  //表示する他のサーバのリスト
  var $server_list = array(
     /* 設定例
    'cirno' => array('name' => 'チルノ鯖',
                     'url' => 'http://www12.atpages.jp/cirno/',
                     'encode' => 'UTF-8',
                     'separator' =&gt; '&lt;!-- atpages banner tag --&gt;',
                     'footer' =&gt; '&lt;/a&gt;&lt;br&gt;',
                     'disable' => false),
     */
                          <span>);</span>
}
</pre>

<h2 id="ver140b22">Ver. 1.4.0 β22</h2>
<h3>game_vote.php % 261行目付近 (2010/12/07 (Tue) 00:09)</h3>
<pre>
× <span>if</span>($SELF->IsRole('evoke_scanner')){
○ <span>elseif</span>($SELF->IsRole('evoke_scanner')){
</pre>

<h2 id="ver140b21">Ver. 1.4.0 β21</h2>
<h3>room_manager.php % 178行目付近 (2010/11/23 (Tue) 22:45)</h3>
<h4>[before]</h4>
<pre>
array_push($check_game_option_list, 'deep_sleep', 'mind_open', 'blinder');
<span>$check_option_role_list[] = 'joker';</span>
</pre>
<h4>[after]</h4>
<pre>
array_push($check_game_option_list, <span>'joker', </span>'deep_sleep', 'mind_open', 'blinder');
</pre>
<h3>include/user_class.php % 1200行目付近 (2010/11/23 (Tue) 22:45)</h3>
<h4>[before]</h4>
<pre>
$stack = array();
</pre>
<h4>[after]</h4>
<pre>
<span>if(! $ROOM->IsOption('joker')) return false;</span>
$stack = array();
</pre>
<h3>include/game_vote_functions.php % 1222行目付近 (2010/11/23 (Tue) 22:45)</h3>
<pre>
× $joker_flag = <span>false</span>; //ジョーカー移動成立フラグ
○ $joker_flag = <span>! $ROOM->IsOption('joker')</span>; //ジョーカー移動成立フラグ
</pre>
<h3>include/game_vote_functions.php % 2724行目付近 (2010/11/24 (Wed) 21:00)</h3>
<pre>
× if(<span>$role_flag->bishop_priest && </span>$user->GetCamp(true) != 'human') $live_count['dead']++;
○ if($user->GetCamp(true) != 'human') $live_count['dead']++;
</pre>
<h3>include/game_vote_functions.php % 2733行目付近 (2010/11/24 (Wed) 21:00)</h3>
<pre>
× if(<span>$role_flag->priest && </span>$user->GetCamp() == 'human') $live_count['human_side']++;
○ if($user->GetCamp() == 'human') $live_count['human_side']++;
</pre>

<h2 id="ver140b20">Ver. 1.4.0 β20</h2>
<h3>include/game_format.php % 22行目付近 (2010/11/15 (Mon) 03:16)</h3>
<pre>
× $SELF-><span>live-></span>virtual_live = true;
○ $SELF->virtual_live = true;
</pre>
<h3>include/game_vote_functions.php % 817行目付近 (2010/11/16 (Tue) 05:57)</h3>
<h4>[before]</h4>
<pre>
  //リストにデータを追加
  $live_uname_list[$user->user_no] = $user->uname;
  $vote_message_list[$user->uname] = $message_list;
  $vote_target_list[$user->uname]  = $target->uname;
  $vote_count_list[$user->uname]   = $voted_number;
  foreach($ROLES->Load('vote_ability') as $filter) $filter->SetVoteAbility($target->uname);
}
</pre>
<h4>[after]</h4>
<pre>
  //リストにデータを追加
  $live_uname_list[$user->user_no]   = $user->uname;
  $vote_message_list[$user->user_no] = $message_list;
  $vote_target_list[$user->uname]    = $target->uname;
  $vote_count_list[$user->uname]     = $voted_number;
  foreach($ROLES->Load('vote_ability') as $filter) $filter->SetVoteAbility($target->uname);
}
<span>ksort($vote_message_list);
$stack = array();
foreach($vote_message_list as $id => $list) $stack[$USERS->ByID($id)->uname] = $list;
$vote_message_list = $stack;</span>
</pre>

<h2 id="ver140b19">Ver. 1.4.0 β19</h2>
<h3>game_play.php % 264行目付近 (2010/11/06 (Sat) 04:12)</h3>
<h4>[before]</h4>
<pre>
<span>$user = $USERS->ByVirtual($SELF->user_no);</span>
if($ROOM->IsPlaying() && <span>$user</span>->IsLive()){
  $ROLES->actor = <span>$user</span>;
  foreach($ROLES->Load('voice') as $filter) $filter->FilterVoice($voice, $say);
}
</pre>
<h4>[after]</h4>
<pre>
if($ROOM->IsPlaying() && <span>$SELF</span>->IsLive()){
  $ROLES->actor = <span>$USERS->ByVirtual($SELF->user_no)</span>;
  foreach($ROLES->Load('voice') as $filter) $filter->FilterVoice($voice, $say);
}
</pre>
<h3>include/role/role_class.php % 132行目付近 (2010/11/06 (Sat) 04:12)</h3>
<h4>[before]</h4>
<pre>
function Ignored(){
  global $ROOM, $ROLES;
  //return false; //テスト用
  return ! ($ROOM->IsPlaying() && <span>$ROLES->actor->IsLive()</span>);
}
</pre>
<h4>[after]</h4>
<pre>
function Ignored(){
  global $ROOM, <span>$USERS, </span>$ROLES;
  //return false; //テスト用
  return ! ($ROOM->IsPlaying() && <span>$USERS->IsVirtualLive($ROLES->actor->user_no)</span>);
}
</pre>
<h3>include/game_vote_functions.php % 2591行目付近 (2010/11/06 (Sat) 05:09)</h3>
<pre>
× '<span>ogre</span>' => 'yaksa');
○ '<span>yaksa</span>' => 'yaksa');
</pre>
<h3>include/game_vote_functions.php % 2619行目付近 (2010/11/06 (Sat) 05:09)</h3>
<pre>
× '<span>ogre</span>' => 'succubus_yaksa');
○ '<span>yaksa</span>' => 'succubus_yaksa');
</pre>

<h2 id="ver140b18">Ver. 1.4.0 β18</h2>
<h3>include/user_class.php % 432行目付近 (2010/10/16 (Sat) 03:18)</h3>
<pre>
× if($this->IsRole('mind_scanner')) return $this->IsVoted($vote_data, 'MIND_SCANNER_DO');
○ if($this->IsRole('mind_scanner'<span>, 'presage_scanner'</span>)) return $this->IsVoted($vote_data, 'MIND_SCANNER_DO');
</pre>
<h3>img/role/ (2010/10/18 (Mon) 05:33)</h3>
<pre>
× result_succbus_vampire.gif
○ result_succ<span>u</span>bus_vampire.gif
</pre>
<h3>game_vote.php % 143行目付近 (2010/10/20 (Wed) 04:56)</h3>
<pre>
× if(FetchResult($ROOM->GetQueryHeader('room', 'day_night') != 'beforegame'<span>)</span>){
○ if(FetchResult($ROOM->GetQueryHeader('room', 'day_night')<span>)</span> != 'beforegame'){
</pre>

<h2 id="ver140b17">Ver. 1.4.0 β17</h2>
<h3>include/user_class.php % 370行目付近 (2010/10/04 (Mon) 00:44)</h3>
<pre>
× return <span>$result && ! $reverse</span> ? 'wolf' : 'human';
○ return <span>($result xor $reverse)</span> ? 'wolf' : 'human';
</pre>
<h3>include/room_class.php % 306行目付近 (2010/10/08 (Fri) 02:21)</h3>
<pre>
× if(<span>empty($uname)</span>) $uname = 'system';
○ if(<span>$uname == ''</span>) $uname = 'system';
</pre>

<h2 id="ver140b16">Ver. 1.4.0 β16</h2>
<h3>include/game_vote_functions.php % 1474行目付近</h3>
<h4>[before]</h4>
<pre>
if($target->IsSame($vote_kill_uname)) continue;
<span>if(</span>$target->IsActive(<span>$stack</span>)<span>)</span> $target->LostAbility()<span>;</span>
<span>elseif($target->IsRole('lost_ability')){</span>
	$USERS->SuddenDeath($target->user_no, 'SUDDEN_DEATH_SEALED');
<span>}</span>
</pre>
<h4>[after]</h4>
<pre>
if($target->IsSame($vote_kill_uname)<span> || ! $target->IsRole($stack)</span>) continue;
$target->IsActive() <span>?</span> $target->LostAbility() <span>:</span>
  $USERS->SuddenDeath($target->user_no, 'SUDDEN_DEATH_SEALED');
</pre>
<h3>include/user_class.php % 409行目付近 (2010/08/31 (Tue) 03:59)</h3>
<pre>
× $this->IsVoted($vote_data, 'MAGE_DO');
○ <span>return</span> $this->IsVoted($vote_data, 'MAGE_DO');
</pre>
<h3>include/user_class.php % 897行目付近 (2010/09/16 (Thu) 04:22)</h3>
<h4>[before]</h4>
<pre>
$target = $user;
do{ //覚醒者・夢語部ならコピー先を辿る
  if(! $target->IsRole('soul_mania', 'dummy_mania')) break;
  $stack = $target->GetPartner($target->main_role);
  if(is_null($stack)) break; //コピー先が見つからなければスキップ

  $target = $this->ByID($stack[0]);
  if($target->IsRoleGroup('mania')) $target = $user; //神話マニア系なら元に戻す
}while(false);

while($target->IsRole('unknown_mania')){ //鵺ならコピー先を辿る
  $stack = $target->GetPartner('unknown_mania');
  if(is_null($stack)) break; //コピー先が見つからなければスキップ

  $target = $this->ByID($stack[0]);
  if($target->IsSelf()) break; //自分に戻ったらスキップ
}
</pre>
<h4>[after]</h4>
<pre>
$target = $user;
$stack  = array();
while($target->IsRole('unknown_mania')){ //鵺ならコピー先を辿る
  $id = array_shift($target->GetPartner('unknown_mania', true));
  if(is_null($id) || in_array($id, $stack)) break;
  $stack[] = $id;
  $target  = $this->ByID($id);
}

//覚醒者・夢語部ならコピー先を辿る
if($target->IsRole('soul_mania', 'dummy_mania') &&
   is_array($stack = $target->GetPartner($target->main_role))){
  $target = $this->ByID(array_shift($stack));
  if($target->IsRoleGroup('mania')) $target = $user; //神話マニア系なら元に戻す
}
</pre>

<h2 id="ver140b13">Ver. 1.4.0 β13</h2>
<h3>include/game_vote_functions.php % 973行目付近</h3>
<pre>
× $delete_role_list = array('lovers', '<span>admire</span>_lovers', 'copied', 'copied_trick', 'copied_soul',
○ $delete_role_list = array('lovers', '<span>challenge</span>_lovers', 'copied', 'copied_trick', 'copied_soul',
</pre>
<h3>include/game_vote_functions.php % 2510行目付近 (2010/07/19 (Mon) 09:41)</h3>
<h4>[before]</h4>
<pre>
case 'doll_master':
</pre>
<h4>[after]</h4>
<pre>
<span>case 'whisper_scanner':
case 'howl_scanner':
case 'telepath_scanner':
  $stack_role = 'mind_scanner';
  break;
</span>
case 'doll_master':
</pre>
<h3>game_vote.php % 490行目付近 (2010/07/20 (Tue) 01:58)</h3>
<h4>[before]</h4>
<pre>
$target->AddRole($add_role);
</pre>
<h4>[after]</h4>
<pre>
$target->AddRole($add_role);
<span>$target->ParseRoles($target->GetRole());</span>
</pre>
<h3>include/game_functions.php % 835行目付近 (2010/07/21 (Wed) 01:02)</h3>
<pre>
× elseif($said_user->IsLonely(<span>'silver_wolf'</span>)){
○ elseif(<span>$said_user->IsWolf() && </span>$said_user->IsLonely()){
</pre>

<h2 id="ver140b12">Ver. 1.4.0 β12</h2>
<h3>include/game_vote_functinons.php % 176行目付近</h3>
<h4>[before]</h4>
<pre>
<span>$random_replace_list = $CAST_CONF->GenerateRandomList($replace_human_list);</span>
$CAST_CONF->AddRandom($role_list, $random_replace_list, $over_count);
</pre>
<h4>[after]</h4>
<pre>
$CAST_CONF->AddRandom($role_list, $replace_human_list, $over_count);
</pre>

<h2 id="ver140b11">Ver. 1.4.0 β11</h2>
<h3>include/user_class.php % 190行目付近</h3>
<h4>[before]</h4>
<pre>
  function IsLonely(){
    return $is_role && ($this->IsRole('mind_lonely') || $this->IsRoleGroup('silver'));
  }
</pre>
<h4>[after]</h4>
<pre>
  function IsLonely(<span>$role = NULL</span>){
    <span>$is_role = is_null($role) ? true : $this->IsRole($role);</span>
    return $is_role && ($this->IsRole('mind_lonely') || $this->IsRoleGroup('silver'));
  }
</pre>
<h3>include/user_class.php % 230行目付近 (2010/07/07 (Wed) 21:40)</h3>
<pre>
× return $ROOM->date > 1 && $ROOM < 5 && $this->IsRole('challenge_lovers');
○ return $ROOM->date > 1 && $ROOM<span>->date</span> < 5 && $this->IsRole('challenge_lovers');
</pre>
<h3>game_vote.php % 295行目付近 (2010/07/07 (Wed) 23:16)</h3>
<pre>
× if(! $SELF->IsRole('<span>scanner</span>', 'evoke_scanner')){
○ if(! $SELF->IsRole('<span>mind_scanner</span>', 'evoke_scanner')){
</pre>
<h3>include/game_vote_functions.php % 2009行目付近 (2010/07/09 (Fri) 01:18)</h3>
<pre>
× if($target->IsRole('escaper')) <span>break</span>; //逃亡者は暗殺不可
○ if($target->IsRole('escaper')) <span>continue</span>; //逃亡者は暗殺不可
</pre>
<h3>include/game_functions.php % 834行目付近 (2010/07/11 (Sun) 02:22)</h3>
<pre>
× elseif($said_user->IsLonely('<span>wolf</span>')){
○ elseif($said_user->IsLonely('<span>silver_wolf</span>')){
</pre>

<h2 id="ver140b4">Ver. 1.4.0 β4</h2>
<h3>user_manager.php % 35行目付近</h3>
<h4>[before]</h4>
<pre>
//項目被りチェック
</pre>
<h4>[after]</h4>
<pre>
<span>$query = "SELECT COUNT(icon_no) FROM user_icon WHERE icon_no = " . $icon_no;
if(FetchResult($query) < 1) OutputActionResult('村人登録 [入力エラー]', '無効なアイコン番号です');
</span>
//項目被りチェック
</pre>

<h3>user_manager.php % 275行目付近 (2010/02/24 (Wed) 21:40)</h3>
<pre>
× if($ROOM->IsOptionGroup('mania')) $wish_role_list[] = 'mania';
○ if($ROOM->IsOptionGroup('mania')<span> && ! in_array('mania', $wish_role_list)</span>) $wish_role_list[] = 'mania';
</pre>

<h3>include/game_functons.php % 751行目付近 (2010/02/28 (Sun) 02:00)</h3>
<h4>[before]</h4>
<pre>
$builder->AddSystemTalk($sentence, 'dummy-boy');
</pre>
<h4>[after]</h4>
<pre>
<span>LineToBR($sentence);</span>
$builder->AddSystemTalk($sentence, 'dummy-boy');
</pre>

<h3>game_vote.php % 352行目付近 (2010/02/28 (Sun) 20:25)</h3>
<pre>
× $sub_role_list = $GAME_CONF->sub_role_group_list['sudden-death'];
○ $sub_role_list = <span>array_diff(</span>$GAME_CONF->sub_role_group_list['sudden-death']<span>, array('panelist'))</span>;
</pre>

<h2 id="ver140b3">Ver. 1.4.0 β3</h2>
<h3>game_play.php % 259行目付近</h3>
<pre>
× if($ROOM->IsPlaying() && <span>$virtual</span>->IsLive()){
○ if($ROOM->IsPlaying() && <span>$virtual_self</span>->IsLive()){
</pre>

<h3>include/game_format.php % 60行目付近</h3>
<pre>
× global $RQ_ARGS;
○ global <span>$GAME_CONF, </span>$RQ_ARGS;
</pre>

<h3>include/game_format.php % 83行目付近</h3>
<h4>[before]</h4>
<pre>
if($RQ_ARGS->add_role) $handle_name .= $user->GenarateShortRoleName(); //役職表示モード対応
</pre>
<h4>[after]</h4>
<pre>
if($RQ_ARGS->add_role){ //役職表示モード対応
  <span>$real_user = $talk->scene == 'heaven' ? $user : $USERS->ByReal($user->user_no);</span>
  $handle_name .= $real_user->GenerateShortRoleName();
}
</pre>

<h3>include/talk_class.php % 38行目付近</h3>
<h4>[before]</h4>
<pre>
case 'dummy_boy':
  if($this->type == $this->uname){
</pre>
<h4>[after]</h4>
<pre>
case 'dummy_boy':
  <span>if($this->type == 'system') break;</span>
  if($this->type == $this->uname){
</pre>

<h3>include/game_functions.php % 236行目付近 (2010/02/22 (Mon) 23:00)</h3>
<pre>
× $handle_name .= $real_user->Gen<span>a</span>rateShortRoleName();
○ $handle_name .= $real_user->Gen<span>e</span>rateShortRoleName();
</pre>

<h3>include/user_class.php % 216行目付近</h3>
<pre>
× function Gen<span>a</span>rateShortRoleName(){
○ function Gen<span>e</span>rateShortRoleName(){
</pre>

<h3>include/game_functons.php % 461行目付近 (2010/02/28 (Sun) 02:00)</h3>
<h4>[before]</h4>
<pre>
$builder->AddSystemTalk($sentence, 'dummy-boy');
</pre>
<h4>[after]</h4>
<pre>
<span>LineToBR($sentence);</span>
$builder->AddSystemTalk($sentence, 'dummy-boy');
</pre>


<h2 id="ver140b2">Ver. 1.4.0 β2</h2>
<h3>include/game_vote_functions.php % 1188行目</h3>
<pre>
× elseif(! $ROOM->IsOpenCast() && $user-><span>IsGroup</span>('evoke_scanner')){
○ elseif(! $ROOM->IsOpenCast() && $user-><span>IsRole</span>('evoke_scanner')){
</pre>

<h3>game_play.php % 449 行目</h3>
<pre>
× array_push($actor_list, <span>'poison_cat'</span>);
○ array_push($actor_list, <span>'%cat', 'revive_fox'</span>);
</pre>

<h2 id="ver140a24">Ver. 1.4.0 α24</h2>
<h3>game_play.php % 731 行目</h3>
<pre>
× $USERS->GetHandleName($target_uname) . 'さんに投票済み');
○ $USERS->GetHandleName($target_uname<span>, true</span>) . 'さんに投票済み');
</pre>

<h3>include/game_functions.php % 705 行目</h3>
<pre>
×elseif(<span>$pseud_self</span>->IsRole('wise_wolf')){
○elseif(<span>$virtual_self</span>->IsRole('wise_wolf')){
</pre>

<h3>user_manager.php % 276 行目 (2010/01/30 02:30)</h3>
<pre>
× array_push($wish_role_list, 'mage', 'necromancer', 'priest', 'common', 'poison',
○ array_push($wish_role_list, 'mage', 'necromancer', 'priest', <span>'guard', </span>'common', 'poison',
</pre>

<h3>include/game_functions.php % 400 行目付近 (2010/02/01 (Mon) 00:15)</h3>
<h4>[before]</h4>
<pre>
$said_user = $USERS->ByVirtualUname($talk->uname);
</pre>
<h4>[after]</h4>
<pre>
<span>if(strpos($talk->location, 'heaven') === false)</span>
  $said_user = $USERS->ByVirtualUname($talk->uname);
<span>else
  $said_user = $USERS->ByUname($talk->uname);</span>
</pre>

<h3>include/game_vote_functions % 1865 行目付近</h3>
<h4>[before]</h4>
<pre>
$target->dead_flag = false; //死亡フラグをリセット
$USERS->Kill($target->user_no, 'WOLF_KILLED');
if($target->revive_flag) $target->Update('live', 'live'); //蘇生対応
</pre>
<h4>[after]</h4>
<pre>
<span>if(isset($target->user_no)){</span>
  $target->dead_flag = false; //死亡フラグをリセット
  $USERS->Kill($target->user_no, 'WOLF_KILLED');
  if($target->revive_flag) $target->Update('live', 'live'); //蘇生対応
<span>}</span>
</pre>

<h2><a id="ver133">Ver. 1.3.3</a></h2>
<h3>game_vote.php % 240 行目 (2011/02/22 (Tue) 01:52)</h3>
<pre>
× $rand_keys = array_rand($role_array, $user_count); //ランダムキーを取得
○ <span>shuffle(</span>$rand_keys = array_rand($role_array, $user_count)<span>)</span>; //ランダムキーを取得)
</pre>
</body></html>
