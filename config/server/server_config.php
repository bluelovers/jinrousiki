<?php
//-- サーバ設定 --//
class ServerConfig {
  //サーバのURL
  public $site_root = 'http://localhost/jinrou/';

  //タイトル
  public $title = '汝は人狼なりや？';

  //サーバのコメント
  public $comment = '';

  //管理者 (任意)
  public $admin = '';

  //サーバの文字コード
  /*
    変更する場合は全てのファイル自体の文字コードを自前で変更してください
    include/init.php も参照してください
  */
  public $encode = 'UTF-8';

  //ヘッダ強制指定 (海外サーバ等で文字化けする場合に使用します)
  public $set_header_encode = false;

  //戻り先のページ
  public $back_page = '';

  //管理者用パスワード
  public $system_password = 'xxxxxxxx';

  //パスワード暗号化用 salt
  public $salt = 'xxxx';

  //デバッグモードのオン/オフ
  public $debug_mode = false;

  //村作成パスワード (null 以外を設定しておくと村作成画面にパスワード入力欄が表示されます)
  public $room_password = null;

  //村作成テストモード (村作成時の DB アクセス処理をスキップします。開発者テスト用スイッチです)
  public $dry_run_mode = false;

  //村作成禁止 (true にすると村の作成画面が表示されず、村を作成できなくなります)
  public $disable_establish = false;

  //村メンテナンス停止 (true にすると村の自動廃村処理などが実行されなくなります)
  public $disable_maintenance = false;

  //村情報非表示モード (村作成テストなどの開発者テスト用スイッチです)
  public $secret_room = false;

  //タイムゾーンが設定できない場合に時差を秒単位で設定するか否か
  public $adjust_time_difference = false;

  //$adjust_time_difference が有効な時の時差 (秒数)
  public $offset_seconds = 32400; //9時間

  //更新前のスクリプトのリビジョン番号
  /*
    ※ この機能は Ver. 1.4.0 beta1 (revision 152) で実装されました。

    更新前のスクリプトの class ScriptInfo (config/version.php) で
    定義されている $revision を設定することで admin/setup.php で
    行われる処理が最適化されます。

    初めて当スクリプトを設置する場合や、データベースを一度完全消去して
    再設置する場合は 0 を設定して下さい。

    更新前のスクリプトに該当ファイルや変数がない場合や、
    バージョンが分からない場合は 1 を設定してください。

    更新後のリビジョン番号と同じか、それより大きな値を設定すると
    admin/setup.php の処理は常時スキップされます。
  */
  public $last_updated_revision = 0;
}
