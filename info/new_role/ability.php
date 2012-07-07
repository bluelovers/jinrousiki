<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('能力者逆引き');
?>
<p>
<a href="#assassin">暗殺</a>
<a href="#anti_assassin">暗殺耐性</a>
<a href="#mage">占い</a>
<a href="#phantom">占い妨害</a>
<a href="#wisp">鬼火</a>
<a href="#guard_hunt">狩り</a>
<a href="#guard">護衛</a>
<a href="#guard_limit">護衛制限</a>
<a href="#doom">死の宣告</a>
<a href="#decide">処刑者決定</a>
</p>
<p>
<a href="#vote_action">処刑投票</a>
<a href="#vote_reaction">処刑得票</a>
<a href="#sudden_death">ショック死</a>
<a href="#anti_sudden_death">ショック死抑制</a>
<a href="#resist_wolf">人狼襲撃耐性</a>
<a href="#psycho">精神</a>
<a href="#sex">性別</a>
<a href="#revive">蘇生</a>
<a href="#revive_limit">蘇生制限</a>
<a href="#same">同一表示</a>
</p>
<p>
<a href="#authority">投票数変化</a>
<a href="#stargazer">投票能力</a>
<a href="#luck">得票数変化</a>
<a href="#poison">毒</a>
<a href="#partner">仲間情報妨害</a>
<a href="#cursed_group">呪い</a>
<a href="#talk_convert">発言変換</a>
<a href="#possessed">憑依</a>
<a href="#possessed_limit">憑依制限</a>
<a href="#seal">封印</a>
</p>
<p>
<a href="#sacrifice">身代わり</a>
<a href="#soul">役職鑑定</a>
<a href="#last_words_limit">遺言制限</a>
<a href="#dummy">夢</a>
<a href="#necromancer">霊能</a>
<a href="#trap">罠</a>
</p>

<h2 id="assassin">暗殺能力者</h2>
<h3 id="assassin_kill">暗殺型</h3>
<pre>
<a href="human.php#assassin">暗殺者</a>・<a href="human.php#reverse_assassin">反魂師</a>・<a href="human.php#soul_assassin">辻斬り</a>・<a href="human.php#eclipse_assassin">蝕暗殺者</a>・<a href="ogre.php">鬼陣営</a>
<a href="human.php#wizard">魔法使い</a>(<a href="human.php#assassin">暗殺者</a>)・<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#soul_assassin">辻斬り</a>)・<a href="human.php#astray_wizard">左道使い</a>(<a href="human.php#reverse_assassin">反魂師</a>)
</pre>
<h3 id="assassin_doom">死の宣告型</h3>
<pre>
<a href="human.php#doom_assassin">死神</a>・<a href="fox.php#doom_fox">冥狐</a>
<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#doom_assassin">死神</a>)・<a href="human.php#astray_wizard">左道使い</a>(<a href="fox.php#doom_fox">冥狐</a>)・<a href="human.php#pierrot_wizard">道化師</a>(特殊<a href="human.php#doom_assassin">死神</a>)
</pre>

<h2 id="anti_assassin">暗殺耐性能力者</h2>
<pre>
<a href="human.php#assassin_spec">暗殺の仕様</a>参照
</pre>

<h2 id="mage">占い (特殊判定)</h2>
<h3 id="mage_human">村人 (白系)</h3>
<pre>
<a href="wolf.php#boss_wolf">白狼</a>・<a href="wolf.php#sirius_wolf">天狼</a>・<a href="fox.php#white_fox">白狐</a>・<a href="fox.php#sacrifice_fox">白蔵主</a>・<a href="sub_role.php#sheep_wisp">羊皮</a>
</pre>
<h3 id="mage_wolf">人狼</h3>
<pre>
<a href="human.php#suspect">不審者</a>・<a href="human.php#cute_mage">萌占い師</a>・<a href="fox.php#black_fox">黒狐</a>・<a href="chiroptera.php#cute_chiroptera">萌蝙蝠</a>・<a href="duelist.php#cute_avenger">草履大将</a>・<a href="sub_role.php#black_wisp">天火</a>
</pre>
<h3 id="mage_chiroptera">蝙蝠</h3>
<pre>
<a href="wolf.php#mist_wolf">霧狼</a>・<a href="fox.php#mist_fox">霧狐</a>・<a href="vampire.php">吸血鬼陣営</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>・<a href="sub_role.php#foughten_wisp">古戦場火</a>
</pre>
<h3 id="mage_ogre">鬼</h3>
<pre>
<a href="ogre.php">鬼陣営</a>・<a href="sub_role.php#wisp">鬼火</a>
</pre>

<h2 id="phantom">占い妨害能力者</h2>
<h3 id="phantom_active">能動型</h3>
<pre>
<a href="wolf.php#jammer_mad">月兎</a>・<a href="fox.php#jammer_fox">月狐</a>
<a href="human.php#astray_wizard">左道使い</a>(<a href="wolf.php#jammer_mad">月兎</a>)
</pre>
<h3 id="phantom_reactive">受動型</h3>
<pre>
<a href="human.php#phantom_doll">倫敦人形</a>・<a href="wolf.php#phantom_wolf">幻狼</a>・<a href="fox.php#phantom_fox">幻狐</a>
</pre>

<h2 id="wisp">鬼火付加能力者</h2>
<pre>
<a href="wolf.php#fire_wolf">火狼</a>・<a href="fox.php#spell_fox">宙狐</a>・<a href="mania.php#fire_mania">青行灯</a>
</pre>

<h2 id="guard_hunt">狩り対象者</h2>
<pre>
<a href="human.php#guard_hunt">狩りの仕様</a>参照
</pre>

<h2 id="guard">護衛能力者</h2>
<pre>
<a href="human.php#guard">狩人</a>・<a href="human.php#hunter_guard">猟師</a>・<a href="human.php#blind_guard">夜雀</a>・<a href="human.php#gatekeeper_guard">門番</a>・<a href="human.php#reflect_guard">侍</a>・<a href="human.php#poison_guard">騎士</a>・<a href="human.php#fend_guard">忍者</a>・<a href="human.php#elder_guard">老兵</a>・<a href="human.php#barrier_wizard">結界師</a>
<a href="human.php#wizard">魔法使い</a>(<a href="human.php#guard">狩人</a>)・<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#poison_guard">騎士</a>)
</pre>

<h2 id="guard_limit">護衛制限対象者</h2>
<pre>
<a href="human.php#guard_limit">狩人系</a>参照
</pre>

<h2 id="doom">死の宣告能力者</h2>
<h3 id="doom_active">能動型</h3>
<pre>
<a href="human.php#doom_assassin">死神</a>・<a href="human.php#doom_escaper">半鳥女</a>・<a href="wolf.php#doom_wolf">冥狼</a>・<a href="fox.php#doom_fox">冥狐</a>・<a href="lovers.php#revive_cupid">邪仙</a>・<a href="vampire.php#doom_vampire">冥血鬼</a>・<a href="duelist.php#doom_duelist">黒幕</a>
<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#doom_assassin">死神</a>)・<a href="human.php#astray_wizard">左道使い</a>(<a href="fox.php#doom_fox">冥狐</a>)・<a href="human.php#pierrot_wizard">道化師</a>(特殊<a href="human.php#doom_assassin">死神</a>)
</pre>
<h3 id="doom_reactive">受動型</h3>
<pre>
<a href="human.php#cursed_brownie">祟神</a>・<a href="human.php#doom_doll">蓬莱人形</a>
</pre>

<h2 id="decide">処刑者決定能力者</h2>
<pre>
<a href="human.php#saint">聖女</a>・<a href="human.php#executor">執行者</a>・<a href="wolf.php#agitate_mad">扇動者</a>・<a href="quiz.php#quiz">出題者</a>・<a href="sub_role.php#decide_group">決定者系</a>
</pre>

<h2 id="vote_action">処刑投票能力者</h2>
<pre>
<a href="human.php#spell_common">葛の葉</a>・<a href="human.php#miasma_jealousy">蛇姫</a>・<a href="human.php#critical_jealousy">人魚</a>・<a href="wolf.php#miasma_mad">土蜘蛛</a>・<a href="wolf.php#critical_mad">釣瓶落とし</a>・<a href="fox.php#critical_fox">寿羊狐</a>・<a href="lovers.php#sweet_cupid">弁財天</a>・<a href="lovers.php#snow_cupid">寒戸婆</a>・<a href="duelist.php#cursed_avenger">がしゃどくろ</a>・<a href="duelist.php#critical_avenger">狂骨</a>
<a href="human.php#philosophy_wizard">賢者</a>(<a href="human.php#miasma_jealousy">蛇姫</a>・<a href="wolf.php#miasma_mad">土蜘蛛</a>・<a href="wolf.php#critical_mad">釣瓶落とし</a>・<a href="lovers.php#sweet_cupid">弁財天</a>)
</pre>

<h2 id="vote_reaction">処刑得票能力者</h2>
<pre>
<a href="human.php#divorce_jealousy">縁切地蔵</a>・<a href="human.php#harvest_brownie">豊穣神</a>・<a href="human.php#maple_brownie">紅葉神</a>・<a href="human.php#cursed_brownie">祟神</a>
</pre>

<h2 id="sudden_death">ショック死発動能力者</h2>
<h3 id="sudden_death_direct">直接型</h3>
<pre>
<a href="human.php#bacchus_medium">神主</a>・<a href="human.php#seal_medium">封印師</a>・<a href="human.php#eclipse_medium">蝕巫女</a>・<a href="human.php#jealousy">橋姫</a>・<a href="human.php#thunder_brownie">雷公</a>・<a href="wolf.php#agitate_mad">扇動者</a>・<a href="wolf.php#follow_mad">舟幽霊</a>・<a href="lovers.php#cursed_angel">堕天使</a>
<a href="sub_role.php#chicken_group">小心者系</a>・<a href="sub_role.php#challenge_lovers">難題</a>
</pre>
<h3 id="sudden_death_indirect">間接型</h3>
<pre>
<a href="human.php#ghost_common">亡霊嬢</a>(<a href="sub_role.php#chicken">小心者</a>)・<a href="human.php#miasma_jealousy">蛇姫</a>(<a href="sub_role.php#febris">熱病</a>)・<a href="human.php#brownie">座敷童子</a>(<a href="sub_role.php#febris">熱病</a>)・<a href="human.php#harvest_brownie">豊穣神</a>(<a href="sub_role.php#frostbite">凍傷</a>)・<a href="human.php#maple_brownie">紅葉神</a>(<a href="sub_role.php#frostbite">凍傷</a>)
<a href="wolf.php#miasma_mad">土蜘蛛</a>(<a href="sub_role.php#febris">熱病</a>)・<a href="wolf.php#snow_trap_mad">雪女</a>(<a href="sub_role.php#frostbite">凍傷</a>)・<a href="fox.php#miasma_fox">蟲狐</a>(<a href="sub_role.php#febris">熱病</a>)・<a href="lovers.php#moon_cupid">かぐや姫</a>(<a href="sub_role.php#challenge_lovers">難題</a>)・<a href="lovers.php#snow_cupid">寒戸婆</a>(<a href="sub_role.php#frostbite">凍傷</a>)
<a href="chiroptera.php#ice_fairy">氷妖精</a>(<a href="sub_role.php#frostbite">凍傷</a>)・<a href="ogre.php#poison_ogre">榊鬼</a>(<a href="sub_role.php#panelist">解答者</a>)・<a href="#doom">死の宣告能力者</a>(<a href="sub_role.php#death_warrant">死の宣告</a>)
<a href="human.php#philosophy_wizard">賢者</a>(<a href="human.php#miasma_jealousy">蛇姫</a>・<a href="wolf.php#miasma_mad">土蜘蛛</a>)・<a href="human.php#astray_wizard">左道使い</a>(<a href="wolf.php#snow_trap_mad">雪女</a>)・<a href="human.php#pierrot_wizard">道化師</a>(<a href="chiroptera.php#ice_fairy">氷妖精</a>)
</pre>

<h2 id="anti_sudden_death">ショック死抑制能力者</h2>
<pre>
<a href="human.php#cure_pharmacist">河童</a>・<a href="human.php#revive_pharmacist">仙人</a>
<a href="human.php#philosophy_wizard">賢者</a>(<a href="human.php#cure_pharmacist">河童</a>)
</pre>

<h2 id="resist_wolf">人狼襲撃耐性能力者</h2>
<h3 id="resist_wolf_full">常時無効</h3>
<pre>
<a href="fox.php#fox_group">妖狐系</a>(<a href="fox.php#white_fox">白狐</a>・<a href="fox.php#poison_fox">管狐</a>・<a href="fox.php#sacrifice_fox">白蔵主</a>を除く)・<a href="vampire.php#doom_vampire">冥血鬼</a>・<a href="lovers.php#sacrifice_angel">守護天使</a>・<a href="duelist.php#sacrifice_patron">身代わり地蔵</a>・<a href="mania.php#sacrifice_mania">影武者</a>
</pre>
<h3 id="resist_wolf_limited">限定無効</h3>
<pre>
<a href="human.php#fend_guard">忍者</a>・<a href="human.php#awake_wizard">比丘尼</a>・<a href="human.php#escaper_group">逃亡者系</a>・<a href="wolf.php#therian_mad">獣人</a>・<a href="ogre.php">鬼陣営</a>・<a href="sub_role.php#challenge_lovers">難題</a>
</pre>

<h2 id="psycho">精神関連能力者</h2>
<h3 id="psycho_mage">鑑定能力者</h3>
<pre>
<a href="human.php#psycho_mage">精神鑑定士</a>・<a href="human.php#psycho_necromancer">精神感応者</a>
<a href="human.php#wizard">魔法使い</a>(<a href="human.php#psycho_mage">精神鑑定士</a>)・<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#psycho_mage">精神鑑定士</a>)・<a href="human.php#spiritism_wizard">交霊術師</a>(<a href="human.php#psycho_necromancer">精神感応者</a>)
</pre>
<h3 id="psycho_only">限定能力者</h3>
<pre>
<a href="human.php#psycho_escaper">迷い人</a>・<a href="wolf.php#dream_eater_mad">獏</a>・<a href="ogre.php#revive_ogre">茨木童子</a>
<a href="human.php#astray_wizard">左道使い</a>(<a href="wolf.php#dream_eater_mad">獏</a>)
</pre>

<h2 id="sex">性別関連能力者</h2>
<h3 id="sex_mage">鑑定能力者</h3>
<pre>
<a href="human.php#sex_mage">ひよこ鑑定士</a>・<a href="human.php#spiritism_wizard">交霊術師</a>・<a href="wolf.php#sex_wolf">雛狼</a>・<a href="fox.php#sex_fox">雛狐</a>
<a href="human.php#wizard">魔法使い</a>(<a href="human.php#sex_mage">ひよこ鑑定士</a>)・<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#sex_mage">ひよこ鑑定士</a>)・<a href="human.php#awake_wizard">比丘尼</a>(<a href="human.php#sex_mage">ひよこ鑑定士</a>)
<a href="human.php#pierrot_wizard">道化師</a>(<a href="human.php#sex_mage">ひよこ鑑定士</a>)
</pre>
<h3 id="sex_only">限定能力者</h3>
<pre>
<a href="human.php#incubus_escaper">一角獣</a>・<a href="human.php#succubus_escaper">水妖姫</a>・<a href="lovers.php#angel">天使</a>・<a href="lovers.php#rose_angel">薔薇天使</a>・<a href="lovers.php#lily_angel">百合天使</a>・<a href="vampire.php#incubus_vampire">青髭公</a>・<a href="vampire.php#succubus_vampire">飛縁魔</a>・<a href="ogre.php#incubus_ogre">般若</a>・<a href="ogre.php#succubus_yaksa">荼枳尼天</a>
<a href="sub_role.php#androphobia">男性恐怖症</a>・<a href="sub_role.php#gynophobia">女性恐怖症</a>
</pre>

<h2 id="revive">蘇生能力者</h2>
<h3 id="revive_other">他者蘇生型</h3>
<pre>
<a href="human.php#revive_medium">風祝</a>・<a href="human.php#poison_cat_group">猫又系</a>・<a href="fox.php#revive_fox">仙狐</a>・<a href="mania.php#revive_mania">五徳猫</a>
</pre>
<h3 id="revive_self">自己蘇生型</h3>
<pre>
<a href="human.php#revive_priest">天人</a>・<a href="human.php#revive_pharmacist">仙人</a>・<a href="human.php#revive_brownie">蛇神</a>・<a href="human.php#revive_doll">西蔵人形</a>・<a href="wolf.php#revive_wolf">仙狼</a>・<a href="wolf.php#revive_mad">尸解仙</a>・<a href="lovers.php#revive_cupid">邪仙</a>・<a href="vampire.php#scarlet_vampire">屍鬼</a>・<a href="ogre.php#revive_ogre">茨木童子</a>・<a href="duelist.php#revive_avenger">夜刀神</a>・<a href="mania.php#resurrect_mania">僵尸</a>
</pre>

<h2 id="revive_limit">蘇生制限対象者</h2>
<pre>
<a href="human.php#revive_rule">基本ルール[蘇生]</a>参照
</pre>

<h2 id="same">同一表示役職</h2>
<pre>
<a href="human.php#human">村人</a>・<a href="human.php#mage">占い師</a>・<a href="human.php#necromancer">霊能者</a>・<a href="human.php#medium">巫女</a>・<a href="human.php#priest">司祭</a>・<a href="human.php#guard">狩人</a>・<a href="human.php#common">共有者</a>・<a href="human.php#poison">埋毒者</a>・<a href="human.php#revive_cat">仙狸</a>・<a href="human.php#assassin">暗殺者</a>
<a href="lovers.php#self_cupid">求愛者</a>・<a href="mania.php#soul_mania">覚醒者</a>
</pre>

<h2 id="authority">投票数変化能力者</h2>
<h3 id="authority_direct">直接型</h3>
<pre>
<a href="human.php#elder">長老</a>・<a href="human.php#scripter">執筆者</a>・<a href="human.php#elder_guard">老兵</a>・<a href="human.php#critical_common">暴君</a>・<a href="wolf.php#elder_wolf">古狼</a>・<a href="fox.php#elder_fox">古狐</a>・<a href="chiroptera.php#elder_chiroptera">古蝙蝠</a>・<a href="duelist.php#critical_duelist">剣闘士</a>・<a href="duelist.php#cowboy_duelist">無鉄砲者</a>
<a href="sub_role.php#panelist">解答者</a>・<a href="sub_role.php#authority_group">権力者系</a>
</pre>
<h3 id="authority_indirect">間接型</h3>
<pre>
<a href="human.php#brownie">座敷童子</a>(<a href="human.php#human">村人</a>)・<a href="human.php#harvest_brownie">豊穣神</a>(<a href="sub_role.php#critical_voter">会心</a>)・<a href="human.php#divine_escaper">麒麟</a>(<a href="sub_role.php#day_voter">一日村長</a>)・<a href="ogre.php#poison_ogre">榊鬼</a>(<a href="sub_role.php#panelist">解答者</a>)・<a href="mania.php#wirepuller_mania">黒衣</a>(<a href="sub_role.php#wirepuller_luck">入道</a>)
</pre>

<h2 id="stargazer">投票能力鑑定能力者</h2>
<pre>
<a href="human.php#stargazer_mage">占星術師</a>・<a href="human.php#border_priest">境界師</a>・<a href="human.php#clairvoyance_scanner">猩々</a>・<a href="fox.php#stargazer_fox">星狐</a>
<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#stargazer_mage">占星術師</a>)・<a href="human.php#awake_wizard">比丘尼</a>(<a href="human.php#stargazer_mage">占星術師</a>)
</pre>

<h2 id="luck">得票数変化能力者</h2>
<h3 id="luck_direct">直接型</h3>
<pre>
<a href="human.php#critical_common">暴君</a>・<a href="duelist.php#critical_patron">ひんな神</a>・<a href="sub_role.php#wirepuller_luck">入道</a>・<a href="sub_role.php#upper_luck_group">雑草魂系</a>
</pre>
<h3 id="luck_indirect">間接型</h3>
<pre>
<a href="human.php#critical_jealousy">人魚</a>(<a href="sub_role.php#critical_luck">痛恨</a>)・<a href="human.php#maple_brownie">紅葉神</a>(<a href="sub_role.php#critical_luck">痛恨</a>)・<a href="wolf.php#critical_mad">釣瓶落とし</a>(<a href="sub_role.php#critical_luck">痛恨</a>)・<a href="fox.php#critical_fox">寿羊狐</a>(<a href="sub_role.php#critical_luck">痛恨</a>)・<a href="duelist.php#critical_avenger">狂骨</a>(<a href="sub_role.php#critical_luck">痛恨</a>)
<a href="duelist.php#critical_patron">ひんな神</a>(<a href="sub_role.php#occupied_luck">ひんな持ち</a>)・<a href="mania.php#wirepuller_mania">黒衣</a>(<a href="sub_role.php#wirepuller_luck">入道</a>)
<a href="human.php#philosophy_wizard">賢者</a>(<a href="wolf.php#critical_mad">釣瓶落とし</a>)
</pre>

<h2 id="poison">毒能力者</h2>
<pre>
<a href="human.php#poison_guard">騎士</a>・<a href="human.php#poison_group">埋毒者系</a>・<a href="human.php#poison_cat">猫又</a>・<a href="human.php#poison_jealousy">毒橋姫</a>・<a href="human.php#poison_doll">鈴蘭人形</a>・<a href="wolf.php#poison_wolf">毒狼</a>・<a href="fox.php#poison_fox">管狐</a>・<a href="chiroptera.php#poison_chiroptera">毒蝙蝠</a>・<a href="ogre.php#poison_ogre">榊鬼</a>・<a href="duelist.php#poison_avenger">山わろ</a>
</pre>

<h2 id="partner">仲間情報妨害能力者</h2>
<h3 id="partner_silver">隠蔽型 (銀系)</h3>
<pre>
<a href="human.php#silver_doll">露西亜人形</a>・<a href="wolf.php#silver_wolf">銀狼</a>・<a href="fox.php#silver_fox">銀狐</a>
</pre>
<h3 id="partner_scarlet">混入型 (紅系)</h3>
<pre>
<a href="human.php#scarlet_doll">和蘭人形</a>・<a href="wolf.php#scarlet_wolf">紅狼</a>・<a href="fox.php#scarlet_fox">紅狐</a>・<a href="lovers.php#scarlet_angel">紅天使</a>・<a href="vampire.php#scarlet_vampire">屍鬼</a>・<a href="chiroptera.php#scarlet_chiroptera">紅蝙蝠</a>
</pre>

<h2 id="cursed_group">呪い能力者</h2>
<h3 id="voodoo">呪術能力者 (能動型)</h3>
<pre>
<a href="wolf.php#voodoo_mad">呪術師</a>・<a href="fox.php#voodoo_fox">九尾</a>
<a href="human.php#astray_wizard">左道使い</a>(<a href="wolf.php#voodoo_mad">呪術師</a>)
</pre>
<h3 id="cursed">呪い所持者 (受動型)</h3>
<pre>
<a href="human.php#cursed_brownie">祟神</a>・<a href="wolf.php#cursed_wolf">呪狼</a>・<a href="fox.php#cursed_fox">天狐</a>・<a href="lovers.php#cursed_angel">堕天使</a>・<a href="chiroptera.php#cursed_chiroptera">呪蝙蝠</a>・<a href="ogre.php#cursed_yaksa">滝夜叉姫</a>・<a href="duelist.php#cursed_avenger">がしゃどくろ</a>
</pre>

<h2 id="talk_convert">発言変換能力者</h2>
<h3 id="talk_convert_direct">直接型</h3>
<pre>
<a href="sub_role.php#liar_group">狼少年系</a>・<a href="sub_role.php#silent">無口</a>・<a href="sub_role.php#mower">草刈り</a>
</pre>
<h3 id="talk_convert_indirect">間接型</h3>
<pre>
<a href="chiroptera.php#spring_fairy">春妖精</a>・<a href="chiroptera.php#summer_fairy">夏妖精</a>・<a href="chiroptera.php#autumn_fairy">秋妖精</a>・<a href="chiroptera.php#winter_fairy">冬妖精</a>・<a href="chiroptera.php#greater_fairy">大妖精</a>・<a href="chiroptera.php#grass_fairy">草妖精</a>・<a href="chiroptera.php#sun_fairy">日妖精</a>
</pre>
<h3 id="talk_convert_cute">遠吠え置換型 (萌系)</h3>
<pre>
<a href="human.php#suspect">不審者</a>・<a href="human.php#cute_mage">萌占い師</a>・<a href="wolf.php#cute_wolf">萌狼</a>・<a href="fox.php#cute_fox">萌狐</a>・<a href="chiroptera.php#cute_chiroptera">萌蝙蝠</a>・<a href="duelist.php#cute_avenger">草履大将</a>・<a href="sub_role.php#cute_camouflage">魔が言</a>
</pre>

<h2 id="possessed">憑依能力者</h2>
<pre>
<a href="wolf.php#possessed_wolf">憑狼</a>・<a href="wolf.php#possessed_mad">犬神</a>・<a href="fox.php#possessed_fox">憑狐</a>
</pre>

<h2 id="possessed_limit">憑依制限能力者</h2>
<pre>
<a href="human.php#detective_common">探偵</a>・<a href="#revive_self">自己蘇生能力者</a>・<a href="#possessed">憑依能力者</a>
</pre>

<h2 id="seal">封印対象者</h2>
<pre>
<a href="human.php#seal_medium">封印師</a>参照
</pre>

<h2 id="sacrifice">身代わり能力者</h2>
<h3 id="sacrifice_active">能動型</h3>
<pre>
<a href="human.php#sacrifice_common">首領</a>・<a href="human.php#doll_master">人形遣い</a>・<a href="fox.php#sacrifice_fox">白蔵主</a>・<a href="vampire.php#sacrifice_vampire">吸血公</a>・<a href="chiroptera.php#boss_chiroptera">大蝙蝠</a>・<a href="ogre.php#sacrifice_ogre">酒呑童子</a>・<a href="sub_role.php#protected">庇護者</a>
</pre>
<h3 id="sacrifice_reactive">受動型</h3>
<pre>
<a href="lovers.php#sacrifice_angel">守護天使</a>・<a href="duelist.php#sacrifice_patron">身代わり地蔵</a>・<a href="mania.php#sacrifice_mania">影武者</a>・<a href="sub_role.php#psycho_infected">洗脳者</a>
</pre>

<h2 id="soul">役職鑑定能力者</h2>
<h3 id="soul_high">上位型</h3>
<pre>
<a href="human.php#soul_mage">魂の占い師</a>・<a href="human.php#soul_necromancer">雲外鏡</a>・<a href="human.php#soul_assassin">辻斬り</a>・<a href="wolf.php#tongue_wolf">舌禍狼</a>・<a href="vampire.php#soul_vampire">吸血姫</a>
<a href="human.php#soul_wizard">八卦見</a>(<a href="human.php#soul_mage">魂の占い師</a>・<a href="human.php#soul_assassin">辻斬り</a>)・<a href="human.php#awake_wizard">比丘尼</a>(<a href="human.php#soul_mage">魂の占い師</a>)・<a href="human.php#spiritism_wizard">交霊術師</a>(<a href="human.php#soul_necromancer">雲外鏡</a>)
<a href="human.php#pierrot_wizard">道化師</a>(<a href="human.php#soul_mage">魂の占い師</a>)
</pre>
<h3 id="soul_copy">コピー型</h3>
<pre>
<a href="human.php#widow_priest">未亡人</a>(<a href="sub_role.php#mind_sympathy">共感者</a>)・<a href="lovers.php#ark_angel">大天使</a>(<a href="sub_role.php#mind_sympathy">共感者</a>)・<a href="duelist.php#soul_patron">家神</a>・<a href="mania.php#mania_group">神話マニア系</a>・<a href="sub_role.php#mind_sympathy">共感者</a>
</pre>

<h2 id="last_words_limit">遺言制限能力者</h2>
<pre>
<a href="human.php#reporter">ブン屋</a>・<a href="human.php#soul_assassin">辻斬り</a>・<a href="human.php#evoke_scanner">イタコ</a>・<a href="human.php#escaper_group">逃亡者系</a>・<a href="sub_role.php#no_last_words">筆不精</a>・<a href="sub_role.php#possessed_exchange">交換憑依</a>
</pre>

<h2 id="dummy">夢能力者</h2>
<pre>
<a href="human.php#dummy_mage">夢見人</a>・<a href="human.php#dummy_necromancer">夢枕人</a>・<a href="human.php#dummy_priest">夢司祭</a>・<a href="human.php#dummy_guard">夢守人</a>・<a href="human.php#dummy_common">夢共有者</a>・<a href="human.php#dummy_poison">夢毒者</a>・<a href="human.php#dummy_scanner">幻視者</a>・<a href="chiroptera.php#dummy_chiroptera">夢求愛者</a>・<a href="mania.php#dummy_mania">夢語部</a>
</pre>

<h2 id="necromancer">霊能 (特殊判定)</h2>
<h3 id="necromancer_role">役職 (特殊人狼)</h3>
<pre>
<a href="wolf.php#boss_wolf">白狼</a>・<a href="wolf.php#mist_wolf">霧狼</a>・<a href="wolf.php#phantom_wolf">幻狼</a>・<a href="wolf.php#cursed_wolf">呪狼</a>・<a href="wolf.php#possessed_wolf">憑狼</a>
</pre>
<h3 id="necromancer_fox">妖狐</h3>
<pre>
<a href="fox.php#white_fox">白狐</a>・<a href="fox.php#black_fox">黒狐</a>・<a href="fox.php#mist_fox">霧狐</a>・<a href="fox.php#phantom_fox">幻狐</a>・<a href="fox.php#sacrifice_fox">白蔵主</a>・<a href="fox.php#possessed_fox">憑狐</a>・<a href="fox.php#cursed_fox">天狐</a>
</pre>
<h3 id="necromancer_child_fox">子狐</h3>
<pre>
<a href="fox.php#child_fox_group">子狐系</a>
</pre>
<h3 id="necromancer_chiroptera">蝙蝠</h3>
<pre>
<a href="vampire.php">吸血鬼陣営</a>・<a href="chiroptera.php#cute_chiroptera">萌蝙蝠</a>
</pre>
<h3 id="necromancer_ogre">鬼</h3>
<pre>
<a href="ogre.php">鬼陣営</a>
</pre>

<h2 id="trap">罠能力者</h2>
<h3 id="trap_day">処刑投票カウンター型</h3>
<pre>
<a href="human.php#trap_common">策士</a>
</pre>
<h3 id="trap_night">夜投票型</h3>
<pre>
<a href="wolf.php#trap_wolf">狡狼</a>・<a href="wolf.php#trap_mad">罠師</a>・<a href="wolf.php#snow_trap_mad">雪女</a>・<a href="fox.php#trap_fox">狡狐</a>
<a href="human.php#astray_wizard">左道使い</a>(<a href="wolf.php#snow_trap_mad">雪女</a>)
</pre>
</body></html>
