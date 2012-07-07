<?php
/*
  ◆恋色迷彩 (passion)
  ○仕様
  ・発言変換：部分置換
  ・変換リスト：恋色
*/
class Role_passion extends Role{
  public $convert_say_list = array(
    '村人' => '好き', '好き' => '村人',
    '人狼' => '嫌い', '嫌い' => '人狼',
    'むらびと' => 'すき', 'すき' => 'むらびと',
    'おおかみ' => 'きらい', 'きらい' => 'おおかみ',
    'ムラビト' => 'スキ', 'スキ' => 'ムラビト',
    'オオカミ' => 'キライ', 'キライ' => 'オオカミ',
    '白' => '愛してる', '愛してる' => '白',
    '黒' => '妬ましい', '妬ましい' => '黒',
    '○' => 'あいしてる', 'あいしてる' => '○',
    '●' => 'ねたましい', 'ねたましい' => '●',
    'グレラン' => '告白', '告白'  => 'グレラン',
    'ローラー' => 'ハーレム', 'ハーレム'  => 'ローラー');
  function __construct(){ parent::__construct(); }

  function ConvertSay(){
    if(! is_array($stack = $this->GetConvertSayList())) return;
    $this->SetStack(strtr($this->GetStack('say'), $stack), 'say');
  }

  protected function GetConvertSayList(){ return $this->convert_say_list; }
}
