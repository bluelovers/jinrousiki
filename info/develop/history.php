<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputInfoPageHeader('開発履歴', 1, 'develop_history');
?>
<p>
Ver. 2.0.x<br>
<a href="#ver201">1</a>
</p>
<p>
Ver. 2.0.0<br>
<a href="#ver200rc1">RC1</a>
<a href="#ver200">Release</a>
</p>
<p>
<a href="#ver200a1">α1</a>
<a href="#ver200a2">α2</a>
<a href="#ver200a3">α3</a>
<a href="#ver200a4">α4</a>
<a href="#ver200a5">α5</a>
<a href="#ver200a6">α6</a>
<a href="#ver200b1">β1</a>
</p>
<p>
<a href="history_1.3.php">～ 1.3</a>
<a href="history_1.4.php">1.4</a>
<a href="history_1.5.php">1.5</a>
</p>

<h2 id="ver201">Ver. 2.0.1 (Rev. 607) : 2012/06/24 (Sun) 05:44</h2>
<ul>
<li>エラー処理の改定</li>
</ul>

<h2 id="ver200">Ver. 2.0.0 (Rev. 539) : 2012/04/14 (Sat) 23:32</h2>
<ul>
<li>出現率変動モード：G (独身村) 追加</li>
</ul>

<h2 id="ver200rc1">Ver. 2.0.0 RC1 (Rev. 533) : 2012/03/25 (Sun) 03:04</h2>
<ul>
<li>遺言制限機能を実装</li>
</ul>

<h2 id="ver200b1">Ver. 2.0.0 β1 (Rev. 523) : 2012/02/29 (Wed) 00:38</h2>
<ul>
<li>昼の未投票チェックを高速化</li>
</ul>

<h2 id="ver200a6">Ver. 2.0.0 α6 (Rev. 508) : 2012/02/20 (Mon) 01:37</h2>
<ul>
<li>未投票判定処理を最適化</li>
</ul>

<h2 id="ver200a5">Ver. 2.0.0 α5 (Rev. 504) : 2012/02/12 (Sun) 20:45</h2>
<ul>
<li>投票時間リセット(管理者用) 実装</li>
</ul>

<h2 id="ver200a4">Ver. 2.0.0 α4 (Rev. 495) : 2012/02/06 (Mon) 23:21</h2>
<ul>
<li>未投票判定のバグ修正</li>
</ul>

<h2 id="ver200a3">Ver. 2.0.0 α3 (Rev. 494) : 2012/02/05 (Sun) 23:15</h2>
<ul>
<li>設定ファイルを再構成</li>
<li>ログ表示機能を再設計</li>
<li>ユーザ登録情報変更機能を実装</li>
</ul>

<h2 id="ver200a2">Ver. 2.0.0 α2 (Rev. 470) : 2012/01/16 (Mon) 22:54</h2>
<ul>
<li>データベース構造(投票処理)を再設計</li>
<li>村作成画面の実装を再設計</li>
</ul>

<h2 id="ver200a1">Ver. 2.0.0 α1 (Rev. 457) : 2012/01/08 (Sun) 16:35</h2>
<ul>
<li>データベース構造を再設計</li>
</ul>
<!--
<h2 id="ver150a2">Ver. 1.5.0 α2 (Rev. 273) : 2011/01/21 (Fri) 07:38</h2>
<ul>
<li>ゲームオプション「天候あり」実装</li>
</ul>

<h2 id="ver150a1">Ver. 1.5.0 α1 (Rev. 269) : 2011/01/15 (Sat) 09:16</h2>
<ul>
<li>「魔法使い」「八卦見」実装</li>
</ul>
-->
</body></html>
