<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('神話マニア陣営');
?>
<p>
<a href="#rule">基本ルール</a>
<a href="#change_group">所属変更</a>
</p>
<p>
<a href="#mania_group">神話マニア系</a>
<a href="#unknown_mania_group">鵺系</a>
</p>

<h2 id="rule">基本ルール</h2>
<ol>
<li>初日の夜に誰か一人を選んでその人と同じ陣営に変化 (コピー) する特殊陣営です。</li>
<li>勝利条件はコピー先の陣営になります。</li>
<li>コピー結果が反映されるのは 2 日目の朝です。</a>
<li>コピーが成立した時点で所属陣営はコピー先に変更されます。</a>
<li>なんらかの理由でコピーが成立しなかった場合は村人陣営と扱われます。</li>
<li>コピーが成立する前に突然死した場合の<a href="human.php#medium_group">巫女系</a>の陣営判定は「村人」です。</li>
</ol>

<h2 id="change_group">所属変更</h2>
<h3>Ver. 1.4.0 β18～</h3>
<pre>
<a href="#unknown_mania">鵺</a>：<a href="#mania_group">神話マニア系</a>→<a href="#unknown_mania_group">鵺系</a>
</pre>
<h3>Ver. 1.4.0 β13～</h3>
<pre>
<a href="#mania_group">神話マニア系</a>：<a href="human.php">村人陣営</a>→神話マニア陣営
</pre>

<h2 id="mania_group">神話マニア系</h2>
<p>
<a href="#mania">神話マニア</a>
<a href="#trick_mania">奇術師</a>
<a href="#basic_mania">求道者</a>
<a href="#soul_mania">覚醒者</a>
<a href="#dummy_mania">夢語部</a>
</p>

<h3 id="mania">神話マニア (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α11～]</h3>
<pre>
神話マニア陣営の基本種。
コピー結果は相手のメイン役職で、神話マニア陣営を選んだ場合は<a href="human.php#human">村人</a>になる。
役職が変化すると<a href="sub_role.php#copied">元神話マニア</a>がつく。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
カード人狼にある役職です。元と違い、占いや狼以外の役職もコピーします。
CO するべきかどうかは、コピーした役職次第です。
</pre>

<h3 id="trick_mania">奇術師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<pre>
コピー先のメイン役職を奪うことができる特殊な神話マニア。
コピー能力は<a href="#mania">神話マニア</a>と同じ。
役職が変化すると<a href="sub_role.php#copied_trick">元奇術師</a>がつく。
</pre>
<ol>
<li>入れ替え対象は「初日の夜に投票をしてなかった人」。</li>
<li>入れ替えが発生すると、コピー先はその系統の基本職に変化する。</li>
<li>身代わり君・<a href="human.php#widow_priest">未亡人</a>・<a href="human.php#revive_priest">天人</a>は入れ替え対象外。</li>
</ol>
</pre>
<h4>コピーの結果例</h4>
<pre>
1. A[奇術師] → B[<a href="human.php#soul_mage">魂の占い師</a>] =&gt; A[魂の占い師] B[魂の占い師]
初日に投票しているので入れ替えは発生しません。
<a href="human.php#mage_group">占い師系</a>・<a href="lovers.php">恋人陣営</a>・<a href="chiroptera.php#fairy_group">妖精系</a>や、<a href="human.php#mind_scanner_group">さとり系</a>・<a href="wolf.php#mad_group">狂人系</a>・<a href="fox.php">妖狐陣営</a>の一部などが
これに該当します。

2. A[奇術師] → B[<a href="human.php#yama_necromancer">閻魔</a>] =&gt; A[閻魔] B[霊能者]
入れ替えが発生してもコピー先には特にメッセージが出ないので、
朝、突然役職表記が入れ替わってしまうことになります。

3. A[奇術師] → B[<a href="human.php#dummy_guard">夢守人</a>] =&gt; A[夢守人] B[狩人]
この場合はコピー先は入れ替わりを自覚できないことになります。

4. A[奇術師] → B[<a href="human.php#revive_priest">天人</a>] =&gt; A[天人] B[天人]
天人は初日に投票しませんが、死亡処理が入るので例外的に入れ替え対象外です。

5. A[奇術師] → B[<a href="wolf.php#tongue_wolf">舌禍狼</a>] → 身代わり君 =&gt; A[舌禍狼] B[舌禍狼]
投票している狼をコピーした場合は入れ替えが発生しません。

6. A[奇術師] → B[<a href="wolf.php#trap_mad">罠師</a>] =&gt; A[罠師] B[狂人]
初日に投票していない狂人は入れ替えが発生します。
</pre>
<h5>Ver. 1.5.0 β9～</h5>
<pre>
<a href="human.php#widow_priest">未亡人</a>を入れ替え対象外に変更。
</pre>
<h5>Ver. 1.4.0 β11～</h5>
<pre>
役職変化後に付加される役職を<a href="sub_role.php#copied">元神話マニア</a>から<a href="sub_role.php#copied_trick">元奇術師</a>に変更。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「所属陣営は初日の夜の投票で確定する」というルールの範囲内で
「相手の能力を奪う」役職を作れないかな、と思案してこういう実装になりました。
</pre>

<h3 id="basic_mania">求道者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β4～]</h3>
<pre>
コピー先の基本種に変化する特殊な神話マニア。
コピー結果は相手のメイン役職の基本種で、神話マニア陣営を選んだ場合は<a href="human.php#human">村人</a>になる。
役職が変化すると<a href="sub_role.php#copied_basic">元求道者</a>がつく。
</pre>
<h4>コピーの結果例</h4>
<pre>
1. A[求道者] → B[<a href="human.php#soul_mage">魂の占い師</a>] =&gt; A[占い師] B[魂の占い師]
基本種とは、～陣営～系と表記されている部分の「～系」に該当します。

2. A[求道者] → B[<a href="human.php#dummy_guard">夢守人</a>] =&gt; A[狩人] B[夢守人]
コピー結果は本人が変化した役職が表示されるので、
コピー先の役職を正確に知ることはできません。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#trick_mania">奇術師</a>の逆バージョンです。
コピー先の正確な役職は分からないので騙りに使いやすいと思います。
</pre>

<h3 id="soul_mania">覚醒者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β11～]</h3>
<pre>
コピー先の上位種に変化する特殊な神話マニア。
役職が変化すると<a href="sub_role.php#copied_soul">元覚醒者</a>がつく。
</pre>
<ol>
  <li>入れ替わるのは 4 日目の朝で、それまでは覚醒者のまま。</li>
  <li>2 日目の朝にどの役職系になるのか (コピー先の役職の系統) 分かる。<br>
    例) A[覚醒者] → B[<a href="wolf.php#boss_wolf">白狼</a>]  =&gt; 「Bさんは人狼でした」
  </li>
  <li>4 日目の朝にどの役職になったのか分かる。</li>
  <li>神話マニア陣営を選んだ場合は村人になる。</li>
  <li>蘇生されるケースがあるので、死亡していても変化処理は行われる。</li>
  <li>蘇生能力者などに変化するケースがあるので、変化するまでは霊界は公開されない。</li>
</ol>
<h4>コピー結果一覧</h4>
<table>
<tr><th>コピー元</th><th>コピー結果</th><th>設定変更</th></tr>
<tr>
  <td><a href="human.php#human_group">村人系</a></td>
  <td><a href="human.php#executor">執行者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td><a href="human.php#soul_mage">魂の占い師</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td><a href="human.php#soul_necromancer">雲外鏡</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#medium_group">巫女系</a></td>
  <td><a href="human.php#revive_medium">風祝</a></td>
  <td>Ver. 1.4.0 β13～</td>
</tr>
<tr>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td><a href="human.php#high_priest">大司祭</a></td>
  <td>Ver. 1.4.0 β21～</td>
</tr>
<tr>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td><a href="human.php#poison_guard">騎士</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td><a href="human.php#ghost_common">亡霊嬢</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td><a href="human.php#strong_poison">強毒者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#poison_cat_group">猫又系</a></td>
  <td><a href="human.php#revive_cat">仙狸</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#pharmacist_group">薬師系</a></td>
  <td><a href="human.php#alchemy_pharmacist">錬金術師</a></td>
  <td>Ver. 1.4.0 β22～</td>
</tr>
<tr>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td><a href="human.php#soul_assassin">辻斬り</a></td>
  <td>Ver. 1.4.0 β13～</td>
</tr>
<tr>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td><a href="human.php#clairvoyance_scanner">猩々</a></td>
  <td>Ver. 1.4.0 β22～</td>
</tr>
<tr>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td><a href="human.php#miasma_jealousy">蛇姫</a></td>
  <td>Ver. 1.5.0 β9～</td>
</tr>
<tr>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td><a href="human.php#history_brownie">白澤</a></td>
  <td>Ver. 1.4.0 β16～</td>
</tr>
<tr>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td><a href="human.php#soul_wizard">八卦見</a></td>
  <td>Ver. 1.5.0 α1～</td>
</tr>
<tr>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td><a href="human.php#doll_master">人形遣い</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td><a href="human.php#divine_escaper">麒麟</a></td>
  <td>Ver. 1.5.0 β4～</td>
</tr>
<tr>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td><a href="wolf.php#sirius_wolf">天狼</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td><a href="wolf.php#whisper_mad">囁き狂人</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td><a href="fox.php#cursed_fox">天狐</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td><a href="fox.php#jammer_fox">月狐</a></td>
  <td>Ver. 1.4.0 β14～</td>
</tr>
<tr>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td><a href="lovers.php#minstrel_cupid">吟遊詩人</a></td>
  <td>Ver. 1.5.0 β1～</td>
</tr>
<tr>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td><a href="lovers.php#sacrifice_angel">守護天使</a></td>
  <td>Ver. 1.4.0 β22～</td>
</tr>
<tr>
  <td><a href="quiz.php#quiz_group">出題者系</a></td>
  <td><a href="quiz.php#quiz">出題者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td><a href="vampire.php#soul_vampire">吸血姫</a></td>
  <td>Ver. 1.4.0 β19～</td>
</tr>
<tr>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td><a href="chiroptera.php#boss_chiroptera">大蝙蝠</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td><a href="chiroptera.php#ice_fairy">氷妖精</a></td>
  <td>Ver. 1.4.0 β16～</td>
</tr>
<tr>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td><a href="ogre.php#sacrifice_ogre">酒呑童子</a></td>
  <td>Ver. 1.4.0 β20～</td>
</tr>
<tr>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td><a href="ogre.php#dowser_yaksa">毘沙門天</a></td>
  <td>Ver. 1.4.0 β21～</td>
</tr>
<tr>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td><a href="duelist.php#critical_duelist">剣闘士</a></td>
  <td>Ver. 1.5.0 β4～</td>
</tr>
<tr>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td><a href="duelist.php#revive_avenger">夜刀神</a></td>
  <td>Ver. 1.5.0 β4～</td>
</tr>
<tr>
  <td><a href="duelist.php#patron_group">後援者系</a></td>
  <td><a href="duelist.php#sacrifice_patron">身代わり地蔵</a></td>
  <td>Ver. 1.5.0 β4～</td>
</tr>
<tr>
  <td>神話マニア陣営</td>
  <td><a href="human.php#human">村人</a></td>
  <td></td>
</tr>
</table>
<h4>同一表示役職</h4>
<pre>
<a href="#dummy_mania">夢語部</a>
</pre>
<h5>Ver. 1.4.0 β14～</h5>
<pre>
変化するまでは霊界は公開されない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#incubate_poison">潜毒者</a>の亜種を作ろうとして色々検討した結果、こういう実装になりました。
能力発動のタイミングを考慮して<a href="human.php#incubate_poison">潜毒者</a>より一日早く変化処理を行っています。
</pre>

<h3 id="dummy_mania">夢語部 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β11～]</h3>
<h4>[役職表示] <a href="#soul_mania">覚醒者</a></h4>
<h4>[耐性] 獏襲撃：死亡 (変化前) / 精神鑑定：嘘つき (変化前)</h4>
<pre>
コピー先の基本・劣化種に変化する特殊な神話マニア。
本人の表記は「<a href="#soul_mania">覚醒者</a>」で、仕様も同じ。
役職が変化すると<a href="sub_role.php#copied_teller">元夢語部</a>がつく。
変化前に<a href="wolf.php#dream_eater_mad">獏</a>に襲撃されると死亡する。
</pre>
<h4>コピー結果一覧</h4>
<table>
<tr><th>コピー元</th><th>コピー結果</th><th>設定変更</th></tr>
<tr>
  <td><a href="human.php#human_group">村人系</a></td>
  <td><a href="human.php#suspect">不審者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td><a href="human.php#dummy_mage">夢見人</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td><a href="human.php#dummy_necromancer">夢枕人</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#medium_group">巫女系</a></td>
  <td><a href="human.php#eclipse_medium">蝕巫女</a></td>
  <td>Ver. 1.5.0 β9～</td>
</tr>
<tr>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td><a href="human.php#dummy_priest">夢司祭</a></td>
  <td>Ver. 1.4.0 β15～</td>
</tr>
<tr>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td><a href="human.php#dummy_guard">夢守人</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td><a href="human.php#dummy_common">夢共有者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td><a href="human.php#dummy_poison">夢毒者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#poison_cat_group">猫又系</a></td>
  <td><a href="human.php#eclipse_cat">蝕仙狸</a></td>
  <td>Ver. 1.4.0 β17～</td>
</tr>
<tr>
  <td><a href="human.php#pharmacist_group">薬師系</a></td>
  <td><a href="human.php#centaurus_pharmacist">人馬</a></td>
  <td>Ver. 1.5.0 β2～</td>
</tr>
<tr>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td><a href="human.php#eclipse_assassin">蝕暗殺者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td><a href="human.php#dummy_scanner">幻視者</a></td>
  <td>Ver. 1.5.0 β16～</td>
</tr>
<tr>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td><a href="human.php#critical_jealousy">人魚</a></td>
  <td>Ver. 1.5.0 β9～</td>
</tr>
<tr>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td><a href="human.php#maple_brownie">紅葉神</a></td>
  <td>Ver. 1.5.0 β16～</td>
</tr>
<tr>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td><a href="human.php#astray_wizard">左道使い</a></td>
  <td>Ver. 1.5.0 α8～</td>
</tr>
<tr>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td><a href="human.php#silver_doll">露西亜人形</a></td>
  <td>Ver. 1.4.0 β22～</td>
</tr>
<tr>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td><a href="human.php#doom_escaper">半鳥女</a></td>
  <td>Ver. 1.5.0 α9～</td>
</tr>
<tr>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td><a href="wolf.php#emperor_wolf">帝狼</a></td>
  <td>Ver. 1.5.0 β17～</td>
</tr>
<tr>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td><a href="wolf.php#immolate_mad">殉教者</a></td>
  <td>Ver. 1.5.0 α9～</td>
</tr>
<tr>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td><a href="fox.php#immolate_fox">野狐禅</a></td>
  <td>Ver. 1.5.0 β16～</td>
</tr>
<tr>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td><a href="fox.php#critical_fox">寿羊狐</a></td>
  <td>Ver. 1.5.0 β16～</td>
</tr>
<tr>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td><a href="lovers.php#snow_cupid">寒戸婆</a></td>
  <td>Ver. 1.5.0 β8～</td>
</tr>
<tr>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td><a href="lovers.php#cursed_angel">堕天使</a></td>
  <td>Ver. 1.5.0 β8～</td>
</tr>
<tr>
  <td><a href="quiz.php#quiz_group">出題者系</a></td>
  <td><a href="quiz.php#quiz">出題者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td><a href="vampire.php#scarlet_vampire">屍鬼</a></td>
  <td>Ver. 1.5.0 β6～</td>
</tr>
<tr>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td><a href="chiroptera.php#dummy_chiroptera">夢求愛者</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td><a href="chiroptera.php#mirror_fairy">鏡妖精</a></td>
  <td></td>
</tr>
<tr>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td><a href="ogre.php#incubus_ogre">般若</a></td>
  <td>Ver. 1.4.0 β20～</td>
</tr>
<tr>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td><a href="ogre.php#succubus_yaksa">荼枳尼天</a></td>
  <td>Ver. 1.4.0 β19～</td>
</tr>
<tr>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td><a href="duelist.php#cowboy_duelist">無鉄砲者</a></td>
  <td>Ver. 1.5.0 β6～</td>
</tr>
<tr>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td><a href="duelist.php#cute_avenger">草履大将</a></td>
  <td>Ver. 1.5.0 β6～</td>
</tr>
<tr>
  <td><a href="duelist.php#patron_group">後援者系</a></td>
  <td><a href="duelist.php#critical_patron">ひんな神</a></td>
  <td>Ver. 1.5.0 β6～</td>
</tr>
<tr>
  <td>神話マニア陣営</td>
  <td><a href="human.php#human">村人</a></td>
  <td></td>
</tr>
</table>
<h4>関連役職</h4>
<pre>
<a href="ability.php#dummy">夢能力者</a>
</pre>
<h5>Ver. 1.4.0 β14～</h5>
<pre>
変化するまでは霊界は公開されない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#soul_mania">覚醒者</a>の夢バージョンです。
最終的には自覚することができるので他の<a href="ability.php#dummy">夢系</a>と比べると対応はしやすいかもしれません。
</pre>

<h2 id="unknown_mania_group">鵺系</h2>
<p>
<a href="#unknown_mania_rule">基本ルール</a>
<a href="#unknown_mania_camp">所属陣営判定</a>
</p>
<p>
<a href="#unknown_mania">鵺</a>
<a href="#wirepuller_mania">黒衣</a>
<a href="#fire_mania">青行灯</a>
<a href="#sacrifice_mania">影武者</a>
<a href="#resurrect_mania">僵尸</a>
<a href="#revive_mania">五徳猫</a>
</p>

<h3 id="unknown_mania_rule">基本ルール [鵺系]</h3>
<ol>
<li>初日の夜に誰か一人を選んでその人と同じ所属陣営になる、特殊な神話マニア。</li>
<li>所属陣営が変更されるのは 2 日目の朝で、自分とコピー先が<a href="sub_role.php#mind_friend">共鳴者</a>になる。</li>
<li>生存カウントは常に村人なので、実質は所属陣営不明の狂人相当になる。</li>
<li><a href="#mania">神話マニア</a>と違い、コピー結果が出ないのでコピー先に聞かないと
自分の所属陣営が分からない。</li>
</ol>

<h3 id="unknown_mania_camp">所属陣営判定</h3>
<pre>
1. 鵺 → <a href="human.php#human">村人</a> (村人陣営)
擬似<a href="human.php#common_group">共有者</a>相当になります。

2. 鵺 → <a href="wolf.php#wolf">人狼</a> (人狼陣営)
コピー先とだけ会話できる<a href="wolf.php#whisper_mad">囁き狂人</a>相当です。

3. 鵺 → <a href="fox.php#fox">妖狐</a> (妖狐陣営)
所属は妖狐ですが自身は妖狐カウントされないので気をつけましょう。

4. 鵺 → <a href="lovers.php#cupid">キューピッド</a> (恋人陣営)
自分の恋人を持たないキューピッド相当になります。

5. 鵺 → <a href="quiz.php#quiz">出題者</a> (出題者陣営)
妖狐同様、自身は出題者カウントされない点に注意してください。

6. 鵺 → <a href="vampire.php#vampire">吸血鬼</a> (吸血鬼陣営)
勝利条件は<a href="vampire.php#rule">基本ルール [吸血鬼]</a>参照。

7. 鵺 → <a href="chiroptera.php#chiroptera">蝙蝠</a> (蝙蝠陣営)
コピー先と会話できる蝙蝠相当になります。
相手の生死と自分の勝敗は無関係です。

8. 鵺 → <a href="ogre.php#ogre">鬼</a> (鬼陣営)
勝利条件は<a href="ogre.php#rule">基本ルール [鬼]</a>参照。

9. 鵺 → <a href="duelist.php#duelist">決闘者</a> (決闘者陣営)
勝利条件は<a href="duelist.php#rule">基本ルール [決闘者]</a>参照。

10. 鵺 → <a href="wolf.php#wolf">人狼</a>[恋人] (人狼陣営)
サブ役職は判定対象外 (<a href="human.php#medium">巫女</a>と同じ) なので
コピー先と勝利陣営が異なる、例外ケースとなります。

11. 鵺 → <a href="wolf.php#wolf">人狼</a>[<a href="sub_role.php#mind_read">サトラレ</a>] (人狼陣営)
コピー先が村人陣営の<a href="human.php#mind_scanner">さとり</a>に会話を覗かれている状態なので
コピー先からの情報入手が難しくなります。

12. 鵺A → 鵺B → <a href="wolf.php#wolf">人狼</a> (全員人狼陣営)
コピー先が鵺だった場合は鵺以外の役職に当たるまで
コピー先を辿って判定します。

13. 鵺A → 鵺B → 鵺C → 鵺A (全員村人陣営)
コピー先を辿る途中で同じ人に戻った場合は村人陣営になります。

14. 鵺 → <a href="#mania">神話マニア</a> → <a href="fox.php#fox">妖狐</a> (妖狐陣営)
神話マニアをコピーした場合はコピー結果の陣営になります。

15. 鵺A → <a href="#mania">神話マニア</a> → 鵺B → <a href="wolf.php#wolf">人狼</a>
神話マニアは鵺をコピーしたら村人になるので鵺のリンクが切れます。
結果として以下のようになります。
鵺A(村人陣営) → 村人(元神話マニア) / 鵺B (人狼陣営) → 人狼
</pre>
<h5>Ver. 1.4.0 β19～</h5>
<pre>
<a href="vampire.php">吸血鬼陣営</a>をコピーした場合の勝利条件判定を変更 (<a href="vampire.php#rule">基本ルール [吸血鬼]</a>参照)。
</pre>

<h3 id="unknown_mania">鵺 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α23～]</h3>
<pre>
鵺系の基本種。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
やる夫人狼の薔薇 GM に「初心者の指南用に使える役職」を
要請されてこういう実装にしてみました。
鵺が初心者をコピーして指南するイメージですね。

もしも、教えてもらう前にコピー先が死んでしまったら自分の所属陣営は
「正体不明」になる事になります。とっても理不尽ですね。
</pre>

<h3 id="wirepuller_mania">黒衣 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α5～]</h3>
<pre>
コピー先に<a href="sub_role.php#wirepuller_luck">入道</a>を付加する特殊な鵺。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#luck">得票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の雲居 一輪がモチーフで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/318" target="_top">新役職考案スレ(318)</a> が原型です。
能力の性質上、自分が死ぬとコピー先が吊られやすくなってしまうので
立ち回りに工夫が必要になります。
</pre>

<h3 id="fire_mania">青行灯 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β12～]</h3>
<pre>
コピー先に<a href="sub_role.php#wisp">鬼火</a>を付加する特殊な鵺。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#wisp">鬼火付加能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#fire_wolf">火狼</a>の鵺バージョンです。
コピー先の占い結果が実質「正体不明」になります。
</pre>

<h3 id="sacrifice_mania">影武者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β18～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
コピー先に<a href="sub_role.php#protected">庇護者</a>を付加する上位鵺。
人狼に襲撃されても死亡しない (襲撃は失敗扱い)。
襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は耐性無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#resist_wolf">人狼襲撃耐性能力者</a>・<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="lovers.php#sacrifice_angel">守護天使</a>の鵺バージョンです。
構想自体はこちらが先で、かなり前から検討されていた能力です。
</pre>

<h3 id="resurrect_mania">僵尸 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β13～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 蘇生 (40%) / 蘇生：不可 / 憑依：無効</h4>
<pre>
人狼に襲撃されて死亡した場合、一定確率 (40%) で蘇生する上位鵺。
</pre>
<ol>
<li>コピー先が生存している間のみ有効。</li>
<li>何度蘇生しても蘇生率は一定 (<a href="../weather.php#weather_full_revive">天候</a>の影響は受ける)。</li>
<li><a href="sub_role.php#lovers">恋人</a>になったら無効。</li>
<li>人狼の襲撃以外で死亡した場合は無効 (例：<a href="ability.php#assassin">暗殺</a>)。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="ogre.php#revive_ogre">茨木童子</a>の鵺バージョンで、東方 Project の宮古 芳香がモチーフです。
「キョンシー」と読みます。
</pre>

<h3 id="revive_mania">五徳猫 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β12～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + コピー先蘇生 / 蘇生：不可</h4>
<pre>
人狼の襲撃で死亡したらコピー先を蘇生する上位鵺。
<a href="ability.php#revive_limit">蘇生対象外</a> (選ばれた場合は失敗する)。
</pre>
<ol>
<li>蘇生<a href="../spec.php#vote_night">判定</a>は人狼襲撃成立直後で、その時点でコピー先が死亡している場合に有効となる。</li>
<li>コピー先が<a href="ability.php#revive_limit">蘇生制限対象者</a>だった場合は無効。</li>
<li>人狼の襲撃以外で死亡した場合 (例：暗殺) は無効。</li>
<li>身代わり君・コピー成立前・襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は無効。</li>
</ol>
<h5>Ver. 1.5.0 β13～</h5>
<pre>
<a href="../weather.php#weather_no_revive">天候「快晴」</a>の影響を受ける
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#presage_scanner">件</a>と<a href="human.php#sacrifice_cat">猫神</a>を合わせたような能力で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1305122951/65" target="_top">新役職考案スレ2(65)</a> が原型です。
条件次第で<a href="ability.php#possessed">憑依能力者</a>も騙ることができます。
</pre>
</body></html>
