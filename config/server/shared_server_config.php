<?php
//-- 村情報共有サーバの設定 --//
class SharedServerConfig extends ExternalLinkBuilder {
  public $disable = false; //無効設定 <表示を [true:無効 / false:有効] にする>

  //表示する他のサーバのリスト
  public $server_list = array(
    'cirno' => array('name' => 'チルノ鯖',
		     'url' => 'http://www12.atpages.jp/cirno/',
		     'encode' => 'UTF-8',
		     'separator' => '<!-- atpages banner tag -->',
		     'footer' => '</a><br>',
		     'disable' => false),

    'youmu' => array('name' => '妖夢鯖',
		     'url' => 'http://www23.atpages.jp/youmu/',
		     'encode' => 'UTF-8',
		     'separator' => '<!-- atpages banner tag -->',
		     'footer' => '</a><br>',
		     'disable' => false),
			      );
}
