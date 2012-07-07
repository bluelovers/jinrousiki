<?php
/*
  ◆狼少年 (liar)
  ○仕様
  ・変換リスト：テンプレートキーワード判定 (発動率は GameConfig->liar_rate で定義する)
*/
RoleManager::LoadFile('passion');
class Role_liar extends Role_passion{
  public $convert_say_list = array(
    '村人' => '人狼', '人狼' => '村人',
    'むらびと' => 'おおかみ', 'おおかみ' => 'むらびと',
    'ムラビト' => 'オオカミ', 'オオカミ' => 'ムラビト',
    '本当' => '嘘', '嘘' => '本当',
    '真' => '偽', '偽' => '真',
    '人' => '狼', '狼' => '人',
    '白' => '黒', '黒' => '白',
    '○' => '●', '●' => '○',
    'CO' => '潜伏', 'ＣＯ' => '潜伏', '潜伏' => 'CO',
    '吊り' => '噛み', '噛み' => '吊り',
    'グレラン' => 'ローラー', 'ローラー'  => 'グレラン',
    '少年' => '少女', '少女' => '少年',
    'しょうねん' => 'しょうじょ', 'しょうじょ' => 'しょうねん',
    'おはよう' => 'おやすみ', 'おやすみ' => 'おはよう');
  function __construct(){ parent::__construct(); }

  protected function GetConvertSayList(){
    global $GAME_CONF;
    return mt_rand(1, 100) > $GAME_CONF->liar_rate ? NULL : parent::GetConvertSayList();
  }
}
