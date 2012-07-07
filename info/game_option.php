<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
$INIT_CONF->LoadClass('ROLE_DATA', 'CAST_CONF', 'GAME_OPT_CAPT');

//-- 関数定義 --//
//追加役職の人数と説明ページリンク出力
function OutputAddRole($role, $add = false){
  global $ROLE_DATA, $CAST_CONF;
  echo '村の人口が' . $CAST_CONF->$role . '人以上になったら' .
    $ROLE_DATA->GenerateRoleLink($role) . ($add ? 'を追加' : 'が登場') . 'します';
}

//お祭り村の配役リスト出力
function OutputFestivalList(){
  global $ROLE_DATA, $CAST_CONF;

  $stack  = $CAST_CONF->festival_role_list;
  $format = '%' . strlen(max(array_keys($stack))) . 's人：';
  $str    = '<pre>'."\n";
  ksort($stack); //人数順に並び替え
  foreach($stack as $count => $list){
    $order_stack = array();
    foreach($ROLE_DATA->SortRole(array_keys($list)) as $role){ //役職順に並び替え
      $order_stack[] = $ROLE_DATA->main_role_list[$role] . $list[$role];
    }
    $str .= sprintf($format, $count) . implode('　', $order_stack) . "\n";
  }
  echo $str . '</pre>'."\n";
}

//村人置換系オプションのサーバ設定出力
function OutputReplaceRole($option){
  global $ROLE_DATA, $CAST_CONF;
  echo 'は管理人がカスタムすることを前提にしたオプションです<br>現在の初期設定は全員' .
    $ROLE_DATA->GenerateRoleLink($CAST_CONF->replace_role_list[$option]) . 'になります';
}

//-- 表示 --//
OutputInfoPageHeader('ゲームオプション');
?>
<p>
<a href="#basic_option">基本</a>
<a href="#dummy_boy_option">身代わり君</a>
<a href="#open_cast_option">霊界公開</a>
<a href="#add_role_option">追加役職</a>
<a href="#special_option">特殊村</a>
<a href="#special_role_option">特殊配役</a>
</p>

<h2 id="basic_option">基本設定</h2>
<p>
<a href="#wish_role"><?php echo $GAME_OPT_MESS->wish_role ?></a>
<a href="#real_time"><?php echo $GAME_OPT_MESS->real_time ?></a>
<a href="#wait_morning"><?php echo $GAME_OPT_MESS->wait_morning ?></a>
<a href="#open_vote"><?php echo $GAME_OPT_MESS->open_vote ?></a>
<a href="#seal_message"><?php echo $GAME_OPT_MESS->seal_message ?></a>
<a href="#open_day"><?php echo $GAME_OPT_MESS->open_day ?></a>
</p>

<h3 id="wish_role"><?php echo $GAME_OPT_MESS->wish_role ?></h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->wish_role ?></li>
<li>村人登録 (プレイヤー登録) の際になりたい役職を選択することができます</li>
<li>オプションの組み合わせによって希望できる役職の数や種類が違います</li>
</ul>

<h3 id="real_time"><?php echo $GAME_OPT_MESS->real_time ?></h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->real_time ?></li>
<li>昼と夜を個別に設定できます → <a href="script_info.php#difference_real_time">初期設定</a></li>
</ul>

<h3 id="wait_morning"><?php echo $GAME_OPT_MESS->wait_morning ?> [Ver. 1.4.0 β17～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->wait_morning ?> → <a href="script_info.php#difference_wait_morning">待機時間設定</a></li>
<li>発言が制限されている間は画面の上方に「待機時間中です」という趣旨のメッセージが表示されます</li>
</ul>

<h3 id="open_vote"><?php echo $GAME_OPT_MESS->open_vote ?></h3>
<ul>
<li>昼の処刑投票数が公開されます</li>
<li><?php echo $GAME_OPT_CAPT->open_vote ?></li>
</ul>

<h3 id="seal_message"><?php echo $GAME_OPT_MESS->seal_message ?> [Ver. 1.5.0 β12～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->seal_message ?></li>
<li>対象となるのは以下です
  <ul>
    <li><a href="new_role/human.php#voodoo_killer">陰陽師</a>の解呪成功</li>
    <li><a href="new_role/human.php#guard_hunt">狩り</a>成功</li>
    <li><a href="new_role/human.php#anti_voodoo">厄神</a>の厄払い成功</li>
    <li><a href="new_role/wolf.php#sharp_wolf">鋭狼</a>の襲撃回避</li>
    <li><a href="new_role/fox.php">妖狐</a>への人狼襲撃</li>
    <li><a href="new_role/ability.php#guard">護衛能力者</a>の護衛成功</li>
    <li><a href="new_role/ability.php#revive_other">蘇生能力者</a>の蘇生結果</li>
  </ul>
</li>
</ul>

<h3 id="open_day"><?php echo $GAME_OPT_MESS->open_day ?> [Ver. 1.4.0 β12～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->open_day ?></li>
<li>自分の役職は分かりますが1日目昼は投票できません</li>
<li>制限時間を過ぎたら自動で夜に切り替わります (通常のゲーム開始相当)</li>
</ul>


<h2 id="dummy_boy_option">身代わり君設定</h2>
<p>
<a href="#dummy_boy"><?php echo $GAME_OPT_MESS->dummy_boy ?></a>
<a href="#gm_login"><?php echo $GAME_OPT_MESS->gm_login ?></a>
<a href="#gerd"><?php echo $GAME_OPT_MESS->gerd ?></a>
</p>

<h3 id="dummy_boy"><?php echo $GAME_OPT_MESS->dummy_boy ?></h3>
<ul>
<li>初日の夜、身代わり君が狼に食べられます</li>
<li><a href="script_info.php#difference_dummy_boy">身代わり君がなれる役職</a>には制限があります</li>
<li>身代わり君は、基本的には能力は発動しません</li>
</ul>

<h3 id="gm_login"><?php echo $GAME_OPT_MESS->gm_login ?> [Ver. 1.4.0 α18～]</h3>
<ul>
<li>仮想 GM が身代わり君としてログインします → <a href="spec.php#dummy_boy">仕様</a></li>
<li>村を作成する際にログインパスワードの入力が必要です</li>
<li>身代わり君のユーザ名は「dummy_boy」です</li>
</ul>

<h3 id="gerd"><?php echo $GAME_OPT_MESS->gerd ?> [Ver. 1.4.0 β12～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->gerd ?></li>
<li><a href="#chaos"><?php echo $GAME_OPT_MESS->chaos ?></a>の固定配役に村人を一人追加します</li>
<li><a href="#replace_human"><?php echo $GAME_OPT_MESS->replace_human ?></a>オプションが付いていても村人を一人確保します</li>
<li><a href="#duel"><?php echo $GAME_OPT_MESS->duel ?></a>・<a href="#festival"><?php echo $GAME_OPT_MESS->festival ?></a>の配役は入れ替えません (最初から存在する場合のみ有効)</li>
</ul>


<h2 id="open_cast_option">霊界公開設定</h2>
<p>
<a href="#open_cast">常時霊界公開</a>
<a href="#not_open_cast"><?php echo $GAME_OPT_MESS->not_open_cast ?></a>
<a href="#auto_open_cast"><?php echo $GAME_OPT_MESS->auto_open_cast ?></a>
</p>

<h3 id="open_cast">常時霊界公開</h3>
<ul>
<li>常に霊界で配役が公開されます</li>
<li>蘇生能力は無効になります</li>
<li>システム的にはこれが初期設定です (アイコン表示はありません)</li>
</ul>

<h3 id="not_open_cast"><?php echo $GAME_OPT_MESS->not_open_cast ?></h3>
<ul>
<li>誰がどの役職なのかゲーム終了まで公開されません</li>
<li>蘇生能力は有効になります</li>
<li><a href="spec.php#dummy_boy">身代わり君</a>が<a href="spec.php#revive_refuse">蘇生辞退</a>すると<a href="#auto_open_cast"><?php echo $GAME_OPT_MESS->auto_open_cast ?></a>相当になります。
</ul>
<h4>Ver. 1.5.0 β14～</h4>
<pre>
身代わり君の蘇生辞退で自動公開モード相当に移行。
</pre>

<h3 id="auto_open_cast"><?php echo $GAME_OPT_MESS->auto_open_cast ?> [Ver. 1.4.0 β3～]</h3>
<ul>
<li>蘇生能力者などが能力を持っている間だけ霊界が非公開になります</li>
<li>非公開中の霊界モードには「隠蔽中」という趣旨のメッセージが画面に表示されます</li>
</ul>
<h4>Ver. 1.5.0 β6～</h4>
<pre>
非公開中の霊界モードには「隠蔽中」という趣旨のメッセージが画面に表示されます
</pre>


<h2 id="add_role_option">追加役職設定</h2>
<ul>
<li>置換元の役職が足りない場合は出現しないことがあります。<br>
(例：村人1の場合、<a href="#poison"><?php echo $GAME_OPT_MESS->poison ?></a>は適用されない)</li>
</ul>
<p>
<a href="#poison"><?php echo $GAME_OPT_MESS->poison ?></a>
<a href="#assassin"><?php echo $GAME_OPT_MESS->assassin ?></a>
<a href="#wolf"><?php echo $GAME_OPT_MESS->wolf ?></a>
<a href="#boss_wolf"><?php echo $GAME_OPT_MESS->boss_wolf ?></a>
<a href="#poison_wolf"><?php echo $GAME_OPT_MESS->poison_wolf ?></a>
<a href="#possessed_wolf"><?php echo $GAME_OPT_MESS->possessed_wolf ?></a>
<a href="#sirius_wolf"><?php echo $GAME_OPT_MESS->sirius_wolf ?></a>
<a href="#fox"><?php echo $GAME_OPT_MESS->fox ?></a>
</p>
<p>
<a href="#child_fox"><?php echo $GAME_OPT_MESS->child_fox ?></a>
<a href="#cupid"><?php echo $GAME_OPT_MESS->cupid ?></a>
<a href="#medium"><?php echo $GAME_OPT_MESS->medium ?></a>
<a href="#mania"><?php echo $GAME_OPT_MESS->mania ?></a>
<a href="#decide"><?php echo $GAME_OPT_MESS->decide ?></a>
<a href="#authority"><?php echo $GAME_OPT_MESS->authority ?></a>
</p>

<h3 id="poison"><?php echo $GAME_OPT_MESS->poison ?></h3>
<ul>
<li><?php OutputAddRole('poison') ?></li>
<li><?php echo $GAME_OPT_CAPT->poison ?></li>
</ul>

<h3 id="assassin"><?php echo $GAME_OPT_MESS->assassin ?> [Ver. 1.4.0 β4～]</h3>
<ul>
<li><?php OutputAddRole('assassin') ?></li>
<li><?php echo $GAME_OPT_CAPT->assassin ?></li>
</ul>

<h3 id="wolf"><?php echo $GAME_OPT_MESS->wolf ?> [Ver. 1.5.0 β14～]</h3>
<ul>
<li><?php OutputAddRole('wolf', true) ?></li>
<li><?php echo $GAME_OPT_CAPT->wolf ?></li>
</ul>

<h3 id="boss_wolf"><?php echo $GAME_OPT_MESS->boss_wolf ?> [Ver. 1.4.0 α3-7～]</h3>
<ul>
<li><?php OutputAddRole('boss_wolf') ?></li>
<li><?php echo $GAME_OPT_CAPT->boss_wolf ?></li>
</ul>

<h3 id="poison_wolf"><?php echo $GAME_OPT_MESS->poison_wolf ?> [Ver. 1.4.0 α14～]</h3>
<ul>
<li><?php OutputAddRole('poison_wolf') ?></li>
<li><?php echo $GAME_OPT_CAPT->poison_wolf ?></li>
</ul>

<h3 id="possessed_wolf"><?php echo $GAME_OPT_MESS->possessed_wolf ?> [Ver. 1.4.0 β4～]</h3>
<ul>
<li><?php OutputAddRole('possessed_wolf') ?></li>
<li><?php echo $GAME_OPT_CAPT->possessed_wolf ?></li>
</ul>

<h3 id="sirius_wolf"><?php echo $GAME_OPT_MESS->sirius_wolf ?> [Ver. 1.4.0 β9～]</h3>
<ul>
<li><?php OutputAddRole('sirius_wolf') ?></li>
<li><?php echo $GAME_OPT_CAPT->sirius_wolf ?></li>
</ul>

<h3 id="fox"><?php echo $GAME_OPT_MESS->fox ?> [Ver. 1.5.0 β12～]</h3>
<ul>
<li><?php OutputAddRole('fox', true) ?></li>
<li><?php echo $GAME_OPT_CAPT->fox ?></li>
</ul>

<h3 id="child_fox"><?php echo $GAME_OPT_MESS->child_fox ?> [Ver. 1.5.0 β12～]</h3>
<ul>
<li><?php OutputAddRole('child_fox') ?></li>
<li><?php echo $GAME_OPT_CAPT->child_fox ?></li>
</ul>

<h3 id="cupid"><?php echo $GAME_OPT_MESS->cupid ?> [Ver. 1.2.0～]</h3>
<ul>
<li><?php OutputAddRole('cupid') ?></li>
<li><?php echo $GAME_OPT_CAPT->cupid ?></li>
</ul>
<h4>Ver. 1.4.0 β17～</h4>
<ul>
<li>「14人」の固定出現を廃止</li>
</ul>

<h3 id="medium"><?php echo $GAME_OPT_MESS->medium ?> [Ver. 1.4.0 α14～]</h3>
<ul>
<li><?php OutputAddRole('medium') ?></li>
<li><?php echo $GAME_OPT_CAPT->medium ?></li>
</ul>

<h3 id="mania"><?php echo $GAME_OPT_MESS->mania ?> [Ver. 1.4.0 α14～]</h3>
<ul>
<li><?php OutputAddRole('mania') ?></li>
<li><?php echo $GAME_OPT_CAPT->mania ?></li>
</ul>

<h3 id="decide"><?php echo $GAME_OPT_MESS->decide ?></h3>
<ul>
<li><?php OutputAddRole('decide') ?></li>
<li><?php echo $GAME_OPT_CAPT->decide ?></li>
<li>自分が決定者であることはわかりません</li>
</ul>

<h3 id="authority"><?php echo $GAME_OPT_MESS->authority ?></h3>
<ul>
<li><?php OutputAddRole('authority') ?></li>
<li><?php echo $GAME_OPT_CAPT->authority ?></li>
<li>自分が権力者であることはわかります</li>
</ul>


<h2 id="special_option">特殊村設定</h2>
<p>
<a href="#detective"><?php echo $GAME_OPT_MESS->detective ?></a>
<a href="#liar"><?php echo $GAME_OPT_MESS->liar ?></a>
<a href="#gentleman"><?php echo $GAME_OPT_MESS->gentleman ?></a>
<a href="#deep_sleep"><?php echo $GAME_OPT_MESS->deep_sleep ?></a>
<a href="#blinder"><?php echo $GAME_OPT_MESS->blinder ?></a>
<a href="#mind_open"><?php echo $GAME_OPT_MESS->mind_open ?></a>
<a href="#critical"><?php echo $GAME_OPT_MESS->critical ?></a>
<a href="#sudden_death"><?php echo $GAME_OPT_MESS->sudden_death ?></a>
<a href="#perverseness"><?php echo $GAME_OPT_MESS->perverseness ?></a>
</p>
<p>
<a href="#joker"><?php echo $GAME_OPT_MESS->joker ?></a>
<a href="#death_note"><?php echo $GAME_OPT_MESS->death_note ?></a>
<a href="#weather"><?php echo $GAME_OPT_MESS->weather ?></a>
<a href="#festival"><?php echo $GAME_OPT_MESS->festival ?></a>
</p>
<p>
<a href="#replace_human"><?php echo $GAME_OPT_MESS->replace_human ?></a>
<a href="#full_mad"><?php echo $GAME_OPT_MESS->full_mad ?></a>
<a href="#full_cupid"><?php echo $GAME_OPT_MESS->full_cupid ?></a>
<a href="#full_quiz"><?php echo $GAME_OPT_MESS->full_quiz ?></a>
<a href="#full_vampire"><?php echo $GAME_OPT_MESS->full_vampire ?></a>
<a href="#full_chiroptera"><?php echo $GAME_OPT_MESS->full_chiroptera ?></a>
<a href="#full_mania"><?php echo $GAME_OPT_MESS->full_mania ?></a>
<a href="#full_unknown_mania"><?php echo $GAME_OPT_MESS->full_unknown_mania ?></a>
<p>
<a href="#change_common"><?php echo $GAME_OPT_MESS->change_common ?></a>
<a href="#change_hermit_common"><?php echo $GAME_OPT_MESS->change_hermit_common ?></a>
<a href="#change_mad"><?php echo $GAME_OPT_MESS->change_mad ?></a>
<a href="#change_fanatic_mad"><?php echo $GAME_OPT_MESS->change_fanatic_mad ?></a>
<a href="#change_whisper_mad"><?php echo $GAME_OPT_MESS->change_whisper_mad ?></a>
<a href="#change_immolate_mad"><?php echo $GAME_OPT_MESS->change_immolate_mad ?></a>
</p>
<p>
<a href="#change_cupid"><?php echo $GAME_OPT_MESS->change_cupid ?></a>
<a href="#change_mind_cupid"><?php echo $GAME_OPT_MESS->change_mind_cupid ?></a>
<a href="#change_triangle_cupid"><?php echo $GAME_OPT_MESS->change_triangle_cupid ?></a>
<a href="#change_angel"><?php echo $GAME_OPT_MESS->change_angel ?></a>
</p>

<h3 id="detective"><?php echo $GAME_OPT_MESS->detective ?> [Ver. 1.4.0 β10～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->detective ?></li>
<li>普通村の場合は、共有者がいれば共有者を、いなければ村人を一人<a href="new_role/human.php#detective_common">探偵</a>に入れ替えます</li>
<li><a href="#chaos"><?php echo $GAME_OPT_MESS->chaos ?></a>の場合は固定枠に<a href="new_role/human.php#detective_common">探偵</a>が追加されます</li>
<li>このオプションを使用した場合は、身代わり君が<a href="new_role/human.php#detective_common">探偵</a>にはなりません</li>
<li>「<a href="#gm_login"><?php echo $GAME_OPT_MESS->gm_login ?></a>」+「<a href="#not_open_cast"><?php echo $GAME_OPT_MESS->not_open_cast ?></a>」オプションと併用すると「霊界探偵モード」になります</li>
<li>「霊界探偵モード」はゲーム開始直後に探偵が死亡して、霊界に移動します。指示は GM 経由で行います</li>
</ul>

<h3 id="liar"><?php echo $GAME_OPT_MESS->liar ?> [Ver. 1.4.0 α14～]</h3>
<ul>
<li>全ユーザに一定の確率 (70% 程度) で<a href="new_role/sub_role.php#liar">狼少年</a>がつきます</li>
</ul>

<h3 id="gentleman"><?php echo $GAME_OPT_MESS->gentleman ?> [Ver. 1.4.0 α14～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->gentleman ?></li>
<li><a href="new_role/sub_role.php#gentleman">紳士</a>・<a href="new_role/sub_role.php#lady">淑女</a>の発動率はランダム付加の場合と同じです</li>
<li><a href="#chaos"><?php echo $GAME_OPT_MESS->chaos ?></a>でランダムに付加される時は個々の性別を参照していません</li>
</ul>

<h3 id="deep_sleep"><?php echo $GAME_OPT_MESS->deep_sleep ?> [Ver. 1.4.0 β18～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->deep_sleep ?></li>
<li>観戦している人にも<a href="new_role/sub_role.php#deep_sleep">爆睡者</a>がつきます</li>
<li>結果として、<a href="new_role/human.php#common_group">共有者</a>を騙ることが可能になります</li>
</ul>

<h3 id="blinder"><?php echo $GAME_OPT_MESS->blinder ?> [Ver. 1.4.0 β18～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->blinder ?></li>
<li>観戦している人にも<a href="new_role/sub_role.php#blinder">目隠し</a>がつきます</li>
</ul>

<h3 id="mind_open"><?php echo $GAME_OPT_MESS->mind_open ?> [Ver. 1.4.0 β18～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->mind_open ?></li>
<li><a href="new_role/sub_role.php#mind_open">公開者</a>の影響で、観戦している人も夜の発言を見ることができます</li>
</ul>

<h3 id="critical"><?php echo $GAME_OPT_MESS->critical ?> [Ver. 1.4.0 β15～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->critical ?></li>
<li><a href="new_role/sub_role.php#critical_voter">会心</a>・<a href="new_role/sub_role.php#critical_luck">痛恨</a>の発動率はランダム付加の場合と同じです</li>
</ul>

<h3 id="sudden_death"><?php echo $GAME_OPT_MESS->sudden_death ?> [Ver. 1.4.0 α14～]</h3>
<ul>
<li>全ユーザに<a href="new_role/sub_role.php#chicken_group">小心者系</a>のどれかがつきます</li>
<li>配役制限がついているもの (例：<a href="new_role/sub_role.php#panelist">解答者</a>) はつきません</li>
<li><a href="new_role/sub_role.php#impatience">短気</a>がつくのは最大で一人です</li>
<li><a href="#perverseness"><?php echo $GAME_OPT_MESS->perverseness ?></a>と併用できません</li>
</ul>

<h3 id="perverseness"><?php echo $GAME_OPT_MESS->perverseness ?> [Ver. 1.4.0 α19～]</h3>
<ul>
<li>全ユーザに<a href="new_role/sub_role.php#perverseness">天の邪鬼</a>がつきます</li>
<li><a href="#sudden_death"><?php echo $GAME_OPT_MESS->sudden_death ?></a>と併用できません</li>
</ul>

<h3 id="joker"><?php echo $GAME_OPT_MESS->joker ?> [Ver. 1.4.0 β21～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->joker ?></li>
<li>ゲーム終了時に<a href="new_role/sub_role.php#joker">ジョーカー</a>を所持していると無条件で敗北になります</li>
</ul>

<h3 id="death_note"><?php echo $GAME_OPT_MESS->death_note ?> [Ver. 1.4.0 β21～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->death_note ?></li>
<li>毎日、夜→昼の処理終了時の生存者からランダムで一人に<a href="new_role/sub_role.php#death_note">デスノート</a>が配布されます</li>
<li>配布状況は配役公開状態の霊界からのみ見ることができます</li>
</ul>

<h3 id="weather"><?php echo $GAME_OPT_MESS->weather ?> [Ver. 1.5.0 α2～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->weather ?></li>
<li>発生するのは 3 の倍数の日です (3 → 6 → 9 → ...)</li>
<li>各天候の発生率は設定ファイルで変更できます</li>
<li>天候の詳細は専用ページを参照して下さい → <a href="weather.php">天候システム</a></li>
</ul>

<h3 id="festival"><?php echo $GAME_OPT_MESS->festival ?> [Ver. 1.4.0 β9～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->festival ?></li>
<li>初期設定では、以下に示す人数の範囲だけ、固定編成になります</li>
<li>編成の初期設定はバージョンアップ時に変更される事があります</li>
<li><a href="#replace_human"><?php echo $GAME_OPT_MESS->replace_human ?></a>・<a href="#special_role_option">特殊配役設定</a>は無効になります</li>
</ul>
<?php OutputFestivalList() ?>
<pre>
出展：
 9人：狩人村 (特殊F) ＠桃栗鯖
10人：逃亡者村 (特殊R) ＠桃栗鯖
13人：奴隷村＠世紀末鯖
14人：邪魔狂人村＠人狼天国鯖
15人：マインスイーパ村＠世紀末鯖
16人：囁き狂人村＠人狼 BBS C国
19人：猫又村＠わかめて鯖
20人：奴隷/狂信者/子狐村＠世紀末鯖
22人：バルサン村＠わかめて鯖
</pre>

<h3 id="replace_human"><?php echo $GAME_OPT_MESS->replace_human ?> [Ver. 1.4.0 β14～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->replace_human ?></li>
<li><a href="#full_mania"><?php echo $GAME_OPT_MESS->full_mania ?></a>を拡張して実装したオプションです</li>
<li>表記が村人となる役職が存在する事に注意してください</li>
<li>「<?php echo $GAME_OPT_MESS->replace_human ?>」<?php OutputReplaceRole('replace_human') ?></li>
</ul>

<h4 id="full_mad"><?php echo $GAME_OPT_MESS->full_mad ?> [Ver. 1.5.0 β10～]</h4>
<ul>
<li>村人が全員<a href="new_role/wolf.php#mad">狂人</a>になります</li>
<li><a href="#change_mad"><?php echo $GAME_OPT_MESS->change_mad ?></a>より先に処理されます</li>
</ul>

<h4 id="full_cupid"><?php echo $GAME_OPT_MESS->full_cupid ?> [Ver. 1.4.0 β14～]</h4>
<ul>
<li>村人が全員<a href="new_role/lovers.php#cupid">キューピッド</a>になります</li>
<li><a href="#change_cupid"><?php echo $GAME_OPT_MESS->change_cupid ?></a>より先に処理されます</li>
</ul>

<h4 id="full_quiz"><?php echo $GAME_OPT_MESS->full_quiz ?> [Ver. 1.5.0 β10～]</h4>
<ul>
<li>村人が全員<a href="new_role/quiz.php#quiz">出題者</a>になります</li>
</ul>

<h4 id="full_vampire"><?php echo $GAME_OPT_MESS->full_vampire ?> [Ver. 1.5.0 β10～]</h4>
<ul>
<li>村人が全員<a href="new_role/vampire.php#vampire">吸血鬼</a>になります</li>
</ul>

<h4 id="full_chiroptera"><?php echo $GAME_OPT_MESS->full_chiroptera ?> [Ver. 1.4.0 β14～]</h4>
<ul>
<li>村人が全員<a href="new_role/chiroptera.php#chiroptera">蝙蝠</a>になります</li>
</ul>

<h4 id="full_mania"><?php echo $GAME_OPT_MESS->full_mania ?> [Ver. 1.4.0 α17～]</h4>
<ul>
<li>村人が全員<a href="new_role/mania.php#mania">神話マニア</a>になります</li>
</ul>

<h4 id="full_unknown_mania"><?php echo $GAME_OPT_MESS->full_unknown_mania ?> [Ver. 1.5.0 β10～]</h4>
<ul>
<li>村人が全員<a href="new_role/mania.php#unknown_mania">鵺</a>になります</li>
</ul>

<h3 id="change_common"><?php echo $GAME_OPT_MESS->change_common ?> [Ver. 1.5.0 β10～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->change_common ?></li>
<li>「<?php echo $GAME_OPT_MESS->change_common ?>」<?php OutputReplaceRole('change_common') ?></li>
</ul>

<h3 id="change_hermit_common"><?php echo $GAME_OPT_MESS->change_hermit_common ?> [Ver. 1.5.0 β10～]</h3>
<ul>
<li>共有者が全員<a href="new_role/human.php#hermit_common">隠者</a>になります</li>
</ul>

<h3 id="change_mad"><?php echo $GAME_OPT_MESS->change_mad ?> [Ver. 1.5.0 β6～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->change_mad ?></li>
<li>「<?php echo $GAME_OPT_MESS->change_mad ?>」<?php OutputReplaceRole('change_mad') ?></li>
<li><a href="#full_mad"><?php echo $GAME_OPT_MESS->full_mad ?></a>の処理が先に適用されます</li>
</ul>

<h3 id="change_fanatic_mad"><?php echo $GAME_OPT_MESS->change_fanatic_mad ?> [Ver. 1.5.0 β6～]</h3>
<ul>
<li>狂人が全員<a href="new_role/wolf.php#fanatic_mad">狂信者</a>になります</li>
</ul>

<h3 id="change_whisper_mad"><?php echo $GAME_OPT_MESS->change_whisper_mad ?> [Ver. 1.5.0 β6～]</h3>
<ul>
<li>狂人が全員<a href="new_role/wolf.php#whisper_mad">囁き狂人</a>になります</li>
</ul>

<h3 id="change_immolate_mad"><?php echo $GAME_OPT_MESS->change_immolate_mad ?> [Ver. 1.5.0 β10～]</h3>
<ul>
<li>狂人が全員<a href="new_role/wolf.php#immolate_mad">殉教者</a>になります</li>
</ul>

<h3 id="change_cupid"><?php echo $GAME_OPT_MESS->change_cupid ?> [Ver. 1.5.0 β17～]</h3>
<ul>
<li><?php echo $GAME_OPT_CAPT->change_cupid ?></li>
<li>「<?php echo $GAME_OPT_MESS->change_cupid ?>」<?php OutputReplaceRole('change_cupid') ?></li>
<li><a href="#full_cupid"><?php echo $GAME_OPT_MESS->full_cupid ?></a>の処理が先に適用されます</li>
</ul>

<h3 id="change_mind_cupid"><?php echo $GAME_OPT_MESS->change_mind_cupid ?> [Ver. 1.5.0 β17～]</h3>
<ul>
<li>キューピッドが全員<a href="new_role/lovers.php#mind_cupid">女神</a>になります</li>
</ul>

<h3 id="change_triangle_cupid"><?php echo $GAME_OPT_MESS->change_triangle_cupid ?> [Ver. 1.5.0 β17～]</h3>
<ul>
<li>キューピッドが全員<a href="new_role/lovers.php#triangle_cupid">小悪魔</a>になります</li>
</ul>

<h3 id="change_angel"><?php echo $GAME_OPT_MESS->change_angel ?> [Ver. 1.5.0 β17～]</h3>
<ul>
<li>キューピッドが全員<a href="new_role/lovers.php#angel">天使</a>になります</li>
</ul>

<h2 id="special_role_option">特殊配役設定</h2>
<p>
<a href="#special_role"><?php echo $GAME_OPT_MESS->special_role ?></a>
<a href="#chaos"><?php echo $GAME_OPT_MESS->chaos ?></a>
<a href="#duel"><?php echo $GAME_OPT_MESS->duel ?></a>
<a href="#gray_random"><?php echo $GAME_OPT_MESS->gray_random ?></a>
<a href="#quiz"><?php echo $GAME_OPT_MESS->quiz ?></a>
</p>

<h3 id="special_role"><?php echo $GAME_OPT_MESS->special_role ?> [Ver. 1.4.0 β17～]</h3>
<ul>
<li>専用の配役テーブルを用いた特殊設定村です</li>
<li>詳細は個々のモードを参照してください</li>
</ul>

<h4 id="chaos"><?php echo $GAME_OPT_MESS->chaos ?> [Ver. 1.4.0 α1～]</h4>
<ul>
<li>専用ページを参照して下さい → <a href="chaos.php"><?php echo $GAME_OPT_MESS->chaos ?></a></li>
</ul>

<h4 id="duel"><?php echo $GAME_OPT_MESS->duel ?> [Ver. 1.4.0 α19～]</h4>
<ul>
  <li><a href="#open_cast_option">霊界公開設定オプション</a>の設定によって配役が変わります。初期設定は以下です</li>
  <ol>
    <li><a href="#open_cast">常時公開</a>：暗殺者ベース</li>
    <li><a href="#not_open_cast">非公開</a>：埋毒者ベース</li>
    <li><a href="#auto_open_cast">自動公開</a>：キューピッドベース</li>
  </ol>
</ul>

<h4 id="gray_random"><?php echo $GAME_OPT_MESS->gray_random ?> [Ver. 1.4.0 β17～]</h4>
<ul>
  <li>配役が基本職のみになります。初期設定は以下です。</li>
  <ol>
    <li>人狼系 → 人狼</li>
    <li>狂人系 → 狂人</li>
    <li>妖狐陣営 → 妖狐</li>
    <li>上記以外 → 村人</li>
  </ol>
</ul>

<h4 id="quiz"><?php echo $GAME_OPT_MESS->quiz ?> [Ver. 1.4.0 α2～]</h4>
<ul>
  <li>GM が<a href="new_role/quiz.php#quiz">出題者</a>になります</li>
  <li>村を作成する際に GM ログインパスワードの入力が必要です</li>
  <li>GM もゲーム開始投票をする必要があります</li>
  <li>出現役職は村人・共有者・人狼・狂人・妖狐です</li>
  <li>GM 以外の全員に<a href="new_role/sub_role.php#panelist">解答者</a>がつきます</li>
  <li>人狼は常時 GM しか狙えません</li>
  <li>GM は噛まれても殺されません</li>
  <li>以下のような使い方を想定しています</li>
  <ol>
    <li>GM がクイズを出題してゲーム開始</li>
    <li>人狼が適当なタイミングで GM を噛む</li>
    <li>夜が明けたらユーザが解答する</li>
    <li>全員解答したら GM が正解発表</li>
    <li>ユーザは不正解なら GM に投票、正解なら GM 以外に投票</li>
    <li>GM は正解者の中で一番解答が遅かった人に投票</li>
    <li>GM は日が暮れる前に次の問題を出題する</li>
    <li>以下、勝敗が決まるまで繰り返す</li>
  </ol>
</ul>
</body></html>
