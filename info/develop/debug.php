<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputInfoPageHeader('デバッグ情報', 1, 'debug');
?>
<p>
Ver. 1.5.0<br>
<a href="#ver150a2">α2</a>
<a href="#ver150a3">α3</a>
<a href="#ver150a4">α4</a>
<a href="#ver150a5">α5</a>
<a href="#ver150a7">α7</a>
<a href="#ver150b1">β1</a>
<a href="#ver150b5">β5</a>
<a href="#ver150b9">β9</a>
<a href="#ver150b11">β11</a>
<a href="#ver150b12">β12</a>
<a href="#ver150b13">β13</a>
<a href="#ver150b14">β14</a>
<a href="#ver150b15">β15</a>
</p>
<p><a href="debug_1.4.php">～ 1.4</a></p>

<h2 id="ver150b15">Ver. 1.5.0 β15</h2>
<h3>include/role/mage.php % 61行目付近 (2011/10/30 (Sun) 01:46)</h3>
<h4>[before]</h4>
<pre>
}
return false;
</pre>
<h4>[after]</h4>
<pre>
<span>  $USERS->Kill($this->GetActor()->user_no, 'CURSED');
  return true;</span>
}
return false;
</pre>

<h3>include/role/jammer_mad.php % 20行目付近 (2011/10/30 (Sun) 17:37)</h3>
<pre>
× global $ROOM, $ROLES;
○ global $ROOM, $ROLES<span>, $USERS</span>;
</pre>

<h3>include/role/jammer_mad.php % 26行目付近 (2011/10/30 (Sun) 17:37)</h3>
<h4>[before]</h4>
<pre>
foreach($filter_list as $filter){ //厄神の護衛判定
  if($filter->GuardCurse($this->GetActor())) return false;
}
</pre>
<h4>[after]</h4>
<pre>
foreach($filter_list as $filter){ //厄神の護衛判定
  if($filter->GuardCurse($this->GetActor())) return false;
}
<span>$USERS->Kill($this->GetActor()->user_no, 'CURSED');
return false;</span>
</pre>

<h3>include/role/voodoo_mad.php % 18行目付近 (2011/10/30 (Sun) 17:37)</h3>
<h4>[before]</h4>
<pre>
foreach($ROLES->LoadFilter('anti_voodoo') as $filter){ //厄神の護衛判定
  if($filter->GuardCurse($this->GetActor())) return false;
}
</pre>
<h4>[after]</h4>
<pre>
foreach($ROLES->LoadFilter('anti_voodoo') as $filter){ //厄神の護衛判定
  if($filter->GuardCurse($this->GetActor())) return false;
}
<span>$USERS->Kill($this->GetActor()->user_no, 'CURSED');
return false;</span>
</pre>

<h3>include/role/voodoo_mad.php % 38行目付近 (2011/10/31 (Mon) 00:25)</h3>
<h4>[before]</h4>
<pre>
foreach($filter_list as $filter) $filter->GuardCurse($USERS->ByUname($uname));
</pre>
<h4>[after]</h4>
<pre>
$user = $USERS->ByUname($uname);
foreach($filter_list as $filter){
  if($filter->GuardCurse($user)) continue 2;
}
$USERS->Kill($user->user_no, 'CURSED');
</pre>

<h3>include/role/dummy_chiroptera.php % 24行目付近 (2011/11/06 (Sun) 04:20)</h3>
<h4>[before]</h4>
<pre>
  <span>$this->filter->OutputAction();</span>
  //仮想恋人を表示 (憑依追跡 / 恋人・悲恋持ちなら処理委託)
  if(! is_array($target) || $this->GetActor()->IsRole('lovers', 'sweet_status')) return;
  $lovers = array();
  foreach($target as $id) $lovers[] = $USERS->GetHandleName($USERS->ById($id)->uname, true);
  OutputPartner($lovers, 'partner_header', 'lovers_footer');
}
</pre>
<h4>[after]</h4>
<pre>
  //仮想恋人を表示 (憑依追跡 / 恋人・悲恋持ちなら処理委託)
  if(! is_array($target) || $this->GetActor()->IsRole('lovers', 'sweet_status')) return;
  $lovers = array();
  foreach($target as $id) $lovers[] = $USERS->GetHandleName($USERS->ById($id)->uname, true);
  OutputPartner($lovers, 'partner_header', 'lovers_footer');
}
<span>
function OutputAction(){ $this->filter->OutputAction(); }

function IsVote(){ global $ROOM; return $ROOM->date == 1; }</span>
</pre>

<h2 id="ver150b14">Ver. 1.5.0 β14</h2>
<h3>include/role/resurrect_mania.php % 14行目付近 (2011/10/24 (Mon) 22:06)</h3>
<pre>
× if($this->IsResurrect() && $this->IsLivePartner() &&
○ if($this->IsResurrect(<span>$this->GetActor()</span>) && $this->IsLivePartner() &&
</pre>

<h3>include/role/mania.php % 40行目付近 (2011/10/24 (Mon) 22:26)</h3>
<pre>
× if(! $this->delay_copy) $actor->AddRole($this-><span>copied</span>);
○ if(! $this->delay_copy) $actor->AddRole($this-><span>GetCopiedRole()</span>);
</pre>

<h3>include/role/mania.php % 56行目付近 (2011/10/24 (Mon) 22:26)</h3>
<h4>[before]</h4>
<pre>
function GetCopyRole($user){ return $user->main_role; }
</pre>
<h4>[after]</h4>
<pre>
function GetCopyRole($user){ return $user->main_role; }

<span>function GetCopiedRole(){ return $this->copied; }</span>
</pre>

<h3>include/role/unknown_mania.php % 10行目付近 (2011/10/24 (Mon) 22:26)</h3>
<h4>[before]</h4>
<pre>
function __construct(){
  parent::__construct();
  <span>$this->copied = $this->GetActor()->GetID('mind_friend');</span>
}
</pre>
<h4>[after]</h4>
<pre>
function __construct(){ parent::__construct(); }

<span>function GetCopiedRole(){ return $this->GetActor()->GetID('mind_friend'); }</span>
</pre>

<h3>include/role/autumn_fairy.php % 9行目付近 (2011/10/24 (Mon) 22:49)</h3>
<pre>
× public $bad_sta<span>ut</span>s = '秋ですよー';
○ public $bad_sta<span>tu</span>s = '秋ですよー';
</pre>

<h3>include/role/winter_fairy.php % 9行目付近 (2011/10/24 (Mon) 22:49)</h3>
<pre>
× public $bad_sta<span>ut</span>s = '冬ですよー';
○ public $bad_sta<span>tu</span>s = '冬ですよー';
</pre>

<h3>include/role/sex_wolf.php % 21行目付近 (2011/10/25 (Tue) 20:50)</h3>
<pre>
× $str = $this-><span>GetActor()</span>->GetHandleName($user->uname, $this->DistinguishSex($user));
○ $str = $this-><span>GetWolfVoter()</span>->GetHandleName($user->uname, $this->DistinguishSex($user));
</pre>

<h3>include/role/assassin.php % 56行目付近 (2011/10/25 (Tue) 22:23)</h3>
<h4>[before]</h4>
<pre>
$this->Assassin($user);
</pre>
<h4>[after]</h4>
<pre>
$class = $this->GetClass($method = 'Assassin');
$class->$method($user);
</pre>

<h2 id="ver150b13">Ver. 1.5.0 β13</h2>
<h3>include/role/resurrect_mania.php % 15行目付近 (2011/10/16 (Sun) 21:19)</h3>
<pre>
× mt_rand(1, 100) <= $ROOM->IsEvent('full_revive') ? 100 : 40){
○ mt_rand(1, 100) <= <span>(</span>$ROOM->IsEvent('full_revive') ? 100 : 40)<span>)</span>{
</pre>

<h3>room_manager.php % 10行目付近 (2011/10/17 (Mon) 21:02)</h3>
<pre>
× $INIT_CONF->LoadClass('USER_ICON', 'TWITTER');
○ $INIT_CONF->LoadClass('USER_ICON', <span>'MESSAGE', </span>'TWITTER');
</pre>

<h3>include/role/poison_cat.php % 75行目付近 (2011/10/18 (Tue) 21:14)</h3>
<pre>
× $ROOM->SystemMessage(<span>$this->GetActor()->handle_name</span>, 'REVIVE_FAILED');
○ $ROOM->SystemMessage(<span>$USERS->GetHandleName($user->uname)</span>, 'REVIVE_FAILED');
</pre>

<h3>include/role/priest.php % 62行目付近 (2011/10/19 (Wed) 03:19)</h3>
<h4>[before]</h4>
<pre>
$role = ($ROOM->date % 2) == 1 ? 'priest' : 'bishop_priest';
</pre>
<h4>[after]</h4>
<pre>
$role = ($ROOM->date % 2) == 1 ? 'priest' : 'bishop_priest';
<span>$type = ($ROOM->date % 2) == 1 ? 'human_side' : 'dead';</span>
</pre>

<h3>include/room_class.php % 31行目付近 (2011/10/20 (Thu) 01:00)</h3>
<h4>[before]</h4>
<pre>
<span>$this->event = new StdClass();</span>
$stack = $this->LoadRoom($request->room_no);
</pre>
<h4>[after]</h4>
<pre>
$stack = $this->LoadRoom($request->room_no);
</pre>

<h2 id="ver150b12">Ver. 1.5.0 β12</h2>
<h3>include/role/role_class.php % 217行目付近 (2011/09/26 (Mon) 04:07)</h3>
<h4>[before]</h4>
<pre>
  function __construct(){
    $this->role = array_pop(explode('Role_', get_class($this)));
    if(isset($this->mix_in)) $this->LoadMix($this->mix_in);
  }
</pre>
<h4>[after]</h4>
<pre>
  function __construct(){
    $this->role = array_pop(explode('Role_', get_class($this)));
    if(isset($this->mix_in)) $this->LoadMix($this->mix_in);
  }
<span>
  function __call($name, $args){
    return call_user_func_array(array($this->filter, $name), $args);
  }</span>
</pre>

<h3>include/game_vote_functions.php % 2433行目付近 (2011/09/26 (Mon) 19:25)</h3>
<h4>[before]</h4>
<pre>
<span>PrintData($target->uname);</span>
$target->ReturnPossessed('possessed');
<span>#$USERS->ByReal($target->user_no)->ReturnPossessed('possessed_target');</span>
</pre>
<h4>[after]</h4>
<pre>
$target->ReturnPossessed('possessed');
</pre>

<h3>include/role/priest.php % 58行目付近 (2011/09/29 (Thu) 03:20)</h3>
<pre>
× $flag = $ROOM->date > <span>3</span> && ($ROOM->date % 2) == 0;
○ $flag = $ROOM->date > <span>1</span> && ($ROOM->date % 2) == 0;
</pre>

<h2 id="ver150b11">Ver. 1.5.0 β11</h2>
<h3>room_manager.php % 265行目付近 (2011/08/27 (Sat) 05:20)</h3>
<h4>[before]</h4>
<pre>
  break;
}
</pre>
<h4>[after]</h4>
<pre>
  break;
<span>
default:
  continue 3;</span>
}
</pre>

<h3>include/game_vote_functions.php % 2638行目付近 (2011/08/30 (Tue) 16:56)</h3>
<h4>[before]</h4>
<pre>
foreach($ROOM->vote as <span>$stack</span>){
 if($user->IsSame($stack['target_uname'])) $count++;
}
</pre>
<h4>[after]</h4>
<pre>
foreach($ROOM->vote as <span>$vote_stack</span>){
  <span>foreach($vote_stack as $stack){</span>
    if($user->IsSame($stack['target_uname'])) $count++;
  <span>}</span>
}
</pre>

<h3>include/role/power_yaksa.php % 8行目付近 (2011/09/23 (Fri) 01:13)</h3>
<h4>[before]</h4>
<pre>
class Role_power_yaksa extends <span>Role</span>{
</pre>
<h4>[after]</h4>
<pre>
<span>RoleManager::LoadFile('yaksa');</span>
class Role_power_yaksa extends <span>Role_yaksa</span>{
</pre>

<h2 id="ver150b9">Ver. 1.5.0 β9</h2>
<h3>room_manager.php % 250行目付近 (2011/08/11 (Thu) 13:19)</h3>
<h4>[before]</h4>
<pre>
case 'chaos_open_cast':
  <span>if(! $ROOM_CONF->$option) continue 2;</span>
  switch($target = $_POST[$option]){
  case 'full':
    <span>break 2</span>;

  case 'camp':
  case 'role':
    <span>if($ROOM_CONF->{'_' . $target}){</span>
      $option .= '_' . $target;
      <span>break 2</span>;
    <span>}</span>
  }
  continue 2;
</pre>
<h4>[after]</h4>
<pre>
case 'chaos_open_cast':
  switch($target = $_POST[$option]){
  case 'full':
    <span>break</span>;

  case 'camp':
  case 'role':
    $option .= '_' . $target;
    <span>break</span>;
  }
  <span>if($ROOM_CONF->$option) break;</span>
  continue 2;
</pre>

<h3>include/role/duelist.php % 11行目付近 (2011/08/14 (Sun) 00:59)</h3>
<pre>
× $role = $this->GetActor()->GetID('rival')
○ $role = $this->GetActor()->GetID('rival')<span>;</span>
</pre>

<h2 id="ver150b6">Ver. 1.5.0 β6</h2>
<h3>include/game_play_functions.php % 651行目付近 (2011/07/12 (Tue) 03:41)</h3>
<h4>[before]</h4>
<pre>
<span>}</span>
OutputPartner($stack, 'partner_header', 'lovers_footer');
</pre>
<h4>[after]</h4>
<pre>
  OutputPartner($stack, 'partner_header', 'lovers_footer');
<span>}</span>
</pre>

<h2 id="ver150b5">Ver. 1.5.0 β5</h2>
<h3>include/game_play_functions.php % 332行目付近 (2011/06/29 (Wed) 00:21)</h3>
<h4>[before]</h4>
<pre>
  <span>if($user->IsWolf(true)) $stack[] = $USERS->GetHandleName($user->uname, true);</span>
}
OutputPartner(<span>$stack</span>, 'wolf_partner');
</pre>
<h4>[after]</h4>
<pre>
}
OutputPartner(<span>$stack['wolf']</span>, 'wolf_partner');
</pre>
<h3>include/role/mind_scanner.php % 8行目付近 (2011/07/01 (Fri) 01:42)</h3>
<pre>
× public $mind_role = 'mind_<span>role</span>';
○ public $mind_role = 'mind_<span>read</span>';
</pre>

<h2 id="ver150b1">Ver. 1.5.0 β1</h2>
<h3>include/game_vote_functions.php % 1640行目付近 (2011/05/19 (Thu) 02:55)</h3>
<pre>
× break;
○ break <span>2</span>;
</pre>

<h2 id="ver150a7">Ver. 1.5.0 α7</h2>
<h3>include/role/betray_yaksa.php % 12行目付近 (2011/04/11 (Mon) 00:16)</h3>
<pre>
× function Ignored($user){ return ! <span>$target</span>->IsCamp('chiroptera', true); }
○ function Ignored($user){ return ! <span>$user</span>->IsCamp('chiroptera', true); }
</pre>

<h2 id="ver150a5">Ver. 1.5.0 α5</h2>
<h3>include/game_functions.php % 185行目付近 (2011/03/10 (Thu) 23:51)</h3>
<pre>
× return GetSelfVoteNight($situation, $not_situation) <span>> 0</span>;
○ return GetSelfVoteNight($situation, $not_situation) <span>!== false</span>;
</pre>

<h3>include/game_functions.php % 168行目付近 (2011/03/11 (Fri) 00:43)</h3>
<pre>
× $query = $ROOM->GetQueryHeader('vote', '<span>uname</span>') . ' AND ';
○ $query = $ROOM->GetQueryHeader('vote', '<span>target_uname</span>')<span> . ' AND date = ' . $ROOM->date</span> . ' AND ';
</pre>

<h2 id="ver150a4">Ver. 1.5.0 α4</h2>
<h3>include/game_vote_functions.php % 2648行目付近 (2011/02/24 (Thu) 08:24)</h3>
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
<h3>include/game_vote_functions.php % 2103行目付近 (2011/02/25 (Fri) 02:54)</h3>
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

<h2 id="ver150a3">Ver. 1.5.0 α3</h2>
<h3>include/game_vote_functions.php % 1527行目付近 (2011/02/07 (Mon) 22:22)</h3>
<h4>[before]</h4>
<pre>
if($user->IsRole('dummy_guard')){ //夢守人は罠無効
  if($ROOM->IsEvent('no_dream')) continue; //熱帯夜ならスキップ
  $dummy_guard_target_list[$user->uname] = $target_uname;
}
</pre>
<h4>[after]</h4>
<pre>
if($user->IsRole('dummy_guard')){ //夢守人は罠無効
  if($ROOM->IsEvent('no_dream')) continue; //熱帯夜ならスキップ
  $dummy_guard_target_list[$user->uname] = $target_uname;
  <span>continue;</span>
}
</pre>

<h2 id="ver150a2">Ver. 1.5.0 α2</h2>
<h3>include/game_vote_functions.php % 2247行目付近 (2011/01/24 (Mon) 02:14)</h3>
<pre>
× if($user->IsRole('emerald_fox') || $user->IsRoleGroup('fairy')) continue;
○ if($user->IsRole('emerald_fox') || $user->IsRoleGroup('fairy')<span> || $wizard_target_list[$uname] == 'light_fairy'</span>) continue;
</pre>
</body></html>
