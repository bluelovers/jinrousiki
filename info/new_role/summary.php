<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
OutputHTMLHeader('新役職情報 - [一覧]', 'new_role');
?>
</head>
<body>

<h1>新役職情報</h1>
<ul><li>バージョンアップするたびに仕様が変わる可能性があります</li></ul>
<p>
<a target="_top" href="../">&lt;= 情報一覧</a>
<a target="_top" href="./">← メニュー</a>
<a href="#table">早見表</a>
<a href="ability.php">能力者逆引き</a>
<a href="#reference">参考リンク</a>
<a href="#memo">作成予定メモ</a>
</p>
<p>
<a href="human.php">村人陣営</a>
<a href="wolf.php">人狼陣営</a>
<a href="fox.php">妖狐陣営</a>
<a href="lovers.php">恋人陣営</a>
<a href="quiz.php">出題者陣営</a>
<a href="vampire.php">吸血鬼陣営</a>
</p>
<p>
<a href="chiroptera.php">蝙蝠陣営</a>
<a href="ogre.php">鬼陣営</a>
<a href="duelist.php">決闘者陣営</a>
<a href="mania.php">神話マニア陣営</a>
<a href="sub_role.php">サブ役職</a>
</p>

<h2 id="table">早見表</h2>
<p>
<a href="#main_role">メイン役職</a><br>
Ver. 1.4.0
<a href="#ver140a2">α2</a>
<a href="#ver140a3">α3-7</a>
<a href="#ver140a9">α9</a>
<a href="#ver140a11">α11</a>
<a href="#ver140a12">α12</a>
<a href="#ver140a13">α13</a>
<a href="#ver140a14">α14</a>
<a href="#ver140a17">α17</a>
<a href="#ver140a18">α18</a>
<a href="#ver140a19">α19</a>
<a href="#ver140a20">α20</a>
<a href="#ver140a21">α21</a>
<a href="#ver140a22">α22</a>
<a href="#ver140a23">α23</a>
<a href="#ver140a24">α24</a><br>
<a href="#ver140b2">β2</a>
<a href="#ver140b5">β5</a>
<a href="#ver140b6">β6</a>
<a href="#ver140b7">β7</a>
<a href="#ver140b8">β8</a>
<a href="#ver140b9">β9</a>
<a href="#ver140b10">β10</a>
<a href="#ver140b11">β11</a>
<a href="#ver140b12">β12</a>
<a href="#ver140b13">β13</a>
<a href="#ver140b14">β14</a>
<a href="#ver140b15">β15</a>
<a href="#ver140b16">β16</a>
<a href="#ver140b17">β17</a>
<a href="#ver140b18">β18</a>
<a href="#ver140b19">β19</a>
<a href="#ver140b20">β20</a>
<a href="#ver140b21">β21</a>
<a href="#ver140b22">β22</a><br>
Ver. 1.5.0
<a href="#ver150a1">α1</a>
<a href="#ver150a3">α3</a>
<a href="#ver150a4">α4</a>
<a href="#ver150a5">α5</a>
<a href="#ver150a6">α6</a>
<a href="#ver150a7">α7</a>
<a href="#ver150a8">α8</a>
<a href="#ver150a9">α9</a><br>
<a href="#ver150b1">β1</a>
<a href="#ver150b2">β2</a>
<a href="#ver150b3">β3</a>
<a href="#ver150b4">β4</a>
<a href="#ver150b6">β6</a>
<a href="#ver150b7">β7</a>
<a href="#ver150b8">β8</a>
<a href="#ver150b9">β9</a>
<a href="#ver150b10">β10</a>
<a href="#ver150b11">β11</a>
<a href="#ver150b12">β12</a>
<a href="#ver150b13">β13</a>
<a href="#ver150b14">β14</a>
<a href="#ver150b15">β15</a>
<a href="#ver150b16">β16</a>
<a href="#ver150b17">β17</a>
</p>

<p>
<a href="#sub_role">サブ役職</a><br>
Ver. 1.4.0
<a href="#sub_ver140a3">α3-7</a>
<a href="#sub_ver140a9">α9</a>
<a href="#sub_ver140a11">α11</a>
<a href="#sub_ver140a13">α13</a>
<a href="#sub_ver140a14">α14</a>
<a href="#sub_ver140a15">α15</a>
<a href="#sub_ver140a17">α17</a>
<a href="#sub_ver140a19">α19</a>
<a href="#sub_ver140a21">α21</a>
<a href="#sub_ver140a22">α22</a>
<a href="#sub_ver140a23">α23</a>
<a href="#sub_ver140a24">α24</a><br>
<a href="#sub_ver140b2">β2</a>
<a href="#sub_ver140b6">β6</a>
<a href="#sub_ver140b8">β8</a>
<a href="#sub_ver140b9">β9</a>
<a href="#sub_ver140b10">β10</a>
<a href="#sub_ver140b11">β11</a>
<a href="#sub_ver140b14">β14</a>
<a href="#sub_ver140b15">β15</a>
<a href="#sub_ver140b16">β16</a>
<a href="#sub_ver140b17">β17</a>
<a href="#sub_ver140b18">β18</a>
<a href="#sub_ver140b20">β20</a>
<a href="#sub_ver140b21">β21</a>
<a href="#sub_ver140b22">β22</a><br>
Ver. 1.5.0
<a href="#sub_ver150a5">α5</a>
<a href="#sub_ver150a9">α9</a><br>
<a href="#sub_ver150b1">β1</a>
<a href="#sub_ver150b3">β3</a>
<a href="#sub_ver150b4">β4</a>
<a href="#sub_ver150b6">β6</a>
<a href="#sub_ver150b7">β7</a>
<a href="#sub_ver150b11">β11</a>
<a href="#sub_ver150b14">β14</a>
</p>

<table id="main_role">
<caption>新役職早見表</caption>
<tr>
  <th>名称</th>
  <th>陣営</th>
  <th>所属</th>
  <th>占い結果</th>
  <th>霊能結果</th>
  <th>能力</th>
  <th>初登場</th>
</tr>
<tr id="ver140a2">
  <td><a href="quiz.php#quiz">出題者</a></td>
  <td><a href="quiz.php">出題者</a></td>
  <td><a href="quiz.php#quiz_group">出題者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">クイズ村の GM。</td>
  <td>Ver. 1.4.0 α2</td>
</tr>
<tr id="ver140a3">
  <td><a href="wolf.php#boss_wolf">白狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>村人</td>
  <td>白狼</td>
  <td class="ability">占い結果が「村人」、霊能結果が「白狼」と出る人狼。</td>
  <td>Ver. 1.4.0 α3-7</td>
</tr>
<tr>
  <td><a href="human.php#soul_mage">魂の占い師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">占った人の役職が分かる上位占い師。<br>妖狐を呪殺できないが呪返しは受ける。</td>
  <td>Ver. 1.4.0 α3-7</td>
</tr>
<tr>
  <td><a href="human.php#medium">巫女</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#medium_group">巫女系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">突然死した人の所属陣営が分かる。</td>
  <td>Ver. 1.4.0 α3-7</td>
</tr>
<tr>
  <td><a href="human.php#poison_guard">騎士</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">毒を持った上位狩人 (処刑時は毒は発動しない)。<br><a href="human.php#guard_limit">護衛制限</a>の影響を受けない。</td>
  <td>Ver. 1.4.0 α3-7</td>
</tr>
<tr>
  <td><a href="wolf.php#fanatic_mad">狂信者</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼が誰か分かる上位狂人 (人狼からは狂信者は分からない)。</td>
  <td>Ver. 1.4.0 α3-7</td>
</tr>
<tr>
  <td><a href="fox.php#child_fox">子狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability">呪殺されないが人狼に襲撃されると死亡する。<br>仲間は分かるが念話はできない。占いも出来るが時々失敗する。</td>
  <td>Ver. 1.4.0 α3-7</td>
</tr>
<tr id="ver140a9">
  <td><a href="human.php#suspect">不審者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#human_group">村人系</a></td>
  <td>人狼</td>
  <td>村人</td>
  <td class="ability">占い師に人狼と判定されてしまう村人 (本人表記は「<a href="human.php#human">村人</a>」)。<br>低確率で発言が遠吠えに入れ替わってしまう (<a href="wolf.php#cute_wolf">萌狼</a>と同じ)。</td>
  <td>Ver. 1.4.0 α9</td>
</tr>
<tr id="ver140a11">
  <td><a href="mania.php#mania">神話マニア</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#mania_group">神話マニア系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日の夜に誰か一人を選んでその人の役職をコピーする (入れ替わるのは 2 日目の朝)。</td>
  <td>Ver. 1.4.0 α11</td>
</tr>
<tr id="ver140a12">
  <td><a href="wolf.php#poison_wolf">毒狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">毒を持った人狼。毒の対象は<a href="wolf.php#wolf_group">人狼系</a>以外。</td>
  <td>Ver. 1.4.0 α12</td>
</tr>
<tr>
  <td><a href="human.php#pharmacist">薬師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#pharmacist_group">薬師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先の毒能力が分かり、処刑投票先が処刑されたら毒能力を無効化 (解毒) する。</td>
  <td>Ver. 1.4.0 α12</td>
</tr>
<tr id="ver140a13">
  <td><a href="human.php#unconscious">無意識</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#human_group">村人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に無意識であることが分かってしまう村人 (本人表記は「<a href="human.php#human">村人</a>」)。</td>
  <td>Ver. 1.4.0 α13</td>
</tr>
<tr>
  <td><a href="wolf.php#tongue_wolf">舌禍狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">襲撃に成功した人の役職が分かる人狼。</td>
  <td>Ver. 1.4.0 α13</td>
</tr>
<tr id="ver140a14">
  <td><a href="human.php#reporter">ブン屋</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">尾行した人が噛まれた場合に、噛んだ人狼が誰か分かる特殊な狩人。</td>
  <td>Ver. 1.4.0 α14</td>
</tr>
<tr>
  <td><a href="human.php#dummy_mage">夢見人</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">「村人」と「人狼」が反転した結果が出る占い師 (本人表記は「<a href="human.php#mage">占い師</a>」)。<br>
    呪殺できない代わりに呪いや占い妨害の影響を受けない。</td>
  <td>Ver. 1.4.0 α14</td>
</tr>
<tr>
  <td><a href="wolf.php#cute_wolf">萌狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">低確率で発言が遠吠えに入れ替わってしまう人狼。</td>
  <td>Ver. 1.4.0 α14</td>
</tr>
<tr id="ver140a17">
  <td><a href="human.php#dummy_necromancer">夢枕人</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">「村人」と「人狼」が反転した結果が出る霊能者 (本人表記は「<a href="human.php#necromancer">霊能者</a>」)。<br>
    <a href="wolf.php#corpse_courier_mad">火車</a>の妨害の影響を受けない。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="human.php#dummy_guard">夢守人</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">狩人と思い込んでいる村人 (本人表記は「<a href="human.php#guard">狩人</a>」)。<br>常に護衛成功メッセージが出るが誰も護衛していない。何らかの形で<a href="wolf.php#dream_eater_mad">獏</a>に接触した場合は狩ることができる。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="human.php#dummy_common">夢共有者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">「相方が身代わり君の<a href="human.php#common">共有者</a>」と思い込んでいる村人。<br>
    共有者の囁きが見えない。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="human.php#dummy_poison">夢毒者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">埋毒者と思い込んでいる村人 (本人表記は「<a href="human.php#poison">埋毒者</a>」)。<br>処刑された場合は<a href="wolf.php#dream_eater_mad">獏</a>・<a href="chiroptera.php#fairy_group">妖精系</a>のみ巻き込む (「解毒」はできない)。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="human.php#soul_necromancer">雲外鏡</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑した人の役職が分かる上位霊能者。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="human.php#strong_poison">強毒者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑された時の毒の対象が人外 (<a href="wolf.php#wolf_group">人狼系</a>と<a href="fox.php">妖狐陣営</a>) 限定の上位埋毒者 (本人表記は「<a href="human.php#poison">埋毒者</a>」)。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="human.php#incubate_poison">潜毒者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">時が経つと (5 日目以降) <a href="human.php#strong_poison">強毒者</a>相当の毒を持つ特殊な埋毒者。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="wolf.php#resist_wolf">抗毒狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">一度だけ毒に耐えられる人狼。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="wolf.php#cursed_wolf">呪狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼<br>(呪返し)</td>
  <td>呪狼</td>
  <td class="ability">呪いを持った人狼。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="wolf.php#whisper_mad">囁き狂人</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼の夜の相談に参加できる上位狂人。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="fox.php#cursed_fox">天狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪返し)</td>
  <td>妖狐</td>
  <td class="ability">呪い・<a href="human.php#assassin_spec">暗殺反射</a>能力を持った妖狐。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="fox.php#poison_fox">管狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">毒を持った妖狐。毒の対象は<a href="fox.php">妖狐陣営</a>以外。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr>
  <td><a href="fox.php#white_fox">白狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>妖狐</td>
  <td class="ability">呪殺されない代わりに人狼に襲撃されると死亡する妖狐。</td>
  <td>Ver. 1.4.0 α17</td>
</tr>
<tr id="ver140a18">
  <td><a href="human.php#poison_cat">猫又</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_cat_group">猫又系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">蘇生能力を持った特殊な埋毒者。</td>
  <td>Ver. 1.4.0 α18</td>
</tr>
<tr>
  <td><a href="human.php#assassin">暗殺者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜に村人を暗殺できる村人。<br>
  人外 (狼や狐) でも暗殺できるが狩人の護衛を受けられない。</td>
  <td>Ver. 1.4.0 α18</td>
</tr>
<tr>
  <td><a href="human.php#psycho_mage">精神鑑定士</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">「嘘つき」を探し出す特殊な占い師</td>
  <td>Ver. 1.4.0 α18</td>
</tr>
<tr>
  <td><a href="wolf.php#trap_mad">罠師</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一度だけ、夜に誰か一人に罠を仕掛けることができる特殊な狂人。</td>
  <td>Ver. 1.4.0 α18</td>
</tr>
<tr id="ver140a19">
  <td><a href="wolf.php#jammer_mad">月兎</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜に投票した人の占い能力を妨害する特殊な狂人。</td>
  <td>Ver. 1.4.0 α19</td>
</tr>
<tr>
  <td><a href="human.php#sex_mage">ひよこ鑑定士</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">性別を判別する特殊な占い師。</td>
  <td>Ver. 1.4.0 α19</td>
</tr>
<tr id="ver140a20">
  <td><a href="wolf.php#voodoo_mad">呪術師</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜の投票先に呪いをかける特殊な狂人。</td>
  <td>Ver. 1.4.0 α20</td>
</tr>
<tr>
  <td><a href="fox.php#voodoo_fox">九尾</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">夜の投票先に呪いをかける妖狐。</td>
  <td>Ver. 1.4.0 α20</td>
</tr>
<tr>
  <td><a href="human.php#anti_voodoo">厄神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">護衛した人の厄 (占い妨害、呪返し、憑依) を祓う特殊な狩人。<br>
    成功した場合は次の日に専用のシステムメッセージが表示される。
  </td>
  <td>Ver. 1.4.0 α20</td>
</tr>
<tr>
  <td><a href="human.php#voodoo_killer">陰陽師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">対呪い専門の特殊な占い師。</td>
  <td>Ver. 1.4.0 α20</td>
</tr>
<tr>
  <td><a href="human.php#yama_necromancer">閻魔</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">前日の死者の死因が分かる特殊な霊能者。</td>
  <td>Ver. 1.4.0 α20</td>
</tr>
<tr>
  <td><a href="fox.php#silver_fox">銀狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">仲間が分からない妖狐。</td>
  <td>Ver. 1.4.0 α20</td>
</tr>
<tr id="ver140a21">
  <td><a href="lovers.php#self_cupid">求愛者</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分撃ち固定のキューピッド。矢を打った相手に<a href="sub_role.php#mind_receiver">受信者</a>が追加される。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr>
  <td><a href="chiroptera.php#chiroptera">蝙蝠</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">生き残ったら勝利になる。他陣営の勝敗とは競合しない。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr>
  <td><a href="chiroptera.php#poison_chiroptera">毒蝙蝠</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">劣化<a href="human.php#strong_poison">強毒者</a>相当の毒を持った蝙蝠。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr>
  <td><a href="chiroptera.php#cursed_chiroptera">呪蝙蝠</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>村人<br>(呪返し)</td>
  <td>村人</td>
  <td class="ability">呪いを持った蝙蝠。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr>
  <td><a href="wolf.php#silver_wolf">銀狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">仲間が分からない人狼。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr>
  <td><a href="human.php#mind_scanner">さとり</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日の夜に誰か一人を選んでその人を<a href="sub_role.php#mind_read">サトラレ</a>にする。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr>
  <td><a href="wolf.php#corpse_courier_mad">火車</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が処刑されたら霊能結果を隠蔽できる特殊な狂人。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr>
  <td><a href="wolf.php#dream_eater_mad">獏</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜の投票先が夢系能力者・<a href="chiroptera.php#fairy_group">妖精系</a>なら殺すことができる特殊な狂人。</td>
  <td>Ver. 1.4.0 α21</td>
</tr>
<tr id="ver140a22">
  <td><a href="human.php#jealousy">橋姫</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票時に、同一キューピッドの恋人が揃って自分に投票したら投票した恋人をショック死させる。</td>
  <td>Ver. 1.4.0 α22</td>
</tr>
<tr id="ver140a23">
  <td><a href="mania.php#unknown_mania">鵺</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#unknown_mania_group">鵺系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日の夜に誰か一人を選んでその人と同じ所属陣営にする。<br>
   自分と投票先に<a href="sub_role.php#mind_friend">共鳴者</a>がつく (結果が表示されるのは 2 日目の朝)。</td>
  <td>Ver. 1.4.0 α23</td>
</tr>
<tr>
  <td><a href="lovers.php#mind_cupid">女神</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を撃った二人を<a href="sub_role.php#mind_friend">共鳴者</a>にする上位キューピッド。<br>
    他人撃ちの場合は、さらに自分が二人の<a href="sub_role.php#mind_receiver">受信者</a>になる。</td>
  <td>Ver. 1.4.0 α23</td>
</tr>
<tr id="ver140a24">
  <td><a href="human.php#priest">司祭</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一定日数ごとに現在の生存している村人陣営の人数が分かる。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr>
  <td><a href="fox.php#scarlet_fox">紅狐</a></td>
  <td><a href="fox.php">妖狐</td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability"><a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える妖狐。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr>
  <td><a href="wolf.php#wise_wolf">賢狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability"><a href="fox.php#talk">妖狐の念話</a>が<a href="human.php#common_group">共有者</a>の囁きに変換されて聞こえる人狼。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr>
  <td><a href="wolf.php#possessed_wolf">憑狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>憑狼</td>
  <td class="ability">襲撃に成功した人を乗っ取る人狼。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr>
  <td><a href="fox.php#cute_fox">萌狐</a></td>
  <td><a href="fox.php">妖狐</td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">低確率で発言が遠吠えに入れ替わってしまう妖狐。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr>
  <td><a href="fox.php#black_fox">黒狐</a></td>
  <td><a href="fox.php">妖狐</td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>人狼<br>(呪殺無し)</td>
  <td>妖狐</td>
  <td class="ability">占い結果が「人狼」、霊能結果が「妖狐」と判定される妖狐。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr>
  <td><a href="wolf.php#scarlet_wolf">紅狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability"><a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える人狼。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr>
  <td><a href="chiroptera.php#dummy_chiroptera">夢求愛者</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">本人には<a href="lovers.php#self_cupid">求愛者</a>と表示されている蝙蝠。<br>矢を撃つことはできるが恋人にはならず、<a href="sub_role.php#mind_receiver">受信者</a>もつかない。</td>
  <td>Ver. 1.4.0 α24</td>
</tr>
<tr id="ver140b2">
  <td><a href="human.php#crisis_priest">預言者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">今が「人外勝利前日」が分かる特殊な司祭。本人表記は「<a href="human.php#human">村人</a>」。</td>
  <td>Ver. 1.4.0 β2</td>
</tr>
<tr>
  <td><a href="human.php#revive_priest">天人</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">二日目の朝にいきなり死亡して、一定の条件を満たすと生き返る特殊な司祭。</td>
  <td>Ver. 1.4.0 β2</td>
</tr>
<tr>
  <td><a href="human.php#evoke_scanner">イタコ</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日の夜に誰か一人を選んでその人を<a href="sub_role.php#mind_evoke">口寄せ</a>にする。</td>
  <td>Ver. 1.4.0 β2</td>
</tr>
<tr>
  <td><a href="human.php#revive_cat">仙狸</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_cat_group">猫又系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">毒能力を失った代わりに高い蘇生能力を持った猫又の上位種。</td>
  <td>Ver. 1.4.0 β2</td>
</tr>
<tr>
  <td><a href="fox.php#revive_fox">仙狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">一度だけ成功率 100% の蘇生ができる妖狐。</td>
  <td>Ver. 1.4.0 β2</td>
</tr>
<tr id="ver140b5">
  <td><a href="human.php#elder">長老</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#human_group">村人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票数が +1 される村人。</td>
  <td>Ver. 1.4.0 β5</td>
</tr>
<tr>
  <td><a href="wolf.php#elder_wolf">古狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">処刑投票数が +1 される人狼。</td>
  <td>Ver. 1.4.0 β5</td>
</tr>
<tr>
  <td><a href="fox.php#elder_fox">古狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">処刑投票数が +1 される妖狐。</td>
  <td>Ver. 1.4.0 β5</td>
</tr>
<tr>
  <td><a href="chiroptera.php#elder_chiroptera">古蝙蝠</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票数が +1 される蝙蝠。</td>
  <td>Ver. 1.4.0 β5</td>
</tr>
<tr>
  <td><a href="human.php#fend_guard">忍者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一度だけ人狼の襲撃を耐える事ができる狩人。</td>
  <td>Ver. 1.4.0 β5</td>
</tr>
<tr id="ver140b6">
  <td><a href="human.php#trap_common">策士</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">村人陣営以外の人全てから投票されたらまとめて死亡させる上位共有者。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="chiroptera.php#fairy">妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票先の発言の先頭に共有者の囁きを追加する。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="chiroptera.php#spring_fairy">春妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票先の発言の先頭に「春ですよー」を追加する妖精。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="chiroptera.php#summer_fairy">夏妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票先の発言の先頭に「夏ですよー」を追加する妖精。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="chiroptera.php#autumn_fairy">秋妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票先の発言の先頭に「秋ですよー」を追加する妖精。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="chiroptera.php#winter_fairy">冬妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票先の発言の先頭に「冬ですよー」を追加する妖精。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="human.php#ghost_common">亡霊嬢</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="wolf.php#wolf_group">人狼</a>に襲撃されたら襲撃してきた人狼に<a href="sub_role.php#chicken">小心者</a>を付加する上位共有者。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="human.php#poison_jealousy">毒橋姫</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">恋人のみに中る埋毒者。本人表記は「<a href="human.php#poison">埋毒者</a>」。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr>
  <td><a href="human.php#chain_poison">連毒者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">他の毒能力者に巻き込まれたら、さらに二人巻き込む特殊な埋毒者。本人表記は「<a href="human.php#human">村人</a>」。</td>
  <td>Ver. 1.4.0 β6</td>
</tr>
<tr id="ver140b7">
  <td><a href="human.php#saint">聖女</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#human_group">村人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">再投票の最多得票者になった場合に、内訳によって処刑する人を変化させる村人。本人表記は「<a href="human.php#human">村人</a>」。</td>
  <td>Ver. 1.4.0 β7</td>
</tr>
<tr>
  <td><a href="wolf.php#agitate_mad">扇動者</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">再投票の最多得票者に投票していた場合に、投票先を処刑し、それ以外の最多得票者をまとめてショック死させる特殊な狂人。</td>
  <td>Ver. 1.4.0 β7</td>
</tr>
<tr>
  <td><a href="chiroptera.php#light_fairy">光妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票先が人狼に襲撃されたら、次の日を「白夜」(全員<a href="sub_role.php#mind_open">公開者</a>) にする妖精。</td>
  <td>Ver. 1.4.0 β7</td>
</tr>
<tr>
  <td><a href="chiroptera.php#dark_fairy">闇妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票先が人狼に襲撃されたら、次の日の昼を「宵闇」(全員<a href="sub_role.php#blinder">目隠し</a>) にする妖精。</td>
  <td>Ver. 1.4.0 β7</td>
</tr>
<tr>
  <td><a href="chiroptera.php#mirror_fairy">鏡妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">本人が処刑されたら、次の日の昼を「決選投票」(初日に投票した二人にしか投票できない) にする妖精。</td>
  <td>Ver. 1.4.0 β7</td>
</tr>
<tr id="ver140b8">
  <td><a href="wolf.php#emerald_wolf">翠狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">襲撃した人が人狼だった場合に自分と<a href="sub_role.php#mind_friend">共鳴者</a>にする人狼。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="wolf.php#blue_wolf">蒼狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">襲撃した人が<a href="fox.php#silver_fox">銀狐</a>以外の噛み殺せない妖狐だった場合に<a href="sub_role.php#mind_lonely">はぐれ者</a>を付加する人狼。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="fox.php#emerald_fox">翠狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">一度だけ、占った人が念話できない妖狐だった場合に自分と占った人を<a href="sub_role.php#mind_friend">共鳴者</a>にする妖狐。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="fox.php#blue_fox">蒼狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されたら襲撃してきた人狼を<a href="sub_role.php#mind_lonely">はぐれ者</a>にする妖狐。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="wolf.php#gold_wolf">金狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability"><a href="human.php#sex_mage">ひよこ鑑定士</a>の判定が「<a href="chiroptera.php">蝙蝠</a>」になる人狼。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="fox.php#gold_fox">金狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#sex_mage">ひよこ鑑定士</a>の判定が「<a href="chiroptera.php">蝙蝠</a>」になる妖狐。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="wolf.php#sex_wolf">雛狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">襲撃に成功した人の性別が分かるが、噛み殺せない人狼。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="fox.php#sex_fox">雛狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability"><a href="human.php#sex_mage">ひよこ鑑定士</a>相当の能力を持つ子狐。成功率は 70%。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="lovers.php#angel">天使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を撃った二人が男女だった場合に<a href="sub_role.php#mind_sympathy">共感者</a>を付加するキューピッド。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="lovers.php#rose_angel">薔薇天使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を撃った二人が男性同士だった場合に<a href="sub_role.php#mind_sympathy">共感者</a>を付加するキューピッド。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="lovers.php#lily_angel">百合天使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を撃った二人が女性同士だった場合に<a href="sub_role.php#mind_sympathy">共感者</a>を付加するキューピッド。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="lovers.php#ark_angel">大天使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">他の人が作成した<a href="sub_role.php#mind_sympathy">共感者</a>の結果を見ることができる上位天使。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr>
  <td><a href="lovers.php#triangle_cupid">小悪魔</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を三本撃てるキューピッド。</td>
  <td>Ver. 1.4.0 β8</td>
</tr>
<tr id="ver140b9">
  <td><a href="human.php#reverse_assassin">反魂師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜に選んだ人が生きていたら暗殺、死んでいたら蘇生する特殊な暗殺者。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="wolf.php#miasma_mad">土蜘蛛</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先に<a href="sub_role.php#febris">熱病</a>を付加する特殊な狂人。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#cure_pharmacist">河童</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#pharmacist_group">薬師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">投票投票先の人を解毒・ショック死抑制する特殊な薬師。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#executor">執行者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#human_group">村人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">再投票発生時に非村人に投票していた場合は処刑できる村人。本人表記は「<a href="human.php#human">村人</a>」。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="wolf.php#possessed_mad">犬神</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一度だけ、死体に憑依できる特殊な狂人。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="fox.php#possessed_fox">憑狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>妖狐</td>
  <td class="ability">一度だけ、死体に憑依できる妖狐。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#sacrifice_cat">猫神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_cat_group">猫又系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分の命と引き換えに誤爆なし、成功率100%の蘇生ができる特殊な猫又</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="wolf.php#sirius_wolf">天狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">仲間の狼が減ると特殊能力が発現する狼。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#eclipse_assassin">蝕暗殺者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">30% の確率で暗殺反射が発生する劣化暗殺者。本人表記は「<a href="human.php#assassin">暗殺者</a>」。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="mania.php#trick_mania">奇術師</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#mania_group">神話マニア系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">コピー先が「初日投票をしてなかった」場合はその役職を奪い取り、コピー先はその系統の基本職に入れ替わってしまう特殊な神話マニア。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr>
  <td><a href="chiroptera.php#boss_chiroptera">大蝙蝠</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>蝙蝠</td>
  <td>村人</td>
  <td class="ability">身代わり能力を持った上位蝙蝠。</td>
  <td>Ver. 1.4.0 β9</td>
</tr>
<tr id="ver140b10">
  <td><a href="human.php#doll">上海人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">他の国で言う「奴隷」。<br>勝利条件は「<a href="human.php#doll_master">人形遣い</a>が全員死亡している + 村人陣営の勝利」で、自身の生死は不問。<br>
    <href="human.php#doll_master">人形遣い</a>が人狼に襲撃されたら代わりに死亡する。</td>
  <td>Ver. 1.4.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#doll_master">人形遣い</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">他の国で言う「貴族」。<br>人狼に襲撃された時、他の人形遣い以外の人形系の人を身代わりして生き延びることができる。</td>
  <td>Ver. 1.4.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#poison_doll">鈴蘭人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">毒を持った人形。毒の対象は<a href="human.php#doll_group">上海人形系</a>以外 (<a href="human.php#doll_master">人形遣い</a>には中る)。</td>
  <td>Ver. 1.4.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#friend_doll">仏蘭西人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">他の人形が誰か分かる人形。</td>
  <td>Ver. 1.4.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#detective_common">探偵</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">毒無効・暗殺反射などの様々な特殊耐性を持つ、上位共有者。</td>
  <td>Ver. 1.4.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#doom_assassin">死神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">暗殺成立時に<a href="sub_role.php#death_warrant">死の宣告</a>を付加する特殊な暗殺者。</td>
  <td>Ver. 1.4.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#bishop_priest">司教</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一定日数ごとに現在の死亡している村人陣営以外の人数が分かる、特殊な司祭。</td>
  <td>Ver. 1.4.0 β10</td>
</tr>
<tr id="ver140b11">
  <td><a href="lovers.php#exchange_angel">魂移使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を撃った二人を交換憑依させてしまうキューピッド。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="mania.php#soul_mania">覚醒者</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#mania_group">神話マニア系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">4日目にコピー先の上位種に変化する、特殊な神話マニア。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="mania.php#dummy_mania">夢語部</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#mania_group">神話マニア系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">4日目にコピー先の基本・劣化種に変化する、特殊な神話マニア。<br>
  本人表記は「<a href="mania.php#soul_mania">覚醒者</a>」で、変化前に<a href="wolf.php#dream_eater_mad">獏</a>に襲撃されると殺される。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="wolf.php#phantom_wolf">幻狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>幻狼</td>
  <td class="ability">一度だけ、自分が占われても占い妨害をする事ができる人狼。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="fox.php#phantom_fox">幻狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>妖狐</td>
  <td class="ability">一度だけ、自分が占われても占い妨害をする事ができる妖狐。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="human.php#guide_poison">誘毒者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">毒能力者のみに中る特殊な埋毒者。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="human.php#escaper">逃亡者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">2日目の夜以降、生きている誰かの側に逃亡して生存を図ろうとする村人。<br>
  勝利条件は「村人陣営の勝利」＋「自身の生存」。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="human.php#whisper_scanner">囁騒霊</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">2日目夜以降、<a href="human.php#common_group">共有者系</a>に一方的に声が届く特殊なさとり。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="human.php#howl_scanner">吠騒霊</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">2日目夜以降、<a href="wolf.php#talk">人狼系</a>に一方的に声が届く特殊なさとり。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="human.php#telepath_scanner">念騒霊</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">2日目夜以降、<a href="fox.php#talk">妖狐系</a>に一方的に声が届く特殊なさとり。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr>
  <td><a href="lovers.php#moon_cupid">かぐや姫</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分撃ち固定で、矢を撃った二人に<a href="sub_role.php#challenge_lovers">難題</a>を付加するキューピッド。自分に<a href="sub_role.php#mind_receiver">受信者</a>が付く。</td>
  <td>Ver. 1.4.0 β11</td>
</tr>
<tr id="ver140b12">
  <td><a href="wolf.php#hungry_wolf">餓狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability"><a href="wolf.php#wolf_group">人狼系</a>と<a href="fox.php">妖狐陣営</a>しか噛み殺せない人狼。</td>
  <td>Ver. 1.4.0 β12</td>
</tr>
<tr>
  <td><a href="human.php#stargazer_mage">占星術師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜の投票能力の有無を判別する特殊な占い師。</td>
  <td>Ver. 1.4.0 β12</td>
</tr>
<tr>
  <td><a href="human.php#border_priest">境界師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">二日目以降、「夜、自分に何らかの投票をした人の数」が分かる、特殊な司祭。</td>
  <td>Ver. 1.4.0 β12</td>
</tr>
<tr>
  <td><a href="chiroptera.php#flower_fairy">花妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">悪戯が成功すると、花に関するメッセージを死亡メッセージ欄に表示できる妖精。</td>
  <td>Ver. 1.4.0 β12</td>
</tr>
<tr id="ver140b13">
  <td><a href="human.php#doom_doll">蓬莱人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">吊られた時に、自分に投票した人からランダムで一人に<a href="sub_role.php#death_warrant">死の宣告</a>を付加する人形。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="fox.php#miasma_fox">蟲狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability">処刑されるか人狼に襲撃されたら<a href="sub_role.php#febris">熱病</a>を付加する子狐。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="fox.php#jammer_fox">月狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability"><a href="wolf.php#jammer_mad">月兎</a>相当の能力を持つ子狐。成功率は 70%。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="fox.php#stargazer_fox">星狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability"><a href="human.php#stargazer_mage">占星術師</a>相当の能力を持つ子狐。成功率は 70%。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="chiroptera.php#sun_fairy">日妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">悪戯先が人狼に襲撃されたら、次の日の昼を全員<a href="sub_role.php#invisible">光学迷彩</a>にする妖精。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="chiroptera.php#moon_fairy">月妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">悪戯先が人狼に襲撃されたら、次の日の昼を全員<a href="sub_role.php#earplug">耳栓</a>にする妖精。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="chiroptera.php#star_fairy">星妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">悪戯が成功すると、星に関するメッセージを死亡メッセージ欄に表示できる妖精。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="chiroptera.php#grass_fairy">草妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">悪戯先が人狼に襲撃されたら、次の日の昼を全員<a href="sub_role.php#grassy">草原迷彩</a>にする妖精。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="human.php#hunter_guard">猟師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">妖狐も狩る事ができる特殊な狩人。護衛先が人狼に襲撃されたら本人は殺される。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="human.php#soul_assassin">辻斬り</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">暗殺した人の役職を知る事ができる上位暗殺者。毒能力者を暗殺したら本人は毒死する。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="human.php#seal_medium">封印師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#medium_group">巫女系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が回数限定の能力を持っている人外の場合に封じることができる上位巫女。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr>
  <td><a href="human.php#revive_medium">風祝</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#medium_group">巫女系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#poison_cat">猫又</a>相当の蘇生能力を持った上位巫女。</td>
  <td>Ver. 1.4.0 β13</td>
</tr>
<tr id="ver140b14">
  <td><a href="human.php#blind_guard">夜雀</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#guard_hunt">狩り能力</a>は持たないが、護衛先を襲撃した人狼に<a href="sub_role.php#blinder">目隠し</a>を付加する特殊な狩人。<br>
    <a href="human.php#guard_limit">護衛制限</a>の影響を受けない。
  </td>
  <td>Ver. 1.4.0 β14</td>
</tr>
<tr>
  <td><a href="vampire.php#vampire">吸血鬼</a></td>
  <td><a href="vampire.php">吸血鬼</a></td>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td>蝙蝠</td>
  <td>蝙蝠</td>
  <td class="ability">他国で言うカルトリーダー相当。</td>
  <td>Ver. 1.4.0 β14</td>
</tr>
<tr id="ver140b15">
  <td><a href="wolf.php#doom_wolf">冥狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">襲撃に成功した人を噛み殺す代わりに<a href="sub_role.php#death_warrant">死の宣告</a>を付加する人狼。</td>
  <td>Ver. 1.4.0 β15</td>
</tr>
<tr>
  <td><a href="fox.php#doom_fox">冥狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">遅効性の<a href="human.php#doom_assassin">死神</a>相当の暗殺能力を持った妖狐。</td>
  <td>Ver. 1.4.0 β15</td>
</tr>
<tr>
  <td><a href="human.php#brownie">座敷童子</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">役職「村人」の処刑投票数を +1 する、座敷童子系の基本種<br>
    処刑されたら投票した人からランダムで一人に<a href="sub_role.php#febris">熱病</a>を付加する。
  </td>
  <td>Ver. 1.4.0 β15</td>
</tr>
<tr>
  <td><a href="human.php#dowser_priest">探知師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一定日数ごとに現在の生存者が所持している<a href="sub_role.php">サブ役職</a>の総数が分かる特殊な司祭。</td>
  <td>Ver. 1.4.0 β15</td>
</tr>
<tr>
  <td><a href="human.php#dummy_priest">夢司祭</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一定日数ごとに現在、生きている<a href="ability.php#dummy">夢系能力者</a>と<a href="chiroptera.php#fairy_group">妖精系</a>の人数が分かる特殊な司祭。<br>
    本人表記は<a href="human.php#priest">司祭</a>で仕様も同じ。</td>
  <td>Ver. 1.4.0 β15</td>
</tr>
<tr>
  <td><a href="human.php#revive_pharmacist">仙人</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#pharmacist_group">薬師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先の人のショック死を抑制する特殊な薬師。<br>
    人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する。</td>
  <td>Ver. 1.4.0 β15</td>
</tr>
<tr>
  <td><a href="wolf.php#therian_mad">獣人</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されたら「人狼」に変化する、特殊な狂人。</td>
  <td>Ver. 1.4.0 β15</td>
</tr>
<tr id="ver140b16">
  <td><a href="human.php#history_brownie">白澤</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されたら次の日の夜を飛ばしてしまう、座敷童子の亜種。</td>
  <td>Ver. 1.4.0 β16</td>
</tr>
<tr>
  <td><a href="wolf.php#snow_trap_mad">雪女</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="sub_role.php#frostbite">凍傷</a>になる罠を何回でも仕掛けることができる特殊な狂人。</td>
  <td>Ver. 1.4.0 β16</td>
</tr>
<tr>
  <td><a href="chiroptera.php#ice_fairy">氷妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">悪戯先に<a href="sub_role.php#frostbite">凍傷</a>を付加する妖精。</td>
  <td>Ver. 1.4.0 β16</td>
</tr>
<tr id="ver140b17">
  <td><a href="wolf.php#enchant_mad">狢</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜の投票先が人狼に襲撃されたら、次の日、全員のアイコンを襲撃された人にする特殊な狂人。</td>
  <td>Ver. 1.4.0 β17</td>
</tr>
<tr>
  <td><a href="fox.php#howl_fox">化狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability">夜の独り言が人狼の遠吠えに見える子狐。</td>
  <td>Ver. 1.4.0 β17</td>
</tr>
<tr>
  <td><a href="human.php#priest_jealousy">恋司祭</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一定日数ごとに現在、生きている恋人の人数が分かる特殊な司祭 (所属は橋姫系)。<br>
    本人表記は<a href="human.php#priest">司祭</a>で仕様も同じ。</td>
  <td>Ver. 1.4.0 β17</td>
</tr>
<tr>
  <td><a href="human.php#eclipse_cat">蝕仙狸</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_cat_group">猫又系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">誤爆率が高めに設定された猫又の劣化種。本人表記は「<a href="human.php#revive_cat">仙狸</a>」。</td>
  <td>Ver. 1.4.0 β17</td>
</tr>
<tr>
  <td><a href="vampire.php#sacrifice_vampire">吸血公</a></td>
  <td><a href="vampire.php">吸血鬼</a></td>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td>蝙蝠</td>
  <td>蝙蝠</td>
  <td class="ability">身代わり能力を持つ上位吸血鬼。</td>
  <td>Ver. 1.4.0 β17</td>
</tr>
<tr id="ver140b18">
  <td><a href="lovers.php#sacrifice_angel">守護天使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を撃った相手に<a href="sub_role.php#mind_sympathy">共感者</a>と<a href="sub_role.php#protected">庇護者</a>を付加する上位天使。人狼に襲撃されても死亡しない (襲撃は失敗扱い)。
  </td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr>
  <td><a href="mania.php#sacrifice_mania">影武者</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#unknown_mania_group">鵺系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">コピー先に<a href="sub_role.php#protected">庇護者</a>を付加する上位鵺。<br>人狼に襲撃されても死亡しない (襲撃は失敗扱い)。
  </td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr>
  <td><a href="human.php#presage_scanner">件</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日の夜に誰か一人を選んでその人を<a href="sub_role.php#mind_presage">受託者</a>にする。<br>
    自分が人狼に殺されたら<a href="sub_role.php#mind_presage">受託者</a>に誰が襲撃したかメッセージが届く。
  </td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr>
  <td><a href="ogre.php#ogre">鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼陣営の基本種。勝利条件は自分自身と<a href="wolf.php#wolf_group">人狼系</a> (種類・恋人不問) の生存。
  </td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr>
  <td><a href="ogre.php#orange_ogre">前鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + <a href="wolf.php">人狼陣営</a>の全滅」。
  </td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr>
  <td><a href="ogre.php#indigo_ogre">後鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + <a href="fox.php">妖狐陣営</a>の全滅」。
  </td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr>
  <td><a href="vampire.php#incubus_vampire">青髭公</a></td>
  <td><a href="vampire.php">吸血鬼</a></td>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td>蝙蝠</td>
  <td>蝙蝠</td>
  <td class="ability">女性しか<a href="sub_role.php#infected">感染者</a>にできない特殊な吸血鬼。</td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr>
  <td><a href="vampire.php#succubus_vampire">飛縁魔</a></td>
  <td><a href="vampire.php">吸血鬼</a></td>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td>蝙蝠</td>
  <td>蝙蝠</td>
  <td class="ability">男性しか<a href="sub_role.php#infected">感染者</a>にできない特殊な吸血鬼。</td>
  <td>Ver. 1.4.0 β18</td>
</tr>
<tr id="ver140b19">
  <td><a href="human.php#divorce_jealousy">縁切地蔵</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分に処刑投票してきた恋人に一定確率 (40%) で<a href="sub_role.php#passion">恋色迷彩</a>を付加する特殊な橋姫。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#poison_ogre">榊鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「<a href="quiz.php">出題者陣営</a>の勝利、または自分自身の生存」。<br>
    劣化<a href="human.php#strong_poison">強毒者</a>相当の毒を持ち、<a href="ogre.php#ogre_do">人攫い</a>の効果が<a href="sub_role.php#panelist">解答者</a>の付加になる。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="vampire.php#doom_vampire">冥血鬼</a></td>
  <td><a href="vampire.php">吸血鬼</a></td>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td>蝙蝠</td>
  <td>蝙蝠</td>
  <td class="ability"><a href="wolf.php#wolf_group">人狼</a>の襲撃を無効化するが、吸血先に<a href="sub_role.php#infected">感染者</a>と<a href="sub_role.php#death_warrant">死の宣告</a>を同時につけてしまう吸血鬼。</td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="vampire.php#soul_vampire">吸血姫</a></td>
  <td><a href="vampire.php">吸血鬼</a></td>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td>蝙蝠</td>
  <td>蝙蝠</td>
  <td class="ability"><a href="human.php#assassin_spec">暗殺反射</a>を持ち、<a href="vampire.php#infected">感染者</a>の役職が分かる上位吸血鬼。</td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="wolf.php#amaze_mad">傘化け</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が処刑されたら投票結果を隠蔽できる特殊な狂人。</td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#west_ogre">金鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + 自分と同列の左側にいる人の全滅 + 村人陣営の勝利」。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#east_ogre">風鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + 自分と同列の右側にいる人の全滅 + 村人陣営の勝利」。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#north_ogre">水鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + 自分と同列の上側にいる人の全滅 + 村人陣営の勝利」。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#south_ogre">隠行鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + 自分と同列の下側にいる人の全滅 + 村人陣営の勝利」。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#yaksa">夜叉</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">人攫い能力が限定された鬼系の一種で、勝利条件は「自分自身の生存 + <a href="wolf.php#wolf_group">人狼系</a> (恋人を含む) の全滅」。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#incubus_ogre">般若</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + 女性の全滅」。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr>
  <td><a href="ogre.php#succubus_yaksa">荼枳尼天</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">夜叉系の一種で、勝利条件は「自分自身の生存 + 男性の全滅」。
  </td>
  <td>Ver. 1.4.0 β19</td>
</tr>
<tr id="ver140b20">
  <td><a href="human.php#attempt_necromancer">蟲姫</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">前日の<a href="wolf.php#wolf_group">人狼系</a>・<a href="ability.php#assassin">暗殺能力者</a>に狙われて生き残った人と<a href="ability.php#revive">蘇生</a>に失敗した人が分かる特殊な霊能者。
  </td>
  <td>Ver. 1.4.0 β20</td>
</tr>
<tr>
  <td><a href="ogre.php#sacrifice_ogre">酒呑童子</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + 村人陣営以外の勝利」。<br>
    <a href="ogre.php#ogre_do">人攫い</a>の効果が<a href="sub_role.php#psycho_infected">洗脳者</a>の付加になり、人狼に襲撃されたら<a href="sub_role.php#psycho_infected">洗脳者</a>を身代わりにして生き延びることができる
。
  </td>
  <td>Ver. 1.4.0 β20</td>
</tr>
<tr>
  <td><a href="human.php#cursed_brownie">祟神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人<br>(呪返し)</td>
  <td>村人</td>
  <td class="ability">呪いをもった座敷童子の亜種。処刑投票されるか人狼に襲撃されたら<a href="sub_role.php#death_warrant">死の宣告</a> (2日後) を付加する。</td>
  <td>Ver. 1.4.0 β20</td>
</tr>
<tr>
  <td><a href="human.php#revive_brownie">蛇神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">生きている間、<a href="ability.php#revive">蘇生能力者</a>の成功率を +30% する、座敷童子の亜種。<br>
人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する。</td>
  <td>Ver. 1.4.0 β20</td>
</tr>
<tr>
  <td><a href="human.php#phantom_doll">倫敦人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">一度だけ、自分が占われたら占い妨害をしてしまう人形。</td>
  <td>Ver. 1.4.0 β20</td>
</tr>
<tr>
  <td><a href="human.php#revive_doll">西蔵人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する人形。</td>
  <td>Ver. 1.4.0 β20</td>
</tr>
<tr>
  <td><a href="chiroptera.php#shadow_fairy">影妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分のアイコンと色を悪戯先と同じにする妖精。</td>
  <td>Ver. 1.4.0 β20</td>
</tr>
<tr id="ver140b21">
  <td><a href="ogre.php#dowser_yaksa">毘沙門天</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">夜叉系の一種で勝利条件は「自分自身の生存 + 自分よりサブ役職の所持数の多い人の全滅」。</td>
  <td>Ver. 1.4.0 β21</td>
</tr>
<tr>
  <td><a href="ogre.php#power_ogre">星熊童子</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + 村の人口を三分の一以下にする」。</td>
  <td>Ver. 1.4.0 β21</td>
</tr>
<tr>
  <td><a href="human.php#high_priest">大司祭</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">5日目以降、<a href="human.php#priest">司祭</a>・<a href="human.php#bishop_priest">司教</a>両方の結果が分かる上位司祭。</td>
  <td>Ver. 1.4.0 β21</td>
</tr>
<tr>
  <td><a href="human.php#bacchus_medium">神主</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#medium_group">巫女系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が<a href="ogre.php">鬼陣営</a>だった場合にショック死させることができる上位巫女。</td>
  <td>Ver. 1.4.0 β21</td>
</tr>
<tr>
  <td><a href="human.php#scarlet_doll">和蘭人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、他の<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える人形。</td>
  <td>Ver. 1.4.0 β21</td>
</tr>
<tr>
  <td><a href="human.php#silver_doll">露西亜人形</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#doll_group">上海人形系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#doll_master">人形遣い</a>が誰か分からない人形。</td>
  <td>Ver. 1.4.0 β21</td>
</tr>
<tr>
  <td><a href="chiroptera.php#scarlet_chiroptera">紅蝙蝠</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える蝙蝠。
  </td>
  <td>Ver. 1.4.0 β21</td>
</tr>
<tr id="ver140b22">
  <td><a href="human.php#clairvoyance_scanner">猩々</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">2日目以降、夜に投票した人のその夜の投票先を知ることができる特殊なさとり。</td>
  <td>Ver. 1.4.0 β22</td>
</tr>
<tr>
  <td><a href="lovers.php#sweet_cupid">弁財天</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">矢を撃った二人を<a href="sub_role.php#mind_friend">共鳴者</a>にする上位キューピッド。<br>処刑投票先に<a href="sub_role.php#sweet_ringing">恋耳鳴</a>を付加する。</td>
  <td>Ver. 1.4.0 β22</td>
</tr>
<tr>
  <td><a href="human.php#alchemy_pharmacist">錬金術師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#pharmacist_group">薬師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が毒を持っていたら中る範囲を「村人陣営以外」に変更してしまう特殊な薬師。</td>
  <td>Ver. 1.4.0 β22</td>
</tr>
<tr>
  <td><a href="human.php#incubus_escaper">一角獣</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">逃亡先が女性以外だった場合は死亡する、特殊な逃亡者。</td>
  <td>Ver. 1.4.0 β22</td>
</tr>
<tr>
  <td><a href="human.php#reflect_guard">侍</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#assassin_spec">暗殺反射</a>能力を持ち、<a href="ogre.php">鬼陣営</a>も狩ることができる上位狩人。
  </td>
  <td>Ver. 1.4.0 β22</td>
</tr>
<tr>
  <td><a href="ogre.php#revive_ogre">茨木童子</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + <a href="human.php#psycho_mage">精神鑑定士</a>が『嘘つき』判定を出す人の全滅」。<br>
    人狼に襲撃されて死亡した場合、一定確率 (40%) で蘇生する。
  </td>
  <td>Ver. 1.4.0 β22</td>
</tr>
<tr>
  <td><a href="human.php#scripter">執筆者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#human_group">村人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">時が経つと (5 日目以降) <a href="human.php#elder">長老</a>相当の能力を得る村人。</td>
  <td>Ver. 1.4.0 β22</td>
</tr>
<tr id="ver150a1">
  <td><a href="human.php#wizard">魔法使い</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">2日目以降、夜に魔法を使うことができる。<br>
魔法の効果は、<a href="human.php#mage">占い師</a>・<a href="human.php#psycho_mage">精神鑑定士</a>・<a href="human.php#sex_mage">ひよこ鑑定士</a>・<a href="human.php#guard">狩人</a>・<a href="human.php#assassin">暗殺者</a>のいずれか。
  </td>
  <td>Ver. 1.5.0 α1</td>
</tr>
<tr>
  <td><a href="human.php#soul_wizard">八卦見</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">魔法使いの上位種。<br>
    魔法の効果は、<a href="human.php#soul_mage">魂の占い師</a>・<a href="human.php#psycho_mage">精神鑑定士</a>・<a href="human.php#sex_mage">ひよこ鑑定士</a>・<a href="human.php#stargazer_mage">占星術師</a>・<a href="human.php#poison_guard">騎士</a>・<a href="human.php#doom_assassin">死神</a>・<a href="human.php#soul_assassin">辻斬り</a>・<a href="chiroptera.php#light_fairy">光妖精</a>のいずれか。
  </td>
  <td>Ver. 1.5.0 α1</td>
</tr>
<tr id="ver150a3">
  <td><a href="human.php#embalm_necromancer">死化粧師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑者と処刑者の投票先の人の陣営が同じかどうか分かる特殊な霊能者。</td>
  <td>Ver. 1.5.0 α3</td>
</tr>
<tr>
  <td><a href="human.php#emissary_necromancer">密偵</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑者に投票した人に処刑者と同一陣営の人が何人いるか分かる特殊な霊能者。</td>
  <td>Ver. 1.5.0 α3</td>
</tr>
<tr id="ver150a4">
  <td><a href="human.php#awake_wizard">比丘尼</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">魔法使いの一種で、一回限定の人狼襲撃手耐性を持つ。<br>
    魔法の効果は、初めは<a href="human.php#mage">占い師</a>・<a href="human.php#sex_mage">ひよこ鑑定士</a>・<a href="human.php#stargazer_mage">占星術師</a>のいずれかで、成功率は 30%。人狼に襲撃されると<a href="human.php#soul_mage">魂の占い師</a>相当に強化される。
  </td>
  <td>Ver. 1.5.0 α4</td>
</tr>
<tr>
  <td><a href="human.php#weather_priest">祈祷師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">翌日の<a href="../weather.php">天候</a>が分かる、特殊な司祭。
    また、一定条件を満たすと天候を引き起こすことができる。</td>
  <td>Ver. 1.5.0 α4</td>
</tr>
<tr id="ver150a5">
  <td><a href="wolf.php#follow_mad">舟幽霊</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑者決定後に、投票先がショック死していたら、誰か一人をさらにショック死させる特殊な狂人。</td>
  <td>Ver. 1.5.0 α5</td>
</tr>
<tr>
  <td><a href="mania.php#wirepuller_mania">黒衣</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#unknown_mania_group">鵺系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">コピー先に<a href="sub_role.php#wirepuller_luck">入道</a>を付加する特殊な鵺。</td>
  <td>Ver. 1.5.0 α5</td>
</tr>
<tr>
  <td><a href="human.php#sun_brownie">八咫烏</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されたら、次の日を「白夜」(全員<a href="sub_role.php#mind_open">公開者</a>) に、処刑されたら次の日の昼を「宵闇」(全員<a href="sub_role.php#blinder">目隠し</a>) にする、座敷童子の亜種。</td>
  <td>Ver. 1.5.0 α5</td>
</tr>
<tr>
  <td><a href="wolf.php#critical_mad">釣瓶落とし</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票に<a href="sub_role.php#critical_luck">痛恨</a>を付加する特殊な狂人。</td>
  <td>Ver. 1.5.0 α5</td>
</tr>
<tr id="ver150a6">
  <td><a href="wolf.php#revive_wolf">仙狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">一度だけ夜に死亡した場合に蘇生できる人狼。</td>
  <td>Ver. 1.5.0 α6</td>
</tr>
<tr>
  <td><a href="human.php#barrier_wizard">結界師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">魔法使いの一種で、魔法の効果は、複数 (最大 4 箇所) の<a href="ability.php#guard">護衛</a>能力。
  </td>
  <td>Ver. 1.5.0 α6</td>
</tr>
<tr>
  <td><a href="human.php#psycho_necromancer">精神感応者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#necromancer_group">霊能者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑した人の前世が分かる特殊な霊能者。</td>
  <td>Ver. 1.5.0 α6</td>
</tr>
<tr>
  <td><a href="human.php#spiritism_wizard">交霊術師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#necromancer_group">霊能</a>能力を持つ魔法使いの一種。魔法の効果は、<a href="human.php#necromancer">霊能者</a>・<a href="human.php#soul_necromancer">雲外鏡</a>・<a href="human.php#psycho_necromancer">精神感応者</a>・<a href="human.php#embalm_necromancer">死化粧師</a>・性別鑑定のいずれか。
  </td>
  <td>Ver. 1.5.0 α6</td>
</tr>
<tr id="ver150a7">
  <td><a href="ogre.php#betray_yaksa">夜叉丸</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">夜叉系の一種で勝利条件は「自分自身の生存 + <a href="chiroptera.php">蝙蝠陣営</a>の全滅 + 村人陣営の勝利」。</td>
  <td>Ver. 1.5.0 α7</td>
</tr>
<tr>
  <td><a href="ogre.php#cursed_yaksa">滝夜叉姫</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td>鬼<br>(呪返し)</td>
  <td>鬼</td>
  <td class="ability">呪いを持った夜叉系の一種で、勝利条件は「自分自身の生存 + <a href="human.php#mage_group">占い師系</a>・<a href="human.php#wizard_group">魔法使い系</a>の全滅」。</td>
  <td>Ver. 1.5.0 α7</td>
</tr>
<tr>
  <td><a href="human.php#psycho_escaper">迷い人</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">逃亡先が「嘘つき」だった場合は死亡する、特殊な逃亡者。</td>
  <td>Ver. 1.5.0 α7</td>
</tr>
<tr>
  <td><a href="human.php#gatekeeper_guard">門番</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#guard_hunt">狩り能力</a>は持たないが、<a href="ability.php#assassin">暗殺</a>も防ぐことができる特殊な狩人。</td>
  <td>Ver. 1.5.0 α7</td>
</tr>
<tr>
  <td><a href="chiroptera.php#cute_chiroptera">萌蝙蝠</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#chiroptera_group">蝙蝠系</a></td>
  <td>人狼</td>
  <td>蝙蝠</td>
  <td class="ability">占い結果が「人狼」、霊能結果が「蝙蝠」と判定される蝙蝠。<br>昼の間だけ、低確率で発言が遠吠えに入れ替わってしまう。</td>
  <td>Ver. 1.5.0 α7</td>
</tr>
<tr id="ver150a8">
  <td><a href="human.php#pierrot_wizard">道化師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">魔法使いの一種で、魔法の効果は、<a href="human.php#soul_mage">魂の占い師</a>・<a href="human.php#sex_mage">ひよこ鑑定士</a>・特殊<a href="human.php#doom_assassin">死神</a>・<a href="chiroptera.php#grass_fairy">草妖精</a>・<a href="chiroptera.php#star_fairy">星妖精</a>・<a href="chiroptera.php#flower_fairy">花妖精</a>・<a href="chiroptera.php#ice_fairy">氷妖精</a>・特殊妖精のいずれか。
  </td>
  <td>Ver. 1.5.0 α8</td>
</tr>
<tr>
  <td><a href="human.php#astray_wizard">左道使い</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">魔法使いの一種で、魔法の効果は、<a href="human.php#reverse_assassin">反魂師</a>・<a href="wolf.php#jammer_mad">月兎</a>・<a href="wolf.php#voodoo_mad">呪術師</a>・<a href="wolf.php#dream_eater_mad">獏</a>・<a href="wolf.php#snow_trap_mad">雪女</a>・<a href="fox.php#doom_fox">冥狐</a>・<a href="chiroptera.php#dark_fairy">闇妖精</a>のいずれか。
  </td>
  <td>Ver. 1.5.0 α8</td>
</tr>
<tr>
  <td><a href="fox.php#trap_fox">狡狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">一度だけ夜に誰か一人に罠を仕掛けることができる妖狐。</td>
  <td>Ver. 1.5.0 α8</td>
</tr>
<tr>
  <td><a href="wolf.php#trap_wolf">狡狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">一定期間後 (3日目以降)、自分に罠を設置することができる人狼。</td>
  <td>Ver. 1.5.0 α8</td>
</tr>
<tr id="ver150a9">
  <td><a href="human.php#succubus_escaper">水妖姫</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">逃亡先が男性以外だった場合は死亡する、特殊な逃亡者。</td>
  <td>Ver. 1.5.0 α9</td>
</tr>
<tr>
  <td><a href="human.php#doom_escaper">半鳥女</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">逃亡先が<a href="sub_role.php#death_warrant">死の宣告</a>を受けていた場合は死亡する、特殊な逃亡者。<br>
    逃亡先に<a href="sub_role.php#death_warrant">死の宣告</a> (4日後) を行う。</td>
  <td>Ver. 1.5.0 α9</td>
</tr>
<tr>
  <td><a href="wolf.php#immolate_mad">殉教者</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼陣営勝利に加えて、人狼に襲撃されることが勝利条件の特殊な狂人。</td>
  <td>Ver. 1.5.0 α9</td>
</tr>
<tr>
  <td><a href="fox.php#immolate_fox">野狐禅</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">妖狐陣営勝利に加えて、人狼に襲撃されることが勝利条件の妖狐。</td>
  <td>Ver. 1.5.0 α9</td>
</tr>
<tr id="ver150b1">
  <td><a href="chiroptera.php#greater_fairy">大妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">発言のたびに追加される文字列がランダムで変化する妖精。</td>
  <td>Ver. 1.5.0 β1</td>
</tr>
<tr>
  <td><a href="lovers.php#minstrel_cupid">吟遊詩人</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">2日目夜以降、全ての<a href="sub_role.php#lovers">恋人</a>に一方的に声が届く上位キューピッド。</td>
  <td>Ver. 1.5.0 β1</td>
</tr>
<tr>
  <td><a href="lovers.php#scarlet_angel">紅天使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える特殊な天使。<br>夜に<a href="human.php#unconscious">無意識</a>が誰か分かり、矢を撃った相手に<a href="sub_role.php#mind_sympathy">共感者</a>を付加する。</td>
  <td>Ver. 1.5.0 β1</td>
</tr>
<tr>
  <td><a href="duelist.php#duelist">決闘者</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日夜に自分と誰か一人を<a href="sub_role.php#rival">宿敵</a>にする。<br><a href="sub_role.php#rival">宿敵</a>の相手に自分を対象にした<a href="sub_role.php#mind_receiver">受信者</a>が付く。</td>
  <td>Ver. 1.5.0 β1</td>
</tr>
<tr>
  <td><a href="duelist.php#valkyrja_duelist">戦乙女</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分撃ち固定制限がない決闘者。</td>
  <td>Ver. 1.5.0 β1</td>
</tr>
<tr>
  <td><a href="duelist.php#triangle_duelist">舞首</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="sub_role.php#rival">宿敵</a>を三人作る特殊な決闘者。</td>
  <td>Ver. 1.5.0 β1</td>
</tr>
<tr id="ver150b2">
  <td><a href="human.php#centaurus_pharmacist">人馬</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#pharmacist_group">薬師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が毒を持っていたら毒死してしまう特殊な薬師。</td>
  <td>Ver. 1.5.0 β2</td>
</tr>
<tr>
  <td><a href="human.php#sacrifice_common">首領</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="wolf.php#wolf_group">人狼</a>に襲撃された時に、<a href="human.php#human">村人</a>と<a href="chiroptera.php#chiroptera">蝙蝠</a>を身代わりにして生き延びる事ができる上位共有者。</td>
  <td>Ver. 1.5.0 β2</td>
</tr>
<tr id="ver150b3">
  <td><a href="duelist.php#doom_duelist">黒幕</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="sub_role.php#rival">宿敵</a>に加えて、<a href="sub_role.php#death_warrant">死の宣告</a> (7日目昼) を付加する特殊な決闘者。</td>
  <td>Ver. 1.5.0 β3</td>
</tr>
<tr>
  <td><a href="duelist.php#avenger">復讐者</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日夜に村の人口の四分の一を<a href="sub_role.php#enemy">仇敵</a>にする、復讐者系の基本種。</td>
  <td>Ver. 1.5.0 β3</td>
</tr>
<tr>
  <td><a href="duelist.php#patron">後援者</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#patron_group">後援者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">初日夜に誰か一人を<a href="sub_role.php#supported">受援者</a>にする、後援者系の基本種。</td>
  <td>Ver. 1.5.0 β3</td>
</tr>
<tr id="ver150b4">
  <td><a href="mania.php#basic_mania">求道者</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#mania_group">神話マニア系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">コピー先の基本種に変化する特殊な神話マニア。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="duelist.php#poison_avenger">山わろ</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">劣化<a href="human.php#strong_poison">強毒者</a>相当の毒を持つ特殊な復讐者。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="duelist.php#cursed_avenger">がしゃどくろ</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td>村人<br>(呪返し)</td>
  <td>村人</td>
  <td class="ability">呪いを持った特殊な復讐者。処刑投票先が<a href="wolf.php#wolf_group">人狼系</a>・<a href="fox.php">妖狐</a>なら<a href="sub_role.php#death_warrant">死の宣告</a> (4日後)を付加する。<br><a href="human.php#voodoo_killer">陰陽師</a>の占い・<a href="human.php#guard_hunt">狩人の護衛</a>で死亡する。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="duelist.php#critical_avenger">狂骨</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="wolf.php#critical_mad">釣瓶落とし</a>相当の能力を持つ特殊な復讐者。<a href="human.php#guard_hunt">狩人の護衛</a>で死亡する。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="human.php#divine_escaper">麒麟</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#escaper_group">逃亡者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">逃亡先が<a href="wolf.php#wolf_group">人狼系</a>・<a href="human.php#assassin_group">暗殺者系</a>・<a href="ogre.php">鬼陣営</a>だった場合は死亡する、特殊な逃亡者。<br>
逃亡先が村人陣営 (<a href="sub_role.php#lovers">恋人</a>も含む) なら、翌日発動の<a href="sub_role.php#day_voter">一日村長</a>を付加する。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="duelist.php#sacrifice_patron">身代わり地蔵</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#patron_group">後援者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="sub_role.php#supported">受援者</a>に<a href="sub_role.php#protected">庇護者</a>を付加する上位後援者。<br>人狼に襲撃されても死亡しない (襲撃は失敗扱い)。
  </td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="duelist.php#revive_avenger">夜刀神</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する特殊な復讐者。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="duelist.php#shepherd_patron">羊飼い</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#patron_group">後援者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人口の六分の一の受援者を作ることができるが、<a href="sub_role.php#mind_sheep">羊</a>を付加してしまう特殊な後援者。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr>
  <td><a href="duelist.php#critical_duelist">剣闘士</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分撃ち固定で、<a href="sub_role.php#critical_voter">会心</a>相当の能力を持つ上位決闘者。</td>
  <td>Ver. 1.5.0 β4</td>
</tr>
<tr id="ver150b6">
  <td><a href="duelist.php#soul_patron">家神</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#patron_group">後援者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="sub_role.php#supported">受援者</a>の役職が分かる上位後援者。</td>
  <td>Ver. 1.5.0 β6</td>
</tr>
<tr>
  <td><a href="vampire.php#scarlet_vampire">屍鬼</a></td>
  <td><a href="vampire.php">吸血鬼</a></td>
  <td><a href="vampire.php#vampire_group">吸血鬼系</a></td>
  <td>蝙蝠</td>
  <td>蝙蝠</td>
  <td class="ability"><a href="wolf.php#partner">人狼</a>から<a href="human.php#unconscious">無意識</a>に、<a href="fox.php#partner">妖狐陣営</a>から<a href="fox.php#child_fox_group">子狐</a>に、<a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える特殊な吸血鬼。
  </td>
  <td>Ver. 1.5.0 β6</td>
</tr>
<tr>
  <td><a href="duelist.php#cute_avenger">草履大将</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#avenger_group">復讐者系</a></td>
  <td>人狼</td>
  <td>村人</td>
  <td class="ability">占い結果が「人狼」と判定される劣化復讐者。昼の間だけ、低確率で発言が遠吠えに入れ替わってしまう。</td>
  <td>Ver. 1.5.0 β6</td>
</tr>
<tr>
  <td><a href="human.php#widow_priest">未亡人</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">身代わり君の役職が分かる特殊な司祭。本人表記は「<a href="human.php#human">村人</a>」。</td>
  <td>Ver. 1.5.0 β6</td>
</tr>
<tr>
  <td><a href="duelist.php#cowboy_duelist">無鉄砲者</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#duelist_group">決闘者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">自分撃ち固定で、<a href="sub_role.php#reduce_voter">無精者</a>相当の能力を持つ劣化決闘者。</td>
  <td>Ver. 1.5.0 β6</td>
</tr>
<tr>
  <td><a href="duelist.php#critical_patron">ひんな神</a></td>
  <td><a href="duelist.php">決闘者</a></td>
  <td><a href="duelist.php#patron_group">後援者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="sub_role.php#critical_luck">痛恨</a>相当の能力を持ち、<a href="sub_role.php#supported">受援者</a>に<a href="sub_role.php#occupied_luck">ひんな持ち</a>を付加する劣化後援者。</td>
  <td>Ver. 1.5.0 β6</td>
</tr>
<tr>
  <td><a href="chiroptera.php#sweet_fairy">恋妖精</a></td>
  <td><a href="chiroptera.php">蝙蝠</a></td>
  <td><a href="chiroptera.php#fairy_group">妖精系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">悪戯先に<a href="sub_role.php#sweet_status">悲恋</a>を付加する妖精。</td>
  <td>Ver. 1.5.0 β6</td>
</tr>
<tr id="ver150b7">
  <td><a href="wolf.php#fire_wolf">火狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">一度だけ、襲撃に成功した人を噛み殺す代わりに<a href="sub_role.php#black_wisp">天火</a>を付加する人狼。</td>
  <td>Ver. 1.5.0 β7</td>
</tr>
<tr>
  <td><a href="fox.php#spell_fox">宙狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability">一度だけ、人狼に襲撃されたら襲撃してきた人狼に<a href="sub_role.php#spell_wisp">狐火</a>を付加する妖狐。</td>
  <td>Ver. 1.5.0 β7</td>
</tr>
<tr>
  <td><a href="wolf.php#mist_wolf">霧狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>蝙蝠</td>
  <td>霧狼</td>
  <td class="ability">占い結果が「蝙蝠」、霊能結果が「霧狼」と判定される人狼。</td>
  <td>Ver. 1.5.0 β7</td>
</tr>
<tr>
  <td><a href="fox.php#mist_fox">霧狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>蝙蝠<br>(呪殺無し)</td>
  <td>妖狐</td>
  <td class="ability">占い結果が「蝙蝠」、霊能結果が「妖狐」と判定される妖狐。</td>
  <td>Ver. 1.5.0 β7</td>
</tr>
<tr id="ver150b8">
  <td><a href="human.php#puppet_mage">傀儡師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#doll_rule">人形</a>から<a href="human.php#doll_master">人形遣い</a>に見える特殊な占い師。</td>
  <td>Ver. 1.5.0 β8</td>
</tr>
<tr>
  <td><a href="human.php#elder_guard">老兵</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#guard_group">狩人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票数が +1 される特殊な狩人。<a href="human.php#guard_hunt">狩り能力</a>を持たず、護衛成功率は 70%。</td>
  <td>Ver. 1.5.0 β8</td>
</tr>
<tr>
  <td><a href="lovers.php#snow_cupid">寒戸婆</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が恋人なら<a href="sub_role.php#frostbite">凍傷</a>を付加してしまうキューピッド。</td>
  <td>Ver. 1.5.0 β8</td>
</tr>
<tr>
  <td><a href="lovers.php#cursed_angel">堕天使</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#angel_group">天使系</a></td>
  <td>村人<br>(呪返し)</td>
  <td>村人</td>
  <td class="ability">呪いを持ち、矢を撃った二人が別陣営だった場合に<a href="sub_role.php#mind_sympathy">共感者</a>を付加する天使。<br><a href="sub_role.php#lovers">恋人</a>に処刑投票されるとショック死する。</td>
  <td>Ver. 1.5.0 β8</td>
</tr>
<tr id="ver150b9">
  <td><a href="human.php#leader_common">指導者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="sub_role.php#mind_open">公開者</a>相当の能力を持った上位共有者。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#snipe_poison">狙毒者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_group">埋毒者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先と同陣営の人のみに中る特殊な埋毒者。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#cute_mage">萌占い師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mage_group">占い師系</a></td>
  <td>人狼</td>
  <td>村人</td>
  <td class="ability">占い結果が「人狼」と判定される劣化占い師(本人表記「<a href="human.php#mage">占い師</a>」)。<br>昼の間だけ、低確率で発言が遠吠えに入れ替わってしまう。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#eclipse_medium">蝕巫女</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#medium_group">巫女系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">再投票になるとショック死する劣化巫女(本人表記は「<a href="human.php#medium">巫女</a>」)。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr>
  <td><a href="ogre.php#power_yaksa">阿修羅</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">夜叉系の一種で、勝利条件は「自分自身の生存 + 生存陣営数が出現陣営の半分以下」。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr>
  <td><a href="ogre.php#wise_ogre">夜行鬼</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#ogre_group">鬼系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">鬼系の一種で、勝利条件は「自分自身の生存 + <a href="human.php#common_group">共有者系</a>・<a href="wolf.php#wolf_group">人狼系</a>・<a href="fox.php#fox_group">妖狐系</a>の全滅」。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#miasma_jealousy">蛇姫</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が<a href="sub_role.php#lovers">恋人</a>なら一定確率で<a href="sub_role.php#febris">熱病</a>を付加する上位橋姫。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr>
  <td><a href="human.php#critical_jealousy">人魚</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#jealousy_group">橋姫系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票先が<a href="sub_role.php#lovers">恋人</a>なら自分に<a href="sub_role.php#critical_luck">痛恨</a>を付加してしまう劣化橋姫。</td>
  <td>Ver. 1.5.0 β9</td>
</tr>
<tr id="ver150b10">
  <td><a href="human.php#hermit_common">隠者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">夜の発言が「囁き声」にならない劣化共有者。</td>
  <td>Ver. 1.5.0 β10</td>
</tr>
<tr>
  <td><a href="ogre.php#hariti_yaksa">鬼子母神</a></td>
  <td><a href="ogre.php">鬼</a></td>
  <td><a href="ogre.php#yaksa_group">夜叉系</a></td>
  <td>鬼</td>
  <td>鬼</td>
  <td class="ability">夜叉系の一種で、勝利条件は「自分自身の生存 + <a href="fox.php#child_fox_group">子狐系</a>・<a href="lovers.php#cupid_group">キューピッド系</a>・<a href="lovers.php#angel_group">天使系</a>の全滅 + 村人陣営以外の勝利」。</td>
  <td>Ver. 1.5.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#critical_common">暴君</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">処刑投票数が +1 されるが、<a href="sub_role.php#critical_luck">痛恨</a>相当の能力も持つ特殊な共有者。</td>
  <td>Ver. 1.5.0 β10</td>
</tr>
<tr>
  <td><a href="wolf.php#quiet_wolf">静狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">夜の会話が<a href="wolf.php#howl">人狼の遠吠え</a>に変換されない人狼。</td>
  <td>Ver. 1.5.0 β10</td>
</tr>
<tr>
  <td><a href="human.php#philosophy_wizard">賢者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">魔法使いの一種で、魔法の効果は、魔法の効果は、<a href="human.php#cure_pharmacist">河童</a>・<a href="human.php#alchemy_pharmacist">錬金術師</a>・<a href="human.php#miasma_jealousy">蛇姫</a>・<a href="wolf.php#corpse_courier_mad">火車</a>・<a href="wolf.php#miasma_mad">土蜘蛛</a>・<a href="wolf.php#critical_mad">釣瓶落とし</a>・<a href="lovers.php#sweet_cupid">弁財天</a>のいずれか。
  </td>
  <td>Ver. 1.5.0 β10</td>
</tr>
<tr id="ver150b11">
  <td><a href="human.php#select_assassin">おしら様</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#assassin_group">暗殺者系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">暗殺成立時に<a href="sub_role.php#death_selected">オシラ遊び</a>を付加する特殊な暗殺者。</td>
  <td>Ver. 1.5.0 β11</td>
</tr>
<tr>
  <td><a href="human.php#missfire_cat">常世神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#poison_cat_group">猫又系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">誤爆蘇生しかしない猫又の亜種。</td>
  <td>Ver. 1.5.0 β11</td>
</tr>
<tr id="ver150b12">
  <td><a href="mania.php#fire_mania">青行灯</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#unknown_mania_group">鵺系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">コピー先に<a href="sub_role.php#wisp">鬼火</a>を付加する特殊な鵺。</td>
  <td>Ver. 1.5.0 β12</td>
</tr>
<tr>
  <td><a href="mania.php#revive_mania">五徳猫</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#unknown_mania_group">鵺系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼の襲撃で死亡したらコピー先を蘇生する上位鵺。</td>
  <td>Ver. 1.5.0 β12</td>
</tr>
<tr id="ver150b13">
  <td><a href="human.php#echo_brownie">山彦</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">昼の発言時に一定確率で直前の発言を発言 (反響) してしまう座敷童子の亜種。</td>
  <td>Ver. 1.5.0 β13</td>
</tr>
<tr>
  <td><a href="fox.php#sacrifice_fox">白蔵主</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#fox_group">妖狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>妖狐</td>
  <td class="ability">占いで呪殺されず、<a href="wolf.php#wolf_group">人狼</a>に襲撃された時に、<a href="fox.php#child_fox_group">子狐系</a>・<a href="chiroptera.php#chiroptera_group">蝙蝠系</a>を身代わりにして生き延びる事ができる妖狐。</td>
  <td>Ver. 1.5.0 β13</td>
</tr>
<tr>
  <td><a href="mania.php#resurrect_mania">僵尸</a></td>
  <td><a href="mania.php">神話マニア</a></td>
  <td><a href="mania.php#unknown_mania_group">鵺系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されて死亡した場合、一定確率で蘇生する上位鵺。</td>
  <td>Ver. 1.5.0 β13</td>
</tr>
<tr>
  <td><a href="wolf.php#revive_mad">尸解仙</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#mad_group">狂人系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する特殊な狂人。</td>
  <td>Ver. 1.5.0 β13</td>
</tr>
<tr>
  <td><a href="lovers.php#revive_cupid">邪仙</a></td>
  <td><a href="lovers.php">恋人</a></td>
  <td><a href="lovers.php#cupid_group">キューピッド系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">恋人に加えて、<a href="sub_role.php#death_warrant">死の宣告</a> (7日目昼) を付加する特殊なキューピッド。人狼に襲撃されて死亡した場合、一度だけ即座に蘇生する</td>
  <td>Ver. 1.5.0 β13</td>
</tr>
<tr id="ver150b14">
  <td><a href="wolf.php#sharp_wolf">鋭狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability"><a href="wolf.php#mad_group">狂人系</a>と<a href="ability.php#poison">毒能力者</a>を襲撃した場合は回避する人狼。</td>
  <td>Ver. 1.5.0 β14</td>
</tr>
<tr>
  <td><a href="human.php#holy_priest">聖徳道士</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#priest_group">司祭系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">身代わり君と自分を含めた周囲の人の所属陣営の総数が分かる、特殊な司祭。</td>
  <td>Ver. 1.5.0 β14</td>
</tr>
<tr>
  <td><a href="human.php#spell_common">葛の葉</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#common_group">共有者系</a></td>
  <td>村人<br>(呪殺)</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#mage_group">占い師</a>に占われると呪殺される特殊な共有者。<br>
処刑投票先が<a href="wolf.php#wolf_group">人狼系</a>・<a href="fox.php">妖狐</a>・<a href="sub_role.php#lovers">恋人</a>なら<a href="sub_role.php#cute_camouflage">魔が言</a>を付加する。
</td>
  <td>Ver. 1.5.0 β14</td>
</tr>
<tr id="ver150b15">
  <td><a href="human.php#thunder_brownie">雷公</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">再投票の最多得票者になったら、誰か一人をショック死させる座敷童子の亜種。</td>
  <td>Ver. 1.5.0 β15</td>
</tr>
<tr>
  <td><a href="human.php#mimic_wizard">物真似師</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#wizard_group">魔法使い系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">魔法使いの一種で、魔法の効果は<a href="human.php#mage">占い師</a>(成功率50%)と<a href="human.php#necromancer">霊能者</a>(成功率50%)。</td>
  <td>Ver. 1.5.0 β15</td>
</tr>
<tr id="ver150b16">
  <td><a href="fox.php#monk_fox">蛻庵</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability"><a href="human.php#necromancer">霊能者</a>相当の能力を持つ子狐。</td>
  <td>Ver. 1.5.0 β16</td>
</tr>
<tr>
  <td><a href="fox.php#critical_fox">寿羊狐</a></td>
  <td><a href="fox.php">妖狐</a></td>
  <td><a href="fox.php#child_fox_group">子狐系</a></td>
  <td>村人<br>(呪殺無し)</td>
  <td>子狐</td>
  <td class="ability">妖狐陣営勝利に加えて、<a href="fox.php#fox_group">妖狐系</a>の全滅が勝利条件の子狐。<br><a href="fox.php#partner">仲間表示</a>に<a href="fox.php#fox_group">妖狐系</a>が表示されず、処刑投票先が<a href="fox.php#fox_group">妖狐系</a>なら<a href="sub_role.php#critical_luck">痛恨</a>を付加する。</td>
  <td>Ver. 1.5.0 β16</td>
</tr>
<tr>
  <td><a href="human.php#harvest_brownie">豊穣神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">座敷童子の亜種で、自分に処刑投票してきた人が村人陣営だった場合は一定確率 (30%) で<a href="sub_role.php#critical_voter">会心</a>を付加し、
処刑された場合は投票者全員に一定確率 (30%) で<a href="sub_role.php#frostbite">凍傷</a>を付加する。
</td>
  <td>Ver. 1.5.0 β16</td>
</tr>
<tr>
  <td><a href="human.php#maple_brownie">紅葉神</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#brownie_group">座敷童子系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability">座敷童子の亜種で、自分に処刑投票してきた人が村人陣営だった場合は一定確率 (30%) で<a href="sub_role.php#critical_luck">痛恨</a>を付加し、
処刑された場合は投票者全員にさらに一定確率 (30%) で<a href="sub_role.php#frostbite">凍傷</a>を付加する。</td>
  <td>Ver. 1.5.0 β16</td>
</tr>
<tr>
  <td><a href="human.php#dummy_scanner">幻視者</a></td>
  <td><a href="human.php">村人</a></td>
  <td><a href="human.php#mind_scanner_group">さとり系</a></td>
  <td>村人</td>
  <td>村人</td>
  <td class="ability"><a href="human.php#mind_scanner">さとり</a>に心を読まれていると思い込んでいる村人。本人表記は「<a href="human.php#human">村人</a>」。</td>
  <td>Ver. 1.5.0 β16</td>
</tr>
<tr id="ver150b17">
  <td><a href="wolf.php#emperor_wolf">帝狼</a></td>
  <td><a href="wolf.php">人狼</a></td>
  <td><a href="wolf.php#wolf_group">人狼系</a></td>
  <td>人狼</td>
  <td>人狼</td>
  <td class="ability">人狼陣営勝利に加えて、<a href="wolf.php#mad_group">狂人系</a>の全滅が勝利条件の人狼。</td>
  <td>Ver. 1.5.0 β17</td>
</tr>
</table>

<table id="sub_role">
<caption>新サブ役職早見表</caption>
  <tr>
    <th>名称</th>
    <th>所属</th>
    <th>表示</th>
    <th>能力</th>
    <th>初登場</th>
  </tr>
  <tr id="sub_ver140a3">
    <td><a href="sub_role.php#strong_voice">大声</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">常に大声になる。</td>
    <td>Ver. 1.4.0 α3-7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#normal_voice">不器用</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">発言の大きさを変えられない。</td>
    <td>Ver. 1.4.0 α3-7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#weak_voice">小声</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">常に小声になる。</td>
    <td>Ver. 1.4.0 α3-7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#chicken">小心者</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に一票でも貰うとショック死する。</td>
    <td>Ver. 1.4.0 α3-7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#rabbit">ウサギ</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に一票も貰えないとショック死する。</td>
    <td>Ver. 1.4.0 α3-7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#perverseness">天邪鬼</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に他の人と投票先が重なるとショック死する。</td>
    <td>Ver. 1.4.0 α3-7</td>
  </tr>
  <tr id="sub_ver140a9">
    <td><a href="sub_role.php#no_last_words">筆不精</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">遺言を残せない。</td>
    <td>Ver. 1.4.0 α9</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#watcher">傍観者</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>有り</td>
    <td class="ability">投票数が 0 になる。</td>
    <td>Ver. 1.4.0 α9</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#plague">疫病神</a></td>
    <td><a href="sub_role.php#decide_group">決定者系</a></td>
    <td>無し</td>
    <td class="ability">自分の投票先が最多得票者で処刑者候補が複数いた場合、優先的に処刑される。</td>
    <td>Ver. 1.4.0 α9</td>
  </tr>
  <tr id="sub_ver140a11">
    <td><a href="sub_role.php#liar">狼少年</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言時に「人⇔狼」等が入れ替わる (たまに変換されないこともある)。</td>
    <td>Ver. 1.4.0 α11</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#copied">元神話マニア</a></td>
    <td><a href="sub_role.php#copied_group">元神話マニア系</a></td>
    <td>無し</td>
    <td class="ability">コピー後の<a href="mania.php#mania">神話マニア</a>に付加される。</td>
    <td>Ver. 1.4.0 α11</td>
  </tr>
  <tr id="sub_ver140a13">
    <td><a href="sub_role.php#lost_ability">能力喪失</a></td>
    <td><a href="sub_role.php#other_group">その他</a></td>
    <td>強制</td>
    <td class="ability">発動制限付き能力者が能力を失った場合に付加される。</td>
    <td>Ver. 1.4.0 α13</td>
  </tr>
  <tr id="sub_ver140a14">
    <td><a href="sub_role.php#random_voice">臆病者</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">声の大きさがランダムに変わる。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#earplug">耳栓</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">発言が一段階小さく見えるようになり、小声が聞き取れなくなる (共有者の囁きに入れ替わる)。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#good_luck">幸運</a></td>
    <td><a href="sub_role.php#decide_group">決定者系</a></td>
    <td>無し</td>
    <td class="ability">自分が最多得票者で処刑者候補が複数いた場合、候補から除外される。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#bad_luck">不運</a></td>
    <td><a href="sub_role.php#decide_group">決定者系</a></td>
    <td>無し</td>
    <td class="ability">自分が最多得票者で処刑者候補が複数いた場合、優先的に処刑される。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#upper_luck">雑草魂</a></td>
    <td><a href="sub_role.php#upper_luck_group">雑草魂系</a></td>
    <td>有り</td>
    <td class="ability">2日目の処刑得票数が +4 される代わりに、3日目以降は -2 される。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#downer_luck">一発屋</a></td>
    <td><a href="sub_role.php#upper_luck_group">雑草魂系</a></td>
    <td>有り</td>
    <td class="ability">2日目の処刑得票数が -4 される代わりに、3日目以降は +2 される。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#star">人気者</a></td>
    <td><a href="sub_role.php#upper_luck_group">雑草魂系</a></td>
    <td>有り</td>
    <td class="ability">処刑得票数が -1 される。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#disfavor">不人気</a></td>
    <td><a href="sub_role.php#upper_luck_group">雑草魂系</a></td>
    <td>有り</td>
    <td class="ability">処刑得票数が +1 される。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#random_voter">気分屋</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>有り</td>
    <td class="ability">投票数に -1～+1 の範囲でランダムに補正がかかる。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#rebel">反逆者</a></td>
    <td><a href="sub_role.php#authority">権力者系</a></td>
    <td>有り</td>
    <td class="ability"><a href="sub_role.php#authority">権力者</a>と同じ人に投票した場合に自分と<a href="sub_role.php#authority">権力者</a>の投票数が 0 になる。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#gentleman">紳士</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">時々発言が「紳士」な言葉に入れ替わる。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#lady">淑女</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">時々発言が「淑女」な言葉に入れ替わる。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#blinder">目隠し</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">発言者の名前が見えない (空白に見える)。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#silent">無口</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">発言の文字数に制限がかかる。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#invisible">光学迷彩</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言の一部が空白に入れ替わる。</td>
    <td>Ver. 1.4.0 α14</td>
  </tr>
  <tr id="sub_ver140a15">
    <td><a href="sub_role.php#random_luck">波乱万丈</a></td>
    <td><a href="sub_role.php#upper_luck_group">雑草魂系</a></td>
    <td>有り</td>
    <td class="ability">処刑得票数に -2～+2 の範囲でランダムに補正がかかる。</td>
    <td>Ver. 1.4.0 α15</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#flattery">ゴマすり</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に投票先が誰とも重なっていないとショック死する。</td>
    <td>Ver. 1.4.0 α15</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#impatience">短気</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability"><a href="sub_role.php#decide">決定者</a>と同等の能力がある代わりに再投票になるとショック死する。</td>
    <td>Ver. 1.4.0 α15</td>
  </tr>
  <tr id="sub_ver140a17">
    <td><a href="sub_role.php#speaker">スピーカー</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">発言が一段階大きく見えるようになり、大声が聞き取れなくなる。</td>
    <td>Ver. 1.4.0 α17</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#upper_voice">メガホン</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">発言が一段階大きくなり、大声は音割れして聞き取れなくなる。</td>
    <td>Ver. 1.4.0 α17</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#downer_voice">マスク</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">発言が一段階小さくなり、小声は聞き取れなくなる (共有者の囁きに入れ替わる)。</td>
    <td>Ver. 1.4.0 α17</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#rainbow">虹色迷彩</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言に虹の色が含まれていたら虹の順番に合わせて入れ替えられてしまう。</td>
    <td>Ver. 1.4.0 α17</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#panelist">解答者</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">投票数が 0 になり、<a href="quiz.php#quiz">出題者</a>に投票したらショック死する。</td>
    <td>Ver. 1.4.0 α17</td>
  </tr>
  <tr id="sub_ver140a19">
    <td><a href="sub_role.php#weekly">七曜迷彩</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言に曜日が含まれていたら曜日の順番に合わせて入れ替えられてしまう。</td>
    <td>Ver. 1.4.0 α19</td>
  </tr>
  <tr id="sub_ver140a21">
    <td><a href="sub_role.php#mind_read">サトラレ</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability"><a href="human.php#mind_scanner">さとり</a>に夜の発言が見られてしまう。</td>
    <td>Ver. 1.4.0 α21</td>
  </tr>
  <tr id="sub_ver140a22">
    <td><a href="sub_role.php#mind_open">公開者</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability">2日目以降の夜の発言が参加者全員に見られてしまう。</td>
    <td>Ver. 1.4.0 α22</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#mind_receiver">受信者</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability">特定の人の夜の発言が見えるようになる。</td>
    <td>Ver. 1.4.0 α22</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#celibacy">独身貴族</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に<a href="sub_role.php#lovers">恋人</a>から一票でも貰うとショック死しする。</td>
    <td>Ver. 1.4.0 α22</td>
  </tr>
  <tr id="sub_ver140a23">
    <td><a href="sub_role.php#inside_voice">内弁慶</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">昼は<a href="sub_role.php#weak_voice">小声</a>、夜は<a href="sub_role.php#strong_voice">大声</a>になる。</td>
    <td>Ver. 1.4.0 α23</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#outside_voice">外弁慶</a></td>
    <td><a href="sub_role.php#strong_voice_group">大声系</a></td>
    <td>有り</td>
    <td class="ability">昼は<a href="sub_role.php#strong_voice">大声</a>、夜は<a href="sub_role.php#weak_voice">小声</a>になる。</td>
    <td>Ver. 1.4.0 α23</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#mower">草刈り</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">発言から「w」が削られる。</td>
    <td>Ver. 1.4.0 α23</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#grassy">草原迷彩</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言の一文字毎に「w」が付加される。</td>
    <td>Ver. 1.4.0 α23</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#side_reverse">鏡面迷彩</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言の文字の並びが一行単位で逆になる。</td>
    <td>Ver. 1.4.0 α23</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#line_reverse">天地迷彩</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言の行の並びの上下が入れ替わる。</td>
    <td>Ver. 1.4.0 α23</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#mind_friend">共鳴者</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability">特定の人と夜に会話できるようになる。</td>
    <td>Ver. 1.4.0 α23</td>
  </tr>
  <tr id="sub_ver140a24">
    <td><a href="sub_role.php#possessed_target">憑依者</a></td>
    <td><a href="sub_role.php#other_group">その他</a></td>
    <td>強制</td>
    <td class="ability">憑依能力者が誰かに憑依したら付加される</td>
    <td>Ver. 1.4.0 α24</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#possessed">憑依</a></td>
    <td><a href="sub_role.php#other_group">その他</a></td>
    <td>無し</td>
    <td class="ability">憑依能力者に憑依されている人に付加される</td>
    <td>Ver. 1.4.0 α24</td>
  </tr>
  <tr id="sub_ver140b2">
    <td><a href="sub_role.php#mind_evoke">口寄せ</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability">死後に<a href="human.php#evoke_scanner">イタコ</a>の遺言窓にメッセージを送れるようになる。</td>
    <td>Ver. 1.4.0 β2</td>
  </tr>
  <tr id="sub_ver140b6">
    <td><a href="sub_role.php#bad_status">悪戯</a></td>
    <td><a href="sub_role.php#bad_status_group">悪戯</a></td>
    <td>無し</td>
    <td class="ability">一部の<a href="chiroptera.php#fairy_group">妖精系</a>などが夜の投票時に付加する。</td>
    <td>Ver. 1.4.0 β6</td>
  </tr>
  <tr id="sub_ver140b8">
    <td><a href="sub_role.php#mind_lonely">はぐれ者</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability">仲間が分からなくなり、会話できなくなる。</td>
    <td>Ver. 1.4.0 β8</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#mind_sympathy">共感者</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability">お互いの役職が分かる。</td>
    <td>Ver. 1.4.0 β8</td>
  </tr>
  <tr id="sub_ver140b9">
    <td><a href="sub_role.php#nervy">自信家</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に同一陣営の人に投票するとショック死する。</td>
    <td>Ver. 1.4.0 β9</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#febris">熱病</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>強制</td>
    <td class="ability">表示された日の処刑投票集計後にショック死する。</td>
    <td>Ver. 1.4.0 β9</td>
  </tr>
  <tr id="sub_ver140b10">
    <td><a href="sub_role.php#death_warrant">死の宣告</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>強制</td>
    <td class="ability">予告された日の処刑投票集計後にショック死する。</td>
    <td>Ver. 1.4.0 β10</td>
  </tr>
  <tr id="sub_ver140b11">
    <td><a href="sub_role.php#challenge_lovers">難題</a></td>
    <td><a href="sub_role.php#lovers_group">恋人系</a></td>
    <td>強制</td>
    <td class="ability">4日目夜までは人狼の襲撃無効・毒無効・暗殺反射を持つ。<br>
      5日目以降は恋人の相方と同じ人に投票しないとショック死する。</td>
    <td>Ver. 1.4.0 β11</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#possessed_exchange">交換憑依</a></td>
    <td><a href="sub_role.php#lovers_group">恋人系</a></td>
    <td>強制</td>
    <td class="ability">指定された相手と入れ替わる。</td>
    <td>Ver. 1.4.0 β11</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#copied_trick">元奇術師</a></td>
    <td><a href="sub_role.php#copied_group">元神話マニア系</a></td>
    <td>無し</td>
    <td class="ability">コピー後の<a href="mania.php#trick_mania">奇術師</a>に付加される。</td>
    <td>Ver. 1.4.0 β11</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#copied_soul">元覚醒者</a></td>
    <td><a href="sub_role.php#copied_group">元神話マニア系</a></td>
    <td>無し</td>
    <td class="ability">コピー後の<a href="mania.php#soul_mania">覚醒者</a>に付加される。</td>
    <td>Ver. 1.4.0 β11</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#copied_teller">元夢語部</a></td>
    <td><a href="sub_role.php#copied_group">元神話マニア系</a></td>
    <td>無し</td>
    <td class="ability">コピー後の<a href="mania.php#dummy_mania">夢語部</a>に付加される。</td>
    <td>Ver. 1.4.0 β11</td>
  </tr>
  <tr id="sub_ver140b14">
    <td><a href="sub_role.php#critical_voter">会心</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>無し</td>
    <td class="ability">5% の確率で処刑投票数が +100 される。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#critical_luck">痛恨</a></td>
    <td><a href="sub_role.php#upper_luck_group">雑草魂系</a></td>
    <td>無し</td>
    <td class="ability">5% の確率で処刑得票数が +100 される。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#whisper_ringing">囁耳鳴</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">他人の独り言が共有者の囁きに見えるようになる。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#howl_ringing">吠耳鳴</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">他人の独り言が人狼の遠吠えに見えるようになる。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#deep_sleep">爆睡者</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">共有者の囁き・人狼の遠吠えが一切見えなくなる。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#actor">役者</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言時に一部のキーワードが入れ替わる。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#androphobia">男性恐怖症</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に男性に投票するとショック死する。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#gynophobia">女性恐怖症</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票時に女性に投票するとショック死する。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#infected">感染者</a></td>
    <td><a href="sub_role.php#infected_group">感染者系</a></td>
    <td>無し</td>
    <td class="ability"><a href="vampire.php">吸血鬼陣営</a>の人に襲撃された人に付加される。</td>
    <td>Ver. 1.4.0 β14</td>
  </tr>
  <tr id="sub_ver140b15">
    <td><a href="sub_role.php#changed_therian">元獣人</a></td>
    <td><a href="sub_role.php#other_group">その他</a></td>
    <td>無し</td>
    <td class="ability">人狼に変化した後の<a href="wolf.php#therian_mad">獣人</a>に付加される。</td>
    <td>Ver. 1.4.0 β15</td>
  </tr>
  <tr id="sub_ver140b16">
    <td><a href="sub_role.php#frostbite">凍傷</a></td>
    <td><a href="sub_role.php#chicken_group">小心者系</a></td>
    <td>強制</td>
    <td class="ability">表示された日限定の<a href="sub_role.php#rabbit">ウサギ</a>。</td>
    <td>Ver. 1.4.0 β16</td>
  </tr>
  <tr id="sub_ver140b17">
    <td><a href="sub_role.php#passion">恋色迷彩</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">発言時に一部のキーワードが恋人っぽい発言に入れ替わる。</td>
    <td>Ver. 1.4.0 β17</td>
  </tr>
  <tr id="sub_ver140b18">
    <td><a href="sub_role.php#mind_presage">受託者</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>無し</td>
    <td class="ability">付加した<a href="human.php#presage_scanner">件</a>が人狼に襲撃されて死亡したら誰に襲撃されたかメッセージが表示される。</td>
    <td>Ver. 1.4.0 β18</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#protected">庇護者</a></td>
    <td><a href="sub_role.php#other_group">その他</a></td>
    <td>無し</td>
    <td class="ability"><a href="wolf.php#wolf_group">人狼</a> (種類は問わない) に襲撃された時に、庇護者を付加した人が身代わりで死亡する。</td>
    <td>Ver. 1.4.0 β18</td>
  </tr>
  <tr id="sub_ver140b20">
    <td><a href="sub_role.php#psycho_infected">洗脳者</a></td>
    <td><a href="sub_role.php#infected_group">感染者系</a></td>
    <td>無し</td>
    <td class="ability"><a href="vampire.php">吸血鬼陣営</a>共通の<a href="sub_role.php#infected">感染者</a>相当。</td>
    <td>Ver. 1.4.0 β20</td>
  </tr>
  <tr id="sub_ver140b21">
    <td><a href="sub_role.php#joker">ジョーカー</a></td>
    <td><a href="sub_role.php#joker_group">ジョーカー系</a></td>
    <td>強制</td>
    <td class="ability">ゲーム終了時に所持している場合、引き分け以外は無条件で敗北扱いになる。昼の処刑投票で移動する。</td>
    <td>Ver. 1.4.0 β21</td>
  </tr>
  <tr id="sub_ver140b22">
    <td><a href="sub_role.php#sweet_ringing">恋耳鳴</a></td>
    <td><a href="sub_role.php#no_last_words_group">筆不精系</a></td>
    <td>有り</td>
    <td class="ability">二日目以降、恋人の独り言が専用の囁きに見えるようになる。</td>
    <td>Ver. 1.4.0 β22</td>
  </tr>
  <tr id="sub_ver150a5">
    <td><a href="sub_role.php#wirepuller_luck">入道</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>強制</td>
    <td class="ability">付加させた人が一人でも生存している間は投票数が +2 されるが全員死亡すると得票数が +3 される。</td>
    <td>Ver. 1.5.0 α5</td>
  </tr>
  <tr id="sub_ver150a9">
    <td><a href="sub_role.php#muster_ability">能力発現</a></td>
    <td><a href="sub_role.php#other_group">その他</a></td>
    <td>強制</td>
    <td class="ability">発動制限付き能力者が能力を得た場合に付加される。</td>
    <td>Ver. 1.5.0 α9</td>
  </tr>
  <tr id="sub_ver150b1">
    <td><a href="sub_role.php#rival">宿敵</a></td>
    <td><a href="sub_role.php#joker_group">ジョーカー系</a></td>
    <td>強制</td>
    <td class="ability"><a href="duelist.php">決闘者陣営</a>が付加し、勝利条件が追加される。</td>
    <td>Ver. 1.5.0 β1</td>
  </tr>
  <tr id="sub_ver150b3">
    <td><a href="sub_role.php#reduce_voter">無精者</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>有り</td>
    <td class="ability">処刑投票数が -1 される。</td>
    <td>Ver. 1.5.0 β3</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#upper_voter">わらしべ長者</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>有り</td>
    <td class="ability">5日目以降、処刑投票数が +1 される。</td>
    <td>Ver. 1.5.0 β3</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#downer_voter">没落者</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>有り</td>
    <td class="ability">5日目以降、処刑投票数が -1 される。</td>
    <td>Ver. 1.5.0 β3</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#counter_decide">燕返し</a></td>
    <td><a href="sub_role.php#decide_group">決定者系</a></td>
    <td>無し</td>
    <td class="ability">自分と投票先が最多得票者だった場合、投票先が優先的に処刑される。</td>
    <td>Ver. 1.5.0 β3</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#dropout">脱落者</a></td>
    <td><a href="sub_role.php#decide_group">決定者系</a></td>
    <td>無し</td>
    <td class="ability">自分と投票先が最多得票者だった場合、自分が優先的に処刑される。</td>
    <td>Ver. 1.5.0 β3</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#enemy">仇敵</a></td>
    <td><a href="sub_role.php#joker_group">ジョーカー系</a></td>
    <td>無し</td>
    <td class="ability"><a href="duelist.php#avenger_group">復讐者系</a>が付加する。</td>
    <td>Ver. 1.5.0 β3</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#supported">受援者</a></td>
    <td><a href="sub_role.php#joker_group">ジョーカー系</a></td>
    <td>無し</td>
    <td class="ability"><a href="duelist.php#patron_group">後援者系</a>が付加する。</td>
    <td>Ver. 1.5.0 β3</td>
  </tr>
  <tr id="sub_ver150b4">
    <td><a href="sub_role.php#copied_basic">元求道者</a></td>
    <td><a href="sub_role.php#copied_group">元神話マニア系</a></td>
    <td>無し</td>
    <td class="ability">コピー後の<a href="mania.php#basic_mania">求道者</a>に付加される。</td>
    <td>Ver. 1.5.0 β4</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#day_voter">一日村長</a></td>
    <td><a href="sub_role.php#authority_group">権力者系</a></td>
    <td>強制</td>
    <td class="ability">表示された日の限定の<a href="sub_role.php#authority">権力者</a>。</td>
    <td>Ver. 1.5.0 β4</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#mind_sheep">羊</a></td>
    <td><a href="sub_role.php#mind_read_group">サトラレ系</a></td>
    <td>強制</td>
    <td class="ability">付加した<a href="duelist.php#shepherd_patron">羊飼い</a>が誰か分かり、人狼に襲撃されたら<a href="sub_role.php#sheep_wisp">羊皮</a>を付加する。</td>
    <td>Ver. 1.5.0 β4</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#sheep_wisp">羊皮</a></td>
    <td><a href="sub_role.php#wisp_group">鬼火系</a></td>
    <td>強制</td>
    <td class="ability">表示された日に占い師に占われると村人判定が出る。</td>
    <td>Ver. 1.5.0 β4</td>
  </tr>
  <tr id="sub_ver150b6">
    <td><a href="sub_role.php#occupied_luck">ひんな持ち</a></td>
    <td><a href="sub_role.php#upper_luck_group">雑草魂系</a></td>
    <td>強制</td>
    <td class="ability">得票数が付加させた人が一人でも生存している間は +1、全員死亡すると +3 される。</td>
    <td>Ver. 1.5.0 β6</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#sweet_status">悲恋</a></td>
    <td><a href="sub_role.php#bad_status_group">悪戯系</a></td>
    <td>強制</td>
    <td class="ability">一日目のみ、付加した<a href="chiroptera.php#sweet_fairy">恋妖精</a>のもう一人の悲恋と<a href="sub_role.php#lovers">恋人</a>であるように表示される。</td>
    <td>Ver. 1.5.0 β6</td>
  </tr>
  <tr id="sub_ver150b7">
    <td><a href="sub_role.php#wisp">鬼火</a></td>
    <td><a href="sub_role.php#wisp_group">鬼火系</a></td>
    <td>強制</td>
    <td class="ability">占い師に占われると鬼判定が出る。</td>
    <td>Ver. 1.5.0 β7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#black_wisp">天火</a></td>
    <td><a href="sub_role.php#wisp_group">鬼火系</a></td>
    <td>強制</td>
    <td class="ability">占い師に占われると人狼判定が出る。</td>
    <td>Ver. 1.5.0 β7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#spell_wisp">狐火</a></td>
    <td><a href="sub_role.php#wisp_group">鬼火系</a></td>
    <td>強制</td>
    <td class="ability">占い師に占われると呪殺される。</td>
    <td>Ver. 1.5.0 β7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#foughten_wisp">古戦場火</a></td>
    <td><a href="sub_role.php#wisp_group">鬼火系</a></td>
    <td>強制</td>
    <td class="ability">占い師に占われると蝙蝠判定が出る。</td>
    <td>Ver. 1.5.0 β7</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#gold_wisp">松明丸</a></td>
    <td><a href="sub_role.php#wisp_group">鬼火系</a></td>
    <td>強制</td>
    <td class="ability">ひよこ鑑定士に占われると蝙蝠判定が出る。</td>
    <td>Ver. 1.5.0 β7</td>
  </tr>
  <tr id="sub_ver150b11">
    <td><a href="sub_role.php#death_selected">オシラ遊び</a></td>
    <td><a href="sub_role.php#death_note_group">デスノート系</a></td>
    <td>強制</td>
    <td class="ability">表示された日の夜に死亡する。</td>
    <td>Ver. 1.5.0 β11</td>
  </tr>
  <tr>
    <td><a href="sub_role.php#death_note">デスノート</a></td>
    <td><a href="sub_role.php#death_note_group">デスノート系</a></td>
    <td>強制</td>
    <td class="ability">夜に誰か一人を死亡させることができる。</td>
    <td>Ver. 1.5.0 β11</td>
  </tr>
  <tr id="sub_ver150b14">
    <td><a href="sub_role.php#cute_camouflage">魔が言</a></td>
    <td><a href="sub_role.php#liar_group">狼少年系</a></td>
    <td>有り</td>
    <td class="ability">昼の間だけ、高確率で発言が人狼の遠吠えに入れ替わってしまう。</td>
    <td>Ver. 1.5.0 β14</td>
  </tr>
</table>

<h2 id="reference">参考リンク</h2>
<pre>
作って欲しい役職などがあったらこちらのスレへどうぞ
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1305122951/l50" target="_top">【ネタ歓迎】あったらいいな、こんな役職 2【ガチ大歓迎】</a>

参考スレッド
<a href="http://jbbs.livedoor.jp/bbs/read.cgi/netgame/2829/1246414115/l50" target="_top">【ネタ歓迎】あったらいいな、こんな役職【ガチ大歓迎】</a>

<a href="http://jbbs.livedoor.jp/bbs/read.cgi/game/48159/1243197597/l50" target="_top">新役職提案スレッド＠やる夫</a>
</pre>

<h2 id="memo">作成予定メモ</h2>
<h3>基本作成方針</h3>
<ol>
<li>単独で出現しても勝利可能</li>
<li>複数出現しても破綻しない (神話マニア対応)</li>
<li>勝利陣営は二日目朝の時点で決定する</li>
<li>村の勝利を阻害する存在なら占い・霊能のどちらかで分かる</li>
<li>[能力を騙れる / 対応・排除が容易 / 発動率が低い] のどれかを満たす</li>
<li>名称は和名・妖怪を軸にする</li>
</ol>
</body></html>
