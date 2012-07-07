<?php
define('JINRO_ROOT', '..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
$INIT_CONF->LoadClass('MESSAGE');
OutputInfoPageHeader('詳細な仕様');
?>
<p>
<a href="#decide_role">配役決定ルーチン</a>
<a href="#dummy_boy">身代わり君 (GM)</a>
<a href="#win">勝利判定</a>
<a href="#dead">死因一覧</a>
<a href="#vote">投票</a>
<a href="#revive_refuse">蘇生辞退システム</a>
</p>

<h2 id="decide_role">配役決定ルーチン</h2>
<p>
<a href="#decide_role_room">村</a>
<a href="#decide_role_dummy_boy">身代わり君</a>
<a href="#decide_role_user">ユーザ</a>
</p>

<h3 id="decide_role_room">村</h3>
<ol>
<li>参加人数を取得</li>
<li>人数毎に設定されている<a href="cast.php">配役データ</a>を取得</li>
<li>特殊村なら全て差し替える</li>
<li>通常村なら<a href="game_option.php">ゲームオプション</a>に応じて個別に入れ替える</li>
<li>配役決定</li>
</ol>

<h3 id="decide_role_dummy_boy">身代わり君</h3>
<ol>
<li>配役を取得</li>
<li>ランダムな配役リストを作る</li>
<li><a href="script_info.php#difference_dummy_boy">身代わり君がなれる役職</a>に当たるまで先頭からチェック</li>
<li>全てチェックして見つからなければエラーを返す</li>
<li>配役決定</li>
</ol>

<h3 id="decide_role_user">ユーザ</h3>
<ol>
<li><a href="#decide_role_dummy_boy">身代わり君の配役</a>を決定してユーザリストから「決定済みリスト」へ移動</li>
<li>ランダムなユーザリストを作る</li>
<li>リストの先頭の人の希望役職を確認</li>
<li>何か希望してて空きがあればその人の役が決定、「決定済みリスト」へ移動</li>
<li>希望なしか空きがなければ「未決定リスト」へ移動</li>
<li>全部振り終えたら「未決定リスト」の人に余りを割り振る</li>
</ol>

<h2 id="dummy_boy">身代わり君 (GM) の仕様</h2>
<ol>
<li>常時、ゲーム終了後相当の情報が見えます</li>
<li>ゲーム開始前のユーザの「役職」は「希望役職」です</li>
<li>単独の KICK 投票でユーザを蹴りだせます</li>
<li>ゲーム中は「遺言」発言をすると専用システムメッセージになります</li>
<li>ゲーム開始前のみ遺言を変更できます</li>
<li>投票能力がある役職であっても投票することはできません</li>
<li>「<a href="#revive_refuse">蘇生辞退</a>」を実行することで一部の<a href="game_option.php#open_cast_option">霊界公開設定</a>を変更することができます</li>
<li>「超過時間リセット」を実行することで投票超過時間をリセットすることができます</li>
</ol>
<h3>Ver. 2.0.0 α5～</h3>
<pre>
超過時間リセット機能実装
</pre>
<h3>Ver. 1.5.0 β14～</h3>
<pre>
蘇生辞退機能実装
</pre>
<h3>Ver. 1.5.0 β2～</h3>
<pre>
ゲーム開始前のみ遺言を変更できます
</pre>

<h2 id="win">勝利判定</h2>
<ol>
<li>吸血鬼支配 (生存者を全て感染させた吸血鬼がいる)
  <ol>
  <li>恋人生存 → 恋人勝利</li>
  <li>恋人全滅 → 吸血鬼勝利</li>
  </ol>
</li>
<li>人狼全滅
  <ol>
  <li>生存者が全て出題者陣営 → 出題者勝利</li>
  <li>恋人生存 → 恋人勝利</li>
  <li>妖狐生存 → 妖狐勝利</li>
  <li>吸血鬼単独生存 → 吸血鬼勝利</li>
  <li>それ以外の生存者がいる → 村人勝利</li>
  <li>生存者なし → 引き分け</li>
  </ol>
</li>
<li>人狼支配 (村人カウントが人狼以下になる)
  <ol>
  <li>恋人生存 → 恋人勝利</li>
  <li>妖狐生存 → 妖狐勝利</li>
  <li>恋人・妖狐全滅 → 人狼勝利</li>
  </ol>
</li>
<li>恋人支配 (生存者が全て恋人) → 恋人勝利</li>
<li>出題者死亡 (クイズ村限定) → 引き分け</li>
<li>規定数以上の再投票 → 引き分け</li>
</ol>
<pre>
※ 村が引き分けになった場合は全員が引き分け扱いになります。
</pre>

<h2 id="dead">死因一覧</h2>
<p>
<a href="#dead_common">共通</a>
<a href="#dead_day">昼</a>
<a href="#dead_night">夜</a>
</p>

<h3 id="dead_common">共通</h3>
<h4>～<?php echo $MESSAGE->sudden_death ?> [Ver. 1.4.0 β13～]</h4>
<ul>
<li>未投票突然死</li>
</ul>

<h4>～<?php echo $MESSAGE->lovers_followed ?> [Ver. 1.2.0～]</h4>
<ul>
<li><a href="new_role/sub_role.php#lovers">恋人</a>後追い</li>
</ul>

<h4>～<?php echo $MESSAGE->joker_moved ?> [Ver. 1.4.0 β21～]</h4>
<ul>
<li><a href="new_role/sub_role.php#joker">ジョーカー</a>の移動 (配役公開状態限定)</li>
</ul>


<h3 id="dead_day">昼</h3>
<h4>～<?php echo $MESSAGE->vote_killed ?></h4>
<ul>
<li>処刑</li>
</ul>

<h4>～<?php echo $MESSAGE->deadman ?></h4>
<ul>
<li>毒 (<a href="new_role/ability.php#poison">毒能力者</a>・<a href="new_role/human.php#centaurus_pharmacist">人馬</a>)</li>
<li>罠 (<a href="new_role/human.php#trap_common">策士</a>)</li>
</ul>

<h4>～<?php echo $MESSAGE->vote_sudden_death ?> [Ver. 1.4.0 α3-7～]</h4>
<ul>
<li>ショック死 (<a href="new_role/ability.php#sudden_death">ショック死発動能力者</a>・<a href="weather.php#weather_thunderbolt">天候：青天の霹靂</a>)</li>
</ul>

<h4><?php echo $MESSAGE->blind_vote ?> [Ver. 1.4.0 β21～]</h4>
<ul>
<li><a href="new_role/wolf.php#amaze_mad">傘化け</a>の能力発動</li>
</ul>

<h3 id="dead_night">夜</h3>
<h4>～<?php echo $MESSAGE->deadman ?></h4>
<ul>
<li>人狼襲撃 (<a href="new_role/wolf.php#wolf_group">人狼系</a>)</li>
<li>餓狼襲撃 (<a href="new_role/wolf.php#hungry_wolf">餓狼</a>)</li>
<li>身代わり (<a href="new_role/ability.php#sacrifice">身代わり能力者</a>・<a href="new_role/human.php#sacrifice_cat">猫神</a>)</li>
<li>毒 (<a href="new_role/ability.php#poison">毒能力者</a>・<a href="new_role/human.php#soul_assassin">辻斬り</a>)</li>
<li>罠 (<a href="new_role/ability.php#trap">罠能力者</a>)</li>
<li>逃亡失敗 (<a href="new_role/human.php#escaper_group">逃亡者系</a>)</li>
<li>狩り (<a href="new_role/human.php#guard_group">狩人系</a>)</li>
<li>吸血 (<a href="new_role/vampire.php">吸血鬼陣営</a>)</li>
<li>暗殺 (<a href="new_role/human.php#assassin_group">暗殺者系</a>・<a href="new_role/sub_role.php#death_note">デスノート</a>)</li>
<li>人攫い (<a href="new_role/ogre.php">鬼陣営</a>)</li>
<li>夢食い (<a href="new_role/wolf.php#dream_eater_mad">獏</a>)</li>
<li>呪殺 (<a href="new_role/human.php#mage_group">占い師系</a>)</li>
<li>呪返し (<a href="new_role/ability.php#cursed_group">呪い能力者</a>・<a href="new_role/human.php#voodoo_killer">陰陽師</a>)</li>
<li>憑依 (<a href="new_role/ability.php#possessed">憑依能力者</a>)</li>
<li>憑依解放 (<a href="new_role/human.php#anti_voodoo">厄神</a>)</li>
<li>人外尾行 (<a href="new_role/human.php#reporter">ブン屋</a>)</li>
<li>帰還 (<a href="new_role/human.php#revive_priest">天人</a>・<a href="new_role/sub_role.php#death_selected">オシラ遊び</a>)</li>
</ul>
<h4>～<?php echo $MESSAGE->revive_success ?> [Ver. 1.4.0 α18～]</h4>
<ul>
<li>蘇生 (<a href="new_role/ability.php#revive">蘇生能力者</a>)</li>
<li>憑依・憑依解放 (<a href="new_role/ability.php#possessed">憑依能力者</a>)</li>
</ul>

<h4>～<?php echo $MESSAGE->revive_failed ?> [Ver. 1.4.0 α18～]</h4>
<ul>
<li>蘇生失敗 (霊界限定) (<a href="new_role/ability.php#revive_other">他者蘇生能力者</a>)</li>
</ul>

<h4>～<?php echo $MESSAGE->flowered_a ?> (一例) [Ver. 1.4.0 β12～]</h4>
<ul>
<li>悪戯 (<a href="new_role/chiroptera.php#flower_fairy">花妖精</a>)</li>
</ul>

<h4>～<?php echo $MESSAGE->constellation_a ?> (一例) [Ver. 1.4.0 β13～]</h4>
<ul>
<li>悪戯 (<a href="new_role/chiroptera.php#star_fairy">星妖精</a>)</li>
</ul>

<h4>～<?php echo $MESSAGE->pierrot_a ?> (一例) [Ver. 1.5.0 α8～]</h4>
<ul>
<li>魔法 (<a href="new_role/human.php#pierrot_wizard">道化師</a>)</li>
</ul>

<h2 id="vote">投票処理の仕様</h2>
<p>
<a href="#vote_legend">判例</a>
<a href="#vote_day">昼</a>
<a href="#vote_night">夜</a>
</p>

<h3 id="vote_legend">判例</h3>
<ul>
<li>「→」死因決定の単位</li>
<li>「＞」判定優先順位 (判定上書き)</li>
</ul>

<h3 id="vote_day">昼</h3>
<pre>
+ 処理順序
  - 投票集計 → 処刑者決定 → 処刑者カウンター → 役職判定

+ 処刑者決定法則
  - 単独トップ ＞ <a href="new_role/sub_role.php#decide">決定者</a> ＞ <a href="new_role/sub_role.php#bad_luck">不運</a> ＞ <a href="new_role/sub_role.php#counter_decide">燕返し</a> ＞ <a href="new_role/sub_role.php#dropout">脱落者</a> ＞ <a href="new_role/sub_role.php#impatience">短気</a> ＞ <a href="new_role/sub_role.php#good_luck">幸運</a>が逃れる ＞
    <a href="new_role/sub_role.php#plague">疫病神</a>の投票先が逃れる ＞ <a href="new_role/quiz.php#quiz">出題者</a> ＞ <a href="new_role/human.php#executor">執行者</a> ＞ <a href="new_role/human.php#saint">聖女</a> ＞ <a href="new_role/wolf.php#agitate_mad">扇動者</a> (+ ショック死)

+ 処刑者カウンター
  - <a href="new_role/human.php#pharmacist_group">薬師系</a> ＞ 抗毒判定 ＞ 毒発動判定 → <a href="new_role/human.php#brownie">座敷童子</a>・<a href="new_role/human.php#doom_doll">蓬莱人形</a>・<a href="new_role/fox.php#miasma_fox">蟲狐</a>

+ 役職判定
  - <a href="new_role/human.php#seal_medium">封印師</a> → <a href="new_role/human.php#bacchus_medium">神主</a> → <a href="new_role/human.php#centaurus_pharmacist">人馬</a> → <a href="new_role/ability.php#vote_action">処刑投票能力者</a> → <a href="new_role/human.php#trap_common">策士</a> → <a href="new_role/human.php#jealousy">橋姫</a> →
    <a href="new_role/ability.php#anti_sudden_death">ショック死抑制能力者</a> ＞ <a href="new_role/sub_role.php#challenge_lovers">難題</a> ＞ <a href="new_role/sub_role.php#chicken_group">小心者系</a> ＞ <a href="new_role/human.php#eclipse_medium">蝕巫女</a>・<a href="new_role/lovers.php#cursed_angel">堕天使</a> →
    <a href="new_role/wolf.php#follow_mad">舟幽霊</a> → <a href="new_role/sub_role.php#lovers">恋人</a>後追い → <a href="new_role/ability.php#vote_reaction">処刑得票能力者</a> → <a href="weather.php">天候</a>・<a href="new_role/sub_role.php#joker">ジョーカー</a>
</pre>

<h3 id="vote_night">夜</h3>
<pre>
+ 処理順序
  - 恋人 → 接触 → 夢 → 占い → 透視 → コピー → 帰還 → 反魂 → 蘇生 →
    憑依 → 覚醒コピー → 後追い → 蟲姫 → 司祭

+ 恋人 (<a href="new_role/lovers.php">恋人陣営</a>)
  - 相互作用はないので投票直後に処理を行う

+ 接触 (罠・逃亡・護衛・身代わり・人狼襲撃・狩り・吸血・暗殺・人攫い)
  - 罠 ＞ 逃亡失敗 →
    罠 ＞ 狩人護衛 ＞ <a href="new_role/sub_role.php#challenge_lovers">難題</a> ＞ <a href="new_role/sub_role.php#protected">庇護者</a> ＞ 襲撃耐性 ＞ 身代わり ＞ 人狼襲撃 →
    <a href="new_role/sub_role.php#death_note">デスノート</a> → 狩り → 罠能力者の罠死 → 罠 ＞ 狩人護衛 ＞ 吸血 →
    罠 ＞ 無効判定 ＞ 反射判定 ＞ 暗殺 →
    罠 ＞ 無効判定 ＞ 反射判定 ＞ 失敗判定 ＞ 人攫い → <a href="new_role/sub_role.php#death_selected">オシラ遊び</a> → 凍傷判定

  - <a href="new_role/ability.php#trap">罠能力者</a>
  - 逃亡能力者 (<a href="new_role/human.php#escaper_group">逃亡者系</a>)
  - <a href="new_role/ability.php#guard">護衛能力者</a>
  - <a href="new_role/ability.php#resist_wolf">襲撃耐性能力者</a>
  - <a href="new_role/ability.php#sacrifice">身代わり能力者</a>
  - 吸血能力者 (<a href="new_role/vampire.php">吸血鬼陣営</a>)
  - <a href="new_role/ability.php#assassin">暗殺・人攫い能力者</a>


+ 夢 (<a href="new_role/human.php#dummy_guard">夢守人</a>・<a href="new_role/wolf.php#dream_eater_mad">獏</a>)
  - 夢守人護衛 ＞ 獏襲撃 → 夢守人の狩り

+ 占い (<a href="new_role/human.php#mage_group">占い師系</a>他・<a href="new_role/human.php#anti_voodoo">厄神</a>・<a href="new_role/wolf.php#jammer_mad">月兎</a>他・<a href="new_role/wolf.php#voodoo_mad">呪術師</a>他)
  - 厄払い ＞ 占い妨害 ＞ 呪い ＞ 占い (呪殺・<a href="new_role/sub_role.php#spell_wisp">狐火</a>)

+ 占い判定 (<a href="new_role/sub_role.php#wisp_group">鬼火系</a>)
  - <a href="new_role/sub_role.php#sheep_wisp">羊皮</a> ＞ <a href="new_role/sub_role.php#wisp">鬼火</a> ＞ <a href="new_role/sub_role.php#foughten_wisp">古戦場火</a> ＞ <a href="new_role/sub_role.php#black_wisp">天火</a> ＞ 役職別判定

+ 透視 (<a href="new_role/human.php#mind_scanner_group">さとり系</a> / 1日目限定)

+ コピー (<a href="new_role/mania.php">神話マニア陣営</a> / 1日目限定)

+ 帰還 (<a href="new_role/human.php#revive_priest">天人</a> / 1日目限定)

+ 尾行 (<a href="new_role/human.php#reporter">ブン屋</a>・<a href="new_role/human.php#clairvoyance_scanner">猩々</a>)
</pre>

<h2 id="revive_refuse">蘇生辞退システム [Ver. 1.4.0 β7～]</h2>
<pre>
死亡後、霊界オフ状態の時に投票画面をクリックすると
「蘇生を辞退する」(デフォルト) というボタンが出現します。
それをクリックすると「システム：～さんは蘇生を辞退しました」という
霊界発言が挿入されます。

この状態でその人が蘇生先に選ばれた場合は 100% 蘇生に失敗します。
憑依に関するシステム情報となってしまうため、下界には告知しません。

これは、死亡後に急な用事が入って抜けなければならない人の為の救済措置です。
</pre>
</body></html>
