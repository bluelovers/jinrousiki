<?php
class GameOptionConfig {
  //-- 基本設定 --//
  public $wish_role_enable  = true; //役割希望制
  public $default_wish_role = false;

  public $real_time_enable  = true; //リアルタイム制 (初期設定は TimeConfig->default_day/night 参照)
  public $default_real_time = true;

  public $wait_morning_enable  = true; //早朝待機制 (待機時間設定は TimeConfig->wait_morning 参照)
  public $default_wait_morning = false;

  public $open_vote_enable  = true; //投票した票数を公表する
  public $default_open_vote = false;

  public $seal_message_enable  = true; //天啓封印
  public $default_seal_message = false;

  public $open_day_enable  = true; //オープニングあり
  public $default_open_day = false;

  //-- 身代わり君設定 --//
  public $dummy_boy_enable = true; //初日の夜は身代わり君
  //身代わり君のデフォルト ['':身代わり君無し / 'on':身代わり君有り / 'gm_login': GM有り ]
  public $default_dummy_boy = 'on';

  public $gerd_enable  = true; //ゲルト君モード
  public $default_gerd = false;

  //-- 霊界公開設定 --//
  public $not_open_cast_enable  = true; //霊界で配役を公開しない
  public $auto_open_cast_enable = true; //霊界で配役を自動で公開する

  //霊界オフモードのデフォルト ['':無し / 'auto_open_cast':自動オフ / 'not_open_cast': 完全オフ ]
  public $default_not_open_cast = 'auto_open_cast';

  //-- 追加役職設定 --//
  //必要人数は CastConfig の同名オプション名参照 (例： $poison_enable => CastConfig->poison)
  public $poison_enable  = true; //埋毒者
  public $default_poison = true;

  public $assassin_enable  = true; //暗殺者
  public $default_assassin = false;

  public $wolf_enable  = true; //人狼追加
  public $default_wolf = false;

  public $boss_wolf_enable  = true; //白狼
  public $default_boss_wolf = false;

  public $poison_wolf_enable  = true; //毒狼
  public $default_poison_wolf = false;

  public $possessed_wolf_enable  = true; //憑狼
  public $default_possessed_wolf = false;

  public $sirius_wolf_enable  = true; //天狼
  public $default_sirius_wolf = false;

  public $fox_enable  = true; //妖狐追加
  public $default_fox = false;

  public $child_fox_enable  = true; //子狐
  public $default_child_fox = false;

  public $cupid_enable  = true; //キューピッド
  public $default_cupid = false;

  public $medium_enable  = true; //巫女
  public $default_medium = false;

  public $mania_enable  = true; //神話マニア
  public $default_mania = false;

  public $decide_enable  = true; //決定者
  public $default_decide = false;

  public $authority_enable  = true; //権力者
  public $default_authority = false;

  //-- 特殊村設定 --//
  public $detective_enable  = true; //探偵村
  public $default_detective = false;

  public $liar_enable  = true; //狼少年村
  public $default_liar = false;

  public $gentleman_enable  = true; //紳士・淑女村
  public $default_gentleman = false;

  public $deep_sleep_enable  = true; //静寂村
  public $default_deep_sleep = false;

  public $blinder_enable  = true; //宵闇村
  public $default_blinder = false;

  public $mind_open_enable  = true; //白夜村
  public $default_mind_open = false;

  public $critical_enable  = true; //急所村
  public $default_critical = false;

  public $sudden_death_enable  = true; //虚弱体質村
  public $default_sudden_death = false;

  public $perverseness_enable  = true; //天邪鬼村
  public $default_perverseness = false;

  public $joker_enable  = true; //ババ抜き村
  public $default_joker = false;

  public $death_note_enable  = true; //デスノート村
  public $default_death_note = false;

  public $weather_enable  = true; //天候あり
  public $default_weather = false;

  public $festival_enable  = true; //お祭り村
  public $default_festival = false;

  public $replace_human_enable      = true; //村人置換村 (管理人カスタムモード)
  public $full_mad_enable           = true; //狂人村
  public $full_cupid_enable         = true; //キューピッド村
  public $full_quiz_enable          = true; //出題者村
  public $full_vampire_enable       = true; //吸血鬼村
  public $full_chiroptera_enable    = true; //蝙蝠村
  public $full_mania_enable         = true; //神話マニア村
  public $full_unknown_mania_enable = true; //鵺村
  //村人置換モードの内訳
  public $replace_human_items = array('' => 'なし', 'replace_human', 'full_mad', 'full_cupid',
    'full_quiz', 'full_vampire', 'full_chiroptera', 'full_mania', 'full_unknown_mania');

  public $change_common_enable        = true; //共有者置換村 (管理人カスタムモード)
  public $change_hermit_common_enable = true; //隠者村
  //共有者置換モードの内訳
  public $change_common_items = array('' => 'なし', 'change_common', 'change_hermit_common');

  public $change_mad_enable          = true; //狂人置換村 (管理人カスタムモード)
  public $change_fanatic_mad_enable  = true; //狂信者村
  public $change_whisper_mad_enable  = true; //囁き狂人村
  public $change_immolate_mad_enable = true; //殉教者村
  //狂人置換モードの内訳
  public $change_mad_items = array('' => 'なし', 'change_mad', 'change_fanatic_mad',
    'change_whisper_mad', 'change_immolate_mad');

  public $change_cupid_enable          = true; //キューピッド置換村 (管理人カスタムモード)
  public $change_mind_cupid_enable     = true; //女神村
  public $change_triangle_cupid_enable = true; //小悪魔村
  public $change_angel_enable          = true; //天使村
  //キューピッド置換モードの内訳
  public $change_cupid_items = array('' => 'なし', 'change_cupid', 'change_mind_cupid',
    'change_triangle_cupid', 'change_angel');

  //-- 特殊配役モード --//
  public $chaos_enable       = true; //闇鍋モード
  public $chaosfull_enable   = true; //真・闇鍋モード
  public $chaos_hyper_enable = true; //超・闇鍋モード
  public $chaos_verso_enable = true; //裏・闇鍋モード
  public $duel               = true; //決闘村
  public $gray_random_enable = true; //グレラン村
  public $quiz_enable        = true; //クイズ村
  //特殊配役モードの内訳
  public $special_role_items = array('' => 'なし', 'chaos', 'chaosfull', 'chaos_hyper',
    'chaos_verso', 'duel', 'gray_random', 'quiz');

  //-- 闇鍋モード専用設定 --//
  public $topping_enable = true; //固定配役追加モード
  public $topping_items = array(
    ''  => 'なし',
    'a' => 'A：人形村',
    'b' => 'B：出題村',
    'c' => 'C：吸血村',
    'd' => 'D：蘇生村',
    'e' => 'E：憑依村',
    'f' => 'F：鬼村',
    'g' => 'G：嘘吐村',
    'h' => 'H：村人村',
    'i' => 'I：恋人村',
    'j' => 'J：宿敵村',
    'k' => 'K：覚醒村',
    'l' => 'L：白銀村');

  public $boost_rate_enable = true; //出現率変動モード
  public $boost_rate_items = array(
    ''  => 'なし',
    'a' => 'A：新顔村',
    'b' => 'B：平等村',
    'c' => 'C：派生村',
    'd' => 'D：封蘇村',
    'e' => 'E：封憑村',
    'f' => 'F：合戦村',
    'g' => 'G：独身村');

  //配役通知設定
  public $chaos_open_cast_enable      = true; //配役内訳を表示する
  public $chaos_open_cast_camp_enable = true; //陣営通知
  public $chaos_open_cast_role_enable = true; //役職通知
  //通知モードのデフォルト ['':無し / 'camp':陣営 / 'role':役職 / 'full':完全]
  public $default_chaos_open_cast = 'camp'; //陣営通知

  //サブ役職制限
  public $sub_role_limit_enable             = true; //サブ役職制限
  public $sub_role_limit_easy_enable        = true; //サブ役職制限：EASYモード
  public $sub_role_limit_normal_enable      = true; //サブ役職制限：NORMALモード
  public $sub_role_limit_hard_enable        = true; //サブ役職制限：HARDモード
  public $sub_role_limit_no_sub_role_enable = true; //サブ役職をつけない
  //サブ役職制限のデフォルト
  //['':制限無し / 'no_sub':サブ役職をつけない / 'easy':EASYモード / 'normal':NORMALモード / 'hard':HARDモード]
  public $default_sub_role_limit = 'no_sub_role'; //つけない

  //その他
  public $secret_sub_role_enable  = true; //サブ役職を本人に通知しない
  public $default_secret_sub_role = false;
}
