<?php
//告知スレッド表示設定
class BBSConfig extends ExternalLinkBuilder {
  public $disable = true; //表示無効設定 (true:無効にする / false:しない)
  public $title = '告知スレッド情報'; //表示名
  public $raw_url  = 'http://jbbs.livedoor.jp/bbs/rawmode.cgi'; //データ取得用 URL
  public $view_url = 'http://jbbs.livedoor.jp/bbs/read.cgi'; //表示用 URL
  public $thread = '/game/43883/1275564772/'; //スレッドのアドレス
  public $encode = 'EUC-JP'; //スレッドの文字コード
  public $size = 5; //表示するレスの数
}
