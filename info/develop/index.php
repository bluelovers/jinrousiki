<?php
define('JINRO_ROOT', '../..');
require_once(JINRO_ROOT . '/include/init.php');
$INIT_CONF->LoadFile('info_functions');
OutputInfoPageHeader('開発者向け情報', 1);
?>
<h2>Ver. 2 について</h2>
<ul>
  <li>データベースのテーブル構成が Ver. 1 と違うので<font color="#FF0000">ログの互換性がありません</font></li>
  <li>ユーザアイコンのみ互換性が保たれる予定なので Ver. 1 からインポート可能です</li>
</ul>

<h2>デバッグモードについて</h2>
<ul>
  <li>一部のセキュリティチェックがスキップされます</li>
  <li>ゲーム一覧にゲーム削除のリンクが出現します
    <font color="#FF0000">(緊急時以外はクリックしないで下さい)</font></li>
</ul>

<h2>現在確認されているバグ</h2>
<ul>
  <li>ゲーム終了の切り替え時に発言窓が複数出ることがある (SQL 接続エラーに起因する事が判明)</li>
  <li>昼の投票時、まれに投票制限時間前に突然死処理が発生する事がある (紫炎鯖でのみ確認)</li>
  <li>再投票の結果表示が変 (DB の OPTIMIZE で解決する)</li>
</ul>

<h2>改定案件</h2>
<ul>
  <li>過去ログ HTML 化の自動化</li>
</ul>
</body></html>
