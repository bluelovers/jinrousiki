<?php
//アイコン登録設定
class UserIconConfig extends UserIconBase {
  public $disable_upload = false; //アイコンのアップロードの停止設定 (true:停止する / false:しない)
  public $name   = 30;    //アイコン名につけられる文字数(半角)
  public $size   = 15360; //アップロードできるアイコンファイルの最大容量(単位：バイト)
  public $width  = 45;    //アップロードできるアイコンの最大幅
  public $height = 45;    //アップロードできるアイコンの最大高さ
  public $number = 1000;  //登録できるアイコンの最大数
  public $column = 4;     //一行に表示する個数
  public $gerd   = 0;     //ゲルト君モード用のアイコン番号
  public $password = 'xxxx'; //アイコン編集パスワード
  public $cation = ''; //注意事項 (空なら何も表示しない)
}
