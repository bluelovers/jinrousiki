<?php
//ゲームプレイ時のアイコン表示設定
class IconConfig extends IconConfigBase {
  public $path   = 'user_icon'; //ユーザアイコンのパス
  public $dead   = 'grave.jpg'; //死者
  public $wolf   = 'wolf.gif';  //狼
  public $width  = 45; //表示サイズ(幅)
  public $height = 45; //表示サイズ(高さ)
  public $view   = 100; //一画面に表示するアイコンの数
  public $page   = 10; //一画面に表示するページ数の数

  function __construct(){ parent::__construct(); }
}
