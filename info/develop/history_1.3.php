<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputInfoPageHeader('開発履歴 / ～1.3', 1, 'develop_history');
?>
<p><a href="history.php">最新情報</a></p>
<p>
Ver. 1.3.x<br>
<a href="#ver130">0</a>
<a href="#ver131">1</a>
<a href="#ver132">2</a>
<a href="#ver133">3</a>
<a href="#ver134">4</a>
<a href="#ver135">5</a>
</p>
<p>
Ver. 1.2.x<br>
<a href="#ver120">0</a>
<a href="#ver121">1</a>
<a href="#ver122">2</a>
<a href="#ver122a">2a</a>
</p>
<p>
汝は人狼なりや？のPHP+MySQL移植版(from ふたば)<br>
<a href="#ver100">1.0.0</a>
<a href="#ver110">1.1.0</a>
<a href="#ver111">1.1.1</a>
<a href="#ver112">1.1.2</a>
<a href="#ver113">1.1.3</a>
<a href="#ver114">1.1.4</a>
<a href="#ver115">1.1.5</a>
</p>

<h2 id="ver135">Ver. 1.3.5 (Rev. 402) : 2011/10/14 (Fri) 18:31</h2>
<ul>
<li>村作成用パスワード機能を実装</li>
</ul>

<h2 id="ver134">Ver. 1.3.4 (Rev. 361) : 2011/07/04 (Mon) 18:31</h2>
<ul>
<li>引き分け・廃村の CSS 変更</li>
<li>配役ルーチン関連のバグ修正</li>
</ul>

<h2 id="ver133">Ver. 1.3.3 (Rev. 285) : 2011/02/04 (Fri) 23:23</h2>
<ul>
<li>PHP の浮動小数点数に関するバグを追加修正</li>
</ul>

<h2 id="ver132">Ver. 1.3.2 (Rev. 276) : 2011/01/25 (Tue) 01:45</h2>
<ul>
<li>PHPの浮動小数点数に関するバグを追加修正</li>
<li>アイコン登録の"やり直し"が機能しないバグを修正</li>
<li>未投票突然死関連のバグを修正</li>
<li>「異議あり」音声を差し替え</li>
</ul>

<h2 id="ver131">Ver. 1.3.1 (Rev. 266) : 2011/01/09 (Sun) 02:34</h2>
<ul>
<li>PHP の浮動小数点数に関するバグに対応</li>
</ul>

<h2 id="ver130">Ver. 1.3.0 (Rev. 88) : 2009/07/11 (Sat) 03:35</h2>
<ul>
<li>複数の同一役職を村に登場させることが可能<br>
  (デフォルト設定では登場しない。編成を管理者が変更した場合のみ登場)
</li>
<li>狐の念話・仲間表示機能を追加</li>
<li>埋毒者を噛んで巻き込まれる狼の対象決定方法を任意で変更できる機能を追加<br>
  (狼からランダム or 噛んだ狼固定)
</li>
<li>過去ログを逆順で表示できる機能実装 (デフォルトは設定ファイルで変更可能)</li>
<li>投票画面のデザイン変更<br>
  (常に参加者全員が表示され、投票できる者だけラジオボタンを付ける方式に変更)
</li>
<li>遺言は昼/夜の切り替えの影響を受けずに保存できるよう変更</li>
<li>身代わり君の昼／夜の発言をシステムメッセージとして表示できる機能を追加 (管理者向け機能)</li>
<li>発言に「」をつけるオプションを追加 (設定ファイルでON/OFF可能)</li>
<li>狼・共有者の仲間表示を改善</li>
<li>引き分け判定処理の改善</li>
<li>突然死処理の改善</li>
<li>突然死などの制限時間表示のバグ修正</li>
<li>Kick 処理が全ての村に影響するバグ修正</li>
<li>配役テーブルの仕様変更</li>
<li>トリップに仮対応 (# が含まれていたらエラーを返すだけ)</li>
<li>ソースコードファイルの整理・分割・最適化</li>
<li>その他細かい変更点・バグ修正</li>
</ul>

<h2 id="ver122a">Ver. 1.2.2a : 2009/06/04 (Thu)</h2>
<ul>
<li>詳細不明</li>
</ul>

<h2 id="ver122">Ver. 1.2.2</h2>
<ul>
<li>HTML出力にCSSを使用するように変更</li>
<li>アイコンサイズの最大値をサーバ側で制限する機能を追加</li>
<li>ソースコードの最適化</li>
<li>ディレクトリの整理</li>
</ul>

<h2 id="ver121">Ver. 1.2.1 : 2009/04/15 (Wed)</h2>
<ul>
<li>身代わりが狼、狐、キューピッドになる可能性がある不具合を修正</li>
<li>愛の矢のシステムメッセージで村人名ではなくユーザ名が表示される不具合を修正</li>
<li>霊界役職非表示時にもユーザ名が霊話に表示される不具合を修正</li>
<li>稼働中の村の霊界役職非表示アイコンが表示されない不具合を修正</li>
</ul>

<h2 id="ver120">Ver. 1.2.0</h2>
<ul>
<li>新役職追加（キューピッド・恋人）</li>
<li>希望役職に埋毒者を追加</li>
<li>霊界役職非表示オプションを追加</li>
<li>過去ログに村の参加人数を表示するように修正</li>
<li>4-7人村の配役追加、最低ゲーム開始可能人数を4人に設定</li>
<li>その他細かい修正</li>
</ul>

<h2 id="ver115">version1.1.5</h2>
<ul>
<li>Kickの処理でKickされて空いたユーザNoを切り詰める処理がうまくいってなかったのを修正</li>
</ul>

<h2 id="ver114">version1.1.4</h2>
<ul>
<li>setting.php以外のほぼ全て修正。</li>
<li>Kickされた人の発言が消えるのを修正。</li>
<li>遺言の表示順が固定されていたのをランダムに修正。</li>
</ul>

<h2 id="ver113">version1.1.3</h2>
<ul>
<li>game_play.php,game_functions.php,game_view.phpで現在の生存者の数を表示するように、また多少の表示修正</li>
</ul>

<h2 id="ver112">version1.1.2</h2>
<ul>
<li>old_log.phpで妖狐の勝利アイコンが表示されないのを修正</li>
</ul>

<h2 id="ver111">version1.1.1</h2>
<ul>
<li>game_view.phpで遺言が出力されないのを修正</li>
</ul>

<h2 id="ver110">version1.1.0</h2>
<ul>
<li>game_functions.phpのLastWordOutput()でglobal $day_nightが抜けていたのを修正</li>
</ul>

<h2 id="ver100">version1.0.0</h2>
<ul>
<li>配布開始</li>
</ul>
</body></html>
