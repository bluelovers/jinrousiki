<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('妖狐陣営');
?>
<p>
<a href="#partner">仲間表示</a>
<a href="#talk">夜の会話 (念話)</a>
</p>
<p>
<a href="#fox_group">妖狐系</a>
<a href="#child_fox_group">子狐系</a>
</p>

<h2 id="partner">仲間表示</h2>
<ol>
<li>全ての妖狐は<a href="#silver_fox">銀狐</a>以外の<a href="#fox_group">妖狐系</a>・<a href="#child_fox_group">子狐系</a>が誰か分かる。</li>
<li><a href="#fox_group">妖狐系</a>と<a href="#child_fox_group">子狐系</a>は別枠で表示される (<a href="wolf.php">人狼陣営</a>における<a href="wolf.php#wolf_group">人狼系</a>と<a href="wolf.php#whisper_mad">囁き狂人</a>相当)。<br>

</li>
<li><a href="#fox_group">妖狐系</a>は「深遠なる妖狐の智を持つ同胞は以下の人たちです」と表示され、<a href="#talk">念話</a>ができる。</li>
<li><a href="#child_fox_group">子狐系</a>は「妖狐に与する仲間は以下の人たちです」と表示され、<br>
同じ枠に<a href="human.php#scarlet_doll">和蘭人形</a>・<a href="wolf.php#scarlet_wolf">紅狼</a>・<a href="lovers.php#scarlet_angel">紅天使</a>・<a href="vampire.php#scarlet_vampire">屍鬼</a>・<a href="chiroptera.php#scarlet_chiroptera">紅蝙蝠</a>も混ざって表示される。</li>
<li><a href="sub_role.php#mind_lonely">はぐれ者</a>になると仲間が分からなくなり、仲間リストからも消える (<a href="#silver_fox">銀狐</a>と同じ)。</li>
<li><a href="#possessed_fox">憑狐</a>が憑依すると仲間表示が憑依先の名前に変更される。</li>
</ol>
<h5>Ver. 1.5.0 α8～</h5>
<pre>
<a href="#possessed_fox">憑狐</a>が憑依すると仲間表示が憑依先の名前に変更される。
</pre>
<h5>Ver. 1.4.0 α19～</h5>
<pre>
<a href="#fox_group">妖狐系</a>から<a href="#child_fox">子狐</a>が誰か分かる。
<a href="#fox_group">妖狐系</a>と<a href="#child_fox">子狐</a>は別枠で表示される。
</pre>
<h5>Ver. 1.4.0 α3-7～</h5>
<pre>
全ての妖狐は<a href="#child_fox">子狐</a>以外の<a href="#fox_group">妖狐系</a>が誰か分かる。
<a href="#child_fox">子狐</a>は全ての妖狐が誰か分かる。
同一の枠で表示されるので種類は不明。
</pre>

<h2 id="talk">夜の会話 (念話)</h2>
<ol>
<li><a href="#silver_fox">銀狐</a>以外の<a href="#fox_group">妖狐系</a>は夜に会話 (念話) できる。</li>
<li>2日目以降は<a href="human.php#telepath_scanner">念騒霊</a>の独り言も表示される。<a href="human.php#leader_common">指導者</a>の発言とは区別できない。</li>
<li>他人からはいっさい見えない。</li>
<li><a href="#child_fox_group">子狐系</a>は念話を見ることも参加することもできない。</li>
<li><a href="wolf.php#wise_wolf">賢狼</a>・<a href="ogre.php#wise_ogre">夜行鬼</a>には念話が<a href="human.php#common_group">共有者</a>の囁きに変換されて表示される。</li>
<li><a href="sub_role.php#mind_lonely">はぐれ者</a>になると夜の発言が独り言になり、念話に参加できなくなる (<a href="#silver_fox">銀狐</a>と同じ)。</li>
</ol>
<h5>Ver. 1.4.0 α3-7～</h5>
<pre>
全ての<a href="#fox_group">妖狐系</a>は夜に会話 (念話) できる。
<a href="#child_fox_group">子狐系</a>は念話を見ることも参加することもできない。
</pre>


<h2 id="fox_group">妖狐系</h2>
<p>
<a href="#fox">妖狐</a>
<a href="#white_fox">白狐</a>
<a href="#black_fox">黒狐</a>
<a href="#mist_fox">霧狐</a>
<a href="#gold_fox">金狐</a>
<a href="#phantom_fox">幻狐</a>
<a href="#poison_fox">管狐</a>
<a href="#blue_fox">蒼狐</a>
<a href="#spell_fox">宙狐</a>
<a href="#sacrifice_fox">白蔵主</a>
</p>
<p>
<a href="#emerald_fox">翠狐</a>
<a href="#voodoo_fox">九尾</a>
<a href="#revive_fox">仙狐</a>
<a href="#possessed_fox">憑狐</a>
<a href="#doom_fox">冥狐</a>
<a href="#trap_fox">狡狐</a>
<a href="#cursed_fox">天狐</a>
<a href="#elder_fox">古狐</a>
<a href="#cute_fox">萌狐</a>
<a href="#scarlet_fox">紅狐</a>
</p>
<p>
<a href="#silver_fox">銀狐</a>
<a href="#immolate_fox">野狐禅</a>
</p>

<h3 id="fox">妖狐 (占い結果：村人(呪殺) / 霊能結果：村人)</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
妖狐陣営の<a href="mania.php#basic_mania">基本種</a>。
</pre>

<h3 id="white_fox">白狐 (占い結果：村人(呪殺無し) / 霊能結果：妖狐) [Ver. 1.4.0 α17～]</h3>
<h4>[耐性] 人狼襲撃：死亡</h4>
<pre>
呪殺されない代わりに<a href="wolf.php#wolf_group">人狼</a>に襲撃されると死亡する妖狐。
<a href="#child_fox">子狐</a>との違いは占いができない代わりに他の妖狐と<a href="#talk">念話</a>ができる事。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_human">特殊占い判定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#boss_wolf">白狼</a>の妖狐バージョンです。
占いでは捉まらないので、騙りであると分かっても狂人と区別するのが難しい存在です。
</pre>

<h3 id="black_fox">黒狐 (占い結果：人狼(呪殺無し) / 霊能結果：妖狐) [Ver. 1.4.0 α24～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
占い結果が「人狼」、霊能結果が「妖狐」と判定される妖狐。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_wolf">特殊占い判定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
呪殺されない代わりに人狼扱いされる妖狐です。
人狼側から見ると、占い師の真贋が読みづらくなる上に
霊能者騙りの障害となるので非常に厄介な存在です。
</pre>

<h3 id="mist_fox">霧狐 (占い結果：蝙蝠(呪殺無し) / 霊能結果：妖狐) [Ver. 1.5.0 β7～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
占い結果が「蝙蝠」、霊能結果が「妖狐」と判定される妖狐。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_chiroptera">特殊占い判定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#mist_wolf">霧狼</a>の妖狐バージョンです。
<a href="human.php#dummy_mage">夢見人</a>にも捉まるので対占いは辛いですが、騙りを把握しやすくなります。
</pre>

<h3 id="gold_fox">金狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 β8～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
<a href="human.php#sex_mage">ひよこ鑑定士</a>の判定が「<a href="chiroptera.php">蝙蝠</a>」になる妖狐。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#gold_wolf">金狼</a>・<a href="sub_role.php#gold_wisp">松明丸</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#gold_wolf">金狼</a>の妖狐バージョンです。
この役職でメイン役職の総数が既存のものと合わせてちょうど 100 になりました。
</pre>

<h3 id="phantom_fox">幻狐 (占い結果：村人(呪殺) / 霊能結果：妖狐) [Ver. 1.4.0 β11～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 狩り：有効 / 占い：無効 (1回限定) / 封印：有効</h4>
<pre>
一度だけ、自分が占われても占い妨害をする事ができる妖狐。
妨害能力は<a href="wolf.php#phantom_wolf">幻狼</a>参照。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#phantom">占い妨害能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#phantom_wolf">幻狼</a>の妖狐バージョンです。
二回占われると呪殺されてしまうので、どう対応するかがポイントです。
</pre>

<h3 id="poison_fox">管狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 毒</h4>
<h4>[毒能力] 処刑：妖狐陣営以外 / 襲撃：有り / 薬師判定：有り</h4>
<pre>
毒を持った妖狐。毒の対象は妖狐陣営以外。
<a href="wolf.php#wolf_group">人狼</a>に襲撃されたら死亡して毒が発動する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#poison">毒能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#poison_group">埋毒者</a>の妖狐バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/110" target="_top">新役職考案スレ(110)</a> が原型です。
「くだぎつね」と読みます。仲間がいるときに真価を発揮します。
</pre>

<h3 id="blue_fox">蒼狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 β8～]</h3>
<h4>[耐性] 人狼襲撃：無効 + はぐれ者</h4>
<pre>
<a href="wolf.php#wolf_group">人狼</a>に襲撃されたら襲撃してきた人狼を<a href="sub_role.php#mind_lonely">はぐれ者</a>にする妖狐。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#blue_wolf">蒼狼</a>・<a href="#spell_fox">宙狐</a>・<a href="#emerald_fox">翠狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#blue_wolf">蒼狼</a>の妖狐バージョンです。
発動すると相手に正体がばれてしまうので、積極的に狙うというよりは
「襲撃してきた人狼に一矢報いる」タイプの能力ですね。
</pre>

<h3 id="spell_fox">宙狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.5.0 β7～]</h3>
<h4>[耐性] 人狼襲撃：無効 (常時) + 狐火 (一回限定) / 封印：有効</h4>
<pre>
一度だけ、<a href="wolf.php#wolf_group">人狼</a>に襲撃されたら襲撃してきた人狼に<a href="sub_role.php#spell_wisp">狐火</a>を付加する妖狐。
付加に成功すると能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>) が、喪失後に襲撃されても死亡しない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#blue_fox">蒼狐</a>・<a href="ability.php#wisp">鬼火付加能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#blue_fox">蒼狐</a>の<a href="sub_role.php#spell_wisp">狐火</a>バージョンです。
狼を呪殺させることで狐候補を押し付けることが出来ますが、
呪殺した占い師に村の信用を与えてしまうことにもなります。
</pre>

<h3 id="sacrifice_fox">白蔵主 (占い結果：村人(呪殺無し) / 霊能結果：妖狐) [Ver. 1.5.0 β13～]</h3>
<h4>[耐性] 人狼襲撃：身代わり</h4>
<h4>[身代わり能力] 子狐系・蝙蝠系</h4>
<pre>
占いで呪殺されず、<a href="wolf.php#wolf_group">人狼</a>に襲撃された時に、<a href="#child_fox_group">子狐系</a>・<a href="chiroptera.php#chiroptera_group">蝙蝠系</a>を身代わりにして
生き延びる事ができる妖狐。
</pre>
<ol>
<li>身代わりが発生した場合、<a href="wolf.php#wolf_group">人狼</a>の襲撃は失敗扱い。</li>
<li>身代わりで死亡した人の死因は「誰かの犠牲となって死亡したようです」。</li>
<li>本人は身代わりが発生しても分からない。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_human">特殊占い判定能力者</a>・<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>の妖狐バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1305122951/119" target="_top">新役職考案スレ2(119)</a> が原型です。「はくぞうす」と読みます。
対占い耐性も含めて高い生存力を持ちますが、身代わり発生を人狼に察知されてしまうと
襲撃され続けることで逆に子狐ごと根絶やしにされてしまうリスクがあります。
</pre>

<h3 id="emerald_fox">翠狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 β8～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 封印：有効</h4>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 月兎：有効 / 呪い：有効</h4>
<pre>
一度だけ、占った人が<a href="#talk">念話</a>できない妖狐だった場合に自分と占った人を<a href="sub_role.php#mind_friend">共鳴者</a>にする妖狐。
</pre>
<ol>
  <li>能力の発動対象は<a href="#silver_fox">銀狐</a>・<a href="#child_fox_group">子狐系</a>・<a href="sub_role.php#mind_lonely">はぐれ者</a>の妖狐のいずれか。</li>
  <li>インターフェイスは占いと同じだが、結果は何も表示されない。</li>
  <li><a href="sub_role.php#mind_friend">共鳴者</a>を作る事に成功すると能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。</li>
  <li><a href="wolf.php#blue_wolf">蒼狼</a>の襲撃先を占って、占い先が<a href="sub_role.php#mind_lonely">はぐれ者</a>になってもその夜には能力は発動しない。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#emerald_wolf">翠狼</a>・<a href="#blue_fox">蒼狐</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#emerald_wolf">翠狼</a>の妖狐バージョンです。
一度しか使えないので、発動するタイミングや相手の選択がポイントになるかもしれません。
</pre>

<h3 id="voodoo_fox">九尾 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 α20～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 狩り：有効</h4>
<pre>
夜に村人一人を選び、その人に呪いをかける妖狐。
呪い能力は<a href="wolf.php#voodoo_mad">呪術師</a>参照。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#cursed_group">呪い能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#voodoo_mad">呪術師</a>の妖狐バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/58" target="_top">新役職考案スレ(58)</a> が原型です。
対占い・対人狼襲撃耐性は通常の<a href="#fox">妖狐</a>と同じですが
呪い能力を持った代わりに<a href="human.php#guard_hunt">狩人</a>にも弱くなっています。
</pre>

<h3 id="revive_fox">仙狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 β2～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 狩り：有効 / 蘇生：不可 / 封印：有効</h4>
<h4>[蘇生能力] 成功率：100% (1回限定) / 誤爆：有り</h4>
<pre>
<a href="human.php#revive_rule">蘇生能力</a>を持った妖狐。
蘇生成功率は 100% で、一度成功すると能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#revive_cat">仙狸</a>の妖狐バージョンです。
確実に成功しますが、1/5 (20%) は誤爆になるので要注意です。
単純に味方の妖狐を蘇生させる以外の選択肢が一番有効になる
ケースがあるのが妖狐陣営の蘇生能力者のポイントです。
</pre>

<h3 id="possessed_fox">憑狐 (占い結果：村人(呪殺) / 霊能結果：妖狐) [Ver. 1.4.0 β9～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 狩り：有効 / 陰陽師：死亡 / 封印：有効 / 憑依：無効</h4>
<pre>
一度だけ、死体に憑依することができる妖狐。
</pre>
<ol>
<li>身代わり君・<a href="wolf.php">人狼陣営</a>・<a href="lovers.php">恋人陣営</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>には憑依できない。</li>
<li>憑依を実行した時に<a href="human.php#anti_voodoo">厄神</a>に護衛されると憑依に失敗する。</li>
<li>憑依を実行しなければ<a href="human.php#anti_voodoo">厄神</a>に護衛されても「厄払い成功」とは判定されない。</li>
<li>憑依を実行した時に占い能力者に占われても憑依妨害は受けない。</li>
<li>憑依中に<a href="human.php#anti_voodoo">厄神</a>に護衛されると憑依状態を解かれて元の体に戻される。</li>
<li>複数の憑依能力者が同時に同じ人に憑依しようとした場合は全員憑依失敗扱いになる。</li>
</ol>
<h5>Ver. 1.4.11 / Ver. 1.5.0 β13～</h5>
<pre>
憑依無効
</pre>
<h5>Ver. 1.4.0 β12～</h5>
<pre>
<a href="human.php#revive_priest">天人</a>・<a href="human.php#detective_common">探偵</a> (<a href="wolf.php#possessed_wolf">憑狼</a>が憑依できない役職) には憑依できない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#sacrifice_cat">猫神</a>・<a href="ability.php#possessed">憑依能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#possessed_mad">犬神</a>の妖狐バージョンです。
<a href="wolf.php#possessed_wolf">憑狼</a>よりも看破されやすいので、能力を使いにくいと思います。
存在自体が脅威になるタイプですね。
</pre>

<h3 id="doom_fox">冥狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 β15～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 罠：有効 / 狩り：有効</h4>
<pre>
遅効性の<a href="human.php#doom_assassin">死神</a>相当の<a href="ability.php#assassin">暗殺能力</a>を持った妖狐。
暗殺能力は<a href="human.php#doom_assassin">死神</a>と同じで、<a href="sub_role.php#death_warrant">死の宣告</a>の発動日は投票した夜から数えて 4 日目後の昼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#doom">死の宣告能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#doom_wolf">冥狼</a>の妖狐バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/614" target="_top">新役職考案スレ(614)</a> が原型です。
流石兄弟鯖＠やる夫人狼の管理人さんがモチーフです。
発動日が違うので存在がすぐにばれることになります。
</pre>

<h3 id="trap_fox">狡狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.5.0 α8～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 狩り：有効 / 封印：有効</h4>
<pre>
一度だけ夜に誰か一人に罠を仕掛けることができる妖狐。
罠に関する仕様は<a href="wolf.php#trap_mad">罠師</a>と同じ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#trap">罠能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#trap_mad">罠師</a>の妖狐バージョンです。
狩人・人狼狙いで襲撃されそうな人に仕掛けるのもよし、
味方を暗殺の脅威から保護するのもよしですね。
</pre>

<h3 id="cursed_fox">天狐 (占い結果：村人(呪返し) / 霊能結果：妖狐) [Ver. 1.4.0 α17～]</h3>
<h4>[耐性] 人狼襲撃：無効 / 狩り：有効 / 暗殺：反射 / 占い：呪返し / 陰陽師：死亡</h4>
<pre>
呪い・<a href="human.php#assassin_spec">暗殺反射</a>能力を持った妖狐。
自分を占った<a href="human.php#mage_group">占い師</a>を呪い殺すことができる (死因は「呪返し」)。
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
<a href="human.php#assassin_spec">暗殺反射</a>能力を持つ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#cursed_group">呪い能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#cursed_wolf">呪狼</a>の妖狐バージョンで、妖狐系最上位種です。
呪いに対抗できる役職が出現するまでは狐無双が見られそうですね。
</pre>

<h3 id="elder_fox">古狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 β5～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
投票数が +1 される妖狐。詳細は<a href="human.php#elder">長老</a>参照。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#elder">長老</a>の妖狐バージョンです。
妖狐陣営による PP はめったに発生しないので、能力を有効活用するのは難しいでしょう。
</pre>

<h3 id="cute_fox">萌狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 α24～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
昼の間だけ、低確率で発言が遠吠えに入れ替わってしまう妖狐。
遠吠えの内容・発動率は<a href="wolf.php#cute_wolf">萌狼</a>と同じ。
</pre>
<h5>Ver. 1.4.0 β7～</h5>
<pre>
遠吠えの入れ替え発動を昼限定に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#talk_convert">発言変換能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#cute_wolf">萌狼</a>の妖狐バージョンです。
<a href="human.php#suspect">不審者</a>と違い、占われたら呪殺されますが、いずれにしても
「村人判定された人が遠吠えをした」場合、占った人は偽者です。
</pre>

<h3 id="scarlet_fox">紅狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 α24～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
<a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える妖狐。
</pre>
<h5>Ver. 1.4.0 β21～</h5>
<pre>
<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#partner_scarlet">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
やる夫人狼の初日呪殺アイコンの代名詞の一つである、ローゼンメイデンの真紅がモデルです。
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/383" target="_top">新役職考案スレ(383)</a> が原型です。
始めは「占い師に分かる妖狐」にしましたがバランス取りが難しいのでこういう実装になりました。
</pre>

<h3 id="silver_fox">銀狐 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.4.0 α20～]</h3>
<h4>[耐性] 人狼襲撃：無効</h4>
<pre>
<a href="#partner">仲間</a>が分からない妖狐 (他の妖狐・<a href="#child_fox_group">子狐</a>からも仲間であると分からない)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#partner_silver">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#silver_wolf">銀狼</a>の妖狐バージョンです。
妖狐陣営は元々出現数が少なめなので仲間が分からなくてもさほど影響は無いと思います。
占いを騙る仲間から人狼判定を出される可能性はありますが……
</pre>


<h3 id="immolate_fox">野狐禅 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.5.0 α9～]</h3>
<h4>[耐性] 人狼襲撃：無効 + 能力発現</h4>
<pre>
妖狐陣営勝利に加えて、人狼に襲撃されることが勝利条件の妖狐。
人狼 (<a href="wolf.php#hungry_wolf">餓狼</a>を除く) に襲撃されたら「<a href="sub_role.php#muster_ability">能力発現</a>」がつく。
</pre>
<ol>
  <li><a href="sub_role.php#muster_ability">能力発現</a>がついていれば生死は問わない。</li>
  <li>襲撃失敗 (例：狩人護衛) していた場合は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#immolate_mad">殉教者</a>・<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#immolate_mad">殉教者</a>の妖狐バージョンです。
襲撃されて生き残ることは難しいので難易度は高めです。
</pre>

<h2 id="child_fox_group">子狐系</h2>
<p>
<a href="#child_fox_rule">基本ルール</a>
</p>
<p>
<a href="#child_fox">子狐</a>
<a href="#sex_fox">雛狐</a>
<a href="#stargazer_fox">星狐</a>
<a href="#jammer_fox">月狐</a>
<a href="#monk_fox">蛻庵</a>
<a href="#miasma_fox">蟲狐</a>
<a href="#howl_fox">化狐</a>
<a href="#critical_fox">寿羊狐</a>
</p>

<h3 id="child_fox_rule">基本ルール</h3>
<ol>
  <li>呪殺されない代わりに<a href="wolf.php#wolf_group">人狼</a>に襲撃されると死亡する。</li>
  <li>夜の投票能力を持っている場合、成功率は 70%。</li>
</ol>

<h3 id="child_fox">子狐 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.4.0 α3-7～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 月兎：有効 / 呪い：有効</h4>
<pre>
子狐系の<a href="mania.php#basic_mania">基本種</a>。占い能力を持つ。
判定法則は<a href="human.php#mage">占い師</a>と同じで、呪殺はできないが呪返しは受ける。
</pre>
<h5>Ver. 1.4.0 α17～</h5>
<pre>
占い能力を持つ。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
<a href="human.php#mage">占い師</a>騙りをする場合は失敗した時にどうフォローするかがポイントです。
</pre>

<h3 id="sex_fox">雛狐 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.4.0 β8～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 月兎：有効 / 呪い：無効</h4>
<pre>
<a href="human.php#sex_mage">ひよこ鑑定士</a>相当の能力を持つ子狐。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#sex_mage">ひよこ鑑定士</a>の子狐バージョンです。
能力よりも、存在自体が脅威となるタイプですね。
村や狼が疑心暗鬼になって<a href="human.php#sex_mage">ひよこ鑑定士</a>の排除に動くケースが出てくるでしょう。
</pre>

<h3 id="stargazer_fox">星狐 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.4.0 β13～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 月兎：有効 / 呪い：無効</h4>
<pre>
<a href="human.php#stargazer_mage">占星術師</a>相当の能力を持つ子狐。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#stargazer">投票能力鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#stargazer_mage">占星術師</a>の子狐バージョンです。
仲間の騙りに合わせて<a href="human.php#stargazer_mage">占星術師</a>を騙ると効果的ですが、
襲撃されやすいので他の役職を騙ってもいいかもしれません。
</pre>

<h3 id="jammer_fox">月狐 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.4.0 β13～]</h3>
<pre>
<a href="wolf.php#jammer_mad">月兎</a>相当の能力を持つ子狐。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#phantom">占い妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#jammer_mad">月兎</a>の子狐バージョンです。
妖狐の最大の弱点である占いを妨害できるので、子狐系に於いては<a href="mania.php#soul_mania">上位種</a>となります。
</pre>

<h3 id="monk_fox">蛻庵 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.5.0 β16～]</h3>
<h4>[霊能能力] 処刑者情報：有り / 火車：有効</h4>
<pre>
<a href="human.php#necromancer">霊能者</a>相当 (成功率 70%) の能力を持つ子狐。
霊能の発動に失敗した場合、結果表示は<a href="wolf.php#corpse_courier_mad">火車</a>の能力発動時と同じになる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#necromancer">霊能者</a>の子狐バージョンです。
安国寺のきつね小僧がモチーフで、「ぜいあん」と読みます。
この役職でメイン役職の総数が既存のものと合わせてちょうど 300 になりました。
</pre>

<h3 id="miasma_fox">蟲狐 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.4.0 β13～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 熱病 / 処刑：熱病</h4>
<pre>
処刑されるか人狼に襲撃されたら<a href="sub_role.php#febris">熱病</a>を付加する子狐。
処刑された場合は投票した人からランダムで一人 (妖狐陣営を除く)、
人狼に襲撃された場合は襲撃した人狼に付加する。
</pre>
<ol>
<li>処刑時は<a href="human.php#detective_common">探偵</a>・<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態)・妖狐陣営・<a href="sub_role.php#challenge_lovers">難題</a>は能力の対象外。</li>
<li>人狼襲撃時は<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) には無効。</li>
<li>対象者が誰もいなかった場合は不発となる。</li>
</ol>
<h5>Ver. 1.5.0 α5～</h5>
<pre>
処刑された時に<a href="sub_role.php#febris">熱病</a>を付加する対象から妖狐陣営を除外
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#poison_fox">管狐</a>の子狐相当として、<a href="wolf.php#miasma_mad">土蜘蛛</a>能力を持たせてみました。
</pre>

<h3 id="howl_fox">化狐 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.4.0 β17～]</h3>
<pre>
二日目以降の夜の独り言が他の人には<a href="wolf.php#howl">人狼の遠吠え</a>に見える子狐。
</pre>
<h5>Ver. 1.5.0 β10～</h5>
<pre>
夜の独り言が<a href="wolf.php#howl">人狼の遠吠え</a>に見える日を二日目以降に変更
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#silver_wolf">銀狼</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#howl">人狼の遠吠え</a>から推測できる情報にノイズを入れる存在です。
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/740" target="_top">新役職考案スレ(740)</a> が原型です。
人狼の人数や<a href="wolf.php#silver_wolf">銀狼</a>の存在を誤認する可能性が出てくる事に注意しましょう。
</pre>

<h3 id="critical_fox">寿羊狐 (占い結果：村人(呪殺無し) / 霊能結果：子狐) [Ver. 1.5.0 β16～]</h3>
<pre>
妖狐陣営勝利に加えて、<a href="#fox_group">妖狐系</a>の全滅が勝利条件の子狐。
<a href="#partner">仲間表示</a>に<a href="#fox_group">妖狐系</a>が表示されない (他の妖狐陣営からの表示は通常通り)。
処刑投票先が<a href="#fox_group">妖狐系</a>なら<a href="sub_role.php#critical_luck">痛恨</a>を付加する (<a href="wolf.php#critical_mad">釣瓶落とし</a>の仕様が適用される)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ogre.php#indigo_ogre">後鬼</a>・<a href="ogre.php#wise_ogre">夜行鬼</a>・<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#vote_action">処刑投票能力者</a>・<a href="ability.php#luck">得票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
妲己の妖狐伝承がモチーフです。寿羊は「じゅよう」と読みます。
</pre>
</body></html>
