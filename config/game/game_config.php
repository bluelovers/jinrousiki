<?php
//-- ゲーム設定 --//
class GameConfig extends GameConfigBase {
  //-- 住人登録 --//
  //入村制限 (同じ村に同じ IP で複数登録) (true：許可しない / false：許可する)
  public $entry_one_ip_address = true;

  //トリップ対応 (true：変換する / false： "#" が含まれていたらエラーを返す)
  public $trip = true;
  public $trip_2ch = true; //2ch 互換 (12桁対応) モード (true：有効 / false：無効)

  //文字数制限
  public $entry_uname_limit = 50; //ユーザ名と村人の名前
  public $entry_profile_limit = 300; //プロフィール
  public $say_limit = 20000; //村の発言
  public $say_line_limit = 50; //村の発言 (行数)

  //-- 表示設定 --//
  public $quote_words = false; //発言を「」で括る
  public $replace_talk = false; //発言置換モード：発言内容の一部を強制置換する
  public $replace_talk_list = array(); //発言置換モードの変換リスト
  //public $replace_talk_list = array('◆' => '◇'); //流石ツール対応例
  public $display_talk_limit = 500; //ゲーム開始前後の発言表示数の限界値

  //-- 投票 --//
  public $self_kick = true; //自分への KICK (true：有効 / false：無効)
  public $kick = 3; //KICK 処理を実施するのに必要な投票数
  public $draw = 4; //引き分け処理を実施する再投票回数 (「再投票」なので実際の投票回数は +1 される)

  //-- 遺言 --//
  public $limit_last_words = false; //遺言変更制限 (true：有効 / false：無効)

  //-- 役職の能力設定 --//
  //毒能力者を処刑した際に巻き込まれる対象 (true:投票者ランダム / false:完全ランダム)
  public $poison_only_voter = false;

  //狼が毒能力者を襲撃した際に巻き込まれる対象 (true:投票者固定 / false:ランダム)
  public $poison_only_eater = true;

  public $cupid_self_shoot = 18; //キューピッドが他人撃ち可能となる参加人数
  public $cute_wolf_rate   =  1; //萌狼の発動率 (%)
  public $gentleman_rate   = 13; //紳士・淑女の発動率 (%)
  public $liar_rate        = 95; //狼少年の発動率 (%)
  public $invisible_rate   = 15; //光学迷彩の発言が空白に入れ替わる割合 (%)
  public $silent_length    = 25; //無口が発言できる最大文字数
  //役者の変換テーブル
  public $actor_replace_list = array('です' => 'みょん');

  //-- 「異議」あり --//
  public $objection = 5; //使用可能回数
  public $objection_image = 'img/objection.gif'; //「異議」ありボタンの画像パス

  //-- 自動更新 --//
  public $auto_reload = true; //game_view.php で自動更新を有効にする / しない (サーバ負荷に注意)
  public $auto_reload_list = array(15, 30, 45, 60, 90, 120); //自動更新モードの更新間隔 (秒) のリスト

  //-- その他 --//
  public $power_gm = false; //強権 GM モード (ON：true / OFF：false)
  public $random_message = false; //ランダムメッセージの挿入 (する：true / しない：false)

  //天候の出現比設定 (番号と天候の対応は RoleData->weather_list 参照)
  public $weather_list = array(
     0 => 10,   1 => 20,   2 => 25,   3 => 20,   4 => 25,
     5 => 10,   6 => 15,   7 => 20,   8 => 20,   9 => 10,
    10 => 10,  11 => 30,  12 => 10,  13 => 20,  14 => 30,
    15 => 10,  16 => 20,  17 => 10,  18 => 15,  19 => 15,
    20 => 20,  21 => 20,  22 => 20,  23 => 20,  24 => 20,
    25 => 25,  26 => 25,  27 => 25,  28 => 25,  29 => 15,
    30 => 20,  31 => 20,  32 => 20,  33 => 15,  34 => 15,
    35 => 10,  36 => 20,  37 => 20,  38 => 30,  39 => 20,
    40 => 20,  41 => 10,  42 => 20,  43 => 20,  44 => 10,
    45 => 20,  46 => 20,  47 => 20,  48 => 15,  49 => 15,
    50 => 20,  51 => 20,  52 => 15,  53 => 15,  54 => 10);
}
