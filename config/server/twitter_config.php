<?php
//-- Twitter 投稿設定 --//
class TwitterConfig extends TwitterConfigBase {
  public $disable = true; //Twitter 投稿停止設定 (true:停止する / false:しない)
  public $server = 'localhost'; //サーバ名
  public $hash = ''; //ハッシュタグ (任意、「#」は不要)
  public $add_url    = false; //サーバの URL 追加設定 (true:追加する/false:しない)
  public $direct_url = false; //村への直リンク追加設定 (要：$add_url:true / true: 追加する/false しない)
  public $short_url  = false; //TinyURL を用いた URL 短縮処理設定 (true:行う / false:行わない)
  public $key_ck = 'xxxx'; //Consumer key
  public $key_cs = 'xxxx'; //Consumer secret
  public $key_at = 'xxxx'; //Access Token
  public $key_as = 'xxxx'; //Access Token Secret

  //-- 関数 --//
  //メッセージのセット
  function GenerateMessage($id, $name, $comment){
    return "【{$this->server}】{$id}番地に{$name}村\n～{$comment}～ が建ちました";
  }
}
