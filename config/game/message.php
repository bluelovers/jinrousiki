<?php
//-- 基本システムメッセージ --//
class Message {
  //-- room_manger.php --//
  //CreateRoom() : 村作成
  //身代わり君のコメント
  public $dummy_boy_comment = '僕はおいしくないよ';

  //身代わり君の遺言
  public $dummy_boy_last_words = '僕はおいしくないって言ったのに……';

  //-- user_manager.php --//
  //EntryUser() : ユーザ登録
  //入村メッセージ
  public $entry_user = 'さんが村の集会場にやってきました';

  //-- game_view.php & OutputGameHTMLHeader() --//
  public $vote_announce = '時間がありません。投票してください。'; //会話の制限時間切れ
  public $wait_morning = '待機時間中です。'; //早朝待機制の待機時間中
  public $close_cast = '配役隠蔽中です。'; //配役隠蔽通知 (霊界自動公開モード用)

  //-- game_functions.php --//
  //OutputRevoteList() : 再投票アナウンス
  public $revote = '再投票となりました'; //投票結果
  public $draw_announce = '再投票となると引き分けになります'; //引き分け告知

  //OutputTalkLog() : 会話、システムメッセージ出力
  public $objection = 'が「異議」を申し立てました'; //「異議」あり
  //public $game_start = 'はゲーム開始投票をしました'; //ゲーム開始投票 (現在は不使用)
  public $kick_do           = 'に KICK 投票しました'; //KICK 投票
  public $vote_do           = 'に処刑投票しました'; //処刑投票
  public $wolf_eat          = 'に狙いをつけました'; //人狼の投票
  public $escape_do         = 'の周辺に逃亡しました'; //逃亡者の投票
  public $mage_do           = 'を占います'; //占い師の投票
  public $voodoo_killer_do  = 'の呪いを祓います'; //陰陽師の投票
  public $jammer_do         = 'の占いを妨害します'; //月兎の投票
  public $trap_do           = 'の周辺に罠を仕掛けました'; //罠師の投票
  public $trap_not_do       = 'は罠設置を行いませんでした'; //罠師のキャンセル投票
  public $possessed_do      = 'に憑依します'; //犬神の投票
  public $possessed_not_do  = 'は憑依を行いませんでした'; //犬神のキャンセル投票
  public $voodoo_do         = 'に呪いをかけます'; //呪術師の投票
  public $dream_eat         = 'に狙いをつけました'; //獏の投票
  public $guard_do          = 'の護衛に付きました'; //狩人の投票
  public $anti_voodoo_do    = 'の厄を祓います'; //厄神の投票
  public $reporter_do       = 'を尾行しました'; //ブン屋の投票
  public $revive_do         = 'に蘇生処置をしました'; //猫又の投票
  public $revive_not_do     = 'は蘇生処置をしませんでした'; //猫又のキャンセル投票
  public $assassin_do       = 'に狙いをつけました'; //暗殺者の投票
  public $assassin_not_do   = 'は暗殺を行いませんでした'; //暗殺者のキャンセル投票
  public $mind_scanner_do   = 'の心を読みます'; //さとりの投票
  public $wizard_do         = 'に魔法をかけました'; //魔法使いの投票
  public $cupid_do          = 'に愛の矢を放ちました'; //キューピッドの投票
  public $vampire_do        = 'に狙いをつけました'; //吸血鬼の投票
  public $fairy_do          = 'に悪戯しました'; //妖精の投票
  public $ogre_do           = 'に狙いをつけました'; //鬼の投票
  public $ogre_not_do       = 'は人攫いを行いませんでした'; //鬼のキャンセル投票
  public $duelist_do        = 'に宿命を結び付けました'; //決闘者の投票
  public $mania_do          = 'の能力を真似ることにしました'; //神話マニアの投票
  public $death_note_do     = 'の名前を書きました'; //デスノートの投票
  public $death_note_not_do = 'はデスノートを使いませんでした'; //デスノートのキャンセル投票

  public $morning_header = '朝日が昇り'; //朝のヘッダー
  public $morning_footer = '日目の朝がやってきました'; //朝のフッター
  public $night = '日が落ち、暗く静かな夜がやってきました'; //夜
  public $skip_night = '白澤の能力で夜が飛ばされました……'; //白澤の能力発動
  public $dummy_boy = '◆身代わり君　'; //仮想GMモード用ヘッダー

  public $wolf_howl   = 'アオォーン・・・'; //人狼の遠吠え
  public $common_talk = 'ヒソヒソ・・・'; //共有者の囁き
  public $lovers_talk = 'うふふ・・・うふふ・・・'; //恋人の囁き
  public $howling     = 'キィーーン・・・'; //スピーカーの音割れ効果音

  //OutputLastWords() : 遺言の表示
  public $lastwords = '夜が明けると前の日に亡くなった方の遺言書が見つかりました';

  //OutoutDeadManType() : 死因の表示
  //public $vote_killed        = 'は投票の結果処刑されました'; //処刑
  public $vote_killed        = 'を弾幕ごっこ (投票) の結果ぴちゅーん (処刑) しました';
  public $blind_vote         = '傘化けの能力で投票結果が隠されました'; //傘化け
  public $deadman            = 'は無残な姿で発見されました'; //共通死亡メッセージ
  public $wolf_killed        = 'は人狼の餌食になったようです'; //人狼襲撃
  public $hungry_wolf_killed = 'は餓狼の餌食になったようです'; //餓狼襲撃
  public $possessed          = 'は誰かに憑依したようです'; //憑依
  public $possessed_targeted = 'は憑狼に憑依されたようです'; //憑狼襲撃
  public $possessed_reset    = 'は憑依から開放されたようです'; //憑依リセット
  public $dream_killed       = 'は獏の餌食になったようです'; //夢食い
  public $trapped            = 'は罠にかかって死亡したようです'; //罠
  public $fox_dead           = 'は占い師に呪い殺されたようです'; //呪殺
  public $cursed             = 'は呪詛に呪い殺されたようです'; //呪返し
  public $hunted             = 'は狩人に狩られたようです'; //狩人の狩り
  public $reporter_duty      = 'は人外を尾行してしまい、襲われたようです'; //ブン屋の殉職
  public $escaper_dead       = 'は逃亡に失敗したようです'; //逃亡失敗
  public $poison_dead        = 'は毒に冒され死亡したようです'; //毒
  public $vampire_killed     = 'は血を吸い尽くされたようです'; //吸血
  public $assassin_killed    = 'は暗殺されたようです'; //暗殺
  public $ogre_killed        = 'は鬼に攫われたようです'; //人攫い
  public $priest_returned    = 'は天に帰ったようです'; //天人帰還
  public $revive_success     = 'は生き返りました'; //蘇生成功
  public $revive_failed      = 'の蘇生に失敗したようです'; //蘇生失敗
  public $sacrifice          = 'は誰かの犠牲となって死亡したようです'; //身代わり
  public $lovers_followed    = 'は恋人の後を追い自殺しました'; //恋人の後追い
  public $vote_sudden_death  = 'はショック死しました'; //投票系ショック死
  public $novoted            = 'は突然お亡くなりになられました'; //未投票突然死
  public $rabbit             = 'はウサギだったようです'; //ウサギ
  public $perverseness       = 'は天邪鬼だったようです'; //天邪鬼
  public $flattery           = 'はゴマすりだったようです'; //ゴマすり
  public $impatience         = 'は短気だったようです'; //短気
  public $celibacy           = 'は独身貴族だったようです'; //独身貴族
  public $nervy              = 'は自信家だったようです'; //自信家
  public $androphobia        = 'は男性恐怖症だったようです'; //男性恐怖症
  public $gynophobia         = 'は女性恐怖症だったようです'; //女性恐怖症
  public $panelist           = 'は解答者 (不正解) だったようです'; //解答者
  public $sealed             = 'は封印されたようです'; //封印師
  public $drunk              = 'は神主に酔い潰されたようです'; //神主
  public $jealousy           = 'は橋姫に妬まれたようです'; //橋姫
  public $agitated           = 'は扇動に巻き込まれたようです'; //扇動者
  public $followed           = 'は道連れにされたようです'; //舟幽霊
  public $febris             = 'は熱病にかかったようです'; //熱病
  public $frostbite          = 'は凍傷にかかったようです'; //凍傷
  public $warrant            = 'は死の宣告を受けたようです'; //死の宣告
  public $thunderbolt        = 'は落雷を受けたようです'; //青天の霹靂
  public $challenge          = 'は難題を解けなかったようです'; //難題
  public $joker_moved        = 'にジョーカーが移動したようです'; //ジョーカーの移動
  public $death_note_moved   = 'にデスノートが移動したようです'; //デスノートの移動

  //花妖精のリスト (A-Z)
  public $flowered_a = 'の頭の上に松の花が咲きました';
  public $flowered_b = 'の頭の上に梅の花が咲きました';
  public $flowered_c = 'の頭の上に桜の花が咲きました';
  public $flowered_d = 'の頭の上に藤の花が咲きました';
  public $flowered_e = 'の頭の上に菖蒲の花が咲きました';
  public $flowered_f = 'の頭の上に牡丹の花が咲きました';
  public $flowered_g = 'の頭の上に萩の花が咲きました';
  public $flowered_h = 'の頭の上に芒の花が咲きました';
  public $flowered_i = 'の頭の上に菊の花が咲きました';
  public $flowered_j = 'の頭の上に紅葉の花が咲きました';
  public $flowered_k = 'の頭の上に柳の花が咲きました';
  public $flowered_l = 'の頭の上に桐の花が咲きました';
  public $flowered_m = 'の頭の上に鬼灯の花が咲きました';
  public $flowered_n = 'の頭の上に達磨草の花が咲きました';
  public $flowered_o = 'の頭の上に福寿草の花が咲きました';
  public $flowered_p = 'の頭の上に山茶花の花が咲きました';
  public $flowered_q = 'の頭の上に彼岸花の花が咲きました';
  public $flowered_r = 'の頭の上に鈴蘭の花が咲きました';
  public $flowered_s = 'の頭の上に向日葵の花が咲きました';
  public $flowered_t = 'の頭の上に優曇華の花が咲きました';
  public $flowered_u = 'の頭の上に桃の花が咲きました';
  public $flowered_v = 'の頭の上に椿の花が咲きました';
  public $flowered_w = 'の頭の上に鳳仙花の花が咲きました';
  public $flowered_x = 'の頭の上に薔薇の花が咲きました';
  public $flowered_y = 'の頭の上に百合の花が咲きました';
  public $flowered_z = 'の頭の上に仙人掌の花が咲きました';
  //星妖精のリスト (A-Z)
  public $constellation_a = 'は昨夜、牡羊座を見ていたようです';
  public $constellation_b = 'は昨夜、牡牛座を見ていたようです';
  public $constellation_c = 'は昨夜、双子座を見ていたようです';
  public $constellation_d = 'は昨夜、蟹座を見ていたようです';
  public $constellation_e = 'は昨夜、獅子座を見ていたようです';
  public $constellation_f = 'は昨夜、乙女座を見ていたようです';
  public $constellation_g = 'は昨夜、天秤座を見ていたようです';
  public $constellation_h = 'は昨夜、蠍座を見ていたようです';
  public $constellation_i = 'は昨夜、射手座を見ていたようです';
  public $constellation_j = 'は昨夜、山羊座を見ていたようです';
  public $constellation_k = 'は昨夜、水瓶座を見ていたようです';
  public $constellation_l = 'は昨夜、魚座を見ていたようです';
  public $constellation_m = 'は昨夜、蛇遣座を見ていたようです';
  public $constellation_n = 'は昨夜、牛飼座を見ていたようです';
  public $constellation_o = 'は昨夜、琴座を見ていたようです';
  public $constellation_p = 'は昨夜、白鳥座を見ていたようです';
  public $constellation_q = 'は昨夜、鷲座を見ていたようです';
  public $constellation_r = 'は昨夜、ペガスス座を見ていたようです';
  public $constellation_s = 'は昨夜、アンドロメダ座を見ていたようです';
  public $constellation_t = 'は昨夜、オリオン座を見ていたようです';
  public $constellation_u = 'は昨夜、大犬座を見ていたようです';
  public $constellation_v = 'は昨夜、子犬座を見ていたようです';
  public $constellation_w = 'は昨夜、カシオペア座を見ていたようです';
  public $constellation_x = 'は昨夜、竜座を見ていたようです';
  public $constellation_y = 'は昨夜、鳳凰座を見ていたようです';
  public $constellation_z = 'は昨夜、南十字座を見ていたようです';
  //道化師のリスト (A-Z)
  public $pierrot_a = 'は昨夜、玉乗りをしていたようです';
  public $pierrot_b = 'は昨夜、綱渡りをしていたようです';
  public $pierrot_c = 'は昨夜、火の輪くぐりをしていたようです';
  public $pierrot_d = 'は昨夜、パントマイムをしていたようです';
  public $pierrot_e = 'は昨夜、ジャグリングをしていたようです';
  public $pierrot_f = 'は昨夜、空中ブランコをしていたようです';
  public $pierrot_g = 'は昨夜、ナイフ投げをしていたようです';
  public $pierrot_h = 'は昨夜、必殺技の練習をしていたようです';
  public $pierrot_i = 'は昨夜、自分の二つ名を考えていたようです';
  public $pierrot_j = 'は昨夜、腕の包帯を抑えてうめいていたようです';
  public $pierrot_k = 'は昨夜、筋トレをしていたようです';
  public $pierrot_l = 'は昨夜、双眸に月輪を映していたようです';
  public $pierrot_m = 'は昨夜、流れ星に祈りを捧げていたようです';
  public $pierrot_n = 'は昨夜、鏡の中の自分をずっと見つめていたようです';
  public $pierrot_o = 'は昨夜、輝いていたようです';
  public $pierrot_p = 'は昨夜、ポエムを詠んでいたようです';
  public $pierrot_q = 'は昨夜、ぬいぐるみに恋の悩みを相談していたようです';
  public $pierrot_r = 'は昨夜、ラブレターを書いていたようです';
  public $pierrot_s = 'は昨夜、枕を抱えてバタバタしていたようです';
  public $pierrot_t = 'は昨夜、部屋の隅で泣いていたようです';
  public $pierrot_u = 'は昨夜、死亡フラグが立っていたようです';
  public $pierrot_v = 'は昨夜、タンスの角に小指をぶつけたようです';
  public $pierrot_w = 'は昨夜、男装していたようです';
  public $pierrot_x = 'は昨夜、女装していたようです';
  public $pierrot_y = 'は昨夜、ブラフに引っかかったようです';
  public $pierrot_z = 'は昨夜、命乞いの練習をしていたようです';

  //OutputAbility() : 能力の表示
  public $ability_dead             = 'アナタは息絶えました・・・'; //死者
  public $ability_vote             = '処刑する人を選択してください'; //処刑
  public $ability_wolf_eat         = '喰い殺す人を選択してください'; //人狼
  public $ability_mage_do          = '占う人を選択してください'; //占い師
  public $ability_voodoo_killer_do = '呪いを祓う人を選択してください'; //陰陽師
  public $ability_guard_do         = '護衛する人を選択してください'; //狩人
  public $ability_anti_voodoo_do   = '厄を祓う人を選択してください'; //厄神
  public $ability_reporter_do      = '尾行する人を選択してください'; //ブン屋
  public $ability_revive_do        = '蘇生する人を選択してください'; //猫又
  public $ability_assassin_do      = '暗殺する人を選択してください'; //暗殺者
  public $ability_mind_scanner_do  = '心を読む人を選択してください'; //さとり
  public $ability_wizard_do        = '魔法をかける人を選択してください'; //魔法使い
  public $ability_escape_do        = '逃亡する先を選択してください'; //逃亡者
  public $ability_jammer_do        = '占いを妨害する人を選択してください'; //月兎
  public $ability_voodoo_do        = '呪いをかける人を選択してください'; //呪術師
  public $ability_trap_do          = '罠を設置する先を選択してください'; //罠師
  public $ability_possessed_do     = '憑依する人を選択してください'; //犬神
  public $ability_dream_eat        = '夢を食べる人を選択してください'; //獏
  public $ability_cupid_do         = '結びつける人を選択してください'; //キューピッド
  public $ability_vampire_do       = '吸血する人を選択してください'; //吸血鬼
  public $ability_fairy_do         = '悪戯する人を選択してください'; //妖精
  public $ability_ogre_do          = '攫う人を選択してください'; //鬼
  public $ability_duelist_do       = '結びつける人を選択してください'; //決闘者
  public $ability_mania_do         = '能力を真似る人を選択してください'; //神話マニア
  public $ability_death_note_do    = '名前を書く人を選択してください'; //デスノート

  //-- game_play.php --//
  //ConvertSay()
  public $say_limit = '文字数または行数が多すぎたので発言できませんでした';

  //CheckSilence()
  public $silence = 'ほどの沈黙が続いた'; //沈黙で時間経過 (会話で時間経過制)
  //突然死の警告メッセージ
  public $sudden_death_announce = '投票完了されない方は死して地獄へ堕ちてしまいます';
  public $sudden_death_time = '突然死になるまで後：'; //突然死発動まで
  public $sudden_death = 'さんは突然お亡くなりになられました'; //突然死

  //投票リセット
  public $vote_reset = '＜投票がリセットされました　再度投票してください＞';

  //発言置換系役職
  public $cute_wolf = ''; //萌狼・不審者 (空なら狼の遠吠えになる)
  public $gentleman_header = "お待ち下さい。\n";  //紳士 (前半)
  public $gentleman_footer = 'さん、ハンケチーフを落としておりますぞ。'; //紳士 (後半)
  public $lady_header = "お待ちなさい！\n"; //淑女 (前半)
  public $lady_footer = '、タイが曲がっていてよ。'; //淑女 (後半)

  //-- game_vote.php --//
  //Kick で村から去った人
  public $kick_out = 'さんは席をあけわたし、村から去りました';

  //CheckVoteGameStart()
  public $chaos = '配役隠蔽モードです'; //配役隠蔽通知 (闇鍋用)

  //-- InsertRandomMessage() --//
  //GameConfig->random_message を true にすると
  //ここに入れたメッセージがランダムに表示される
  public $random_message_list = array();
}

//-- ゲームオプション名 --//
class GameOptionMessage {
  public $room_name             = '村の名前';
  public $room_comment          = '村についての説明';
  public $max_user              = '最大人数';
  public $wish_role             = '役割希望制';
  public $real_time             = 'リアルタイム制';
  public $wait_morning          = '早朝待機制';
  public $open_vote             = '投票した票数を公表する';
  public $seal_message          = '天啓封印';
  public $open_day              = 'オープニングあり';
  public $dummy_boy             = '初日の夜は身代わり君';
  public $gm_login              = '身代わり君は GM';
  public $gm_password           = 'GM ログインパスワード';
  public $gerd                  = 'ゲルト君モード';
  public $not_open_cast         = '霊界で配役を公開しない';
  public $auto_open_cast        = '自動で霊界の配役を公開する';
  public $poison                = '埋毒者登場';
  public $assassin              = '暗殺者登場';
  public $wolf                  = '人狼追加';
  public $boss_wolf             = '白狼登場';
  public $poison_wolf           = '毒狼登場';
  public $possessed_wolf        = '憑狼登場';
  public $sirius_wolf           = '天狼登場';
  public $fox                   = '妖狐追加';
  public $child_fox             = '子狐登場';
  public $cupid                 = 'キューピッド登場';
  public $medium                = '巫女登場';
  public $mania                 = '神話マニア登場';
  public $decide                = '決定者登場';
  public $authority             = '権力者登場';
  public $liar                  = '狼少年村';
  public $gentleman             = '紳士・淑女村';
  public $sudden_death          = '虚弱体質村';
  public $perverseness          = '天邪鬼村';
  public $deep_sleep            = '静寂村';
  public $mind_open             = '白夜村';
  public $blinder               = '宵闇村';
  public $critical              = '急所村';
  public $joker                 = 'ババ抜き村';
  public $death_note            = 'デスノート村';
  public $detective             = '探偵村';
  public $weather               = '天候あり';
  public $festival              = 'お祭り村';
  public $replace_human         = '村人置換村';
  public $full_mad              = '狂人村';
  public $full_chiroptera       = '蝙蝠村';
  public $full_cupid            = 'キューピッド村';
  public $full_quiz             = '出題者村';
  public $full_vampire          = '吸血鬼村';
  public $full_mania            = '神話マニア村';
  public $full_unknown_mania    = '鵺村';
  public $change_common         = '共有者置換村';
  public $change_hermit_common  = '隠者村';
  public $change_mad            = '狂人置換村';
  public $change_fanatic_mad    = '狂信者村';
  public $change_whisper_mad    = '囁き狂人村';
  public $change_immolate_mad   = '殉教者村';
  public $change_cupid          = 'キューピッド置換村';
  public $change_mind_cupid     = '女神村';
  public $change_triangle_cupid = '小悪魔村';
  public $change_angel          = '天使村';
  public $special_role          = '特殊配役モード';
  public $chaos                 = '闇鍋モード';
  public $chaosfull             = '真・闇鍋モード';
  public $chaos_hyper           = '超・闇鍋モード';
  public $chaos_verso           = '裏・闇鍋モード';
  public $topping               = '固定配役追加モード';
  public $topping_a             = 'A：人形村';
  public $topping_b             = 'B：出題村';
  public $topping_c             = 'C：吸血村';
  public $topping_d             = 'D：蘇生村';
  public $topping_e             = 'E：憑依村';
  public $topping_f             = 'F：鬼村';
  public $topping_g             = 'G：嘘吐村';
  public $topping_h             = 'H：村人村';
  public $topping_i             = 'I：恋人村';
  public $topping_j             = 'J：宿敵村';
  public $topping_k             = 'K：覚醒村';
  public $topping_l             = 'L：白銀村';
  public $boost_rate            = '出現率変動モード';
  public $boost_rate_a          = 'A：新顔村';
  public $boost_rate_b          = 'B：平等村';
  public $boost_rate_c          = 'C：派生村';
  public $boost_rate_d          = 'D：封蘇村';
  public $boost_rate_e          = 'E：封憑村';
  public $boost_rate_f          = 'F：合戦村';
  public $boost_rate_g          = 'G：独身村';
  public $chaos_open_cast       = '配役を通知する';
  public $chaos_open_cast_camp  = '陣営を通知する';
  public $chaos_open_cast_role  = '役職を通知する';
  public $no_sub_role           = 'サブ役職をつけない';
  public $sub_role_limit        = 'サブ役職制限';
  public $sub_role_limit_easy   = 'サブ役職制限：EASYモード';
  public $sub_role_limit_normal = 'サブ役職制限：NORMALモード';
  public $sub_role_limit_hard   = 'サブ役職制限：HARDモード';
  public $secret_sub_role       = 'サブ役職を表示しない';
  public $duel                  = '決闘村';
  public $gray_random           = 'グレラン村';
  public $quiz                  = 'クイズ村';
}

//-- ゲームオプション名の説明 --//
class GameOptionCaptionMessage {
  public $max_user              = '配役は<a href="info/rule.php">ルール</a>を確認して下さい';
  public $wish_role             = '希望の役割を指定できますが、なれるかは運です';
  public $real_time             = '制限時間が実時間で消費されます';
  public $wait_morning          = '夜が明けてから一定時間の間発言ができません';
  public $open_vote             = '「権力者」などのサブ役職が分かりやすくなります';
  public $seal_message          = '一部の個人通知メッセージが表示されなくなります';
  public $open_day              = 'ゲームが1日目「昼」からスタートします';
  public $no_dummy_boy          = '身代わり君なし';
  public $dummy_boy             = '身代わり君あり (初日の夜、身代わり君が狼に食べられます)';
  public $gm_login              = '仮想 GM が身代わり君としてログインします';
  public $gm_password           = '(仮想 GM モード・クイズ村モード時の GM のパスワードです)<br>※ ログインユーザ名は「dummy_boy」です。GM は入村直後に必ず名乗ってください。';
  public $gerd                  = '役職が村人固定になります [村人が出現している場合のみ有効]';
  public $no_close_cast         = '常時公開 (蘇生能力は無効です)';
  public $not_open_cast         = '常時非公開 (誰がどの役職なのか公開されません。蘇生能力は有効です)';
  public $auto_open_cast        = '自動公開 (蘇生能力者などが能力を持っている間だけ霊界が非公開になります)';
  public $poison                = '処刑されたり狼に食べられた場合、道連れにします [村人2→埋毒1・人狼1]';
  public $assassin              = '夜に村人一人を暗殺することができます [村人2→暗殺者1・人狼1]';
  public $wolf                  = '人狼をもう一人追加します [村人1→人狼1]';
  public $boss_wolf             = '占い結果が「村人」・霊能結果が「白狼」と表示される狼です [人狼1→白狼1]';
  public $poison_wolf           = '処刑時にランダムで村人一人を巻き添えにする狼です<br>　　　[人狼1→毒狼1 / 村人1→薬師1]';
  public $possessed_wolf        = '襲撃した人に憑依して乗っ取ってしまう狼です [人狼1→憑狼1]';
  public $sirius_wolf           = '仲間が減ると特殊能力が発現する狼です [人狼1→天狼1]';
  public $fox                   = '妖狐をもう一人追加します [村人1→妖狐1]';
  public $child_fox             = '限定的な占い能力を持ち、占い結果が「村人」・霊能結果が「子狐」となる妖狐です <br>　　　[妖狐1→子狐1]';
  public $cupid                 = '初日夜に選んだ相手を恋人にします。恋人となった二人は勝利条件が変化します<br>　　　[村人1→キューピッド1]';
  public $medium                = '突然死した人の所属陣営が分かります [村人2→巫女1・女神1]';
  public $mania                 = '初日夜に他の村人の役職をコピーします [村人1→神話マニア1]';
  public $decide                = '投票が同数の時、決定者の投票先が優先されます [兼任]';
  public $authority             = '投票の票数が二票になります [兼任]';
  public $liar                  = 'ランダムで「狼少年」がつきます';
  public $gentleman             = '全員に性別に応じた「紳士」「淑女」がつきます';
  public $sudden_death          = '全員に投票でショック死するサブ役職のどれかがつきます';
  public $perverseness          = '全員に「天邪鬼」がつきます。一部のサブ役職系オプションが強制オフになります';
  public $deep_sleep            = '全員に「爆睡者」がつきます';
  public $mind_open             = '全員に「公開者」がつきます';
  public $blinder               = '全員に「目隠し」がつきます';
  public $critical              = '全員に「会心」「痛恨」がつきます。';
  public $joker                 = '誰か一人に「ジョーカー」がつきます';
  public $death_note            = '毎日、誰か一人に「デスノート」が与えられます';
  public $detective             = '「探偵」が登場し、初日の夜に全員に公表されます';
  public $weather               = '「天候」と呼ばれる特殊イベントが発生します';
  public $festival              = '管理人がカスタムする特殊設定です';
  public $replace_human         = '「村人」が全員特定の役職に入れ替わります';
  public $change_common         = '「共有者」が全員特定の役職に入れ替わります';
  public $change_mad            = '「狂人」が全員特定の役職に入れ替わります';
  public $change_cupid          = '「キューピッド」が全員特定の役職に入れ替わります';
  public $special_role          = '詳細は<a href="info/game_option.php">ゲームオプション</a>を参照してください';
  public $topping               = '固定配役に追加する役職セットです';
  public $boost_rate            = '役職の出現率に補正がかかります';
  public $chaos_not_open_cast   = '通知無し';
  public $chaos_open_cast_camp  = '陣営通知 (陣営毎の合計を通知)';
  public $chaos_open_cast_role  = '役職通知 (役職の種類別に合計を通知)';
  public $chaos_open_cast_full  = '完全通知 (通常村相当)';
  public $no_sub_role           = 'サブ役職をつけない';
  public $sub_role_limit_easy   = 'サブ役職制限：EASYモード';
  public $sub_role_limit_normal = 'サブ役職制限：NORMALモード';
  public $sub_role_limit_hard   = 'サブ役職制限：HARDモード';
  public $sub_role_limit_none   = 'サブ役職制限なし';
  public $secret_sub_role       = 'サブ役職が分からなくなります：闇鍋モード専用オプション';
}

//-- 村・本人の勝敗結果 --//
class WinnerMessage {
  //村人勝利
  public $human = '[村人勝利] 村人たちは人狼の血を根絶することに成功しました';

  //人狼・狂人勝利
  public $wolf = '[人狼・狂人勝利] 最後の一人を食い殺すと人狼達は次の獲物を求めて村を後にした';

  //妖狐勝利 (村人勝利版)
  public $fox1 = '[妖狐勝利] 人狼がいなくなった今、我の敵などもういない';

  //妖狐勝利 (人狼勝利版)
  public $fox2 = '[妖狐勝利] マヌケな人狼どもを騙すことなど容易いことだ';

  //恋人・キューピッド勝利
  public $lovers = '[恋人・キューピッド勝利] 愛の前には何者も無力だったのでした';

  //出題者勝利
  public $quiz = '[出題者勝利] 真の解答者にはまだ遠い……修行あるのみ';

  //出題者死亡
  public $quiz_dead = '[引き分け] 何という事だ！このままでは決着が付かないぞ！';

  //吸血鬼勝利
  public $vampire = '[吸血鬼勝利] 夜の支配者に抗える存在など、ありはしない';

  //引き分け
  public $draw = '[引き分け] 引き分けとなりました';

  //全滅
  public $vanish = '[引き分け] そして誰も居なくなった……';

  //途中廃村
  public $unfinished = '[引き分け] 霧が濃くなって何も見えなくなりました……';

  //廃村
  public $none = '過疎が進行して人がいなくなりました';

  public $self_win  = 'あなたは勝利しました'; //本人勝利
  public $self_lose = 'あなたは敗北しました'; //本人敗北
  public $self_draw = '引き分けとなりました'; //引き分け
}

//-- 投票画面専用メッセージ --//
class VoteMessage {
  //OutputVoteBeforeGame()
  public $kick_do    = '対象をキックするに一票'; //Kick 投票ボタン
  public $game_start = 'ゲームを開始するに一票'; //ゲーム開始ボタン

  //OutputVoteDay()
  public $vote_do = '対象を処刑するに一票'; //処刑投票ボタン

  //OutputVoteNight()
  //投票ボタン
  public $wolf_eat          = '対象を喰い殺す (先着)'; //人狼
  public $mage_do           = '対象を占う'; //占い師
  public $voodoo_killer_do  = '対象の呪いを祓う'; //陰陽師
  public $guard_do          = '対象を護衛する'; //狩人
  public $anti_voodoo_do    = '対象の厄を祓う'; //厄神
  public $reporter_do       = '対象を尾行する'; //ブン屋
  public $revive_do         = '対象を蘇生する'; //猫又
  public $revive_not_do     = '誰も蘇生しない'; //猫又(キャンセル)
  public $assassin_do       = '対象を暗殺する'; //暗殺者
  public $assassin_not_do   = '誰も暗殺しない'; //暗殺者(キャンセル)
  public $mind_scanner_do   = '対象の心を読む'; //さとり
  public $wizard_do         = '対象に魔法をかける'; //魔法使い
  public $escape_do         = '対象の周辺に逃亡する'; //逃亡者
  public $voodoo_do         = '対象に呪いをかける'; //呪術師
  public $jammer_do         = '対象の占いを妨害する'; //月兎
  public $dream_eat         = '対象の夢を喰う'; //獏
  public $trap_do           = '対象の周辺に罠を設置する'; //罠師
  public $trap_not_do       = '罠を設置しない'; //罠師(キャンセル)
  public $possessed_do      = '対象に憑依する'; //犬神
  public $possessed_not_do  = '誰にも憑依しない'; //犬神(キャンセル)
  public $cupid_do          = '対象に愛の矢を放つ'; //キューピッド
  public $vampire_do        = '対象を吸血する'; //吸血鬼
  public $fairy_do          = '対象に悪戯する'; //妖精
  public $ogre_do           = '対象を攫う'; //鬼
  public $ogre_not_do       = '誰も攫わない'; //鬼(キャンセル)
  public $duelist_do        = '対象を結びつける'; //決闘者
  public $mania_do          = '対象を真似る'; //神話マニア
  public $death_note_do     = '対象の名前を書く'; //デスノート
  public $death_note_not_do = '誰の名前も書かない'; //デスノート(キャンセル)
  public $revive_refuse     = '蘇生を辞退する'; //蘇生辞退
  public $reset_time        = '超過時間リセット'; //超過時間リセット(管理者用)
}
