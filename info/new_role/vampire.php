<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('吸血鬼陣営');
?>
<p>
<a href="#rule">基本ルール</a>
<a href="#vampire_do">吸血の仕様</a>
<a href="#infected">感染者の仕様</a>
</p>
<p>
<a href="#vampire_group">吸血鬼系</a>
</p>

<h2 id="rule">基本ルール</h2>
<ol>
<li>他国の「カルトリーダー」・「笛吹き」に相当します。</li>
<li>勝利条件は「生存者が自分と自分の<a href="#infected">感染者</a>のみになっていること」で、本人だけが勝利扱いになります。</li>
<li>生存者が自分一人だけになった場合も勝利となります。</li>
<li>勝利条件を満たした時に恋人が生存していた場合は<a href="lovers.php">恋人陣営</a>勝利になります。</li>
<li>吸血鬼陣営をコピーした変化前の<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>と<a href="mania.php#unknown_mania_group">鵺系</a>の勝利条件は<br>
  例外的に「吸血鬼陣営の誰かが勝利」となります。コピー先の勝敗や自己の生存は不問です。
</li>
<li>2 日目以降の夜に誰か一人を襲撃して<a href="sub_role.php#infected">感染者</a>にすることができます。</li>
<li>生存カウントは村人です。</li>
<li><a href="human.php#psycho_mage">精神鑑定士</a>の判定は「正常」、<a href="human.php#sex_mage">ひよこ鑑定士</a>の判定は「性別」です。</li>
</ol>
<h5>Ver. 1.4.0 β19～</h5>
<pre>
吸血鬼陣営をコピーした変化前の<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>と<a href="mania.php#unknown_mania_group">鵺系</a>の勝利条件は
例外的に「吸血鬼陣営の誰かが勝利」となります。
コピー先の勝敗や自己の生存は不問です。
</pre>

<h2 id="vampire_do">吸血の仕様</h2>
<ol>
<li>襲撃先が<a href="human.php#guard_group">狩人系</a>に護衛されていた場合は失敗し、狩人には「護衛成功」のメッセージが出ます。</li>
<li><a href="human.php#guard_group">狩人系</a>の護衛判定は<a href="human.php#guard_limit">護衛制限</a>が適用されます。</li>
<li><a href="human.php#hunter_guard">猟師</a>が護衛成功しても死亡しません。</li>
<li><a href="human.php#blind_guard">夜雀</a>・<a href="ability.php#trap">罠能力者</a>の能力は有効です。</li>
<li><a href="human.php#escaper_group">逃亡者系</a>との関係は<a href="human.php#escaper_rule">基本ルール [逃亡者] </a>を参照してください。</li>
<li>一定の条件で襲撃先が死亡します (吸血死)。<br>
  死亡メッセージは人狼の襲撃と同じで、死因は「血を吸い尽くされた」です。
</li>
<li>吸血鬼が吸血鬼を襲撃すると吸血死が発生します。相互襲撃の場合は相討ちとなります。</li>
<li><a href="#incubus_vampire">青髭公</a>・<a href="#succubus_vampire">飛縁魔</a>は一定の条件で襲撃先を吸血死させます。<br>
  <a href="human.php#detective_common">探偵</a>・<a href="wolf.php#sirius_wolf">天狼</a> (覚醒状態)・<a href="sub_role.php#challenge_lovers">難題</a>を対象にした場合は発生しません。
</li>
<li><a href="#doom_vampire">冥血鬼</a>は吸血鬼の襲撃を無効化します。</li>
<li><a href="#soul_vampire">吸血姫</a>は吸血鬼の襲撃を反射し、襲撃した吸血鬼が吸血死します。<br>
  <a href="#soul_vampire">吸血姫</a>が相互襲撃した場合は互いに反射して相討ちとなります。
</li>
<li>吸血鬼をコピーした変化前の<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>が襲撃された場合は吸血死します。</li>
<li><a href="mania.php#unknown_mania_group">鵺系</a>はコピー先に関係なく吸血できます。</li>
</ol>
<h5>Ver. 1.5.0 β12～</h5>
<pre>
吸血鬼をコピーした<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>・<a href="mania.php#unknown_mania_group">鵺系</a>に関する仕様を変更。
<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>：吸血無効→吸血死
<a href="mania.php#unknown_mania_group">鵺系</a>：吸血無効→吸血有効
</pre>
<h5>Ver. 1.5.0 β6～</h5>
<pre>
吸血鬼同士の襲撃に関する仕様を変更。
</pre>
<h5>Ver. 1.4.0 β20～</h5>
<pre>
<a href="human.php#escaper">逃亡者</a>との関係の仕様を変更。
</pre>

<h2 id="infected">感染者の仕様</h2>
<ol>
<li><a href="sub_role.php#infected">感染者</a>になっても自覚がありません。</li>
<li><a href="sub_role.php#psycho_infected">洗脳者</a>がいる場合は吸血鬼陣営共通の<a href="sub_role.php#infected">感染者</a>と扱われます。</li>
</ol>


<h2 id="vampire_group">吸血鬼系</h2>
<p>
<a href="#vampire">吸血鬼</a>
<a href="#incubus_vampire">青髭公</a>
<a href="#succubus_vampire">飛縁魔</a>
<a href="#doom_vampire">冥血鬼</a>
<a href="#sacrifice_vampire">吸血公</a>
<a href="#soul_vampire">吸血姫</a>
<a href="#scarlet_vampire">屍鬼</a>
</p>

<h3 id="vampire">吸血鬼 (占い結果：蝙蝠 / 霊能結果：蝙蝠) [Ver. 1.4.0 β14～]</h3>
<pre>
吸血鬼陣営の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
<a href="#rule">勝利条件</a>の性質上、短期決戦を狙うことで簡単に勝利を阻むことができますが
対妖狐が疎かになってしまうジレンマが存在します。
</pre>

<h3 id="incubus_vampire">青髭公 (占い結果：蝙蝠 / 霊能結果：蝙蝠) [Ver. 1.4.0 β18～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
女性しか<a href="sub_role.php#infected">感染者</a>にできない特殊な吸血鬼 (女性以外なら吸血死)。
</pre>
<h5>Ver. 1.4.0 β19～</h5>
<pre>
<a href="human.php#guard_hunt">狩人の護衛</a>で死亡する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#succubus_vampire">飛縁魔</a>・<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
擬似的な暗殺能力を持った吸血鬼で、童話「青ひげ」がモチーフです。
勝利条件を考えると吸血死狙いの襲撃は効率が悪いと思われます。
</pre>

<h3 id="succubus_vampire">飛縁魔 (占い結果：蝙蝠 / 霊能結果：蝙蝠) [Ver. 1.4.0 β18～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
男性しか<a href="sub_role.php#infected">感染者</a>にできない特殊な吸血鬼 (男性以外なら吸血死)。
</pre>
<h5>Ver. 1.4.0 β19～</h5>
<pre>
<a href="human.php#guard_hunt">狩人の護衛</a>で死亡する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#incubus_vampire">青髭公</a>・<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#incubus_vampire">青髭公</a>の対女性バージョンです。「ひのえんま」と読みます。
村の男女構成比次第で難易度が大きく変わることになります。
</pre>

<h3 id="doom_vampire">冥血鬼 (占い結果：蝙蝠 / 霊能結果：蝙蝠) [Ver. 1.4.0 β19～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 狩り：有効 / 吸血襲撃：無効</h4>
<pre>
吸血先に<a href="sub_role.php#infected">感染者</a>と<a href="sub_role.php#death_warrant">死の宣告</a>を同時につけてしまう特殊な吸血鬼。
<a href="sub_role.php#death_warrant">死の宣告</a>の発動日は投票した夜から数えて 4 日目後の昼。
<a href="wolf.php#wolf_group">人狼</a>・<a href="#vampire_do">吸血鬼</a>の襲撃を無効化する。
襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は耐性無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#doom">死の宣告能力者</a>・<a href="ability.php#resist_wolf">人狼襲撃耐性能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#doom_wolf">冥狼</a>の吸血鬼バージョンです。
耐性を得た代わりに、<a href="sub_role.php#infected">感染者</a>のキープが難しくなっています。
</pre>

<h3 id="sacrifice_vampire">吸血公 (占い結果：蝙蝠 / 霊能結果：蝙蝠) [Ver. 1.4.0 β17～]</h3>
<h4>[耐性] 人狼襲撃：身代わり / 狩り：有効</h4>
<h4>[身代わり能力] 自分の感染者</h4>
<pre>
身代わり能力を持つ上位吸血鬼。
</pre>
<ol>
<li>身代わりの対象は自分の<a href="sub_role.php#infected">感染者</a>。</li>
<li>身代わりが発生した場合、<a href="wolf.php#wolf_group">人狼</a>の襲撃は失敗扱い。</li>
<li>代わりに死んだ人の死因は「誰かの犠牲となって死亡したようです」。</li>
<li>本人は身代わりが発生しても分からない。</li>
<li>逃亡失敗・人狼に遭遇して死亡した<a href="human.php#escaper_group">逃亡者系</a>を身代わりにすることはできない。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>の吸血鬼バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/728" target="_top">新役職考案スレ(728)</a> が原型です。
対人狼において高い生存力を持つので強気に騙ることができます。
</pre>

<h3 id="soul_vampire">吸血姫 (占い結果：蝙蝠 / 霊能結果：蝙蝠) [Ver. 1.4.0 β19～]</h3>
<h4>[耐性] 狩り：有効 / 吸血襲撃：反射 / 暗殺：反射</h4>
<pre>
<a href="#vampire_do">感染</a>させる事に成功した人の役職を知ることができる上位吸血鬼。
<a href="human.php#assassin_spec">暗殺反射</a>・<a href="#vampire_do">吸血反射</a>を持つ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#soul">役職鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
吸血鬼系最上位種としてデザインしました。
<a href="human.php#soul_mage">魂の占い師</a>をほぼ完璧に騙ることができますが、信用を得ると狙われやすくなる上、
護衛を引きつけてもダメなので難易度は高いと思われます。
</pre>

<h3 id="scarlet_vampire">屍鬼 (占い結果：蝙蝠 / 霊能結果：蝙蝠) [Ver. 1.5.0 β6～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 蘇生 (40%) / 蘇生：不可 / 憑依：無効</h4>
<pre>
<a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える特殊な吸血鬼。
人狼に襲撃されて死亡した場合、一定確率 (40%) で蘇生する。
</pre>
<ol>
<li>何度蘇生しても蘇生率は一定。</li>
<li><a href="sub_role.php#lovers">恋人</a>になったら蘇生能力は無効。</li>
<li>人狼の襲撃以外で死亡した場合 (例：<a href="ability.php#assassin">暗殺</a>)、蘇生能力は無効。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、蘇生能力は無効。</li>
</ol>
<h5>Ver. 1.5.0 β16～</h5>
<pre>
自己蘇生能力取得
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#partner_scarlet">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="chiroptera.php#scarlet_chiroptera">紅蝙蝠</a>の吸血鬼バージョンです。
潜伏するのが難しいので劣化種扱いとなります。
</pre>
</body></html>
