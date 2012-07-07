<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('サブ役職');
?>
<p><a href="#rule">基本ルール</a></p>
<p>
<a href="#chicken_group">小心者系</a>
<a href="#liar_group">狼少年系</a>
<a href="#decide_group">決定者系</a>
<a href="#authority_group">権力者系</a>
<a href="#upper_luck_group">雑草魂系</a>
<a href="#strong_voice_group">大声系</a>
<a href="#no_last_words_group">筆不精系</a>
<a href="#mind_read_group">サトラレ系</a>
<a href="#wisp_group">鬼火系</a>
</p>
<p>
<a href="#lovers_group">恋人系</a>
<a href="#infected_group">感染者系</a>
<a href="#joker_group">ジョーカー系</a>
<a href="#death_note_group">デスノート系</a>
<a href="#bad_status_group">悪戯系</a>
<a href="#copied_group">元神話マニア系</a>
<a href="#other_group">その他</a>
</p>

<h2 id="rule">基本ルール</h2>
<pre>
ランダム配布されるサブ役職は一人一つで、同一のサブ役職を持つ人は以下の例外のみです。
</pre>
<ol>
<li>メイン役職が付加するタイプ (例：<a href="#lovers">恋人</a>・<a href="#mind_read">サトラレ</a>)</li>
<li>専用ゲームオプション (例：<a href="../game_option.php#liar">狼少年村</a>・<a href="../game_option.php#gentleman">紳士・淑女村</a>)</li>
</ol>

<h2 id="chicken_group">小心者系 (処刑投票ショック死)</h2>
<p>
<a href="#chicken">小心者</a>
<a href="#rabbit">ウサギ</a>
<a href="#perverseness">天邪鬼</a>
<a href="#flattery">ゴマすり</a>
<a href="#celibacy">独身貴族</a>
<a href="#nervy">自信家</a>
<a href="#androphobia">男性恐怖症</a>
<a href="#gynophobia">女性恐怖症</a>
<a href="#impatience">短気</a>
</p>
<p>
<a href="#febris">熱病</a>
<a href="#frostbite">凍傷</a>
<a href="#death_warrant">死の宣告</a>
<a href="#panelist">解答者</a>
</p>

<h3 id="chicken">小心者 [Ver. 1.4.0 α3-7～]</h3>
<pre>
処刑投票時に一票でも貰うとショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#ghost_common">亡霊嬢</a>・<a href="#rabbit">ウサギ</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
大人数で実施できるようにしつつ進行を加速するために実装したシステムです。
</pre>

<h3 id="rabbit">ウサギ [Ver. 1.4.0 α3-7～]</h3>
<pre>
処刑投票時に一票も貰えないとショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#chicken">小心者</a>・<a href="#frostbite">凍傷</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#chicken">小心者</a>の逆バージョンです。
処刑先が確定してる展開になるほど死亡率が上がる、難儀な役職ですね。
</pre>

<h3 id="perverseness">天邪鬼 [Ver. 1.4.0 α3-7～]</h3>
<pre>
処刑投票時に他の人と投票先が重なるとショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#flattery">ゴマすり</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさん達に提供してもらったアイディアが原型です。
誰も投票しない場所を読み続けるのは非常に難しいと思います。
</pre>

<h3 id="flattery">ゴマすり [Ver. 1.4.0 α15～]</h3>
<pre>
処刑投票時に投票先が誰とも重なっていないとショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#perverseness">天邪鬼</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#perverseness">天邪鬼</a>の逆バージョンです。
アイディアは同時に提案されていますが名称決定の関係で実装時期が遅れています。
</pre>

<h3 id="celibacy">独身貴族 [Ver. 1.4.0 α22～]</h3>
<pre>
処刑投票時に<a href="#lovers">恋人</a>から一票でも貰うとショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="lovers.php#cursed_angel">堕天使</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#jealousy_group">橋姫系</a>同様、対<a href="#lovers">恋人</a>用役職ですが、こちらは小心者系という事もあって
より理不尽な仕様となっています。
</pre>

<h3 id="nervy">自信家 [Ver. 1.4.0 β9～]</h3>
<pre>
処刑投票時に同一陣営の人に投票するとショック死する。
<a href="#lovers">恋人</a>の場合は恋人陣営と判定される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
翠星石鯖＠やる夫人狼のとある村の RP がモデルです。
</pre>

<h3 id="androphobia">男性恐怖症 [Ver. 1.4.0 β14～]</h3>
<pre>
処刑投票時に男性に投票するとショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#gynophobia">女性恐怖症</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
やる夫人狼のプレイヤーさんとの雑談から生まれた役職です。
</pre>

<h3 id="gynophobia">女性恐怖症 [Ver. 1.4.0 β14～]</h3>
<pre>
処刑投票時に女性に投票するとショック死する。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#androphobia">男性恐怖症</a>の女性バージョンです。
</pre>

<h3 id="impatience">短気 [Ver. 1.4.0 α15～]</h3>
<pre>
<a href="#decide">決定者</a>と同等の能力がある代わりに再投票になるとショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#eclipse_medium">蝕巫女</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
自覚のある<a href="#decide">決定者</a>で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/80" target="_top">新役職考案スレ(80)</a> が原型です。
その分だけ<a href="../spec.php#vote_day">判定</a>の優先度が決定者より低めになっています。
</pre>

<h3 id="febris">熱病 [Ver. 1.4.0 β9～]</h3>
<h4>[役職表示] 発動日限定</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
表示された日の処刑投票集計後 (再投票になっても発動) にショック死する。
発動条件を満たした日の昼に突然表示されて、効果は一日で消える。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#miasma_jealousy">蛇姫</a>・<a href="human.php#brownie">座敷童子</a>・<a href="wolf.php#miasma_mad">土蜘蛛</a>・<a href="fox.php#miasma_fox">蟲狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
妖怪「土蜘蛛」の伝説がモチーフです。
</pre>

<h3 id="frostbite">凍傷 [Ver. 1.4.0 β16～]</h3>
<h4>[役職表示] 発動日限定</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
表示された日限定の<a href="#rabbit">ウサギ</a>相当。
発動条件を満たした日の昼に突然表示されて、効果は一日で消える。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#harvest_brownie">豊穣神</a>・<a href="human.php#maple_brownie">紅葉神</a>・<a href="wolf.php#snow_trap_mad">雪女</a>・<a href="lovers.php#snow_cupid">寒戸婆</a>・<a href="chiroptera.php#ice_fairy">氷妖精</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/736" target="_top">新役職考案スレ(736)</a> が原型です。
</pre>

<h3 id="death_warrant">死の宣告 [Ver. 1.4.0 β10～]</h3>
<h4>[役職表示] 発動日前限定</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
予告された日の処刑投票集計後 (再投票になっても発動) にショック死する。
付加された直後から、発動日がいつか表示される。
複数付加された場合は、一番遅い日が適用される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#doom">死の宣告能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/149" target="_top">新役職考案スレ(149)</a> が原型です。
</pre>

<h3 id="panelist">解答者 [Ver. 1.4.0 α17～]</h3>
<h4>[配役制限] クイズ村・役職付加専用</h4>
<pre>
投票数が 0 になり、<a href="quiz.php#quiz">出題者</a>に投票したらショック死する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ogre.php#poison_ogre">榊鬼</a>・<a href="#watcher">傍観者</a>・<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/229" target="_top">新役職考案スレ(229)</a> が原型です。
</pre>


<h2 id="liar_group">狼少年系 (発言変換)</h2>
<p>
<a href="#liar">狼少年</a>
<a href="#actor">役者</a>
<a href="#passion">恋色迷彩</a>
<a href="#rainbow">虹色迷彩</a>
<a href="#weekly">七曜迷彩</a>
<a href="#grassy">草原迷彩</a>
<a href="#invisible">光学迷彩</a>
<a href="#side_reverse">鏡面迷彩</a>
<a href="#line_reverse">天地迷彩</a>
</p>
<p>
<a href="#gentleman">紳士</a>
<a href="#lady">淑女</a>
<a href="#cute_camouflage">魔が言</a>
</p>

<h3 id="liar">狼少年 [Ver. 1.4.0 α11～]</h3>
<pre>
発言時に一部のキーワードが入れ替えられてしまう。
たまに変換されないことがある (発動率は管理者設定)。
例：人⇔狼、白⇔黒、○⇔●
</pre>
<h5>Ver. 1.4.0 α14～</h5>
<pre>
変換対象キーワードを追加。
発動率を管理者設定で変更できる仕様に変更。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
流石兄弟鯖＠やる夫人狼の管理人さんとの会話から生まれた役職です。
占い師がそれと知らずに CO すると大変なことになりそうです。
回避するのは簡単ですがそれを意識しないといけないだけでも
結構な負担ではないでしょうか？
</pre>

<h3 id="actor">役者 [Ver. 1.4.0 β14～]</h3>
<pre>
発言時に一部のキーワードが入れ替えられてしまう。
初期設定は「です」→「みょん」のみ。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#liar">狼少年</a>のカスタムバージョンです。
各サーバで自由に編集してもらうことを前提に設計しています。
</pre>

<h3 id="passion">恋色迷彩 [Ver. 1.4.0 β17～]</h3>
<pre>
発言時に一部のキーワードが恋人っぽい言葉に入れ替えられてしまう。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#divorce_jealousy">縁切地蔵</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#liar">狼少年</a>の恋人バージョンで、Twitter 上の雑談から生まれた役職です。
</pre>

<h3 id="rainbow">虹色迷彩 [Ver. 1.4.0 α17～]</h3>
<pre>
発言に虹の色が含まれていたら虹の順番に合わせて入れ替えられてしまう。
(例：赤→橙、橙→黄、黄→緑)
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#liar">狼少年</a>の循環変換バージョンで、やる夫人狼の薔薇 GM さんのアイディアが原型です。
あまり影響は無いでしょうが、ひとたびハマると対応は非常に面倒だと思われます。
</pre>

<h3 id="weekly">七曜迷彩 [Ver. 1.4.0 α19～]</h3>
<pre>
発言に曜日が含まれていたら曜日の順番に合わせて入れ替えられてしまう。
(例：日→月、月→火、火→水)
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#rainbow">虹色迷彩</a>の曜日バージョンです。
比較的引っ掛かりやすいでしょうが、対応も簡単ですね。
</pre>

<h3 id="grassy">草原迷彩 [Ver. 1.4.0 α23～]</h3>
<pre>
発言の一文字毎に「w」が付加される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="chiroptera.php#grass_fairy">草妖精</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
いわゆる Vipper の再現です。
機械的につけるので占い師などにこれがつくとかなり悲惨な事になると思われます。
</pre>

<h3 id="invisible">光学迷彩 [Ver. 1.4.0 α14～]</h3>
<pre>
発言の一定割合が空白に入れ替えられてしまう。
入れ替えられる場所はランダム。
</pre>
<h5>Ver. 1.5.0 α6～</h5>
<pre>
一定確率で消える→一定割合が確定で消える
</pre>
<h5>Ver. 1.4.0 α17～</h5>
<pre>
変換率を落とした代わりに文字数が増えると変換率がアップする。
一定文字数を超えると完全に消える。
</pre>
<h4>関連役職</h4>
<pre>
<a href="chiroptera.php#sun_fairy">日妖精</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんから提供してもらったアイディアが原型です。
変換される割合は設定ファイルで変更できます。
</pre>

<h3 id="side_reverse">鏡面迷彩 [Ver. 1.4.0 α23～]</h3>
<pre>
発言の文字の並びが一行単位で逆になる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
例えば「鏡面迷彩」→「彩迷面鏡」と変換されます。
理論的には回文で発言すれば影響が出ない事になります。
</pre>

<h3 id="line_reverse">天地迷彩 [Ver. 1.4.0 α23～]</h3>
<pre>
発言の行の並びの上下が入れ替わる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
常に一行で発言をしている場合は影響が出ませんし
対応しようと思えば簡単なので<a href="#side_reverse">鏡面迷彩</a>ほどは苦労しないと思われます。
</pre>

<h3 id="gentleman">紳士 [Ver. 1.4.0 α14～]</h3>
<pre>
時々発言が「紳士」な言葉に入れ替えられてしまう。
(発言内容は設定ファイルで変更可能)
ユーザ名の選択法則は「生存者からランダム」。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんの RP が原型です。
発言内容が完全に入れ替わるので<a href="#liar">狼少年</a>より酷いです。
どんな言葉に入れ替わるのかは管理人さんの気紛れ次第。
</pre>

<h3 id="lady">淑女 [Ver. 1.4.0 α14～]</h3>
<pre>
時々発言が「淑女」な言葉に入れ替えられてしまう。
仕様は<a href="#gentleman">紳士</a>と同じ。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#gentleman">紳士</a>の女性バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/135" target="_top">新役職考案スレ(135)</a> が原型です。
</pre>

<h3 id="cute_camouflage">魔が言 [Ver. 1.5.0 β14～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
昼の間だけ、高確率 (10%) で発言が人狼の遠吠えに入れ替わってしまう (<a href="wolf.php#cute_wolf">萌狼</a>と同じ)。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#cute_wolf">萌狼</a>のサブ役職バージョンです。
</pre>


<h2 id="decide_group">決定者系 (処刑者候補変化)</h2>
<p>
<a href="#decide">決定者</a>
<a href="#plague">疫病神</a>
<a href="#counter_decide">燕返し</a>
<a href="#dropout">脱落者</a>
<a href="#good_luck">幸運</a>
<a href="#bad_luck">不運</a>
</p>

<h3 id="decide">決定者</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
自分の投票先が最多得票者で処刑者候補が複数いた場合、優先的に処刑される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#impatience">短気</a>・<a href="#plague">疫病神</a>
</pre>

<h3 id="plague">疫病神 [Ver. 1.4.0 α9～]</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
自分の投票先が最多得票者で処刑者候補が複数いた場合、候補から除外される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#decide">決定者</a>・<a href="#good_luck">幸運</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#decide">決定者</a>の逆バージョンで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/8" target="_top">新役職考案スレ(8)</a> が原型です。
</pre>

<h3 id="counter_decide">燕返し [Ver. 1.5.0 β3～]</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
自分と投票先が最多得票者だった場合、投票先が優先的に処刑される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#dropout">脱落者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
決選投票向けの決定能力です。
相互投票を想定してはいますが、それは必要条件ではありません。
</pre>

<h3 id="dropout">脱落者 [Ver. 1.5.0 β3～]</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
自分と投票先が最多得票者だった場合、自分が優先的に処刑される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#counter_decide">燕返し</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#counter_decide">燕返し</a>の逆バージョンです。
</pre>

<h3 id="good_luck">幸運 [Ver. 1.4.0 α14～]</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
自分が最多得票者で処刑者候補が複数いた場合、候補から除外される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#plague">疫病神</a>・<a href="#bad_luck">不運</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
本人に付随する決定能力です。
東方ウミガメ人狼のプレイヤーさんから提供してもらったアイディアが原型です。
</pre>

<h3 id="bad_luck">不運 [Ver. 1.4.0 α14～]</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
自分が最多得票者で処刑者候補が複数いた場合、優先的に処刑される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#decide">決定者</a>・<a href="#good_luck">幸運</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#good_luck">幸運</a>の逆バージョンです。
</pre>


<h2 id="authority_group">権力者系 (処刑投票数変化)</h2>
<p>
<a href="#authority">権力者</a>
<a href="#reduce_voter">無精者</a>
<a href="#upper_voter">わらしべ長者</a>
<a href="#downer_voter">没落者</a>
<a href="#critical_voter">会心</a>
<a href="#rebel">反逆者</a>
<a href="#random_voter">気分屋</a>
<a href="#watcher">傍観者</a>
</p>
<p>
<a href="#day_voter">一日村長</a>
<a href="#wirepuller_luck">入道</a>
</p>

<h3 id="authority">権力者</h3>
<pre>
処刑投票数が +1 される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#authority">投票数変化能力者</a>
</pre>

<h3 id="reduce_voter">無精者 [Ver. 1.5.0 β3～]</h3>
<pre>
処刑投票数が -1 される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="duelist.php#cowboy_duelist">無鉄砲者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#authority">権力者</a>の逆バージョンです。
<a href="human.php#elder">長老</a>などにこれがつくと能力が相殺されることになります。
</pre>

<h3 id="upper_voter">わらしべ長者 [Ver. 1.5.0 β3～]</h3>
<pre>
5日目以降、処刑投票数が +1 される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#scripter">執筆者</a>の能力をサブ役職に転化してみました。
</pre>

<h3 id="downer_voter">没落者 [Ver. 1.5.0 β3～]</h3>
<pre>
5日目以降、処刑投票数が -1 される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#upper_voter">わらしべ長者</a>の逆バージョンです。
</pre>

<h3 id="critical_voter">会心 [Ver. 1.4.0 β14～]</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
5% の確率で処刑投票数が +100 される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#harvest_brownie">豊穣神</a>・<a href="duelist.php#critical_duelist">剣闘士</a>・<a href="#critical_luck">痛恨</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
RPG でよくある「クリティカルヒット」を再現してみました。
</pre>

<h3 id="rebel">反逆者 [Ver. 1.4.0 α14～]</h3>
<pre>
<a href="#authority">権力者</a>と同じ人に処刑投票した場合に自分の投票数が -1、権力者の投票数が -2 になる。
それ以外のケースなら通常通り (1票)。
</pre>
<h5>Ver. 1.5.0 α5～</h5>
<pre>
<a href="#critical_voter">会心</a>などと重なった時に矛盾しないために説明の表現を変更
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんが実際にやってしまった失敗をヒントに
対権力者を作成してみました。
</pre>

<h3 id="random_voter">気分屋 [Ver. 1.4.0 α14～]</h3>
<pre>
投票するたびに処刑投票数が -1～+1 の範囲でランダムに補正される。
</pre>
<h5>Ver. 1.4.0 β7～</h5>
<pre>
<a href="human.php#elder">長老</a>系と矛盾しないために説明の表現を変更。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#random_luck">波乱万丈</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/80" target="_top">新役職考案スレ(80)</a> が原型です。
</pre>

<h3 id="watcher">傍観者 [Ver. 1.4.0 α9～]</h3>
<pre>
処刑投票数が 0 になる (投票行為自体は必要)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#panelist">解答者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/8" target="_top">新役職考案スレ(8)</a> が原型です。
</pre>

<h3 id="day_voter">一日村長 [Ver. 1.5.0 β4～]</h3>
<h4>[役職表示] 発動日限定</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
表示された日の限定の<a href="#authority">権力者</a>。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#divine_escaper">麒麟</a>・<a href="ability.php#authority">投票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#febris">熱病</a>の権力者バージョンです。
</pre>

<h3 id="wirepuller_luck">入道 [Ver. 1.5.0 α5～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
付加させた人が一人でも生存している間は投票数が +2 されるが
全員死亡すると得票数が +3 される。
付加させた人が複数いても補正される値は同じ。
<a href="../chaos.php#secret_sub_role">サブ役職非公開</a>設定でも必ず表示される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#wirepuller_mania">黒衣</a>・<a href="ability.php#authority">投票数変化能力者</a>・<a href="ability.php#luck">得票数変化能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方 Project の雲山がモチーフで、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/318" target="_top">新役職考案スレ(318)</a> が原型です。
</pre>


<h2 id="upper_luck_group">雑草魂系 (処刑得票数変化)</h2>
<p>
<a href="#upper_luck_rule">基本ルール</a>
</p>
<p>
<a href="#upper_luck">雑草魂</a>
<a href="#downer_luck">一発屋</a>
<a href="#star">人気者</a>
<a href="#disfavor">不人気</a>
<a href="#critical_luck">痛恨</a>
<a href="#random_luck">波乱万丈</a>
<a href="#occupied_luck">ひんな持ち</a>
</p>

<h3 id="upper_luck_rule">基本ルール [雑草魂系]</h3>
<ol>
<li><a href="#chicken_group">小心者系</a>のショック死判定には影響しない (投票「人数」で判定される)。</li>
<li>得票数が減る場合でもマイナスにはならない。<br>
  例) 得票が 1 で -2 された場合 → 得票数は 0 と計算される。
</li>
</ol>

<h3 id="upper_luck">雑草魂 [Ver. 1.4.0 α14～]</h3>
<pre>
2 日目の処刑得票数が +4 される代わりに、3 日目以降は -2 される。
</pre>
<h5>Ver. 1.4.0 α14～</h5>
<pre>
2 日目の補正値を +2 から +4 に変更。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
東方ウミガメ人狼のプレイヤーさんがモデルです。
</pre>

<h3 id="downer_luck">一発屋 [Ver. 1.4.0 α14～]</h3>
<pre>
2 日目の処刑得票数が -4 される代わりに、3日目以降は +2 される。
</pre>
<h5>Ver. 1.4.0 α14～</h5>
<pre>
2 日目の補正値を -2 から -4 に変更。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#upper_luck">雑草魂</a>の逆バージョンです。
</pre>

<h3 id="star">人気者 [Ver. 1.4.0 α14～]</h3>
<pre>
処刑得票数が -1 される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/game/48159/1243197597/64" target="_top">新役職提案スレッド＠やる夫(64)</a> が原型です。
</pre>

<h3 id="disfavor">不人気 [Ver. 1.4.0 α14～]</h3>
<pre>
処刑得票数が +1 される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#star">人気者</a>の逆バージョンです。
</pre>

<h3 id="critical_luck">痛恨 [Ver. 1.4.0 β14～]</h3>
<h4>[役職表示] 表示無し</h4>
<pre>
5% の確率で処刑得票数が +100 される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#critical_jealousy">人魚</a>・<a href="human.php#maple_brownie">紅葉神</a>・<a href="wolf.php#critical_mad">釣瓶落とし</a>・<a href="fox.php#critical_fox">寿羊狐</a>・<a href="duelist.php#critical_avenger">狂骨</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#critical_voter">会心</a>の処刑得票数変化バージョンです。
</pre>

<h3 id="random_luck">波乱万丈 [Ver. 1.4.0 α15～]</h3>
<pre>
処刑得票数が -2～+2 の範囲でランダムに補正される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#random_voter">気分屋</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#random_voice">臆病者</a>の処刑得票数変化バージョンです。
波乱万丈らしくするために、変動の程度には補正をかけていません。
</pre>

<h3 id="occupied_luck">ひんな持ち [Ver. 1.5.0 β6～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
処刑得票数が付加させた人が一人でも生存している間は +1、
全員死亡すると +3 される。
付加させた人が複数いても補正される値は同じ。
<a href="../chaos.php#secret_sub_role">サブ役職非公開</a>設定でも必ず表示される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="duelist.php#critical_patron">ひんな神</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#wirepuller_luck">入道</a>の劣化バージョンで<a href="duelist.php#critical_patron">ひんな神</a>用に実装されたサブ役職です。
</pre>


<h2 id="strong_voice_group">大声系 (声量変化)</h2>
<p>
<a href="#strong_voice">大声</a>
<a href="#normal_voice">不器用</a>
<a href="#weak_voice">小声</a>
<a href="#inside_voice">内弁慶</a>
<a href="#outside_voice">外弁慶</a>
<a href="#upper_voice">メガホン</a>
<a href="#downer_voice">マスク</a>
<a href="#random_voice">臆病者</a>
</p>

<h3 id="strong_voice">大声 [Ver. 1.4.0 α3-7～]</h3>
<pre>
発言が常に大声になる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
声の大きさも狼を推理するヒントになります。
ただのネタと思うこと無かれ。
</pre>

<h3 id="normal_voice">不器用 [Ver. 1.4.0 α3-7～]</h3>
<pre>
発言の大きさを変えられない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#strong_voice">大声</a>の発言固定バージョンです。
</pre>

<h3 id="weak_voice">小声 [Ver. 1.4.0 α3-7～]</h3>
<pre>
発言が常に小声になる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#strong_voice">大声</a>の小声固定バージョンです。
</pre>

<h3 id="inside_voice">内弁慶 [Ver. 1.4.0 α23～]</h3>
<pre>
昼は<a href="#weak_voice">小声</a>・夜は<a href="#strong_voice">大声</a>になる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
LW が<a href="#strong_voice">大声</a>・<a href="#strong_voice">小声</a>だと圧倒的に不利だと思ったので捻ってみました。
</pre>

<h3 id="outside_voice">外弁慶 [Ver. 1.4.0 α23～]</h3>
<pre>
昼は<a href="#strong_voice">大声</a>・夜は<a href="#weak_voice">小声</a>になる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#inside_voice">内弁慶</a>の逆バージョンです。
</pre>

<h3 id="upper_voice">メガホン [Ver. 1.4.0 α17～]</h3>
<pre>
発言が一段階大きくなり、大声は音割れして聞き取れなくなる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#speaker">スピーカー</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#strong_voice">大声</a>の上方シフトバージョンです。
</pre>

<h3 id="downer_voice">マスク [Ver. 1.4.0 α17～]</h3>
<pre>
発言が一段階小さくなり、小声は聞き取れなくなる。
小声は共有者の囁きに入れ替わる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#earplug">耳栓</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#upper_voice">メガホン</a>の逆バージョンです。
</pre>

<h3 id="random_voice">臆病者 [Ver. 1.4.0 α14～]</h3>
<pre>
声の大きさがランダムに変わる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
固定があるならランダムもありだろうと思って作ってみました。
唐突に大声になるのは固定より鬱陶しいかも。
</pre>


<h2 id="no_last_words_group">筆不精系 (発言封印)</h2>
<p>
<a href="#no_last_words">筆不精</a>
<a href="#blinder">目隠し</a>
<a href="#earplug">耳栓</a>
<a href="#speaker">スピーカー</a>
<a href="#whisper_ringing">囁耳鳴</a>
<a href="#howl_ringing">吠耳鳴</a>
<a href="#sweet_ringing">恋耳鳴</a>
<a href="#deep_sleep">爆睡者</a>
<a href="#silent">無口</a>
<a href="#mower">草刈り</a>
</p>

<h3 id="no_last_words">筆不精 [Ver. 1.4.0 α9～]</h3>
<pre>
遺言を残せない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#last_words_limit">遺言制限能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/8" target="_top">新役職考案スレ(8)</a> が原型です。
「遺言残せばいいや」と思って潜伏する役職にプレッシャーがかかります。
また、安直な遺言騙りもできなくなります。
昼の発言がより盛り上がるといいな、と思って作ってみました。
</pre>

<h3 id="blinder">目隠し [Ver. 1.4.0 α14～]</h3>
<pre>
発言者の名前が見えない (空白になる)。
</pre>
<h5>Ver. 1.4.0 α16～</h5>
<pre>
名前の先頭に付いてる◆の色は変化しません。
ユーザアイコンを見ればある程度推測できます。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#blind_guard">夜雀</a>・<a href="human.php#sun_brownie">八咫烏</a>・<a href="chiroptera.php#dark_fairy">闇妖精</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/66" target="_top">新役職考案スレ(66)</a> が原型です。
</pre>

<h3 id="earplug">耳栓 [Ver. 1.4.0 α14～]</h3>
<pre>
発言が一段階小さく見えるようになり、小声が聞き取れなくなる。
小声は共有者の囁きに入れ替わる。
</pre>
<h5>Ver. 1.4.0 α17～</h5>
<pre>
小声は空白ではなく、共有者の囁きに入れ替わる。
</pre>
<h5>Ver. 1.4.0 α16～</h5>
<pre>
小声が聞こえないだけではなく、大声→普通、普通→小声になる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="chiroptera.php#moon_fairy">月妖精</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
ニコ生人狼のプレイヤーさん提供してもらったアイディアが原型です。
聞こえないなら取れ？ネタにマジレスしてはいけません。
</pre>

<h3 id="speaker">スピーカー [Ver. 1.4.0 α17～]</h3>
<pre>
発言が一段階大きく見えるようになり、<a href="#strong_voice">大声</a>が音割れして聞き取れなくなる。
大声は<a href="#upper_voice">メガホン</a>の大声と同じ。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#earplug">耳栓</a>の逆バージョンです。
</pre>

<h3 id="whisper_ringing">囁耳鳴 [Ver. 1.4.0 β14～]</h3>
<pre>
他人の独り言が共有者の囁きに見えるようになる。
<a href="human.php#common_group">共有の囁き</a>・<a href="wolf.php#howl">人狼の遠吠え</a>・<a href="fox.php#talk">妖狐の念話</a>は「独り言」ではないので影響しない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#wise_wolf">賢狼</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#howl_ringing">吠耳鳴</a>の共有者の囁きバージョンです。
</pre>

<h3 id="howl_ringing">吠耳鳴 [Ver. 1.4.0 β14～]</h3>
<pre>
他人の独り言が人狼の遠吠えに見えるようになる。
<a href="human.php#common_group">共有の囁き</a>・<a href="wolf.php#howl">人狼の遠吠え</a>・<a href="fox.php#talk">妖狐の念話</a>は「独り言」ではないので影響しない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
遠吠えの数で狼の人数を推測するケースがあるのでそれの妨害を狙ってみました。
</pre>

<h3 id="sweet_ringing">恋耳鳴 [Ver. 1.4.0 β22～]</h3>
<pre>
二日目以降、恋人の独り言が専用の囁き声に見えるようになる。
<a href="human.php#common_group">共有の囁き</a>・<a href="wolf.php#howl">人狼の遠吠え</a>・<a href="fox.php#talk">妖狐の念話</a>は「独り言」ではないので影響しない。
<a href="human.php#dummy_common">夢共有者</a>や<a href="human.php#mind_scanner">さとり</a>が元々見えない発言は見えない。
<a href="wolf.php#wise_wolf">賢狼</a>の能力にも変化はない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="lovers.php#sweet_cupid">弁財天</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#howl_ringing">吠耳鳴</a>の対恋人バージョンです。
</pre>

<h3 id="deep_sleep">爆睡者 [Ver. 1.4.0 β14～]</h3>
<pre>
<a href="human.php#common_group">共有の囁き</a>・<a href="wolf.php#howl">人狼の遠吠え</a>が一切見えなくなる。
他の耳鳴系と重複していても表示されない。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#mind_scanner">さとり</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#howl_ringing">吠耳鳴</a>の逆アプローチです。
</pre>

<h3 id="silent">無口 [Ver. 1.4.0 α14～]</h3>
<pre>
発言の文字数に制限がかかり、制限を越えるとそれ以降が「……」になる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/51" target="_top">新役職考案スレ(51)</a> が原型です。
よほど長い名前の人でもない限り、最低限の占い師のCO等には
影響が出ない程度にしてあります。
</pre>

<h3 id="mower">草刈り [Ver. 1.4.0 α23～]</h3>
<pre>
発言から「w」が削られる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
いわゆる「(w」に当たるかどうかの判定をしていないので
場合によっては名前を呼ぶ事ができない可能性もあります。
とっても理不尽ですね。
</pre>

<h2 id="mind_read_group">サトラレ系 (夜発言公開)</h2>
<p>
<a href="#mind_read_rule">基本ルール</a>
</p>
<p>
<a href="#mind_read">サトラレ</a>
<a href="#mind_open">公開者</a>
<a href="#mind_receiver">受信者</a>
<a href="#mind_friend">共鳴者</a>
<a href="#mind_sympathy">共感者</a>
<a href="#mind_evoke">口寄せ</a>
<a href="#mind_presage">受託者</a>
<a href="#mind_lonely">はぐれ者</a>
<a href="#mind_sheep">羊</a>
</p>

<h3 id="mind_read_rule">基本ルール [サトラレ系]</h3>
<ol>
<li><a href="../chaos.php#secret_sub_role">サブ役職非公開</a>設定でも必ず表示される。</li>
<li>死者の発言を直接見ることはできない。</li>
<li>効力を失っても役職表示は消えない。</li>
</ol>

<h3 id="mind_read">サトラレ [Ver. 1.4.0 α21～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
夜の発言が<a href="human.php#mind_scanner">さとり</a>に見られてしまう。
</pre>
<ol>
<li>2 日目の朝から表示されて、その夜以降から効力が適用される。</li>
<li>夜の発言に常時「～の独り言」が付く。</li>
<li>誰に見られているのかは分からない。</li>
<li>死亡した<a href="human.php#mind_scanner">さとり</a>は自分の<a href="#mind_read">サトラレ</a>の発言を見ることができなくなる。</li>
<li>自分が<a href="human.php#unconscious">無意識</a>の場合は無効化される。</li>
</ol>
<h5>Ver. 1.4.0 β7～</h5>
<pre>
夜の発言に常時「～の独り言」が付く。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#mind_scanner">さとり</a>・<a href="human.php#dummy_scanner">幻視者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/4" target="_top">新役職考案スレ(4)</a> が原型です。
夜に相談できる人外にこれが付くとかなり大変になると思われます。
</pre>

<h3 id="mind_open">公開者 [Ver. 1.4.0 α22～]</h3>
<pre>
夜の発言が参加者全員に見られてしまう。
</pre>
<ol>
<li>初日の夜から表示されるが、効力が適用されるのは 2 日目の夜以降。</li>
<li>夜の発言に常時「～の独り言」が付く。</li>
</ol>
<h5>Ver. 1.4.0 β7～</h5>
<pre>
初日の夜の発言は見えない。
夜の発言に常時「～の独り言」が付く。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#leader_common">指導者</a>・<a href="human.php#sun_brownie">八咫烏</a>・<a href="chiroptera.php#light_fairy">光妖精</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="#mind_read">サトラレ</a>をパワーアップしてみました。
夜に相談できる役職の人には大迷惑ですね。
くれぐれもうっかり自分の役職をつぶやかないように注意してください。
</pre>

<h3 id="mind_receiver">受信者 [Ver. 1.4.0 α22～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
特定の人の夜の発言を見ることができる。
</pre>
<ol>
<li>2 日目の朝から表示されて、その夜以降から効力が適用される。</li>
<li>誰の発言を見ているのか分かる。</li>
</ol>
</pre>
<h4>関連役職</h4>
<pre>
<a href="lovers.php#self_cupid">求愛者</a>・<a href="lovers.php#moon_cupid">かぐや姫</a>・<a href="lovers.php#mind_cupid">女神</a>・<a href="duelist.php#duelist">決闘者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#mind_scanner">さとり</a> - <a href="#mind_read">サトラレ</a>の逆バージョンです。
<a href="human.php#common_group">共有者</a>などの会話に混ざって表示されるのでうっかり
返事をしないように気をつけましょう。
</pre>

<h3 id="mind_friend">共鳴者 [Ver. 1.4.0 α23～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
特定の人と夜に会話できるようになる。
会話できる相手は味方 (同一陣営) (例外は「恋人 - 非恋人」の組み合わせ)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#emerald_wolf">翠狼</a>・<a href="fox.php#emerald_fox">翠狐</a>・<a href="lovers.php#mind_cupid">女神</a>・<a href="lovers.php#sweet_cupid">弁財天</a>・<a href="mania.php#unknown_mania_group">鵺系</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
互いに認識できる<a href="#mind_receiver">受信者</a>です。
共有者が<a href="mania.php#unknown_mania">鵺</a>と<a href="lovers.php#mind_cupid">女神</a>に同時に矢を撃たれた場合は、誰が誰の発言が
見えるのか、非常にややこしい状況になりますね。
</pre>

<h3 id="mind_sympathy">共感者 [Ver. 1.4.0 β8～]</h3>
<h4>[役職表示] 2 日目限定</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
お互いの役職を知ることができる。
役職表示が出るのは 2 日目のみ。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#widow_priest">未亡人</a>・<a href="lovers.php#angel_group">天使系</a>・<a href="#possessed_exchange">交換憑依</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他の国に実在するサブ役職です。
配置次第では<a href="#mind_friend">共鳴者</a>以上の効果を得ることが出来るでしょう。
</pre>

<h3 id="mind_evoke">口寄せ [Ver. 1.4.0 β2～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
死後に<a href="human.php#evoke_scanner">イタコ</a>の遺言窓にメッセージを送ることができる。
</pre>
<ol>
<li>生きている時から表示される (死んでも表示される)。</li>
<li>生きている間は通常通り自分の遺言窓が更新される。</li>
<li>死んでから「遺言を残す」で発言すると<a href="human.php#evoke_scanner">イタコ</a>の遺言窓が更新される。</li>
<li><a href="human.php#reporter">ブン屋</a>・<a href="#no_last_words">筆不精</a>など、生きている間は遺言を残せない役職でも有効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="human.php#evoke_scanner">イタコ</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
霊界から一方的にメッセージを送ることができます。
当然ですが、霊界オフモードにしないと機能しません。
</pre>

<h3 id="mind_presage">受託者 [Ver. 1.4.0 β18～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
付加した<a href="human.php#presage_scanner">件</a>が人狼に襲撃されて死亡したら誰に襲撃されたかメッセージが表示される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#reporter">ブン屋</a>・<a href="human.php#presage_scanner">件</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
テーマは「ダイイング・メッセージを受け取る人」です。
</pre>

<h3 id="mind_lonely">はぐれ者 [Ver. 1.4.0 β8～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
仲間が分からなくなり、会話できなくなる。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#blue_wolf">蒼狼</a>・<a href="fox.php#blue_fox">蒼狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
人外同士の情報戦を多様化させる事が狙いです。
分かっていても堂々と告発できないジレンマにどう対処するのかがポイントです。
</pre>

<h3 id="mind_sheep">羊 [Ver. 1.5.0 β5～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<h4>[耐性] 人狼襲撃：羊皮</h4>
<pre>
付加した<a href="duelist.php#shepherd_patron">羊飼い</a>が誰か分かる。
<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) 以外の人狼に襲撃されたら<a href="#sheep_wisp">羊皮</a>を付加する。
</pre>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="duelist.php#shepherd_patron">羊飼い</a>用に実装されたサブ役職です。
</pre>


<h2 id="wisp_group">鬼火系 (占い妨害)</h2>
<p><a href="#wisp_rule">基本ルール</a></p>
<p>
<a href="#wisp">鬼火</a>
<a href="#black_wisp">天火</a>
<a href="#spell_wisp">狐火</a>
<a href="#foughten_wisp">古戦場火</a>
<a href="#gold_wisp">松明丸</a>
<a href="#sheep_wisp">羊皮</a>
</p>

<h3 id="wisp_rule">基本ルール [鬼火系]</h3>
<ol>
<li><a href="../chaos.php#secret_sub_role">サブ役職非公開</a>設定でも必ず表示される。</li>
<li>占いが成立した時のみ有効 (<a href="ability.php#phantom">占い妨害</a>・<a href="ability.php#cursed">呪い</a>の判定が優先される)。</li>
<li><a href="human.php#soul_mage">魂の占い師</a>には無効。</li>
<li><a href="human.php#dummy_mage">夢見人</a>は「村人・人狼」の結果が反転される。</li>
<li>複数重なった場合の優先順位は<a href="../spec.php#vote_night">判定</a>の項目参照。</li>
</ol>

<h3 id="wisp">鬼火 [Ver. 1.5.0 β7～]</h3>
<pre>
<a href="human.php#mage">占い師</a>に占われると「鬼」判定が出る。
</pre>
<h4>関連役職</h4>
<pre>
<a href="mania.php#fire_mania">青行灯</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
能力の観点から<a href="ogre.php">鬼陣営</a>を乗っ取ることは難しいので
占い結果が実質「正体不明」になることが主眼となります。
</pre>

<h3 id="black_wisp">天火 [Ver. 1.5.0 β7～]</h3>
<pre>
<a href="human.php#mage">占い師</a>に占われると「人狼」判定が出る。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#fire_wolf">火狼</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
呪殺される妖狐にこれがつくと複雑な状況になります。
</pre>

<h3 id="spell_wisp">狐火 [Ver. 1.5.0 β7～]</h3>
<pre>
<a href="human.php#mage">占い師</a>に占われると呪殺される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="fox.php#spell_fox">宙狐</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="ability.php#last_words_limit">遺言</a>を残せない役職にこれがつくと悲劇を引き起こす可能性があります。
</pre>

<h3 id="foughten_wisp">古戦場火 [Ver. 1.5.0 β7～]</h3>
<pre>
<a href="human.php#mage">占い師</a>に占われると「蝙蝠」判定が出る。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
主に<a href="vampire.php">吸血鬼</a>扱いされることになりますが、比較的害は少ないので
占われるまで伏せて占い師の真贋を見極める手もあります。
</pre>

<h3 id="gold_wisp">松明丸 [Ver. 1.5.0 β7～]</h3>
<pre>
<a href="human.php#sex_mage">ひよこ鑑定士</a>に占われると「蝙蝠」判定が出る。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="chiroptera.php">蝙蝠</a>を乗っ取ることができるので比較的使い出がある能力かもしれません。
</pre>

<h3 id="sheep_wisp">羊皮 [Ver. 1.5.0 β4～]</h3>
<h4>[役職表示] 発動日限定</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
表示された日に<a href="human.php#mage">占い師</a>に占われると村人判定が出る。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#mind_sheep">羊</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
自覚があるので、遺言に残すことで村は対応できます。
どちらかというとそれを利用して占いを一日潰せることに価値があるのかもしれません。
</pre>


<h2 id="lovers_group">恋人系</h2>
<p>
<a href="#lovers">恋人</a>
<a href="#challenge_lovers">難題</a>
<a href="#possessed_exchange">交換憑依</a>
</p>

<h3 id="lovers">恋人 [Ver. 1.2.0～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
勝利条件が<a href="lovers.php">恋人陣営</a>に変化する。
表示されている相手が死亡すると自分も死亡する (後追い)。
</pre>
<h4>関連役職</h4>
<pre>
<a href="#sweet_status">悲恋</a>
</pre>

<h3 id="challenge_lovers">難題 [Ver. 1.4.0 β11～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<h4>[耐性] 人狼襲撃：無効 / 暗殺：反射</h4>
<pre>
4 日目夜までは以下の耐性を持つ。
</pre>
<ol>
<li><a href="wolf.php#wolf_group">人狼</a>の襲撃無効</li>
<li>毒・<a href="human.php#brownie">座敷童子</a>・<a href="human.php#cursed_brownie">祟神</a>・<a href="human.php#doom_doll">蓬莱人形</a>・<a href="wolf.php#follow_mad">舟幽霊</a>・<a href="fox.php#miasma_fox">蟲狐</a>の能力の対象外</li>
<li><a href="human.php#assassin_spec">暗殺反射</a></li>
<li><a href="wolf.php#miasma_mad">土蜘蛛</a>・<a href="wolf.php#critical_mad">釣瓶落とし</a>・<a href="duelist.php#cursed_avenger">がしゃどくろ</a>・<a href="duelist.php#critical_avenger">狂骨</a>の能力無効</li>
<li><a href="vampire.php#vampire_do">吸血死</a>無効</li>
</ol>
<pre>
5 日目以降は恋人の相方と同じ人に投票しないとショック死する。
複数の恋人がいる場合は誰か一人と同じならショック死しない。
</pre>
<h5>Ver. 1.4.0 β13～</h5>
<pre>
<a href="wolf.php#miasma_mad">土蜘蛛</a>の能力無効
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#detective_common">探偵</a>・<a href="wolf.php#sirius_wolf">天狼</a>・<a href="lovers.php#moon_cupid">かぐや姫</a>・<a href="ability.php#resist_wolf">人狼襲撃耐性能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
かぐや姫の不老不死の秘薬の伝説がモチーフです。
</pre>

<h3 id="possessed_exchange">交換憑依 [Ver. 1.4.0 β11～]</h3>
<h4>[役職表示] 2 日目限定</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
指定された相手と入れ替わる。
</pre>
<ol>
<li>憑依先の相手と完全に入れ替わり、実質他人にログインしているような状態になる。</li>
<li>2 日目に入れ替わる相手が誰か予告が表示されて、3 日目に入れ替えが実行される。</li>
<li><a href="#mind_sympathy">共感者</a>が付加されるので事前に相手の役職が分かる。</li>
<li>交換憑依が発生した二人は死亡しても<a href="ability.php#last_words_limit">遺言</a>が表示されない。</li>
<li>入れ替え前に遺言を残しておくと、入れ替わった後で相方にメッセージを残せる事になる。</li>
</ol>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
役職名の表示
</pre>
<h4>関連役職</h4>
<pre>
<a href="lovers.php#exchange_angel">魂移使</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="lovers.php#exchange_angel">魂移使</a>の処理用に実装されたサブ役職です。
</pre>


<h2 id="infected_group">感染者系</h2>
<p>
<a href="#infected">感染者</a>
<a href="#psycho_infected">洗脳者</a>
</p>

<h3 id="infected">感染者 [Ver. 1.4.0 β14～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
<a href="vampire.php">吸血鬼陣営</a>の人に襲撃された人に付加される。
</pre>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
役職名の表示
</pre>
<h4>関連役職</h4>
<pre>
<a href="#psycho_infected">洗脳者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="vampire.php">吸血鬼陣営</a>の勝敗判定用に実装されたサブ役職です。
</pre>

<h3 id="psycho_infected">洗脳者 [Ver. 1.4.0 β20～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
<a href="vampire.php">吸血鬼陣営</a>共通の<a href="#infected">感染者</a>扱い。
<a href="vampire.php">吸血鬼陣営</a>と<a href="ogre.php#sacrifice_ogre">酒呑童子</a>は村にいる洗脳者が誰か分かる。
<a href="ogre.php#sacrifice_ogre">酒呑童子</a>が<a href="wolf.php#wolf_group">人狼</a>に襲撃された場合は身代わりで死亡する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="vampire.php">吸血鬼陣営</a>支援能力者用に実装されたサブ役職です。
</pre>


<h2 id="joker_group">ジョーカー系</h2>
<p>
<a href="#joker">ジョーカー</a>
<a href="#rival">宿敵</a>
<a href="#enemy">仇敵</a>
<a href="#supported">受援者</a>
</p>

<h3 id="joker">ジョーカー [Ver. 1.4.0 β21～]</h3>
<h4>[配役制限] ババ抜き村専用</h4>
<pre>
ゲーム終了時に所持している場合、引き分け以外は無条件で敗北扱いになる。
</pre>
<ol>
<li>処刑投票先に移動する。</li>
<li>移動判定は処刑者が決定した後。</li>
<li>移動判定時に死亡している人には移動しない。</li>
<li>所持者が処刑された場合は前日所持者以外の投票者からランダムに移動する。<br>
  ただし、昼の処刑直後にゲームが終了した場合は移動しない。
</li>
<li>投票先が処刑された場合は移動しない。<br>
  ただし、昼の処刑直後にゲームが終了した場合は移動する。
</li>
<li>投票先から投票された場合、投票先には移動しない。</li>
<li>投票先から投票されていた場合、他の自分に投票した人からランダムに移動する。</li>
<li>前日にジョーカーを所持していた人には移動しない。</li>
<li>自分が処刑された直後にゲームが終了した場合は本人が所持したままになる。</li>
<li>移動先候補がない場合は本人が引き続き所持する。</li>
<li>所持者が死亡した場合は生存者の誰か (例外なし) に移動する。</li>
<li>夜→昼の投票処理でゲーム終了した場合は所持者が死亡していても移動しない。</li>
<li>陣営勝利 + 単独生存を達成した場合はジョーカーを所持しても勝利扱い。</li>
</ol>
<h4>移動パターン例</h4>
<pre>
1. 標準パターン例：ジョーカー所持者は「J」、処刑者は「A」とする。
例1-1) J → B → A
J から B に移動する

例1-2) J → B → J
相互投票だった場合は移動しない。

例1-3) C → J → B → J
J から C に移動する (B は候補から除外)。

例1-4) J → A、 B → J、C → J
J は処刑者に投票しているので A には移動しないが、
B と C が J に投票しているので B と C のどちらかに移動する。

例1-5) J → A、 B → J、C(ショック死) → J
この場合は、C も対象から除外されるので B に移動する。

2. 特殊移動パターン例：ジョーカー所持者 (J) が処刑された場合
例2-1) J → A、A → J、B → J、C → J
ジョーカー投票者の A、B、C の誰かに移動する。
処刑された場合は相互投票判定が入らないので A も対象者になる。

例2-2)  J → A、A(前日所持者) → J、B(ショック死) → J、C → J
なんらかの理由で死亡していた場合は移動対象外になる。
また、処刑者から移動する場合は前日所持者は対象外。
結果として、C に移動する。

例2-3)  J → A、A(前日所持者) → J、B(ショック死) → J、C(毒死) → J
この場合は、処刑者からの移動は成立しない。
結果として、生存者から完全ランダムで移動する。

3. 最終日移動例
例3-1) J[村人][ジョーカー] A[人狼] B[村人]
この場合、誰を吊ってもゲーム終了するので、J は A か B を吊ることができれば
投票先に移動することになるが、自分が吊られた場合は自分が所持したままとなる。
いずれにしても、勝利するには J と B が A に投票する必要がある。

例3-2) J[人狼][ジョーカー] A[村人] B[村人]
J と A の相互投票、B が A に投票した場合、通常はジョーカーは移動しないが
最終日は例外的に処刑者に移動させることができるので、J は自分が吊られなければ
J の投票先にジョーカーが移動し、人狼陣営 + 自分自身も勝利できる。

例3-3) J[人狼][ジョーカー] A[狂人] B[狂人]
通常は PP で A、B どちらを吊っても全員勝利となるが、
J の投票先にジョーカーが移動することになるので A か B のどちらかは敗北扱いとなる。

例3-4) J[村人][ジョーカー] A[人狼] B[村人] C[村人]
A → J、B → A、C → A と投票していたとすると、J はどこに投票しても
A が処刑されて村陣営勝利、J の投票先にジョーカーが移動することになる。
B か C に投票した場合は投票された人だけが敗北扱いになってしまう。

例3-5) J[村人][ジョーカー] A[人狼] B[埋毒者] C[出題者]
A-C が J に投票して、J が処刑、ランダム移動で C にジョーカーが移動したとする。
夜に A が C を襲撃した場合は A と B が生存し、C がジョーカーを所持して人狼陣営勝利、
A が B を襲撃した場合は A が毒死して C の単独生存、つまり出題者陣営勝利となる。
この場合、C がジョーカーを所持したままだが、C は勝利扱いとなる。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/127" target="_top">新役職考案スレ(127)</a> が原型です。
人狼でババ抜きの駆け引きを表現しようと思案した結果、こういう実装になりました。
</pre>

<h3 id="rival">宿敵 [Ver. 1.5.0 β1～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
<a href="duelist.php#duelist_group">決闘者系</a>が付加し、勝利条件が追加される。
</pre>
<ol>
<li>勝利条件に「自分の宿敵が全員死亡し、自分だけが生存している」ことが追加される。</li>
<li><a href="#lovers">恋人</a>になった場合は、宿敵は無効化される。</li>
</ol>
<h4>勝利条件例</h4>
<pre>
1. X[戦乙女] → A-B / A[村人] B[人狼]
X：「A、B どちらかのみの生存」
A：「村人陣営の勝利」+「Bの死亡」+「自分自身の生存」
B：「人狼陣営の勝利」+「Aの死亡」+「自分自身の生存」
決闘者陣営が絡んだ場合の基本パターンになります。
別陣営が対象になった場合は基本的には生存勝利のみで
条件をほぼ満たせることになります。

2. X[決闘者] → X-A / X[決闘者] A[妖狐]
X：「Aの死亡」+「自分自身の生存」
A：「妖狐陣営の勝利」+「Xの死亡」+「自分自身の生存」
自打ちの場合、決闘者は自分自身で宿敵の条件を満たす必要があります。

3. X[戦乙女] → A-B、Y[戦乙女] B-C / A[人狼] B[狂人] C[人狼]
X：「A、B どちらかのみの生存」
Y：「B、C どちらかのみの生存」
A：「人狼陣営の勝利」+「Bの死亡」+「自分自身の生存」
B：「人狼陣営の勝利」+「A、Cの死亡」+「自分自身の生存」
C：「人狼陣営の勝利」+「Bの死亡」+「自分自身の生存」
A・C が生存、B が死亡して人狼陣営が勝利することで B 以外は全員勝利になります。

4. X[決闘者] → A-B、A[求愛者] → X-A / X[決闘者][恋人] A[求愛者][恋人] B[共有者]
X：「恋人陣営の勝利」
A：「恋人陣営の勝利」
B：「村人陣営の勝利」+「Aの死亡」+「自分自身の生存」
恋人になった時点で宿敵は勝利条件から除かれます

5. X[決闘者] → A-B、A[求愛者] A-B / A[求愛者][恋人] B[共有者][恋人]
X：「A、B どちらかのみの生存」 (実質勝利不可能)
A：「恋人陣営の勝利」
B：「恋人陣営の勝利」
恋人同士を宿敵にしてしまうと決闘者は勝利条件を満たすことが不可能になります。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="duelist.php#duelist_group">決闘者系</a>の勝敗判定用に実装されたサブ役職で、<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/780" target="_top">新役職考案スレ(780)</a> が原型です。
<a href="ogre.php">鬼陣営</a>のような勝利条件を追加設定された状態に相当します。
</pre>

<h3 id="enemy">仇敵 [Ver. 1.5.0 β3～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
<a href="duelist.php#avenger_group">復讐者系</a>が付加する。
自覚はなく、本人の勝利条件には影響しない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="duelist.php#avenger_group">復讐者系</a>の勝利条件判定に実装されたサブ役職です。
<a href="human.php#doll_group">上海人形</a>から見た<a href="human.php#doll_master">人形遣い</a>に相当します。
</pre>

<h3 id="supported">受援者 [Ver. 1.5.0 β3～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
<a href="duelist.php#patron_group">後援者系</a>が付加する。
自覚はなく、本人の勝利条件には影響しない。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="duelist.php#patron_group">後援者系</a>の勝利条件判定に実装されたサブ役職です。
<a href="lovers.php">キューピッド</a>から見た自分の<a href="#lovers">恋人</a>や、<a href="mania.php#unknown_mania_group">鵺</a>から見たコピー先に相当します。
</pre>

<h2 id="death_note_group">デスノート系</h2>
<p>
<a href="#death_note">デスノート</a>
<a href="#death_selected">オシラ遊び</a>
</p>

<h3 id="death_note">デスノート [Ver. 1.5.0 β11～]</h3>
<h4>[役職表示] 発動日限定</h4>
<h4>[配役制限] デスノート村専用</h4>
<pre>
夜に誰か一人を死亡させることができる。
有効期限は表示された日のみ (実行しなくても失効する)。
</pre>
<ol>
<li>投票インターフェイスは<a href="human.php#assassin_group">暗殺</a>と同じ。</li>
<li>「暗殺する / しない」を必ず投票する必要がある。</li>
<li>どの役職に割り当てられてもデスノートの投票処理が優先される。<br>
  例) 占い師 + デスノート：デスノートの投票を済ませるまで占い師の投票はできない。
</li>
<li><a href="../spec.php#vote_night">判定</a>は人狼襲撃の後で、判定時に死亡していた場合は無効。</li>
<li>暗殺反射などの耐性は一切適用されない。</li>
<li>死亡メッセージは人狼の襲撃と同じで、<a href="../spec.php#dead">死因</a>は「暗殺された」。</li>
</ol>
<h4>[作成者からのコメント]</h4>
<pre>
他国に実在するサブ役職を人狼式向けにアレンジしたものです。
</pre>

<h3 id="death_selected">オシラ遊び [Ver. 1.5.0 β11～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
表示された日の夜に死亡する。
<a href="../spec.php#vote_night">判定</a>は人攫いの後で、死因は「天に帰った」。
<a href="human.php#history_brownie">白澤</a>の能力が発動しても死亡する。
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#select_assassin">おしら様</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#select_assassin">おしら様</a>用に実装されたサブ役職です。
</pre>


<h2 id="bad_status_group">悪戯系</h2>
<p>
<a href="#bad_status">悪戯</a>
<a href="#sweet_status">悲恋</a>
</p>

<h3 id="bad_status">悪戯 [Ver. 1.4.0 β6～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
主に<a href="chiroptera.php#fairy_group">妖精</a>が夜の投票時に付加する。
</pre>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
役職名の表示
</pre>
<h4>関連役職</h4>
<pre>
<a href="chiroptera.php#fairy_group">妖精系</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
悪戯システム用に実装されたサブ役職です。
主に<a href="chiroptera.php#fairy_group">妖精系</a>で使用されています。
</pre>

<h3 id="sweet_status">悲恋 [Ver. 1.5.0 β6～]</h3>
<h4>[役職表示] 特殊</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
一日目のみ、付加した<a href="chiroptera.php#sweet_fairy">恋妖精</a>のもう一人の悲恋と<a href="#lovers">恋人</a>であるように表示される。
二日目以降は恋人表示が消え、二日目のみ、「あなたは恋人と別れました」という
システムメッセージが表示される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="chiroptera.php#sweet_fairy">恋妖精</a>用に実装されたサブ役職です。
</pre>


<h2 id="copied_group">元神話マニア系</h2>
<p>
<a href="#copied">元神話マニア</a>
<a href="#copied_trick">元奇術師</a>
<a href="#copied_basic">元求道者</a>
<a href="#copied_soul">元覚醒者</a>
<a href="#copied_teller">元夢語部</a>
</p>

<h3 id="copied">元神話マニア [Ver. 1.4.0 α11～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
コピー後の<a href="mania.php#mania">神話マニア</a>に付加される。
</pre>
<h5>Ver. 1.4.0 β9～10</h5>
<pre>
コピー後の<a href="mania.php#trick_mania">奇術師</a>にも付加される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="mania.php#mania">神話マニア</a>用に実装されたサブ役職です。
</pre>

<h3 id="copied_trick">元奇術師 [Ver. 1.4.0 β11～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
コピー後の<a href="mania.php#trick_mania">奇術師</a>に付加される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
交換コピーの発動をログで確認できるようにするために後から実装されたサブ役職です。
</pre>

<h3 id="copied_basic">元求道者 [Ver. 1.5.0 β4～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
コピー後の<a href="mania.php#basic_mania">求道者</a>に付加される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="mania.php#basic_mania">求道者</a>用に実装されたサブ役職です。
</pre>

<h3 id="copied_soul">元覚醒者 [Ver. 1.4.0 β11～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
コピー後の<a href="mania.php#soul_mania">覚醒者</a>に付加される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
他の<a href="mania.php#mania_group">神話マニア系</a>とログで区別できるようにするために実装されたサブ役職です。
</pre>

<h3 id="copied_teller">元夢語部 [Ver. 1.4.0 β11～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
コピー後の<a href="mania.php#dummy_mania">夢語部</a>に付加される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="human.php#psycho_mage">精神鑑定士</a>や<a href="wolf.php#dream_eater_mad">獏</a>の判定に影響しないように他の元神話マニア系とは違い、完全に別名にしてあります。
</pre>


<h2 id="other_group">その他</h2>
<p>
<a href="#possessed_target">憑依者</a>
<a href="#possessed">憑依</a>
<a href="#protected">庇護者</a>
<a href="#lost_ability">能力喪失</a>
<a href="#muster_ability">能力発現</a>
<a href="#changed_therian">元獣人</a>
</p>

<h3 id="possessed_target">憑依者 [Ver. 1.4.0 α24～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
<a href="ability.php#possessed">憑依能力者</a>が誰かに憑依したら付加される。
</pre>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
役職名の表示
</pre>
<h4>関連役職</h4>
<pre>
<a href="#possessed">憑依</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
憑依システム用に実装されたサブ役職です。
恋人システムの応用で実装されています。
</pre>

<h3 id="possessed">憑依 [Ver. 1.4.0 α24～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
<a href="ability.php#possessed">憑依能力者</a>に憑依されている人に付加される。
</pre>
<h5>Ver. 1.4.0 β15～</h5>
<pre>
役職名の表示
</pre>
<h4>関連役職</h4>
<pre>
<a href="#possessed_target">憑依者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
憑依システム用に実装されたサブ役職です。
</pre>

<h3 id="protected">庇護者 [Ver. 1.4.0 β18～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<h4>[耐性] 人狼襲撃：身代わり</h4>
<h4>[身代わり能力] 庇護者付加者</h4>
<pre>
<a href="wolf.php#wolf_group">人狼</a> (種類は問わない) に襲撃された時に、庇護者を付加した人が身代わりで死亡する。
判定は<a href="#challenge_lovers">難題</a>の後で、基本役職の能力による人狼襲撃耐性判定 (例：<a href="human.php#escaper">逃亡者</a>・<a href="fox.php#fox">妖狐</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>) よりも優先される。
</pre>
<ol>
  <li>身代わりが発生した場合、<a href="wolf.php#wolf_group">人狼</a>の襲撃は失敗扱い。</li>
  <li>代わりに死んだ人の死因は「誰かの犠牲となって死亡したようです」。</li>
  <li>本人は身代わりが発生しても分からない。</li>
  <li>身代わり君か、襲撃者が<a href="wolf.php#sirius_wolf">天狼</a> (完全覚醒状態) だった場合、身代わり能力は無効。</li>
</ol>
<h4>関連役職</h4>
<pre>
<a href="ability.php#sacrifice">身代わり能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
身代わり能力者を与えるサブ役職です。誰が誰を、という判定はしていないので
<a href="wolf.php#silver_wolf">銀狼</a>が仲間を襲撃した場合でも発動します。
</pre>

<h3 id="lost_ability">能力喪失 [Ver. 1.4.0 α13～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
発動制限付き能力者が能力を失った場合に付加される。
</pre>
<h5>Ver. 1.4.0 β11～</h5>
<pre>
役職名の表示
</pre>
<h4>関連役職</h4>
<pre>
<a href="human.php#revive_priest">天人</a>・<a href="human.php#fend_guard">忍者</a>・<a href="human.php#revive_pharmacist">仙人</a>・<a href="human.php#revive_brownie">蛇神</a>・<a href="human.php#awake_wizard">比丘尼</a>・<a href="human.php#phantom_doll">倫敦人形</a>・<a href="human.php#revive_doll">西蔵人形</a>
<a href="wolf.php#phantom_wolf">幻狼</a>・<a href="wolf.php#resist_wolf">抗毒狼</a>・<a href="wolf.php#revive_wolf">仙狼</a>・<a href="wolf.php#fire_wolf">火狼</a>・<a href="wolf.php#tongue_wolf">舌禍狼</a>・<a href="wolf.php#possessed_mad">犬神</a>・<a href="wolf.php#trap_mad">罠師</a>・<a href="wolf.php#revive_mad">尸解仙</a>
<a href="fox.php#phantom_fox">幻狐</a>・<a href="fox.php#spell_fox">宙狐</a>・<a href="fox.php#emerald_fox">翠狐</a>・<a href="fox.php#revive_fox">仙狐</a>・<a href="fox.php#possessed_fox">憑狐</a>・<a href="fox.php#trap_fox">狡狐</a>
<a href="lovers.php#revive_cupid">邪仙</a>・<a href="duelist.php#revive_avenger">夜刀神</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#tongue_wolf">舌禍狼</a>用に実装されたサブ役職ですが、汎用的に使用されています。
一部の能力者は<a href="human.php#seal_medium">封印師</a>の能力の対象になります。
</pre>

<h3 id="muster_ability">能力発現 [Ver. 1.5.0 α9～]</h3>
<h4>[配役制限] 役職付加専用</h4>
<pre>
発動制限付き能力者が能力を得た場合に付加される。
</pre>
<h4>関連役職</h4>
<pre>
<a href="wolf.php#immolate_mad">殉教者</a>・<a href="fox.php#immolate_fox">野狐禅</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#immolate_mad">殉教者</a>用に実装されたサブ役職です。
</pre>

<h3 id="changed_therian">元獣人 [Ver. 1.4.0 β15～]</h3>
<h4>[役職表示] 表示無し</h4>
<h4>[配役制限] 役職付加専用</h4>
<pre>
人狼に変化した後の<a href="wolf.php#therian_mad">獣人</a>に付加される。
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
<a href="wolf.php#therian_mad">獣人</a>用に実装されたサブ役職です。
</pre>
</body></html>
