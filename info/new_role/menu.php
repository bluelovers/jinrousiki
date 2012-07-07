<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
OutputHTMLHeader('新役職情報 - [メニュー]', 'info/menu');
?>
</head>
<body>
<div class="menu">新役職情報</div>
<ul>
<li><a target="body" href="summary.php">&lt;早見表&gt;</a></li>
<li><a target="body" href="ability.php">&lt;能力者逆引き&gt;</a></li>
<li><a target="_top" href="../">← 情報一覧</a></li>
<li><a target="_top" href="../../">← TOP</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="human.php">&lt;村人陣営&gt;</a></li>
<li><a target="body" href="human.php#human_group">村人系</a></li>
<li><a target="body" href="human.php#mage_group">占い師系</a></li>
<li><a target="body" href="human.php#necromancer_group">霊能者系</a></li>
<li><a target="body" href="human.php#medium_group">巫女系</a></li>
<li><a target="body" href="human.php#priest_group">司祭系</a></li>
<li><a target="body" href="human.php#guard_group">狩人系</a></li>
<li><a target="body" href="human.php#common_group">共有者系</a></li>
<li><a target="body" href="human.php#poison_group">埋毒者系</a></li>
<li><a target="body" href="human.php#poison_cat_group">猫又系</a></li>
<li><a target="body" href="human.php#pharmacist_group">薬師系</a></li>
<li><a target="body" href="human.php#assassin_group">暗殺者系</a></li>
<li><a target="body" href="human.php#mind_scanner_group">さとり系</a></li>
<li><a target="body" href="human.php#jealousy_group">橋姫系</a></li>
<li><a target="body" href="human.php#brownie_group">座敷童子系</a></li>
<li><a target="body" href="human.php#wizard_group">魔法使い系</a></li>
<li><a target="body" href="human.php#doll_group">上海人形系</a></li>
<li><a target="body" href="human.php#escaper_group">逃亡者系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="wolf.php">&lt;人狼陣営&gt;</a></li>
<li><a target="body" href="wolf.php#wolf_group">人狼系</a></li>
<li><a target="body" href="wolf.php#mad_group">狂人系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="fox.php">&lt;妖狐陣営&gt;</a></li>
<li><a target="body" href="fox.php#fox_group">妖狐系</a></li>
<li><a target="body" href="fox.php#child_fox_group">子狐系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="lovers.php">&lt;恋人陣営&gt;</a></li>
<li><a target="body" href="lovers.php#cupid_group">キューピッド系</a></li>
<li><a target="body" href="lovers.php#angel_group">天使系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="quiz.php">&lt;出題者陣営&gt;</a></li>
<li><a target="body" href="quiz.php#quiz_group">出題者系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="vampire.php">&lt;吸血鬼陣営&gt;</a></li>
<li><a target="body" href="vampire.php#vampire_group">吸血鬼系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="chiroptera.php">&lt;蝙蝠陣営&gt;</a></li>
<li><a target="body" href="chiroptera.php#chiroptera_group">蝙蝠系</a></li>
<li><a target="body" href="chiroptera.php#fairy_group">妖精系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="ogre.php">&lt;鬼陣営&gt;</a></li>
<li><a target="body" href="ogre.php#ogre_group">鬼系</a></li>
<li><a target="body" href="ogre.php#yaksa_group">夜叉系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="duelist.php">&lt;決闘者陣営&gt;</a></li>
<li><a target="body" href="duelist.php#duelist_group">決闘者系</a></li>
<li><a target="body" href="duelist.php#avenger_group">復讐者系</a></li>
<li><a target="body" href="duelist.php#patron_group">後援者系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="mania.php">&lt;神話マニア陣営&gt;</a></li>
<li><a target="body" href="mania.php#mania_group">神話マニア系</a></li>
<li><a target="body" href="mania.php#unknown_mania_group">鵺系</a></li>
<li>★☆★☆★☆★</li>
<li><a target="body" href="sub_role.php">&lt;サブ役職&gt;</a></li>
<li><a target="body" href="sub_role.php#chicken_group">小心者系</a></li>
<li><a target="body" href="sub_role.php#liar_group">狼少年系</a></li>
<li><a target="body" href="sub_role.php#decide_group">決定者系</a></li>
<li><a target="body" href="sub_role.php#authority_group">権力者系</a></li>
<li><a target="body" href="sub_role.php#upper_luck_group">雑草魂系</a></li>
<li><a target="body" href="sub_role.php#strong_voice_group">大声系</a></li>
<li><a target="body" href="sub_role.php#no_last_words_group">筆不精系</a></li>
<li><a target="body" href="sub_role.php#mind_read_group">サトラレ系</a></li>
<li><a target="body" href="sub_role.php#wisp_group">鬼火系</a></li>
<li><a target="body" href="sub_role.php#lovers_group">恋人系</a></li>
<li><a target="body" href="sub_role.php#infected_group">感染者系</a></li>
<li><a target="body" href="sub_role.php#joker_group">ジョーカー系</a></li>
<li><a target="body" href="sub_role.php#death_note_group">デスノート系</a></li>
<li><a target="body" href="sub_role.php#bad_status_group">悪戯系</a></li>
<li><a target="body" href="sub_role.php#copied_group">元神話マニア系</a></li>
<li><a target="body" href="sub_role.php#other_group">その他</a></li>
</ul>
</body></html>
