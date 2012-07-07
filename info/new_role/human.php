<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('村人陣営');
?>
<p><a href="#change_group">所属変更</a></p>
<p>
<a href="#human_group">村人系</a>
<a href="#mage_group">占い師系</a>
<a href="#necromancer_group">霊能者系</a>
<a href="#medium_group">巫女系</a>
<a href="#priest_group">司祭系</a>
<a href="#guard_group">狩人系</a>
<a href="#common_group">共有者系</a>
<a href="#poison_group">埋毒者系</a>
<a href="#poison_cat_group">猫又系</a>
<a href="#pharmacist_group">薬師系</a>
</p>
<p>
<a href="#assassin_group">暗殺者系</a>
<a href="#mind_scanner_group">さとり系</a>
<a href="#jealousy_group">橋姫系</a>
<a href="#brownie_group">座敷童子系</a>
<a href="#wizard_group">魔法使い系</a>
<a href="#doll_group">上海人形系</a>
<a href="#escaper_group">逃亡者系</a>
</p>

<h2 id="change_group">所属変更</h2>
<h3>Ver. 1.4.0 β22～</h3>
<pre>
<a href="#escaper">逃亡者</a>：<a href="#human_group">村人系</a>→<a href="#escaper_group">逃亡者系</a>
</pre>
<h3>Ver. 1.4.0 β16～</h3>
<pre>
<a href="#brownie">座敷童子</a>：<a href="#human_group">村人系</a>→<a href="#brownie_group">座敷童子系</a>
</pre>
<h3>Ver. 1.4.0 β13～</h3>
<pre>
<a href="mania.php#mania_group">神話マニア系</a>：村人陣営→<a href="mania.php">神話マニア陣営</a>
<a href="#medium">巫女</a>：<a href="#necromancer_group">霊能者系</a>→<a href="#medium_group">巫女系</a>
</pre>
<h3>Ver. 1.4.0 β2～</h3>
<pre>
<a href="#poison_cat">猫又</a>：<a href="#poison_group">埋毒者系</a>→<a href="#poison_cat_group">猫又系</a>
</pre>


<h2 id="human_group">村人系</h2>
<p>
<a href="#human">村人</a>
<a href="#saint">聖女</a>
<a href="#executor">執行者</a>
<a href="#elder">長老</a>
<a href="#scripter">執筆者</a>
<a href="#suspect">不審者</a>
<a href="#unconscious">無意識</a>
</p>

<h3 id="human">村人 (占い結果：村人 / 霊能結果：村人)</h3>
<pre>
村人陣営の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#saint">聖女</a>・<a href="#executor">執行者</a>・<a href="#suspect">不審者</a>・<a href="#unconscious">無意識</a>・<a href="#crisis_priest">預言者</a>・<a href="#widow_priest">未亡人</a>・<a href="#chain_poison">連毒者</a>・<a href="#dummy_scanner">幻視者</a>
</pre>
<h4>関連役職</h4>
<pre>
<a href="#sacrifice_common">首領</a>・<a href="#brownie">座敷童子</a>・<a href="wolf.php#tongue_wolf">舌禍狼</a>
</pre>

<h3 id="saint">聖女 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β7～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<pre>
再投票の最多得票者になった場合に、内訳によって処刑する人を変化させる村人。
本人表記は「<a href="#human">村人</a>」。
</pre>
<h4>処刑者決定法則</h4>
<pre>
<a href="../spec.php#vote_day">判定</a>は<a href="#executor">執行者</a>の後。
</pre>
<ol>
<li>非村人 (村人陣営以外 + <a href="sub_role.php#lovers">恋人</a>) を一人だけ含む → 非村人</li>
<li>非村人が複数含まれている → 再投票</li>
<li>全員村人 + 最多得票者の聖女は自分だけ → 自分</li>
<li>全員村人 + 最多得票者の聖女が複数いる → 再投票</li>
<li>自分が恋人だった場合は自分も非村人扱い<br>
  例1) 聖女・聖女[恋人]・村人 → 聖女[恋人]<br>
  例2) 聖女[恋人]・人狼 → 再投票
</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#decide">処刑者決定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
やる夫人狼のプレイヤーさんがモデルです。
判定法則が少々複雑ですが、基本的には村人陣営が有利になる結果になります。
<a href="sub_role.php#decide">決定者</a>同様、一見地味ですが勝負所で効いてくる存在になることでしょう。
</pre>

<h3 id="executor">執行者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<pre>
再投票発生時に非村人 (村人陣営以外 + 恋人) に投票していた場合は処刑できる村人。
本人表記は「<a href="#human">村人</a>」。
</pre>
<h4>処刑者決定法則</h4>
<pre>
<a href="../spec.php#vote_day">判定</a>は<a href="quiz.php#quiz">出題者</a>の後。
</pre>
<ol>
<li>投票先が非村人 → 非村人</li>
<li>投票先が村人 → 再投票</li>
<li>執行者が複数 + 非村人に投票していたのは一人だけ → 非村人<br>
  例) 執行者A → 村人A / 執行者B → 村人B / 執行者C → 人狼A =&gt; 人狼A
</li>
<li>執行者が複数 + 複数が同じ非村人に投票 → 非村人<br>
  例) 執行者A → 村人A / 執行者B → 人狼A / 執行者C → 人狼A =&gt; 人狼A
</li>
<li>執行者が複数 + 別々の非村人に投票 → 再投票<br>
  例) 執行者A → 村人A / 執行者B → 人狼A / 執行者C → 妖狐A =&gt; 再投票
</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#decide">処刑者決定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
iM@S人狼のプレイヤーさんの誕生日プレゼントです。
「なんとなく人外に投票する程度の能力」を形にしてみました。
</pre>

<h3 id="elder">長老 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β5～]</h3>
<pre>
処刑投票数が +1 される村人。
</pre>
<ol>
<li><a href="sub_role.php#authority_group">権力者系</a>とセットになった場合は追加で補正される。<br>
  例) <a href="sub_role.php#authority_group">権力者</a>ならさらに +1
</li>
<li><a href="sub_role.php#panelist">解答者</a>・<a href="sub_role.php#watcher">傍観者</a>とセットになった場合は 0 で固定。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="sub_role.php#authority">権力者</a>相当の能力を持った村人です。
PP ラインの計算を難しくさせるために作成してみました。
能力の性質上、これを騙るのはほぼ不可能なので同じ能力を持った他陣営種が存在します。
</pre>

<h3 id="scripter">執筆者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β22～]</h3>
<pre>
一定期間後 (5 日目以降) に処刑投票数が +1 される村人。
能力を得たら本人に追加のシステムメッセージが表示される。
<a href="sub_role.php#authority_group">権力者系</a>との関係は<a href="#elder">長老</a>と同じ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#incubate_poison">潜毒者</a>の<a href="#elder">長老</a>バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/902" target="_top">新役職考案スレ(902)</a> が原型です。
東方 Project の稗田 阿求がモチーフです。
</pre>

<h3 id="suspect">不審者 (占い結果：人狼 / 霊能結果：村人) [Ver. 1.4.0 α9～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<h4>[耐性] 精神鑑定：嘘つき</h4>
<pre>
<a href="#mage_group">占い師</a>に人狼と判定されてしまう村人で、本人表記は「<a href="#human">村人</a>」。
昼の間だけ、低確率で発言が人狼の遠吠えに入れ替わってしまう (<a href="wolf.php#cute_wolf">萌狼</a>と同じ)。

発言が遠吠えに変換される確率は 1% (管理者は設定ファイルで変更可能)。
変換されたかどうかは本人にしか分からず、客観的な証明は不可能なので
空発言を多数行なって確認する試みは確率的にもほとんど意味が無いので注意。
</pre>
<h5>Ver. 1.4.0 β7～</h5>
<pre>
遠吠え変換の発動を昼限定に変更。
</pre>
<h5>Ver. 1.4.0 α16～</h5>
<pre>
低確率で発言が遠吠えに変換される (<a href="wolf.php#cute_wolf">萌狼</a>と同じ)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#mage_wolf">特殊占い判定能力者</a>・<a href="ability.php#talk_convert">発言変換能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
村人陣営ですが、<a href="wolf.php">人狼陣営</a>に有利な存在です。
ただし、人狼サイドにも不審者である事は分からないので
占い師の真贋が読みづらくなります。
</pre>

<h3 id="unconscious">無意識 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α13～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<h4>[耐性] 精神鑑定：嘘つき / <a href="sub_role.php#mind_read">サトラレ</a>：無効</h4>
<pre>
他の国で言うと「自覚のない夢遊病者」。本人表記は「<a href="#human">村人</a>」。
夜になると無意識に歩きまわるため人狼 (<a href="wolf.php#partner">仲間表示</a>) に無意識であることが分かってしまう。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#partner_scarlet">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#suspect">不審者</a>同様、村人陣営ですが<a href="wolf.php">人狼陣営</a>に有利な存在です。
無能力であることが確定の村人なので、人狼サイドは潜伏役職を絞りやすくなります。
</pre>


<h2 id="mage_group">占い師系</h2>
<p><a href="#mage_rule">基本ルール</a></p>
<p>
<a href="#mage">占い師</a>
<a href="#puppet_mage">傀儡師</a>
<a href="#soul_mage">魂の占い師</a>
<a href="#psycho_mage">精神鑑定士</a>
<a href="#sex_mage">ひよこ鑑定士</a>
<a href="#stargazer_mage">占星術師</a>
<a href="#voodoo_killer">陰陽師</a>
<a href="#cute_mage">萌占い師</a>
<a href="#dummy_mage">夢見人</a>
</p>

<h3 id="mage_rule">基本ルール [占い]</h3>
<ol>
  <li>占い能力は人狼の襲撃や暗殺などで事前に死亡していた場合は無効。<br>
    例) 人狼の襲撃で死亡した占い師が妖狐を占っていても無効。
  </li>
  <li>占い対象先が同様の理由で事前に死亡していた場合、対象の能力は無効。<br>
    例) 暗殺された<a href="wolf.php#cursed_wolf">呪狼</a>を占っても呪返しは受けない。
  </li>
</ol>

<h3 id="mage">占い師 (占い結果：村人 / 霊能結果：村人)</h3>
<h4>[占い能力] 呪殺：有り / 憑依妨害：有り / 占い妨害：有効 / 呪い：有効</h4>
<pre>
占い師系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#cute_mage">萌占い師</a>・<a href="#dummy_mage">夢見人</a>
</pre>
<h4>関連役職</h4>
<pre>
<a href="#wizard">魔法使い</a>・<a href="#awake_wizard">比丘尼</a>・<a href="#mimic_wizard">物真似師</a>・<a href="sub_role.php#wisp_group">鬼火系</a>
</pre>

<h3 id="puppet_mage">傀儡師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β8～]</h3>
<h4>[占い能力] 呪殺：有り / 憑依妨害：有り / 占い妨害：有効 / 呪い：有効</h4>
<pre>
<a href="#doll_rule">人形</a>から<a href="#doll_master">人形遣い</a>に見える特殊な占い師。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#partner_scarlet">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
いわゆる紅系人外の騙り先要員です。
人形に告発されるので潜伏は難しいですが<a href="#dummy_mage">夢見人</a>でない事を自覚できるので
動きやすいかも知れません。
紅系と違い、人狼・妖狐からは見えないので注意して下さい。
</pre>

<h3 id="soul_mage">魂の占い師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α3-7～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：有り / 占い妨害：有効 / 呪い：有効</h4>
<pre>
占った人の役職が分かる上位占い師。
<a href="fox.php#fox_group">妖狐</a>を占っても呪殺できないが、占い妨害や呪返しは受けるので注意。
</pre>
<h5>Ver. 1.4.0 α15～</h5>
<pre>
<a href="fox.php#fox_group">妖狐</a>を占っても呪殺できない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#soul_wizard">八卦見</a>・<a href="#awake_wizard">比丘尼</a>・<a href="#pierrot_wizard">道化師</a>・<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#soul">役職鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルです。
<a href="wolf.php#boss_wolf">白狼</a>だろうが<a href="fox.php#child_fox">子狐</a>だろうが分かってしまうので村側最強クラスですが、
その分狙われやすいでしょう。
</pre>

<h3 id="psycho_mage">精神鑑定士 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α18～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 占い妨害：有効 / 呪い：無効</h4>
<pre>
「嘘つき」を探し出す特殊な占い師。
<a href="wolf.php#mad_group">狂人系</a>・<a href="ability.php#dummy">夢系</a>・<a href="#suspect">不審者</a>・<a href="#unconscious">無意識</a>を占うと「嘘をついている」と判定される。
<a href="ogre.php">鬼陣営</a>を占った場合は「鬼」と判定される。
それ以外は「正常である」と判定される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#psycho">精神関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
対狂人専門の占い師です。
一部の「本人視点と実際の役職が違う」タイプにも対応しています。
精神鑑定士を真と見るなら占われた人視点の役職がほぼ確定します。
人狼や妖狐の騙りは見抜けないので注意してください。
</pre>

<h3 id="sex_mage">ひよこ鑑定士 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α19～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 占い妨害：有効 / 呪い：無効</h4>
<pre>
性別を判別する特殊な占い師。
<a href="chiroptera.php">蝙蝠陣営</a>・<a href="wolf.php#gold_wolf">金狼</a>・<a href="fox.php#gold_fox">金狐</a>・<a href="sub_role.php#gold_wisp">松明丸</a>を占った場合は「蝙蝠」と判定される。
<a href="ogre.php">鬼陣営</a>を占った場合は「鬼」と判定される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#psycho_mage">精神鑑定士</a>の話を出したときの流石鯖の管理人さんのコメントが
きっかけで生まれた役職です。
</pre>

<h3 id="stargazer_mage">占星術師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β12～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 占い妨害：有効 / 呪い：無効</h4>
<pre>
夜の投票能力の有無を判別する特殊な占い師。
占った夜に、何かしらの投票をした人と<a href="wolf.php#wolf_group">人狼系</a>は「投票能力を持っている」、
それ以外は「投票能力を持っていない」と判定される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#stargazer">投票能力鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の宇佐見 蓮子がモチーフです。
<a href="#psycho_mage">精神鑑定士</a>とは違うアプローチで騙りを見抜くことができます。
初日とそれ以降で判定結果が異なる役職が存在することに注意してください。
</pre>

<h3 id="voodoo_killer">陰陽師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α20～]</h3>
<h4>[占い能力] 呪殺：無し / 憑依妨害：特殊 / 占い妨害：無効 / 呪い：解呪</h4>
<pre>
対呪い専門の特殊な占い師。
占った人が<a href="ability.php#cursed">呪い所持者</a>や<a href="ability.php#possessed">憑依能力者</a>の場合は呪殺し(死因は「呪返し」)、
<a href="ability.php#voodoo">呪術能力者</a>に呪いをかけられていた場合は解呪(呪返しが発動しない)する。
呪殺か解呪が成功した場合のみ、次の日に専用のシステムメッセージが表示される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#anti_voodoo">厄神</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
呪い系統の対抗役職です。
積極的に解呪による人外抹殺を狙う場合は普通の占い師と同じ感覚でいいですが、
<a href="ability.php#voodoo">呪術能力者</a>による呪返しを防ぐのが狙いなら、同時に同じ人を占う必要があるので
動き方が難しくなります。
そもそも呪い系がレアなので役に立つのか分かりませんが……
</pre>

<h3 id="cute_mage">萌占い師 (占い結果：人狼 / 霊能結果：村人) [Ver. 1.5.0 β9～]</h3>
<h4>[役職表示] <a href="#mage">占い師</a></h4>
<h4>[占い能力] 呪殺：有り / 憑依妨害：有り / 占い妨害：有効 / 呪い：有効</h4>
<pre>
占い結果が「人狼」と判定される劣化占い師。本人表記は「<a href="#mage">占い師</a>」。
昼の間だけ、低確率で発言が人狼の遠吠えに入れ替わってしまう (<a href="wolf.php#cute_wolf">萌狼</a>と同じ)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#mage_wolf">特殊占い判定能力者</a>・<a href="ability.php#talk_convert_cute">発言変換能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#cute_wolf">萌狼</a>の占い師バージョンで、いわゆる萌系人外の騙り先要員です。
騙る場合は本人には自覚が無いことに注意してください。
</pre>

<h3 id="dummy_mage">夢見人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α14～]</h3>
<h4>[役職表示] <a href="#mage">占い師</a></h4>
<h4>[耐性] 獏襲撃：死亡 / 精神鑑定：嘘つき</h4>
<h4>[占い能力] 呪殺：無し / 憑依妨害：無し / 占い妨害：無効 / 呪い：無効</h4>
<pre>
「村人」と「人狼」が逆に判定される占い師。本人表記は「<a href="#mage">占い師</a>」。
呪殺できない代わりに呪返しも受けない。
「村人」「人狼」以外の判定 (<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>など) は正しい結果が表示される。
<a href="ability.php#phantom">占い妨害能力</a>の影響を受けない。
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
「村人」「人狼」以外の判定 (<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>など) は正しい結果が表示される。
</pre>
<h5>Ver. 1.4.0 α18～</h5>
<pre>
占い結果がランダムから「村人」⇔「人狼」反転に変わりました。
確定白(例えば共有者)を占って人狼判定が出たら本人視点夢見人確定です。
また、<a href="#psycho_mage">精神鑑定士</a>から「嘘つき」判定を受けても同様です。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/game/48159/1243197597/17" target="_top">新役職提案スレッド＠やる夫(17)</a> が原型です。
完全ランダムでは占い結果が全く役に立たなくなるので白黒反転に変更しました。
</pre>


<h2 id="necromancer_group">霊能者系</h2>
<p><a href="#necromancer_rule">基本ルール</a></p>
<p>
<a href="#necromancer">霊能者</a>
<a href="#soul_necromancer">雲外鏡</a>
<a href="#psycho_necromancer">精神感応者</a>
<a href="#embalm_necromancer">死化粧師</a>
<a href="#emissary_necromancer">密偵</a>
<a href="#attempt_necromancer">蟲姫</a>
<a href="#yama_necromancer">閻魔</a>
<a href="#dummy_necromancer">夢枕人</a>
</p>

<h3 id="necromancer_rule">基本ルール [霊能]</h3>
<pre>
村人陣営が勝利する為には排除する必要がある人外なのに、占いでは人外判定を出せないか
何らかの妨害を受ける役職は霊能で分かります (例：<a href="wolf.php#boss_wolf">白狼</a>・<a href="wolf.php#phantom_wolf">幻狼</a>・<a href="fox.php#cursed_fox">天狐</a>・<a href="fox.php#child_fox">子狐</a>)。
詳細は個々の役職の霊能結果を確認してください。 → <a href="ability.php#necromancer">霊能(特殊判定)</a>
</pre>

<h3 id="necromancer">霊能者 (占い結果：村人 / 霊能結果：村人)</h3>
<h4>[霊能能力] 処刑者情報：有り / 火車：有効</h4>
<pre>
霊能者系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#dummy_necromancer">夢枕人</a>
</pre>
<h4>関連役職</h4>
<pre>
<a href="#mimic_wizard">物真似師</a>・<a href="#spiritism_wizard">交霊術師</a>・<a href="fox.php#monk_fox">蛻庵</a>
</pre>

<h3 id="soul_necromancer">雲外鏡 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[霊能能力] 処刑者情報：有り / 火車：有効</h4>
<pre>
処刑した人の役職が分かる上位霊能者。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#spiritism_wizard">交霊術師</a>・<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#soul">役職鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#soul_mage">魂の占い師</a>の霊能者バージョンです。
占いと違ってメリットが少ないので後回しにしていましたが、<a href="#dummy_necromancer">夢枕人</a>とセットで出すことで
こちらは本人視点、判定に偽りが絶対に無いというアドバンテージが与えられます。
しかし、「死人に口無し」故に<a href="#soul_mage">魂の占い師</a>よりもはるかに騙りやすいですね。
</pre>

<h3 id="psycho_necromancer">精神感応者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α6～]</h3>
<h4>[霊能能力] 処刑者情報：特殊 / 火車：有効</h4>
<pre>
処刑した人の前世が分かる特殊な霊能者。
霊能結果は「～さんの前世は [役職] でした」と表示され、以下の順番で判定される。
</pre>
<ol>
<li><a href="sub_role.php#changed_therian">元獣人</a> → 狂人</li>
<li><a href="sub_role.php#copied_group">元神話マニア系</a> → 神話マニア</li>
<li><a href="wolf.php#mad_group">狂人系</a> → 人狼</li>
<li><a href="#psycho_mage">精神鑑定士</a>の結果が「嘘つき」 → 狂人</li>
<li>それ以外 → 村人</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="#spiritism_wizard">交霊術師</a>・<a href="ability.php#psycho">精神関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#psycho_mage">精神鑑定士</a>の霊能者バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/971" target="_top">新役職考案スレ(971)</a> が原型です。
「変化する役職 (例：<a href="mania.php#mania_group">神話マニア系</a>) を看破する能力」がコンセプトで、
それを「前世」と表現しています。
</pre>

<h3 id="embalm_necromancer">死化粧師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α3～]</h3>
<h4>[霊能能力] 処刑者情報：特殊 / 火車：有効</h4>
<pre>
処刑者と処刑者の投票先の人の陣営が同じかどうか分かる特殊な霊能者。
霊能結果は「～さんの死顔は安らかな/苦悶の表情でした」の二種類で、
違う陣営なら「安らかな～」、同一陣営なら「苦悶の～」と判定される。
<a href="sub_role.php#lovers">恋人</a>は恋人陣営と判定される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#emissary_necromancer">密偵</a>・<a href="#snipe_poison">狙毒者</a>・<a href="#spiritism_wizard">交霊術師</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方陰陽鉄のプレイヤーさんとの雑談から生まれた役職です。
霊能や投票結果と合わせることで推理を発展させることができますが、
非常に騙りやすいですね。
</pre>

<h3 id="emissary_necromancer">密偵 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α3～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<h4>[霊能能力] 処刑者情報：無し / 火車：無効</h4>
<pre>
処刑者に投票した人に処刑者と同一陣営の人が何人いるか分かる特殊な霊能者。
<a href="sub_role.php#lovers">恋人</a>は恋人陣営と判定される。
通常の<a href="#necromancer">霊能者</a>の能力は持っていない。
</pre>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
[耐性] 「<a href="#guard_limit">護衛制限</a>：有り」追加
</pre>
<h4>関連役職</h4>
<pre>
<a href="#embalm_necromancer">死化粧師</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方陰陽鉄のプレイヤーさんとの雑談から生まれた役職です。
<a href="#embalm_necromancer">死化粧師</a>と同様に投票先から推理を組み立てることが可能になります。
</pre>

<h3 id="attempt_necromancer">蟲姫 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β20～]</h3>
<h4>[霊能能力] 処刑者情報：無し / 火車：無効</h4>
<pre>
前日の<a href="wolf.php#wolf_group">人狼系</a>・<a href="ability.php#assassin">暗殺能力者</a>に狙われて生き残った人と<a href="ability.php#revive">蘇生</a>に失敗した人が分かる特殊な霊能者。
通常の<a href="#necromancer">霊能者</a>の能力は持っていない。
</pre>
<ol>
<li>生き残った人がいた場合は、霊能結果に「～さんは命を狙われたようです」と表示される。</li>
<li>生き残っていれば理由は問わない (以下、生存例)。
  <ol>
    <li><a href="#guard_group">狩人</a>の護衛</a></li>
    <li><a href="wolf.php#silver_wolf">銀狼</a>などの人狼同士の襲撃</li>
    <li><a href="#doll_master">人形遣い</a>・<a href="fox.php">妖狐</a>・<a href="ogre.php">鬼</a>などの耐性持ちだった</li>
    <li>襲撃者が<a href="wolf.php#sex_wolf">雛狼</a>だった</li>
    <li><a href="#assassin">暗殺者</a>が人狼に殺された</li>
    <li><a href="#assassin_spec">暗殺反射</a></li>
    <li><a href="sub_role.php#death_warrant">死の宣告</a>など、即死しない能力だった</li>
    <li><a href="ogre.php">鬼</a>の確率などによる人攫い失敗</li>
  </ol>
</li>
<li>死亡した直後に蘇生した場合でも「生き残った」と判定される。</li>
<li>蘇生失敗メッセージは<a href="#yama_necromancer">閻魔</a>と同様、画面の下に表示される (霊界で見えるものと同じ)。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="#clairvoyance_scanner">猩々</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
一部の「生と死の未遂」を感知できる特殊霊能者で、「虫の知らせ」がモチーフです。
「誰が狙われたか」という情報を元に前日の夜に何が起きたか推測できます。
下界にいながら蘇生能力者の存在を感知できるので「蘇生失敗騙り」を看破できます。
また、「暗殺未遂」情報から「<a href="sub_role.php#death_warrant">死の宣告</a>騙り」を看破することも可能になります。
</pre>

<h3 id="yama_necromancer">閻魔 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α20～]</h3>
<h4>[霊能能力] 処刑者情報：無し / 火車：無効</h4>
<pre>
前日の死者の<a href="../spec.php#dead">死因</a>が分かる特殊な霊能者。
通常の<a href="#necromancer">霊能者</a>の能力は持っていない。
死因は画面の下に表示される「～は無残な～」の下の行に
「(～は人狼に襲撃されたようです)」等と表示される。
死亡したら能力無効。
</pre>
<h5>Ver. 1.4.0 α23～</h5>
<pre>
死亡したら能力無効。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="../spec.php#dead">死因</a>が多岐にわたる闇鍋用の特殊霊能者です。
死因が分かるだけなので昼の毒死や暗殺等、死者の役職が分からない可能性も
ある点に注意してください。
</pre>

<h3 id="dummy_necromancer">夢枕人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[役職表示] <a href="#necromancer">霊能者</a></h4>
<h4>[耐性] 獏襲撃：死亡 / 精神鑑定：嘘つき</h4>
<h4>[霊能能力] 処刑者情報：有り / 火車：無効</h4>
<pre>
「村人」と「人狼」が逆に判定される霊能者。本人表記は「<a href="#necromancer">霊能者</a>」。
「村人」と「人狼」以外の判定 (例：<a href="wolf.php#boss_wolf">白狼</a>・<a href="fox.php#white_fox">白狐</a>・<a href="fox.php#child_fox">子狐</a>など) は正しい結果が表示される。
<a href="wolf.php#corpse_courier_mad">火車</a>の能力の影響を受けない。
</pre>
<h5>Ver. 1.4.0 α21～</h5>
<pre>
<a href="wolf.php#corpse_courier_mad">火車</a>の能力の影響を受けない。
</pre>
<h5>Ver. 1.4.0 α18～</h5>
<pre>
霊能結果をランダムから「村人」⇔「人狼」反転に変更
<a href="#psycho_mage">精神鑑定士</a>から「嘘つき」判定を受けた場合は、本人視点夢枕人確定となる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dummy_mage">夢見人</a>の霊能者バージョンです。
完全ランダムでは霊能結果が全く役に立たなくなるので白黒反転に変更しました。
</pre>


<h2 id="medium_group">巫女系</h2>
<p><a href="#medium_rule">所属陣営判定法則</a></p>
<p>
<a href="#medium">巫女</a>
<a href="#bacchus_medium">神主</a>
<a href="#seal_medium">封印師</a>
<a href="#revive_medium">風祝</a>
<a href="#eclipse_medium">蝕巫女</a>
</p>

<h3 id="medium_rule">所属陣営判定法則</h3>
<pre>
「所属陣営」とは、役職表記の先頭に記載されている「～陣営」を指す。
判定の対象はメイン役職のみで、サブ役職は対象外。
従って、<a href="sub_role.php#lovers">恋人</a>はサブ役職なので「恋人」と判定されるのは<a href="lovers.php#cupid_group">キューピッド系</a>・<a href="lovers.php#angel_group">天使系</a>のみ。

例1) <a href="wolf.php#wolf_group">人狼系</a>・<a href="wolf.php#mad_group">狂人系</a>は「人狼」
例2) <a href="fox.php#fox_group">妖狐系</a>・<a href="fox.php#child_fox_group">子狐系</a>は「妖狐」
例3) <a href="lovers.php#cupid_group">キューピッド系</a>・<a href="lovers.php#angel_group">天使系</a>は「恋人」
例4) <a href="chiroptera.php#chiroptera_group">蝙蝠系</a>・<a href="chiroptera.php#fairy_group">妖精系</a>は「蝙蝠」
</pre>

<h3 id="medium">巫女 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α3-7～]</h3>
<pre>
突然死した人と後追いした<a href="sub_role.php#lovers">恋人</a>の所属陣営が分かる、巫女系の<a href="mania.php#basic_mania">基本種</a>。
<a href="../chaos.php">闇鍋モード</a>で登場する「ショック死」する人たちの情報を取るのが主な仕事だが
<a href="#necromancer_group">霊能者</a>とは<a href="#medium_rule">判定法則</a>が違うので注意。
</pre>
<h5>Ver. 1.4.0 β6～</h5>
<pre>
<a href="mania.php#unknown_mania">鵺</a>の所属陣営が正しく判定されないバグ修正 (修正前は常時「村人」判定)
</pre>
<h5>Ver. 1.4.0 α9～</h5>
<pre>
<a href="sub_role.php#lovers">恋人</a>後追いにも対応 (後追いした<a href="sub_role.php#lovers">恋人</a>のみ、元の所属陣営が分かる)
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#eclipse_medium">蝕巫女</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
人狼式のオリジナル役職です。
<a href="../chaos.php">闇鍋モード</a>で大量の突然死が出ることになったので作ってみましたが
霊能者より地味な存在ですね。騙るのも容易なのでなかなか報われないかもしれません。
</pre>

<h3 id="bacchus_medium">神主 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β21～]</h3>
<pre>
処刑投票先が<a href="ogre.php">鬼陣営</a>だった場合にショック死させることができる上位巫女。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑者決定後で、自分が毒やショック死で死亡した場合でも有効。</li>
<li>ショック死させた場合の死因は「神主に酔い潰された」で、<a href="ability.php#anti_sudden_death">ショック死抑制能力者</a>の能力は無効。</li>
<li>対象が死亡していた場合は無効 (例：処刑・毒死)。</li>
<li>自分が処刑された場合は無効。</li>
<li>変化前の<a href="mania.php#soul_mania">覚醒者</a>・<a href="mania.php#dummy_mania">夢語部</a>、<a href="mania.php#unknown_mania_group">鵺系</a>は対象外。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="#reflect_guard">侍</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の神主がモチーフの、対<a href="ogre.php">鬼陣営</a>能力者です。
伝承上の鬼を退治するアイテムの一つであるお酒と掛け合わせてみました。
この役職でメイン役職の総数が既存のものと合わせてちょうど 200 になりました。
</pre>

<h3 id="seal_medium">封印師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<pre>
処刑投票先が回数限定の能力を持っている人外の場合に封じることができる上位巫女。
</pre>
<ol>
<li>対象は<a href="wolf.php#phantom_wolf">幻狼</a>・<a href="wolf.php#resist_wolf">抗毒狼</a>・<a href="wolf.php#revive_wolf">仙狼</a>・<a href="wolf.php#fire_wolf">火狼</a>・<a href="wolf.php#tongue_wolf">舌禍狼</a>・<a href="wolf.php#possessed_mad">犬神</a>・<a href="wolf.php#trap_mad">罠師</a>・<a href="wolf.php#revive_mad">尸解仙</a>・<br>
  <a href="fox.php#phantom_fox">幻狐</a>・<a href="fox.php#spell_fox">宙狐</a>・<a href="fox.php#emerald_fox">翠狐</a>・<a href="fox.php#revive_fox">仙狐</a>・<a href="fox.php#possessed_fox">憑狐</a>・<a href="fox.php#trap_fox">狡狐</a>・<a href="lovers.php#revive_cupid">邪仙</a>・<a href="duelist.php#revive_avenger">夜刀神</a>。</li>
<li><a href="../spec.php#vote_day">判定</a>は処刑者決定後で、自分が毒やショック死で死亡した場合でも有効。</li>
<li>投票先がすでに能力を失っている状態 (<a href="sub_role.php#lost_ability">能力喪失</a>) であればショック死させる。</li>
<li>ショック死させた場合の死因は「封印された」で、<a href="ability.php#anti_sudden_death">ショック死抑制能力者</a>の能力は無効。</li>
<li>対象が死亡していた場合は無効 (例：処刑・毒死)。</li>
<li>自分が処刑された場合は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の博麗 霊夢のスペルカード「夢想封印」がモチーフで、
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/626" target="_top">新役職考案スレ(626)</a> が原型です。
一部の特殊人外にとっては非常に危険な存在となります。
</pre>

<h3 id="revive_medium">風祝 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[耐性] 蘇生：不可</h4>
<h4>[蘇生能力] 成功率：25% / 誤爆：有り</h4>
<pre>
<a href="#poison_cat">猫又</a>相当の<a href="ability.php#revive">蘇生能力</a>を持った上位巫女。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の東風谷 早苗がモチーフで、「かぜはふり」と読みます。
「奇跡」を蘇生能力に読み替えてみました。
</pre>

<h3 id="eclipse_medium">蝕巫女 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β9～]</h3>
<h4>[役職表示] <a href="#medium">巫女</a></h4>
<pre>
再投票になるとショック死する劣化巫女。本人表記は「<a href="#medium">巫女</a>」。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>はショック死処理内部で行う。</li>
<li>ショック死した場合の死因は「封印された」。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="sub_role.php#impatience">短気</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
巫女の劣化種として、夢系ではなく蝕系を採用してみました。
決定能力を失った<a href="sub_role.php#impatience">短気</a>に相当し、死ぬことで自己証明にはなります。
</pre>


<h2 id="priest_group">司祭系</h2>
<p>
<a href="#priest_rule">基本ルール</a>
<a href="#crisis_priest_rule">人外勝利前日判定</a>
</p>
<p>
<a href="#priest">司祭</a>
<a href="#bishop_priest">司教</a>
<a href="#dowser_priest">探知師</a>
<a href="#weather_priest">祈祷師</a>
<a href="#high_priest">大司祭</a>
<a href="#crisis_priest">預言者</a>
<a href="#widow_priest">未亡人</a>
<a href="#holy_priest">聖徳道士</a>
<a href="#revive_priest">天人</a>
<a href="#border_priest">境界師</a>
<a href="#dummy_priest">夢司祭</a>
</p>

<h3 id="priest_rule">基本ルール [司祭]</h3>
<ol>
<li>判定結果は夜も表示されたままだが、昼の処刑結果は反映されていない。</li>
<li><a href="#crisis_priest">預言者</a>・<a href="#widow_priest">未亡人</a>・<a href="#revive_priest">天人</a>以外は狩人の<a href="#guard_limit">護衛制限</a>対象。</li>
</ol>

<h3 id="crisis_priest_rule">人外勝利前日判定</h3>
<pre>
1. 生存者 - (人狼 + 妖狐) &lt;= 人狼 + 2
その日の処刑が人狼以外 + 夜に人狼の襲撃が成立すると人狼勝利となります。
メッセージは「人狼が勝利目前」です。

2. 「条件1 が成立している」または「人狼が残り一人」 + 妖狐 / 恋人が生存している
妖狐が生存していれば「妖狐が勝利目前」、
恋人が生存していれば「恋人が勝利目前」と判定されます。

3. 生存者 &lt;= 恋人 + 2
生存者が全員恋人になると恋人勝利となります。
メッセージは「恋人が勝利目前」です。
</pre>

<h3 id="priest">司祭 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α24～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
一定日数ごとに現在の生存している村人陣営の人数が分かる、司祭系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<ol>
<li>判定が出るのは 4 日目以降の偶数日 (4 → 6 → 8 →...)。</li>
<li>村人陣営の判定法則は<a href="#medium_rule">巫女</a>と同じ。</li>
<li><a href="#revive_priest">天人</a>の蘇生判定は<a href="../spec.php#vote_night">司祭判定</a>の後に実施される。<br>
  従って、「司祭の判定 + <a href="#revive_priest">天人</a>が蘇生した人数」 が司祭視点の正しい値となる。
</li>
</ol>
<h4>同一表示役職</h4>
<pre>
<a href="#dummy_priest">夢司祭</a>・<a href="#priest_jealousy">恋司祭</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/72" target="_top">新役職考案スレ(72)</a> が原型です。
オリジナルは配役非通知設定の闇鍋モード用役職なので、能力を発動した時点で
生存している役職の内訳が完全に分かりますが、人狼式バージョンはかなり情報が
絞られています。
</pre>

<h3 id="bishop_priest">司教 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β10～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
一定日数ごとに現在の死亡している村人陣営以外の人数が分かる、特殊な司祭。
</pre>
<ol>
<li>判定が出るのは 3 日目以降の奇数日 (3 → 5 → 7 →...)。</li>
<li><a href="#medium_rule">巫女</a>の判定と違い、<a href="sub_role.php#lovers">恋人</a>も「村人陣営以外」と判定される。</li>
</ol>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#priest">司祭</a>の亜種で、こちらは死者の内訳を推測することができます。
特に、3 日目の情報は身代わり君の所属陣営を絞り込むのに有効です。
</pre>

<h3 id="dowser_priest">探知師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β15～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
一定日数ごとに現在の生存者が所持している<a href="sub_role.php">サブ役職</a>の総数が分かる、特殊な司祭。
</pre>
<ol>
<li>判定が出るのは 4 日目以降の偶数日 (4 → 6 → 8 →...)。</li>
<li>本人には表示されていないサブ役職もカウントされる (例：<a href="sub_role.php#decide">決定者</a>)。</li>
<li>複数所持できるサブ役職はまとめて一つとカウントされる (例：<a href="sub_role.php#lovers">恋人</a>)。</li>
<li><a href="#revive_priest">天人</a>の蘇生判定は探知師の判定の後に実施される。<br>
  従って、蘇生した<a href="#revive_priest">天人</a>が所持しているサブ役職はカウントされていない。
</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ogre.php#dowser_yaksa">毘沙門天</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のナズーリンがモチーフです。
<a href="lovers.php">恋人</a>の種類の特定、<a href="ability.php#possessed">憑依能力者</a>・<a href="vampire.php">吸血鬼陣営</a>の行動状況の把握に威力を発揮します。
</pre>

<h3 id="weather_priest">祈祷師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α4～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
翌日の<a href="../weather.php">天候</a>が分かる、特殊な司祭。
また、一定条件を満たすと<a href="../weather.php">天候</a>を引き起こすことができる。
</pre>
<ol>
<li>発動条件式は、生存者 - 村人陣営(恋人を含む) &gt; 人狼系 × 2。</li>
<li>判定は 3 の倍数の日の夜 (3 → 6 → 9 →...) で、発動はその 2 日後 (5 → 8 → 11 →...)。</li>
<li>判定を実施するタイミングは<a href="#crisis_priest_rule">人外勝利前日判定</a>と同じ。</li>
<li>発生する天候はランダムで、<a href="../game_option.php#weather">天候あり</a>オプションがオフでも発生する。</li>
<li>天候発動判定時に<a href="#revive_priest">天人</a>の蘇生判定は反映されていない。</li>
<li>生存している祈祷師がいなければ天候は発動しない。</li>
</ol>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
生存している祈祷師がいなければ天候は発動しない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="../weather.php">天候</a>を知り、呼び起こす能力者としてデザインしました。
発動条件は、<a href="wolf.php#wolf_group">人狼系</a>とそれ以外の村人陣営以外の人数を比較しています。
</pre>

<h3 id="high_priest">大司祭 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β21～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
5 日目以降、<a href="#priest">司祭</a>・<a href="#bishop_priest">司教</a>両方の結果が分かる上位司祭。
奇数日に<a href="#bishop_priest">司教</a>・偶数日に<a href="#priest">司祭</a>の結果が表示される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
発動は遅いですが、情報量が多いので多数の役職を一人で兼ねることができます。
<a href="#guard_limit">護衛制限</a>がかかっているので、生き残るのが難しい役職ですね。
</pre>

<h3 id="crisis_priest">預言者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β2～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<pre>
<a href="#crisis_priest_rule">人外勝利前日</a>を判定する特殊な司祭。本人表記は「<a href="#human">村人</a>」。
条件を満たした場合のみ、どの陣営が有利なのかメッセージが表示される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
村の危機を告げる特殊な司祭です。
いわゆる「鉄火場」は<a href="wolf.php#mad_group">狂人</a>や<a href="chiroptera.php">蝙蝠</a>の存在 + <a href="sub_role.php#lovers">恋人</a>の元の役職によって
機械的な判定ができないので判定条件を「システム的な勝敗決定前日」としました。
</pre>

<h3 id="widow_priest">未亡人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β6～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<pre>
身代わり君の役職が分かる特殊な司祭。本人表記は「<a href="#human">村人</a>」。
</pre>
<ol>
<li>2 日目昼に身代わり君と<a href="sub_role.php#mind_sympathy">共感者</a>になることで、身代わり君の役職が分かる。</li>
<li>処理は 1 日目夜の集計時に実施されるので<a href="mania.php">神話マニア</a>がコピーした場合は無効。</li>
<li>身代わり君がいない場合は無効。</li>
<li>身代わり君自身には<a href="sub_role.php#mind_sympathy">共感者</a>はつかない。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#soul">役職鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルです。
身代わり君の正体が分かることでレアケースを潰すことができますが、騙りやすいですね。
</pre>

<h3 id="holy_priest">聖徳道士 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β14～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
身代わり君と自分を含めた周囲の人の所属陣営の総数が分かる、特殊な司祭。
</pre>
<ol>
<li>能力の発動は 4 日目夜で、結果は 5 日目にのみ表示される。</li>
<li><a href="sub_role.php#lovers">恋人</a>は「恋人陣営」と判定される。</li>
<li>該当者が憑依されていても憑依元を追跡しない (該当者の陣営で判定する)。</li>
</ol>
<h4>判定例</h4>
<pre>
 1(村)  2(村)  3(狼)  4(憑)  5(村) ※ 4 は 3 (憑狼) に憑依されている村人
 6(蝙)  7(村)  8(狐)  9(村) 10(恋)
11(恋) 12(狼) 13(村)

5: 4, 5, 9, 10 + 1 → 2
7: 1, 2, 3, 6, 7, 8, 11, 12, 13 → 5
9: 3, 4, 5, 8, 9, 10, 13 + 1 → 4
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の豊聡耳 神子がモチーフです。
最大で 10 人の陣営情報を取得できることになります。
</pre>

<h3 id="revive_priest">天人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β2～]</h3>
<h4>[耐性] 蘇生：不可 / 憑依：無効</h4>
<pre>
2 日目の朝にいきなり死亡して、特定の条件を満たすと生き返る特殊な司祭。
</pre>
<h4>蘇生条件 (どれか一つを満たせば蘇生する)</h4>
<ol>
<li>「<a href="#crisis_priest_rule">人外勝利前日</a>」である。</li>
<li>5 日目である。</li>
<li>村の人口が半分以下になった。</li>
<li>生存している人狼が一人になった。</li>
</ol>
<h4>詳細な仕様</h4>
<ol>
<li>「<a href="../game_option.php#not_open_cast">霊界で配役を公開しない</a>」オプションが有効になっていないと死亡も蘇生もしない。</li>
<li>2 日目の朝の死亡メッセージは「～は無惨な～」で、死因は「天に帰った」。</li>
<li>一度蘇生すると能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。</li>
<li><a href="sub_role.php#lovers">恋人</a>になると能力を失う (2 日目朝の死亡も起こらない)。</li>
<li><a href="mania.php#mania_group">神話マニア</a>がコピーした場合は 2 日目朝の死亡処理は起こらない。</li>
<li>2 日目朝以降に死んでも蘇生判定を満たせば蘇生する。</li>
<li>5 日目になると能力を失う。</li>
<li><a href="ability.php#revive_limit">蘇生対象外</a> (選ばれた場合は失敗する)。</li>
<li><a href="ability.php#possessed">憑依能力者</a>の憑依対象外。</li>
</ol>
<h5>Ver. 1.4.0 β12～</h5>
<pre>
<a href="wolf.php#possessed_mad">犬神</a>・<a href="fox.php#possessed_fox">憑狐</a>の憑依対象外です (<a href="wolf.php#possessed_wolf">憑狼</a>と揃えました)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/54" target="_top">新役職考案スレ(54)</a> が原型です。
復活した天人は恋人でない事が保証されるので非常に頼りになります。
</pre>

<h3 id="border_priest">境界師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β12～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
2 日目以降「夜、自分に何らかの投票をした人の数」が分かる、特殊な司祭。
</pre>
<ol>
<li>能力の発動は 2 日目からなので、判定結果が出るのは 3 日目の昼からになる。</li>
<li>発動していない投票もカウントされる。<br>
  例) 人狼に噛み殺された占い師の投票や<a href="../weather.php">天候</a>による無効化投票もカウントされる。
</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#stargazer">投票能力鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のマエリベリー・ハーンがモチーフです。
例えば、自分を「占った」人が本物かどうかを推測することができます。
</pre>

<h3 id="dummy_priest">夢司祭 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β15～]</h3>
<h4>[役職表示] <a href="#priest">司祭</a></h4>
<h4>[耐性] 護衛制限：有り / 獏襲撃：死亡 / 精神鑑定：嘘つき</h4>
<pre>
一定日数ごとに現在、生存している<a href="ability.php#dummy">夢系能力者</a>と<a href="chiroptera.php#fairy_group">妖精系</a>の人数が分かる特殊な司祭。
本人表記は「<a href="#priest">司祭</a>」で能力の発動日などの仕様も同じ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dummy_mage">夢見人</a>の司祭バージョンです。
<a href="#priest">司祭</a>と判定法則が全然違うので比較的自覚は容易な部類に入ります。
<a href="ability.php#dummy">夢系</a>騙りを看破するヒントになりますが、逆に司祭騙りの難易度が下がることになります。
</pre>


<h2 id="guard_group">狩人系</h2>
<p>
<a href="#guard_limit">護衛制限</a>
<a href="#guard_hunt">狩りの仕様</a>
</p>
<p>
<a href="#guard">狩人</a>
<a href="#hunter_guard">猟師</a>
<a href="#blind_guard">夜雀</a>
<a href="#gatekeeper_guard">門番</a>
<a href="#reflect_guard">侍</a>
<a href="#poison_guard">騎士</a>
<a href="#fend_guard">忍者</a>
<a href="#reporter">ブン屋</a>
<a href="#anti_voodoo">厄神</a>
<a href="#elder_guard">老兵</a>
<a href="#dummy_guard">夢守人</a>
</p>

<h3 id="guard_limit">護衛制限</h3>
<ol>
<li>制限対象は、<a href="#emissary_necromancer">密偵</a>・<a href="#priest_group">司祭系</a> (<a href="#crisis_priest">預言者</a>・<a href="#widow_priest">未亡人</a>・<a href="#revive_priest">天人</a>を除く)・<a href="#reporter">ブン屋</a>・<a href="#detective_common">探偵</a>・<a href="#sacrifice_common">首領</a>・<a href="#spell_common">葛の葉</a><br>
  <a href="#assassin_group">暗殺者系</a>・<a href="#clairvoyance_scanner">猩々</a>・<a href="#priest_jealousy">恋司祭</a>・<a href="#soul_wizard">八卦見</a>・<a href="#barrier_wizard">結界師</a>・<a href="#pierrot_wizard">道化師</a>・<a href="#doll_master">人形遣い</a>。</li>
<li>対象を護衛して襲撃された場合、狩人に「護衛成功」のメッセージは出るが、護衛先は死亡する。</li>
<li>影響を受けるのは<a href="ability.php#guard">護衛能力者</a>のみで、<a href="#blind_guard">夜雀</a>・<a href="#poison_guard">騎士</a>には適用されない。</li>
</ol>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
<a href="#emissary_necromancer">密偵</a>を対象に追加。
</pre>

<h3 id="guard_hunt">狩りの仕様</h3>
<pre>
1. 狩り能力があるのは<a href="#guard">狩人</a>・<a href="#hunter_guard">猟師</a>・<a href="#reflect_guard">侍</a>・<a href="#poison_guard">騎士</a>・<a href="#fend_guard">忍者</a>。
2. 対象は特殊狂人・特殊妖狐・特殊天使・特殊吸血鬼・特殊蝙蝠・特殊復讐者。
2-1. 特殊狂人 (<a href="wolf.php#mad">狂人</a>・<a href="wolf.php#fanatic_mad">狂信者</a>・<a href="wolf.php#whisper_mad">囁き狂人</a>・<a href="wolf.php#therian_mad">獣人</a>・<a href="wolf.php#revive_mad">尸解仙</a>・<a href="wolf.php#immolate_mad">殉教者</a>以外の<a href="wolf.php#mad_group">狂人系</a>)
2-2. 特殊妖狐 (<a href="fox.php#phantom_fox">幻狐</a>・<a href="fox.php#voodoo_fox">九尾</a>・<a href="fox.php#revive_fox">仙狐</a>・<a href="fox.php#possessed_fox">憑狐</a>・<a href="fox.php#doom_fox">冥狐</a>・<a href="fox.php#trap_fox">狡狐</a>・<a href="fox.php#cursed_fox">天狐</a>)
2-3. 特殊天使 (<a href="lovers.php#cursed_angel">堕天使</a>)
2-4. 特殊吸血鬼 (<a href="vampire.php#vampire">吸血鬼</a>・<a href="vampire.php#scarlet_vampire">屍鬼</a>以外の<a href="vampire.php#vampire_group">吸血鬼系</a>)
2-5. 特殊蝙蝠 (<a href="chiroptera.php#poison_chiroptera">毒蝙蝠</a>・<a href="chiroptera.php#cursed_chiroptera">呪蝙蝠</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>)
2-6. 特殊復讐者 (<a href="duelist.php#cursed_avenger">がしゃどくろ</a>・<a href="duelist.php#critical_avenger">狂骨</a>)
3. <a href="#hunter_guard">猟師</a>はさらに<a href="fox.php">妖狐陣営</a>を狩ることができる。
4. <a href="#reflect_guard">侍</a>はさらに<a href="ogre.php">鬼陣営</a>を狩ることができる。
5. <a href="#dummy_guard">夢守人</a>は<a href="chiroptera.php#fairy_group">妖精系</a>を狩ることができる。
6. <a href="wolf.php#dream_eater_mad">獏</a>と<a href="#dummy_guard">夢守人</a>の関係は<a href="wolf.php#dream_eater_mad">獏</a>を参照。
7. 対象が身代わり死していた場合は狩りが発生しない (<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>など)。
</pre>
<h5>Ver. 1.5.0 β6～</h5>
<pre>
<a href="wolf.php#therian_mad">獣人</a>・<a href="wolf.php#immolate_mad">殉教者</a>を対象外に変更。
</pre>
<h5>Ver. 1.4.0 β14～</h5>
<pre>
対象が身代わり死していた場合は狩りが発生しない (<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>など)。
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
<a href="#dummy_guard">夢守人</a>は<a href="chiroptera.php#fairy_group">妖精系</a>を狩ることができる。
</pre>

<h3 id="guard">狩人 (占い結果：村人 / 霊能結果：村人)</h3>
<h4>[狩人能力] 護衛：通常 / 護衛制限：有り / 狩り：有り / 罠：有効</h4>
<pre>
狩人系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#dummy_guard">夢守人</a>
</pre>
<h4>関連役職</h4>
<pre>
<a href="#wizard">魔法使い</a>・<a href="#barrier_wizard">結界師</a>
</pre>

<h3 id="hunter_guard">猟師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[狩人能力] 護衛：身代わり / 護衛制限：有り / 狩り：有り + 妖狐陣営 / 罠：有効</h4>
<pre>
<a href="#guard_hunt">狩り能力</a>に特化した特殊な狩人。
通常の<a href="#guard_hunt">狩り能力</a>に加えて、<a href="fox.php">妖狐陣営</a>も狩る事ができる。
護衛先が<a href="wolf.php#wolf_group">人狼</a> (種類を問わない) に襲撃された場合は本人が死亡する (死因は「人狼の襲撃」)。
<a href="vampire.php">吸血鬼</a>の襲撃から護衛した場合は死亡しない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
メビウス人狼の守護者がモチーフで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/641" target="_top">新役職考案スレ(641)</a> が原型です。
村側の対妖狐の切り札としてデザインしてあり、その分だけ対人狼能力が犠牲になっています。
</pre>

<h3 id="blind_guard">夜雀 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β14～]</h3>
<h4>[狩人能力] 護衛：通常 + 目隠し / 護衛制限：無し / 狩り：無し / 罠：有効</h4>
<pre>
<a href="#guard_hunt">狩り能力</a>は持たないが、護衛先を襲撃した<a href="wolf.php#wolf_group">人狼</a>・<a href="vampire.php">吸血鬼</a>に<a href="sub_role.php#blinder">目隠し</a>を付加する特殊な狩人。
<a href="#guard_limit">護衛制限</a>の影響を受けない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#hunter_guard">猟師</a>とは対照的に護衛に特化した特殊狩人で「よすずめ」と読みます。
死体の状況を見ることで<a href="chiroptera.php#dark_fairy">闇妖精</a>と区別することができるので、
襲撃役の人狼はうっかり<a href="sub_role.php#blinder">目隠し</a> CO しないように気をつけましょう。
</pre>

<h3 id="gatekeeper_guard">門番 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α7～]</h3>
<h4>[狩人能力] 護衛：通常 + 対暗殺 / 護衛制限：有り / 狩り：無し / 罠：有効</h4>
<pre>
<a href="#guard_hunt">狩り能力</a>は持たないが、護衛先の<a href="ability.php#assassin">暗殺</a>も防ぐことができる特殊な狩人。
</pre>
<ol>
<li>対<a href="wolf.php#wolf_group">人狼</a>・対<a href="vampire.php">吸血鬼</a>の護衛能力は<a href="#guard">狩人</a>と同じ。</li>
<li>対暗殺能力の護衛は<a href="#guard_limit">護衛制限</a>の影響を受けない。</li>
<li>何かしらの襲撃を防ぐことが出来た場合は「護衛成功」メッセージが表示される。</li>
</ol>
<h4>[作成者からのコメント]</h4>
<pre>
暗殺能力に対する護衛力を持った特殊狩人で、対<a href="ogre.php#ogre_do">人攫い</a>が主眼です。
</pre>

<h3 id="reflect_guard">侍 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β22～]</h3>
<h4>[耐性] 暗殺：反射</h4>
<h4>[狩人能力] 護衛：通常 / 護衛制限：有り / 狩り：有り + 鬼陣営 / 罠：有効</h4>
<pre>
<a href="#assassin_spec">暗殺反射</a>能力を持つ上位狩人。
通常の<a href="#guard_hunt">狩り能力</a>に加えて、<a href="ogre.php">鬼陣営</a>も狩る事ができる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#bacchus_medium">神主</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="ogre.php">鬼陣営</a>キラーの上位狩人で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/838" target="_top">新役職考案スレ(838)</a>・<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/875" target="_top">(875)</a> が原型です。
</pre>

<h3 id="poison_guard">騎士 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α3-7～]</h3>
<h4>[狩人能力] 護衛：通常 / 護衛制限：無し / 狩り：有り / 罠：有効</h4>
<h4>[毒能力] 処刑：無し / 襲撃：有り / 薬師判定：限定的</h4>
<pre>
<a href="wolf.php#wolf_group">人狼</a>に襲撃された時のみ毒が発動する上位狩人。
<a href="#guard_limit">護衛制限</a>の影響を受けない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#soul_wizard">八卦見</a>・<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルです。
技術的に簡単だったので軽い気持ちで作ってみましたがとんでもなく強いようです。
<a href="wolf.php#resist_wolf">抗毒狼</a>や<a href="wolf.php#trap_mad">罠師</a>に注意しましょう。
</pre>

<h3 id="fend_guard">忍者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β5～]</h3>
<h4>[耐性] 人狼襲撃：無効 (1回限定)</h4>
<h4>[狩人能力] 護衛：通常 / 護衛制限：有り / 狩り：有り / 罠：有効</h4>
<pre>
一度だけ<a href="wolf.php#wolf_group">人狼</a> (種類を問わない) の襲撃に耐えることができる上位狩人。
人狼に襲撃されると耐性を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。
誰に襲撃されたのかは分からないが、耐性を失っても護衛は通常通り行える。
身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は耐性無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#resist_wolf">人狼襲撃耐性能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方陰陽鉄のプレイヤーさんの誕生日記念に作ってみました。
人狼視点では妖狐と区別がつかないので、ある意味で<a href="#poison_guard">騎士</a>以上に
やっかいな存在になるでしょう。
</pre>

<h3 id="reporter">ブン屋 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α14～]</h3>
<h4>[耐性] 護衛制限：有り / 遺言：不可</h4>
<h4>[狩人能力] 護衛：尾行 / 狩り：無し / 罠：有効</h4>
<pre>
夜に投票(尾行)した人が人狼に襲撃された場合に、誰が襲撃したか分かる特殊な狩人。
</pre>
<ol>
  <li><a href="wolf.php#wolf_group">人狼系</a>・<a href="fox.php">妖狐</a>を尾行したら死亡する (死亡メッセージは「無惨な～」、死因は「人外尾行」)。</li>
  <li>尾行対象者が狩人に護衛されていた場合は何も出ない。</li>
  <li>人狼が人外(<a href="fox.php#fox">妖狐</a>・<a href="wolf.php#silver_wolf">銀狼</a>など)を襲撃して失敗した場合は尾行成功扱いとなる (死亡しない)。<br>
    (尾行成功メッセージ＆対象が死んでいない＝人狼が噛めない人外を噛んだ)</li>
</ol>
</pre>
<h4>関連役職</h4>
<pre>
<a href="#presage_scanner">件</a>・<a href="#clairvoyance_scanner">猩々</a>・<a href="#escaper">逃亡者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/5" target="_top">新役職考案スレ(5)</a> が原型です。
活躍するのは非常に難しいですが、成功したときには大きなリターンがあります。
妖狐襲撃の現場をスクープするブン屋を是非見てみたいものです。
</pre>

<h3 id="anti_voodoo">厄神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α20～]</h3>
<h4>[耐性] 憑依：特殊</h4>
<h4>[狩人能力] 護衛：厄払い / 狩り：無し / 罠：無効</h4>
<pre>
護衛した人の厄 (占い妨害・呪返し・憑依) を祓う特殊な狩人。
成功した場合は次の日に専用のシステムメッセージが表示される。
護衛先の役職に関係なく発動するので、例えば占い妨害を受けた村人を
護衛した場合でも成功と判定される。
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
憑依中の<a href="wolf.php#possessed_mad">犬神</a>・<a href="fox.php#possessed_fox">憑狐</a>を直接護衛すると憑依状態を解く事ができる。
</pre>
<h5>Ver. 1.4.0 α24～</h5>
<pre>
憑依中の<a href="wolf.php#possessed_wolf">憑狼</a>に対しては圧倒的なアドバンテージを持っており、
直接護衛するか、襲撃されると憑依状態を解くことができる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
対占い妨害・呪い専門の特殊狩人で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/43" target="_top">新役職考案スレ(43)</a> が原型です。
「やくじん」と読みます。
厄神の護衛を受けることで<a href="wolf.php#cursed_wolf">呪狼</a>に狼判定を出したり、
<a href="fox.php#cursed_fox">天狐</a>を呪殺することが可能になります。
通常の狩人が狂人・妖狐でも護衛成功してしまうのと同様に
狂人や妖狐にも占い妨害や呪返しを受ける役職がいるので、
「厄払い成功＝対象者は村陣営」とは限らない点に注意してください。
</pre>

<h3 id="elder_guard">老兵 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β8～]</h3>
<h4>[狩人能力] 護衛：通常 (70%) / 護衛制限：有り / 狩り：無し / 罠：有効</h4>
<pre>
処刑投票数が +1 される特殊な狩人。処刑投票能力の詳細は<a href="#elder">長老</a>参照。
<a href="#guard_hunt">狩り能力</a>を持たず、護衛成功率は 70%。
護衛に失敗した場合は襲撃先を選択していた場合でも何も表示されない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#elder">長老</a>の狩人バージョンで、いわゆる古系人外の騙り先要員です。
護衛能力は一箇所護衛で成功率が下がった<a href="#barrier_wizard">結界師</a>相当になります。
</pre>

<h3 id="dummy_guard">夢守人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[役職表示] <a href="#guard">狩人</a></h4>
<h4>[耐性] 獏襲撃：狩り / 精神鑑定：嘘つき</h4>
<h4>[狩人能力] 護衛：対獏 / 狩り：獏 + 妖精系 / 罠：無効</h4>
<pre>
本人には「<a href="#guard">狩人</a>」と表示されており、護衛行動を取ることができる。
必ず護衛成功メッセージが表示されるが、表示されるだけで誰も護衛していない。
<a href="wolf.php#dream_eater_mad">獏</a>には圧倒的なアドバンテージを持っており、何らかの形で遭遇すると
一方的に狩ることができる。
<a href="chiroptera.php#fairy_group">妖精系</a>を護衛すると狩ることができる。
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
<a href="chiroptera.php#fairy_group">妖精系</a>を護衛すると狩ることができる
</pre>
<h5>Ver. 1.4.0 α21～</h5>
<pre>
<a href="wolf.php#dream_eater_mad">獏</a>には圧倒的なアドバンテージを持っており、何らかの形で遭遇すると
一方的に狩ることができる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dummy_mage">夢見人</a>の狩人バージョンです。
常に護衛成功メッセージが出るので一度でも失敗したら夢守人で無い事を確認できます。
みなさん一度くらいは全て護衛成功して勝利してみたいと思った事、ありませんか？
</pre>


<h2 id="common_group">共有者系</h2>
<p>
<a href="#common">共有者</a>
<a href="#leader_common">指導者</a>
<a href="#detective_common">探偵</a>
<a href="#trap_common">策士</a>
<a href="#sacrifice_common">首領</a>
<a href="#ghost_common">亡霊嬢</a>
<a href="#spell_common">葛の葉</a>
<a href="#critical_common">暴君</a>
<a href="#hermit_common">隠者</a>
<a href="#dummy_common">夢共有者</a>
</p>

<h3 id="common">共有者 (占い結果：村人 / 霊能結果：村人)</h3>
<pre>
共有者系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#dummy_common">夢共有者</a>
</pre>

<h3 id="leader_common">指導者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β9～]</h3>
<pre>
<a href="sub_role.php#mind_open">公開者</a>相当の能力を持った上位共有者。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#howl_scanner">吠騒霊</a>・<a href="#telepath_scanner">念騒霊</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
ミストさんテスト鯖＠東方陰陽鉄人狼のオリジナル役職です。
<a href="wolf.php#talk">人狼</a>からは<a href="#howl_scanner">吠騒霊</a>と、<a href="fox.php#talk">妖狐</a>からは<a href="#telepath_scanner">念騒霊</a>と区別がつかないので
立ち回り次第で騙すことができます。
</pre>

<h3 id="detective_common">探偵 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β10～]</h3>
<h4>[耐性] 護衛制限：有り / 毒：対象外 / 暗殺：反射 / 蘇生：不可 / 憑依：無効</h4>
<pre>
様々な特殊耐性を持つ上位共有者。
</pre>
<ol>
<li>毒・<a href="#brownie">座敷童子</a>・<a href="#cursed_brownie">祟神</a>・<a href="#doom_doll">蓬莱人形</a>・<a href="wolf.php#follow_mad">舟幽霊</a>・<a href="fox.php#miasma_fox">蟲狐</a>の能力の対象外</li>
<li><a href="#assassin_spec">暗殺反射</a></li>
<li><a href="wolf.php#miasma_mad">土蜘蛛</a>・<a href="wolf.php#critical_mad">釣瓶落とし</a>・<a href="duelist.php#critical_avenger">狂骨</a>の能力無効</li>
<li><a href="vampire.php#vampire_do">吸血死</a>無効</li>
<li><a href="#revive_rule">蘇生</a>不可</li>
<li><a href="wolf.php#possessed_wolf">憑狼</a>・<a href="wolf.php#possessed_mad">犬神</a>・<a href="fox.php#possessed_fox">憑狐</a>の憑依対象外</li>
</ol>
<h5>Ver. 1.4.0 β12～</h5>
<pre>
<a href="wolf.php#possessed_mad">犬神</a>・<a href="fox.php#possessed_fox">憑狐</a>の憑依対象外 (<a href="wolf.php#possessed_wolf">憑狼</a>と揃えました)。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
闇鍋モードでも<a href="../game_option.php#detective">探偵村</a>を実施できるようにチューニングした上位共有者です。
</pre>

<h3 id="trap_common">策士 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<pre>
処刑投票時に、その時点で生存している村人陣営以外の人全てから投票されたら
まとめて死亡させる上位共有者。
</pre>
<ol>
<li><a href="#medium">巫女</a>の判定と違い、恋人も「村人陣営以外」と判定される。</li>
<li>一人でも村人陣営の人から投票されると無効。</li>
<li>発動した場合に巻き込んだ人の死因は「罠」。</li>
<li>自分が処刑されたり、再投票になっても有効。</li>
<li>自分が<a href="sub_role.php#lovers">恋人</a>になった場合は自分自身が「非村人陣営」になるので発動できない。</li>
</ol>
<h4>[作成者からのコメント]</h4>
<pre>
圧倒的不利な状況をたった一回の処刑投票でひっくり返す、究極の対 PP 兵器です。
<a href="#jealousy">橋姫</a>同様、役職の存在による抑止力の発生が主眼です。
「自分は村人だから投票しない」と主張されたらそれまでなので、
能力を前面に出して自分に投票させる作戦は通用しないでしょう。
</pre>

<h3 id="sacrifice_common">首領 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β2～]</h3>
<h4>[耐性] 人狼襲撃：身代わり / 護衛制限：有り</h4>
<h4>[身代わり能力] 村人・蝙蝠</h4>
<pre>
<a href="wolf.php#wolf_group">人狼</a>に襲撃された時に、役職「<a href="#human">村人</a>・<a href="chiroptera.php#chiroptera">蝙蝠</a>」を身代わりにして生き延びる事ができる上位共有者。
</pre>
<ol>
<li>身代わりが発生した場合、<a href="wolf.php#wolf_group">人狼</a>の襲撃は失敗扱い。</li>
<li>身代わりで死亡した人の死因は「誰かの犠牲となって死亡したようです」。</li>
<li>本人は身代わりが発生しても分からない。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
世紀末鯖＠やる夫人狼のオリジナル役職「聖帝」を元にアレンジしました。
「<a href="mania.php#mania_group">神話マニア</a>をコピーして村人になった」騙りと<a href="chiroptera.php#chiroptera_group">蝙蝠系</a>の種類騙りなどに
対するトラップが主眼です。
</pre>

<h3 id="ghost_common">亡霊嬢 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 小心者</h4>
<pre>
自分を襲撃した<a href="wolf.php#wolf_group">人狼</a>に<a href="sub_role.php#chicken">小心者</a>を付加する上位共有者。
<a href="wolf.php#possessed_wolf_sub_role">憑狼</a>は本体に付加される。
身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は能力無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルです。
即死こそしませんが、<a href="wolf.php#resist_wolf">抗毒狼</a>でも無効化できないので非常に強力です。
<a href="#trap_common">策士</a>同様、人狼陣営にとっては役職の存在自体が脅威になるでしょう。
</pre>

<h3 id="spell_common">葛の葉 (占い結果：村人(呪殺) / 霊能結果：村人) [Ver. 1.5.0 β14～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
<a href="#mage_group">占い師</a>に占われると呪殺される特殊な共有者。
処刑投票先が<a href="wolf.php#wolf_group">人狼系</a>・<a href="fox.php">妖狐</a>・<a href="sub_role.php#lovers">恋人</a>なら<a href="sub_role.php#cute_camouflage">魔が言</a>を付加する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#vote_action">処刑投票能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
妖術を使える狐だけど人間に与した者、という伝承がモチーフです。
占い師が夢確認で共有者を占うアプローチに対するリスクとなります。
</pre>

<h3 id="critical_common">暴君 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β10～]</h3>
<pre>
処刑投票数が +1 されるが、<a href="sub_role.php#critical_luck">痛恨</a>相当 (<a href="../weather.php#weather_critical">烈日</a>は無効) の能力も持つ特殊な共有者。
処刑投票能力の詳細は<a href="#elder">長老</a>参照。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>・<a href="ability.php#luck">得票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1305122951/81" target="_top">新役職考案スレ2(81)</a> が原型です。
</pre>

<h3 id="hermit_common">隠者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β10～]</h3>
<pre>
夜の発言が「囁き声」にならない劣化共有者。
仲間情報は通常の<a href="#common">共有者</a>と同じ。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する共有者の仕様に相当します。
隠者のみの場合は複数いても他の人からは存在が見えません。
</pre>

<h3 id="dummy_common">夢共有者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[役職表示] <a href="#common">共有者</a></h4>
<h4>[耐性] 獏襲撃：死亡 / 精神鑑定：嘘つき</h4>
<pre>
本人には「『相方が身代わり君』の<a href="#common">共有者</a>」と表示されている村人。
が、夜に発言しても「囁き声」にはならないし、本物の共有者の声も聞こえない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dummy_mage">夢見人</a>の共有者バージョンです。
「囁き声」が発生しないので真共有者にはなれません。
証明手段が無いので容易に騙れますね。きっと真でも吊られることでしょう。
</pre>


<h2 id="poison_group">埋毒者系</h2>
<p>
<a href="#poison">埋毒者</a>
<a href="#strong_poison">強毒者</a>
<a href="#incubate_poison">潜毒者</a>
<a href="#guide_poison">誘毒者</a>
<a href="#snipe_poison">狙毒者</a>
<a href="#chain_poison">連毒者</a>
<a href="#dummy_poison">夢毒者</a>
</p>

<h3 id="poison">埋毒者 (占い結果：村人 / 霊能結果：村人)</h3>
<h4>[毒能力] 処刑：有り / 襲撃：有り / 薬師判定：有り</h4>
<pre>
埋毒者系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#strong_poison">強毒者</a>・<a href="#dummy_poison">夢毒者</a>・<a href="#poison_jealousy">毒橋姫</a>
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#poison">毒能力者</a>
</pre>

<h3 id="strong_poison">強毒者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[役職表示] <a href="#poison">埋毒者</a></h4>
<h4>[毒能力] 処刑：人狼系 + 妖狐陣営 / 襲撃：有り / 薬師判定：強い毒</h4>
<pre>
処刑された時の毒の対象が人外 (<a href="wolf.php#wolf_group">人狼系</a>と<a href="fox.php">妖狐陣営</a>) 限定の上位埋毒者。本人表記は「<a href="#poison">埋毒者</a>」。
毒の巻き込み対象設定 (<a href="../script_info.php#difference_poison_vote" target="_top">特徴と仕様</a>参照) が「投票者ランダム」だった場合、
対象者が投票していなければ毒は不発になる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#incubate_poison">潜毒者</a>・<a href="chiroptera.php#poison_chiroptera">毒蝙蝠</a>・<a href="ogre.php#poison_ogre">榊鬼</a>・<a href="duelist.php#poison_avenger">山わろ</a>・<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルです。
状況にもよりますが、<a href="#soul_mage">魂の占い師</a>に鑑定してもらったら即吊ってもらうと強いですね。
投票者ランダムの設定であれば、その時の投票結果は重要な推理材料にもなります。
</pre>

<h3 id="incubate_poison">潜毒者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[毒能力] 処刑：無し → 人狼系 + 妖狐陣営 / 襲撃：無し → 有り / 薬師判定：無し → 強い毒</h4>
<pre>
一定期間後 (5 日目以降) に<a href="#strong_poison">強毒者</a>相当の毒を持つ特殊な埋毒者。
毒を持ったら本人に追加のシステムメッセージが表示される。
</pre>
<h5>Ver. 1.4.0 α20～</h5>
<pre>
毒能力を埋毒者相当から強毒者相当に変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#scripter">執筆者</a>・<a href="wolf.php#trap_wolf">狡狼</a>・<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルです。
いかに毒を持つまで時間を稼ぐかがポイントです
</pre>

<h3 id="guide_poison">誘毒者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β11～]</h3>
<h4>[毒能力] 処刑：毒能力者 / 襲撃：毒能力者 / 薬師判定：限定的</h4>
<pre>
<a href="ability.php#poison">毒能力者</a>のみに中る特殊な埋毒者。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#pharmacist_group">薬師系</a>と違うアプローチで毒能力を持った人外を仕留めることができますが
毒と名のつく役職全てが対象なので<a href="#poison_guard">騎士</a>・<a href="#chain_poison">連毒者</a>に中ると大惨事になります。
</pre>

<h3 id="snipe_poison">狙毒者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β9～]</h3>
<h4>[毒能力] 処刑：特殊 / 襲撃：有り / 薬師判定：有り</h4>
<pre>
処刑された場合、処刑投票先と同陣営の人のみに中る特殊な埋毒者。
<a href="sub_role.php#lovers">恋人</a>は恋人陣営と判定する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#embalm_necromancer">死化粧師</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
指向性を持った埋毒者で、確定人外を見つけたらそこに投票して処刑されることで
芋蔓式に人外を仕留めることが可能になります。
安直な吊り稼ぎを狙った<a href="ability.php#talk_convert_cute">萌系</a>騙りに対する牽制が狙いです。
</pre>

<h3 id="chain_poison">連毒者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<h4>[毒能力] 処刑：特殊 / 襲撃：無し / 薬師判定：限定的</h4>
<pre>
他の毒能力者に巻き込まれたら、さらに二人巻き込む特殊な埋毒者。本人表記は「<a href="#human">村人</a>」。
解毒能力者 (例：<a href="#pharmacist">薬師</a>・<a href="#cure_pharmacist">河童</a>) に投票されていたら解毒される (連鎖が発生しない)。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
裏世界鯖＠東方陰陽鉄人狼のとある村がモデルです。
発動率は低いですが、ひとたび発動すると大惨事を引き起こします。
連毒者を巻き添えにするとさらに連鎖するので一回の処刑で全滅する可能性もあります。
</pre>

<h3 id="dummy_poison">夢毒者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α17～]</h3>
<h4>[役職表示] <a href="#poison">埋毒者</a></h4>
<h4>[耐性] 獏襲撃：死亡 / 精神鑑定：嘘つき</h4>
<h4>[毒能力] 処刑：特殊 / 襲撃：無し / 薬師判定：無し</h4>
<pre>
本人には「<a href="#poison">埋毒者</a>」と表示されている村人。
処刑された場合は<a href="wolf.php#dream_eater_mad">獏</a>・<a href="chiroptera.php#fairy_group">妖精系</a>のみ巻き込む (「解毒」はできない)。
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
処刑された場合は<a href="wolf.php#dream_eater_mad">獏</a>・<a href="chiroptera.php#fairy_group">妖精系</a>のみ巻き込む (「解毒」はできない)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#dummy_mage">夢見人</a>の埋毒者バージョンです。
毒は持っていませんが、身代わり君がこれになることはありません。
偽者ではありますがどちらかと言うと人狼が不利になる役職ですね。
夢毒者である事に賭けて真埋毒者を噛みに行く狼が出るかもしれません。

Ver. 1.4.0 β9 からは吊られた時のみ<a href="wolf.php#dream_eater_mad">獏</a>・<a href="chiroptera.php#fairy_group">妖精系</a>に中る仕様に変更しました。
夢の世界の攻防なので<a href="#pharmacist_group">薬師系</a>による解毒はできません。
</pre>


<h2 id="poison_cat_group">猫又系</h2>
<p><a href="#revive_rule">基本ルール</a></p>
<p>
<a href="#poison_cat">猫又</a>
<a href="#revive_cat">仙狸</a>
<a href="#sacrifice_cat">猫神</a>
<a href="#missfire_cat">常世神</a>
<a href="#eclipse_cat">蝕仙狸</a>
</p>

<h3 id="revive_rule">基本ルール [蘇生]</h3>
<ol>
<li><a href="../game_option.php#not_open_cast">霊界で配役を公開しない</a>オプションが有効になっていないと蘇生行動はできない。</li>
<li>投票可能になるのは 2 日目の夜からで、「蘇生する / しない」を必ず投票する必要がある。</li>
<li>投票できるのは、身代わり君以外の死者で、「蘇生しない」を選ぶこともできる。</li>
<li>蘇生成功率のうち、1/5 は指定した人以外が対象になる「誤爆蘇生」となる。<br>
  例) 25% : 成功 : 20% / 誤爆 :  5%</li>
<li>身代わり君・<a href="ability.php#revive">蘇生能力者</a>・<a href="sub_role.php#lovers">恋人</a>・<a href="#detective_common">探偵</a>は蘇生できない。</li>
<li>蘇生対象外の人が選ばれた場合は確実に失敗する。</li>
<li>蘇生に失敗した場合は霊界と<a href="#attempt_necromancer">蟲姫</a>にだけ見えるシステムメッセージが表示される。</li>
</ol>
<h5>Ver. 1.4.0 β2～</h5>
<pre>
<a href="sub_role.php#lovers">恋人</a>を蘇生対象外に変更 (蘇生後、即後追いから変更)。
</pre>
<h5>Ver. 1.4.0 α19～</h5>
<pre>
<a href="#poison_cat">猫又</a>を蘇生対象外に変更。
</pre>

<h3 id="poison_cat">猫又 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α18～]</h3>
<h4>[耐性] 蘇生：不可</h4>
<h4>[蘇生能力] 成功率：25% / 誤爆：有り</h4>
<h4>[毒能力] 処刑：有り / 襲撃：有り / 薬師判定：有り</h4>
<pre>
猫又系の<a href="mania.php#basic_mania">基本種</a>。<a href="#revive_rule">蘇生能力</a>を持った<a href="#poison">埋毒者</a>相当で、蘇生成功率は 25%。
</pre>
<h5>Ver. 1.4.0 α19～</h5>
<pre>
猫又が蘇生する事はありません。
猫又が蘇生対象者に選ばれた場合は失敗扱いになります。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#revive_medium">風祝</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他の国に実在する役職です。
「霊界で配役を公開しない」オプションを有効にしておかないと
ただの埋毒者になる点に注意してください。
</pre>

<h3 id="revive_cat">仙狸 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β2～]</h3>
<h4>[耐性] 蘇生：不可</h4>
<h4>[蘇生能力] 成功率：80% (初期値) / 誤爆：有り</h4>
<pre>
毒能力を失った代わりに高い<a href="#revive_rule">蘇生能力</a>を持った猫又の上位種。
蘇生成功率は 80% で、成功するたびに成功率が 1/4 になる。
80% → 20% → 5% → 2% → 1% (以後は 1% で固定)
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#eclipse_cat">蝕仙狸</a>
</pre>
<h4>関連役職</h4>
<pre>
<a href="fox.php#revive_fox">仙狐</a>・<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
仙狸 (センリ) とは、中国の猫の妖怪です (「狸」は山猫の意)。
東方陰陽鉄人狼のプレイヤーさんのコメントを参考に同じ猫の妖怪である
<a href="#poison_cat">猫又</a>の上位種として実装してみました。
</pre>

<h3 id="sacrifice_cat">猫神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[耐性] 蘇生：不可</h4>
<h4>[蘇生能力] 成功率：100% (1回限定) / 誤爆：無し</h4>
<pre>
毒能力を失った代わりに確実な<a href="#revive_rule">蘇生能力</a>に特化した猫又の亜種。
蘇生成功率は 100% で、例外的に誤爆率が 0% に設定されているが、成功すると自分が死亡する。
複数の猫神が同時に同じ人を蘇生しようとした場合は「全員成功」扱いとなり、本人は死亡する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#possessed_mad">犬神</a>・<a href="fox.php#possessed_fox">憑狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#possessed_mad">犬神</a>が能力を発動した時に蘇生能力者が誰もいないと
正体がばれてしまうので、同じ状況に見える村陣営種を用意しました。
</pre>

<h3 id="missfire_cat">常世神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β11～]</h3>
<h4>[耐性] 蘇生：不可</h4>
<h4>[蘇生能力] 成功率：30% / 誤爆：有り (特殊)</h4>
<pre>
<a href="#revive_rule">誤爆蘇生</a>しかしない猫又の亜種。
蘇生成功率は 30%、誤爆率も 30% で固定。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#eclipse_cat">蝕仙狸</a>と違い、自覚があるので動き方が異なってくると思われます。
<a href="../weather.php">天候</a>や<a href="#revive_brownie">蛇神</a>が絡んでくると通常蘇生も狙えます。
</pre>

<h3 id="eclipse_cat">蝕仙狸 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β17～]</h3>
<h4>[役職表示] <a href="#revive_cat">仙狸</a></h4>
<h4>[耐性] 蘇生：不可</h4>
<h4>[蘇生能力] 成功率：40% / 誤爆：有り (特殊)</h4>
<pre>
<a href="#revive_rule">誤爆率</a>が高く設定されている猫又の亜種。本人表記は「<a href="#revive_cat">仙狸</a>」。
蘇生成功率は 40%、誤爆率は 20% で固定。
</pre>
<h5>Ver. 1.4.0 β18～</h5>
<pre>
誤爆率変更：15% → 20%
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#poison_cat">猫又</a>の劣化種として、夢系ではなく蝕系を採用してみました。
<a href="#revive_rule">ルール</a>通りなら 40% の 1/5 は 8% なので、誤爆率が 2.5倍になっています。
実質、誤爆率だけが上がった<a href="#poison_cat">猫又</a>相当になります。
</pre>


<h2 id="pharmacist_group">薬師系</h2>
<p>
<a href="#pharmacist">薬師</a>
<a href="#cure_pharmacist">河童</a>
<a href="#revive_pharmacist">仙人</a>
<a href="#alchemy_pharmacist">錬金術師</a>
<a href="#centaurus_pharmacist">人馬</a>
</p>

<h3 id="pharmacist">薬師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α12～]</h3>
<h4>[薬師能力] 毒能力判定：有り / 解毒：有り / ショック死抑制：無し</h4>
<pre>
処刑投票先が処刑されたら毒能力を無効化 (解毒) する、薬師系の<a href="mania.php#basic_mania">基本種</a>。
また、処刑投票先の毒能力が分かる (処刑されたら無効)。
</pre>
<h4>毒能力判定法則</h4>
<ol>
<li>解毒成功 (この場合は詳細な毒能力は分からない)</li>
<li>強い毒 (<a href="#strong_poison">強毒者</a>・発現後の<a href="#incubate_poison">潜毒者</a>)</li>
<li>限定的な毒 (<a href="#poison_guard">騎士</a>・<a href="#guide_poison">誘毒者</a>・<a href="#chain_poison">連毒者</a>・<a href="#poison_jealousy">毒橋姫</a>)</li>
<li>毒を持っていない (<a href="#dummy_poison">夢毒者</a>・発現前の<a href="#incubate_poison">潜毒者</a>)</li>
<li>毒を持っている</li>
</ol>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
処刑されたら毒能力判定・解毒能力無効。
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
<a href="#dummy_poison">夢毒者</a>が処刑されたら<a href="wolf.php#dream_eater_mad">獏</a>・<a href="chiroptera.php#fairy_group">妖精系</a>に中る仕様に変更。
これを「解毒」する事はできない。
</pre>
<h5>Ver. 1.4.0 α23～</h5>
<pre>
解毒成功だけでなく、処刑投票先の詳細な毒能力が分かる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/24" target="_top">新役職考案スレ(24)</a> が原型で、「くすし」と読みます。
<a href="wolf.php#poison_wolf">毒狼</a>の対抗役職で、<a href="#poison_group">埋毒者系</a>に対しても効果を発揮します。
</pre>

<h3 id="cure_pharmacist">河童 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[薬師能力] 毒能力判定：無し / 解毒：有り / ショック死抑制：有り</h4>
<pre>
処刑投票先の人を解毒・ショック死抑制する特殊な薬師。
</pre>
<ol>
<li>解毒能力は<a href="#pharmacist">薬師</a>と同じ。</li>
<li>抑制できるのは<a href="sub_role.php">サブ役職</a> (例：<a href="sub_role.php#chicken_group">小心者系</a>) のみで、<a href="ability.php#sudden_death">メイン役職</a>によるものは対象外。</li>
<li>解毒・ショック死抑制に成功すると次の日に「治療成功」という趣旨のメッセージが表示される。</li>
<li>何の「治療」に成功したのか (毒やショック死の種類など) は表示されない。</li>
<li>再投票時には発動せず、処刑されたら解毒・ショック死抑制能力無効。</li>
</ol>
<pre>
例) A[河童] → B[村人][小心者]
この場合、B がショック死する条件を満たすが、河童の能力でキャンセルされる。
キャンセルするだけで<a href="sub_role.php#chicken">小心者</a>が消える訳ではないので注意。
</pre>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
処刑されたら解毒・ショック死抑制能力無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#philosophy_wizard">賢者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/17" target="_top">新役職考案スレ(17)</a> が原型です。
河童の膏薬伝説をヒントに、高い治療能力をもった特殊薬師としてデザインしました。
<a href="sub_role.php#febris">熱病</a>の性質上、<a href="wolf.php#miasma_mad">土蜘蛛</a>に対して完全なカウンターになっています。
</pre>

<h3 id="revive_pharmacist">仙人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β15～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 蘇生 (1回限定) / 蘇生：不可 / 憑依：無効</h4>
<h4>[薬師能力] 毒能力判定：無し / 解毒：無し / ショック死抑制：有り</h4>
<pre>
昼に処刑投票した人のショック死を抑制する特殊な薬師。
ショック死抑制能力は<a href="#cure_pharmacist">河童</a>と同じで、処刑されたら無効。
人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する (自己蘇生)。
</pre>
<h4>自己蘇生能力の仕様</h4>
<ol>
<li>一度蘇生すると能力を失う (<a href="sub_role.php#lost_ability">能力喪失</a>)。</li>
<li>恋人になったら無効。</li>
<li>人狼の襲撃以外で死亡した場合 (例：暗殺) は無効。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は無効。</li>
</ol>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
処刑されたらショック死抑制能力無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#reverse_assassin">反魂師</a>・<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の藤原妹紅がモチーフです。
自己蘇生能力が発動すると「死亡と蘇生が同時に表示される」ことになります。
</pre>

<h3 id="alchemy_pharmacist">錬金術師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β22～]</h3>
<h4>[薬師能力] 毒能力判定：有り / 解毒：特殊 / ショック死抑制：無し</h4>
<pre>
処刑投票先が毒を持っていたら中る範囲を「村人陣営以外」に変更してしまう特殊な薬師。
毒能力判定や対象者変更判定 (<a href="#pharmacist">薬師</a>が「解毒した」と判定する対象) は<a href="#pharmacist">薬師</a>と同じ。
</pre>
<ol>
<li>判定は処刑者決定後で、自分が処刑されたら無効。</li>
<li>対象者変更能力が発動しても毒能力判定結果は変わらない (処刑した場合でも毒の種類が分かる)。</li>
<li><a href="sub_role.php#lovers">恋人</a>は判定対象外 (<a href="#medium_group">巫女系</a>と同じ)。</li>
<li><a href="#pharmacist">薬師</a>・<a href="#cure_pharmacist">河童</a>が解毒していた場合、毒は不発。</li>
<li><a href="#chain_poison">連毒者</a>に投票しても能力は発動しない (毒能力判定は有効)。</li>
</ol>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
処刑されたら毒能力判定・特殊解毒能力無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#philosophy_wizard">賢者</a>・<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/895" target="_top">新役職考案スレ(895)</a> が原型です。
<a href="wolf.php#poison_wolf">毒狼</a>などを比較的少ないリスクで処刑できますが、<a href="wolf.php#mad_group">狂人系</a>や<a href="chiroptera.php">蝙蝠陣営</a>も対象に入るので、
<a href="#pharmacist">薬師</a>で解毒してしまう方がいいケースもあります。
</pre>

<h3 id="centaurus_pharmacist">人馬 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β2～]</h3>
<h4>[薬師能力] 毒能力判定：特殊 / 解毒：無し / ショック死抑制：無し</h4>
<pre>
処刑投票先が毒を持っていたら毒死してしまう特殊な薬師。
</pre>
<ol>
<li>毒死する条件は、<a href="#pharmacist">薬師</a>の毒能力判定が「毒を持っていない」以外になる場合。</li>
<li><a href="#pharmacist">薬師</a>・<a href="#cure_pharmacist">河童</a>が解毒していた場合でも毒死する。</li>
<li><a href="../spec.php#vote_day">判定</a>は処刑対象が決定された後で、投票先が処刑されても有効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#escaper">逃亡者</a>の薬師バージョンで、ケンタウロスがモチーフです。
<a href="sub_role.php#lovers">恋人</a>や<a href="sub_role.php#rival">宿敵</a>がつくと能力が枷になってしまうので要注意です。
</pre>


<h2 id="assassin_group">暗殺者系</h2>
<p>
<a href="#assassin_rule">基本ルール</a>
<a href="#assassin_spec">暗殺の仕様</a>
</p>
<p>
<a href="#assassin">暗殺者</a>
<a href="#doom_assassin">死神</a>
<a href="#select_assassin">おしら様</a>
<a href="#reverse_assassin">反魂師</a>
<a href="#soul_assassin">辻斬り</a>
<a href="#eclipse_assassin">蝕暗殺者</a>
</p>

<h3 id="assassin_rule">基本ルール [暗殺者系]</h3>
<ol>
<li>「暗殺する / しない」を必ず投票する必要がある。</li>
<li>狩人の<a href="#guard_limit">護衛制限</a>対象。</li>
</ol>

<h3 id="assassin_spec">暗殺の仕様</h3>
<ol>
<li>全ての生存者を暗殺対象に選択可能 (人狼・妖狐でも可)。</li>
<li>暗殺された人の死亡メッセージは人狼の襲撃と同じで、<a href="../spec.php#dead">死因</a>は「暗殺された」。</li>
<li>暗殺能力者がお互いを襲撃した場合は相打ちになる。</li>
<li>暗殺された<a href="#mage">占い師</a>の呪殺・<a href="#poison_cat_group">猫又</a>の蘇生は無効、<a href="#guard_group">狩人系</a>の護衛判定は有効。</li>
<li>人狼の襲撃・<a href="wolf.php#trap_mad">罠師</a>の罠で死亡したら暗殺は無効。</li>
<li><a href="#escaper_group">逃亡者系</a>を対象にした場合は無効。</li>
<li>対象が<a href="#gatekeeper_guard">門番</a>に護衛されていたら無効。</li>
<li>特定の条件で「暗殺反射」(自分で自分を暗殺すること) が発生し、<br>
  その場合は特殊暗殺能力者であっても即座に暗殺される。<br>
  (例：<a href="#doom_assassin">死神</a>が反射されても暗殺で即死する)</li>
<li><a href="#reflect_guard">侍</a>・<a href="#detective_common">探偵</a>・<a href="wolf.php#sirius_wolf">天狼</a> (覚醒状態)・<a href="fox.php#cursed_fox">天狐</a>・<a href="vampire.php#soul_vampire">吸血姫</a>・<a href="sub_role.php#challenge_lovers">難題</a>を対象にした場合は反射される。</li>
<li><a href="#cursed_brownie">祟神</a>・<a href="ogre.php">鬼陣営</a>を対象にした場合は一定確率で反射される。</li>
</ol>
<h5>Ver. 1.5.0 α7～</h5>
<pre>
<a href="#gatekeeper_guard">門番</a>の実装
</pre>
<h5>Ver. 1.4.0 β9～</h5>
<pre>
暗殺反射システムの実装
</pre>

<h3 id="assassin">暗殺者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α18～]</h3>
<h4>[耐性] 罠：有効 / 護衛制限：有り</h4>
<pre>
暗殺者系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>同一表示役職</h4>
<pre>
<a href="#eclipse_assassin">蝕暗殺者</a>
</pre>
<h4>関連役職</h4>
<pre>
<a href="#wizard">魔法使い</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/8" target="_top">新役職考案スレ(8)</a> が原型です。
村人陣営の最終兵器とも呼べる存在ですね。
</pre>

<h3 id="doom_assassin">死神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β10～]</h3>
<h4>[耐性] 罠：有効 / 護衛制限：有り</h4>
<pre>
暗殺成立時に<a href="sub_role.php#death_warrant">死の宣告</a>を付加する特殊な暗殺者。
死の宣告の発動日は投票した夜から数えて 2 日後の昼。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#doom">死の宣告能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「寿命を延ばすこともできる暗殺者」がコンセプトで、
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/85" target="_top">新役職考案スレ(85)</a> が原型です。
</pre>

<h3 id="select_assassin">おしら様 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β11～]</h3>
<h4>[耐性] 罠：有効 / 護衛制限：有り</h4>
<pre>
暗殺成立時に<a href="sub_role.php#death_selected">オシラ遊び</a>を付加する特殊な暗殺者。
オシラ遊びの発動日は投票した夜から数えて次の日の夜。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
時間差暗殺能力者です。
主に<a href="../game_option.php#duel">決闘村</a>で「最期の夜を迎えた恋人」を演出するのが狙いです。
</pre>

<h3 id="reverse_assassin">反魂師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[耐性] 罠：有効 / 護衛制限：有り</h4>
<pre>
夜に選んだ人が生きていたら暗殺、死んでいたら蘇生する特殊な暗殺者。
詳細な判定順は<a href="../spec.php#vote_night">詳細な仕様</a>参照。
</pre>
<ol>
<li>一度死亡した人の能力発動はキャンセルされる。</li>
<li>「反魂」可能な対象は<a href="sub_role.php#lovers">恋人</a>以外全て。</li>
<li>自分が暗殺されても投票は有効 (暗殺系の処理は同時並行処理扱い)。</li>
<li>「反魂」先が憑依されていた場合は、元の人が蘇生する (<a href="wolf.php#possessed_wolf_revive">憑狼</a>の処理と同じ)。</li>
</ol>
<h4>能力発動例</h4>
<pre>
例1) A[反魂師] → B[占い師] ← C[反魂師]、B[占い師] → D[妖狐]
占い結果：何も出ない (呪殺もなし)
死体：B が無残な死体で発見されました (死因：「暗殺された」)
蘇生：B は生き返りました

例2) A[反魂師] → B[猫神] ← C[人狼]、B[猫神] → D[村人]
死体：B が無残な死体で発見されました (死因：「人狼に襲撃された」)
蘇生：B は生き返りました
Bの蘇生処理はキャンセル

例3) A[暗殺者] → B[反魂師] → C[村人] ← D[人狼]
死体：B が無残な死体で発見されました (死因：「暗殺された」)
死体：C が無残な死体で発見されました (死因：「人狼に襲撃された」)
蘇生：C は生き返りました
</pre>
<h4>関連役職</h4>
<pre>
<a href="#astray_wizard">左道使い</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の八雲 紫のスペルカード「生と死の境界」がモチーフです。
確定で人狼に噛み殺されそうな人を狙った時に真価を発揮します。
失敗すると大惨事となりますが……
</pre>

<h3 id="soul_assassin">辻斬り (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[耐性] 罠：有効 / 護衛制限：有り / 遺言：不可</h4>
<pre>
暗殺した人の役職を知る事ができる、上位暗殺者。
<a href="ability.php#last_words_limit">遺言</a>を残せない。

人狼が襲撃して発動する可能性のある<a href="ability.php#poison">毒能力者</a>を暗殺した場合は、本人は毒死する。
例1) <a href="wolf.php#poison_wolf">毒狼</a>を襲撃したら毒死
例2) <a href="sub_role.php#lovers">恋人</a>の有無を問わず<a href="#poison_jealousy">毒橋姫</a>を襲撃したら毒死
例3) <a href="#chain_poison">連毒者</a>は毒能力者に中らないと発動しないので不発。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#soul_wizard">八卦見</a>・<a href="wolf.php#sharp_wolf">鋭狼</a>・<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#soul">役職鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
メビウス人狼の暗殺者がモチーフで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/641" target="_top">新役職考案スレ(641)</a> が原型です。
</pre>

<h3 id="eclipse_assassin">蝕暗殺者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β9～]</h3>
<h4>[役職表示] <a href="#assassin">暗殺者</a></h4>
<h4>[耐性] 罠：有効 / 護衛制限：有り</h4>
<pre>
30% の確率で<a href="#assassin_spec">暗殺反射</a>が発生する劣化暗殺者。本人表記は「<a href="#assassin">暗殺者</a>」。
<a href="#psycho_mage">精神鑑定士</a>の鑑定結果は「正常」。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#assassin">暗殺者</a>に暗殺のリスクを感じてもらうための存在です。
<a href="#assassin">暗殺者</a>が<a href="sub_role.php#lovers">恋人</a>になると大惨事が発生する可能性がありましたが
この役職の登場によって多少は緩和されるかもしれません。
</pre>


<h2 id="mind_scanner_group">さとり系</h2>
<p>
<a href="#mind_scanner">さとり</a>
<a href="#evoke_scanner">イタコ</a>
<a href="#presage_scanner">件</a>
<a href="#clairvoyance_scanner">猩々</a>
<a href="#whisper_scanner">囁騒霊</a>
<a href="#howl_scanner">吠騒霊</a>
<a href="#telepath_scanner">念騒霊</a>
<a href="#dummy_scanner">幻視者</a>
</p>

<h3 id="mind_scanner">さとり (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α21～]</h3>
<pre>
初日の夜に誰か一人を選んでその人を<a href="sub_role.php#mind_read">サトラレ</a>にする、さとり系の<a href="mania.php#basic_mania">基本種</a>。
<a href="wolf.php#howl">人狼の遠吠え</a>が一切見えない。
</pre>
<ol>
<li>結果が出るのは 2 日目以降。</li>
<li>身代わり君を対象に選ぶことはできない。</li>
</ol>
<h5>Ver. 1.4.0 β17～</h5>
<pre>
身代わり君を対象に選ぶことはできない。
</pre>
<h5>Ver. 1.4.0 α23～</h5>
<pre>
<a href="wolf.php#howl">人狼の遠吠え</a>が一切見えない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/4" target="_top">新役職考案スレ(4)</a> が原型です。
相手も見られていることだけは自覚できるので
どこまで推理に活かせるのかは未知数ですが……
遠吠えの有無で相手が人狼かどうかの判断できてしまうので
Ver. 1.4.0 α23 からは常時遠吠えを見えなくしました。
</pre>

<h3 id="evoke_scanner">イタコ (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β2～]</h3>
<h4>[耐性] 遺言：不可</h4>
<pre>
初日の夜に誰か一人を選んでその人を<a href="sub_role.php#mind_evoke">口寄せ</a>にする特殊なさとり。
</pre>
<ol>
<li>投票結果が出るのは 2 日目以降。</li>
<li><a href="sub_role.php#mind_evoke">口寄せ</a>先が死亡したら霊界から遺言窓を介してメッセージを受け取ることができる。</li>
<li>自分では<a href="ability.php#last_words_limit">遺言</a>を変更できない。</li>
<li>自分の遺言欄に何か表示されていても遺言は残らない。</li>
<li>身代わり君を対象に選ぶことはできない。</li>
</ol>
<h5>Ver. 1.4.0 β17～</h5>
<pre>
身代わり君を対象に選ぶことはできない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
霊界オフモードを有効活用できる役職を作ろうと思い、
こういう実装にしてみました。
</pre>

<h3 id="presage_scanner">件 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β18～]</h3>
<h4>[耐性] 人狼襲撃：特殊</h4>
<pre>
初日の夜に誰か一人を選んでその人を<a href="sub_role.php#mind_presage">受託者</a>にする特殊なさとり。
</pre>
<ol>
<li>投票結果が出るのは 2 日目以降。</li>
<li>自分が人狼に襲撃されて死亡したら<a href="sub_role.php#mind_presage">受託者</a>に自分が誰に襲撃されたかメッセージが送られる。</li>
<li>襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は無効。</li>
<li>身代わり君を対象に選ぶことはできない。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="#reporter">ブン屋</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
能力を制限した<a href="#reporter">ブン屋</a>のさとりバージョンです。「くだん」と読みます。
メッセージが届く相手が人外の可能性もあるので件であることを信用されても
さらなる悲劇が起こる可能性があるのがポイントです。
</pre>

<h3 id="clairvoyance_scanner">猩々 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β22～]</h3>
<h4>[耐性] 罠：有効 / 護衛制限：有り</h4>
<pre>
2日目以降、夜に投票した人のその夜の投票先を知ることができる特殊なさとり。
</pre>
<ol>
<li>対象が投票していない場合は何も出ない。</li>
<li><a href="#assassin_group">暗殺者系</a>・<a href="#poison_cat_group">猫又系</a>などが「行動しない」を選んでいた場合は何も出ない。</li>
<li>能力を発動できなかった場合でも分かる。<br>
  例) 人狼に噛み殺された占い師の投票先は分かる。
</li>
<li>投票先に<a href="wolf.php#trap_mad">罠師</a>の罠が設置されていたら死亡する。</a>
</ol>
<h4>関連役職</h4>
<pre>
<a href="#reporter">ブン屋</a>・<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#stargazer">投票能力鑑定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/864" target="_top">新役職考案スレ(864)</a> が原型で、「しょうじょう」と読みます。
<a href="#reporter">ブン屋</a>と良く似た能力で、判定処理も<a href="#reporter">ブン屋</a>の直後となっています。
他の投票能力者や、<a href="#attempt_necromancer">蟲姫</a>・<a href="#yama_necromancer">閻魔</a>などと連携できると非常に強力です。
</pre>

<h3 id="whisper_scanner">囁騒霊 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β11～]</h3>
<pre>
2日目夜以降、<a href="#common_group">共有者系</a>に一方的に声が届く特殊なさとり。
相手には誰の声が聞こえているのか分かるが、仲間表示などには何も出ない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="lovers.php#minstrel_cupid">吟遊詩人</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
名称は東方 Project のプリズムリバー姉妹がモチーフです。
共有者の囁きに同時に表示される形で実装しているので、
実質、片側通行の共有者相当になります。
</pre>

<h3 id="howl_scanner">吠騒霊 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β11～]</h3>
<pre>
2日目夜以降、<a href="wolf.php#talk">人狼系</a>に一方的に声が届く特殊なさとり。
相手には誰の声が聞こえているのか分かるが、仲間表示などには何も出ない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#leader_common">指導者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#whisper_scanner">囁騒霊</a>の対人狼バージョンです。
人狼の夜会話に同時に表示される形で実装しているので<a href="wolf.php#whisper_mad">囁き狂人</a>にも見えます。
</pre>

<h3 id="telepath_scanner">念騒霊 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β11～]</h3>
<pre>
2日目夜以降、<a href="fox.php#talk">妖狐系</a>に一方的に声が届く特殊なさとり。
相手には誰の声が聞こえているのか分かるが、仲間表示などには何も出ない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#leader_common">指導者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#whisper_scanner">囁騒霊</a>の対妖狐バージョンです。
妖狐の<a href="fox.php#talk">念話</a>に同時に表示される形で実装していますが、妖狐の発言ではないので
<a href="wolf.php#wise_wolf">賢狼</a>は感知できません。
</pre>

<h3 id="dummy_scanner">幻視者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β16～]</h3>
<h4>[役職表示] <a href="#human">村人</a></h4>
<h4>[耐性] 獏襲撃：死亡 / 精神鑑定：嘘つき</h4>
<pre>
<a href="#mind_scanner">さとり</a>に心を読まれていると思い込んでいる村人。本人表記は「<a href="#human">村人</a>」。
2 日目以降、<a href="sub_role.php#mind_read">サトラレ</a>が表示されるが誰にもさとられていない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#dummy">夢能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「夢<a href="sub_role.php#mind_read">サトラレ</a>」がテーマの劣化種です。
</pre>

<h2 id="jealousy_group">橋姫系</h2>
<p>
<a href="#jealousy">橋姫</a>
<a href="#divorce_jealousy">縁切地蔵</a>
<a href="#priest_jealousy">恋司祭</a>
<a href="#poison_jealousy">毒橋姫</a>
<a href="#miasma_jealousy">蛇姫</a>
<a href="#critical_jealousy">人魚</a>
</p>

<h3 id="jealousy">橋姫 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α22～]</h3>
<pre>
処刑投票時に、同一<a href="lovers.php">キューピッド</a>の<a href="sub_role.php#lovers">恋人</a>が揃って自分に投票したら
投票した<a href="sub_role.php#lovers">恋人</a>をショック死させる、橋姫系の<a href="mania.php#basic_mania">基本種</a>。
</pre>
<h4>詳細な仕様</h4>
<pre>
1. 自分が処刑されたら無効
処刑されない範囲で恋人の票を集める必要があります。
対恋人で人柱になっても無意味です。

2. 他のキューピッドの恋人たちに投票されても無効
複数のキューピッドに矢を打たれて繋がっている恋人に投票されても無効です。

3. <a href="../spec.php#vote_day">判定</a>はショック死処理の直前
つまり、投票結果が再投票になっても有効です。
また、本人が<a href="sub_role.php#celibacy">独身貴族</a>であっても有効です。
(結果的には相討ちになる)

4. カップルが別々の橋姫に投票しても無効
他の橋姫に対する投票は参照していません。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
対恋人役職です。
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/2" target="_top">新役職考案スレ(2)</a>・<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/21" target="_top">(21)</a>・<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/44" target="_top">(44)</a> を参考にしています。
別れさせる処理が難しいのでこういう実装になりました。
</pre>

<h3 id="divorce_jealousy">縁切地蔵 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β19～]</h3>
<pre>
自分に処刑投票してきた<a href="sub_role.php#lovers">恋人</a>に一定確率 (40%) で<a href="sub_role.php#passion">恋色迷彩</a>を付加する特殊な橋姫。
<a href="../spec.php#vote_day">判定</a>は処刑者決定後で、自分が処刑された場合は無効。
<a href="#jealousy">橋姫</a>の能力は持っていない。
</pre>
<h5>Ver. 1.5.0 β16～</h5>
<pre>
発動率変更：30% → 40%
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#vote_reaction">処刑得票能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
発動機会が増えた代りに効果や発動率が<a href="#jealousy">橋姫</a>よりもかなり抑えられています。
<a href="sub_role.php#passion">恋色迷彩</a>は発動しても気付きにくいので発言を注視する必要があります。
</pre>

<h3 id="priest_jealousy">恋司祭 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β17～]</h3>
<h4>[役職表示] <a href="#priest">司祭</a></h4>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
一定日数ごとに現在、生存している<a href="sub_role.php#lovers">恋人</a>の人数が分かる特殊な司祭。
本人表記は「<a href="#priest">司祭</a>」で能力の発動日などの仕様も同じ。
<a href="#jealousy">橋姫</a>の能力は持っていない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#priest">司祭</a>の対<a href="sub_role.php#lovers">恋人</a>バージョンで、所属は橋姫系になります。
判定法則が全然違うので他の司祭表示役職と区別しやすいですが、騙りやすいですね。
</pre>

<h3 id="poison_jealousy">毒橋姫 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β6～]</h3>
<h4>[役職表示] <a href="#poison">埋毒者</a></h4>
<h4>[毒能力] 処刑：恋人 / 襲撃：恋人 / 薬師判定：限定的</h4>
<pre>
<a href="sub_role.php#lovers">恋人</a>のみに中る埋毒者。本人表記は「<a href="#poison">埋毒者</a>」。
<a href="#jealousy">橋姫</a>の能力は持っていない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#poison">毒能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#poison_group">埋毒者</a>の亜種ですが、<a href="sub_role.php#lovers">恋人</a>限定なので所属は橋姫系です。
</pre>

<h3 id="miasma_jealousy">蛇姫 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β9～]</h3>
<pre>
処刑投票先が<a href="sub_role.php#lovers">恋人</a>なら一定確率 (40%) で<a href="sub_role.php#febris">熱病</a>を付加する上位橋姫。
<a href="#jealousy">橋姫</a>の能力は持っていない。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑者決定後で、自分が毒やショック死で死亡した場合でも有効。</li>
<li>対象が死亡していた場合は無効 (例：処刑・毒死)。</li>
<li>自分が処刑された場合は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="#philosophy_wizard">賢者</a>・<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#vote_action">処刑投票能力者</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
安珍・清姫伝説がモチーフです。
能動的に<a href="sub_role.php#lovers">恋人</a>を狙うことができますが、確率依存である点に注意してください。
</pre>

<h3 id="critical_jealousy">人魚 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β9～]</h3>
<pre>
処刑投票先が<a href="sub_role.php#lovers">恋人</a>なら自分に<a href="sub_role.php#critical_luck">痛恨</a>を付加してしまう劣化橋姫。
<a href="#jealousy">橋姫</a>の能力は持っていない。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑者決定後で、自分が毒やショック死で死亡した場合は無効。</li>
<li>対象が死亡していた場合は無効 (例：処刑・毒死)。</li>
<li>自分が処刑された場合は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#vote_action">処刑投票能力者</a>・<a href="ability.php#luck">得票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
人魚姫がモチーフです。
<a href="sub_role.php#critical_luck">痛恨</a>が発動することで投票履歴から恋人候補を絞ることができます。
</pre>


<h2 id="brownie_group">座敷童子系</h2>
<p>
<a href="#brownie">座敷童子</a>
<a href="#thunder_brownie">雷公</a>
<a href="#echo_brownie">山彦</a>
<a href="#revive_brownie">蛇神</a>
<a href="#harvest_brownie">豊穣神</a>
<a href="#maple_brownie">紅葉神</a>
<a href="#cursed_brownie">祟神</a>
<a href="#sun_brownie">八咫烏</a>
<a href="#history_brownie">白澤</a>
</p>

<h3 id="brownie">座敷童子 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β15～]</h3>
<h4>[耐性] 処刑：<a href="sub_role.php#febris">熱病</a></h4>
<pre>
役職「<a href="#human">村人</a>」の処刑投票数を +1 する、座敷童子系の<a href="mania.php#basic_mania">基本種</a>。
生きている間のみ有効で、複数生存していても効果は重複しない。
処刑されたら投票者からランダムで一人に<a href="sub_role.php#febris">熱病</a>を付加する。
<a href="human.php#detective_common">探偵</a>・<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態)・<a href="sub_role.php#challenge_lovers">難題</a>は能力の対象外となり、
対象者が誰もいなかった場合は不発となる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sudden_death">ショック死発動能力者</a>・<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「居る間は恩恵をもたらすが去ると災厄が訪れる」と言われる伝説がモチーフです。
村人表示役職の正体を絞り込むことができます。
</pre>

<h3 id="thunder_brownie">雷公 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β15～]</h3>
<pre>
再投票の最多得票者になったら、誰か一人をショック死させる座敷童子の亜種。
</pre>
<ol>
<li>ショック死の内容は<a href="../weather.php#weather_thunderbolt">青天の霹靂</a>相当。</li>
<li>条件を満たした雷公が複数いても効果の発動は一度だけ。</li>
<li><a href="../weather.php#weather_thunderbolt">青天の霹靂</a>と同時に条件を満たした場合は<a href="../weather.php#weather_thunderbolt">青天の霹靂</a>のみ発動する。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sudden_death">ショック死発動能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の蘇我 屠自古がモチーフです。
条件を満たしたまま再投票が続くと大量のショック死が発生するので要注意です。
</pre>

<h3 id="echo_brownie">山彦 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β13～]</h3>
<pre>
座敷童子の亜種で、昼の発言時に一定確率で直前の発言を発言 (反響) してしまう。
</pre>
<ol>
<li>発動率は 30% で、内容は自分の発言の直近の 5 発言からランダム。</li>
<li>選択された内容が本人の発言として登録後に自身が入力した発言が登録される。</li>
<li>声の大きさは本人の能力が適用される。</li>
<li>遺言登録時は対象外。</li>
<li>直前の発言者が自分だったら無効。</li>
</ol>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の幽谷 響子がモチーフです。
「反響」をどう表現するか考えていくつか試作した末にこの実装となりました。
</pre>

<h3 id="revive_brownie">蛇神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β20～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 蘇生 (1回限定) / 蘇生：不可 / 憑依：無効</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>の成功率を +30% (1.3倍) する、座敷童子の亜種。
生きている間のみ有効で、複数生存していても効果は重複しない。
自己蘇生能力 (仕様は<a href="#revive_pharmacist">仙人</a>と同じ) を持つ。
</pre>
<ol>
<li>固定されているタイプ (例：<a href="#eclipse_cat">蝕仙狸</a>) を除き、誤爆率も同時に上がる。<br>
例：<a href="#poison_cat">猫又</a>：蘇生率 25% (誤爆率 5%) → 25 * 1.3 = 33% (誤爆率 6%)</li>
<li>自己蘇生能力を失っても蘇生率向上能力は失わない。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
再生の象徴と言われる伝承がモチーフです。
<a href="ability.php#revive">蘇生能力者</a>が出現しなかったケースを考慮して<a href="#revive_pharmacist">仙人</a>相当の能力も持たせてあります。
</pre>

<h3 id="harvest_brownie">豊穣神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β16～]</h3>
<h4>[耐性] 処刑：<a href="sub_role.php#frostbite">凍傷</a> (30%)</h4>
<pre>
座敷童子の亜種で、自分に処刑投票してきた人が村人陣営だった場合は一定確率 (30%) で<a href="sub_role.php#critical_voter">会心</a>を付加し、
処刑された場合は投票者全員に一定確率 (30%) で<a href="sub_role.php#frostbite">凍傷</a>を付加する。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑対象が決定された後。</li>
<li><a href="sub_role.php#lovers">恋人</a>は恋人陣営と判定する。</li>
<li>自分が処刑されたら<a href="sub_role.php#critical_voter">会心</a>付加は無効。</li>
<li><a href="sub_role.php#frostbite">凍傷</a>付加判定は個々で行う (例：5人投票してきたら5回、個々で判定)。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#vote_reaction">処刑得票能力者</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>・<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の秋 穣子がモチーフです。
処刑されない程度に共有者などを中心に票を集めることで村人陣営の
処刑投票能力を底上げすることができますが、騙りだった場合は
一定の投票数が敵対勢力に封印されていることになります。
</pre>

<h3 id="maple_brownie">紅葉神 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β16～]</h3>
<h4>[耐性] 処刑：<a href="sub_role.php#frostbite">凍傷</a> (30%)</h4>
<pre>
座敷童子の亜種で、自分に処刑投票してきた人が村人陣営だった場合は一定確率 (30%) で<a href="sub_role.php#critical_luck">痛恨</a>を付加し、
処刑された場合は投票者全員にさらに一定確率 (30%) で<a href="sub_role.php#frostbite">凍傷</a>を付加する。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑対象が決定された後。</li>
<li><a href="sub_role.php#lovers">恋人</a>は恋人陣営と判定する。</li>
<li>自分が処刑対象になった場合でも<a href="sub_role.php#critical_luck">痛恨</a>付加は有効。</li>
<li><a href="sub_role.php#frostbite">凍傷</a>付加判定は<a href="sub_role.php#critical_luck">痛恨</a>付加判定とは別に行う。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#vote_reaction">処刑得票能力者</a>・<a href="ability.php#sudden_death">ショック死発動能力者</a>・<a href="ability.php#luck">得票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の秋 静葉がモチーフです。
騙り易い上に、処刑すると村人陣営に大きなリスクを与えるので扱いに困る存在です。
</pre>

<h3 id="cursed_brownie">祟神 (占い結果：村人(呪返し) / 霊能結果：村人) [Ver. 1.4.0 β20～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 死の宣告 (2日後) / 暗殺：反射 (30%) / 占い：呪返し / 陰陽師：死亡</h4>
<pre>
呪いと<a href="#assassin_spec">暗殺反射</a> (30%) を持った座敷童子の亜種。
処刑投票者 (30%) と、自分を襲撃した人狼に<a href="sub_role.php#death_warrant">死の宣告</a> (2日後) を付加する。
</pre>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は処刑対象が決定された後で、付加率は 30%。</li>
<li>付加判定は個々で行う (例：5人投票してきたら5回、個々で判定)。</li>
<li>自分が処刑対象になった場合でも有効。</li>
<li>人狼に襲撃された場合は襲撃した人狼のみに、確定で付加される。</li>
<li><a href="#detective_common">探偵</a>・<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態)・<a href="sub_role.php#challenge_lovers">難題</a>は能力の対象外。</li>
<li>身代わり君の場合は能力無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#doom">死の宣告能力者</a>・<a href="ability.php#vote_reaction">処刑得票能力者</a>・<a href="ability.php#cursed_group">呪い能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「うかつに触れると災厄が訪れる」と言われる伝承がモチーフです。
対抗役職なしに触れる (占う・投票する) と酷い目に遭うことになります。
</pre>

<h3 id="sun_brownie">八咫烏 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α5～]</h3>
<h4>[耐性] 処刑：特殊 / 人狼襲撃：特殊</h4>
<pre>
座敷童子の亜種で、人狼に襲撃されたら次の日を全員<a href="sub_role.php#mind_open">公開者</a> (白夜) に、
処刑されたら次の日の昼を全員<a href="sub_role.php#blinder">目隠し</a> (宵闇) にする。
身代わり君か、<a href="wolf.php#hungry_wolf">餓狼</a>・<a href="wolf.php#possessed_wolf">憑狼</a>による襲撃の場合は無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="chiroptera.php#light_fairy">光妖精</a>・<a href="chiroptera.php#dark_fairy">闇妖精</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
太陽の化身と言われる伝承がモチーフで、「やたがらす」と読みます。
一部の例外を除いて死亡することで自己証明が可能になります。
</pre>

<h3 id="history_brownie">白澤 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β16～]</h3>
<h4>[耐性] 人狼襲撃：特殊</h4>
<pre>
人狼に襲撃されたら次の日の夜を飛ばしてしまう、座敷童子の亜種。
能力が発動した場合は、専用のメッセージが表示される。
身代わり君か、<a href="wolf.php#hungry_wolf">餓狼</a>・<a href="wolf.php#possessed_wolf">憑狼</a>による襲撃の場合は無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
翠星石鯖＠やる夫人狼で実施された記念村の設定を役職にしてみました。
東方 Project の上白沢 慧音がモチーフです。
</pre>


<h2 id="wizard_group">魔法使い系</h2>
<p><a href="#wizard_rule">基本ルール</a></p>
<p>
<a href="#wizard">魔法使い</a>
<a href="#soul_wizard">八卦見</a>
<a href="#awake_wizard">比丘尼</a>
<a href="#mimic_wizard">物真似師</a>
<a href="#spiritism_wizard">交霊術師</a>
<a href="#philosophy_wizard">賢者</a>
<a href="#barrier_wizard">結界師</a>
<a href="#astray_wizard">左道使い</a>
<a href="#pierrot_wizard">道化師</a>
</p>

<h3 id="wizard_rule">基本ルール [魔法使い]</h3>
<ol>
<li>2 日目以降、夜に「魔法」を使うことができる。</li>
<li>魔法の効果は個々に設定された役職リストからランダムに一つ選ばれる。</li>
<li>選ばれた投票能力の仕様は元の役職と同じで、耐性は適用されない。</li>
</ol>

<h3 id="wizard">魔法使い (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α1～]</h3>
<pre>
魔法使い系の<a href="mania.php#basic_mania">基本種</a>。
魔法の効果は、<a href="#mage">占い師</a>・<a href="#psycho_mage">精神鑑定士</a>・<a href="#sex_mage">ひよこ鑑定士</a>・<a href="#guard">狩人</a>・<a href="#assassin">暗殺者</a>のいずれか。
</pre>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
<a href="#mage">占い師</a>固定。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
<a href="#sex_mage">ひよこ鑑定士</a>固定。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
テーマは「自然にギドラ CO をすることになる能力」です。
</pre>

<h3 id="soul_wizard">八卦見 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α1～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
魔法使いの上位種。
魔法の効果は、<a href="#soul_mage">魂の占い師</a>・<a href="#psycho_mage">精神鑑定士</a>・<a href="#sex_mage">ひよこ鑑定士</a>・<a href="#stargazer_mage">占星術師</a>・
<a href="#poison_guard">騎士</a>・<a href="#doom_assassin">死神</a>・<a href="#soul_assassin">辻斬り</a>・<a href="chiroptera.php#light_fairy">光妖精</a>のいずれか。
<a href="#poison_guard">騎士</a>能力が発動しても毒を持つわけではないので注意。
</pre>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
<a href="#soul_mage">魂の占い師</a>固定。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
<a href="#sex_mage">ひよこ鑑定士</a>固定。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
「やる夫・早苗・バーボン・アイマス＋猫又鯖合同トーナメント」の
MVP の賞品としてプレゼントしたものです。
</pre>

<h3 id="awake_wizard">比丘尼 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α4～]</h3>
<h4>[耐性] 人狼襲撃：無効 (1回限定)</h4>
<pre>
魔法使いの一種で、一度だけ<a href="wolf.php#wolf_group">人狼系</a> (種類を問わない) の襲撃に耐えることができる。
人狼に襲撃されると耐性を失う (<a href="sub_role.php#lost_ability">能力喪失</a>) が、魔法が強化される。
魔法の効果は、初めは<a href="#mage">占い師</a>・<a href="#sex_mage">ひよこ鑑定士</a>・<a href="#stargazer_mage">占星術師</a>のいずれかで、成功率は 30%。
強化後の魔法の効果は、<a href="#soul_mage">魂の占い師</a>で、成功率も 100% となる。
身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合は耐性無効。
</pre>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
強化前：<a href="#mage">占い師</a>固定 (成功率は影響なし)。
強化後：<a href="#soul_mage">魂の占い師</a>固定 (実質変化なし)。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
強化前：<a href="#sex_mage">ひよこ鑑定士</a>固定 (成功率は影響なし)。
強化後：<a href="#soul_mage">魂の占い師</a>固定 (実質変化なし)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#resist_wolf">人狼襲撃耐性能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の聖 白蓮がモチーフで、「びくに」と読みます。
</pre>

<h3 id="mimic_wizard">物真似師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β15～]</h3>
<pre>
魔法使いの一種で、魔法の効果は<a href="#mage">占い師</a> (成功率 50%) と<a href="#necromancer">霊能者</a> (成功率 50%)。
</pre>
<ol>
<li>霊能の発動は三日目以降 (従って、結果が表示されるのは四日目以降)。</li>
<li>霊能の発動に失敗した場合、結果表示は<a href="wolf.php#corpse_courier_mad">火車</a>の能力発動時と同じになる。</li>
</ol>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
成功率 100%
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
成功率 0%
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
占い師-霊能者のギドラやスライド CO がテーマです。
</pre>

<h3 id="spiritism_wizard">交霊術師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α6～]</h3>
<h4>[霊能能力] 処刑者情報：特殊 / 火車：有効</h4>
<pre>
<a href="#necromancer_group">霊能</a>能力を持つ魔法使いの一種 (夜の投票は無し)。
魔法の効果は、<a href="#necromancer">霊能者</a>・<a href="#soul_necromancer">雲外鏡</a>・<a href="#psycho_necromancer">精神感応者</a>・<a href="#embalm_necromancer">死化粧師</a>・性別鑑定のいずれか。
性別鑑定結果は処刑者の役職には影響されない。
複数出現しても霊能結果は全員共通。
</pre>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
<a href="#soul_necromancer">雲外鏡</a>固定。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
性別鑑定固定。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
魔法使いの<a href="#necromancer_group">霊能</a>バージョンです。
<a href="#sex_mage">ひよこ鑑定士</a>の霊能バージョンは存在しないので性別鑑定はオリジナルになります。
</pre>

<h3 id="philosophy_wizard">賢者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β10～]</h3>
<pre>
<a href="ability.php#vote_action">処刑投票</a>能力ベースの魔法を持つ魔法使いの一種 (夜の投票は無し)。
魔法の効果は、<a href="#cure_pharmacist">河童</a>・<a href="#alchemy_pharmacist">錬金術師</a>・<a href="#miasma_jealousy">蛇姫</a>・<a href="wolf.php#corpse_courier_mad">火車</a>・<a href="wolf.php#miasma_mad">土蜘蛛</a>・<a href="wolf.php#critical_mad">釣瓶落とし</a>・
<a href="lovers.php#sweet_cupid">弁財天</a>のいずれか。
耐性は適用されないので<a href="#guard_hunt">狩り</a>の対象にはならない。
</pre>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
<a href="#alchemy_pharmacist">錬金術師</a>固定。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
<a href="wolf.php#corpse_courier_mad">火車</a>固定。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
魔法使いの<a href="ability.php#vote_action">処刑投票</a>能力ギドラタイプです。
魔法は七曜を見立てて選択しています。
</pre>

<h3 id="barrier_wizard">結界師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α6～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<h4>[狩人能力] 護衛：範囲護衛 / 護衛制限：有り / 狩り：無し / 罠：有効</h4>
<pre>
魔法使いの一種で、魔法の効果は複数 (最大 4 箇所) の<a href="ability.php#guard">護衛</a>能力。
</pre>
<ol>
<li>護衛能力は<a href="#guard">狩人</a>と同じだが、<a href="#guard_hunt">狩り</a>能力は持たない。</li>
<li>護衛成功率は 100 - (護衛箇所数 × 20) %。</li>
<li>護衛に失敗した場合は襲撃先を選択していた場合でも何も表示されない。</li>
<li>他の護衛先で罠死した場合でも護衛は有効。</li>
<li>自分を護衛することはできない。</li>
<li><a href="#clairvoyance_scanner">猩々</a>が尾行した場合は全ての護衛先が表示される。</li>
</ol>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
成功率 +25% (1.25倍)。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
成功率 -25% (0.75倍)。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/947" target="_top">新役職考案スレ(947)</a> が原型で、テーマは「護衛先ギドラ」です。
100% にこそなりませんが、期待値は通常の狩人よりも高性能です。
ただし、手を広げると罠にかかりやすくなります。
</pre>

<h3 id="astray_wizard">左道使い (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α8～]</h3>
<pre>
魔法使いの一種で、魔法の効果は、<a href="#reverse_assassin">反魂師</a>・<a href="wolf.php#jammer_mad">月兎</a>・<a href="wolf.php#voodoo_mad">呪術師</a>・<a href="wolf.php#dream_eater_mad">獏</a>・<a href="wolf.php#snow_trap_mad">雪女</a>・
<a href="fox.php#doom_fox">冥狐</a>・<a href="chiroptera.php#dark_fairy">闇妖精</a>のいずれか。
耐性は適用されないので<a href="#guard_hunt">狩り</a>の対象にはならないが、
<a href="wolf.php#dream_eater_mad">獏</a>能力が発動すると<a href="#dummy_guard">夢守人</a>の能力が適用されるので注意 (<a href="wolf.php#dream_eater_mad">獏</a>参照)。
</pre>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
<a href="#reverse_assassin">反魂師</a>固定。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
<a href="chiroptera.php#dark_fairy">闇妖精</a>固定。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
魔法使いの<a href="wolf.php#mad_group">狂人系</a>バージョンです。
魔法の対象役職は騙りやすいですが、信用を得ても生き残るのは難しいでしょう。
</pre>

<h3 id="pierrot_wizard">道化師 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α8～]</h3>
<h4>[耐性] 護衛制限：有り</h4>
<pre>
魔法使いの一種で、魔法の効果は、<a href="#soul_mage">魂の占い師</a>・<a href="#sex_mage">ひよこ鑑定士</a>・特殊<a href="#doom_assassin">死神</a>・
<a href="chiroptera.php#grass_fairy">草妖精</a>・<a href="chiroptera.php#star_fairy">星妖精</a>・<a href="chiroptera.php#flower_fairy">花妖精</a>・<a href="chiroptera.php#ice_fairy">氷妖精</a>・特殊妖精のいずれか。
「特殊<a href="#doom_assassin">死神</a>」による<a href="sub_role.php#death_warrant">死の宣告</a>の発動日は投票した夜から数えて 2～10 日後の昼。
「特殊妖精」のメッセージは「～は昨夜、～していたようです」で、全部で26種類。
</pre>
<h4>天候：<a href="../weather.php#weather_full_wizard">霧雨</a></h4>
<pre>
<a href="#soul_mage">魂の占い師</a>固定。
</pre>
<h4>天候：<a href="../weather.php#weather_debilitate_wizard">木枯らし</a></h4>
<pre>
<a href="#sex_mage">ひよこ鑑定士</a>固定。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
魔法使いの<a href="chiroptera.php#fairy_group">妖精系</a>バージョンです。
能力のほとんどは実利がありませんが自己証明には便利です。
</pre>


<h2 id="doll_group">上海人形系</h2>
<p><a href="#doll_rule">基本ルール</a></p>
<p>
<a href="#doll">上海人形</a>
<a href="#friend_doll">仏蘭西人形</a>
<a href="#phantom_doll">倫敦人形</a>
<a href="#poison_doll">鈴蘭人形</a>
<a href="#doom_doll">蓬莱人形</a>
<a href="#revive_doll">西蔵人形</a>
<a href="#scarlet_doll">和蘭人形</a>
<a href="#silver_doll">露西亜人形</a>
<a href="#doll_master">人形遣い</a>
</p>

<h3 id="doll_rule">基本ルール [上海人形]</h3>
<ol>
<li>他の国で言う「奴隷」に相当する。</li>
<li>勝利条件は「<a href="#doll_master">人形遣い</a>が全員死亡している＋村人陣営の勝利」で、自身の生死は不問。</li>
<li><a href="#doll_master">人形遣い</a>が出現しなかった場合の勝利条件は通常の村人陣営相当になる。</li>
<li><a href="#doll_master">人形遣い</a>が誰か分かる。</li>
<li><a href="#doll_master">人形遣い</a>の枠に<a href="#puppet_mage">傀儡師</a>・<a href="#scarlet_doll">和蘭人形</a>・<a href="wolf.php#scarlet_wolf">紅狼</a>・<a href="fox.php#scarlet_fox">紅狐</a>・<a href="lovers.php#scarlet_angel">紅天使</a>・<a href="vampire.php#scarlet_vampire">屍鬼</a>・<a href="chiroptera.php#scarlet_chiroptera">紅蝙蝠</a>も混ざって表示される。</li>
<li><a href="#doll_master">人形遣い</a>が<a href="wolf.php#wolf_group">人狼</a>に襲撃されたら身代わりで死亡する。</li>
</ol>
<h5>Ver. 1.4.0 β21～</h5>
<pre>
<a href="#doll_master">人形遣い</a>の枠に<a href="wolf.php#scarlet_wolf">紅狼</a>・<a href="fox.php#scarlet_fox">紅狐</a>も混ざって表示される。
</pre>

<h3 id="doll">上海人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β10～]</h3>
<pre>
上海人形系の<a href="mania.php#basic_mania">基本種</a>で、他の国で言う「奴隷」。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドのスペルカード「魔彩光の上海人形」がモチーフです。
奴隷という名称を避けたかったので、東方 Project のメディスン・メランコリーをヒントに
「<a href="#doll_master">人形遣い</a>の支配から逃れようとする人形」という構図を採用しました。
上海は「シャンハイ」と読みます。
</pre>

<h3 id="friend_doll">仏蘭西人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β10～]</h3>
<pre>
他の人形が誰か分かる人形。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドのスペルカード「博愛の仏蘭西人形」がモチーフです。
仏蘭西は「フランス」と読みます。
仲間と<a href="#doll_master">人形遣い</a>の両方に名前が載っている人は<a href="#scarlet_doll">和蘭人形</a>です。
</pre>

<h3 id="phantom_doll">倫敦人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β20～]</h3>
<h4>[耐性] 占い：無効 (1回限定)</h4>
<pre>
一度だけ、自分が占われたら占い妨害をしてしまう人形。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#phantom">占い妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドのスペルカード「霧の倫敦人形」がモチーフで、
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/865" target="_top">新役職考案スレ(865)</a> が原型です。倫敦は「ロンドン」と読みます。
妨害能力ではありますが、占い騙りを看破できるので立ち回り次第では
大きな成果を上げることができます。
</pre>

<h3 id="poison_doll">鈴蘭人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β10～]</h3>
<h4>[毒能力] 処刑：上海人形系以外 (人形遣いには中る) / 襲撃：有り / 薬師判定：有り</h4>
<pre>
毒を持った人形。毒の対象は<a href="#doll_group">上海人形系</a>以外 (<a href="#doll_master">人形遣い</a>には中る)。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のメディスン・メランコリーがモデルです。
<a href="#doll_master">人形遣い</a>の身代わりで死亡した場合は毒が発動しない点に注意して下さい。
</pre>

<h3 id="doom_doll">蓬莱人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β13～]</h3>
<h4>[耐性] 処刑：死の宣告 (2日後)</h4>
<pre>
処刑された時に、自分に投票した人からランダムで一人に<a href="sub_role.php#death_warrant">死の宣告</a>を付加する人形。
</pre>
<ol>
  <li>死の宣告の発動日は処刑された日から数えて 2 日後の昼。</li>
  <li><a href="#doll_group">上海人形系</a> (<a href="#doll_master">人形遣い</a>を除く)・<a href="human.php#detective_common">探偵</a>・<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態)・<a href="sub_role.php#challenge_lovers">難題</a>は能力の対象外。</li>
  <li>対象者が誰もいなかった場合は不発となる。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="#brownie">座敷童子</a>・<a href="fox.php#miasma_fox">蟲狐</a>・<a href="ability.php#doom">死の宣告能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドのスペルカード「首吊り蓬莱人形」がモチーフです。
自分が吊られる時に<a href="#doll_master">人形遣い</a>の投票を引き込むことができれば勝利のチャンスが生まれますが、
対象はランダムなので、人柱的に票を集めてしまうと確率が下がるので難しいところですね。
</pre>

<h3 id="revive_doll">西蔵人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β20～]</h3>
<h4>[耐性] 人狼襲撃：死亡 + 蘇生 (1回限定) / 蘇生：不可 / 憑依：無効</h4>
<pre>
人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する (自己蘇生) 人形。
自己蘇生能力の仕様は<a href="#revive_pharmacist">仙人</a>と同じ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#revive">蘇生能力者</a>・<a href="ability.php#possessed_limit">憑依制限能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドのスペルカード「輪廻の西蔵人形」がモチーフで、
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/865" target="_top">新役職考案スレ(865)</a> が原型です。西蔵は「チベット」と読みます。
<a href="#doll_master">人形遣い</a>の身代わりになると蘇生能力が発動しない点に注意して下さい。
</pre>

<h3 id="scarlet_doll">和蘭人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β21～]</h3>
<pre>
<a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、他の<a href="#doll_rule">人形</a>から<a href="#doll_master">人形遣い</a>に見える人形。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#partner_scarlet">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドのスペルカード「紅毛の和蘭人形」がモチーフで、
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/872" target="_top">新役職考案スレ(872)</a> が原型です。和蘭は「オランダ」と読みます。
いわゆる紅系人外が仲間情報から破綻しない騙り先となります。
</pre>

<h3 id="silver_doll">露西亜人形 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β21～]</h3>
<pre>
<a href="#doll_master">人形遣い</a>が誰か分からない人形。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#partner_silver">仲間情報妨害能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドのスペルカード「白亜の露西亜人形」がモチーフで、
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/872" target="_top">新役職考案スレ(872)</a> が原型です。露西亜は「ロシア」と読みます。
勝利条件に関わる情報が隠蔽されているので、他と比べても厳しめの劣化種となります。
</pre>

<h3 id="doll_master">人形遣い (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β10～]</h3>
<h4>[耐性] 人狼襲撃：身代わり / 護衛制限：有り</h4>
<h4>[身代わり能力] 上海人形系 (人形遣い以外)</h4>
<pre>
他の国で言う「貴族」。
</pre>
<ol>
<li>勝利条件は通常の村人陣営相当。</li>
<li>人形が誰なのかは分からない。</li>
<li><a href="wolf.php#wolf_group">人狼</a>に襲撃された際に人形が生存していたら、ランダムで誰か一人が身代わりに死亡する。</li>
<li>身代わりが発生した場合、<a href="wolf.php#wolf_group">人狼</a>の襲撃は失敗扱い。</li>
<li>本人は身代わりが発生しても分からない。</li>
<li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。</li>
</ol>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
身代わり君が人形遣いになる可能性があります。
身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>・<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project のアリス・マーガトロイドがモチーフです。
他の国に実在する役職を人狼式の闇鍋向きにアレンジしてみました。
</pre>


<h2 id="escaper_group">逃亡者系</h2>
<p><a href="#escaper_rule">基本ルール</a></p>
<p>
<a href="#escaper">逃亡者</a>
<a href="#psycho_escaper">迷い人</a>
<a href="#incubus_escaper">一角獣</a>
<a href="#succubus_escaper">水妖姫</a>
<a href="#doom_escaper">半鳥女</a>
<a href="#divine_escaper">麒麟</a>
</p>

<h3 id="escaper_rule">基本ルール [逃亡者]</h3>
<ol>
<li>勝利条件は「自分自身の生存 + 村人陣営の勝利」。</li>
<li>2日目の夜以降、生きている誰かの側に逃亡する。</li>
<li>逃亡中は<a href="wolf.php#wolf_group">人狼</a>・<a href="vampire.php">吸血鬼</a>に直接狙われても無効 (襲撃は失敗扱いで、自覚できない)。</li>
<li>逃亡先の役職などによって死亡することがある (死因は「逃亡失敗」)。<br>
  逃亡先が<a href="#escaper">逃亡者</a>など、不在であっても条件を満たせば死亡する。
</li>
<li>逃亡先が<a href="wolf.php#wolf_group">人狼</a> (種類不問) に襲撃されたら死亡する (死因は「人狼襲撃」)。<br>
  護衛や耐性 (例：<a href="fox.php#fox">妖狐</a>) などで<a href="wolf.php#wolf_group">人狼</a>の襲撃が失敗しても死亡する。
</li>
<li><a href="ability.php#trap">罠能力</a>は有効、<a href="ability.php#assassin">暗殺能力</a>は無効。</a>
<li>逃亡先が<a href="vampire.php">吸血鬼</a>だった場合は吸血される。</li>
<li>逃亡先が<a href="vampire.php">吸血鬼</a>に襲撃されたら吸血される。<br>
  護衛などで<a href="vampire.php">吸血鬼</a>の襲撃が失敗しても吸血される。
</li>
<li>遺言を残せない。</li>
</ol>
<h5>Ver. 1.4.0 β20～</h5>
<pre>
吸血鬼の襲撃に関する仕様を変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#resist_wolf">人狼襲撃耐性能力者</a>・<a href="ability.php#anti_assassin">暗殺耐性能力者</a>・<a href="ability.php#last_words_limit">遺言制限能力者</a>
</pre>

<h3 id="escaper">逃亡者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β11～]</h3>
<h4>[耐性] 人狼襲撃：特殊 / 罠：有効 / 暗殺：無効 / 遺言：不可</h4>
<pre>
逃亡者系の<a href="mania.php#basic_mania">基本種</a>。逃亡先が<a href="wolf.php#wolf_group">人狼</a>だった場合は死亡する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#reporter">ブン屋</a>・<a href="#centaurus_pharmacist">人馬</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在する役職です。村勝利を課せられた<a href="chiroptera.php">蝙蝠</a>のような存在ですね。
</pre>

<h3 id="psycho_escaper">迷い人 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α7～]</h3>
<h4>[耐性] 人狼襲撃：特殊 / 罠：有効 / 暗殺：無効 / 遺言：不可</h4>
<pre>
逃亡先が「嘘つき」(<a href="#psycho_mage">精神鑑定士</a>) だった場合は死亡する、特殊な逃亡者。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#psycho">精神関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
逃亡者の<a href="#psycho_mage">精神鑑定士</a>バージョンで、
Pixiv 人狼のプレイヤーさんの誕生日プレゼントです。
</pre>

<h3 id="incubus_escaper">一角獣 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 β22～]</h3>
<h4>[耐性] 人狼襲撃：特殊 / 罠：有効 / 暗殺：無効 / 遺言：不可</h4>
<pre>
逃亡先が女性以外だった場合は死亡する、特殊な逃亡者。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#succubus_escaper">水妖姫</a>・<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/830" target="_top">新役職考案スレ(830)</a> が原型で、ユニコーンがモチーフです。
女性の人狼が一番安全な逃亡先になります。
</pre>

<h3 id="succubus_escaper">水妖姫 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α9～]</h3>
<h4>[耐性] 人狼襲撃：特殊 / 罠：有効 / 暗殺：無効 / 遺言：不可</h4>
<pre>
逃亡先が男性以外だった場合は死亡する、特殊な逃亡者。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#incubus_escaper">一角獣</a>・<a href="ability.php#sex">性別関連能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#incubus_escaper">一角獣</a>の対男性バージョンで、ウンディーネがモチーフです。
命名に悩んだこともあって実装のタイミングが<a href="#incubus_escaper">一角獣</a>よりかなり遅れています。
</pre>

<h3 id="doom_escaper">半鳥女 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 α9～]</h3>
<h4>[耐性] 人狼襲撃：特殊 / 罠：有効 / 暗殺：無効 / 遺言：不可</h4>
<pre>
逃亡先が<a href="sub_role.php#death_warrant">死の宣告</a>を受けていた場合は死亡する、特殊な逃亡者。
宣告日がすでに過ぎている場合でも死亡する。
逃亡先に<a href="sub_role.php#death_warrant">死の宣告</a>を行う (発動日は投票した夜から数えて 4 日後の昼)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#dummy_mania">夢語部</a>・<a href="ability.php#doom">死の宣告能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
ハーピーがモチーフです。
同じ場所に逃亡できないので難易度は高めです。
</pre>

<h3 id="divine_escaper">麒麟 (占い結果：村人 / 霊能結果：村人) [Ver. 1.5.0 β4～]</h3>
<h4>[耐性] 人狼襲撃：特殊 / 罠：有効 / 暗殺：無効 / 遺言：不可</h4>
<pre>
逃亡先が<a href="wolf.php#wolf_group">人狼系</a>・<a href="#assassin_group">暗殺者系</a>・<a href="ogre.php">鬼陣営</a>だった場合は死亡する、特殊な逃亡者。
逃亡先が村人陣営 (<a href="sub_role.php#lovers">恋人</a>も含む) なら、翌日発動の<a href="sub_role.php#day_voter">一日村長</a>を付加する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#soul_mania">覚醒者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
穢れを嫌い、偉人が生まれる時に現れる瑞獣の伝承がモチーフです。
放っておくと確定村人が増えていくので、人狼は逃亡先を狙って
襲撃をする価値が出てきます。
</pre>
</body></html>
