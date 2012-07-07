<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
$INIT_CONF->LoadClass('GAME_OPT_CAPT');
OutputInfoPageHeader('闇鍋モード');
?>
<p>
<a href="#decide_role">配役決定ルーチン</a>
<a href="#wish_role"><?php echo $GAME_OPT_MESS->wish_role ?></a>
</p>
<p>
<a href="#chaos"><?php echo $GAME_OPT_MESS->chaos ?></a>
<a href="#chaosfull"><?php echo $GAME_OPT_MESS->chaosfull ?></a>
<a href="#chaos_hyper"><?php echo $GAME_OPT_MESS->chaos_hyper ?></a>
<a href="#chaos_verso"><?php echo $GAME_OPT_MESS->chaos_verso ?></a>
<a href="#chaos_old"><?php echo $GAME_OPT_MESS->chaos ?> (旧設定)</a>
</p>
<p>
<a href="#topping"><?php echo $GAME_OPT_MESS->topping ?></a>
<a href="#boost_rate"><?php echo $GAME_OPT_MESS->boost_rate ?></a>
<a href="#chaos_open_cast"><?php echo $GAME_OPT_MESS->chaos_open_cast ?></a>
</p>
<p>
<a href="#sub_role_limit"><?php echo $GAME_OPT_MESS->sub_role_limit ?></a>
<a href="#secret_sub_role"><?php echo $GAME_OPT_MESS->secret_sub_role ?></a>
</p>

<h2 id="decide_role">配役決定ルーチン</h2>
<ol>
  <li>バージョンアップで仕様が変わる可能性があります。</li>
  <li>ゲーム開始直後に勝敗が決まる可能性があります。</li>
  <li>設定ファイルで変更できるので具体的な数値はサーバ毎に違います。</li>
</ol>
<p>
<a href="#decide_role_fix">固定出現枠</a>
<a href="#decide_role_random">ランダム出現枠</a>
<a href="#decide_role_sub">サブ役職</a>
<a href="#decide_role_example">配役決定例</a>
</p>

<h3 id="decide_role_fix">固定出現枠</h3>
<pre>
初期設定は「占い師1・人狼1」で、各モード毎に個別に設定できます。
ただし、身代わり君が占い師になる可能性もあるので CO した占い師が真であるとは限りません。
<a href="#topping"><?php echo $GAME_OPT_MESS->topping ?></a>で追加できます。
</pre>

<h3 id="decide_role_random">ランダム出現枠</h3>
<ol>
  <li>各役職の出現率は基本的には非公開です。</li>

  <li>人狼と妖狐は人口に対する最小出現数が設定されています。<br>
    例) 人狼系は人口の 1/10 を最低限割り当てる
  </li>

  <li>役職グループ毎に人口に対する上限が設定されています。<br>
    例) 占い師系は 10%、人狼系は 20%
  </li>

  <li>ランダム出現で役職グループの上限を超えると村人に振り返られます。</li>

  <li>村人には人口に対する上限が設定されています。<br>
    上限を超えると特定の役職に振り返られます (初期設定は神話マニア)。
  </li>

  <li><a href="#boost_rate"><?php echo $GAME_OPT_MESS->boost_rate ?></a>の影響を受けます。</li>
</ol>

<h3 id="decide_role_sub">サブ役職</h3>
<ol>
  <li><a href="#sub_role_limit">サブ役職制限</a>に応じた種類の中からランダムに一人一つ配布されます。</li>
  <li>ランダム配布では同じサブ役職が複数の人に配布されることはありません。</li>
</ol>

<h3 id="decide_role_example">配役決定例</h3>
<ul>
  <li>人口：10人</li>

  <li>各役職の上限例 (実際とは数字が違います)</li>
  <ul>
    <li>占い師系：20%</li>
    <li>霊能者系：10%</li>
    <li>人狼系：20%</li>
  </ul>
</ul>

<pre>
1. 固定枠 (実際はサーバ毎に違います)
占い師1　霊能者1　人狼1

2. ランダム配役を加えた結果例
占い師2　精神鑑定士1　霊能者1　雲外鏡1　人狼1　白狼1　萌狼3

3. 上限補正
3-1. 数が多いところから優先的に削られます。
なるべく多くの種類が出現するようにするためです。

占い師系3 → 2
占い師1　精神鑑定士1　村人1

3-2. 固定枠は補正対象になりません。
霊能者系2 → 1
霊能者1　村人1

3-3. 同じ数でどちらかを削らないといけない場合はランダムです。
役職の出現率とは関係ありません。
人狼系5 → 2

人狼1 は固定なので補正対象外。つまり、白狼1と萌狼3から3削られます。
数が多いほうから削るので、萌狼-2は確定。
最後に萌狼1と白狼1からランダムでどちらかが削られます。

補正結果例
人狼1　白狼1　村人3
上限補正後の配役
村人5　占い師1　精神鑑定士1　霊能者1　人狼1　白狼1

4. 村人上限補正
「<a href="game_option.php#full_mania"><?php echo $GAME_OPT_MESS->full_mania ?></a>」のオプションが付いていない場合は
村人の上限を超えたら神話マニアに振り返られます。

村人の上限例　人口の10%
村人5 → 村人1　神話マニア4

5. 最終配役
村人1　占い師1　精神鑑定士1　霊能者1　人狼1　白狼1　神話マニア4
</pre>

<h2 id="wish_role"><?php echo $GAME_OPT_MESS->wish_role ?></h2>
<pre>
配役決定後、出現した役職グループを希望していれば優先的に配役される仕様です。
どんなオプションの組み合わせであっても、最終的になりたい役職を選ぶ必要があります。

例1) 占い師を希望して占い師・魂の占い師が出現した
→ 占い師か魂の占い師のどちらかになります

例2) 暗殺者を希望したが出現しなかった
→ 希望なしと同じ扱いになります

例3) 神話マニア村で村人を希望した
→ 村人系のどれかを希望した扱いになります
   (神話マニア希望とは判定されません)
</pre>

<h3>Ver. 1.4.0 α24～</h3>
<pre>
希望制オプションが有効になりました
</pre>

<h3>Ver. 1.4.0 α11～</h3>
<pre>
希望制オプションは強制的にオフになります
</pre>

<h2 id="chaos"><?php echo $GAME_OPT_MESS->chaos ?> [Ver. 1.4.0 α1～]</h2>
<h3 id="chaos_appear_role">出現役職</h3>
<pre>
出現する可能性のある役職は以下です。
</pre>
<p>
<a href="#chaos_human">村人陣営</a>
<a href="#chaos_wolf">人狼陣営</a>
<a href="#chaos_fox">妖狐陣営</a>
<a href="#chaos_lovers">恋人陣営</a>
<a href="#chaos_quiz">出題者陣営</a>
<a href="#chaos_chiroptera">蝙蝠陣営</a>
<a href="#chaos_mania">神話マニア陣営</a>
</p>

<h4 id="chaos_human"><a href="new_role/human.php">村人陣営</a></h4>
<pre>
<a href="new_role/human.php#human_group">村人系</a>：<a href="new_role/human.php#human">村人</a>
<a href="new_role/human.php#mage_group">占い師系</a>：<a href="new_role/human.php#mage">占い師</a>・<a href="new_role/human.php#soul_mage">魂の占い師</a>・<a href="new_role/human.php#psycho_mage">精神鑑定士</a>
<a href="new_role/human.php#necromancer_group">霊能者系</a>：<a href="new_role/human.php#necromancer">霊能者</a>
<a href="new_role/human.php#medium_group">巫女系</a>：<a href="new_role/human.php#medium">巫女</a>
<a href="new_role/human.php#guard_group">狩人系</a>：<a href="new_role/human.php#guard">狩人</a>・<a href="new_role/human.php#poison_guard">騎士</a>・<a href="new_role/human.php#reporter">ブン屋</a>
<a href="new_role/human.php#common_group">共有者系</a>：<a href="new_role/human.php#common">共有者</a>
<a href="new_role/human.php#poison_group">埋毒者系</a>：<a href="new_role/human.php#poison">埋毒者</a>・<a href="new_role/human.php#incubate_poison">潜毒者</a>
<a href="new_role/human.php#pharmacist_group">薬師系</a>：<a href="new_role/human.php#pharmacist">薬師</a>
<a href="new_role/human.php#assassin_group">暗殺者系</a>：<a href="new_role/human.php#assassin">暗殺者</a>
<a href="new_role/human.php#doll_group">上海人形系</a>：<a href="new_role/human.php#doll">上海人形</a>・<a href="new_role/human.php#doll_master">人形遣い</a>
<a href="new_role/human.php#escaper_group">逃亡者系</a>：<a href="new_role/human.php#escaper">逃亡者</a>
</pre>

<h4 id="chaos_wolf"><a href="new_role/wolf.php">人狼陣営</a></h4>
<pre>
<a href="new_role/wolf.php#wolf_group">人狼系</a>：<a href="new_role/wolf.php#wolf">人狼</a>・<a href="new_role/wolf.php#boss_wolf">白狼</a>・<a href="new_role/wolf.php#poison_wolf">毒狼</a>・<a href="new_role/wolf.php#tongue_wolf">舌禍狼</a>・<a href="new_role/wolf.php#silver_wolf">銀狼</a>
<a href="new_role/wolf.php#mad_group">狂人系</a>：<a href="new_role/wolf.php#mad">狂人</a>・<a href="new_role/wolf.php#fanatic_mad">狂信者</a>・<a href="new_role/wolf.php#whisper_mad">囁き狂人</a>
</pre>

<h4 id="chaos_fox"><a href="new_role/fox.php">妖狐陣営</a></h4>
<pre>
<a href="new_role/fox.php#fox_group">妖狐系</a>：<a href="new_role/fox.php#fox">妖狐</a>
<a href="new_role/fox.php#child_fox_group">子狐系</a>：<a href="new_role/fox.php#child_fox">子狐</a>
</pre>

<h4 id="chaos_lovers"><a href="new_role/lovers.php">恋人陣営</a></h4>
<pre>
<a href="new_role/lovers.php#cupid_group">キューピッド系</a>：<a href="new_role/lovers.php#cupid">キューピッド</a>・<a href="new_role/lovers.php#self_cupid">求愛者</a>
</pre>

<h4 id="chaos_quiz"><a href="new_role/quiz.php">出題者陣営</a></h4>
<pre>
<a href="new_role/quiz.php#quiz_group">出題者系</a>：<a href="new_role/quiz.php#quiz">出題者</a>
</pre>

<h4 id="chaos_chiroptera"><a href="new_role/chiroptera.php">蝙蝠陣営</a></h4>
<pre>
<a href="new_role/chiroptera.php#chiroptera_group">蝙蝠系</a>：<a href="new_role/chiroptera.php#chiroptera">蝙蝠</a>
</pre>

<h4 id="chaos_mania"><a href="new_role/mania.php">神話マニア陣営</a></h4>
<pre>
<a href="new_role/mania.php#mania_group">神話マニア系</a>：<a href="new_role/mania.php#mania">神話マニア</a>
</pre>

<h5>Ver. 1.4.0 β12～</h5>
<pre>
配役ルーチンを変更
</pre>

<h2 id="chaosfull"><?php echo $GAME_OPT_MESS->chaosfull ?> [Ver. 1.4.0 α1～]</h2>
<h3 id="chaosfull_appear_role">出現役職</h3>
<pre>
出現する可能性のある役職は以下 (Ver. 1.4.0 α23 相当) です。
</pre>
<p>
<a href="#chaosfull_human">村人陣営</a>
<a href="#chaosfull_wolf">人狼陣営</a>
<a href="#chaosfull_fox">妖狐陣営</a>
<a href="#chaosfull_lovers">恋人陣営</a>
<a href="#chaosfull_quiz">出題者陣営</a>
<a href="#chaosfull_chiroptera">蝙蝠陣営</a>
<a href="#chaosfull_mania">神話マニア陣営</a>
</p>

<h4 id="chaosfull_human"><a href="new_role/human.php">村人陣営</a></h4>
<pre>
<a href="new_role/human.php#human_group">村人系</a>：<a href="new_role/human.php#human">村人</a>・<a href="new_role/human.php#suspect">不審者</a>・<a href="new_role/human.php#unconscious">無意識</a>
<a href="new_role/human.php#mage_group">占い師系</a>：<a href="new_role/human.php#mage">占い師</a>・<a href="new_role/human.php#soul_mage">魂の占い師</a>・<a href="new_role/human.php#psycho_mage">精神鑑定士</a>・<a href="new_role/human.php#sex_mage">ひよこ鑑定士</a>・<a href="new_role/human.php#voodoo_killer">陰陽師</a>・<a href="new_role/human.php#dummy_mage">夢見人</a>
<a href="new_role/human.php#necromancer_group">霊能者系</a>：<a href="new_role/human.php#necromancer">霊能者</a>・<a href="new_role/human.php#soul_necromancer">雲外鏡</a>・<a href="new_role/human.php#yama_necromancer">閻魔</a>・<a href="new_role/human.php#dummy_necromancer">夢枕人</a>
<a href="new_role/human.php#medium_group">巫女系</a>：<a href="new_role/human.php#medium">巫女</a>
<a href="new_role/human.php#guard_group">狩人系</a>：<a href="new_role/human.php#guard">狩人</a>・<a href="new_role/human.php#poison_guard">騎士</a>・<a href="new_role/human.php#reporter">ブン屋</a>・<a href="new_role/human.php#anti_voodoo">厄神</a>・<a href="new_role/human.php#dummy_guard">夢守人</a>
<a href="new_role/human.php#common_group">共有者系</a>：<a href="new_role/human.php#common">共有者</a>・<a href="new_role/human.php#dummy_common">夢共有者</a>
<a href="new_role/human.php#poison_group">埋毒者系</a>：<a href="new_role/human.php#poison">埋毒者</a>・<a href="new_role/human.php#strong_poison">強毒者</a>・<a href="new_role/human.php#incubate_poison">潜毒者</a>・<a href="new_role/human.php#dummy_poison">夢毒者</a>
<a href="new_role/human.php#poison_cat_group">猫又系</a>：<a href="new_role/human.php#poison_cat">猫又</a>
<a href="new_role/human.php#pharmacist_group">薬師系</a>：<a href="new_role/human.php#pharmacist">薬師</a>
<a href="new_role/human.php#assassin_group">暗殺者系</a>：<a href="new_role/human.php#assassin">暗殺者</a>
<a href="new_role/human.php#mind_scanner_group">さとり系</a>：<a href="new_role/human.php#mind_scanner">さとり</a>
<a href="new_role/human.php#jealousy_group">橋姫系</a>：<a href="new_role/human.php#jealousy">橋姫</a>
</pre>

<h4 id="chaosfull_wolf"><a href="new_role/wolf.php">人狼陣営</a></h4>
<pre>
<a href="new_role/wolf.php#wolf_group">人狼系</a>：<a href="new_role/wolf.php#wolf">人狼</a>・<a href="new_role/wolf.php#boss_wolf">白狼</a>・<a href="new_role/wolf.php#cursed_wolf">呪狼</a>・<a href="new_role/wolf.php#poison_wolf">毒狼</a>・<a href="new_role/wolf.php#resist_wolf">抗毒狼</a>・<a href="new_role/wolf.php#tongue_wolf">舌禍狼</a>・<a href="new_role/wolf.php#cute_wolf">萌狼</a>・<a href="new_role/wolf.php#silver_wolf">銀狼</a>
<a href="new_role/wolf.php#mad_group">狂人系</a>：<a href="new_role/wolf.php#mad">狂人</a>・<a href="new_role/wolf.php#fanatic_mad">狂信者</a>・<a href="new_role/wolf.php#whisper_mad">囁き狂人</a>・<a href="new_role/wolf.php#jammer_mad">月兎</a>・<a href="new_role/wolf.php#voodoo_mad">呪術師</a>・<a href="new_role/wolf.php#dream_eater_mad">獏</a>・<a href="new_role/wolf.php#trap_mad">罠師</a>・<a href="new_role/wolf.php#corpse_courier_mad">火車</a>
</pre>

<h4 id="chaosfull_fox"><a href="new_role/fox.php">妖狐陣営</a></h4>
<pre>
<a href="new_role/fox.php#fox_group">妖狐系</a>：<a href="new_role/fox.php#fox">妖狐</a>・<a href="new_role/fox.php#white_fox">白狐</a>・<a href="new_role/fox.php#poison_fox">管狐</a>・<a href="new_role/fox.php#voodoo_fox">九尾</a>・<a href="new_role/fox.php#cursed_fox">天狐</a>・<a href="new_role/fox.php#silver_fox">銀狐</a>
<a href="new_role/fox.php#child_fox_group">子狐系</a>：<a href="new_role/fox.php#child_fox">子狐</a>
</pre>

<h4 id="chaosfull_lovers"><a href="new_role/lovers.php">恋人陣営</a></h4>
<pre>
<a href="new_role/lovers.php#cupid_group">キューピッド系</a>：<a href="new_role/lovers.php#cupid">キューピッド</a>・<a href="new_role/lovers.php#self_cupid">求愛者</a>・<a href="new_role/lovers.php#mind_cupid">女神</a>
</pre>

<h4 id="chaosfull_quiz"><a href="new_role/quiz.php">出題者陣営</a></h4>
<pre>
<a href="new_role/quiz.php#quiz_group">出題者系</a>：<a href="new_role/quiz.php#quiz">出題者</a>
</pre>

<h4 id="chaosfull_chiroptera"><a href="new_role/chiroptera.php">蝙蝠陣営</a></h4>
<pre>
<a href="new_role/chiroptera.php#chiroptera_group">蝙蝠系</a>：<a href="new_role/chiroptera.php#chiroptera">蝙蝠</a>・<a href="new_role/chiroptera.php#poison_chiroptera">毒蝙蝠</a>・<a href="new_role/chiroptera.php#cursed_chiroptera">呪蝙蝠</a>
</pre>

<h4 id="chaosfull_mania"><a href="new_role/mania.php">神話マニア陣営</a></h4>
<pre>
<a href="new_role/mania.php#mania_group">神話マニア系</a>：<a href="new_role/mania.php#mania">神話マニア</a>
<a href="new_role/mania.php#unknown_mania_group">鵺系</a>：<a href="new_role/mania.php#unknown_mania">鵺</a>
</pre>

<h5>Ver. 1.4.0 β12～</h5>
<pre>
配役を Ver. 1.4.0 α23 相当に変更
</pre>

<h2 id="chaos_hyper"><?php echo $GAME_OPT_MESS->chaos_hyper ?> [Ver. 1.4.0 β12～]</h2>
<h3 id="chaos_hyper_appear_role">出現役職</h3>
<pre>
実装されているすべての役職が出現します。
</pre>

<h2 id="chaos_verso"><?php echo $GAME_OPT_MESS->chaos_verso ?> [Ver. 1.5.0 β5～]</h2>
<ol>
<li><a href="#decide_role_fix">固定出現枠</a>が存在しません (初期設定)。</li>
<li><a href="#decide_role_random">ランダム出現枠</a>の欄に記載されている補正処理が一切行われません。<br>
  結果として、ゲーム開始時点で勝敗が決定している可能性が他のモードよりも高くなります。
</li>
</ol>
<h3 id="chaos_verso_appear_role">出現役職</h3>
<pre>
出現する可能性のある役職は以下です。
</pre>
<p>
<a href="#chaos_verso_human">村人陣営</a>
<a href="#chaos_verso_wolf">人狼陣営</a>
<a href="#chaos_verso_fox">妖狐陣営</a>
<a href="#chaos_verso_quiz">出題者陣営</a>
</p>

<h4 id="chaos_verso_human"><a href="new_role/human.php">村人陣営</a></h4>
<pre>
<a href="new_role/human.php#human_group">村人系</a>：<a href="new_role/human.php#human">村人</a>
<a href="new_role/human.php#mage_group">占い師系</a>：<a href="new_role/human.php#mage">占い師</a>
<a href="new_role/human.php#necromancer_group">霊能者系</a>：<a href="new_role/human.php#necromancer">霊能者</a>
<a href="new_role/human.php#guard_group">狩人系</a>：<a href="new_role/human.php#guard">狩人</a>
<a href="new_role/human.php#common_group">共有者系</a>：<a href="new_role/human.php#common">共有者</a>
<a href="new_role/human.php#poison_group">埋毒者系</a>：<a href="new_role/human.php#poison">埋毒者</a>
<a href="new_role/human.php#assassin_group">暗殺者系</a>：<a href="new_role/human.php#assassin">暗殺者</a>
</pre>

<h4 id="chaos_verso_wolf"><a href="new_role/wolf.php">人狼陣営</a></h4>
<pre>
<a href="new_role/wolf.php#wolf_group">人狼系</a>：<a href="new_role/wolf.php#wolf">人狼</a>
<a href="new_role/wolf.php#mad_group">狂人系</a>：<a href="new_role/wolf.php#mad">狂人</a>・<a href="new_role/wolf.php#fanatic_mad">狂信者</a>
</pre>

<h4 id="chaos_verso_fox"><a href="new_role/fox.php">妖狐陣営</a></h4>
<pre>
<a href="new_role/fox.php#fox_group">妖狐系</a>：<a href="new_role/fox.php#fox">妖狐</a>
</pre>

<h4 id="chaos_verso_quiz"><a href="new_role/quiz.php">出題者陣営</a></h4>
<pre>
<a href="new_role/quiz.php#quiz_group">出題者系</a>：<a href="new_role/quiz.php#quiz">出題者</a>
</pre>


<h2 id="chaos_old"><?php echo $GAME_OPT_MESS->chaos ?> (旧設定) [Ver. 1.4.0 α1～β11]</h2>
<p>
<a href="#chaos_old_appear_role">出現役職</a>
<a href="#chaos_old_decide_role">配役決定ルーチン</a>
</p>
<h3 id="chaos_old_appear_role">出現役職</h3>
<pre>
出現する可能性のある役職は以下です
</pre>
<p>
<a href="#chaos_old_human">村人陣営</a>
<a href="#chaos_old_wolf">人狼陣営</a>
<a href="#chaos_old_fox">妖狐陣営</a>
<a href="#chaos_old_lovers">恋人陣営</a>
</p>

<h4 id="chaos_old_human"><a href="new_role/human.php">村人陣営</a></h4>
<pre>
<a href="new_role/human.php#human_group">村人系</a>：<a href="new_role/human.php#human">村人</a>・<a href="new_role/human.php#suspect">不審者</a>・<a href="new_role/human.php#unconscious">無意識</a>
<a href="new_role/human.php#mage_group">占い師系</a>：<a href="new_role/human.php#mage">占い師</a>・<a href="new_role/human.php#soul_mage">魂の占い師</a>
<a href="new_role/human.php#necromancer_group">霊能者系</a>：<a href="new_role/human.php#necromancer">霊能者</a>
<a href="new_role/human.php#medium_group">巫女系</a>：<a href="new_role/human.php#medium">巫女</a>
<a href="new_role/human.php#guard_group">狩人系</a>：<a href="new_role/human.php#guard">狩人</a>・<a href="new_role/human.php#poison_guard">騎士</a>・<a href="new_role/human.php#reporter">ブン屋</a>
<a href="new_role/human.php#common_group">共有者系</a>：<a href="new_role/human.php#common">共有者</a>
<a href="new_role/human.php#poison_group">埋毒者系</a>：<a href="new_role/human.php#poison">埋毒者</a>
<a href="new_role/human.php#pharmacist_group">薬師系</a>：<a href="new_role/human.php#pharmacist">薬師</a>
<a href="new_role/mania.php#mania_group">神話マニア系</a>：<a href="new_role/mania.php#mania">神話マニア</a>
</pre>

<h4 id="chaos_old_wolf"><a href="new_role/wolf.php">人狼陣営</a></h4>
<pre>
<a href="new_role/wolf.php#wolf_group">人狼系</a>：<a href="new_role/wolf.php#wolf">人狼</a>・<a href="new_role/wolf.php#boss_wolf">白狼</a>・<a href="new_role/wolf.php#poison_wolf">毒狼</a>・<a href="new_role/wolf.php#tongue_wolf">舌禍狼</a>・<a href="new_role/wolf.php#cute_wolf">萌狼</a>
<a href="new_role/wolf.php#mad_group">狂人系</a>：<a href="new_role/wolf.php#mad">狂人</a>・<a href="new_role/wolf.php#fanatic_mad">狂信者</a>
</pre>

<h4 id="chaos_old_fox"><a href="new_role/fox.php">妖狐陣営</a></h4>
<pre>
<a href="new_role/fox.php#fox_group">妖狐系</a>：<a href="new_role/fox.php#fox">妖狐</a>
<a href="new_role/fox.php#child_fox_group">子狐系</a>：<a href="new_role/fox.php#child_fox">子狐</a>
</pre>

<h4 id="chaos_old_lovers"><a href="new_role/lovers.php">恋人陣営</a></h4>
<pre>
<a href="new_role/lovers.php#cupid_group">キューピッド系</a>：<a href="new_role/lovers.php#cupid">キューピッド</a>
</pre>

<h3 id="chaos_old_decide_role">配役決定ルーチン</h3>
<pre>
大雑把に説明すると「通常編成＋α」(多少ぶれる＆人数が増えるとレア役職登場)です。
</pre>
<p>
<a href="#chaos_old_decide_role_wolf">人狼</a>
<a href="#chaos_old_decide_role_fox">妖狐</a>
<a href="#chaos_old_decide_role_cupid">キューピッド</a>
<a href="#chaos_old_decide_role_other">その他</a>
</p>

<h4 id="chaos_old_decide_role_wolf">人狼</h4>
<pre>
※一定数を確保します (人数が増えるごとにブレを大きくするのもありかな？)
8人未満：1:2 = 80:20 (80%で1人、20%で2人)
8～15人：1:2:3 = 15:70:15 (70%で2人、15%で1人増減(1人か3人))
16～20人：1:2:3:4:5 = 5:10:70:10:5 (70%で3人、10%で1人増減(2人か4人)、5%で2人増減(1人か5人))
21人～：70%で基礎人数、10%で1人増減、5%で2人増減 (5人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([(人数 - 20) / 5]の切捨て) + 3
例)
24人：70%で3人、10%で1人増減(2人か4人)、5%で2人増減(1人か5人)
25人：70%で4人、10%で1人増減(3人か5人)、5%で2人増減(2人か6人)
30人：70%で5人、10%で1人増減(4人か6人)、5%で2人増減(3人か7人)
50人：70%で9人、10%で1人増減(8人か10人)、5%で2人増減(7人か11人)

○特殊狼の出現率
・<a href="new_role/wolf.php#boss_wolf">白狼</a>、<a href="new_role/wolf.php#poison_wolf">毒狼</a>、<a href="new_role/wolf.php#tongue_wolf">舌禍狼</a>がこれに含まれます。
([参加人数 / 15] の切上げ)回数だけ判定を行います。
(15人なら1回、16人なら2回、50人なら3回)
判定を行うたびに、参加人数と同じ割合で1人、人狼と入れ替わります。
例)
15人：15%の判定を1回行う。
16人：16%の判定を2回行う。
30人：30%の判定を2回行う。
50人：50%の判定を3回行う。

○特殊狼の割り振り法則
・<a href="new_role/wolf.php#boss_wolf">白狼</a>
<a href="new_role/wolf.php#tongue_wolf">舌禍狼</a>、<a href="new_role/wolf.php#poison_wolf">毒狼</a>を差し引いた人数だけ出現します。

・<a href="new_role/wolf.php#tongue_wolf">舌禍狼</a>の出現率
16人未満では出現しません。
16人～20人は40%の確率で出現します。
20人以上で参加人数と同じ割合で出現します。(20人なら16%、50人なら50%)
最大出現人数は1人です。

・<a href="new_role/wolf.php#poison_wolf">毒狼</a>の出現率
20人未満では出現しません。
20人以上で参加人数と同じ割合で出現します。(20人なら16%、50人なら50%)
最大出現人数は1人です。
</pre>

<h4 id="chaos_old_decide_role_fox">妖狐</h4>
<pre>
※15人未満はたまに出る程度、それ以降は出現確定
15人未満：0:1 = 90:10 (90%で0人、10%で1人)
16～22人：1:2 = 90:10 (90%で1人、10%で2人)
23人～：80%で基礎人数、10%で1人増減 (20人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 20]の切上げ)
例)
23人：80%で2人、10%で1人増減(1人か3人)
40人：80%で2人、10%で1人増減(1人か3人)
41人：80%で3人、10%で1人増減(2人か4人)
50人：80%で3人、10%で1人増減(2人か4人)

・<a href="new_role/fox.php#child_fox">子狐</a>の出現率
20人未満では出現しません。
20人以上で参加人数と同じ割合で出現します。(20人なら16%、50人なら50%)
最大出現人数は1人です。
<a href="new_role/fox.php#child_fox">子狐</a>が出現した場合は出現人数と同じだけ妖狐が減ります。
</pre>

<h4 id="chaos_old_decide_role_cupid">キューピッド</h4>
<pre>
※増減の確率の関係で確実に出現するのは40人以上となります。
(キューピッドの出現自体をオプションで制御できるようにする予定)
10人未満：0:1 = 95:5 (95%で0人、5%で1人)
10～16人：0:1 = 70:30 (70%で0人、30%で1人)
16～22人：0:1:2 = 5:90:5 (90%で1人、5%で1人増減(0人か2人))
23人～：90%で基礎人数、5%で1人増減 (20人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 20]の切捨て)
例)
23人：90%で1人、5%で1人増減(0人か2人)
40人：90%で2人、5%で1人増減(1人か3人)
50人：90%で3人、5%で1人増減(1人か3人)
</pre>

<h4 id="chaos_old_decide_role_other">その他</h4>
<pre>
参加人数から人狼・妖狐・キューピッドを差し引いた人数です。

・占い系
※占い師と魂の占い師がここに含まれます。
8人未満：0:1 = 10:90 (90%で1人、10%で0人)
8～15人：1:2 = 95:5 (95%で1人、5%で2人)
16～29人：1:2 = 90:10 (90%で1人、10%で2人)
30人～：80%で基礎人数、10%で1人増減 (15人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 15]の切捨て)
例)
30人：80%で2人、10%で1人増減(1人か3人)
50人：80%で3人、10%で1人増減(2人か4人)

・魂の占い師の出現率
16人未満では出現しません。
16人以上で参加人数と同じ割合で出現します。(16人なら16%、50人なら50%)
最大出現人数は1人です。
魂の占い師が出現した場合は出現人数と同じだけ占い師が減ります。

・霊能系
・現在は霊能者のみがここに含まれます。
9人未満：0:1 = 10:90 (90%で1人、10%で0人)
9～15人：1:2 = 95:5 (95%で1人、5%で2人)
16～29人：1:2 = 90:10 (90%で1人、10%で2人)
30人～：80%で基礎人数、10%で1人増減 (15人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 15]の切捨て)
例)
30人：80%で2人、10%で1人増減(1人か3人)
50人：80%で3人、10%で1人増減(2人か4人)

・巫女
※キューピッドが出現している場合はほぼ確実に出現します。
　(ランダムで0人に当たっても強制的に1人に補正されます)
　(ただし、巫女が出現してもキューピッドが出現しているとは限りません)
9人未満：0:1 = 30:70 (70%で1人、30%で0人)
9～15人：0:1:2 = 10:80:10 (80%で1人、10%で1人増減(0人か2人)
16人～：80%で基礎人数、10%で1人増減 (15人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 15]の切捨て)
例)
29人：80%で1人、10%で1人増減(0人か2人)
30人：80%で2人、10%で1人増減(1人か3人)
50人：80%で3人、10%で1人増減(2人か4人)

・狂人系
・狂人と狂信者がここに含まれます。
10人未満：0:1 = 70:30 (70%で0人、30%で1人)
10～15人：0:1:2 = 10:80:10 (80%で1人、10%で1人増減(0人か2人)
16人～：80%で基礎人数、10%で1人増減 (15人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 15]の切捨て)
例)
29人：80%で1人、10%で1人増減(0人か2人)
30人：80%で2人、10%で1人増減(1人か3人)
50人：80%で3人、10%で1人増減(2人か4人)

・狂信者の出現率
16人未満では出現しません。
16人以上で参加人数と同じ割合で出現します。(16人なら16%、50人なら50%)
最大出現人数は1人です。
狂信者が出現した場合は出現人数と同じだけ狂人が減ります。

・狩人系
・狩人と騎士がここに含まれます。
11人未満：0:1 = 90:10 (90%で0人、10%で1人)
11～15人：0:1:2 = 10:80:10 (80%で1人、10%で1人増減(0人か2人)
16人～：80%で基礎人数、10%で1人増減 (15人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 15]の切捨て)
例)
29人：80%で1人、10%で1人増減(0人か2人)
30人：80%で2人、10%で1人増減(1人か3人)
50人：80%で3人、10%で1人増減(2人か4人)

・騎士の出現率
20人未満では出現しません。
20人以上で参加人数と同じ割合で出現します。(20人なら20%、50人なら50%)
最大出現人数は1人です。
騎士が出現した場合は出現人数と同じだけ狩人と埋毒者が減ります。

・共有者
13人未満：0:1 = 90:10 (90%で0人、10%で1人)
13～22人：1:2:3 = 10:80:10 (80%で2人、10%で1人増減(1人か3人)
23人～：80%で基礎人数、10%で1人増減 (15人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 15]の切捨て) + 1
例)
29人：80%で2人、10%で1人増減(1人か3人)
30人：80%で3人、10%で1人増減(2人か4人)
50人：80%で4人、10%で1人増減(3人か5人)

・埋毒者
・騎士が出現していた場合はその人数分だけ埋毒者が減ります。
16人未満：0:1 = 95:5 (95%で0人、5%で1人)
16～19人：0:1 = 85:15 (85%で0人、15%で1人)
20人～：80%で基礎人数、10%で1人増減 (20人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 20]の切捨て)
例)
39人：80%で1人、10%で1人増減(0人か2人)
40人：80%で2人、10%で1人増減(1人か3人)
50人：80%で2人、10%で1人増減(1人か3人)

・薬師
※毒狼が出現している場合はほぼ確実に出現します。
　(ランダムで0人に当たっても強制的に1人に補正されます)
　(ただし、薬師が出現しても毒狼が出現しているとは限りません)
16人未満：0:1 = 95:5 (95%で0人、5%で1人)
16～19人：0:1 = 85:15 (85%で0人、15%で1人)
20人～：80%で基礎人数、10%で1人増減 (20人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 20]の切捨て)
例)
39人：80%で1人、10%で1人増減(0人か2人)
40人：80%で2人、10%で1人増減(1人か3人)
50人：80%で2人、10%で1人増減(1人か3人)

・神話マニア
16人未満：出現しません
16～22人：0:1 = 40:60 (60%で1人、40%で0人)
23人～：80%で基礎人数、10%で1人増減 (20人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 20]の切捨て)
例)
39人：80%で1人、10%で1人増減(0人か2人)
40人：80%で2人、10%で1人増減(1人か3人)
50人：80%で2人、10%で1人増減(1人か3人)

・不審者系
・不審者と無意識がここに含まれます。
16人未満：0:1 = 90:10 (90%で0人、10%で1人)
16～19人：0:1 = 80:20 (80%で0人、20%で1人)
20人～：80%で基礎人数、10%で1人増減 (20人増えるごとに基礎人数が1人ずつ増加)
基礎人数 = ([人数 / 20]の切捨て)
例)
39人：80%で1人、10%で1人増減(0人か2人)
40人：80%で2人、10%で1人増減(1人か3人)
50人：80%で2人、10%で1人増減(1人か3人)

・不審者・無意識の出現率
20人未満では無意識の出現率が高め (無意識：不審者 = 80%:20%)。
20人以上で不審者の出現率がやや高め (無意識：不審者 = 40%:60%)。
出現人数の上限は規定していません。
</pre>

<h2 id="topping"><?php echo $GAME_OPT_MESS->topping ?> [Ver. 1.4.0 β19～]</h2>
<ol>
<li><?php echo $GAME_OPT_CAPT->topping ?>。</li>
<li>内容は設定ファイルで変更できます。</li>
</ol>
<p>
<a href="#topping_a"><?php echo $GAME_OPT_MESS->topping_a ?></a>
<a href="#topping_b"><?php echo $GAME_OPT_MESS->topping_b ?></a>
<a href="#topping_c"><?php echo $GAME_OPT_MESS->topping_c ?></a>
<a href="#topping_d"><?php echo $GAME_OPT_MESS->topping_d ?></a>
<a href="#topping_e"><?php echo $GAME_OPT_MESS->topping_e ?></a>
<a href="#topping_f"><?php echo $GAME_OPT_MESS->topping_f ?></a>
<a href="#topping_g"><?php echo $GAME_OPT_MESS->topping_g ?></a>
</p>
<p>
<a href="#topping_h"><?php echo $GAME_OPT_MESS->topping_h ?></a>
<a href="#topping_i"><?php echo $GAME_OPT_MESS->topping_i ?></a>
<a href="#topping_j"><?php echo $GAME_OPT_MESS->topping_j ?></a>
<a href="#topping_k"><?php echo $GAME_OPT_MESS->topping_k ?></a>
<a href="#topping_l"><?php echo $GAME_OPT_MESS->topping_l ?></a>
</p>

<h3 id="topping_a"><?php echo $GAME_OPT_MESS->topping_a ?> [Ver. 1.4.0 β19～]</h3>
<pre>
<a href="new_role/human.php#doll_group">上海人形系</a>(<a href="new_role/human.php#doll_master">人形遣い</a>以外)1　<a href="new_role/human.php#doll_rule">人形遣い枠</a>2 (<a href="new_role/human.php#doll_master">人形遣い</a>1・それ以外1)
</pre>
<h4>Ver. 1.5.0 β8～</h4>
<pre>
人形遣い1 → 人形遣い枠2 (人形遣い1・それ以外1)
</pre>

<h4>Ver. 1.4.0 RC1～</h4>
<pre>
上海人形1 → 上海人形系(人形遣い以外)1
</pre>

<h3 id="topping_b"><?php echo $GAME_OPT_MESS->topping_b ?> [Ver. 1.4.0 β19～]</h3>
<pre>
<a href="new_role/quiz.php#quiz">出題者</a>1　<a href="new_role/ogre.php#poison_ogre">榊鬼</a>1
</pre>

<h3 id="topping_c"><?php echo $GAME_OPT_MESS->topping_c ?> [Ver. 1.4.0 β19～]</h3>
<pre>
<a href="new_role/vampire.php">吸血鬼陣営</a>1
</pre>
<h4>Ver. 1.4.0 RC1～</h4>
<pre>
吸血鬼1 → 吸血鬼陣営1
</pre>

<h3 id="topping_d"><?php echo $GAME_OPT_MESS->topping_d ?> [Ver. 1.4.0 β19～]</h3>
<pre>
<a href="new_role/human.php#poison_cat_group">猫又系</a>1　<a href="new_role/wolf.php#resist_wolf">抗毒狼</a>1
</pre>
<h4>Ver. 1.4.0 RC1～</h4>
<pre>
猫又1 → 猫又系1
</pre>

<h3 id="topping_e"><?php echo $GAME_OPT_MESS->topping_e ?> [Ver. 1.4.0 β19～]</h3>
<pre>
<a href="new_role/human.php#anti_voodoo">厄神</a>1　<a href="new_role/wolf.php#possessed_wolf">憑狼</a>1
</pre>

<h3 id="topping_f"><?php echo $GAME_OPT_MESS->topping_f ?> [Ver. 1.4.0 RC1～]</h3>
<pre>
<a href="new_role/ogre.php">鬼陣営</a>2
</pre>

<h3 id="topping_g"><?php echo $GAME_OPT_MESS->topping_g ?> [Ver. 1.5.0 α7～]</h3>
<pre>
<a href="new_role/wolf.php#mad_group">狂人系</a>1　夢系1　精神系1

夢系：(<a href="new_role/human.php#suspect">不審者</a>・<a href="new_role/human.php#unconscious">無意識</a>・<a href="new_role/ability.php#dummy">夢能力者</a>)
精神系：(<a href="new_role/human.php#psycho_mage">精神鑑定士</a>・<a href="new_role/human.php#psycho_necromancer">精神感応者</a>・<a href="new_role/human.php#psycho_escaper">迷い人</a>・<a href="new_role/wolf.php#dream_eater_mad">獏</a>・<a href="new_role/ogre.php#revive_ogre">茨木童子</a>)
</pre>

<h3 id="topping_h"><?php echo $GAME_OPT_MESS->topping_h ?> [Ver. 1.5.0 α7～]</h3>
<pre>
<a href="new_role/human.php#human">村人</a>2
</pre>

<h3 id="topping_i"><?php echo $GAME_OPT_MESS->topping_i ?> [Ver. 1.5.0 β1～]</h3>
<pre>
<a href="new_role/human.php#jealousy_group">橋姫系</a>1　<a href="new_role/lovers.php">恋人陣営</a>2
</pre>

<h3 id="topping_j"><?php echo $GAME_OPT_MESS->topping_j ?> [Ver. 1.5.0 β1～]</h3>
<pre>
<a href="new_role/duelist.php">決闘者陣営</a>1
</pre>

<h3 id="topping_k"><?php echo $GAME_OPT_MESS->topping_k ?> [Ver. 1.5.0 β2～]</h3>
<pre>
上位種3 (村人陣営1・人狼陣営1・他陣営1)

村人：<a href="new_role/human.php#executor">執行者</a>・<a href="new_role/human.php#soul_mage">魂の占い師</a>・<a href="new_role/human.php#soul_necromancer">雲外鏡</a>・<a href="new_role/human.php#revive_medium">風祝</a>・<a href="new_role/human.php#high_priest">大司祭</a>・<a href="new_role/human.php#poison_guard">騎士</a>・<a href="new_role/human.php#ghost_common">亡霊嬢</a>・<a href="new_role/human.php#strong_poison">強毒者</a>・<a href="new_role/human.php#revive_cat">仙狸</a>
　　　<a href="new_role/human.php#alchemy_pharmacist">錬金術師</a>・<a href="new_role/human.php#soul_assassin">辻斬り</a>・<a href="new_role/human.php#clairvoyance_scanner">猩々</a>・<a href="new_role/human.php#miasma_jealousy">蛇姫</a>・<a href="new_role/human.php#history_brownie">白澤</a>・<a href="new_role/human.php#soul_wizard">八卦見</a>・<a href="new_role/human.php#doll_master">人形遣い</a>・<a href="new_role/human.php#divine_escaper">麒麟</a>

人狼：<a href="new_role/wolf.php#boss_wolf">白狼</a>・<a href="new_role/wolf.php#resist_wolf">抗毒狼</a>・<a href="new_role/wolf.php#tongue_wolf">舌禍狼</a>・<a href="new_role/wolf.php#possessed_wolf">憑狼</a>・<a href="new_role/wolf.php#sirius_wolf">天狼</a>・<a href="new_role/wolf.php#whisper_mad">囁き狂人</a>

他：<a href="new_role/fox.php#cursed_fox">天狐</a>・<a href="new_role/fox.php#jammer_fox">月狐</a>・<a href="new_role/lovers.php#minstrel_cupid">吟遊詩人</a>・<a href="new_role/lovers.php#sacrifice_angel">守護天使</a>・<a href="new_role/quiz.php#quiz">出題者</a>・<a href="new_role/vampire.php#soul_vampire">吸血姫</a>
　　<a href="new_role/chiroptera.php#boss_chiroptera">大蝙蝠</a>・<a href="new_role/chiroptera.php#ice_fairy">氷妖精</a>・<a href="new_role/ogre.php#sacrifice_ogre">酒呑童子</a>・<a href="new_role/ogre.php#dowser_yaksa">毘沙門天</a>・<a href="new_role/duelist.php#critical_duelist">剣闘士</a>・<a href="new_role/duelist.php#revive_avenger">夜刀神</a>・<a href="new_role/duelist.php#sacrifice_patron">身代わり地蔵</a>
　　<a href="new_role/mania.php#soul_mania">覚醒者</a>・<a href="new_role/mania.php#sacrifice_mania">影武者</a>
</pre>
<h4>Ver. 1.5.0 β9～</h4>
<pre>
村人：<a href="new_role/human.php#poison_jealousy">毒橋姫</a>→<a href="new_role/human.php#miasma_jealousy">蛇姫</a>
</pre>
<h4>Ver. 1.5.0 β4～</h4>
<pre>
村人：<a href="new_role/human.php#escaper">逃亡者</a>→<a href="new_role/human.php#divine_escaper">麒麟</a>
他：<a href="new_role/duelist.php#valkyrja_duelist">戦乙女</a>→<a href="new_role/duelist.php#critical_duelist">剣闘士</a>、<a href="new_role/duelist.php#avenger">復讐者</a>→<a href="new_role/duelist.php#revive_avenger">夜刀神</a>、<a href="new_role/duelist.php#patron">後援者</a>→<a href="new_role/duelist.php#sacrifice_patron">身代わり地蔵</a>
</pre>
<h4>Ver. 1.5.0 β3～</h4>
<pre>
他：<a href="new_role/duelist.php#avenger">復讐者</a>・<a href="new_role/duelist.php#patron">後援者</a>・<a href="new_role/mania.php#sacrifice_mania">影武者</a>追加
</pre>

<h3 id="topping_l"><?php echo $GAME_OPT_MESS->topping_l ?> [Ver. 1.5.0 β8～]</h3>
<pre>
<a href="new_role/human.php#ghost_common">亡霊嬢</a>1　<a href="new_role/wolf.php#boss_wolf">白狼</a>1　<a href="new_role/wolf.php#silver_wolf">銀狼</a>1　<a href="new_role/fox.php#howl_fox">化狐</a>1
</pre>


<h2 id="boost_rate"><?php echo $GAME_OPT_MESS->boost_rate ?> [Ver. 1.5.0 β7～]</h2>
<ol>
<li><?php echo $GAME_OPT_CAPT->boost_rate ?>。</li>
<li>固定配役には干渉しません。</li>
<li>内容は設定ファイルで変更できます。</li>
</ol>
<p>
<a href="#boost_rate_a"><?php echo $GAME_OPT_MESS->boost_rate_a ?></a>
<a href="#boost_rate_b"><?php echo $GAME_OPT_MESS->boost_rate_b ?></a>
<a href="#boost_rate_c"><?php echo $GAME_OPT_MESS->boost_rate_c ?></a>
<a href="#boost_rate_d"><?php echo $GAME_OPT_MESS->boost_rate_d ?></a>
<a href="#boost_rate_e"><?php echo $GAME_OPT_MESS->boost_rate_e ?></a>
<a href="#boost_rate_f"><?php echo $GAME_OPT_MESS->boost_rate_f ?></a>
<a href="#boost_rate_g"><?php echo $GAME_OPT_MESS->boost_rate_g ?></a>
</p>

<h3 id="boost_rate_a"><?php echo $GAME_OPT_MESS->boost_rate_a ?> [Ver. 1.5.0 β7～]</h3>
<pre>
該当バージョンで新しく実装された役職の出現率が上がります。
</pre>

<h3 id="boost_rate_b"><?php echo $GAME_OPT_MESS->boost_rate_b ?> [Ver. 1.5.0 β7～]</h3>
<pre>
<a href="new_role/ability.php#authority">投票数変化能力者</a>・<a href="new_role/ability.php#luck">得票数変化能力者</a>に属するメイン役職の出現率が 0 になります。
</pre>

<h3 id="boost_rate_c"><?php echo $GAME_OPT_MESS->boost_rate_c ?> [Ver. 1.5.0 β8～]</h3>
<pre>
各系統の基本職の出現率が 0 になります。
役職グループの<a href="#decide_role_random">上限補正</a>の振り替えで<a href="new_role/human.php#human">村人</a>が出現する可能性があります。
村人の<a href="#decide_role_random">上限補正</a>の振り替えでは基本職は出現しません。
</pre>

<h3 id="boost_rate_d"><?php echo $GAME_OPT_MESS->boost_rate_d ?> [Ver. 1.5.0 β9～]</h3>
<pre>
<a href="new_role/ability.php#revive_other">他者蘇生能力者</a>の出現率が 0 になります。
</pre>

<h3 id="boost_rate_e"><?php echo $GAME_OPT_MESS->boost_rate_e ?> [Ver. 1.5.0 β9～]</h3>
<pre>
<a href="new_role/lovers.php#exchange_angel">魂移使</a>・<a href="new_role/ability.php#possessed">憑依能力者</a>の出現率が 0 になります。
</pre>

<h3 id="boost_rate_f"><?php echo $GAME_OPT_MESS->boost_rate_f ?> [Ver. 1.5.0 β12～]</h3>
<pre>
<a href="new_role/chiroptera.php">蝙蝠陣営</a>・<a href="new_role/ogre.php">鬼陣営</a>・<a href="new_role/duelist.php">決闘者陣営</a>の出現率が 0 になります。
</pre>

<h3 id="boost_rate_g"><?php echo $GAME_OPT_MESS->boost_rate_g ?> [Ver. 2.0.0～]</h3>
<pre>
<a href="new_role/human.php#jealousy">橋姫系</a>・<a href="new_role/lovers.php">恋人陣営</a>の出現率が 0 になります。
</pre>

<h2 id="chaos_open_cast"><?php echo $GAME_OPT_MESS->chaos_open_cast ?> [Ver. 1.4.0 α14～]</h2>
<pre>
初日の夜に表示される陣営内訳通知に制限をかけることができます。
</pre>
<p>
<a href="#chaos_open_cast_none">通知なし</a>
<a href="#chaos_open_cast_camp">陣営通知</a>
<a href="#chaos_open_cast_role">役職通知</a>
<a href="#chaos_open_cast_full">完全通知</a>
</p>

<h3 id="chaos_open_cast_none">通知なし [Ver. 1.4.0 α1～]</h3>
<pre>
陣営内訳通知が完全に隠蔽されます。
システム的にはこれが初期状態です (アイコン表示はありません)。
</pre>

<h3 id="chaos_open_cast_camp">陣営通知 [Ver. 1.4.0 α20～]</h3>
<pre>
陣営毎にまとめられた内訳が通知されます。
サブ役職は系統毎にまとめて通知されます。
</pre>

<h3 id="chaos_open_cast_role">役職通知 [Ver. 1.4.0 α20～]</h3>
<pre>
役職系統毎にまとめられた内訳が通知されます。
</pre>

<h3 id="chaos_open_cast_full">完全通知 [Ver. 1.4.0 α14～]</h3>
<pre>
役職の内訳が完全公開されます (通常村相当)。
</pre>

<h2 id="sub_role_limit"><?php echo $GAME_OPT_MESS->sub_role_limit ?> [Ver. 1.4.0 α14～]</h2>
<ol>
  <li>出現するサブ役職の種類に制限をかけることができます。</li>
  <li>内容は設定ファイルで変更できます。</li>
</ol>
<p>
<a href="#no_sub_role"><?php echo $GAME_OPT_MESS->no_sub_role ?></a>
<a href="#sub_role_limit_easy"><?php echo $GAME_OPT_MESS->sub_role_limit_easy ?></a>
<a href="#sub_role_limit_normal"><?php echo $GAME_OPT_MESS->sub_role_limit_normal ?></a>
<a href="#sub_role_limit_hard"><?php echo $GAME_OPT_MESS->sub_role_limit_hard ?></a>
<a href="#sub_role_limit_none">サブ役職制限なし</a>
</p>

<h3 id="no_sub_role"><?php echo $GAME_OPT_MESS->no_sub_role ?> [Ver. 1.4.0 α14～]</h3>
<pre>
初期にランダム配布されるサブ役職がなくなります。
</pre>

<h3 id="sub_role_limit_easy"><?php echo $GAME_OPT_MESS->sub_role_limit_easy ?> [Ver. 1.4.0 β14～]</h3>
<pre>
<a href="new_role/sub_role.php#decide_group">決定者系</a>・<a href="new_role/sub_role.php#authority_group">権力者系</a>のみ出現します。
</pre>

<h3 id="sub_role_limit_normal"><?php echo $GAME_OPT_MESS->sub_role_limit_normal ?> [Ver. 1.4.0 β14～]</h3>
<pre>
<a href="new_role/sub_role.php#decide_group">決定者系</a>・<a href="new_role/sub_role.php#authority_group">権力者系</a>・<a href="new_role/sub_role.php#upper_luck_group">雑草魂系</a>・<a href="new_role/sub_role.php#wisp_group">鬼火系</a>のみ出現します。
</pre>
<h4>Ver. 1.5.0 β9～</h4>
<pre>
<a href="new_role/sub_role.php#strong_voice_group">大声系</a> → <a href="new_role/sub_role.php#wisp_group">鬼火系</a>
</pre>

<h3 id="sub_role_limit_hard"><?php echo $GAME_OPT_MESS->sub_role_limit_hard ?> [Ver. 1.5.0 β9～]</h3>
<pre>
<a href="new_role/sub_role.php#decide_group">決定者系</a>・<a href="new_role/sub_role.php#authority_group">権力者系</a>・<a href="new_role/sub_role.php#upper_luck_group">雑草魂系</a>・<a href="new_role/sub_role.php#strong_voice_group">大声系</a>・<a href="new_role/sub_role.php#mind_read_group">サトラレ系</a>・<a href="new_role/sub_role.php#wisp_group">鬼火系</a>のみ出現します。
</pre>

<h3 id="sub_role_limit_none">サブ役職制限なし [Ver. 1.4.0 α1～]</h3>
<pre>
実装されている全てのランダム配布可能なサブ役職が出現します。
システム的にはこれが初期状態です (アイコン表示はありません)。
</pre>

<h2 id="secret_sub_role"><?php echo $GAME_OPT_MESS->secret_sub_role ?> [Ver. 1.4.0 α14～]</h2>
<pre>
一部の例外を除き、サブ役職の本人表示が無効になります。
</pre>
</body></html>
