<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('人狼陣営');
?>
<p>
<a href="#partner">仲間表示</a>
<a href="#talk">会話</a>
<a href="#howl">遠吠え</a>
<a href="#wolf_eat">襲撃</a>
</p>
<p>
<a href="#wolf_group">人狼系</a>
<a href="#mad_group">狂人系</a>
</p>

<h2 id="partner">仲間表示</h2>
<ol>
  <li><a href="#silver_wolf">銀狼</a>以外の全ての人狼と<a href="#fanatic_mad">狂信者</a>・<a href="#whisper_mad">囁き狂人</a>は<a href="#silver_wolf">銀狼</a>以外の仲間の人狼が誰か分かる。</li>
  <li><a href="#silver_wolf">銀狼</a>以外の全ての人狼は<a href="#whisper_mad">囁き狂人</a>が誰か分かる。</li>
  <li><a href="human.php#unconscious">無意識</a>は<a href="#silver_wolf">銀狼</a>も含めた全ての人狼から分かる。<br>
  ただし、<a href="human.php#scarlet_doll">和蘭人形</a>・<a href="fox.php#scarlet_fox">紅狐</a>・<a href="lovers.php#scarlet_angel">紅天使</a>・<a href="vampire.php#scarlet_vampire">屍鬼</a>・<a href="chiroptera.php#scarlet_chiroptera">紅蝙蝠</a>も混ざって表示される。
  </li>
  <li><a href="sub_role.php#mind_lonely">はぐれ者</a>になると仲間が分からなくなる (<a href="#silver_wolf">銀狼</a>と同じ)。</li>
</ol>

<h2 id="talk">夜の会話</h2>
<ol>
<li><a href="#silver_wolf">銀狼</a>以外の<a href="#wolf_group">人狼系</a>・<a href="#whisper_mad">囁き狂人</a>は夜に会話できる。</li>
<li>2日目以降は<a href="human.php#howl_scanner">吠騒霊</a>の独り言も表示される。<a href="human.php#leader_common">指導者</a>の発言とは区別できない。</li>
<li>他人からは<a href="#howl">遠吠え</a>に見える (<a href="#whisper_mad">囁き狂人</a>を除く)。</li>
<li><a href="sub_role.php#mind_lonely">はぐれ者</a>になると夜の発言が独り言になり、会話に参加できなくなる (<a href="#silver_wolf">銀狼</a>と同じ)。</li>
</ol>

<h2 id="howl">遠吠え</h2>
<ol>
  <li>人狼視点の遠吠えは<a href="#silver_wolf">銀狼</a>・<a href="sub_role.php#mind_lonely">はぐれ者</a>になった人狼・<a href="fox.php#howl_fox">化狐</a> (二日目以降)。</li>
  <li><a href="#silver_wolf">銀狼</a>・<a href="sub_role.php#mind_lonely">はぐれ者</a>になった人狼視点の遠吠えは自分以外の人狼 (種類は不明) と<a href="fox.php#howl_fox">化狐</a>。</li>
  <li>村人視点の遠吠えは<a href="#silver_wolf">銀狼</a>も含めた<a href="#quiet_wolf">静狼</a>以外の人狼 (種類は不明) と<a href="fox.php#howl_fox">化狐</a>。</li>
  <li><a href="human.php#mind_scanner">さとり</a>には遠吠えはいっさい見えない。</li>
</ol>
<h5>Ver. 1.5.0 β10～</h5>
<pre>
<a href="#silver_wolf">銀狼</a>・<a href="sub_role.php#mind_lonely">はぐれ者</a>になった人狼視点の遠吠えが見えるのは二日目以降 (一日目は見えない)。
</pre>
<h5>Ver. 1.4.0 α23～</h5>
<pre>
<a href="#silver_wolf">銀狼</a>の独り言が他の人に遠吠えに見える。
<a href="human.php#mind_scanner">さとり</a>には遠吠えはいっさい見えない。
</pre>
<h5>Ver. 1.4.0 α21～</h5>
<pre>
<a href="#silver_wolf">銀狼</a>の独り言は遠吠えにならない。
</pre>

<h2 id="wolf_eat">襲撃の仕様</h2>
<ol>
  <li>夜の襲撃投票は全人狼共通で、最初に投票したものだけが有効になる。<br>
    例) <a href="#silver_wolf">銀狼</a>が先に投票したら他の人狼は投票できない。
  </li>
  <li>人狼が人狼を襲撃した場合は失敗扱いとなる (襲撃された人狼には何も表示されない)。</li>
  <li><a href="ability.php#sacrifice">身代わり能力</a> (例：<a href="human.php#doll_master">人形遣い</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>) が先に適用され、失敗扱いとなる。</li>
  <li>殺傷能力が無い・限定されているタイプの能力は身代わり君には適用されない。</li>
</ol>
<h5>Ver. 1.4.0 α21～</h5>
<pre>
人狼が人狼を襲撃した場合は失敗扱いとなる。
<a href="fox.php">妖狐</a>と違い、襲撃された方にも何も表示されない。
人狼と<a href="#silver_wolf">銀狼</a>は互いに認識できないので、味方を襲撃する可能性がある。
</pre>


<h2 id="wolf_group">人狼系</h2>
<p>
<a href="#wolf">人狼</a>
<a href="#boss_wolf">白狼</a>
<a href="#mist_wolf">霧狼</a>
<a href="#gold_wolf">金狼</a>
<a href="#phantom_wolf">幻狼</a>
<a href="#cursed_wolf">呪狼</a>
<a href="#quiet_wolf">静狼</a>
<a href="#wise_wolf">賢狼</a>
<a href="#poison_wolf">毒狼</a>
<a href="#resist_wolf">抗毒狼</a>
</p>
<p>
<a href="#revive_wolf">仙狼</a>
<a href="#trap_wolf">狡狼</a>
<a href="#blue_wolf">蒼狼</a>
<a href="#emerald_wolf">翠狼</a>
<a href="#doom_wolf">冥狼</a>
<a href="#fire_wolf">火狼</a>
<a href="#sex_wolf">雛狼</a>
<a href="#sharp_wolf">鋭狼</a>
<a href="#hungry_wolf">餓狼</a>
<a href="#tongue_wolf">舌禍狼</a>
</p>
<p>
<a href="#possessed_wolf">憑狼</a>
<a href="#sirius_wolf">天狼</a>
<a href="#elder_wolf">古狼</a>
<a href="#cute_wolf">萌狼</a>
<a href="#scarlet_wolf">紅狼</a>
<a href="#silver_wolf">銀狼</a>
<a href="#emperor_wolf">帝狼</a>
</p>

<h3 id="wolf">人狼 (占い結果：人狼 / 霊能結果：人狼)</h3>
<pre>
人狼陣営の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#therian_mad">獣人</a>
</pre>

<h3 id="boss_wolf">白狼 (占い結果：村人 / 霊能結果：白狼) [Ver. 1.4.0 α3-7～]</h3>
<pre>
占い結果が「村人」、霊能結果が「白狼」と判定される人狼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_human">特殊占い判定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国の「大狼」に相当します。シンプルな能力ですが、効果は絶大です。
占いが怖くないので LW を担うことを前提に立ち回ると効果的でしょう。
</pre>

<h3 id="mist_wolf">霧狼 (占い結果：蝙蝠 / 霊能結果：霧狼) [Ver. 1.5.0 β7～]</h3>
<pre>
占い結果が「蝙蝠」、霊能結果が「霧狼」と判定される人狼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_chiroptera">特殊占い判定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#boss_wolf">白狼</a>の蝙蝠判定バージョンです。
主に<a href="vampire.php">吸血鬼陣営</a>枠の乗っ取りを狙うことになります。
</pre>

<h3 id="gold_wolf">金狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β8～]</h3>
<pre>
<a href="human.php#sex_mage">ひよこ鑑定士</a>の判定が「<a href="chiroptera.php">蝙蝠</a>」になる人狼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="fox.php#gold_fox">金狐</a>・<a href="sub_role.php#gold_wisp">松明丸</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
ローゼンメイデンの金糸雀がモチーフです。
一見地味ですが存在に気づかないと見事に騙される可能性があります。
<a href="chiroptera.php">蝙蝠陣営</a>不在が確定している場合は<a href="human.php#sex_mage">ひよこ鑑定士</a>が逆に脅威になります。
</pre>

<h3 id="phantom_wolf">幻狼 (占い結果：人狼 / 霊能結果：幻狼) [Ver. 1.4.0 β11～]</h3>
<h4>[耐性] 占い：無効 (1回限定) / 封印：有効</h4>
<pre>
一度だけ、自分が占われても占い妨害をする事ができる人狼。
</pre>
<ol>
<li>占い妨害が可能な対象は<a href="#jammer_mad">月兎</a>と同じ。</li>
<li>同じ晩であれば複数の占い能力者に占われても有効。</li>
<li>対象になった占い能力者が<a href="human.php#anti_voodoo">厄神</a>に護衛されていたら無効化される。</li>
<li>一度占われると占い妨害能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#phantom">占い妨害能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#cursed_wolf">呪狼</a>の占い妨害バージョンです。
「どこかに<a href="#jammer_mad">月兎</a>がいる」と思わせるのが狙いです。
</pre>

<h3 id="cursed_wolf">呪狼 (占い結果：人狼(呪返し) / 霊能結果：呪狼) [Ver. 1.4.0 α17～]</h3>
<h4>[耐性] 占い：呪返し / 陰陽師：死亡</h4>
<pre>
呪いを持った人狼。
自分を占った<a href="human.php#mage_group">占い師</a>を呪い殺すことができる (死因は「呪返し」)。
</pre>
<h5>Ver. 1.4.0 β3～</h5>
<pre>
霊能結果を「人狼」から「呪狼」に変更 (<a href="human.php#necromancer_rule">基本ルール [霊能]</a>対応抜け)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#cursed_group">呪い能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/69" target="_top">新役職考案スレ(69)</a> が原型です。
<a href="human.php#soul_mage">魂の占い師</a>や<a href="fox.php#child_fox">子狐</a>も呪い殺せます。
占い能力者側の対策は、遺言に占い先をきちんと書いておく事です。
死体の数や状況にもよりますが、残った村人がきっと仇を討ってくれるでしょう。
</pre>

<h3 id="quiet_wolf">静狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.5.0 β10～]</h3>
<pre>
夜の会話が<a href="#howl">人狼の遠吠え</a>に変換されない人狼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="fox.php#howl_fox">化狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1305122951/17" target="_top">新役職考案スレ2(17)</a> が原型です。
<a href="fox.php#howl_fox">化狐</a>と逆アプローチで<a href="#howl">人狼の遠吠え</a>から推測できる情報にノイズを入れる存在です。
</pre>

<h3 id="wise_wolf">賢狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 α24～]</h3>
<pre>
<a href="fox.php#talk">妖狐の念話</a>が<a href="human.php#common_group">共有者</a>の囁きに変換されて聞こえる人狼。
結果として、念話ができる妖狐が生存していることだけが分かる。
本物の<a href="human.php#common_group">共有者</a>の囁きと混ざって表示されるので本人には区別できない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#telepath_scanner">念騒霊</a>・<a href="ogre.php#wise_ogre">夜行鬼</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
名称は他国に実在しますが、仕様はオリジナルです。
狼サイドから妖狐の生存がわかります。
<a href="fox.php#silver_fox">銀狐</a>や<a href="fox.php#child_fox">子狐</a>など、念話できない妖狐の
生存は感知できないので注意してください。
</pre>

<h3 id="poison_wolf">毒狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 α12～]</h3>
<h4>[毒能力] 処刑：人狼系以外 / 襲撃：無し / 薬師判定：有り</h4>
<pre>
<a href="ability.php#poison">毒能力</a>を持った人狼。
処刑された時に巻き込む対象の決定時に人狼系が除かれるため
<a href="../script_info.php#difference_poison_vote">投票者ランダム設定</a>の場合は不発となるケースがある。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#poison">埋毒者</a>の人狼バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/31" target="_top">新役職考案スレ(31)</a> が原型です。
吊られてもただでは死なないので、破綻を恐れず積極的に騙ると効果的です。
</pre>

<h3 id="resist_wolf">抗毒狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 α17～]</h3>
<h4>[耐性] 毒：無効 (1回限定) / 封印：有効</h4>
<pre>
一度だけ毒に耐えられる (毒に中っても死なない) 人狼。
処刑・襲撃共に有効だが、一度毒に中ると耐性を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。
<a href="ability.php#poison">毒能力者</a>を襲撃した場合は<a href="../script_info.php#difference_poison_eat" target="_top">サーバ設定</a>や能力失効の有無に関わらず、
毒の対象が襲撃者に固定される。
</pre>
<h5>Ver. 1.4.0 α24～</h5>
<pre>
襲撃先が毒能力者で、投票者が抗毒狼だった場合は<a href="../script_info.php#difference_poison_eat" target="_top">サーバ設定</a>に関わらず
毒の対象者が投票した抗毒狼に固定されます。
ただし、能力を失効しても固定化処理は有効です。
つまり、<a href="human.php#poison_group">埋毒者</a>を意図的に襲撃して毒を無効化したり、
能力失効後にわざと毒に中りにいく事が可能になります。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="ability.php#poison">毒能力者</a>の対抗役職で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/25" target="_top">新役職考案スレ(25)</a> が原型です。
安易に CO する<a href="human.php#poison_guard">騎士</a>・<a href="human.php#poison_group">埋毒者</a>を葬ってやりましょう！
</pre>

<h3 id="revive_wolf">仙狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.5.0 α6～]</h3>
<h4>[耐性] 蘇生：不可 / 憑依：無効 / 封印：有効</h4>
<pre>
一度だけ夜に死亡した場合に蘇生できる人狼。
</pre>
<ol>
<li>死因は問わない (例：毒死、暗殺) が、一度蘇生すると能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。</li>
<li><a href="sub_role.php#lovers">恋人</a>になったら無効。</li>
<li>蘇生処理は<a href="../spec.php#vote_night">反魂レイヤー</a>で行う。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="human.php#reverse_assassin">反魂師</a>・<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#revive_pharmacist">仙人</a>の人狼バージョンです。
<a href="ability.php#revive_self">自己蘇生</a>した人に疑いをかけやすくなります。
</pre>

<h3 id="trap_wolf">狡狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.5.0 α8～]</h3>
<pre>
一定期間後 (3日目以降)、自分に罠を設置することができる人狼。
</pre>
<ol>
<li>能力が発現すると本人に追加のシステムメッセージが表示される。</li>
<li>罠に関する仕様は<a href="#trap_mad">罠師</a>と同じ。</li>
<li>処理上は常に自分で自分に罠を設置している扱い。<br>
  ただし、<a href="human.php#clairvoyance_scanner">猩々</a>の判定には反映されない。
</li>
</ol>
<h5>Ver. 1.5.0 β7～</h5>
<pre>
罠の発動日を 5 日目から 3 日目に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#trap">罠能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="fox.php#trap_fox">狡狐</a>の人狼バージョンです。
騙りの腕次第で接触系能力者を一網打尽にすることができます。
</pre>

<h3 id="blue_wolf">蒼狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β8～]</h3>
<pre>
襲撃した人が<a href="fox.php#silver_fox">銀狐</a>以外の噛み殺せない妖狐だった場合に<a href="sub_role.php#mind_lonely">はぐれ者</a>を付加する人狼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#emerald_wolf">翠狼</a>・<a href="fox.php#blue_fox">蒼狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
ローゼンメイデンの蒼星石がモチーフです。
<a href="#emerald_wolf">翠狼</a>と対になるように能力をデザインしてあります。
<a href="fox.php#fox_group">妖狐</a>のコンビプレーによる騙りを妨害するのが主眼ですが、
妖狐は比較的単独行動が多いので活躍する機会を得るのが難しい能力だと思います。
</pre>

<h3 id="emerald_wolf">翠狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β8～]</h3>
<pre>
襲撃した人が人狼だった場合に自分と<a href="sub_role.php#mind_friend">共鳴者</a>にする人狼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#blue_wolf">蒼狼</a>・<a href="fox.php#emerald_fox">翠狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
ローゼンメイデンの翠星石がモチーフです。
<a href="#blue_wolf">蒼狼</a>と対になるように能力をデザインしてあります。
<a href="#silver_wolf">銀狼</a>や<a href="sub_role.php#mind_lonely">はぐれ者</a>になった人狼のフォローが主眼ですが
襲撃失敗した時の情報が増えるという副次的効果もあります。
</pre>

<h3 id="doom_wolf">冥狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β15～]</h3>
<pre>
襲撃に成功した人を噛み殺す代わりに<a href="sub_role.php#death_warrant">死の宣告</a>を付加する人狼。
</pre>
<ol>
  <li>死の宣告の発動日は投票した夜から数えて 2 日後の昼。</li>
  <li><a href="fox.php">妖狐陣営</a>にも宣告可能。</li>
</ol>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
死の宣告の発動日を 4 日後から 2 日後に変更。
</pre>
<h5>Ver. 1.4.0 β17～</h5>
<pre>
「<a href="#wolf_group">人狼系</a>以外の毒能力者を襲撃したら本人は毒死する」制限を解除。
<a href="fox.php">妖狐陣営</a>にも宣告できる仕様に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#fire_wolf">火狼</a>・<a href="#sex_wolf">雛狼</a>・<a href="#sharp_wolf">鋭狼</a>・<a href="#hungry_wolf">餓狼</a>・<a href="ability.php#doom">死の宣告能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#sex_wolf">雛狼</a>の<a href="human.php#doom_assassin">死神</a>能力バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/614" target="_top">新役職考案スレ(614)</a> が原型です。
強化されたことで、<a href="ability.php#poison">毒能力者</a>・<a href="fox.php">妖狐</a>の排除に向いた能力を獲得しています。
</pre>

<h3 id="fire_wolf">火狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.5.0 β7～]</h3>
<h4>[耐性] 封印：有効</h4>
<pre>
一度だけ、襲撃に成功した人を噛み殺す代わりに<a href="sub_role.php#black_wisp">天火</a>を付加する人狼。
<a href="fox.php">妖狐陣営</a>にも付加可能。
付加に成功すると能力を失い (<a href="sub_role.php#lost_ability">能力喪失</a>)、普通に噛み殺せるようになる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#doom_wolf">冥狼</a>・<a href="#sex_wolf">雛狼</a>・<a href="#sharp_wolf">鋭狼</a>・<a href="#hungry_wolf">餓狼</a>・<a href="ability.php#wisp">鬼火付加能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#doom_wolf">冥狼</a>の<a href="sub_role.php#black_wisp">天火</a>バージョンです。
襲撃失敗時の対応に幅を持たせることができます。
</pre>

<h3 id="sex_wolf">雛狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β8～]</h3>
<pre>
襲撃に成功した人の性別が分かるが、噛み殺せない人狼。
性別鑑定能力は<a href="human.php#sex_mage">ひよこ鑑定士</a>と同じ。
</pre>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
<a href="human.php#doll_master">人形遣い</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>の身代わり能力適用
</pre>
<h4>関連役職</h4>
<pre>
<a href="#doom_wolf">冥狼</a>・<a href="#fire_wolf">火狼</a>・<a href="#sharp_wolf">鋭狼</a>・<a href="#hungry_wolf">餓狼</a>・<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="fox.php#sex_fox">雛狐</a>の人狼バージョンです。
能力そのものよりも副次的効果の方が重要です (いわゆる空襲撃が可能になります)。
この狼が LW になると非常に辛い事になるので気をつけましょう。
</pre>

<h3 id="sharp_wolf">鋭狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.5.0 β14～]</h3>
<pre>
<a href="#mad_group">狂人系</a>と人狼が襲撃して発動する可能性のある<a href="ability.php#poison">毒能力者</a> (<a href="human.php#soul_assassin">辻斬り</a>と同じ) を
襲撃した場合は回避する (噛み殺さない) 人狼。
回避した場合は襲撃失敗扱いで、本人に専用のメッセージが表示される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#doom_wolf">冥狼</a>・<a href="#fire_wolf">火狼</a>・<a href="#sex_wolf">雛狼</a>・<a href="#hungry_wolf">餓狼</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1305122951/117" target="_top">新役職考案スレ2(117)</a> が原型です。
人狼視点で騙りを把握している人の正体を絞り込むことができます。
回避した場合でも恋人の可能性は残るので注意しましょう。
</pre>

<h3 id="hungry_wolf">餓狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β12～]</h3>
<pre>
<a href="#wolf_group">人狼系</a>と<a href="fox.php">妖狐陣営</a>しか噛み殺せない人狼。
</pre>
<ol>
  <li>仲間と分かっている狼も襲撃可能。</li>
  <li>襲撃が成功した場合の死因は「餓狼の餌食になった」。</li>
  <li>人狼と妖狐以外を襲撃した場合は失敗扱い。</li>
</ol>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
<a href="human.php#doll_master">人形遣い</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>の身代わり能力適用
</pre>
<h4>関連役職</h4>
<pre>
<a href="#doom_wolf">冥狼</a>・<a href="#fire_wolf">火狼</a>・<a href="#sex_wolf">雛狼</a>・<a href="#sharp_wolf">鋭狼</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルの、対<a href="fox.php">妖狐陣営</a>の切り札です。
狼飽和状態の妖狐勝利を仲間や村人確定の人を襲撃することで防ぐことができます。
死因が違うので<a href="human.php#yama_necromancer">閻魔</a>が天敵になります。
<a href="#sex_wolf">雛狼</a>同様、LW にしないように戦略を練りましょう。
</pre>

<h3 id="tongue_wolf">舌禍狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 α13～]</h3>
<h4>[耐性] 封印：有効</h4>
<pre>
襲撃に成功した人の役職が分かる人狼。
本人が投票した場合のみ有効で、<a href="human.php#human">村人</a>だった場合は能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#soul">役職鑑定能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/69" target="_top">新役職考案スレ(69)</a> の「賢狼」が原型です。
身代わり君の正体が分かるので内訳の把握が非常に有利になります。
</pre>

<h3 id="possessed_wolf">憑狼 (占い結果：人狼 / 霊能結果：憑狼) [Ver. 1.4.0 α24～]</h3>
<h4>[耐性] 占い：特殊 / 陰陽師：死亡 / 憑依：無効</h4>
<pre>
襲撃に成功した人を乗っ取る人狼。
乗っ取るのはアイコンと<a href="sub_role.php#lovers_group">恋人系</a>・<a href="sub_role.php#infected_group">感染者系</a>・<a href="sub_role.php#joker_group">ジョーカー系</a>を除くサブ役職全て。
身代わり君・<a href="fox.php">妖狐陣営</a> (変化前の<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>や<a href="mania.php#unknown_mania_group">鵺系</a>を含む)・<a href="ability.php#possessed_limit">憑依制限能力者</a>は乗っ取れない。
</pre>
<ol>
  <li><a href="#possessed_wolf_system">基本システム</a></li>
  <li><a href="#possessed_wolf_vote">投票結果</a></li>
  <li><a href="#possessed_wolf_necromancer">霊能結果</a></li>
  <li><a href="#possessed_wolf_last_words">遺言</a></li>
  <li><a href="#possessed_wolf_sub_role">サブ役職</a></li>
  <li><a href="#possessed_wolf_lovers">対恋人</a></li>
  <li><a href="#possessed_wolf_poison">対毒能力者</a></li>
  <li><a href="#possessed_wolf_mage">対占い能力者</a></li>
  <li><a href="#possessed_wolf_voodoo_killer">対陰陽師</a></li>
  <li><a href="#possessed_wolf_anti_voodoo">対厄神</a></li>
  <li><a href="#possessed_wolf_reporter">対ブン屋</a></li>
  <li><a href="#possessed_wolf_assassin">対暗殺能力者</a></li>
  <li><a href="#possessed_wolf_revive">対蘇生能力者</a></li>
  <li><a href="#possessed_wolf_possessed_limit">対憑依制限対象者</a></li>
  <li><a href="#possessed_wolf_evoke_scanner">対イタコ</a></li>
  <li><a href="#possessed_wolf_presage_scanner">対件</a></li>
  <li><a href="#possessed_wolf_amaze_mad">対傘化け</a></li>
</ol>

<h4 id="possessed_wolf_system">1. 基本システム</h4>
<pre>
襲撃が成功した場合は、噛み殺された人が霊界に行きますが、
見かけ上は襲撃した憑狼が無残な死体で発見されます。

例1-1) A[憑狼] → B[村人]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[村人](A[憑狼])

実際に死ぬのは B で、B の中の人は霊界へ行く。
下界の人間には A の発言は B が発言したように見える。
狼の仲間リストから A が消えて B が増える (つまり、憑依したことが分かる)。

夜の発言も含めて全て乗っ取った人のものになるので
例えば共有を乗っ取った場合は狼仲間＋共有仲間と
会話できるようになり、他の人からはひそひそ声に見えます。
つまり、憑狼の遠吠えが消える事になります。

発言は乗っ取れてもメイン役職の能力は乗っ取らない仕様です。
占い師を乗っ取った場合は占い騙りをしないと不自然になります。
また、共有と会話できますが共有仲間が誰か分かるわけではありません。

憑依状態の憑狼が他の村人を襲撃した場合は次々と乗り移ります。
一度憑依を始めた憑狼は現在自分が憑依している対象が常に表示されます。
様々な要因で自分の体に戻されるケースがありますが、その場合は
「あなたはあなたに憑依しています」と表記されます。
</pre>

<h4 id="possessed_wolf_vote">2. 投票結果</h4>
<pre>
結果は「投票をした時点の中の人」で判定されます。

例2-1) A[憑狼] → B[村人] ← C[占い師]
占い結果：B は「村人」でした。
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[村人](A[憑狼])

例2-2) C[占い師] → B[村人](A[憑狼])
占い結果：B は「人狼」でした。

例2-3) C[<a href="human.php#psycho_mage">精神鑑定士</a>] → B[狂人](A[憑狼])
鑑定結果：B は「正常」でした。

例2-4) C[<a href="human.php#pharmacist">薬師</a>] → B[埋毒者](A[憑狼])
鑑定結果：B は「毒を持っていません」。

例2-5) C[<a href="#silver_wolf">銀狼</a>] → B[村人](A[憑狼])
死体：無し
</pre>

<h4 id="possessed_wolf_necromancer">3. 霊能結果</h4>
<pre>
結果は処刑された中の人で判定されます。

例4-1) 処刑：B[村人](A[憑狼])
霊能結果：B は「憑狼」でした。
</pre>

<h4 id="possessed_wolf_last_words">4. 遺言</h4>
<pre>
遺言は憑狼が偽装したものと見かけ上死んだ人の両方が出ます。
また、憑依に成功するたびに憑狼の現在の遺言が空になります。

例4-1) A[憑狼] → B[村人]
A が書いた遺言が A の遺言として表示される。

例4-2) B[村人](A[憑狼]) → C[村人]
B になりすました A の遺言と B 本人が死んだ時点で書いていた遺言の
両方が表示される。
</pre>

<h4 id="possessed_wolf_sub_role">5. サブ役職</h4>
<pre>
<a href="#possessed_wolf_lovers">恋人</a>以外のサブは全て乗っ取ります。
憑依している憑狼には現在自分に適用されているサブが表示されます。

例5-1) A[憑狼][<a href="sub_role.php#chicken">小心者</a>] → B[村人][<a href="sub_role.php#perverseness">天邪鬼</a>]
B に憑依している A は天邪鬼になります。
(小心者の表示が消えて天邪鬼が表示されます)

例5-2) C[<a href="human.php#mind_scanner">さとり</a>] → A[憑狼][<a href="sub_role.php#mind_read">サトラレ</a>] → B[村人][<a href="sub_role.php#mind_read">サトラレ</a>] ← D[<a href="human.php#mind_scanner">さとり</a>]
C は 「死亡した」 A の発言が見えなくなります。
D は B になりすましている A の発言が見えます。

例5-3) A[憑狼] → B[<a href="human.php#ghost_common">亡霊嬢</a>]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[亡霊嬢](A[憑狼])
見かけ上の死体：A[憑狼][<a href="sub_role.php#chicken">小心者</a>]
亡霊嬢の能力発動対象は憑狼本体なので、憑依中は適用されません。
何らかの理由で本体に戻されたら有効になります。
</pre>

<h4 id="possessed_wolf_lovers">6. 対恋人</h4>
<pre>
恋人だけは乗っ取りません。
憑狼自身が恋人だった場合は、恋人からは憑依していることが分かります。
もし、後追いした恋人が遺言で「憑依先と恋人である」 と書いていた場合は
状況と矛盾することになります。

例6-1) A[憑狼][恋人] → B[村人]、C[村人][恋人]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[村人](A[憑狼][恋人])
C の恋人の相手が A から B に変わる (C 視点から憑依したことが分かる)

例6-2) A[憑狼] → B[村人][恋人]、C[村人][恋人]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
死体：C が恋人の後を追い自殺しました
憑依：B[村人][恋人](A[憑狼])
後追いした「確定恋人」の恋人が生存している状態になる。

例6-3) A[憑狼] → B[村人][恋人]、D[暗殺者] → C[<a href="lovers.php#self_cupid">求愛者</a>][恋人]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
死体：C が無残な死体で発見されました (死因：「暗殺された」)
憑依：B[村人][恋人](A[憑狼])
C の恋人が生存している状態になるが、C が<a href="chiroptera.php#dummy_chiroptera">夢求愛者</a>だった場合は
無関係の村人が恋人に憑依した憑狼扱いされる可能性がある。
</pre>

<h4 id="possessed_wolf_poison">7. 対毒能力者</h4>
<pre>
憑狼が毒能力者を襲撃して毒に中ったら憑依がキャンセルされます。

例7-1) A[憑狼] → B[埋毒者]、毒死：A[憑狼]
死体：A が無残な死体で発見されました (死因：「毒に中った」)
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)

例7-2) A[憑狼] → B[埋毒者]、毒死：C[人狼]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
死体：C が無残な死体で発見されました (死因：「毒に中った」)
憑依：B[埋毒者](A[憑狼])
</pre>

<h4 id="possessed_wolf_mage">8. 対占い能力者</h4>
<pre>
占い師と<a href="human.php#soul_mage">魂の占い師</a>が憑狼を占った場合は、憑依がキャンセルされます。
<a href="human.php#dummy_mage">夢見人</a>や<a href="fox.php#child_fox">子狐</a>が占ってもキャンセルされません。
<a href="human.php#psycho_mage">精神鑑定士</a>や<a href="human.php#sex_mage">ひよこ鑑定士</a>など、「村人 / 人狼」以外を判定するタイプの
占い系能力者が占ってもキャンセルされません。

例8-1) C[占い師] → A[憑狼] → B[村人]
占い結果：A は「人狼」でした。
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)
A は憑依処理がキャンセルされて A のまま。

例8-2) C[<a href="human.php#sex_mage">ひよこ鑑定士</a>] → B[<a href="chiroptera.php#chiroptera">蝙蝠</a>](A[憑狼]) → D[村人]
鑑定結果：B は「男性 / 女性」(A の性別) でした。
死体：B が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：D[村人](A[憑狼])
</pre>

<h4 id="possessed_wolf_voodoo_killer">9. 対<a href="human.php#voodoo_killer">陰陽師</a></h4>
<pre>
陰陽師が憑狼を占った場合は、呪殺します。
陰陽師が憑狼の憑依先を占った場合は、憑依がキャンセルされます。

例9-1) C[陰陽師] → A[憑狼] → B[村人]
占い結果： A の「解呪成功」
死体：A が無残な死体で発見されました (死因：「呪詛に呪われた」)
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)

例9-2) A[憑狼] → B[村人] ← C[陰陽師]
占い結果： B の「解呪成功」
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)
A は憑依処理がキャンセルされて A のまま。
</pre>

<h4 id="possessed_wolf_anti_voodoo">10. 対<a href="human.php#anti_voodoo">厄神</a></h4>
<pre>
厄神が憑狼か憑狼の憑依先を護衛した場合は、憑依がキャンセルされます。
憑依中の憑狼を護衛するか、憑狼に襲撃されると憑依状態を解くことができます。
憑依を解かれた憑狼は見かけ上は「蘇生した」ように見えます。

例10-1) A[憑狼] → B[村人] ← C[厄神]
護衛結果： B の「厄払い成功」
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)
A は憑依処理がキャンセルされて A のまま。

例10-2) C[厄神] → A[憑狼] → B[村人]
護衛結果： A の「厄払い成功」
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)
A は憑依処理がキャンセルされて A のまま。

例10-3) C[厄神] → B[村人](A[憑狼]) → D[村人]
護衛結果： B の「厄払い成功」
蘇生：A は生き返りました
死体：B が無残な死体で発見されました (死因：「憑依から開放された」)
死体：D が無残な死体で発見されました (死因：「人狼に襲撃された」)

例10-4) A[憑狼] → B[厄神]
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)
A は憑依処理がキャンセルされて A のまま。

例10-5) B[村人](A[憑狼]) → C[厄神]
蘇生：A は生き返りました
死体：B が無残な死体で発見されました (死因：「憑依から開放された」)
死体：C が無残な死体で発見されました (死因：「人狼に襲撃された」)
</pre>

<h4 id="possessed_wolf_reporter">11. 対<a href="human.php#reporter">ブン屋</a></h4>
<pre>
ブン屋が憑狼の憑依先を尾行すると、「生存者は死者に襲撃された」という
尾行結果が表示されることになるので本人視点で憑狼の位置が確定します。

例11-1) A[憑狼] → B[村人] ← C[ブン屋]
尾行結果：B は A に襲撃されました。
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[村人](A[憑狼])
</pre>

<h4 id="possessed_wolf_assassin">12. 対<a href="human.php#assassin_group">暗殺能力者</a></h4>
<pre>
憑狼を直接狙うことで憑依中でも殺すことができます。

例12-1) C[暗殺者] → B[村人](A[憑狼]) → D[村人]
死体：B が無残な死体で発見されました (死因：「暗殺された」) (実際に死ぬのは A)
死体：D が無残な死体で発見されました (死因：「人狼に襲撃された」)

例12-2) A[憑狼] → B[村人] ← C[暗殺者]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[村人](A[憑狼])
</pre>

<h4 id="possessed_wolf_revive">13. 対<a href="human.php#poison_cat_group">蘇生能力者</a></h4>
<pre>
憑依中に「見かけ上死んでいる」憑狼本体を蘇生されると元の体に戻されます。
実際に生き返るのは憑依先です。

蘇生処理のタイミングの仕様上、同じ夜に殺された人が誤爆蘇生する可能性があります。
暗殺などで憑依中の憑狼が死亡 + 憑依先を誤爆蘇生の場合は憑依されていた本人が生き返ります。

例13-1) C[<a href="human.php#poison_cat">猫又</a>] → A[憑狼](見かけ上の死体)、B[村人](A[憑狼]) → D[村人]
死体：D が無残な死体で発見されました (死因：「人狼に襲撃された」)
蘇生：A は生き返りました (実際に生き返るのは B)

例13-2) C[<a href="human.php#poison_cat">猫又</a>] → A[憑狼](見かけ上の死体)、B[村人](A[憑狼]) → D[村人]
死体：D が無残な死体で発見されました (死因：「人狼に襲撃された」)
蘇生：D は生き返りました (誤爆蘇生：実際に生き返るのも D)
A は B から D への憑依がキャンセルされて B に憑依したまま。

例13-3) C[<a href="human.php#poison_cat">猫又</a>] → A[憑狼](見かけ上の死体)、E[<a href="human.php#assassin">暗殺者</a>] → B[村人](A[憑狼]) → D[村人]
死体：B が無残な死体で発見されました (死因：「暗殺された」) (実際に死ぬのは A)
死体：D が無残な死体で発見されました (死因：「人狼に襲撃された」)
蘇生：A は生き返りました (実際に生き返るのも A)

例13-4) C[<a href="human.php#poison_cat">猫又</a>] → A[憑狼](見かけ上の死体)、E[<a href="human.php#assassin">暗殺者</a>] → B[村人](A[憑狼]) → D[村人]
死体：B が無残な死体で発見されました (死因：「暗殺された」) (実際に死ぬのは A)
死体：D が無残な死体で発見されました (死因：「人狼に襲撃された」)
蘇生：B は生き返りました (誤爆蘇生：実際に生き返るのも B)
</pre>

<h4 id="possessed_wolf_possessed_limit">14. 対憑依制限対象者</h4>
<pre>
<a href="human.php#revive_priest">天人</a>などの<a href="ability.php#possessed_limit">憑依制限能力者</a>には憑依できないので、生存している該当者は憑狼ではない事が保証されます。
また、霊界視点からは憑依者がはっきり分かるので蘇生した天人の情報は重要です。

例14-1) B[村人](A[憑狼]) → C[天人]
死体：C が無残な死体で発見されました (死因：「人狼に襲撃された」)
A は B に憑依したまま。
</pre>

<h4 id="possessed_wolf_evoke_scanner">15. 対<a href="human.php#evoke_scanner">イタコ</a></h4>
<pre>
基本システムにあるとおり、メイン役職の能力は乗っ取らないので
イタコに憑依しても口寄せ先からのメッセージは届きませんが、
口寄せ先を憑依すると、霊界からイタコにメッセージが届くので
憑依していることがばれます。

例15-1) A[憑狼] → B[イタコ] → C[村人][口寄せ] (死亡中)
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[イタコ](A[憑狼])
C が遺言メッセージを送っても B に憑依している A の遺言窓は変わらない。

例15-2) A[憑狼] → B[村人][口寄せ] ← C[イタコ]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[村人](A[憑狼])
B が遺言メッセージを送ると C の遺言窓が変更される。
</pre>

<h4 id="possessed_wolf_presage_scanner">16. 対<a href="human.php#presage_scanner">件</a></h4>
<pre>
件に憑依すると、「生存者は死者に襲撃された」というメッセージが<a href="sub_role.php#mind_presage">受託者</a>に表示される。

例16-1) A[憑狼] → B[件] → C[村人][受託者]
死体：A が無残な死体で発見されました (死因：「誰かに憑依した」)
憑依：B[件](A[憑狼])
C に「受託結果：B は A に襲撃されました。」と表示される。
</pre>

<h4 id="possessed_wolf_amaze_mad">17. 対<a href="#amaze_mad">傘化け</a></h4>
<pre>
憑依中の憑狼に対しても、「能力が隠されました」というメッセージが表示されるが、
夜になった時点で死亡することで中の人が入れ替わるので能力そのものは適用されない。
結果として、客観的に傘化けの存在と憑依中の憑依能力者を処刑したことが分かる。

例17-1) 処刑：B[村人](A[憑狼]) ← C[傘化け]
霊能結果：B は「憑狼」でした。
傘化けの能力で投票が隠されました。
メッセージは表示されるが実際は隠蔽されない。
</pre>
<h5>Ver. 1.4.11 / Ver. 1.5.0 β13～</h5>
<pre>
憑依無効
</pre>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
憑依中でも傘化けの能力が適用される
</pre>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
妖狐陣営に付いた<a href="mania.php#unknown_mania">鵺</a>、<a href="fox.php">妖狐陣営</a>に変化前の<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>も憑依対象外に変更
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#possessed">憑依能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
長期人狼に実在する特殊狼です。
単純に「中の人が入れ替わる」というだけでも十分にややこしいかと思いますが、
元の国に存在しない恋人や蘇生システムの存在が複雑さに拍車をかけています。
人狼の楽しみの一つである「RP」をどこまでまねる事ができるか、ぜひ挑戦してみてください。
</pre>

<h3 id="sirius_wolf">天狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β9～]</h3>
<h4>[耐性] 罠：特殊 / 毒：特殊 / 暗殺：特殊 </h4>
<pre>
仲間の狼が減ると特殊能力が発現する狼。
</pre>
<ol>
  <li>狼が残り二人になると、以下の能力を持つ (覚醒状態)。</li>
  <ol>
    <li><a href="human.php#assassin_spec">暗殺反射</a></li>
    <li><a href="ability.php#trap_night">罠 (夜投票型)</a> 無効</li>
  </ol>
  <li>狼が残り一人になると、さらに以下の能力を持つ (完全覚醒状態)。</li>
  <ol>
    <li>毒・<a href="human.php#brownie">座敷童子</a>・<a href="human.php#cursed_brownie">祟神</a>・<a href="human.php#doom_doll">蓬莱人形</a>・<a href="#follow_mad">舟幽霊</a>・<a href="fox.php#miasma_fox">蟲狐</a>の能力の対象外 (処刑・襲撃両対応)</li>
    <li><a href="human.php#guard_group">狩人系</a>の護衛無効</li>
    <li><a href="human.php#fend_guard">忍者</a>・<a href="human.php#awake_wizard">比丘尼</a>・<a href="lovers.php#sacrifice_angel">守護天使</a>・<a href="vampire.php#doom_vampire">冥血鬼</a>・<a href="ogre.php">鬼陣営</a>・<a href="duelist.php#sacrifice_patron">身代わり地蔵</a>・<a href="mania.php#sacrifice_mania">影武者</a>・<a href="sub_role.php#challenge_lovers">難題</a>の耐性無効</li>
    <li><a href="human.php#ghost_common">亡霊嬢</a>・<a href="human.php#presage_scanner">件</a>・<a href="#miasma_mad">土蜘蛛</a>・<a href="#critical_mad">釣瓶落とし</a>・<a href="#therian_mad">獣人</a>・<a href="duelist.php#cursed_avenger">がしゃどくろ</a>・<a href="duelist.php#critical_avenger">狂骨</a>・<a href="mania.php#revive_mania">五徳猫</a>・<a href="sub_role.php#mind_sheep">羊</a>の能力無効</li>
    <li><a href="ability.php#sacrifice">身代わり能力</a>・<a href="ability.php#revive_self">自己蘇生能力</a>無効</li>
    <li><a href="vampire.php#vampire_do">吸血死</a>無効</li>
    <li><a href="#boss_wolf">白狼</a>化 (占い結果が「村人」になる)。ただし、<a href="human.php#soul_mage">魂の占い師</a>は騙せない。</li>
  </ol>
</ol>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
<a href="human.php#doll_master">人形遣い</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>の身代わり能力無効
</pre>
<h5>Ver. 1.4.0 β13～</h5>
<pre>
<a href="#miasma_mad">土蜘蛛</a>の能力無効
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルの、人狼系最終兵器です。
LW になると処刑以外では止められなくなります。
<a href="human.php#escaper_group">逃亡者系</a>・<a href="fox.php">妖狐</a>は LW になっても襲撃失敗する可能性があります。
</pre>

<h3 id="elder_wolf">古狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 β5～]</h3>
<pre>
処刑投票数が +1 される人狼。詳細は<a href="human.php#elder">長老</a>参照。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#elder">長老</a>の人狼バージョンです。
PP 圏内まで持ち込んだ時に真価を発揮します。
有効な騙り先がほとんど無い為、立ち回りが非常に難しい役職です。
</pre>

<h3 id="cute_wolf">萌狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 α14～]</h3>
<pre>
昼の間だけ、低確率で発言が遠吠えに入れ替わってしまう人狼。
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
東方ウミガメ人狼のプレイヤーさんが実際にやってしまった失敗がモデルです。
</pre>

<h3 id="scarlet_wolf">紅狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 α24～]</h3>
<pre>
<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える人狼。
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
<a href="fox.php#scarlet_fox">紅狐</a>の人狼バージョンです。
<a href="fox.php#child_fox">子狐</a>は念話できないので夜の会話で直接ばれることはありません。
占いを騙ることで妖狐側から子狐に見えるよう振舞う手もありますが
紅狼が妖狐を把握してるわけではないので「味方」に黒を出す可能性も……
</pre>

<h3 id="silver_wolf">銀狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.4.0 α21～]</h3>
<pre>
<a href="#partner">仲間</a>が分からない人狼。
(他の人狼・<a href="#fanatic_mad">狂信者</a>・<a href="#whisper_mad">囁き狂人</a>からも仲間であると分からない)
二日目以降の夜の独り言が他の人には<a href="wolf.php#howl">人狼の遠吠え</a>に見える。
人狼同士の会話もできない。
</pre>
<h5>Ver. 1.5.0 β10～</h5>
<pre>
夜の独り言が<a href="#howl">遠吠え</a>に見える日を二日目以降に変更
</pre>
<h5>Ver. 1.4.0 α23～</h5>
<pre>
独り言が他の人から<a href="#howl">遠吠え</a>に見える。
</pre>
<h4>関連役職</h4>
<pre>
<a href="fox.php#howl_fox">化狐</a>・<a href="ability.php#partner_silver">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
仲間と連携が取れないので動き方が難しくなると思います。
仲間に襲撃されて狐扱いされて吊られる可能性も……
</pre>

<h3 id="emperor_wolf">帝狼 (占い結果：人狼 / 霊能結果：人狼) [Ver. 1.5.0 β17～]</h3>
<pre>
人狼陣営勝利に加えて、<a href="#mad_group">狂人系</a>の全滅が勝利条件の人狼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="fox.php#critical_fox">寿羊狐</a>・<a href="ogre.php#orange_ogre">前鬼</a>・<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="fox.php#critical_fox">寿羊狐</a>の人狼バージョンです。
狂人を交えた PP で勝てなくなるので難易度が上がります。
</pre>


<h2 id="mad_group">狂人系</h2>
<p>
<a href="#mad_rule">基本ルール</a>
</p>
<p>
<a href="#mad">狂人</a>
<a href="#fanatic_mad">狂信者</a>
<a href="#whisper_mad">囁き狂人</a>
<a href="#jammer_mad">月兎</a>
<a href="#voodoo_mad">呪術師</a>
<a href="#enchant_mad">狢</a>
<a href="#dream_eater_mad">獏</a>
<a href="#possessed_mad">犬神</a>
<a href="#trap_mad">罠師</a>
<a href="#snow_trap_mad">雪女</a>
</p>
<p>
<a href="#corpse_courier_mad">火車</a>
<a href="#amaze_mad">傘化け</a>
<a href="#agitate_mad">扇動者</a>
<a href="#miasma_mad">土蜘蛛</a>
<a href="#critical_mad">釣瓶落とし</a>
<a href="#follow_mad">舟幽霊</a>
<a href="#therian_mad">獣人</a>
<a href="#revive_mad">尸解仙</a>
<a href="#immolate_mad">殉教者</a>
</p>

<h3 id="mad_rule">基本ルール</h3>
<ol>
<li>騙りにリスクを与えるために、特殊能力を持った狂人は<br><a href="human.php#guard_hunt">狩人の護衛</a>で死亡する仕様となっています。</li>
<li><a href="human.php#psycho_mage">精神鑑定士</a>の判定は「嘘つき」です。</li>
</ol>

<h3 id="mad">狂人 (占い結果：村人 / 霊能結果：村人)</h3>
<pre>
狂人系の<a href="mania.php#basic_mania">基本種</a>。
</pre>

<h3 id="fanatic_mad">狂信者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α3-7～]</h3>
<pre>
人狼が誰か分かる上位狂人 (<a href="#partner">仲間表示</a>参照)。
人狼からは狂信者は分からない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#whisper_mad">囁き狂人</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
実装した当初は<a href="human.php#soul_mage">魂の占い師</a>や<a href="human.php#poison_guard">騎士</a>と出現率のせいもあって
活躍できなかったようですが、本来はかなり強いはず。
</pre>

<h3 id="whisper_mad">囁き狂人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<pre>
人狼の夜の会話に参加できる上位狂人 (<a href="#partner">仲間表示</a>参照)。
人狼と違い、発言が遠吠えに変換されない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#fanatic_mad">狂信者</a>・<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
通称「C国狂人」、最強クラスの狂人です。「ささやき きょうじん」と読みます。
相談できるので完璧な連携が取れます。
</pre>

<h3 id="jammer_mad">月兎 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α19～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
夜に投票した人の占い能力を妨害する特殊な狂人。
</pre>
<ol>
  <li>妨害可能な役職は<a href="human.php#mage_group">占い師系</a> (<a href="human.php#voodoo_killer">陰陽師</a>・<a href="human.php#dummy_mage">夢見人</a>を除く)・<a href="fox.php#emerald_fox">翠狐</a>・<a href="fox.php#child_fox">子狐</a>・<a href="fox.php#sex_fox">雛狐</a>・<a href="fox.php#stargazer_fox">星狐</a>と<br>
    <a href="#enchant_mad">狢</a>・<a href="chiroptera.php#fairy_group">妖精系</a> (<a href="chiroptera.php#mirror_fairy">鏡妖精</a>・<a href="chiroptera.php#sweet_fairy">恋妖精</a>を除く)。</li>
  <li><a href="human.php#wizard_group">魔法</a>による占い能力にも有効。</li>
  <li>妨害に成功すると対象の占い結果が「～さんの占いに失敗しました」となる。</li>
  <li>妨害が成功したかどうかは本人には分からない。</li>
  <li>呪われている人を選んだ場合は呪返しを受ける。</li>
</ol>
<h5>Ver. 1.4.0 α21～</h5>
<pre>
名称を邪魔狂人から月兎に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#anti_voodoo">厄神</a>・<a href="ability.php#phantom">占い妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職で、狂人系の中でも上位に属します。
妨害しすぎると妖狐が有利になるので加減するのがポイントです。
</pre>

<h3 id="voodoo_mad">呪術師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α20～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
夜に投票した人に呪いをかける特殊な狂人。
</pre>
<ol>
  <li>呪われた人を占った<a href="human.php#mage_group">占い能力者</a>は呪返しを受ける。</li>
  <li><a href="ability.php#cursed">呪い所持者</a>を選んだ場合は本人が呪返しを受ける。</li>
  <li>呪いをかけた人が他の人にも呪いをかけられていた場合は本人が呪返しを受ける。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="human.php#voodoo_killer">陰陽師</a>・<a href="human.php#anti_voodoo">厄神</a>・<a href="ability.php#cursed_group">呪い能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#trap_mad">罠師</a>の対<a href="human.php#mage_group">占い</a>バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/13" target="_top">新役職考案スレ(13)</a> が原型です。
<a href="human.php#mage">占い師</a>の占い先を先読みして呪いをかけておくことで呪返しを狙うのが
基本的な立ち回りになると思います。
</pre>

<h3 id="enchant_mad">狢 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β17～]</h3>
<h4>[耐性] 狩り：有効</h4>
<h4>[悪戯能力] タイプ：迷彩 / 占い妨害：有効 / 呪い：有効</h4>
<pre>
悪戯先が人狼に襲撃されたら、次の日、全員のアイコンを襲撃された人にする特殊な狂人。
<a href="sub_role.php#bad_status">悪戯</a>の仕様は<a href="chiroptera.php#fairy_do">妖精系</a>と同じで、対象が複数いた場合は表示するたびにランダムに選択される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="chiroptera.php#fairy_group">妖精</a>の狂人バージョンで、「むじな」と読みます。
客観的に存在していることを証明することができます。
</pre>

<h3 id="dream_eater_mad">獏 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α21～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
夜に投票した人が<a href="ability.php#dummy">夢系能力者</a>か<a href="chiroptera.php#fairy_group">妖精系</a>なら殺すことができる特殊な狂人。
死因は「獏の餌食になった」で、<a href="mania.php#dummy_mania">夢語部</a>は変化前なら殺すことができる。
<a href="human.php#dummy_poison">夢毒者</a>を吊ると「毒」に中る。

以下の形で<a href="human.php#dummy_guard">夢守人</a>に遭遇した場合は死亡する (死因は「狩り」)。
</pre>
<ol>
  <li>襲撃先が夢守人だった。</li>
  <li>夢守人に自分が護衛された。</li>
  <li>襲撃先が夢守人に護衛されていた。</li>
</ol>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
<a href="human.php#dummy_poison">夢毒者</a>を吊ると「毒」に中る (襲撃した場合は中らない)。
<a href="chiroptera.php#fairy_group">妖精系</a>も殺す事ができる。
</pre>
<h5>Ver. 1.4.0 α23～</h5>
<pre>
初日の襲撃はできません (<a href="human.php#assassin_group">暗殺者系</a>と挙動を揃えました)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#psycho">精神関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
対<a href="ability.php#dummy">夢系能力者</a>専門の<a href="human.php#assassin_group">暗殺者</a>という位置付けで、「ばく」と読みます。
夢系は基本的には村人陣営なので所属は狂人となります。
</pre>

<h3 id="possessed_mad">犬神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[耐性] 狩り：有効 / 陰陽師：死亡 / 封印：有効 / 憑依：無効</h4>
<pre>
一度だけ、死体に憑依することができる特殊な狂人。
</pre>
<ol>
<li>身代わり君・<a href="fox.php">妖狐陣営</a>・<a href="lovers.php">恋人陣営</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>には憑依できない。</li>
<li>憑依を実行した時に<a href="human.php#anti_voodoo">厄神</a>に護衛されると憑依に失敗する。</li>
<li>憑依を実行しなければ<a href="human.php#anti_voodoo">厄神</a>に護衛されても「厄払い成功」とは判定されない。</li>
<li>憑依を実行した時に占い能力者に占われても憑依妨害は受けない。</li>
<li>憑依中に<a href="human.php#anti_voodoo">厄神</a>に護衛されると憑依状態を解かれて元の体に戻される。</li>
<li>複数の憑依能力者が同時に同じ人に憑依しようとした場合は全員憑依失敗扱いになる。</li>
<li>死亡した人狼にも憑依できるが、夜の発言は独り言になり、仲間の人狼と会話できない。</li>
</ol>
<h5>Ver. 1.4.11 / Ver. 1.5.0 β13～</h5>
<pre>
憑依無効
</pre>
<h5>Ver. 1.4.0 β12～</h5>
<pre>
<a href="human.php#revive_priest">天人</a>・<a href="human.php#detective_common">探偵</a> (<a href="#possessed_wolf">憑狼</a>が憑依できない役職) には憑依できない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#sacrifice_cat">猫神</a>・<a href="ability.php#possessed">憑依能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「蘇生された人は本物なのか？」という疑心暗鬼を振りまくための存在です。
<a href="#possessed_wolf">憑狼</a>と違い、死体に憑依するので死体の数で見切られやすいのが難点です。
</pre>

<h3 id="trap_mad">罠師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α18～]</h3>
<h4>[耐性] 罠：有効 / 狩り：有効 / 封印：有効</h4>
<pre>
一度だけ、夜に誰か一人に罠を仕掛けることができる特殊な狂人。
罠を仕掛けられた人の元に訪れた接触行動系能力者は全員死亡する。
</pre>
<ol>
  <li>対象は<a href="human.php#guard_group">狩人系</a> (<a href="human.php#anti_voodoo">厄神</a>・<a href="human.php#dummy_guard">夢守人</a>は対象外)・<a href="human.php#clairvoyance_scanner">猩々</a>・<a href="human.php#escaper_group">逃亡者系</a>・<a href="#wolf_group">人狼系</a>・<a href="vampire.php">吸血鬼陣営</a>・<a href="ability.php#assassin">暗殺能力者</a>。</li>
  <li>自分が<a href="#wolf_group">人狼系</a> (種類を問わない) に襲撃されたら罠設置が無効になる。</li>
  <li>罠を仕掛けた先に他の罠師が罠を仕掛けていた場合は罠にかかる。</li>
  <li>自分にも仕掛けることができる。</li>
  <li>自分に仕掛けた場合は人狼に襲撃されても有効 (人狼が罠にかかる)。</li>
  <li>自分に仕掛けた場合は他の罠師が罠をかけていても本人は罠にかからない。<br>
    (仕掛けに来た他の罠師は罠にかかる)</li>
  <li>自分に仕掛けて<a href="human.php#guard_group">狩人系</a>に護衛された場合は相打ちになる。</li>
  <li><a href="human.php#assassin_group">暗殺者系</a>が罠にかかった場合、暗殺は無効。</li>
  <li><a href="#sirius_wolf">天狼</a> (覚醒状態) には無効。</li>
</ol>
<h5>Ver. 1.5.0 α8～</h5>
<pre>
自分に仕掛けた場合はあらゆる罠にかからない。
</pre>
<h5>Ver. 1.4.0 β16～</h5>
<pre>
自分に仕掛けた場合でも別種の罠には掛かる。
例) 罠師が自己設置+そこに<a href="#snow_trap_mad">雪女</a>の罠→ 罠師は<a href="sub_role.php#frostbite">凍傷</a>・雪女は罠死
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#trap">罠能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
人狼陣営に対<a href="human.php#assassin_group">暗殺者</a>を何か……と思案してこういう形に落ち着きました。
一行動で多くの能力者を葬れる可能性を秘めています。
人狼の襲撃先を外しつつ狩人の護衛先や暗殺者の襲撃先を読み切って
ピンポイントで罠を仕掛けないといい仕事にならないので活躍するのは
非常に難しいと思いますが、当たればきっと最高の気分になれるはず。
</pre>

<h3 id="snow_trap_mad">雪女 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β16～]</h3>
<h4>[耐性] 罠：有効 / 狩り：有効</h4>
<pre>
<a href="sub_role.php#frostbite">凍傷</a>になる罠を何回でも仕掛けることができる特殊な狂人。
罠に関する仕様は<a href="#trap_mad">罠師</a>と同じだが、殺傷能力はないので
罠にかかった人の能力を無効化することはできない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sudden_death">ショック死発動能力者</a>・<a href="ability.php#trap">罠能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#trap_mad">罠師</a>の使用回数無制限バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/736" target="_top">新役職考案スレ(736)</a> が原型です。
<a href="sub_role.php#frostbite">凍傷</a>の性質上、なった場合は CO せざるを得ないので接触系能力者を
まとめて炙り出すことが可能になります。
</pre>

<h3 id="corpse_courier_mad">火車 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α21～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
処刑投票先が処刑されたら霊能結果を隠蔽できる特殊な狂人。
</pre>
<ol>
  <li>投票先が処刑された時点で能力が発動する。</li>
  <li>能力が発動すると<a href="human.php#dummy_necromancer">夢枕人</a>以外の霊能結果が「～さんの死体が盗まれた」という趣旨のメッセージになる。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="human.php#necromancer_group">霊能者系</a>・<a href="human.php#philosophy_wizard">賢者</a>・<a href="#amaze_mad">傘化け</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#jammer_mad">月兎</a>の霊能妨害バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/48" target="_top">新役職考案スレ(48)</a> が原型です。
「かしゃ」と読みます。
火車の能力が発動しているのに霊能結果を出す人は<a href="human.php#dummy_necromancer">夢枕人</a>か騙りになります。
</pre>

<h3 id="amaze_mad">傘化け (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β19～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
処刑投票先が処刑されたら投票結果を隠蔽できる特殊な狂人。
</pre>
<ol>
  <li>処刑投票先が処刑された時点で能力が発動する。</li>
  <li>能力が発動すると死亡者メッセージ欄に「傘化けの能力で隠蔽された」と表示される。</li>
  <li>観戦画面・配役公開されていない霊界でも能力は有効。</li>
  <li>対象が<a href="sub_role.php#possessed_target">憑依</a>中でも能力は有効。</li>
</ol>
<h5>Ver. 2.0.0 α3～</h5>
<pre>
<a href="sub_role.php#bad_status">悪戯</a>はつかない仕様に変更。
</pre>
<h5>Ver. 1.4.8 / Ver. 1.5.0 α6～</h5>
<pre>
対象が<a href="sub_role.php#possessed_target">憑依</a>中でも能力が適用される。
</pre>
<h5>Ver. 1.4.0 β21～</h5>
<pre>
能力が発動すると死亡者メッセージ欄に「傘化けの能力で隠蔽された」と表示される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#corpse_courier_mad">火車</a>の処刑投票結果妨害バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/168" target="_top">新役職考案スレ(168)</a> が原型です。
<a href="#elder_wolf">古狼</a>・<a href="#miasma_mad">土蜘蛛</a>・<a href="#agitate_mad">扇動者</a>などがいると真価を発揮します。
</pre>

<h3 id="agitate_mad">扇動者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β7～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
再投票の最多得票者に投票していた場合に、投票先を処刑し、
それ以外の最多得票者をまとめてショック死させる特殊な狂人。
</pre>
<h4>処刑者決定法則</h4>
<ol>
  <li>事前に処刑者が決定していた場合は発動しない (<a href="../spec.php#vote_day">判定</a>は<a href="human.php#saint">聖女</a>の後)。</li>
  <li>複数の扇動者が最多得票者に投票していた場合は、投票先が一致している場合のみ発動する。</li>
  <li>最多得票者に自分が含まれていても有効 (自分の投票先が処刑されて、自分はショック死する)。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#decide">処刑者決定能力者</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
オリジナルは「処刑投票を二回発生させる能力」ですが、
より扇動者っぽくアレンジしてみました。
</pre>

<h3 id="miasma_mad">土蜘蛛 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
処刑投票先に<a href="sub_role.php#febris">熱病</a>を付加する特殊な狂人。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑者決定後で、自分が毒やショック死で死亡した場合でも有効。</li>
<li>対象が死亡していた場合は無効 (例：処刑・毒死)。</li>
<li>自分が処刑された場合は無効。</li>
<li><a href="human.php#detective_common">探偵</a>・<a href="#sirius_wolf">天狼</a> (完全覚醒状態)・<a href="sub_role.php#challenge_lovers">難題</a>には無効。</li>
</ol>
<h5>Ver. 1.4.0 β19～</h5>
<pre>
自分が処刑された場合は無効
</pre>
<h5>Ver. 1.4.0 β13～</h5>
<pre>
<a href="#sirius_wolf">天狼</a> (完全覚醒状態)・<a href="sub_role.php#challenge_lovers">難題</a>には無効。
</pre>
<h5>Ver. 1.4.0 β10～</h5>
<pre>
<a href="human.php#detective_common">探偵</a>には無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#cure_pharmacist">河童</a>・<a href="human.php#philosophy_wizard">賢者</a>・<a href="ability.php#vote_action">処刑投票能力者</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/33" target="_top">新役職考案スレ(33)</a> が原型です。
<a href="sub_role.php#febris">熱病</a>の仕様と実装がなかなか決まらず、作成決定から実装まで
かなり間が開いてます。
</pre>

<h3 id="critical_mad">釣瓶落とし (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α5～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
処刑投票先に<a href="sub_role.php#critical_luck">痛恨</a>を付加する特殊な狂人。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑者決定後で、自分が毒やショック死で死亡した場合でも有効。</li>
<li>対象が死亡していた場合は無効 (例：処刑・毒死)。</li>
<li>自分が処刑された場合は無効。</li>
<li><a href="human.php#detective_common">探偵</a>・<a href="#sirius_wolf">天狼</a> (完全覚醒状態)・<a href="sub_role.php#challenge_lovers">難題</a>には無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="human.php#philosophy_wizard">賢者</a>・<a href="ability.php#vote_action">処刑投票能力者</a>・<a href="ability.php#luck">得票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#miasma_mad">土蜘蛛</a>の<a href="sub_role.php#critical_luck">痛恨</a>バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/932" target="_top">新役職考案スレ(932)</a> が原型です。
存在が発覚しにくいですが、発動は確率依存なのが難点です。
</pre>

<h3 id="follow_mad">舟幽霊 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α5～]</h3>
<h4>[耐性] 狩り：有効</h4>
<pre>
処刑者決定後に、投票先がショック死していたら、誰か一人をさらにショック死させる特殊な狂人。
</pre>
<ol>
  <li>自分が処刑された場合は無効。</li>
  <li><a href="../spec.php#vote_day">判定</a>は<a href="sub_role.php">サブ役職</a>の判定の後で、死因は「道連れにされた」。</li>
  <li>複数の舟幽霊が投票していたら人数分ショック死が発生する。</li>
  <li>舟幽霊の能力でショック死した先に別の舟幽霊が投票していたらさらにショック死が発生する。</li>
  <li><a href="human.php#detective_common">探偵</a>・<a href="#sirius_wolf">天狼</a> (完全覚醒状態)・<a href="quiz.php#quiz">出題者</a>・<a href="sub_role.php#challenge_lovers">難題</a>はショック死の対象外。</li>
  <li>舟幽霊の能力で発生するショック死に対する<a href="ability.php#anti_sudden_death">ショック死抑制能力者</a>の能力は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の村紗 水蜜がモチーフで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/319" target="_top">新役職考案スレ(319)</a> を参考にしています。
<a href="human.php#cure_pharmacist">河童</a>などを騙ることでショック死発生者を狙い撃ちにする事ができます。
ショック死の死因は問わないので、条件次第で大量のショック死が発生します。
</pre>

<h3 id="therian_mad">獣人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β15～]</h3>
<h4>[耐性] 人狼襲撃：無効 + 人狼変化</h4>
<pre>
人狼 (種類は問わない) に襲撃されたら「<a href="#wolf">人狼</a>」に変化する、特殊な狂人。
<a href="#wolf">人狼</a>に変化すると<a href="sub_role.php#changed_therian">元獣人</a>がつく。
</pre>
<ol>
  <li>襲撃失敗 (例：狩人護衛) していた場合は無効。</li>
  <li>身代わり君か、襲撃者が<a href="#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は能力無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#resist_wolf">人狼襲撃耐性能力者</a>
</pre>
<h5>Ver. 1.5.0 β6～</h5>
<pre>
<a href="human.php#guard_hunt">狩り</a>の対象外に変更。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。
襲撃を引き寄せつつ、そのまま生き残るのは非常に難しいと思われます。
これを想起して襲撃される狂人が増える可能性もありますね。
</pre>

<h3 id="revive_mad">尸解仙 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β13～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 蘇生 (1回限定) / 蘇生：不可 / 憑依：無効 / 封印：有効</h4>
<pre>
人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する (自己蘇生) 特殊な狂人。
自己蘇生能力の仕様は<a href="human.php#revive_pharmacist">仙人</a>と同じ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>・<a href="ability.php#seal">封印対象者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#revive_pharmacist">仙人</a>の狂人バージョンで、「しかいせん」と読みます。
</pre>

<h3 id="immolate_mad">殉教者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α9～]</h3>
<h4>[耐性] 人狼襲撃：特殊</h4>
<pre>
人狼陣営勝利に加えて、人狼に襲撃されることが勝利条件の特殊な狂人。
人狼 (種類は問わない) に襲撃されたら「<a href="sub_role.php#muster_ability">能力発現</a>」がつく。
</pre>
<ol>
  <li><a href="sub_role.php#muster_ability">能力発現</a>がついていれば生死は問わない。</li>
  <li><a href="sub_role.php#muster_ability">能力発現</a>がついても襲撃自体は成功扱い (人狼の襲撃なら通常通り死亡する)。</li>
  <li>襲撃失敗 (例：狩人護衛) していた場合は無効。</li>
  <li>身代わり君か、襲撃者が<a href="#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は<a href="sub_role.php#muster_ability">能力発現</a>はつかない。</li>
</ol>
<h5>Ver. 1.5.0 β6～</h5>
<pre>
<a href="human.php#guard_hunt">狩り</a>の対象外に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="fox.php#immolate_fox">野狐禅</a>・<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「人狼に襲撃される」ことが勝利条件の特殊役職は他国に実在します。
それを元に狂人系の劣化種としてデザインしました。
</pre>
</body></html>
