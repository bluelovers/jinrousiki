<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputRolePageHeader('出題者陣営');
?>
<p><a href="#rule">基本ルール</a></p>
<p>
<a href="#quiz_group">出題者系</a>
</p>

<h2 id="rule">基本ルール</h2>
<ol>
<li><a href="../spec.php#win">勝利条件</a>は「生存者が出題者陣営のみになっていること」です。</li>
<li>生存カウントは村人です。</li>
</ol>


<h2 id="quiz_group">出題者系</h2>
<p>
<a href="#quiz">出題者</a>
</p>

<h3 id="quiz">出題者 (占い結果：村人 / 霊能結果：村人) [Ver. 1.4.0 α2～]</h3>
<h4>[耐性] 人狼襲撃：無効 (クイズ村限定) / 毒：対象外</h4>
<pre>
<a href="../game_option.php#quiz">クイズ村</a>の GM です。闇鍋モードにも低確率で出現します。
決定能力を持っていますが、ルールの特殊なクイズ村以外ではまず勝ち目はありません。
引いたら諦めてください。

毒吊りで巻き込まれる対象になりません。
例えば、出題者・<a href="human.php#poison">埋毒者</a>・<a href="wolf.php#poison_wolf">毒狼</a>の編成で毒能力者を吊った場合は確実に出題者が生き残ります。
</pre>
<h4>処刑者決定法則</h4>
<ol>
<li><a href="../spec.php#vote_day">判定</a>は<a href="sub_role.php#decide_group">決定者系</a>の後。</li>
<li>複数の出題者が最多得票者に投票していた場合は、投票先が一致している場合のみ発動する。</li>
</ol>
<h5>Ver. 1.4.0 RC2～</h5>
<pre>
決定能力を持つ。
</pre>
<h5>Ver. 1.4.0 β2～</h5>
<pre>
毒中りの対象外に変更
</pre>
<h4>関連役職</h4>
<pre>
<a href="ogre.php#poison_ogre">榊鬼</a>・<a href="sub_role.php#panelist">解答者</a>・<a href="ability.php#decide">処刑者決定能力者</a>
</pre>
<h4>[作成者からのコメント]</h4>
<pre>
クイズ村以外では恋人になったほうがまだましという涙目すぎる存在ですが
闇鍋なので全役職を出します。一回くらいは奇跡的な勝利を見てみたいですね。
</pre>
</body></html>
