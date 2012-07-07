<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('蝙蝠陣営');
?>
<p><a href="#rule">基本ルール</a></p>
<p>
<a href="#chiroptera_group">蝙蝠系</a>
<a href="#fairy_group">妖精系</a>
</p>

<h2 id="rule">基本ルール</h2>
<ol>
<li>自分が生き残ったら勝利、死んだら敗北となる特殊陣営です。</li>
<li>他陣営の勝敗と競合しません。<br>
  例) 村人陣営 + 生き残った蝙蝠が勝利
</li>
<li>自分以外の蝙蝠の生死と勝敗は無関係です。</li>
<li>他の蝙蝠がいても誰か分かりません。</li>
<li>生存カウントは村人です。</li>
<li><a href="human.php#psycho_mage">精神鑑定士</a>の判定は「正常」、<a href="human.php#sex_mage">ひよこ鑑定士</a>の判定は「蝙蝠」です。</li>
</ol>

<h2 id="chiroptera_group">蝙蝠系</h2>
<p>
<a href="#chiroptera">蝙蝠</a>
<a href="#poison_chiroptera">毒蝙蝠</a>
<a href="#cursed_chiroptera">呪蝙蝠</a>
<a href="#boss_chiroptera">大蝙蝠</a>
<a href="#elder_chiroptera">古蝙蝠</a>
<a href="#cute_chiroptera">萌蝙蝠</a>
<a href="#scarlet_chiroptera">紅蝙蝠</a>
<a href="#dummy_chiroptera">夢求愛者</a>
</p>

<h3 id="chiroptera">蝙蝠 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α21～]</h3>
<pre>
蝙蝠陣営の<a href="mania.php#basic_mania">基本種</a>。能力は何も持っていない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#sacrifice_common">首領</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
他陣営はいかに自陣の PP に引き込むかがポイントです。
</pre>

<h3 id="poison_chiroptera">毒蝙蝠 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α21～]</h3>
<h4>[耐性] 狩り：有効</h4>
<h4>[毒能力] 処刑：人狼系 + 妖狐陣営 + 蝙蝠陣営 / 襲撃：有り / 薬師判定：有り</h4>
<pre>
劣化<a href="human.php#strong_poison">強毒者</a>相当の毒を持った蝙蝠。
</pre>
<h5>Ver. 1.4.0 α22～</h5>
<pre>
処刑時の毒の発動対象を [人狼系 + 妖狐陣営 + 蝙蝠陣営] に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#poison">毒能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#poison_group">埋毒者</a>の蝙蝠バージョンです。
死んだ時点で負けなので本人には何の利益もない上に、
素直に CO するとほぼ間違いなく吊られるでしょう。
</pre>

<h3 id="cursed_chiroptera">呪蝙蝠 (占い結果：村人(呪返し) / 霊能結果：村人) [Ver. 1.4.0 α21～]</h3>
<h4>[耐性] 狩り：有効 / 占い：呪返し / 陰陽師：死亡</h4>
<pre>
呪いを持った蝙蝠。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#cursed_group">呪い能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#cursed_wolf">呪狼</a>の蝙蝠バージョンです。
どちらかと言うと、これを騙る狼や狐がやっかいですね。
素直に CO しても信用を取るのは難しいでしょう。
</pre>

<h3 id="boss_chiroptera">大蝙蝠 (占い結果：蝙蝠 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[耐性] 人狼襲撃：身代わり / 狩り：有効</h4>
<h4>[身代わり能力] 蝙蝠陣営</h4>
<pre>
身代わり能力を持った上位蝙蝠。
</pre>
<ol>
<li>身代わりの対象は他の蝙蝠陣営。</li>
<li>身代わりが発生した場合、<a href="wolf.php#wolf_group">人狼</a>の襲撃は失敗扱い。</li>
<li>身代わりで死亡した人の死因は「誰かの犠牲となって死亡したようです」。</li>
<li>本人は身代わりが発生しても分からない。</li>
<li>他の大蝙蝠が襲撃された場合は自分が身代わりになる可能性がある。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。</li>
</ol>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
身代わり君が大蝙蝠になる可能性がある。
身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#mage_chiroptera">特殊占い判定能力者</a>・<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
狼サイドから見ると、結果的には確実に一人殺せるので、
誰でもいいから人数を減らしたい時には便利な存在と言えます。
</pre>

<h3 id="elder_chiroptera">古蝙蝠 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β5～]</h3>
<pre>
処刑投票数が +1 される蝙蝠。詳細は<a href="human.php#elder">長老</a>参照。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#elder">長老</a>の蝙蝠バージョンです。
PP 要員に組み込まれることの多い蝙蝠陣営の花形と言える存在ですが
それゆえに目を付けられやすいでしょう。
</pre>

<h3 id="cute_chiroptera">萌蝙蝠 (占い結果：人狼 / 霊能結果：蝙蝠) [Ver. 1.5.0 α7～]</h3>
<pre>
占い結果が「人狼」、霊能結果が「蝙蝠」と判定される蝙蝠。
昼の間だけ、低確率で発言が遠吠えに入れ替わってしまう。
遠吠えの内容・発動率は<a href="wolf.php#cute_wolf">萌狼</a>と同じ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_human">特殊占い判定能力者</a>・<a href="ability.php#talk_convert">発言変換能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#cute_wolf">萌狼</a>の蝙蝠バージョンです。
霊能結果から、状況次第で<a href="vampire.php">吸血鬼</a>扱いされる可能性もあります。
</pre>

<h3 id="scarlet_chiroptera">紅蝙蝠 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β21～]</h3>
<pre>
<a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える蝙蝠。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#partner_scarlet">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="fox.php#scarlet_fox">紅狐</a>の蝙蝠バージョンです。
色々な陣営から敵視されやすいので生き延びるのが難しい役職ですね。
</pre>

<h3 id="dummy_chiroptera">夢求愛者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α24～]</h3>
<h4>[役職表示] <a href="lovers.php#self_cupid">求愛者</a></h4>
<h4>[耐性] 獏襲撃：死亡 / 精神鑑定：嘘つき</h4>
<pre>
本人には<a href="lovers.php#self_cupid">求愛者</a>と表示されている蝙蝠。
矢を撃つことはできるが<a href="sub_role.php#lovers">恋人</a>にはならず、矢を撃った先に<a href="sub_role.php#mind_receiver">受信者</a>もつかない。
<a href="wolf.php#dream_eater_mad">獏</a>に襲撃されると死亡する。

矢を撃ったはずの<a href="sub_role.php#lovers">恋人</a>が死んだのに自分が後追いしていない、
<a href="human.php#psycho_mage">精神鑑定士</a>から「嘘つき」、<a href="human.php#sex_mage">ひよこ鑑定士</a>から「蝙蝠」判定されるなどで
自分の正体を確認することができる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="lovers.php#self_cupid">求愛者</a>の夢バージョンですが、扱いとしては特殊蝙蝠です。
<a href="wolf.php#possessed_wolf">憑狼</a>が<a href="sub_role.php#lovers">恋人</a>を襲撃しても破綻しない状況を作るために作成しました。
</pre>


<h2 id="fairy_group">妖精系</h2>
<p>
<a href="#fairy_rule">基本ルール</a>
<a href="#fairy_do">悪戯の仕様</a>
<a href="#bad_status">悪戯の種類</a>
</p>
<p>
<a href="#fairy">妖精</a>
<a href="#spring_fairy">春妖精</a>
<a href="#summer_fairy">夏妖精</a>
<a href="#autumn_fairy">秋妖精</a>
<a href="#winter_fairy">冬妖精</a>
<a href="#greater_fairy">大妖精</a>
<a href="#light_fairy">光妖精</a>
<a href="#dark_fairy">闇妖精</a>
<a href="#grass_fairy">草妖精</a>
<a href="#sun_fairy">日妖精</a>
</p>
<p>
<a href="#moon_fairy">月妖精</a>
<a href="#star_fairy">星妖精</a>
<a href="#flower_fairy">花妖精</a>
<a href="#shadow_fairy">影妖精</a>
<a href="#mirror_fairy">鏡妖精</a>
<a href="#sweet_fairy">恋妖精</a>
<a href="#ice_fairy">氷妖精</a>
</p>

<h3 id="fairy_rule">基本ルール [妖精系]</h3>
<ol>
<li>夜に誰か一人に投票して、対象に<a href="#fairy_do">悪戯</a>します。</li>
<li><a href="human.php#dummy_guard">夢守人</a>に護衛されると死亡します。</li>
<li><a href="human.php#dummy_poison">夢毒者</a>を処刑すると毒に中ります。</li>
<li><a href="wolf.php#dream_eater_mad">獏</a>に襲撃されると死亡します。</li>
</ol>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
<a href="human.php#dummy_guard">夢守人</a>に護衛されると死亡します。
<a href="human.php#dummy_poison">夢毒者</a>を処刑すると毒に中ります。
<a href="wolf.php#dream_eater_mad">獏</a>に襲撃されると死亡します。
</pre>

<h3 id="fairy_do">悪戯の仕様</h3>
<ol>
<li>占いカテゴリに属し、呪い・占い妨害・厄払いの影響を受けます (例外あり)。</li>
<li>結果は本人には何も表示されません。</li>
<li>対象にサブ役職「<a href="sub_role.php#bad_status">悪戯</a>」が付加されます (例外あり)。</li>
<li>悪戯の効果は重複します (複数の妖精から悪戯されたら人数分の効果が出ます)。</li>
<li>身代わり君を悪戯の対象に選ぶ事もできます。</li>
</ol>

<h3 id="bad_status">悪戯の種類</h3>
<ol>
<li>発言妨害<br>対象の発言の先頭に無意味な文字列を追加する (当日限定)。</li>
<li>迷彩<br>悪戯先が人狼に襲撃されると、全員に特定のサブ役職が付加される (昼限定/例外あり)。<br>
「<a href="sub_role.php#bad_status">悪戯</a>」はつかない。
  <a href="wolf.php#hungry_wolf">餓狼</a>・<a href="wolf.php#possessed_wolf">憑狼</a>による襲撃の場合でも有効。
</li>
<li>死亡欄妨害<br>死亡メッセージ欄に無意味な文字列を表示する。「<a href="sub_role.php#bad_status">悪戯</a>」はつかない。</li>
<li>アイコンコピー<br>詳細は<a href="#shadow_fairy">影妖精</a>参照。</li>
<li>決選投票<br>詳細は<a href="#mirror_fairy">鏡妖精</a>参照。「<a href="sub_role.php#bad_status">悪戯</a>」はつかない。<br>悪戯ができるのは一日目のみで、対象は身代わり君以外の誰か二人。</li>
<li>悲恋<br>詳細は<a href="#sweet_fairy">恋妖精</a>参照。「<a href="sub_role.php#bad_status">悪戯</a>」はつかない。<br>悪戯ができるのは一日目のみで、対象は身代わり君以外の誰か二人。</li>
<li>凍傷<br>詳細は<a href="#ice_fairy">氷妖精</a>参照。「<a href="sub_role.php#bad_status">悪戯</a>」はつかない。</li>
</ol>
<h5>Ver. 2.0.0 α3～</h5>
<pre>
迷彩：「<a href="sub_role.php#bad_status">悪戯</a>」はつかない仕様に変更。
<a href="wolf.php#hungry_wolf">餓狼</a>・<a href="wolf.php#possessed_wolf">憑狼</a>による襲撃の場合でも有効になる仕様に変更。
</pre>

<h3 id="fairy">妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[悪戯能力] タイプ：発言妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
妖精系の<a href="mania.php#basic_mania">基本種</a>。追加する文字列は「<a href="human.php#common_group">共有者</a>の囁き」。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
自己証明能力を持った蝙蝠です。
しかし、証明方法が鬱陶しいので信用を得た上で吊られることもあるでしょう。
</pre>

<h3 id="spring_fairy">春妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[悪戯能力] タイプ：発言妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
春を告げる妖精。追加する文字列は「春ですよー」。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のリリーホワイトがモデルで、妖精系実装の着想となった存在です。
</pre>

<h3 id="summer_fairy">夏妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[悪戯能力] タイプ：発言妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
夏を告げる妖精。追加する文字列は「夏ですよー」。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#spring_fairy">春妖精</a>の夏バージョンです。
見え透いた位置ばかりを悪戯し続けると呪いで死ぬ可能性があるので気をつけましょう。
</pre>

<h3 id="autumn_fairy">秋妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[悪戯能力] タイプ：発言妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
秋を告げる妖精。追加する文字列は「秋ですよー」。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#spring_fairy">春妖精</a>の秋バージョンです。
<a href="sub_role.php#silent">無口</a>が同時にたくさんの妖精に悪戯されると何も発言できなくなる可能性があります。
理不尽ですね。
</pre>

<h3 id="winter_fairy">冬妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[悪戯能力] タイプ：発言妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
冬を告げる妖精。追加する文字列は「冬ですよー」。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#spring_fairy">春妖精</a>の冬バージョンです。
一見単純な能力に見えて、実は<a href="wolf.php#possessed_wolf">憑狼</a>システムの応用で実装されています。
</pre>

<h3 id="greater_fairy">大妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β1～]</h3>
<h4>[悪戯能力] タイプ：発言妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
発言のたびに追加される文字列がランダムで変化する妖精。
追加する文字列は「<a href="human.php#common_group">共有者</a>の囁き」「春ですよー」「夏ですよー」
「秋ですよー」「冬ですよー」のいずれか。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#fairy">妖精</a>・<a href="#spring_fairy">春妖精</a>・<a href="#summer_fairy">夏妖精</a>・<a href="#autumn_fairy">秋妖精</a>・<a href="#winter_fairy">冬妖精</a>の複合バージョンです。
妖精の上位種ではありますが、無意味です。
</pre>

<h3 id="light_fairy">光妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β7～]</h3>
<h4>[悪戯能力] タイプ：迷彩 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯先が人狼に襲撃されたら、次の日を全員<a href="sub_role.php#mind_open">公開者</a> (白夜) にする妖精。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#sun_brownie">八咫烏</a>・<a href="human.php#soul_wizard">八卦見</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dark_fairy">闇妖精</a>の<a href="sub_role.php#mind_open">公開者</a>バージョンです。
効果の特性上、例外的に当日の夜まで影響が出ます。
白夜になると会話能力が妨害されるので人外サイドが特に不利になります。
うかつに CO したら即座に噛み殺される事でしょう。
</pre>

<h3 id="dark_fairy">闇妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β7～]</h3>
<h4>[悪戯能力] タイプ：迷彩 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯先が人狼に襲撃されたら、次の日の昼を全員<a href="sub_role.php#blinder">目隠し</a> (宵闇) にする妖精。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#sun_brownie">八咫烏</a>・<a href="human.php#astray_wizard">左道使い</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「宵闇」は<a href="sub_role.php#blinder">目隠し</a>の実装時から構想があったシステムです。
宵闇になると役職の CO 状況を掴みづらくなるので村サイドが特に不利になります。
うかつに CO したら即座に吊られる事でしょう。
</pre>

<h3 id="grass_fairy">草妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[悪戯能力] タイプ：迷彩 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯先が人狼に襲撃されたら、次の日の昼を全員<a href="sub_role.php#grassy">草原迷彩</a>にする妖精。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#pierrot_wizard">道化師</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dark_fairy">闇妖精</a>の<a href="sub_role.php#grassy">草原迷彩</a>バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/654" target="_top">新役職考案スレ(654)</a> が原型です。
迷惑度が高いので自己証明をし過ぎると死が近づくことでしょう。
</pre>

<h3 id="sun_fairy">日妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[悪戯能力] タイプ：迷彩 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯先が人狼に襲撃されたら、次の日の昼を全員<a href="sub_role.php#invisible">光学迷彩</a>にする妖精。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dark_fairy">闇妖精</a>の<a href="sub_role.php#invisible">光学迷彩</a>バージョンです。
東方 Project のサニーミルクがモチーフです。
</pre>

<h3 id="moon_fairy">月妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[悪戯能力] タイプ：迷彩 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯先が人狼に襲撃されたら、次の日の昼を全員<a href="sub_role.php#earplug">耳栓</a>にする妖精。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dark_fairy">闇妖精</a>の<a href="sub_role.php#earplug">耳栓</a>バージョンです。
東方 Project のルナチャイルドがモチーフです。
</pre>

<h3 id="star_fairy">星妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[悪戯能力] タイプ：死亡欄妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯が成功すると、星に関するメッセージを死亡メッセージ欄に表示できる妖精。
初期設定は「～は昨夜、～座を見ていたようです」で、全部で26種類。
メッセージの中身は管理者が設定ファイルで変更可能。
</pre>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
メッセージの種類を13から26に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#pierrot_wizard">道化師</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#flower_fairy">花妖精</a>の星バージョンです。
東方 Project のスターサファイアがモチーフです。
</pre>

<h3 id="flower_fairy">花妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β12～]</h3>
<h4>[悪戯能力] タイプ：死亡欄妨害 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯が成功すると、花に関するメッセージを死亡メッセージ欄に表示できる妖精。
初期設定は「～の頭の上に～の花が咲きました」で、全部で26種類。
メッセージの中身は管理者が設定ファイルで変更可能。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#pierrot_wizard">道化師</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
死亡メッセージ欄に意味の無いメッセージを表示させることができる妖精です。
能力の性質上、存在を隠すことはできませんが、無害な存在ですね。
実装の都合で無駄に花の種類が多くなっているのでコンプリートするのは
難しいと思われます。
</pre>

<h3 id="shadow_fairy">影妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β20～]</h3>
<h4>[悪戯能力] タイプ：アイコンコピー / 占い妨害：有効 / 呪い：有効</h4>
<pre>
自分のアイコンと色を悪戯先と同じにする妖精。
</pre>
<ol>
<li>悪戯先が両方とも影妖精だった場合はお互いが入れ替わる。</li>
<li><a href="wolf.php#enchant_mad">狢</a>の能力が発動した場合は色だけが適用される。</li>
</ol>
<h4>[作成者からのコメント]</h4>
<pre>
小鳥鯖＠アイマス人狼の管理人さんへの誕生日プレゼントです。
似た名前の人を選ぶと会話が非常に分かりにくくなることになります。
</pre>

<h3 id="mirror_fairy">鏡妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β7～]</h3>
<h4>[悪戯能力] タイプ：決選投票 / 占い妨害：無効 / 呪い：無効</h4>
<pre>
本人が処刑されたら、次の日の昼を「決選投票」(初日に選んだ二人にしか投票できない) にする妖精。
</pre>
<ol>
<li>昼の投票画面を見る事で能力発動を確認できる。</li>
<li>対象に選んだ二人が両方生存している時のみ有効で、<br>対象が何らかの理由で昼に死亡した場合は即座に解除される。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
蒼星石テスト鯖＠やる夫人狼と裏世界鯖＠東方陰陽鉄人狼のとある村がモデルです。
システムメッセージは妖精系ですが、インターフェイスや内部処理は
<a href="lovers.php">キューピッド系</a>の処理を流用しています。
</pre>

<h3 id="sweet_fairy">恋妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β6～]</h3>
<h4>[悪戯能力] タイプ：悲恋 / 占い妨害：無効 / 呪い：無効</h4>
<pre>
悪戯先に<a href="sub_role.php#sweet_status">悲恋</a>を付加する妖精。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
水銀燈鯖＠やる夫人狼のとある村で発生したバグがモデルです。
</pre>

<h3 id="ice_fairy">氷妖精 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β16～]</h3>
<h4>[悪戯能力] タイプ：凍傷 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯先に<a href="sub_role.php#frostbite">凍傷</a>を付加する妖精。
成功率は 70% で、失敗すると自分が<a href="sub_role.php#frostbite">凍傷</a>になる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#pierrot_wizard">道化師</a>・<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#snow_trap_mad">雪女</a>の能力を妖精に転化してみました。
</pre>
</body></html>
