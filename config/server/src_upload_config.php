<?php
//-- 開発用ソースアップロード設定 --//
class SourceUploadConfig {
  public $disable = true; //無効設定 <アップロードを [true:無効 / false:有効] にする>

  //ソースアップロードフォームのパスワード
  public $password = 'upload';

  //フォームの最大文字数と表示名
  public $form_list = array('name'     => array('size' => 20, 'label' => 'ファイル名'),
			    'caption'  => array('size' => 80, 'label' => 'ファイルの説明'),
			    'user'     => array('size' => 20, 'label' => '作成者名'),
			    'password' => array('size' => 20, 'label' => 'パスワード'));

  //最大ファイルサイズ (バイト)
  public $max_size = 10485760; //10 Mbyte
}
