<?php
require_once('MessageImageGenerator2.php');

class MessageImageBuilder{
  public $font = 'azuki.ttf';
  #public $font = 'azukiP.ttf';
  #public $font = 'uzura.ttf';
  #public $font = 'aquafont.ttf';
  #public $font = 'Osaka.ttc';

  public $font_path = "C:\\WINDOWS\\Fonts\\";
  //public $font_path = '/Library/Fonts';

  public $generator;
  public $list;
  public $color_list = array(
    'human'		=> array('R' =>  96, 'G' =>  96, 'B' =>  96),
    'mage'		=> array('R' => 153, 'G' =>  51, 'B' => 255),
    'necromancer'	=> array('R' =>   0, 'G' => 102, 'B' => 153),
    'medium'		=> array('R' => 153, 'G' => 204, 'B' =>   0),
    'priest'		=> array('R' =>  77, 'G' =>  77, 'B' => 204),
    'guard'		=> array('R' =>  51, 'G' => 153, 'B' => 255),
    'common'		=> array('R' => 204, 'G' => 102, 'B' =>  51),
    'poison'		=> array('R' =>   0, 'G' => 153, 'B' => 102),
    'revive'		=> array('R' =>   0, 'G' => 153, 'B' => 102),
    'assassin'		=> array('R' => 144, 'G' =>  64, 'B' =>  64),
    'mind'		=> array('R' => 160, 'G' => 160, 'B' =>   0),
    'jealousy'		=> array('R' =>   0, 'G' => 204, 'B' =>   0),
    'brownie'		=> array('R' => 144, 'G' => 192, 'B' => 160),
    'wizard'		=> array('R' => 187, 'G' => 136, 'B' => 204),
    'doll'		=> array('R' =>  96, 'G' =>  96, 'B' => 255),
    'escaper'		=> array('R' =>  96, 'G' =>  96, 'B' => 144),
    'wolf'		=> array('R' => 255, 'G' =>   0, 'B' =>   0),
    'fox'		=> array('R' => 204, 'G' =>   0, 'B' => 153),
    'lovers'		=> array('R' => 255, 'G' =>  51, 'B' => 153),
    'quiz'		=> array('R' => 153, 'G' => 153, 'B' => 204),
    'vampire'		=> array('R' => 208, 'G' =>   0, 'B' => 208),
    'chiroptera'	=> array('R' => 136, 'G' => 136, 'B' => 136),
    'ogre'		=> array('R' => 224, 'G' => 144, 'B' =>   0),
    'duelist'		=> array('R' => 240, 'G' =>  80, 'B' => 112),
    'mania'		=> array('R' => 192, 'G' => 160, 'B' =>  96),
    'vote'		=> array('R' => 153, 'G' => 153, 'B' =>   0),
    'chicken'		=> array('R' =>  51, 'G' => 204, 'B' => 255),
    'liar'		=> array('R' => 102, 'G' =>   0, 'B' => 153),
    'decide'		=> array('R' => 153, 'G' => 153, 'B' => 153),
    'authority'		=> array('R' => 102, 'G' => 102, 'B' =>  51),
    'luck'		=> array('R' => 102, 'G' => 204, 'B' => 153),
    'voice'		=> array('R' => 255, 'G' => 153, 'B' =>   0),
    'no_last_words'	=> array('R' => 221, 'G' =>  34, 'B' =>  34),
    'sex_male'		=> array('R' =>   0, 'G' =>   0, 'B' => 255),
    'wisp'		=> array('R' => 170, 'G' => 102, 'B' => 255)
			  );

  function __construct($list){
    $font = $this->font_path . $this->font;
    $size = ($trans = $list == 'WishRoleList') ? 12 : 10;
    $this->generator = new MessageImageGenerator($font, $size, 3, 3, $trans);
    $this->list = new $list();
  }

  function LoadDelimiter($delimiter, $colors){
    if(! is_array($colors)) $colors = $this->color_list[$colors];
    return new Delimiter($delimiter, $colors['R'], $colors['G'], $colors['B']);
  }

  function AddDelimiter($list){
    foreach($list['delimiter'] as $delimiter => $colors){
      $this->generator->AddDelimiter($this->LoadDelimiter($delimiter, $colors));
    }
  }

  function SetDelimiter($list){
    if(isset($list['type'])) $this->SetDelimiter($this->list->{$list['type']});
    if(is_null($list['delimiter'])) $list['delimiter'] = array();
    $this->AddDelimiter($list);
  }

  function Generate($name, $calib = array()){
    $this->SetDelimiter($this->list->$name);
    return $this->generator->GetImage($this->list->{$name}['message'], $calib);
  }

  function Output($name, $calib = array()){
    header('Content-Type: image/gif');
    imagegif($this->Generate($name, $calib));
  }

  function Save($name){
    $image = $this->Generate($name);
    imagegif($image, "./test/{$name}.gif"); //出力先ディレクトリのパーミッションに注意
    imagedestroy($image);
    echo $name . '<br>';
  }

  function Test($name){ $this->Generate($name); }

  //まとめて画像ファイル生成
  function OutputAll(){
    foreach($this->list as $name => $list){
      $image = $this->Generate($name);
      imagegif($image, "./test/{$name}.gif"); //出力先ディレクトリのパーミッションに注意
      imagedestroy($image);
      echo $name . '<br>';
    }
  }
}

class RoleMessageList{
  public $human = array(
    'message' => "[役割] [|村人|陣営] [|村人|系]\n　あなたは|村人|です。特殊な能力はありませんが、あなたの知恵と勇気で村を救えるはずです。",
    'delimiter' => array('|' => 'human'));

  public $elder = array(
    'message' => "[役割] [|村人|陣営] [|村人|系]\n　あなたは|長老|です。あなたの#処刑#投票には_二票_分の価値があります。年功者の知恵を活かして村を勝利に導くのです。",
    'type' => 'human', 'delimiter' => array('#' => 'vote', '_' => 'authority'));

  public $scripter = array(
    'message' => "[役割] [|村人|陣営] [|村人|系]\n　あなたは|執筆者|です。一定日数後に、あなたの#処刑#_投票数_が +1 されます。村の全てを記録して名を上げるのです。",
    'type' => 'elder');

  public $mage = array(
    'message' => "[役割] [|村人|陣営] [#占い師#系]\n　あなたは#占い師#、夜の間に村人一人を占うことで翌朝その人が「|人|」か「_狼_」か知ることができます。あなたが村人の勝利を握っています。",
    'type' => 'human', 'delimiter' => array('#' => 'mage', '_' => 'wolf'));

  public $puppet_mage = array(
    'message' => "[役割] [|村人|陣営] [#占い師#系]\n　あなたは#傀儡師#、^人形^から^人形遣い^に見えている#占い師#です。#占い#の力と^人形^の協力で、一気に人外を炙り出すのです！",
    'type' => 'mage', 'delimiter' => array('^' => 'doll'));

  public $soul_mage = array(
    'message' => "[役割] [|村人|陣営] [#占い師#系]\n　あなたは#魂の占い師#、役職を知ることができる#占い師#です。自らの運命をも、その魂で切り開くことができるはずです。",
    'type' => 'mage');

  public $psycho_mage = array(
    'message' => "[役割] [|村人|陣営] [#占い師#系]\n　あなたは#精神鑑定士#、心理を図ることができる#占い師#です。_嘘つき_・_夢_を見ている人・^鬼^を探し出して村の混乱を収めるのです。",
    'type' => 'mage', 'delimiter' => array('^' => 'ogre'));

  public $sex_mage = array(
    'message' => "[役割] [|村人|陣営] [#占い師#系]\n　あなたは#ひよこ鑑定士#、性別が分かる#占い師#です。_狼_探しは他に任せ、性の不思議を解明するのです。:蝙蝠:や^鬼^も見つかりますが些細な事。",
    'type' => 'psycho_mage', 'delimiter' => array(':' => 'chiroptera'));

  public $stargazer_mage = array(
    'message' => "[役割] [|村人|陣営] [#占い師#系]\n　あなたは#占星術師#です。占った人が夜に行動しているかどうかを知ることができます。\n　頭上に輝く星々は全ての夜を知っている。星々の視点からしか見えぬ事を知るのです。",
    'type' => 'mage');

  public $voodoo_killer = array(
    'message' => "[役割] [|村人|陣営] [#占い師#系]\n　あなたは#陰陽師#です。夜の間に村人一人を占うことでその人の_呪い_を祓うことができます。\n　_呪い_や_憑依_の力で村を陥れようと目論む人外たちを#呪返し#で祓い去り、村を清めるのです！",
    'type' => 'mage');

  public $necromancer = array(
    'message' => "[役割] [|村人|陣営] [#霊能者#系]\n　あなたは#霊能者#、その日の_処刑_者が「|人|」か「^狼^」か翌日の朝に知ることができます。\n　地味ですがあなたの努力次第で大きく貢献することも不可能ではありません。",
    'type' => 'human', 'delimiter' => array('#' => 'necromancer', '_' => 'vote', '^' => 'wolf'));

  public $soul_necromancer = array(
    'message' => "[役割] [|村人|陣営] [#霊能者#系]\n　あなたは#雲外鏡#、役職を知ることができる#霊能者#です。全てを見抜くその鏡で_処刑_者の正体を暴くのです！",
    'type' => 'necromancer');

  public $psycho_necromancer = array(
    'message' => "[役割] [|村人|陣営] [#霊能者#系]\n　あなたは#精神感応者#です。_処刑_者の前世を知ることができます。前世に縛られし者の魂を輪廻の輪から解き放ってあげましょう。",
    'type' => 'necromancer');

  public $embalm_necromancer = array(
    'message' => "[役割] [|村人|陣営] [#霊能者#系]\n　あなたは#死化粧師#です。_処刑_者の投票先がその人の敵か味方かを表情を通して知ることができます。\n　「そんな顔をしないで？あなたの想いは私がみんなに伝えるから…だから、どうか安らかに眠って」",
    'type' => 'necromancer');

  public $emissary_necromancer = array(
    'message' => "[役割] [|村人|陣営] [#霊能者#系]\n　あなたは#密偵#です。_処刑_者に投票した人の中に_処刑_者と同じ陣営の人が何人いるのかを知ることができます。\n　あなた独自の極秘情報網で敵対陣営の情報を入手し、自陣営を勝利に導くのです。慢心する相手の裏をかけ！",
    'type' => 'necromancer');

  public $attempt_necromancer = array(
    'message' => "[役割] [|村人|陣営] [#霊能者#系]\n　あなたは#蟲姫#です。前日の夜に^人狼^の襲撃・:暗殺:を免れた人と=蘇生=に失敗した人を知ることができます。\n　可愛い虫たちが知らせる生死の予兆を感じ取り、命を弄ぶ異能者どもに正しき人の道を悟らせるのです！",
    'type' => 'necromancer', 'delimiter' => array(':' => 'assassin', '=' => 'revive'));

  public $yama_necromancer = array(
    'message' => "[役割] [|村人|陣営] [#霊能者#系]\n　あなたは#閻魔#です。前日の死者の死因を知ることができます。魂に沙汰を下すその力で死者に白黒はっきりつけてやりましょう！",
    'type' => 'necromancer');

  public $medium = array(
    'message' => "[役割] [|村人|陣営] [#巫女#系]\n　あなたは#巫女#です。_突然死_した人の所属陣営を知ることができます。不慮の死を遂げた人の正体を知らせ、村の推理に貢献するのです！",
    'type' => 'human', 'delimiter' => array('#' => 'medium', '_' => 'chicken'));

  public $bacchus_medium = array(
    'message' => "[役割] [|村人|陣営] [#巫女#系]\n　あなたは#神主#です。_突然死_した人の所属陣営を知ることができます。また、:鬼:を^処刑^投票で_ショック死_させることができます。\n　三度の飯より酒が好き、:鬼:がいたならさぁさぁ飲もう。飲んで飲ませて飲み比べ、最後に立つのは私だけ。:鬼:すら潰すこの私。",
    'type' => 'medium', 'delimiter' => array('^' => 'vote', ':' => 'ogre'));

  public $seal_medium = array(
    'message' => "[役割] [|村人|陣営] [#巫女#系]\n　あなたは#封印師#です。_突然死_した人の所属陣営を知ることができます。また、^処刑^投票した人の限定能力を封じることができます。\n　あなたに与えられたのは破邪の聖印。数多の邪悪は、その輝きの前には無力です。その力を振るい、無辜なる村人を救うのです！",
    'type' => 'bacchus_medium');

  public $revive_medium = array(
    'message' => "[役割] [|村人|陣営] [#巫女#系]\n　あなたは#風祝#です。_突然死_した人の所属陣営を知ることができます。また、死んだ人を誰か一人^蘇生^できます。\n　あなたが持ちしは奇跡の力。神の御力をもって死した村人の魂を呼び戻し、彼らの心に安寧をもたらすのです！",
    'type' => 'medium', 'delimiter' => array('^' => 'revive'));

  public $priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#司祭#です。一定日数おきに現在生きている|村人陣営|の総数を知ることができます。\n　神のお告げで清き村人達の人数を知り、「村人を導くべし」との神のご意志に適うのです！",
    'type' => 'human', 'delimiter' => array('#' => 'priest'));

  public $bishop_priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#司教#です。一定日数おきに死亡した_村人陣営以外_の総数を知ることができます。\n　神聖なるお告げにより死者達の真の姿を伝え、心清き村人達を正しき道へと導くのです！",
    'type' => 'priest', 'delimiter' => array('_' => 'wolf'));

  public $dowser_priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#探知師#です。一定日数おきに現在生きている人が所有しているサブ役職の総数を知ることができます。\n　あなたの探知能力と推理力次第では、水面下にて息を潜める特殊な陣営を見抜くことも不可能ではありません。",
    'type' => 'priest');

  public $weather_priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#祈祷師#です。翌日の天候を知ることができます。また、一定条件で天候を引き起こすことができます。\n　移ろう空模様を知る、あなたの祈りは天の気と交わり世界を染め上げる。天の恵みよ、あまねく者へ降り注げ。",
    'type' => 'priest');

  public $high_priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#大司祭#です。一定日数後から現在生きている|村人陣営|、または死亡した_村人陣営以外_の総数を知ることができます。\n　神に最も近いあなたなら、幾夜の祈りののち、毎夜お告げを得ることができるでしょう。神の御心を村人へ伝え、導くのです！",
    'type' => 'bishop_priest');

  public $holy_priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#聖徳道士#です。一定日数後に身代わり君とあなたを含めた周囲の人の所属陣営の総数を知ることができます。\n　あなたの役目は周囲を見極め告げること。生き延びなさい。その力で人外達を暴き出し、その最期を見届けるのです。",
    'type' => 'bishop_priest');

  public $revive_priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#天人#です。初日に一度天に帰って下界の様子を眺める事になります。後で颯爽と降臨して華麗に村を勝利に導きましょう！",
    'type' => 'priest');

  public $border_priest = array(
    'message' => "[役割] [|村人|陣営] [#司祭#系]\n　あなたは#境界師#です。二日目以降、夜にあなたに投票した人の数を知ることができます。\n　夜に見た夢は幻ではない。あなたにしか持ち得ない夢と現の双方の視点を活かすのです。",
    'type' => 'priest');

  public $guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#狩人#です。夜の間に村人一人を_人狼_から護ることができます。_人狼_のココロを読むのです。",
    'type' => 'human', 'delimiter' => array('#' => 'guard', '_' => 'wolf'));

  public $hunter_guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#猟師#です。#護衛#先が^妖狐^なら#狩る#ことができますが、_人狼_に襲撃された場合は殺されてしまいます。\n　あなたには二つの道が与えられました。身代わりの盾と、^妖狐^を討つ剣。あなたの選択が村を救うのです！",
    'type' => 'guard', 'delimiter' => array('^' => 'fox'));

  public $blind_guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#夜雀#です。#狩り#能力はありませんが、#護衛#先を襲撃した人外を^目隠し^にして撃退することができます。\n　静寂な夜の翼、舞うは守護の羽。その羽で大事な人を護り、_狼_に終わらぬ夜を、:吸血鬼:に迷いの夜の贈り物を。",
    'type' => 'guard', 'delimiter' => array('^' => 'no_last_words', ':' => 'vampire'));

  public $gatekeeper_guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#門番#です。#狩り#能力はありませんが、#護衛#先を^暗殺^からも護ることができます。\n　あなたの仕事は_狼_を倒す事ではありません。護るべき人を護る仕事を全うしましょう。",
    'type' => 'guard', 'delimiter' => array('^' => 'assassin'));

  public $reflect_guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#侍#です。^暗殺^を跳ね返すことができます。また、#護衛#先が:鬼:なら#狩る#ことができます。\n　かかる火の粉は振り払い、浮き世の:鬼:を斬り捨てて、悪しき_狼_の凶刃から村人を守るのです！",
    'type' => 'gatekeeper_guard', 'delimiter' => array(':' => 'ogre'));

  public $poison_guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#騎士#です。夜の間に村人一人を_人狼_から護ることができます。もし、あなたが_人狼_に襲われたら刺し違えてでも倒すのです！",
    'type' => 'guard');

  public $fend_guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#忍者#です。一度だけ_人狼_の襲撃に耐えることができます。三日月を背に_人狼_の襲撃を読み、忍びの力で村を勝利に導くのです！",
    'type' => 'guard');

  public $reporter = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#ブン屋#です。#尾行#先が_人狼_に襲撃されたら襲撃した人が誰か知ることができます。\n　_人狼_や^妖狐^に気取られぬよう、慎重かつ大胆に行動して華麗にスクープを入手するのです！",
    'type' => 'hunter_guard');

  public $anti_voodoo = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#厄神#です。夜の間に村人一人の災厄を祓うことができます。_呪い_から^占い師^を護り、村を浄化するのです！",
    'type' => 'guard', 'delimiter' => array('_' => 'wolf', '^' => 'mage'));

  public $elder_guard = array(
    'message' => "[役割] [|村人|陣営] [#狩人#系]\n　あなたは#老兵#です。あなたの^処刑^投票には:二票:分の価値がありますが、#狩り#能力を持たず、時々#護衛#に失敗します。\n　若者たちは老成なあなたを疎うかも知れません。#老兵#は死なず、ただ消え去るのみ。兵として務めを果たすのです。",
    'type' => 'guard', 'delimiter' => array('^' => 'vote', ':' => 'authority'));

  public $common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#共有者#、他の#共有者#が誰であるか知ることができます。生存期間が他と比べ永い能力です。\n　あなたは推理する時間が与えられたのです。悩みなさい！",
    'type' => 'human', 'delimiter' => array('#' => 'common'));

  public $leader_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#指導者#です。他の#共有者#が誰であるか知ることができます。また、二日目以降、夜の発言が全員に見えます。\n　あなたの声は村を動かす原動力。昼も夜も声を響かせ叫び続け、村人と共に歩み、勇気を与える『リーダー』であれ！",
    'type' => 'common');

  public $detective_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#探偵#です。他の#共有者#が誰であるか知ることができます。また、_毒_や^暗殺^で死ぬことはありません。\n　あなたの推理と決断力が問われる事になります。この難事件を見事解決し、名実ともに名探偵になるのです！",
    'type' => 'common', 'delimiter' => array('_' => 'poison', '^' => 'assassin'));

  public $trap_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#策士#です。他の#共有者#が誰であるか知ることができます。また、_村人以外_の票を全て集めたらまとめて_罠_にかけることができます。\n　権謀術数が渦巻く村で、勝利を確信して数の暴威を振るう人外達に策とはどういうものか、その身の破滅と引き換えに教えてあげましょう。",
    'type' => 'common', 'delimiter' => array('_' => 'wolf'));

  public $sacrifice_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#首領#です。#共有者#が誰であるか知ることができます。また、_人狼_に襲撃されても|村人|と^蝙蝠^を犠牲にして生き延びることができます。\n　覇者を窺う憎き^蝙蝠^をも己が糧にし、全ての_人狼_を村から駆逐せん。その志は共に生きる仲間、そして志半ばで倒れた村人たちの弔いの為に。",
    'type' => 'trap_common', 'delimiter' => array('^' => 'chiroptera'));

  public $ghost_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#亡霊嬢#です。他の#共有者#が誰であるか知ることができます。また、あなたを襲った_人狼_を^小心者^にしてしまいます。\n　あなたの魂魄は、黄泉への誘い水。^ショック死^の恐怖に怯える_狼_が因果の報いを受けるまで、冥府で幽雅に見守りましょう。",
    'type' => 'trap_common', 'delimiter' => array('^' => 'chicken'));

  public $spell_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#葛の葉#です。他の#共有者#が誰であるか知ることができ、_処刑_投票先が人外だったら^魔が言^を与えますが、占われると:呪殺:されます。\n　とある森の白き狐には村人たちへ返しきれぬ大恩があります。言霊を巧みに操り、受けた恩を返すときがやってきました。今がその時です！",
    'type' => 'common', 'delimiter' => array('_' => 'vote', '^' => 'liar', ':' => 'mage'));

  public $critical_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#暴君#です。他の#共有者#が誰であるか知ることができます。また、_処刑_^投票数^が +1 されますが、稀に:得票数:が +100 されます。\n　王たるもの堂々と生き、王の言葉は絶対と知れ。阻むものは全て薙ぎ払い己が道を闊歩せよ。華散りし時さえも豪華絢爛、盛大に散れ！",
    'type' => 'common', 'delimiter' => array('_' => 'vote', '^' => 'authority', ':' => 'luck'));

  public $hermit_common = array(
    'message' => "[役割] [|村人|陣営] [#共有者#系]\n　あなたは#隠者#です。他の#共有者#が誰であるか知ることができますが、あなたの声は仲間の#共有者#以外には届きません。\n　現世との交わりを絶ち生活する、その声は特別な意味を持ちません。しかしその知恵は村を救う武器となるでしょう。",
    'type' => 'common');

  public $poison = array(
    'message' => "[役割] [|村人|陣営] [#埋毒者#系]\n　あなたは#埋毒者#です。_人狼_に襲われた場合は_人狼_の中から、^処刑^された場合は生きている村の人たちの中からランダムで一人道連れにします。",
    'type' => 'human', 'delimiter' => array('#' => 'poison', '_' => 'wolf', '^' => 'vote'));

  public $incubate_poison = array(
    'message' => "[役割] [|村人|陣営] [#埋毒者#系]\n　あなたは#潜毒者#です。時が経つにつれてあなたの体内に秘められた#毒#が顕在化してきます。まずは時間を稼ぐのです。",
    'type' => 'poison');

  public $guide_poison = array(
    'message' => "[役割] [|村人|陣営] [#埋毒者#系]\n　あなたは#誘毒者#です。あなたの#毒#は#毒#能力者にしか中りません。#毒#を以って#毒#を制すのです。",
    'type' => 'poison');

  public $snipe_poison = array(
    'message' => "[役割] [|村人|陣営] [#埋毒者#系]\n　あなたは#狙毒者#です。^処刑^された場合はあなたの^処刑^投票先の人と同じ陣営の人に#毒#が中ります。\n　敵対する者を狙い撃ち、その命を奪いましょう。自らの命を以って、敵を撃つ弾丸とするのです！",
    'type' => 'poison');

  public $poison_cat = array(
    'message' => "[役割] [|村人|陣営] [#猫又#系]\n　あなたは#猫又#、#毒#を持っています。また、死んだ人を誰か一人#蘇生#できます。飼ってくれた家の恩を村を救うことで返すのです！",
    'type' => 'human', 'delimiter' => array('#' => 'poison'));

  public $revive_cat = array(
    'message' => "[役割] [|村人|陣営] [#猫又#系]\n　あなたは#仙狸#です。高い#蘇生#能力を持っていますが、成功するたびに成功率が下がります。\n　人の精気を頂戴しつつ、仙山の秘奥で身に付けたその神秘の力で人々に恩を返すのです！",
    'type' => 'poison_cat');

  public $sacrifice_cat = array(
    'message' => "[役割] [|村人|陣営] [#猫又#系]\n　あなたは#猫神#です。死んだ人を誰か一人、確実に#蘇生#することができますが自分は死んでしまいます。\n　あなたが残せる最後の御業は「等価を以て魂を反す」こと。死を以て、輪廻の輪へと魂を導くのです。",
    'type' => 'poison_cat');

  public $missfire_cat = array(
    'message' => "[役割] [|村人|陣営] [#猫又#系]\n　あなたは#常世神#です。あなたの#蘇生#は必ず誤爆してしまいます。根の国から招かれ葉を食らう。あなたは甘い夢を売り付けるだろう。",
    'type' => 'poison_cat');
  public $pharmacist = array(
    'message' => "[役割] [|村人|陣営] [#薬師#系]\n　あなたは#薬師#です。_処刑_投票した人を#解毒#するか、#毒#能力を知ることができます。|村人|への二次被害を未然に防ぐのです！",
    'type' => 'poison', 'delimiter' => array('_' => 'vote'));

  public $cure_pharmacist = array(
    'message' => "[役割] [|村人|陣営] [#薬師#系]\n　あなたは#河童#です。_処刑_投票した人を#解毒#しつつ、^ショック死^を抑制することができます。\n　一族に伝わる膏薬は人の命を救う霊薬。苦しむ村人を救い、村に笑顔を取り戻すのです！",
    'type' => 'pharmacist', 'delimiter' => array('^' => 'chicken'));

  public $revive_pharmacist = array(
    'message' => "[役割] [|村人|陣営] [#薬師#系]\n　あなたは#仙人#です。_処刑_投票した人の^ショック死^を抑制することができます。また、一度だけ:人狼:に襲撃されても#蘇生#できます。\n　死を超越し、死に拒絶されたあなたは死を否定する力を持っています。その力で村を:人狼:という理不尽な死から救いだすのです！",
    'type' => 'cure_pharmacist', 'delimiter' => array(':' => 'wolf'));

  public $alchemy_pharmacist = array(
    'message' => "[役割] [|村人|陣営] [#薬師#系]\n　あなたは#錬金術師#です。_処刑_投票した人の#毒#能力を知ることができ、_処刑_された場合は#毒#を強化することができます。\n　古の賢者の知識と魔法の如き錬金の秘法で#毒#を瞬時に作り変え、村に仇なす者に化学の力を思い知らせてやるのです！",
    'type' => 'pharmacist');

  public $centaurus_pharmacist = array(
    'message' => "[役割] [|村人|陣営] [#薬師#系]\n　あなたは#人馬#です。_処刑_投票した人が#毒#能力を持っていたら死んでしまいます。#毒#に触れるだけで死ぬ体なら、#毒#を見つけて死になさい。",
    'type' => 'pharmacist');

  public $assassin = array(
    'message' => "[役割] [|村人|陣営] [#暗殺者#系]\n　あなたは#暗殺者#です。夜に村人一人を#暗殺#することができます。闇の内に人外を消し、村の平和の為に暗躍するのです！",
    'type' => 'human', 'delimiter' => array('#' => 'assassin'));

  public $doom_assassin = array(
    'message' => "[役割] [|村人|陣営] [#暗殺者#系]\n　あなたは#死神#です。夜に村人一人に_死の宣告_を行うことができます。命の灯火を継ぐも絶つもあなた次第です。",
    'type' => 'assassin', 'delimiter' => array('_' => 'chicken'));

  public $select_assassin = array(
    'message' => "[役割] [|村人|陣営] [#暗殺者#系]\n　あなたは#おしら様#です。夜に村人一人を#オシラ遊び#の対象に選ぶことができます。村の敵に命日を定め、天に召して平和を願いましょう。",
    'type' => 'assassin');

  public $reverse_assassin = array(
    'message' => "[役割] [|村人|陣営] [#暗殺者#系]\n　あなたは#反魂師#です。夜に選んだ人が生きていたら#暗殺#し、死んでいたら_蘇生_することができます。\n　あなたの秘術は生死を操る禁忌。夜陰にその力を振るい、村のための舞台を秘密裏に整えるのです。",
    'type' => 'assassin', 'delimiter' => array('_' => 'revive'));

  public $soul_assassin = array(
    'message' => "[役割] [|村人|陣営] [#暗殺者#系]\n　あなたは#辻斬り#です。#暗殺#した人の役職を知ることができますが、_毒_を持っていた場合は死んでしまいます。\n　その手に有りしは、闇に煌く必殺の剣。村を闊歩する悪を暴き出し、討ち果たす事こそがあなたの任務です。",
    'type' => 'assassin', 'delimiter' => array('_' => 'poison'));

  public $mind_scanner = array(
    'message' => "[役割] [|村人|陣営] [#さとり#系]\n　あなたは#さとり#です。誰か一人の心を読むことができます。興味を持った人間の心象を汲み、その本性を暴くのです。",
    'type' => 'human', 'delimiter' => array('#' => 'mind'));

  public $evoke_scanner = array(
    'message' => "[役割] [|村人|陣営] [#さとり#系]\n　あなたは#イタコ#です。誰か一人の心を#口寄せ#を介して読むことができます。先祖伝来の#口寄せ#の力で村を勝利に導くのです！",
    'type' => 'mind_scanner');

  public $presage_scanner = array(
    'message' => "[役割] [|村人|陣営] [#さとり#系]\n　あなたは#件#です。あなたが_人狼_に襲撃されたら、あなたの#受託者#に誰が襲撃したかメッセージを送ることができます。\n　たとえあなたが死すとも、見えるようで見えないものに繋がれた相方に自分の不屈な意思を受け継いでもらうのです！",
    'type' => 'mind_scanner', 'delimiter' => array('_' => 'wolf'));

  public $clairvoyance_scanner = array(
    'message' => "[役割] [|村人|陣営] [#さとり#系]\n　あなたは#猩々#です。二日目から誰か一人のその夜の能力の行使先が誰なのかを知ることができます。\n　夜に彷徨い酒に酔い、誰かと酒宴に興じることで、夜のひとときを共有し土産話を持ち帰るのです！",
    'type' => 'mind_scanner');

  public $whisper_scanner = array(
    'message' => "[役割] [|村人|陣営] [#さとり#系]\n　あなたは#囁騒霊#です。二日目からあなたの夜の独り言が_共有者_にも聞こえるようになります。\n　死んでしまったのは誰？あなたの口ずさむ悲しみを、_共有者_たちにも知ってもらいましょう。",
    'type' => 'mind_scanner', 'delimiter' => array('_' => 'common'));

  public $howl_scanner = array(
    'message' => "[役割] [|村人|陣営] [#さとり#系]\n　あなたは#吠騒霊#です。二日目からあなたの夜の独り言が_人狼_にも聞こえるようになります。\n　生きているのは誰？あなたの紡ぐ言葉で_人狼_達の心をざわつかせ、踊ってもらいましょう。",
    'type' => 'presage_scanner');

  public $telepath_scanner = array(
    'message' => "[役割] [|村人|陣営] [#さとり#系]\n　あなたは#念騒霊#です。二日目からあなたの夜の独り言が_妖狐_にも聞こえるようになります。\n　どちらでもないのは誰？あなたの知恵が奏でる幻想で、_妖狐_達さえも騙して笑いましょう。",
    'type' => 'mind_scanner', 'delimiter' => array('_' => 'fox'));

  public $jealousy = array(
    'message' => "[役割] [|村人|陣営] [#橋姫#系]\n　あなたは#橋姫#です。_恋人_が揃ってあなたに^処刑^投票してきたら:ショック死:させることができます。妬みの力で_恋人_を滅ぼすのです！",
    'type' => 'human',
    'delimiter' => array('#' => 'jealousy', '_' => 'lovers', '^' => 'vote', ':' => 'chicken'));

  public $divorce_jealousy = array(
    'message' => "[役割] [|村人|陣営] [#橋姫#系]\n　あなたは#縁切地蔵#です。あなたに^処刑^投票してきた_恋人_を一定確率で=恋色迷彩=にすることができます。\n　恋は得てして盲目。その言葉をも惑わし、幸せな時に終焉を。恋の終着を、その目で見届けるのです！",
    'type' => 'jealousy', 'delimiter' => array('=' => 'liar'));

  public $miasma_jealousy = array(
    'message' => "[役割] [|村人|陣営] [#橋姫#系]\n　あなたは#蛇姫#です。^処刑^投票先が_恋人_だった場合は一定確率で:熱病:にさせることができます。\n　蛇に変じ絡みついて逃しゃしませぬ。恋に狂えば燃ゆる想いに焦がれ果てるが定めでしょう？",
    'type' => 'jealousy');

  public $critical_jealousy = array(
    'message' => "[役割] [|村人|陣営] [#橋姫#系]\n　あなたは#人魚#です。^処刑^投票先が_恋人_だった場合は自分に=痛恨=がついてしまいます。叶わぬ恋の痛みを、あなたは知るでしょう。",
    'type' => 'jealousy', 'delimiter' => array('=' => 'luck'));

  public $brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#座敷童子#です。|村人|の_処刑_^投票数^を +1 することができますが、あなたが_処刑_されたら誰か一人を:熱病:にしてしまいます。\n　その力で村を裕福にしてあげましょう。但しあなたが_処刑_されてしまうとたちまち村に不幸が訪れ、病に伏せる者がでてしまいます。",
    'type' => 'human',
    'delimiter' => array('#' => 'brownie', '_' => 'vote', '^' => 'authority', ':' => 'chicken'));

  public $thunder_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#雷公#です。_再投票_時に最多得票者だった場合は誰か一人を:ショック死:させてしまいます。\n　無差別に天から降り注ぐ雷神の怒りが村に幸せをもたらせるのか、全ては、あなた次第でしょう。",
    'type' => 'history_brownie', 'delimiter' => array('*' => 'revive'));

  public $echo_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#山彦#です。時々、昼の発言時に直前の誰かの発言を#反響#してしまいます。細かいことはおいて叫びましょう！やっほー！っほー…！",
    'type' => 'brownie');

  public $revive_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#蛇神#です。一度だけ=人狼=に襲撃されても*蘇生*できます。また、*蘇生*能力者の成功率を高めることができます。\n　――奇跡を願うものよ、我を崇めよ、我を讃えよ。我は#蛇神#、命と再生を司るもの。我が神威もて、汝に力を与えん。",
    'type' => 'history_brownie', 'delimiter' => array('*' => 'revive'));

  public $harvest_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#豊穣神#です。あなたに_処刑_投票した人が|村人陣営|なら一定確率で^会心^を与えますが、_処刑_されてしまうと:凍傷:にしてしまいます。\n　実りの秋。瞳に映る黄金の草原。秋の贈り物は、あなたの心にも実りを与えてくれる安らぎの小夜曲。この実りは、厳しき冬のために…。",
    'type' => 'brownie');

  public $maple_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#紅葉神#です。あなたに_処刑_投票した人が|村人陣営|なら一定確率で*痛恨*を与え、_処刑_されてしまうとさらに:凍傷:にしてしまいます。\n　散りゆく秋。吹く風は木枯らし。木の葉の吹雪は、時に大切な物すら見失わせてしまう哀愁の輪舞曲。紅葉との別れの先に待つのは…冬。",
    'type' => 'brownie', 'delimiter' => array('*' => 'luck'));

  public $cursed_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#祟神#、=呪い=を持っています。また、あなたを襲撃した=人狼=や_処刑_投票してきた人に:死の宣告:を行います。\n　呪われた身を呪うことなく、触れた者に不幸をもたらすその力で、村を襲う悪しき災厄を祟り返してやるのです。",
    'type' => 'history_brownie');

  public $sun_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#八咫烏#です。=人狼=に襲撃されたら次の日を全員*公開者*に、_処刑_されたら次の日を全員~目隠し~にしてしまいます。\n　太陽神の御使いとして、村の天上に光り輝く太陽をもたらし昼も夜も全て一緒にまとめてフュージョンし尽くすのです！",
    'type' => 'history_brownie', 'delimiter' => array('*' => 'mind', '~' => 'no_last_words'));

  public $history_brownie = array(
    'message' => "[役割] [|村人|陣営] [#座敷童子#系]\n　あなたは#白澤#です。=人狼=に襲撃されたら次の日の夜を飛ばしてしまいます。どんな悲惨な夜も歴史に残さなければ消えてしまうのです。",
    'type' => 'brownie', 'delimiter' => array('=' => 'wolf'));

  public $wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#魔法使い#です。二日目以降、夜に誰か一人に#魔法#をかけることができます。\n　#魔法#は様々に形を変え村に驚きをもたらします。あなたの力で奇跡を起こすのです！",
    'type' => 'human', 'delimiter' => array('#' => 'wizard'));

  public $soul_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#八卦見#です。二日目以降、夜に誰か一人に強力な#魔法#をかけることができます。\n　当たるも八卦当たらぬも八卦。あなたの知性と理性こそ、#魔法#の神髄と呼ぶべき技です。",
   'type' => 'wizard');

  public $awake_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#比丘尼#です。初めは弱い#魔法#しか使えませんが、一度だけ_人狼_の襲撃に耐えることができ、それ以降は#魔法#が強化されます。\n　白比丘尼！人魚の生き肝を食せし罪人よ！輪廻の輪さえも超越せしめたその力を以って、跳梁跋扈する物の怪より同胞を助け給え！",
    'type' => 'wizard', 'delimiter' => array('_' => 'wolf'));

  public $mimic_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#物真似師#です。#魔法#で二日目以降に_占い_、三日目以降に^霊能^相当の結果を同時に得ることができますが、成功率は半々です。\n　たかが真似事と侮るなかれ。人々の信頼さえ得られれば、その芸は万雷の拍手にて招き入れられることでしょう。さあ皆様お立会い！",
    'type' => 'wizard', 'delimiter' => array('_' => 'mage', '^' => 'necromancer'));

  public $spiritism_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#交霊術師#です。_処刑_者の^霊能^情報を#魔法#でランダムに一つ、知ることができます。\n　生ける者の為、死せる者を呼びて正体を暴くのです。魂を騙る事などできないのだから。",
    'type' => 'wizard', 'delimiter' => array('_' => 'vote', '^' => 'necromancer'));

  public $philosophy_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#賢者#です。_処刑_投票で発動する#魔法#を使うことができます。七曜と知識の融合。その力で、静かな読書の時を取り戻すのです！",
    'type' => 'wizard', 'delimiter' => array('_' => 'vote'));

  public $barrier_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#結界師#です。二日目以降、同時に複数の人を一定確率で_護衛_できる#魔法#をかけることができます。\n　古来より伝えられし念動結界術…。その力を以って、悪しき者共から人々を守るために今、此処に発動ッ！",
    'type' => 'wizard', 'delimiter' => array('_' => 'guard'));

  public $astray_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#左道使い#です。二日目以降、夜に誰か一人に#魔法#をかけることができますが、主な効果は特殊_狂人_相当です。\n　千変万化の嘘を手に、あなたは悪逆無道の夜を往く。敬虔に年を累ねた師父たちを、異装の獣の皿へと載せましょう。",
    'type' => 'awake_wizard');

  public $pierrot_wizard = array(
    'message' => "[役割] [|村人|陣営] [#魔法使い#系]\n　あなたは#道化師#です。二日目以降、夜に誰か一人に#魔法#をかけることができますが、主な効果は_悪戯_相当です。\n　変幻自在におどけてみせよう♪何が出るかはおたのしみ♪今宵の宴に添えるは悲喜劇！さあさとくと御覧あれ♪ ",
    'type' => 'wizard', 'delimiter' => array('_' => 'chiroptera'));

  public $doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#上海人形#です。あなたは#人形遣い#を倒し、|村人|を勝利に導く必要があります。自由を得るために立ち上がりましょう！",
    'type' => 'human', 'delimiter' => array('#' => 'doll'));

  public $friend_doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#仏蘭西人形#です。同志の#人形#が誰か分かります。あなたは#人形遣い#を倒し、|村人|を勝利に導く必要があります。\n　仲間と協力して自由を勝ち取るのです。勝利は非常に厳しいですが、みんなで頑張れば決して不可能ではありません！",
   'type' => 'doll');

  public $phantom_doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#倫敦人形#です。一度だけ_占い_を無効化してしまいます。あなたは#人形遣い#を倒し、|村人|を勝利に導く必要があります。\n　その身が纏う霧はあなたを謎で包みこみ、正体を隠してしまいます。……味方につけたい村人たちの不審の種になるとしても。",
    'type' => 'doll', 'delimiter' => array('_' => 'mage'));

  public $poison_doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#鈴蘭人形#、_毒_を持っています。あなたは#人形遣い#を倒し、|村人|を勝利に導く必要があります。\n　#人形遣い#の存在を凌駕し、遣われる存在ではない事を証明した上で、自らの存在意義を見出すのです！",
   'type' => 'doll', 'delimiter' => array('_' => 'poison'));

  public $doom_doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#蓬莱人形#です。_処刑_されたらあなたに投票した人からランダムで一人に^死の宣告^を行います。\n　あなたは#人形遣い#を倒し、|村人|を勝利に導く必要があります。_処刑_された恨みを呪詛に変えるのです。",
    'type' => 'doll', 'delimiter' => array('_' => 'vote', '^' => 'chicken'));

  public $revive_doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#西蔵人形#です。一度だけ_人狼_に襲撃されても^蘇生^できます。あなたは#人形遣い#を倒し、|村人|を勝利に導く必要があります。\n　あなたの命の輪は作り物。だからこそできる手段がある。例えその身に牙が立てられようとあなたの輪を今一度繋ぎ留めるのです！",
    'type' => 'doll_master', 'delimiter' => array('^' => 'revive'));

  public $scarlet_doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#和蘭人形#です。_人狼_からは|無意識|に、^妖狐^からは^子狐^に、他の#人形#からは#人形遣い#に見えています。\n　あなたは#人形遣い#を倒し、|村人|を勝利に導く必要があります。紅髪に惹かれる者が友か敵か見極めるのです！",
    'type' => 'doll_master', 'delimiter' => array('^' => 'fox'));

  public $silver_doll = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#露西亜人形#です。あなたは#人形遣い#を倒し、|村人|を勝利に導く必要がありますが、#人形遣い#が誰か分かりません。\n　あなたの戦いは、まず打ち倒すべき#人形遣い#を探し出すことから始まります。苦しい戦いになりますが、あきらめないで。",
   'type' => 'doll');

  public $doll_master = array(
    'message' => "[役割] [|村人|陣営] [#上海人形#系]\n　あなたは#人形遣い#です。_人狼_に襲撃されても他の#人形#を犠牲にして生き延びることができます。\n　#人形#を盾にする力で長生きしやすい立場を活かし、あなたの手腕で村を勝利に導きましょう！",
    'type' => 'doll', 'delimiter' => array('_' => 'wolf'));

  public $escaper = array(
    'message' => "[役割] [|村人|陣営] [#逃亡者#系]\n　あなたは#逃亡者#です。死亡したら敗北となり、夜の#逃亡#先で_人狼_に遭遇したら死んでしまいます。\n　逃亡生活で培った直感と判断力を武器として、安住の地を取り戻すまで_人狼_から逃げ切るのです！",
    'type' => 'human', 'delimiter' => array('#' => 'escaper', '_' => 'wolf'));

  public $psycho_escaper = array(
    'message' => "[役割] [|村人|陣営] [#逃亡者#系]\n　あなたは#迷い人#です。夜の#逃亡#先が_嘘つき_か、_人狼_に襲撃されたら死んでしまいます。\n　闇夜に迷って道を尋ねて、示されたのは夜明けの家路か、それとも冥府に続く細道か。",
    'type' => 'escaper');

  public $incubus_escaper = array(
    'message' => "[役割] [|村人|陣営] [#逃亡者#系]\n　あなたは#一角獣#です。夜の#逃亡#先が^女性^以外か、_人狼_に襲撃されたら死んでしまいます。\n　美麗で誇り高く、恐ろしくも優しき#一角獣#よ！その身を賭けて乙女の純潔を守るのだ！",
    'type' => 'escaper', 'delimiter' => array('^' => 'lovers'));

  public $succubus_escaper = array(
    'message' => "[役割] [|村人|陣営] [#逃亡者#系]\n　あなたは#水妖姫#です。夜の#逃亡#先が^男性^以外か、_人狼_に襲撃されたら死んでしまいます。\n　あなたは^男性^に愛され、結ばれることで魂を得ます。最後まで生き残り魂を得ましょう。",
    'type' => 'escaper', 'delimiter' => array('^' => 'sex_male'));

  public $doom_escaper = array(
    'message' => "[役割] [|村人|陣営] [#逃亡者#系]\n　あなたは#半鳥女#です。夜の#逃亡#先に^死の宣告^を行い、#逃亡#先が^死の宣告^を受けているか、_人狼_に襲撃されたら死んでしまいます。\n　わが身に積もる不幸を嘆く時間はありません。つむじ風の様に駆け巡り、闇夜に集いし迷える魂を等しく冥界へと導きましょう。",
    'type' => 'escaper', 'delimiter' => array('^' => 'chicken'));

  public $divine_escaper = array(
    'message' => "[役割] [|村人|陣営] [#逃亡者#系]\n　あなたは#麒麟#です。夜の#逃亡#先が|村人陣営|なら^一日村長^を与え、#逃亡#先が_人狼_・:暗殺者:・=鬼=か、_人狼_に襲撃されたら死んでしまいます。\n　仁の心を持つ君主が生まれると姿を現す吉兆の霊獣。君主となるべきものの下に宿り、王として相応しき存在であると証明するのです。",
    'type' => 'escaper', 'delimiter' => array('^' => 'authority', ':' => 'assassin', '=' => 'ogre'));

  public $wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|人狼|です。夜の間に他の|人狼|と協力し村人一人を殺害できます。あなたはその強力な力で村人を喰い殺すのです！",
    'delimiter' => array('|' => 'wolf'));

  public $boss_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|白狼|です。もう#占い師#を恐れる必要はありません。全てを欺き通して村人たちを皆殺しにするのです！",
    'type' => 'wolf', 'delimiter' => array('#' => 'mage'));

  public $mist_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|霧狼|です。#占い師#に占われると_蝙蝠_と判定されます。紛いの羽音で村の目を欺き、夜霧に紛れて村を混乱へ導くのです！",
    'type' => 'boss_wolf', 'delimiter' => array('_' => 'chiroptera'));

  public $gold_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|金狼|です。#ひよこ鑑定士#に占われると_蝙蝠_と判定されます。_蝙蝠_に疑惑の目を向けさせ、|狼|の勝利に貢献してもらうのです！",
    'type' => 'mist_wolf');

  public $phantom_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|幻狼|です。一度だけ#占い#を無効化することができます。幻の|月兎|を想起させ、村を惑わせるのです！",
    'type' => 'boss_wolf');

  public $cursed_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|呪狼|です。あなたを占った#占い師#を|呪返し|で殺すことができます。村を絶望の底に叩き落してやるのです！",
    'type' => 'boss_wolf');

  public $quiet_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|静狼|です。あなたの遠吠えは村人には聞こえません。あなたの作る静寂は疑念となり、村人を騙す力となるのです。",
    'type' => 'wolf');

  public $wise_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|賢狼|です。#妖狐#の念話を感知することができます。人の中に潜む#狐#の吐息を正しく聞き分け、仲間に知らせるのです！",
    'type' => 'wolf', 'delimiter' => array('#' => 'fox'));

  public $poison_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|毒狼|です。たとえ_処刑_されても体内に流れる#毒#で村人一人を道連れにできます。強気に村をかく乱するのです！",
    'type' => 'resist_wolf', 'delimiter' => array('_' => 'vote'));

  public $resist_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|抗毒狼|です。一度だけ#毒#に耐えることができます。あなたへの最期の抵抗を凌ぎ、村人たちを恐怖に陥れるのです！",
    'type' => 'wolf', 'delimiter' => array('#' => 'poison'));

  public $revive_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|仙狼|です。一度だけ夜に死亡しても#蘇生#できます。夜の帳がある限り終わることの無き恐怖を思い知らせるのです！",
    'type' => 'wolf', 'delimiter' => array('#' => 'revive'));

  public $trap_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|狡狼|です。一定日数後に、あなたの元に訪れた人を|罠|で撃退することができます。\n　我が叡智に見抜けぬ人の動き無し。我が命を狙う無法者と我が身に近づく愚か者に災厄を。",
    'type' => 'wolf');

  public $blue_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|蒼狼|です。襲撃した人が#妖狐#だった場合は_はぐれ者_にすることができます。\n　あなたの牙で念話を噛み切り連携を切り崩し、#妖狐#を烏合の衆にしてしまうのです！",
    'type' => 'wise_wolf', 'delimiter' => array('_' => 'mind'));

  public $emerald_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|翠狼|です。|人狼|を襲撃した場合はあなたと_共鳴者_になります。孤立している仲間と思い通わす心の根を育てるのです！",
    'type' => 'blue_wolf');

  public $doom_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|冥狼|です。襲撃した人に#死の宣告#を行うことができます。|狼|に抗う者に迫り来る死の恐怖を与えて屠るのです！",
    'type' => 'wolf', 'delimiter' => array('#' => 'chicken'));

  public $fire_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|火狼|です。一度だけ襲撃した人を噛み殺す代りに#天火#を灯すことができます。\n　炎の牙にて業火を齎し、敵対者を炭の衣で粧しましょう。反撃の狼煙をあげるのです！",
    'type' => 'wolf', 'delimiter' => array('#' => 'wisp'));

  public $sex_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|雛狼|です。襲撃した人の性別を知ることができますが、殺すことはできません。\n　あなたの未熟な襲撃は、小賢しい大人どもの計算を大いに狂わすことができるはずです。",
    'type' => 'wolf');

  public $sharp_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|鋭狼|です。襲撃した人が|狂人|か#毒#を持っていた場合は襲撃を回避することができます。研ぎ澄まされた牙が狙うはただ獲物のみ…",
    'type' => 'wolf', 'delimiter' => array('#' => 'poison'));

  public $hungry_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|餓狼|です。仲間の|狼|や#妖狐#すら噛み殺せますが、村人は殺せません。強者のみがあなたの獲物なのです。",
    'type' => 'wise_wolf');

  public $tongue_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|舌禍狼|です。襲撃した人の役職を知ることができますが、#村人#だった場合は能力を失ってしまいます。\n　殺した能力者の血肉から正体を暴き知ることができる舌の力で、村の全容を把握して全てを手に入れましょう！",
    'type' => 'wolf', 'delimiter' => array('#' => 'human'));

  public $possessed_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|憑狼|です。襲撃した人に|憑依|することができます。その幽幻の力で肉体を奪い、多くの魂を食い荒らすのです！",
    'type' => 'wolf');

  public $sirius_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|天狼|です。仲間が減ったら#暗殺#反射、|罠|・_毒_無効、^護衛^突破など、様々な能力が発現します。\n　最後の一人になった時、:処刑:以外であなたを止める手段はありません。孤高の生き様を魅せるのです！",
    'type' => 'wolf',
    'delimiter' => array('#' => 'assassin', '_' => 'poison', '^' => 'guard', ':' => 'vote'));

  public $elder_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|古狼|です。あなたの#処刑#投票には_二票_分の価値があります。老練の弁舌と素知らぬ村人の信頼を盾に、村人を食い殺すのです！",
    'type' => 'wolf', 'delimiter' => array('#' => 'vote', '_' => 'authority'));

  public $cute_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|萌狼|です。ごくまれに発言が遠吠えになってしまいます。バレた時は笑ってごまかしましょう。",
    'type' => 'wolf');

  public $scarlet_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|紅狼|です。#妖狐#からは#子狐#に、_人形_からは_人形遣い_に見えています。#妖狐#と_人形_を欺き、その鋭い牙で村を真紅に染め上げるのです！",
    'type' => 'wise_wolf', 'delimiter' => array('_' => 'doll'));

  public $silver_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|銀狼|です。仲間が誰か分かりませんが、遠吠えで仲間に存在を知らせることはできます。\n　天を灼く満月の下、銀色の毛並みを輝かせて、仲間の群れと共にこの村を|狼|のものにするのです。",
    'type' => 'wolf');

  public $emperor_wolf = array(
    'message' => "[役割] [|人狼|陣営] [|人狼|系]\n　あなたは|帝狼|です。|人狼陣営|の勝利と|狂人系|の全滅が勝利条件になります。|狼|に人間の仲間が必要ないことを全ての村人に見せつけましょう。",
    'type' => 'wolf');

  public $mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|狂人|です。|人狼|の勝利があなたの勝利となります。あなたはできる限り狂って場をかき乱すのです！",
    'type' => 'wolf');

  public $fanatic_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|狂信者|です。仕えるべき|人狼|が誰なのかを知ることができます。あなたの持てる全てを|人狼|に捧げ尽くすのです！",
    'type' => 'mad');

  public $whisper_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|囁き狂人|です。夜の|人狼|の相談に参加することができます。|人狼|と完璧な連携を組んで村を殲滅するのです！",
    'type' => 'mad');

  public $jammer_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|月兎|です。夜の間に誰か一人の#占い#を妨害することができます。#占い師#を月の魔性に狂わせ、村を破滅へ導くのです！",
    'type' => 'mad', 'delimiter' => array('#' => 'mage'));

  public $voodoo_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|呪術師|です。夜の間に誰か一人に|呪い|をかけることができます。#占い師#を|呪い|で抹殺し、村を混乱に陥れるのです！",
    'type' => 'jammer_mad');

  public $enchant_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|狢|です。夜に村人一人に#悪戯#して、その人が|人狼|に襲撃されたら次の日、全員のアイコンを変更してしまいます。\n　できるだけ早起きして、みんなに「バカな…お前は死んだはず！」って言ってやりましょう。あなたも同じ顔ですけどね。",
    'type' => 'mad', 'delimiter' => array('#' => 'chiroptera'));

  public $dream_eater_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|獏|です。夜の間に村人一人の夢を食べることで夢能力者を殺すことができます。\n　天敵たる_夢守人_に注意しながら、夢の世界にいる住人や#妖精#たちを食らい尽くすのです！",
    'type' => 'enchant_mad', 'delimiter' => array('_' => 'guard'));

  public $possessed_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|犬神|です。一度だけ、死んだ人に|憑依|することができます。骸を傀儡人形と化し、その怨恨の赴くままに呪詛を撒き散らすのです！",
    'type' => 'mad');

  public $trap_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|罠師|です。一度だけ夜に|罠|を仕掛けることができます。|罠|を仕掛けた人の元に訪れた人は全員死亡します。\n　あなたの魔手は鮮やかな悪夢の芸術を生み出す。|人狼|に害成す者を狡猾なる|罠|へと誘き寄せ、地獄に陥れるのです！",
    'type' => 'mad');

  public $snow_trap_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|雪女|です。夜に、触れた人を#凍傷#にする|罠|を仕掛けることができます。美しいあなたの銀雪の息吹は数多を凍えさせるのです。",
    'type' => 'mad', 'delimiter' => array('#' => 'chicken'));

  public $corpse_courier_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|火車|です。あなたが投票した人が#処刑#された場合に限り、その死体を持ち去ることができます。\n　バレないように亡骸を持ち去ることで_霊能者_を無力化し、強敵の死体を収集して村人を惑わせるのです！",
    'type' => 'amaze_mad', 'delimiter' => array('_' => 'necromancer'));

  public $amaze_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|傘化け|です。あなたが投票した人が#処刑#された場合に限り、#処刑#投票結果を隠蔽することができます。\n　みんなが気になってしょうがない投票結果。それを隠すと……？さぁ、みんなをびっくりさせちゃいましょう！",
    'type' => 'mad', 'delimiter' => array('#' => 'vote'));

  public $agitate_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|扇動者|です。#処刑#投票先が拮抗した場合に限り、まとめて死なせることができます。\n　「人外を吊り殺せ！村に平和を！」熱狂する村人の熱意を煽り、巧みに策略を繰るのです！",
    'type' => 'amaze_mad');

  public $miasma_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|土蜘蛛|です。#処刑#投票先が死ななかった場合は_熱病_にさせることができます。\n　身に孕む怨念を悪疫へと変え、村を地獄の釜の底へ叩き込み、悪夢に悩ませるのです！",
    'type' => 'amaze_mad', 'delimiter' => array('_' => 'chicken'));

  public $critical_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|釣瓶落とし|です。#処刑#投票先が死ななかった場合は_痛恨_にさせることができます。\n　あなたは村の意思に逆らうときに真の力が目覚めます。あなたの意思で村を覆せるのです。",
    'type' => 'amaze_mad', 'delimiter' => array('_' => 'luck'));

  public $follow_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|舟幽霊|です。#処刑#投票先が_ショック死_した場合はさらに誰か一人を_ショック死_させることができます。\n　不条理な死は怨念を招き、溺れる死者は死者をも掴む。あなたの導きと殺意で村人を海に引きずり込むのです！",
    'type' => 'miasma_mad');

  public $therian_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|獣人|です。|人狼|に襲撃されると|人狼|に変化します。その身に宿る気高き獣の血を覚醒させ、森羅万象全てを噛み殺すのです！",
    'type' => 'mad');

  public $revive_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|尸解仙|です。一度だけ|人狼|に襲撃されても#蘇生#できます。眠り続けた信奉者よ、捧ぐ主は今来たり。道教の秘術しかと見せ付けよ！",
    'type' => 'mad', 'delimiter' => array('#' => 'revive'));

  public $immolate_mad = array(
    'message' => "[役割] [|人狼|陣営] [|狂人|系]\n　あなたは|殉教者|です。|人狼陣営|の勝利と|人狼|に襲撃されることが勝利条件になります。\n　業深きあなたは、|狼|への献身の果てに贖罪されます。絶え間ない信仰が勝利の鍵です。",
    'type' => 'mad');

  public $fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|妖狐|、#人狼#に殺されることはありません。ただし占われると死んでしまいます。\n　村人を騙し、#人狼#を騙し、村を|妖狐|のものにするのです！",
    'delimiter' => array('|' => 'fox', '#' => 'wolf'));

  public $white_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|白狐|です。占われても_呪殺_されませんが、^霊能者^には見抜かれ、#人狼#に襲撃されると殺されてしまいます。\n　毛皮に映る虚ろな白は時に儚くも清き物。シルクの白を以て霊眼と無垢を欺き、愚かな村を|妖狐|の物とするのです。",
    'type' => 'phantom_fox', 'delimiter' => array('^' => 'necromancer'));

  public $black_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|黒狐|です。占われても_呪殺_されませんが、#人狼#判定が出される上に、^霊能者^には見抜かれてしまいます。\n　黒き体色は闇にまぎれ、鮮やかなる虚飾の世界を彩る。あなたの話術で#人狼#を騙し、村に夜の帳を下ろすのです。",
    'type' => 'white_fox');

  public $mist_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|霧狐|です。占われても_呪殺_されませんが、:蝙蝠:判定が出される上に、^霊能者^には見抜かれてしまいます。\n　其の身に負うは闇の宿命、夜の王たる=吸血鬼=の証。深く静かな霧の中で機会を窺い、全ての敵を騙し抜くのです！",
    'type' => 'white_fox', 'delimiter' => array(':' => 'chiroptera', '=' => 'vampire'));

  public $gold_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|金狐|です。_ひよこ鑑定士_に占われると^蝙蝠^と判定されます。^蝙蝠^に村や#狼#の矛先を向けさせ、その隙に|狐|の勝利を頂くのです！",
    'type' => 'phantom_fox', 'delimiter' => array('^' => 'chiroptera'));

  public $phantom_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|幻狐|です。一度だけ_占い_を無効化することができます。_占い師_を煙に巻き、村を幻へと誘うのです。",
    'type' => 'fox', 'delimiter' => array('_' => 'mage'));

  public $poison_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|管狐|、_毒_を持っています。身に蓄えし災いを以てあなたを亡き者にしようとする者共に禍をもたらすのです！",
    'type' => 'fox', 'delimiter' => array('_' => 'poison'));

  public $blue_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|蒼狐|です。あなたを襲撃した#人狼#を_はぐれ者_にすることができます。返す刀で遠吠えを引き裂いて#人狼#の群れを瓦解させるのです！",
    'type' => 'fox', 'delimiter' => array('_' => 'mind'));

  public $spell_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|宙狐|です。一度だけ、あなたを襲撃した#人狼#に_狐火_を灯すことができます。\n　飛んで火に入る#人狼#を、化かして騙して煙に巻き、村に混沌なる火種を撒くのです！",
    'type' => 'fox', 'delimiter' => array('_' => 'wisp'));

  public $sacrifice_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|白蔵主|です。占われても_呪殺_されず、#人狼#に襲撃されても|子狐|と^蝙蝠^を犠牲にして生き延びることができます。\n　あなたの命で誰かが助かるのなら、誰かの命であなたが助かっても良いでしょう。誰かの為にも最後まで生きるのです。",
    'type' => 'phantom_fox', 'delimiter' => array('^' => 'chiroptera'));

  public $emerald_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|翠狐|です。占った人が念話できない|妖狐|だった場合はあなたと_共鳴者_になります。\n　気持ちを通わす心の根を張り巡らせて、仲間と連携してこの村を|妖狐|のものとするのです！",
    'type' => 'blue_fox');

  public $voodoo_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|九尾|です。夜の間に誰か一人に#呪い#をかけることができます。|妖狐|の天敵、_占い師_を#呪返し#で葬るのです！",
    'type' => 'phantom_fox');

  public $revive_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|仙狐|です。一度だけ、死んだ人を誰か一人ほぼ確実に_蘇生_することができます。\n　繁栄を司るその神通力で、今まで散々不敬を働いた村人たちに恐怖の鉄槌を下すのです！",
    'type' => 'fox', 'delimiter' => array('_' => 'revive'));

  public $possessed_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|憑狐|です。一度だけ、死んだ人に#憑依#することができます。語らぬ骸を纏い、あなたの変化で村と#狼#を騙すのです！",
    'type' => 'fox');

  public $doom_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|冥狐|です。夜に誰か一人に_死の宣告_を行うことができます。村の支配者は誰なのか、死を以て教えてやるのです！",
    'type' => 'fox', 'delimiter' => array('_' => 'chicken'));

  public $trap_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|狡狐|です。一度だけ夜に#罠#を仕掛けることができます。巧みな話術で#人狼#と能力者を誘導し、死の罠へと引きずり込むのです！",
    'type' => 'fox');

  public $cursed_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|天狐|です。_占い_を#呪返し#で、^暗殺^を反射で撃退することができますが、:狩人:には殺されてしまいます。\n　偽りを身に纏い、話術を飾りに舞うように村を駆け巡り、網の目のように張り巡らせた策謀の上を踊るのです！",
    'type' => 'voodoo_fox', 'delimiter' => array('^' => 'assassin', ':' => 'guard'));

  public $cute_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|萌狐|です。ごくまれに発言が遠吠えになってしまいます。吊られるでしょう。しかしそれがなんだと言うのです？",
    'type' => 'fox');

  public $elder_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|古狐|です。あなたの_処刑_投票には^二票^分の価値があります。経年で得た神通力と村人の信頼を活かして、村を支配するのです！",
    'type' => 'fox', 'delimiter' => array('_' => 'vote', '^' => 'authority'));

  public $scarlet_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|紅狐|です。#人狼#からは_無意識_に、^人形^からは^人形遣い^に見えています。無力な_村人_や^人形遣い^を生贄に仕立て上げるのです！",
    'type' => 'fox', 'delimiter' => array('_' => 'human', '^' => 'doll'));

  public $silver_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|銀狐|です。仲間を誰も知ることができず、仲間もあなたのことを知りません。\n　月下の雪原に煌めく銀の毛皮を身に纏い、孤独であっても村を|狐|のものにするのです。",
    'type' => 'fox');

  public $immolate_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|妖狐|系]\n　あなたは|野狐禅|です。|妖狐陣営|の勝利と#人狼#に襲撃されることが勝利条件になります。\n　未だ悟りに至れぬ未熟な#狼#を誘い出し、愚かな輩に有り難い説法をくれてやるのです！",
    'type' => 'fox');

  public $child_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|子狐|です。占われても_呪殺_されませんが、#人狼#の襲撃には耐えられません。また、時々失敗しますが_占い_の真似事もできます。\n　例え子供でも|狐|は|狐|。子供ならば子供としての戦い方をするだけです。父や母すらも利用する、立派な|狐|になって村を支配しましょう！",
    'type' => 'fox', 'delimiter' => array('_' => 'mage'));

  public $sex_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|雛狐|です。占われても_呪殺_されませんが、#人狼#の襲撃には耐えられません。また、時々失敗しますが_ひよこ鑑定士_の真似事もできます。\n　^蝙蝠^を見抜く目は仲間の助けにはならないかもしれません。しかし、奇妙にも大人たちの曇った瞳には無実な人があなたに見えるようなのです。",
    'type' => 'child_fox', 'delimiter' => array('^' => 'chiroptera'));

  public $stargazer_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|星狐|です。占われても_呪殺_されませんが、#人狼#の襲撃には耐えられません。また、時々失敗しますが_占星術師_の真似事もできます。\n　あなたは星に願いを込めた|子狐|。たまに願わないことがあってもその想いを胸に刻みつつ、夜には静かに動き、村を動かす人を探るのです！",
    'type' => 'child_fox');

  public $jammer_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|月狐|です。占われても_呪殺_されませんが、#人狼#の襲撃には耐えられません。また、時々失敗しますが#月兎#の真似事もできます。\n　月の光は_占い_の効果を歪め覆い隠す力を持つ。|子狐|でありながら身に付けたその能力を用いて、呪殺の脅威から仲間を守り抜くのです！",
    'type' => 'child_fox');

  public $monk_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|蛻庵|です。占われても_呪殺_されませんが、#人狼#の襲撃には耐えられません。また、時々失敗しますが^霊能^の真似事もできます。\n　例え未熟でも、|子狐|でも、^霊能者^から|蛻庵|という名をもらい、死んだ後も己の正体を隠し続けるあなたは立派な^霊能者^の１人なのです。",
    'type' => 'child_fox', 'delimiter' => array('^' => 'necromancer'));

  public $miasma_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|蟲狐|です。^処刑^されるか#人狼#に襲われたら、あなたを死なせた人からランダムで一人を:熱病:にさせることができます。\n　あなたは蟲毒をもった呪いの|狐|。幾百もの怨念が宿りしあなたを殺めた者は、死に至る無間の苦しみにのたうつことでしょう。",
    'type' => 'child_fox', 'delimiter' => array('^' => 'vote', ':' => 'chicken'));

  public $howl_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|化狐|です。あなたの夜の独り言は#人狼#の遠吠えに見えます。化かし惑わし絡め取るのは|狐|の十八番。あなたの声で敵を騙すのです！",
    'type' => 'child_fox');

  public $critical_fox = array(
    'message' => "[役割] [|妖狐|陣営] [|子狐|系]\n　あなたは|寿羊狐|です。|妖狐陣営|の勝利と|妖狐系|の全滅が勝利条件になります。|妖狐系|が誰か分かりませんが、^処刑^投票で:痛恨:を付加できます。\n　例え相手が親であれ、天下はあなたのためにある。思うまま我がままに国を傾けて、敵も味方も処刑しよう。敗北はあなたの美貌が許さない。",
    'type' => 'child_fox', 'delimiter' => array('^' => 'vote', ':' => 'luck'));

  public $cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|キューピッド|です。初日の夜に誰か二人を|恋人|同士にすることができます。\n　愛しあう二人を影から支え、何物にも勝る愛の素晴らしさを村に知らしめるのです！",
    'delimiter' => array('|' => 'lovers'));

  public $self_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|求愛者|です。初日の夜に自分と誰か一人を|恋人|同士にすることができます。自分の幸せは自分で掴み取るのです！",
    'type' => 'cupid');

  public $moon_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|かぐや姫|です。初日の夜に自分と誰か一人を|恋人|同士にして、さらに|難題|を与えることができます。\n　月に戻ることを忘れるほどの素敵な恋を見つけられることを祈っています。|恋人|と|難題|を乗り越えるのです！",
    'type' => 'cupid');

  public $mind_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|女神|です。初日の夜に誰か二人を#共鳴者#つきの|恋人|にすることができます。\n　夜に囁く愛の言葉をいつでも交わしあえる、愛に溢れた平和な村を創りだすのです！",
    'type' => 'cupid', 'delimiter' => array('#' => 'mind'));

  public $sweet_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|弁財天|です。初日の夜に誰か二人を#共鳴者#つきの|恋人|にすることができます。また、_処刑_投票先を^恋耳鳴^にさせることができます。\n　あなたの矢は種族を超えた愛となり、あなたの投票は闇夜に聞こえる|恋人|の囁きを届ける。恋を奏でる詩人となり、村を愛で満たすのです！",
    'type' => 'mind_cupid', 'delimiter' => array('_' => 'vote', '^' => 'no_last_words'));

  public $minstrel_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|吟遊詩人|です。二日目からあなたの夜の独り言が|恋人|にも聞こえるようになります。\n　あなたの奏でる物語は|恋人|達を導きます。伝説を、そして世界を余すことなく奏でましょう。",
    'type' => 'cupid');

  public $triangle_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|小悪魔|です。初日の夜に誰か三人を|恋人|にしてしまいます。淫靡な魅力で誘惑し、導き、三人の背徳的な恋を成就させるのです！",
    'type' => 'cupid');

  public $revive_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|邪仙|です。初日の夜に誰か二人を|恋人|にし、さらに#死の宣告#を与えてしまいます。また、一度だけ_人狼_に襲撃されても^蘇生^できます。\n　限られた時間を愛し合いつつ生きる二人を演出しましょう。それは悲劇に見えるでしょうが、あなたにとっては喜劇となるに違いありません。",
    'type' => 'cupid', 'delimiter' => array('#' => 'chicken', '_' => 'wolf', '^' => 'revive'));

  public $snow_cupid = array(
    'message' => "[役割] [|恋人|陣営] [|キューピッド|系]\n　あなたは|寒戸婆|です。初日の夜に誰か二人を|恋人|にすることができます。また、#処刑#投票先が|恋人|だったら_凍傷_にしてしまいます。\n　お山に見初められ、戻ろうにも帰らねばならず。いっそ望まぬ恋ならば、節くれだった青女の指先で、剥がして六花を咲かそうぞ。",
    'type' => 'cupid', 'delimiter' => array('#' => 'vote', '_' => 'chicken'));

  public $angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|天使|です。初日の夜に誰か二人を|恋人|にして、その二人が_男_|女|だった場合はさらに#共感者#にすることができます。\n　始まりの園にありし男女の愛を繋ぎ、その魂に秘蹟を授けることがあなたの使命。二人の人生の先に神の祝福と喜びあれ。",
    'type' => 'cupid', 'delimiter' => array('#' => 'mind', '_' => 'sex_male'));

  public $rose_angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|薔薇天使|です。初日の夜に誰か二人を|恋人|にして、その二人が_男性_だった場合はさらに#共感者#にすることができます。\n　紅の薔薇を手に、戦地にありし男たちの魂を繋ぐ事があなたの使命。兜が置かれるその時が、平和の鐘が鳴り響く時なのです。",
    'type' => 'angel');

  public $lily_angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|百合天使|です。初日の夜に誰か二人を|恋人|にして、その二人が|女性|だった場合はさらに#共感者#にすることができます。\n　黄の山百合を手に、純潔なる乙女たちの魂を繋ぐことがあなたの使命。失われし楽園への道を示し、歩む二人を見守るのです。",
    'type' => 'angel');

  public $exchange_angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|魂移使|です。初日の夜に誰か二人を|恋人|にすることができます。さらに、#共感者#にして二人の精神を入れ替えてしまいます。\n　|恋人|の強い絆は魂をも愛の奔流に飲み込みます。愛する人をゆっくりと見つめる機会を与えることで、真実の愛に気付かせるのです！",
    'type' => 'angel');

  public $ark_angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|大天使|です。初日の夜に誰か二人を|恋人|にすることができます。また、村の全ての#共感者#の結果を知ることができます。\n　秘蹟を統べる者――神に授けられたその力で村に神の存在を知らしめるのです。神を認める者には祝福を、認めぬ者には制裁を。",
    'type' => 'angel');

  public $sacrifice_angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|守護天使|です。あなたの|恋人|が^人狼^に襲撃されても自分の命と引き換えに守ることができます。\n　愛する人を想う幸せな夜を壊す獣の手から二人を:庇護:し、命に代えても護るべき愛の存在を示すのです!",
    'type' => 'angel', 'delimiter' => array('^' => 'wolf', ':' => 'guard'));

  public $scarlet_angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|紅天使|です。^無意識^が誰か分かりますが、:人狼:からは^無意識^に、=妖狐=からは=子狐=に、*人形*からは*人形遣い*に見えています。\n　散華――鮮血の上、月の光に輝く紅の衣は時として真紅の水鏡。瞳の奥の哀れな虚像を嘲りながら、無為の者に囁きかけるのです！",
    'type' => 'angel',
    'delimiter' => array('^' => 'human', ':' => 'wolf', '=' => 'fox', '*' => 'doll'));

  public $cursed_angel = array(
    'message' => "[役割] [|恋人|陣営] [|天使|系]\n　あなたは|堕天使|、_呪い_を持っています。初日の夜に誰か二人を|恋人|にして、その二人が別陣営ならさらに#共感者#にすることができます。\n　また、|恋人|に^処刑^投票されると:ショック死:してしまいます。堕天したその身と矢を以って、繋がれし|恋人|たちの勝利の礎となるのです！",
    'type' => 'angel', 'delimiter' => array('_' => 'wolf', '^' => 'vote', ':' => 'chicken'));

  public $quiz = array(
    'message' => "[役割] [|出題者|陣営] [|出題者|系]\n　あなたは|出題者|です。この村の難易度はあなたの口先三寸で決まります。頑張って皆を楽しませれば、それがあなたの勝利です。",
    'delimiter' => array('|' => 'quiz'));

  public $vampire = array(
    'message' => "[役割] [|吸血鬼|陣営] [|吸血鬼|系]\n　あなたは|吸血鬼|です。夜に誰か一人を|感染者|にすることができます。生きている人全てをあなたの|感染者|にすると勝利できます。\n　夜の闇にまぎれ、誰にも知られぬまま血をすすり、眷属を増やすのです。真の支配者はあなただと言う事を村に知らしめましょう！",
    'delimiter' => array('|' => 'vampire'));

  public $incubus_vampire = array(
    'message' => "[役割] [|吸血鬼|陣営] [|吸血鬼|系]\n　あなたは|青髭公|です。_女性_しか|感染者|にすることができず、#男性#を|吸血|すると殺してしまいます。\n　あなたの欲望を妨げるものはありません。今こそ美しい_女性_を拐し、邪魔な#男#を縊り殺すのです！",
    'type' => 'vampire', 'delimiter' => array('#' => 'sex_male', '_' => 'lovers'));

  public $succubus_vampire = array(
    'message' => "[役割] [|吸血鬼|陣営] [|吸血鬼|系]\n　あなたは|飛縁魔|です。#男性#しか|感染者|にすることができず、_女性_を|吸血|すると殺してしまいます。\n　数多くの国を傾けてきた世にも美しきその美貌で#男性#を堕落させ、この村を我が物にするのです！",
    'type' => 'incubus_vampire');

  public $doom_vampire = array(
    'message' => "[役割] [|吸血鬼|陣営] [|吸血鬼|系]\n　あなたは|冥血鬼|です。#人狼#に襲撃されても死ぬことはありませんが、|吸血|をする際に_死の宣告_を追加してしまいます。\n　#狼#など無視して玩具で遊びましょう。相手はいずれ壊れてしまいますが、代わりはいくらでも用意できるのですから。",
    'type' => 'sacrifice_vampire', 'delimiter' => array('_' => 'chicken'));

  public $sacrifice_vampire = array(
    'message' => "[役割] [|吸血鬼|陣営] [|吸血鬼|系]\n　あなたは|吸血公|です。#人狼#に襲撃されても自分の|感染者|を犠牲にして生き延びることができます。\n　重なり合う数多の命を以ってその身を不死と化し、幾千万の夜族を従えて夜の王国を造るのです！",
    'type' => 'vampire', 'delimiter' => array('#' => 'wolf'));

  public $soul_vampire = array(
    'message' => "[役割] [|吸血鬼|陣営] [|吸血鬼|系]\n　あなたは|吸血姫|です。あなたの|感染者|の役職を知ることができ、#暗殺#を跳ね返すことができます。\n　夜の姫が持ちしは眷属の本質を知る力。村の全てを紐解くその知を以て、夜の楽園を創るのです！ ",
    'type' => 'vampire', 'delimiter' => array('#' => 'assassin'));

  public $scarlet_vampire = array(
    'message' => "[役割] [|吸血鬼|陣営] [|吸血鬼|系]\n　あなたは|屍鬼|です。#人狼#からは_無意識_に、^妖狐^からは^子狐^に、:人形:からは:人形遣い:に見えています。\n　死より還りし汝には敵の視線など臆するに足らず。混乱と恐怖こそが汝の力。生ける命を支配せよ。",
    'type' => 'sacrifice_vampire', 'delimiter' => array('_' => 'human', '^' => 'fox', ':' => 'doll'));

  public $chiroptera = array(
    'message' => "[役割] [|蝙蝠|陣営] [|蝙蝠|系]\n　あなたは|蝙蝠|、生き残れば勝利です。勝ち馬に乗り、いずれの存在からも疎まれながらも強く生き抜くのです！",
    'delimiter' => array('|' => 'chiroptera'));

  public $poison_chiroptera = array(
    'message' => "[役割] [|蝙蝠|陣営] [|蝙蝠|系]\n　あなたは|毒蝙蝠|、#毒#を持っています。この#毒#は村にとって便利な道具です。正体が知られたら道具として死体を晒すことでしょう。",
    'type' => 'chiroptera', 'delimiter' => array('#' => 'poison'));

  public $cursed_chiroptera = array(
    'message' => "[役割] [|蝙蝠|陣営] [|蝙蝠|系]\n　あなたは|呪蝙蝠|、#呪い#を持っています。#呪返し#で混乱する村を尻目にしたたかに生き延びるのです！",
    'type' => 'chiroptera', 'delimiter' => array('#' => 'wolf'));

  public $boss_chiroptera = array(
    'message' => "[役割] [|蝙蝠|陣営] [|蝙蝠|系]\n　あなたは|大蝙蝠|です。#人狼#に襲撃されても他の|蝙蝠|を犠牲にして生き延びることができます。\n　誇りを捨て情を捨て、同族の命すらも糧にして、ただただ生き残る事だけを考えるのです！",
    'type' => 'cursed_chiroptera');

  public $elder_chiroptera = array(
    'message' => "[役割] [|蝙蝠|陣営] [|蝙蝠|系]\n　あなたは|古蝙蝠|です。あなたの#処刑#投票には_二票_分の価値があります。若造たちに真理を教えてやりましょう。数は力なり、と。",
    'type' => 'chiroptera', 'delimiter' => array('#' => 'vote', '_' => 'authority'));

  public $cute_chiroptera = array(
    'message' => "[役割] [|蝙蝠|陣営] [|蝙蝠|系]\n　あなたは|萌蝙蝠|です。_占い_で#人狼#、^霊能^で|蝙蝠|と判定され、ごくまれに発言が遠吠えになってしまいます。\n　この逆境を武器にして、自由で茶目っ気がある愛らしい生き様を村人や人外共に見せつけてやるのです！",
    'type' => 'cursed_chiroptera', 'delimiter' => array('_' => 'mage', '^' => 'necromancer'));

  public $scarlet_chiroptera = array(
    'message' => "[役割] [|蝙蝠|陣営] [|蝙蝠|系]\n　あなたは|紅蝙蝠|です。#人狼#からは_無意識_に、^妖狐^からは^子狐^に、:人形:からは:人形遣い:に見えています。\n　#人狼#から放置され、^妖狐^にはすり寄られ、:人形:から恨まれますが知った事か！生き延びろそれが|蝙蝠|。",
    'type' => 'cursed_chiroptera', 'delimiter' => array('_' => 'human', '^' => 'fox', ':' => 'doll'));

  public $fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|妖精|です。村人一人の発言に#共有者#の囁きを追加してしまいます。白のキャンバスに絵を描くように、遊び心で村を彩るのです。",
    'type' => 'chiroptera', 'delimiter' => array('#' => 'common'));

  public $spring_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|春妖精|です。村人一人の発言に春を告げるメッセージを追加してしまいます。\n　青春――青き芽を付ける春の訪れを村人たちに告げ、|夏妖精|へとバトンを繋ぐのです。",
    'type' => 'fairy');

  public $summer_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|夏妖精|です。村人一人の発言に夏を告げるメッセージを追加してしまいます。\n　朱夏――情熱燃え上がる夏の訪れを村人たちに告げ、|秋妖精|へとバトンを繋ぐのです。",
    'type' => 'fairy');

  public $autumn_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|秋妖精|です。村人一人の発言に秋を告げるメッセージを追加してしまいます。\n　白秋――落葉し木が休む秋の訪れを村人たちに告げ、|冬妖精|へとバトンを繋ぐのです。",
    'type' => 'fairy');

  public $winter_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|冬妖精|です。村人一人の発言に冬を告げるメッセージを追加してしまいます。\n　玄冬――全ての生き物が眠る冬の訪れを村人に告げ、|春妖精|へとバトンを繋ぐのです。",
    'type' => 'fairy');

  public $greater_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|大妖精|です。村人一人の発言にランダムにメッセージを追加してしまいます。\n　#人狼#探しなどどこ吹く風。自由気侭に|悪戯|を楽しむ、それが|妖精|の生き甲斐ですから！",
    'type' => 'fairy', 'delimiter' => array('#' => 'wolf', '_' => 'liar'));

  public $light_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|光妖精|です。夜に村人一人に|悪戯|して、その人が#人狼#に襲撃されたら次の日を全員_公開者_にしてしまいます。\n　あなたがいる限り、村に本当の夜は来ません。思う存分夜更かしを楽しみましょう。人外には嫌われると思いますが。",
    'type' => 'greater_fairy', 'delimiter' => array('_' => 'mind'));

  public $dark_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|闇妖精|です。夜に村人一人に|悪戯|して、その人が#人狼#に襲撃されたら次の日を全員_目隠し_にしてしまいます。\n　誰が誰かも分からない、真っ暗闇の中。慌てふためく間抜けな村人たちを、心ゆくまでからかい倒してやりましょう！",
    'type' => 'greater_fairy', 'delimiter' => array('_' => 'no_last_words'));

  public $grass_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|草妖精|です。夜に村人一人に|悪戯|して、その人が#人狼#に襲撃されたら次の日を全員_草原迷彩_にしてしまいます。\n　どw うw しw てw だw ろw うw 、w 草w がw 生w えw るw だw けw でw みw んw なw 笑w 顔w にw なw れw るw んw だw",
    'type' => 'greater_fairy');

  public $sun_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|日妖精|です。夜に村人一人に|悪戯|して、その人が#人狼#に襲撃されたら次の日を全員_光学迷彩_にしてしまいます。\n　目が眩んで慌てふためいている村人達を笑ってやりましょう。自分の目も眩んでるので少し見え辛いかもしれませんが。",
    'type' => 'greater_fairy');

  public $moon_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|月妖精|です。夜に村人一人に|悪戯|して、その人が#人狼#に襲撃されたら次の日を全員_耳栓_にしてしまいます。\n　耳が遠くなって混乱している村人達を笑ってやりましょう。自分の耳も遠いので少し聞こえ辛いかもしれませんが。",
    'type' => 'dark_fairy');

  public $star_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|星妖精|です。夜に村人一人に|悪戯|して、その人がどんな星座を見ていたか、みんなに知らせることができます。\n　ロマンチックな気分に浸る村人を笑ってやりましょう。え、笑いの種にならないだろうって？細かいことは気にしない。",
    'type' => 'fairy');

  public $flower_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|花妖精|です。夜に村人一人に|悪戯|して、その人の頭の上に花を咲かせることができます。\n　四季折々の花をあちこちに咲かせ、殺伐とした村を無邪気な華々で溢れかえらせてしまうのです！",
    'type' => 'fairy');

  public $shadow_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|影妖精|です。夜に村人一人に|悪戯|して、その人と同じ顔になることができます。あなたは私？私はあなた？生き別れの双子！？",
    'type' => 'fairy');

  public $mirror_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|鏡妖精|です。初日の夜に誰か二人に|悪戯|して、自分が#処刑#されたら次の日の投票先をその二人に限定してしまいます。\n　鏡界――合わせ鏡の無限次元に佇みながら、鏡の世界を体に埋め込むその力。姿見に自らを写しつつ、村人達は何を思うのか。",
    'type' => 'fairy', 'delimiter' => array('#' => 'vote'));

  public $sweet_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|恋妖精|です。初日の夜に誰か二人に|悪戯|して、|悲恋|を与えてしまいます。村人たちを誘惑して、一夜かぎりの幻想に陥れるのです。",
    'type' => 'fairy');

  public $ice_fairy = array(
    'message' => "[役割] [|蝙蝠|陣営] [|妖精|系]\n　あなたは|氷妖精|です。夜に村人一人に|悪戯|して、その人を#凍傷#にしてしまいます。たまに自分に跳ね返ることがあります。\n　妖精として力強く生き残るために、あなたが敵だとみなした相手には、自由にさせないように|悪戯|して追い払いましょう！",
    'type' => 'fairy', 'delimiter' => array('#' => 'chicken'));

  public $ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|鬼|です。あなた自身と#人狼系#の生存が勝利条件になります。煌々と輝く月の下で、人を喰らいし#狼#と生命を踏みにじるのです！",
    'delimiter' => array('|' => 'ogre', '#' => 'wolf'));

  public $orange_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|前鬼|です。あなた自身の生存と#人狼陣営#の全滅が勝利条件になります。村に潜む#狼#と裏切者を倒し、その凶行を食い止めるのです！",
    'type' => 'ogre');

  public $indigo_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|後鬼|です。あなた自身の生存と#妖狐陣営#の全滅が勝利条件になります。理水の力で、滅びと邪を招く妖なる#狐#を抹殺するのです！",
    'type' => 'ogre', 'delimiter' => array('#' => 'fox'));

  public $poison_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|榊鬼|、#毒#を持っています。_出題者陣営_の勝利、またはあなた自身の生存が勝利条件です。\n　あなたは人々と謎掛けを愉しみ、そして、人々を愉しませる_出題者_たちと共に生きる|鬼|なのです。",
    'type' => 'ogre', 'delimiter' => array('#' => 'poison', '_' => 'quiz', '=' => 'chicken'));

  public $west_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|金鬼|です。あなた自身の生存、あなたより左にいる人の全滅、_村人陣営_の勝利が勝利条件になります。\n　雨にも負けず、静かに村の為に生き続け、西に生きることに疲れた人がいたら、行って楽にしてあげましょう！",
    'type' => 'ogre', 'delimiter' => array('_' => 'human'));

  public $east_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|風鬼|です。あなた自身の生存、あなたより右にいる人の全滅、_村人陣営_の勝利が勝利条件になります。\n　風にも負けず、決して怒らずに村の為に生き続け、東に病気の人がいれば、行ってその感染源を絶ちましょう！",
    'type' => 'weat_ogre');

  public $north_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|水鬼|です。あなた自身の生存、あなたより上にいる人の全滅、_村人陣営_の勝利が勝利条件になります。\n　水の冷たさにも負けず、欲も無く村の為に生き続け、北に喧嘩や訴訟があれば、行って成敗してやりましょう！",
    'type' => 'weat_ogre');

  public $south_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|隠行鬼|です。あなた自身の生存、あなたより下にいる人の全滅、_村人陣営_の勝利が勝利条件になります。\n　夏の暑さにも負けず、元気に村の為に生き続け、南に死にそうな人いれば、行ってその背を押してやりましょう！",
    'type' => 'weat_ogre');

  public $incubus_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|般若|です。あなた自身の生存と_女性_の全滅が勝利条件になります。嫉妬の念を力に変えて村から_女性_を追い出すのです！",
    'type' => 'ogre', 'delimiter' => array('_' => 'lovers'));

  public $wise_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|夜行鬼|です。^妖狐^の念話を感知することができます。あなた自身の生存と_共有者系_・#人狼系#・^妖狐系^の全滅が勝利条件になります。\n　首無し馬に跨って、あなたは夜をさまようだろう。夜に騒ぐモノを見つけては、永い夢を見させてやるといい。孤独があなたの伴侶だから。",
    'type' => 'ogre', 'delimiter' => array('_' => 'common', '^' => 'fox'));

  public $power_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|星熊童子|です。あなた自身の生存と村の人口を三分の一以下にすることが勝利条件になります。\n　より永く遊戯を楽しむべく強大な|鬼|の力を以って盛者を挫き、村人達に泥沼の闘いを演じさせるのです！",
    'type' => 'ogre');

  public $revive_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|茨木童子|です。あなた自身の生存と#嘘つき#の全滅が勝利条件になります。また、#人狼#に襲撃されても一定確率で_蘇生_できます。\n　あなたは#嘘つき#に我慢がならなくなったので、全滅させることにしました。|鬼|の流儀で正直者だけが生きる村をその手で作るのです！",
    'type' => 'ogre', 'delimiter' => array('_' => 'revive'));

  public $sacrifice_ogre = array(
    'message' => "[役割] [|鬼|陣営] [|鬼|系]\n　あなたは|酒呑童子|です。あなた自身の生存と#村人陣営以外#の勝利が勝利条件になります。また、夜に攫った人を_洗脳者_にして\n　#人狼#に襲撃されたときの身代わりにできます。杯を酌み交わすために人を攫い、妖どもを率いて百鬼夜行の長となるのです！",
    'type' => 'ogre', 'delimiter' => array('_' => 'vampire'));

  public $yaksa = array(
    'message' => "[役割] [|鬼|陣営] [|夜叉|系]\n　あなたは|夜叉|です。あなた自身の生存と#人狼系#の全滅が勝利条件になります。夜の闇に溶け込み、#狼#を見つけ出して滅ぼすのです！",
    'type' => 'ogre');

  public $betray_yaksa = array(
    'message' => "[役割] [|鬼|陣営] [|夜叉|系]\n　あなたは|夜叉丸|です。あなた自身の生存、_蝙蝠陣営_の全滅、^村人陣営^の勝利が勝利条件になります。\n　悪逆無道の主人に背いて、正義を知ったあなたは許せない。我が身可愛さに飛び回る、不義の輩を。",
    'type' => 'yaksa', 'delimiter' => array('_' => 'chiroptera', '^' => 'human'));

  public $cursed_yaksa = array(
    'message' => "[役割] [|鬼|陣営] [|夜叉|系]\n　あなたは|滝夜叉姫|、#呪い#を持っています。あなた自身の生存と_占い師系_・^魔法使い系^の全滅が勝利条件になります。\n　一族郎党を滅ぼされ、陰陽の使い手に敗れたあなた。これは正当な復讐。荒御魂の声に導かれ、敵を討つのです。",
    'type' => 'yaksa', 'delimiter' => array('_' => 'mage', '^' => 'wizard'));

  public $succubus_yaksa = array(
    'message' => "[役割] [|鬼|陣営] [|夜叉|系]\n　あなたは|荼枳尼天|です。あなた自身の生存と_男性_の全滅が勝利条件になります。欲望の求めるままに、村の#男#を喰らい尽くすのです！",
    'type' => 'yaksa', 'delimiter' => array('_' => 'sex_male'));

  public $hariti_yaksa = array(
    'message' => "[役割] [|鬼|陣営] [|夜叉|系]\n　あなたは|鬼子母神|です。あなた自身の生存と_子狐系_・^キューピッド系^・^天使系^の全滅、#村人陣営以外#の勝利が勝利条件になります。\n　自分の愛すべき子が居ない今彼等の存在はただ目障りなだけなのです。子を守る神ではなく|鬼|へと戻り村に悪意をふりまくのです。",
    'type' => 'yaksa', 'delimiter' => array('_' => 'fox', '^' => 'lovers'));

  public $power_yaksa = array(
    'message' => "[役割] [|鬼|陣営] [|夜叉|系]\n　あなたは|阿修羅|です。あなた自身の生存と生存陣営数を全陣営の半分以下にすることが勝利条件になります。\n　あなたの眼前では、常に闘争がその道を塞ぎます。どんな手を使ってでも、闘いの果てへと辿り着くのです！",
    'type' => 'yaksa');

  public $dowser_yaksa = array(
    'message' => "[役割] [|鬼|陣営] [|夜叉|系]\n　あなたは|毘沙門天|です。あなた自身の生存とあなたよりサブ役職の所持数が多い人を全滅させることが勝利条件になります。\n　曰く、過ぎたるは、なお及ばざるが如し。力を持ち過ぎた者が大きな不幸を招く前に、その力を以って裁きを与えるのです！",
    'type' => 'yaksa');

  public $duelist = array(
    'message' => "[役割] [|決闘者|陣営] [|決闘者|系]\n　あなたは|決闘者|です。初日の夜に自分と誰か一人を|宿敵|同士にします。強敵の屍を乗り越え勝利の凱歌を上げるのです！",
    'delimiter' => array('|' => 'duelist'));

  public $valkyrja_duelist = array(
    'message' => "[役割] [|決闘者|陣営] [|決闘者|系]\n　あなたは|戦乙女|です。初日の夜に誰か二人を|宿敵|同士にします。死地を駆け抜け、勝者に栄光を、死者に天上の宴を与えるのです！",
    'type' => 'duelist');

  public $critical_duelist = array(
    'message' => "[役割] [|決闘者|陣営] [|決闘者|系]\n　あなたは|剣闘士|です。初日の夜に自分と誰か一人を|宿敵|同士にします。また、稀に#処刑#_投票数_が +100 されます。\n　心の内に|宿敵|を定め、其処に隙有らば己が必殺剣をもって倒し、そして勝利と言う名の栄光と自由を掴むのです！",
    'type' => 'duelist', 'delimiter' => array('#' => 'vote', '_' => 'authority'));

  public $triangle_duelist = array(
    'message' => "[役割] [|決闘者|陣営] [|決闘者|系]\n　あなたは|舞首|です。初日の夜に誰か三人を|宿敵|同士にしてしまいます。現世で生前の決着をつける為に彼らには犠牲になってもらいましょう。",
    'type' => 'duelist');

  public $doom_duelist = array(
    'message' => "[役割] [|決闘者|陣営] [|決闘者|系]\n　あなたは|黒幕|です。初日の夜に誰か二人を|宿敵|同士にして、さらに#死の宣告#を与えてしまいます。\n　宿命に踊らされる二人の物語を、影から演出してやりましょう。舞台の幕が切れる、その時まで。",
    'type' => 'duelist', 'delimiter' => array('#' => 'chicken'));

  public $cowboy_duelist = array(
    'message' => "[役割] [|決闘者|陣営] [|決闘者|系]\n　あなたは|無鉄砲者|です。初日の夜に自分と誰か一人を|宿敵|同士にします。また、#処刑#_投票数_が -1 されてしまいます。\n　どれほど力に差があろうとも、挑む心は止められはしない！話術と折れぬ思いを武器に、憎き敵を討ち果たすのです！",
    'type' => 'critical_duelist');

  public $avenger = array(
    'message' => "[役割] [|決闘者|陣営] [|復讐者|系]\n　あなたは|復讐者|です。初日の夜に村の人口の四分の一の|仇敵|を選び、全て倒すことが勝利条件になります。\n　復讐するは我にあり。そのため、そのためだけに生き続ける。たとえ待ち受けるものが地獄だとしても…",
    'type' => 'duelist');

  public $poison_avenger = array(
    'message' => "[役割] [|決闘者|陣営] [|復讐者|系]\n　あなたは|山わろ|です。#人狼#・_妖狐_・あなたの|仇敵|にのみ中る^毒^を持っています。\n　山を穢し、あなたをも害する愚か者たちに祟りという名の報復を与えるのです！",
    'type' => 'avenger', 'delimiter' => array('#' => 'wolf', '_' => 'fox', '^' => 'poison'));

  public $cursed_avenger = array(
    'message' => "[役割] [|決闘者|陣営] [|復讐者|系]\n　あなたは|がしゃどくろ|、#呪い#を持っています。また、:処刑:投票先が#人狼#か_妖狐_だった場合は=死の宣告=を行います。\n　あなたの怨敵たちを喰らい、死体を放置する罰当たりな人外に呪いをかけてじわじわと死に至らしめるのです！",
    'type' => 'poison_avenger', 'delimiter' => array(':' => 'vote', '=' => 'chicken'));

  public $critical_avenger = array(
    'message' => "[役割] [|決闘者|陣営] [|復讐者|系]\n　あなたは|狂骨|です。#処刑#投票先が死ななかった場合は_痛恨_にさせることができます。\n　井戸には底があろうとも、我が落ちしは底なしの怨み。必ず晴らしてみせようぞ…！",
    'type' => 'avenger', 'delimiter' => array('#' => 'vote', '_' => 'luck'));

  public $revive_avenger = array(
    'message' => "[役割] [|決闘者|陣営] [|復讐者|系]\n　あなたは|夜刀神|です。一度だけ#人狼#に襲撃されても^蘇生^できます。まだ死ねない、この復讐を果たすまで。まだ、死ねない…！",
    'type' => 'cursed_avenger');

  public $cute_avenger = array(
    'message' => "[役割] [|決闘者|陣営] [|復讐者|系]\n　あなたは|草履大将|です。:占い:で#人狼#と判定される上に、ごくまれに発言が遠吠えになってしまいます。\n　見れば#狼#、吠えれば怪異、名乗る姿は付喪神。居並ぶ|仇敵|討ち果たし、百鬼夜行に名を挙げるのです！",
    'type' => 'poison_avenger', 'delimiter' => array(':' => 'mage'));

  public $patron = array(
    'message' => "[役割] [|決闘者|陣営] [|後援者|系]\n　あなたは|後援者|です。初日の夜に誰か一人を|受援者|にし、その生存が勝利条件となります。\n　あなたは誰かのための足長おじさんです。その誰かに気づかれなくとも、尽くしましょう。",
    'type' => 'duelist');

  public $soul_patron = array(
    'message' => "[役割] [|決闘者|陣営] [|後援者|系]\n　あなたは|家神|です。初日の夜に誰か一人を|受援者|にし、その役職を知ることができます。\n　あなたの命は家主のため。彼の者の正体を知り、己の全てを捧げ、その命を護るのです！",
    'type' => 'patron');

  public $sacrifice_patron = array(
    'message' => "[役割] [|決闘者|陣営] [|後援者|系]\n　あなたは|身代わり地蔵|です。あなたの|受援者|が#人狼#に襲撃されても自分の命と引き換えに守ることができます。\n　#人狼#の襲撃などものともしない石の体と全てを救おうとする慈悲の心で、己の生命を賭けて信者を救うのです。",
    'type' => 'patron', 'delimiter' => array('#' => 'wolf', '_' => 'guard'));

  public $shepherd_patron = array(
    'message' => "[役割] [|決闘者|陣営] [|後援者|系]\n　あなたは|羊飼い|です。初日の夜に村の人口の六分の一を|受援者|にできますが、さらに^羊^を与えてしまいます。\n　慈愛を食み生きる愛しい^羊^達、^羊^達を命に代えても恐ろしい#狼#の牙から守り切り、生の道へと導くのです。",
    'type' => 'sacrifice_patron', 'delimiter' => array('^' => 'mind'));

  public $critical_patron = array(
    'message' => "[役割] [|決闘者|陣営] [|後援者|系]\n　あなたは|ひんな神|です。初日の夜に誰か一人を|受援者|にし、さらに#ひんな持ち#を与えます。また、稀に_処刑_#得票数#が +100 されます。\n　死人の土から造られて、あなたは望まぬ願いを叶え続けるだろう。願いの対価を刺し与え、時は来たぞと硬い地の下に還るでしょう。",
    'type' => 'patron', 'delimiter' => array('#' => 'luck', '_' => 'vote'));

  public $mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|神話マニア|系]\n　あなたは|神話マニア|です。初日の夜に指定した人のメイン役職をコピーすることができます。\n　星の数ほどある神話。誰を相手取るかによって何が最も適切なのかを的確に選び取るのです！",
    'delimiter' => array('|' => 'mania'));

  public $trick_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|神話マニア|系]\n　あなたは|奇術師|です。初日の夜に指定した人が何もしていなければ役職を奪うことができます。\n　奪い取った相手の能力、その力を使いこなして魅せるのです。#村人#表示でも絶対に泣きません。",
    'type' => 'mania', 'delimiter' => array('#' => 'human'));

  public $basic_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|神話マニア|系]\n　あなたは|求道者|です。初日の夜に指定した人のメイン役職の基本種に変化します。\n　夢にも惑わされず、蝕にも侵されず、ただひたすらに己の本分を全うするのです！",
    'type' => 'mania');

  public $soul_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|神話マニア|系]\n　あなたは|覚醒者|です。初日の夜に指定した人と関連した能力に後日、目覚める事になります。\n　数日間、自らの内でその能力を育み、より強き力を持ったものとして新たに君臨するのです！",
    'type' => 'mania');

  public $unknown_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|鵺|系]\n　あなたは|鵺|です。初日の夜に指定した人と同じ陣営になり、二日目夜からお互いに#会話#できます。\n　――|鵺|は二つの側面を持っている。人側の側面と獣側の側面だ。正面から見ては？――正体不明。",
    'type' => 'mania', 'delimiter' => array('#' => 'mind'));

  public $wirepuller_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|鵺|系]\n　あなたは|黒衣|です。初日の夜に指定した人と同じ陣営になり、生きている間、その人の#投票#能力を強化できます。\n　己の命運と共に託すのは、ともすれば暴走しかねない強大な力。己の命在る限り、その力は護るべき仲間の為に。",
    'type' => 'mania', 'delimiter' => array('#' => 'vote'));

  public $fire_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|鵺|系]\n　あなたは|青行灯|です。初日の夜に指定した人と同じ陣営になり、その人に#鬼火#を与えます。\n　百鬼を談ずる語り部を、あなたの夜に引き込んで。青い闇の中、そっと菜種の灯を消そう。",
    'type' => 'mania', 'delimiter' => array('#' => 'wisp'));

  public $sacrifice_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|鵺|系]\n　あなたは|影武者|です。初日の夜に指定した人と同じ陣営になり、その人が#人狼#に襲撃されたら身代わりになります。\n　仕えるべき主を護ることがあなたの使命。#狼#の牙が主に届くことはありません…あなたが生きている限り、決して。",
    'type' => 'mania', 'delimiter' => array('#' => 'wolf'));

  public $resurrect_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|鵺|系]\n　あなたは|僵尸|です。初日の夜に指定した人と同じ陣営になり、#人狼#に襲撃されても、その人が生きている間は一定確率で_蘇生_できます。\n　死して尚動き続ける魄のみの体。額に札を貼られた今、あなたは道士に従う他ありません。敵の吐息を嗅ぎ分け、主の為に戦うのです。",
    'type' => 'mania', 'delimiter' => array('#' => 'wolf', '_' => 'revive'));

  public $revive_mania = array(
    'message' => "[役割] [|神話マニア|陣営] [|鵺|系]\n　あなたは|五徳猫|です。初日の夜に指定した人と同じ陣営になり、あなたが#人狼#に襲撃で死亡したら、その人を_蘇生_できます。\n　その頭上に五徳を頂き選ばれし者に自分の身を捧げ、仁・義・礼・知・信。五徳の如く忘れた二徳以上の徳を与えましょう。",
    'type' => 'mania', 'delimiter' => array('#' => 'wolf', '_' => 'revive'));

  public $chicken = array(
    'message' => "　あなたは|小心者|です。#処刑#投票時に一票でも貰うと|ショック死|してしまいます。",
    'delimiter' => array('|' => 'chicken', '#' => 'vote'));

  public $rabbit = array(
    'message' => "　あなたは|ウサギ|です。#処刑#投票時に一票も貰えないと|ショック死|してしまいます。",
    'type' => 'chicken');

  public $perverseness = array(
    'message' => "　あなたは|天邪鬼|です。#処刑#投票時に自分と同じ投票先の人がいると|ショック死|してしまいます。",
    'type' => 'chicken');

  public $flattery = array(
    'message' => "　あなたは|ゴマすり|です。#処刑#投票時に自分と同じ投票先の人がいないと|ショック死|してしまいます。",
    'type' => 'chicken');

  public $celibacy = array(
    'message' => "　あなたは|独身貴族|です。_恋人_に#処刑#投票されると|ショック死|してしまいます。",
    'type' => 'chicken', 'delimiter' => array('_' => 'lovers'));

  public $nervy = array(
    'message' => "　あなたは|自信家|です。自分と同じ陣営の人に#処刑#投票すると|ショック死|してしまいます。",
    'type' => 'chicken');

  public $androphobia = array(
    'message' => "　あなたは|男性恐怖症|です。_男性_に#処刑#投票すると|ショック死|してしまいます。",
    'type' => 'chicken', 'delimiter' => array('_' => 'sex_male'));

  public $gynophobia = array(
    'message' => "　あなたは|女性恐怖症|です。_女性_に#処刑#投票すると|ショック死|してしまいます。",
    'type' => 'chicken', 'delimiter' => array('_' => 'lovers'));

  public $impatience = array(
    'message' => "　あなたは|短気|です。_決定_力がありますが、#再投票#になると|ショック死|してしまいます。",
    'type' => 'chicken', 'delimiter' => array('_' => 'decide'));

  public $febris_header = array(
    'message' => "　あなたは|熱病|にかかっています。",
    'type' => 'chicken');

  public $frostbite_header = array(
    'message' => "　あなたは|凍傷|にかかっています。",
    'type' => 'chicken');

  public $frostbite_footer = array(
    'message' => "日目の昼の#処刑#投票時に一票も貰えないと|ショック死|してしまいます。",
    'type' => 'chicken');

  public $death_warrant_header = array(
    'message' => "　あなたは|死の宣告|を受けています。",
    'type' => 'chicken');

  public $sudden_death_footer = array(
    'message' => "日目の昼に|ショック死|してしまいます。",
    'type' => 'chicken');

  public $panelist = array(
    'message' => "　あなたは|解答者|です。#処刑#_投票数_が０になります。不正解だったときは^出題者^に#処刑#投票してください。",
    'type' => 'chicken', 'delimiter' => array('_' => 'authority', '^' => 'quiz'));

  public $liar = array(
    'message' => "　あなたは|狼少年|なので「#人#」と「_狼_」などをわざと取り違えて発言してしまいます。",
    'delimiter' => array('|' => 'liar', '#' => 'human', '_' => 'wolf'));

  public $actor = array(
    'message' => "　あなたは|役者|です。あらかじめ設定された役柄を演じてもらうことになります。",
    'type' => 'liar');

  public $passion = array(
    'message' => "　あなたは|恋色迷彩|を使っているので発言が恋色に染まってしまいます。",
    'type' => 'liar');

  public $rainbow = array(
    'message' => "　あなたは|虹色迷彩|を使っているので虹の順番に合わせて色を入れ替えて発言してしまいます。",
    'type' => 'liar');

  public $weekly = array(
    'message' => "　あなたは|七曜迷彩|を使っているので曜日の順番に合わせて曜日を入れ替えて発言してしまいます。",
    'type' => 'liar');

  public $grassy = array(
    'message' => "　あなたは|草原迷彩|を使っているので発言が草に埋もれてしまいます。",
    'type' => 'liar');

  public $invisible = array(
    'message' => "　あなたは|光学迷彩|を使っているので発言の一部が見えなくなります。",
    'type' => 'liar');

  public $side_reverse = array(
    'message' => "　あなたは|鏡面迷彩|を使っているので発言の左右が反転してしまいます。",
    'type' => 'liar');

  public $line_reverse = array(
    'message' => "　あなたは|天地迷彩|を使っているので発言の上下が反転してしまいます。",
    'type' => 'liar');

  public $gentleman = array(
    'message' => "　あなたは|紳士|なので時々#紳士#な発言をしてしまいます。",
    'type' => 'liar', 'delimiter' => array('#' => 'sex_male'));

  public $lady = array(
    'message' => "　あなたは|淑女|なので時々#淑女#な発言をしてしまいます。",
    'type' => 'liar', 'delimiter' => array('#' => 'lovers'));

  public $cute_camouflage = array(
    'message' => "　あなたは|魔が言|に囚われたので発言が高確率で遠吠えになってしまいます。",
    'type' => 'liar');

  public $authority = array(
    'message' => "　あなたは|権力者|です。あなたの#処刑#投票は|二票|分の効果があります。",
    'delimiter' => array('|' => 'authority', '#' => 'vote'));

  public $reduce_voter = array(
    'message' => "　あなたは|無精者|なので、#処刑#|投票数|が１減ります",
    'type' => 'authority');

  public $upper_voter = array(
    'message' => "　あなたは|わらしべ長者|です。５日目以降、#処刑#|投票数|が１増えます。",
    'type' => 'authority');

  public $downer_voter = array(
    'message' => "　あなたは|没落者|です。５日目以降、#処刑#|投票数|が１減ります。",
    'type' => 'authority');

  public $rebel = array(
    'message' => "　あなたは|反逆者|です。|権力者|と同じ人に#処刑#投票した場合、あなたと|権力者|の|投票数|が０になります。",
    'type' => 'authority');

  public $random_voter = array(
    'message' => "　あなたは|気分屋|なので、#処刑#|投票数|にランダムで補正がかかります。",
    'type' => 'authority');

  public $watcher = array(
    'message' => "　あなたは|傍観者|なので、#処刑#|投票数|が０になります。",
    'type' => 'authority');

  public $day_voter = array(
    'message' => "　あなたは|一日村長|です。今日の#処刑#|投票数|が１増えます。",
    'type' => 'authority');

  public $wirepuller_luck = array(
    'message' => "　あなたは|入道|です。あなたの_黒衣_が生きている間は#処刑#|投票数|が２増える代わりに死亡すると^得票数^が３増えます。",
    'type' => 'authority', 'delimiter' => array('_' => 'mania', '^' => 'luck'));

  public $upper_luck = array(
    'message' => "　あなたは|雑草魂|の持ち主です。２日目の#処刑#|得票数|が４増える代わりにそれ以降は２減ります。",
    'delimiter' => array('|' => 'luck', '#' => 'vote'));

  public $downer_luck = array(
    'message' => "　あなたは|一発屋|です。２日目の#処刑#|得票数|が４減る代わりにそれ以降は２増えます。",
    'type' => 'upper_luck');

  public $star = array(
    'message' => "　あなたは|人気者|なので#処刑#|得票数|が１減ります。",
    'type' => 'upper_luck');

  public $disfavor = array(
    'message' => "　あなたは|不人気|なので#処刑#|得票数|が１増えます。",
    'type' => 'upper_luck');

  public $random_luck = array(
    'message' => "　あなたは|波乱万丈|なので#処刑#|得票数|にランダムで補正がかかります。",
    'type' => 'upper_luck');

  public $occupied_luck = array(
    'message' => "　あなたは|ひんな持ち|です。あなたの_ひんな神_が生きている間は#処刑#|得票数|が１、死亡すると３増えてしまいます。",
    'type' => 'upper_luck', 'delimiter' => array('_' => 'duelist', '^' => 'luck'));

  public $strong_voice = array(
    'message' => "　あなたは|大声|なので声の大きさが大声で固定されます。",
    'delimiter' => array('|' => 'voice'));

  public $normal_voice = array(
    'message' => "　あなたは|不器用|なので声の大きさを変えられません。",
    'type' => 'strong_voice');

  public $weak_voice = array(
    'message' => "　あなたは|小声|なので声の大きさが小声で固定されます。 ",
    'type' => 'strong_voice');

  public $inside_voice = array(
    'message' => "　あなたは|内弁慶|なので昼は|小声|に、夜は|大声|になります。",
    'type' => 'strong_voice');

  public $outside_voice = array(
    'message' => "　あなたは|外弁慶|なので昼は|大声|に、夜は|小声|になります。",
    'type' => 'strong_voice');

  public $upper_voice = array(
    'message' => "　あなたは|メガホン|を使っているので声が一段階大きくなります。|大声|は音割れしてしまいます。",
    'type' => 'strong_voice');

  public $downer_voice = array(
    'message' => "　あなたは|マスク|をつけているので声が一段階小さくなります。|小声|は聞き取れなくなってしまいます。",
    'type' => 'strong_voice');

  public $random_voice = array(
    'message' => "　あなたは|臆病者|です。この事態に混乱するあなたは声の大きさが安定しません。",
    'type' => 'strong_voice');

  public $no_last_words = array(
    'message' => "　あなたは|筆不精|なので遺言を遺すことができません。",
    'delimiter' => array('|' => 'no_last_words'));

  public $blinder = array(
    'message' => "　あなたは|目隠し|をしているので発言者の名前が見えません。",
    'type' => 'no_last_words');

  public $earplug = array(
    'message' => "　あなたは|耳栓|をつけているので声が一段階小さく聞こえます。#小声#は聞き取れません。",
    'type' => 'no_last_words', 'delimiter' => array('#' => 'voice'));

  public $speaker = array(
    'message' => "　あなたは|スピーカー|を使っているので声が一段階大きく聞こえます。#大声#は音割れしてしまいます。",
    'type' => 'earplug');

  public $whisper_ringing = array(
    'message' => "　あなたは|囁耳鳴|なので他人の独り言が#共有者#の囁きに聞こえてしまいます。",
    'type' => 'no_last_words', 'delimiter' => array('#' => 'common'));

  public $howl_ringing = array(
    'message' => "　あなたは|吠耳鳴|なので他人の独り言が#人狼#の遠吠えに聞こえてしまいます。",
    'type' => 'no_last_words', 'delimiter' => array('#' => 'wolf'));

  public $sweet_ringing = array(
    'message' => "　あなたは|恋耳鳴|なので二日目以降、#恋人#の独り言が囁き声に聞こえてしまいます。",
    'type' => 'no_last_words', 'delimiter' => array('#' => 'lovers'));

  public $deep_sleep = array(
    'message' => "　あなたは|爆睡者|なので#共有者#の囁きや、_人狼_の遠吠えが聞こえません。",
    'type' => 'no_last_words', 'delimiter' => array('#' => 'common', '_' => 'wolf'));

  public $silent = array(
    'message' => "　あなたは|無口|なのであまり多くの言葉を話せません。",
    'type' => 'no_last_words');

  public $mower = array(
    'message' => "　あなたは|草刈り|なので発言から草が刈り取られてしまいます。",
    'type' => 'no_last_words');

  public $mind_read = array(
    'message' => "　あなたは|サトラレ|です。夜の発言が|さとり|に読まれてしまいます。",
    'delimiter' => array('|' => 'mind'));

  public $mind_receiver = array(
    'message' => "　あなたは|受信者|です。夜の間だけ誰かの発言を読み取ることができます。",
    'type' => 'mind_read');

  public $mind_friend = array(
    'message' => "　あなたは|共鳴者|です。夜の間だけ|共鳴者|同士で会話することができます。",
    'type' => 'mind_read');

  public $mind_sympathy = array(
    'message' => "　あなたは|共感者|です。もう一人の|共感者|の役職を知ることができます",
    'type' => 'mind_read');

  public $mind_open = array(
    'message' => "　あなたは|公開者|です。二日目以降、夜の発言が全員に見えます。気をつけましょう。",
    'type' => 'mind_read');

  public $mind_evoke = array(
    'message' => "　あなたは|イタコ|に|口寄せ|されています。死んだ後に遺言を介して|イタコ|にメッセージを送ることができます。",
    'type' => 'mind_read');

  public $mind_lonely = array(
    'message' => "　あなたは|はぐれ者|なので仲間と会話できません。",
    'type' => 'mind_read');

  public $mind_sheep = array(
    'message' => "　あなたは|羊|です。あなたの#羊飼い#が誰か知ることができますが、_人狼_に襲撃されると^羊皮^を与えてしまいます。",
    'type' => 'mind_read', 'delimiter' => array('#' => 'duelist', '_' => 'wolf', '^' => 'wisp'));

  public $wisp = array(
    'message' => "　あなたの周囲に|鬼火|が灯っているので#占い#結果が_鬼_判定になります。",
    'delimiter' => array('|' => 'wisp', '#' => 'mage', '_' => 'ogre'));

  public $black_wisp = array(
    'message' => "　あなたの周囲に|天火|が灯っているので#占い#結果が_人狼_判定になります。",
    'type' => 'wisp', 'delimiter' => array('_' => 'wolf'));

  public $spell_wisp = array(
    'message' => "　あなたの周囲に|狐火|が灯っているので#占い師#に占われると#呪殺#されてしまいます。",
    'type' => 'black_wisp');

  public $foughten_wisp = array(
    'message' => "　あなたの周囲に|古戦場火|が灯っているので#占い#結果が_蝙蝠_判定になります。",
    'type' => 'black_wisp', 'delimiter' => array('_' => 'chiroptera'));

  public $gold_wisp = array(
    'message' => "　あなたの周囲に|松明丸|が灯っているので#性別鑑定#結果が_蝙蝠_判定になります。",
    'type' => 'black_wisp', 'delimiter' => array('_' => 'chiroptera'));

  public $sheep_wisp = array(
    'message' => "　あなたは|羊皮|を身に付けているので今日の#占い#結果は_村人_判定になります。",
    'type' => 'wisp', 'delimiter' => array('_' => 'human'));

  public $challenge_lovers = array(
    'message' => "　あなたは|難題|に挑戦しています。４日目夜までは#人狼#の襲撃・_毒_などを無効化し、^暗殺^を反射できます。\n　５日目昼以降は耐性を失う上に、あなたの|恋人|と:処刑:投票先を合わせないと=ショック死=してしまいます。",
    'delimiter' => array('|' => 'lovers', '#' => 'wolf', '_' => 'poison',
			 '^' => 'assassin', ':' => 'vote', '=' => 'chicken'));

  public $joker = array(
    'message' => "　あなたは|ジョーカー|を所持しています。所持したままゲーム終了すると無条件で敗北になります。\n　#処刑#投票先が生きていた場合に押し付けることができますが、例外があるので気をつけましょう。",
    'delimiter' => array('|' => 'duelist', '#' => 'vote'));

  public $sweet_status = array(
    'message' => "　あなたは|恋人|と別れました……",
    'type' => 'challenge_lovers');

  public $death_note = array(
    'message' => "　あなたは|デスノート|を所持しています。夜に村人一人を|暗殺|することができます。",
    'delimiter' => array('|' => 'assassin'));

  public $death_selected = array(
    'message' => "　あなたは|オシラ遊び|の生贄に選ばれたので今夜死亡します。",
    'delimiter' => array('|' => 'assassin'));

  public $lost_ability = array('message' => "　あなたは能力を失いました。");

  public $muster_ability = array('message' => "　あなたの能力が発現しました。");

  public $ability_scripter = array(
    'message' => "　あなたは有名になったので、|処刑|_投票数_が +1 されます。",
    'delimiter' => array('|' => 'vote', '_' => 'authority'));

  public $ability_poison = array(
    'message' => "　あなたは|毒|を持っています。#処刑#されたり、_人狼_に襲撃された時に誰か一人を道連れにします。",
    'delimiter' => array('|' => 'poison', '#' => 'vote', '_' => 'wolf'));

  public $ability_awake_wizard = array(
    'message' => "　あなたは#人狼#の襲撃耐性を失いましたが、代わりに強力な|魔法|を使うことができます。",
    'delimiter' => array('|' => 'wizard', '#' => 'wolf'));

  public $ability_trap_wolf = array(
    'message' => "　|罠|の設置が完了しました。",
    'type' => 'wolf');

  public $ability_sirius_wolf = array(
    'message' => "　残りの|狼|が二人になりました。人の繰り出す業 (#暗殺#・|罠|) は、もはやあなたを貫けません。",
    'type' => 'sirius_wolf');

  public $ability_full_sirius_wolf = array(
    'message' => "　あなたが最後の|狼|です。今や天に輝く|狼|となったあなたに、噛めないものはあんまりない。",
    'type' => 'sirius_wolf');

  public $common_partner = array(
    'message' => "同じ|共有者|の仲間は以下の人たちです： ",
    'delimiter' => array('|' => 'common'));

  public $mind_scanner_target = array(
    'message' => "あなたが|心を読んでいる|のは以下の人たちです： ",
    'type' => 'mind_read');

  public $mind_friend_list = array(
    'message' => "あなたと|共鳴|しているのは以下の人たちです： ",
    'type' => 'mind_read');

  public $doll_master_list = array(
    'message' => "あなたを呪縛する|人形遣い|は以下の人たちです： ",
    'delimiter' => array('|' => 'doll'));

  public $doll_partner = array(
    'message' => "|人形遣い|打倒を目指す同志は以下の人たちです： ",
    'type' => 'doll_master_list');

  public $wolf_partner = array(
    'message' => "誇り高き|人狼|の血を引く仲間は以下の人たちです： ",
    'delimiter' => array('|' => 'wolf'));

  public $mad_partner = array(
    'message' => "|人狼|に仕える|狂人|は以下の人たちです： ",
    'type' => 'wolf_partner');

  public $unconscious_list = array(
    'message' => "以下の人たちが|無意識|に歩き回っているようです： ",
    'delimiter' => array('|' => 'human'));

  public $fox_partner = array(
    'message' => "深遠なる|妖狐|の智を持つ同胞は以下の人たちです： ",
    'delimiter' => array('|' => 'fox'));

  public $child_fox_partner = array(
    'message' => "|妖狐|に与する仲間は以下の人たちです： ",
    'type' => 'fox_partner');

  public $cupid_pair = array(
    'message' => "あなたが|愛の矢|を放ったのは以下の人たちです： ",
    'delimiter' => array('|' => 'lovers'));

  public $partner_header = array('message' => "あなたは");

  public $lovers_footer = array(
    'message' => "と|愛し合って|います。妨害する者は誰であろうと消し、二人の愛の世界を築くのです！",
    'type' => 'cupid_pair');

  public $quiz_chaos = array(
    'message' => "　闇鍋モードではあなたの最大の能力である|人狼|の襲撃に対する耐性がありません。\n　はっきり言って無理ゲーなので好き勝手にクイズでも出して遊ぶと良いでしょう。",
    'delimiter' => array('|' => 'wolf'));

  public $infected_list = array(
    'message' => "あなたの血に|感染|したのは以下の人たちです： ",
    'delimiter' => array('|' => 'vampire'));

  public $psycho_infected_list = array(
    'message' => "以下の人たちが|洗脳|されているようです： ",
    'delimiter' => array('|' => 'vampire'));

  public $duelist_pair = array(
    'message' => "あなたが|宿敵|同士に選んだのは以下の人たちです： ",
    'delimiter' => array('|' => 'duelist'));

  public $rival_footer = array(
    'message' => "と|宿敵|同士です。全て倒し、生き残ることが勝利条件に追加されます。",
    'type' => 'duelist_pair');

  public $avenger_target = array(
    'message' => "あなたの|仇敵|は以下の人たちです： ",
    'delimiter' => array('|' => 'duelist'));

  public $patron_target = array(
    'message' => "あなたの|受援者|は以下の人たちです： ",
    'delimiter' => array('|' => 'duelist'));

  public $shepherd_patron_list = array(
    'message' => "あなたを見守る|羊飼い|は以下の人たちです： ",
    'delimiter' => array('|' => 'duelist'));

  public $result_human = array('message' => "さんは|村人|でした", 'delimiter' => array('|' => 'human'));
  public $result_saint = array('message' => "さんは|聖女|でした", 'type' => 'result_human');
  public $result_executor = array('message' => "さんは|執行者|でした", 'type' => 'result_human');
  public $result_elder = array('message' => "さんは|長老|でした", 'type' => 'result_human');
  public $result_scripter = array('message' => "さんは|執筆者|でした", 'type' => 'result_human');
  public $result_suspect = array('message' => "さんは|不審者|でした", 'type' => 'result_human');
  public $result_unconscious = array('message' => "さんは|無意識|でした", 'type' => 'result_human');
  public $result_mage = array('message' => "さんは|占い師|でした", 'delimiter' => array('|' => 'mage'));
  public $result_puppet_mage = array('message' => "さんは|傀儡師|でした", 'type' => 'result_mage');
  public $result_soul_mage = array('message' => "さんは|魂の占い師|でした", 'type' => 'result_mage');
  public $result_psycho_mage = array('message' => "さんは|精神鑑定士|でした", 'type' => 'result_mage');
  public $result_sex_mage = array('message' => "さんは|ひよこ鑑定士|でした", 'type' => 'result_mage');
  public $result_stargazer_mage = array('message' => "さんは|占星術師|でした", 'type' => 'result_mage');
  public $result_voodoo_killer = array('message' => "さんは|陰陽師|でした", 'type' => 'result_mage');
  public $result_cute_mage = array('message' => "さんは|萌占い師|でした", 'type' => 'result_mage');
  public $result_dummy_mage = array('message' => "さんは|夢見人|でした", 'type' => 'result_mage');
  public $result_necromancer = array('message' => "さんは|霊能者|でした", 'delimiter' => array('|' => 'necromancer'));
  public $result_soul_necromancer = array('message' => "さんは|雲外鏡|でした", 'type' => 'result_necromancer');
  public $result_psycho_necromancer = array('message' => "さんは|精神感応者|でした", 'type' => 'result_necromancer');
  public $result_embalm_necromancer = array('message' => "さんは|死化粧師|でした", 'type' => 'result_necromancer');
  public $result_emissary_necromancer = array('message' => "さんは|密偵|でした", 'type' => 'result_necromancer');
  public $result_attempt_necromancer = array('message' => "さんは|蟲姫|でした", 'type' => 'result_necromancer');
  public $result_yama_necromancer = array('message' => "さんは|閻魔|でした", 'type' => 'result_necromancer');
  public $result_dummy_necromancer = array('message' => "さんは|夢枕人|でした", 'type' => 'result_necromancer');
  public $result_medium = array('message' => "さんは|巫女|でした", 'delimiter' => array('|' => 'medium'));
  public $result_bacchus_medium = array('message' => "さんは|神主|でした", 'type' => 'result_medium');
  public $result_seal_medium = array('message' => "さんは|封印師|でした", 'type' => 'result_medium');
  public $result_revive_medium = array('message' => "さんは|風祝|でした", 'type' => 'result_medium');
  public $result_eclipse_medium = array('message' => "さんは|蝕巫女|でした", 'type' => 'result_medium');
  public $result_priest = array('message' => "さんは|司祭|でした", 'delimiter' => array('|' => 'priest'));
  public $result_bishop_priest = array('message' => "さんは|司教|でした", 'type' => 'result_priest');
  public $result_dowser_priest = array('message' => "さんは|探知師|でした", 'type' => 'result_priest');
  public $result_weather_priest = array('message' => "さんは|祈祷師|でした", 'type' => 'result_priest');
  public $result_high_priest = array('message' => "さんは|大司祭|でした", 'type' => 'result_priest');
  public $result_crisis_priest = array('message' => "さんは|預言者|でした", 'type' => 'result_priest');
  public $result_widow_priest = array('message' => "さんは|未亡人|でした", 'type' => 'result_priest');
  public $result_holy_priest = array('message' => "さんは|聖徳道士|でした", 'type' => 'result_priest');
  public $result_revive_priest = array('message' => "さんは|天人|でした", 'type' => 'result_priest');
  public $result_border_priest = array('message' => "さんは|境界師|でした", 'type' => 'result_priest');
  public $result_dummy_priest = array('message' => "さんは|夢司祭|でした", 'type' => 'result_priest');
  public $result_guard = array('message' => "さんは|狩人|でした", 'delimiter' => array('|' => 'guard'));
  public $result_hunter_guard = array('message' => "さんは|猟師|でした", 'type' => 'result_guard');
  public $result_blind_guard = array('message' => "さんは|夜雀|でした", 'type' => 'result_guard');
  public $result_gatekeeper_guard = array('message' => "さんは|門番|でした", 'type' => 'result_guard');
  public $result_reflect_guard = array('message' => "さんは|侍|でした", 'type' => 'result_guard');
  public $result_poison_guard = array('message' => "さんは|騎士|でした", 'type' => 'result_guard');
  public $result_fend_guard = array('message' => "さんは|忍者|でした", 'type' => 'result_guard');
  public $result_reporter = array('message' => "さんは|ブン屋|でした", 'type' => 'result_guard');
  public $result_anti_voodoo = array('message' => "さんは|厄神|でした", 'type' => 'result_guard');
  public $result_elder_guard = array('message' => "さんは|老兵|でした", 'type' => 'result_guard');
  public $result_dummy_guard = array('message' => "さんは|夢守人|でした", 'type' => 'result_guard');
  public $result_common = array('message' => "さんは|共有者|でした", 'delimiter' => array('|' => 'common'));
  public $result_leader_common = array('message' => "さんは|指導者|でした", 'type' => 'result_common');
  public $result_detective_common = array('message' => "さんは|探偵|でした", 'type' => 'result_common');
  public $result_trap_common = array('message' => "さんは|策士|でした", 'type' => 'result_common');
  public $result_sacrifice_common = array('message' => "さんは|首領|でした", 'type' => 'result_common');
  public $result_ghost_common = array('message' => "さんは|亡霊嬢|でした", 'type' => 'result_common');
  public $result_spell_common = array('message' => "さんは|葛の葉|でした", 'type' => 'result_common');
  public $result_critical_common = array('message' => "さんは|暴君|でした", 'type' => 'result_common');
  public $result_hermit_common = array('message' => "さんは|隠者|でした", 'type' => 'result_common');
  public $result_dummy_common = array('message' => "さんは|夢共有者|でした", 'type' => 'result_common');
  public $result_poison = array('message' => "さんは|埋毒者|でした", 'delimiter' => array('|' => 'poison'));
  public $result_strong_poison = array('message' => "さんは|強毒者|でした", 'type' => 'result_poison');
  public $result_incubate_poison = array('message' => "さんは|潜毒者|でした", 'type' => 'result_poison');
  public $result_guide_poison = array('message' => "さんは|誘毒者|でした", 'type' => 'result_poison');
  public $result_snipe_poison = array('message' => "さんは|狙毒者|でした", 'type' => 'result_poison');
  public $result_chain_poison = array('message' => "さんは|連毒者|でした", 'type' => 'result_poison');
  public $result_dummy_poison = array('message' => "さんは|夢毒者|でした", 'type' => 'result_poison');
  public $result_poison_cat = array('message' => "さんは|猫又|でした", 'type' => 'result_poison');
  public $result_revive_cat = array('message' => "さんは|仙狸|でした", 'type' => 'result_poison_cat');
  public $result_sacrifice_cat = array('message' => "さんは|猫神|でした", 'type' => 'result_poison_cat');
  public $result_missfire_cat = array('message' => "さんは|常世神|でした", 'type' => 'result_poison_cat');
  public $result_eclipse_cat = array('message' => "さんは|蝕仙狸|でした", 'type' => 'result_poison_cat');
  public $result_pharmacist = array('message' => "さんは|薬師|でした", 'type' => 'result_poison');
  public $result_cure_pharmacist = array('message' => "さんは|河童|でした", 'type' => 'result_pharmacist');
  public $result_revive_pharmacist = array('message' => "さんは|仙人|でした", 'type' => 'result_pharmacist');
  public $result_alchemy_pharmacist = array('message' => "さんは|錬金術師|でした", 'type' => 'result_pharmacist');
  public $result_centaurus_pharmacist = array('message' => "さんは|人馬|でした", 'type' => 'result_pharmacist');
  public $result_assassin = array('message' => "さんは|暗殺者|でした", 'delimiter' => array('|' => 'assassin'));
  public $result_doom_assassin = array('message' => "さんは|死神|でした", 'type' => 'result_assassin');
  public $result_select_assassin = array('message' => "さんは|おしら様|でした", 'type' => 'result_assassin');
  public $result_reverse_assassin = array('message' => "さんは|反魂師|でした", 'type' => 'result_assassin');
  public $result_soul_assassin = array('message' => "さんは|辻斬り|でした", 'type' => 'result_assassin');
  public $result_eclipse_assassin = array('message' => "さんは|蝕暗殺者|でした", 'type' => 'result_assassin');
  public $result_mind_scanner = array('message' => "さんは|さとり|でした", 'delimiter' => array('|' => 'mind'));
  public $result_evoke_scanner = array('message' => "さんは|イタコ|でした", 'type' => 'result_mind_scanner');
  public $result_presage_scanner = array('message' => "さんは|件|でした", 'type' => 'result_mind_scanner');
  public $result_clairvoyance_scanner = array('message' => "さんは|猩々|でした", 'type' => 'result_mind_scanner');
  public $result_whisper_scanner = array('message' => "さんは|囁騒霊|でした", 'type' => 'result_mind_scanner');
  public $result_howl_scanner = array('message' => "さんは|吠騒霊|でした", 'type' => 'result_mind_scanner');
  public $result_telepath_scanner = array('message' => "さんは|念騒霊|でした", 'type' => 'result_mind_scanner');
  public $result_dummy_scanner = array('message' => "さんは|幻視者|でした", 'type' => 'result_mind_scanner');
  public $result_jealousy = array('message' => "さんは|橋姫|でした", 'delimiter' => array('|' => 'jealousy'));
  public $result_divorce_jealousy = array('message' => "さんは|縁切地蔵|でした", 'type' => 'result_jealousy');
  public $result_priest_jealousy = array('message' => "さんは|恋司祭|でした", 'type' => 'result_jealousy');
  public $result_poison_jealousy = array('message' => "さんは|毒橋姫|でした", 'type' => 'result_jealousy');
  public $result_miasma_jealousy = array('message' => "さんは|蛇姫|でした", 'type' => 'result_jealousy');
  public $result_critical_jealousy = array('message' => "さんは|人魚|でした", 'type' => 'result_jealousy');
  public $result_brownie = array('message' => "さんは|座敷童子|でした", 'delimiter' => array('|' => 'brownie'));
  public $result_thunder_brownie = array('message' => "さんは|雷公|でした", 'type' => 'result_brownie');
  public $result_echo_brownie = array('message' => "さんは|山彦|でした", 'type' => 'result_brownie');
  public $result_revive_brownie = array('message' => "さんは|蛇神|でした", 'type' => 'result_brownie');
  public $result_harvest_brownie = array('message' => "さんは|豊穣神|でした", 'type' => 'result_brownie');
  public $result_maple_brownie = array('message' => "さんは|紅葉神|でした", 'type' => 'result_brownie');
  public $result_cursed_brownie = array('message' => "さんは|祟神|でした", 'type' => 'result_brownie');
  public $result_sun_brownie = array('message' => "さんは|八咫烏|でした", 'type' => 'result_brownie');
  public $result_history_brownie = array('message' => "さんは|白澤|でした", 'type' => 'result_brownie');
  public $result_wizard = array('message' => "さんは|魔法使い|でした", 'delimiter' => array('|' => 'wizard'));
  public $result_soul_wizard = array('message' => "さんは|八卦見|でした", 'type' => 'result_wizard');
  public $result_awake_wizard = array('message' => "さんは|比丘尼|でした", 'type' => 'result_wizard');
  public $result_mimic_wizard = array('message' => "さんは|物真似師|でした", 'type' => 'result_wizard');
  public $result_spiritism_wizard = array('message' => "さんは|交霊術師|でした", 'type' => 'result_wizard');
  public $result_barrier_wizard = array('message' => "さんは|結界師|でした", 'type' => 'result_wizard');
  public $result_philosophy_wizard = array('message' => "さんは|賢者|でした", 'type' => 'result_wizard');
  public $result_astray_wizard = array('message' => "さんは|左道使い|でした", 'type' => 'result_wizard');
  public $result_pierrot_wizard = array('message' => "さんは|道化師|でした", 'type' => 'result_wizard');
  public $result_doll = array('message' => "さんは|上海人形|でした", 'delimiter' => array('|' => 'doll'));
  public $result_friend_doll = array('message' => "さんは|仏蘭西人形|でした", 'type' => 'result_doll');
  public $result_phantom_doll = array('message' => "さんは|倫敦人形|でした", 'type' => 'result_doll');
  public $result_poison_doll = array('message' => "さんは|鈴蘭人形|でした", 'type' => 'result_doll');
  public $result_doom_doll = array('message' => "さんは|蓬莱人形|でした", 'type' => 'result_doll');
  public $result_revive_doll = array('message' => "さんは|西蔵人形|でした", 'type' => 'result_doll');
  public $result_scarlet_doll = array('message' => "さんは|和蘭人形|でした", 'type' => 'result_doll');
  public $result_silver_doll = array('message' => "さんは|露西亜人形|でした", 'type' => 'result_doll');
  public $result_doll_master = array('message' => "さんは|人形遣い|でした", 'type' => 'result_doll');
  public $result_escaper = array('message' => "さんは|逃亡者|でした", 'delimiter' => array('|' => 'escaper'));
  public $result_psycho_escaper = array('message' => "さんは|迷い人|でした", 'type' => 'result_escaper');
  public $result_incubus_escaper = array('message' => "さんは|一角獣|でした", 'type' => 'result_escaper');
  public $result_succubus_escaper = array('message' => "さんは|水妖姫|でした", 'type' => 'result_escaper');
  public $result_doom_escaper = array('message' => "さんは|半鳥女|でした", 'type' => 'result_escaper');
  public $result_divine_escaper = array('message' => "さんは|麒麟|でした", 'type' => 'result_escaper');
  public $result_wolf = array('message' => "さんは|人狼|でした", 'delimiter' => array('|' => 'wolf'));
  public $result_boss_wolf = array('message' => "さんは|白狼|でした", 'type' => 'result_wolf');
  public $result_mist_wolf = array('message' => "さんは|霧狼|でした", 'type' => 'result_wolf');
  public $result_gold_wolf = array('message' => "さんは|金狼|でした", 'type' => 'result_wolf');
  public $result_phantom_wolf = array('message' => "さんは|幻狼|でした", 'type' => 'result_wolf');
  public $result_cursed_wolf = array('message' => "さんは|呪狼|でした", 'type' => 'result_wolf');
  public $result_quiet_wolf = array('message' => "さんは|静狼|でした", 'type' => 'result_wolf');
  public $result_wise_wolf = array('message' => "さんは|賢狼|でした", 'type' => 'result_wolf');
  public $result_poison_wolf = array('message' => "さんは|毒狼|でした", 'type' => 'result_wolf');
  public $result_resist_wolf = array('message' => "さんは|抗毒狼|でした", 'type' => 'result_wolf');
  public $result_revive_wolf = array('message' => "さんは|仙狼|でした", 'type' => 'result_wolf');
  public $result_trap_wolf = array('message' => "さんは|狡狼|でした", 'type' => 'result_wolf');
  public $result_blue_wolf = array('message' => "さんは|蒼狼|でした", 'type' => 'result_wolf');
  public $result_emerald_wolf = array('message' => "さんは|翠狼|でした", 'type' => 'result_wolf');
  public $result_doom_wolf = array('message' => "さんは|冥狼|でした", 'type' => 'result_wolf');
  public $result_fire_wolf = array('message' => "さんは|火狼|でした", 'type' => 'result_wolf');
  public $result_sex_wolf = array('message' => "さんは|雛狼|でした", 'type' => 'result_wolf');
  public $result_sharp_wolf = array('message' => "さんは|鋭狼|でした", 'type' => 'result_wolf');
  public $result_hungry_wolf = array('message' => "さんは|餓狼|でした", 'type' => 'result_wolf');
  public $result_tongue_wolf = array('message' => "さんは|舌禍狼|でした", 'type' => 'result_wolf');
  public $result_possessed_wolf = array('message' => "さんは|憑狼|でした", 'type' => 'result_wolf');
  public $result_sirius_wolf = array('message' => "さんは|天狼|でした", 'type' => 'result_wolf');
  public $result_elder_wolf = array('message' => "さんは|古狼|でした", 'type' => 'result_wolf');
  public $result_cute_wolf   = array('message' => "さんは|萌狼|でした", 'type' => 'result_wolf');
  public $result_scarlet_wolf = array('message' => "さんは|紅狼|でした", 'type' => 'result_wolf');
  public $result_silver_wolf = array('message' => "さんは|銀狼|でした", 'type' => 'result_wolf');
  public $result_emperor_wolf = array('message' => "さんは|帝狼|でした", 'type' => 'result_wolf');
  public $result_mad = array('message' => "さんは|狂人|でした", 'type' => 'result_wolf');
  public $result_fanatic_mad = array('message' => "さんは|狂信者|でした", 'type' => 'result_mad');
  public $result_whisper_mad = array('message' => "さんは|囁き狂人|でした", 'type' => 'result_mad');
  public $result_jammer_mad = array('message' => "さんは|月兎|でした", 'type' => 'result_mad');
  public $result_voodoo_mad = array('message' => "さんは|呪術師|でした", 'type' => 'result_mad');
  public $result_enchant_mad = array('message' => "さんは|狢|でした", 'type' => 'result_mad');
  public $result_dream_eater_mad = array('message' => "さんは|獏|でした", 'type' => 'result_mad');
  public $result_possessed_mad = array('message' => "さんは|犬神|でした", 'type' => 'result_mad');
  public $result_trap_mad = array('message' => "さんは|罠師|でした", 'type' => 'result_mad');
  public $result_snow_trap_mad = array('message' => "さんは|雪女|でした", 'type' => 'result_mad');
  public $result_corpse_courier_mad = array('message' => "さんは|火車|でした", 'type' => 'result_mad');
  public $result_amaze_mad = array('message' => "さんは|傘化け|でした", 'type' => 'result_mad');
  public $result_agitate_mad = array('message' => "さんは|扇動者|でした", 'type' => 'result_mad');
  public $result_miasma_mad = array('message' => "さんは|土蜘蛛|でした", 'type' => 'result_mad');
  public $result_critical_mad = array('message' => "さんは|釣瓶落とし|でした", 'type' => 'result_mad');
  public $result_follow_mad = array('message' => "さんは|舟幽霊|でした", 'type' => 'result_mad');
  public $result_therian_mad = array('message' => "さんは|獣人|でした", 'type' => 'result_mad');
  public $result_revive_mad = array('message' => "さんは|尸解仙|でした", 'type' => 'result_mad');
  public $result_immolate_mad = array('message' => "さんは|殉教者|でした", 'type' => 'result_mad');
  public $result_fox = array('message' => "さんは|妖狐|でした", 'delimiter' => array('|' => 'fox'));
  public $result_white_fox = array('message' => "さんは|白狐|でした", 'type' => 'result_fox');
  public $result_black_fox = array('message' => "さんは|黒狐|でした", 'type' => 'result_fox');
  public $result_mist_fox = array('message' => "さんは|霧狐|でした", 'type' => 'result_fox');
  public $result_gold_fox = array('message' => "さんは|金狐|でした", 'type' => 'result_fox');
  public $result_phantom_fox = array('message' => "さんは|幻狐|でした", 'type' => 'result_fox');
  public $result_poison_fox = array('message' => "さんは|管狐|でした", 'type' => 'result_fox');
  public $result_blue_fox = array('message' => "さんは|蒼狐|でした", 'type' => 'result_fox');
  public $result_spell_fox = array('message' => "さんは|宙狐|でした", 'type' => 'result_fox');
  public $result_sacrifice_fox = array('message' => "さんは|白蔵主|でした", 'type' => 'result_fox');
  public $result_emerald_fox = array('message' => "さんは|翠狐|でした", 'type' => 'result_fox');
  public $result_voodoo_fox = array('message' => "さんは|九尾|でした", 'type' => 'result_fox');
  public $result_revive_fox = array('message' => "さんは|仙狐|でした", 'type' => 'result_fox');
  public $result_possessed_fox = array('message' => "さんは|憑狐|でした", 'type' => 'result_fox');
  public $result_doom_fox = array('message' => "さんは|冥狐|でした", 'type' => 'result_fox');
  public $result_trap_fox = array('message' => "さんは|狡狐|でした", 'type' => 'result_fox');
  public $result_cursed_fox = array('message' => "さんは|天狐|でした", 'type' => 'result_fox');
  public $result_elder_fox = array('message' => "さんは|古狐|でした", 'type' => 'result_fox');
  public $result_cute_fox = array('message' => "さんは|萌狐|でした", 'type' => 'result_fox');
  public $result_scarlet_fox = array('message' => "さんは|紅狐|でした", 'type' => 'result_fox');
  public $result_silver_fox = array('message' => "さんは|銀狐|でした", 'type' => 'result_fox');
  public $result_immolate_fox = array('message' => "さんは|野狐禅|でした", 'type' => 'result_fox');
  public $result_child_fox = array('message' => "さんは|子狐|でした", 'type' => 'result_fox');
  public $result_sex_fox = array('message' => "さんは|雛狐|でした", 'type' => 'result_child_fox');
  public $result_stargazer_fox = array('message' => "さんは|星狐|でした", 'type' => 'result_child_fox');
  public $result_jammer_fox = array('message' => "さんは|月狐|でした", 'type' => 'result_child_fox');
  public $result_monk_fox = array('message' => "さんは|蛻庵|でした", 'type' => 'result_child_fox');
  public $result_miasma_fox = array('message' => "さんは|蟲狐|でした", 'type' => 'result_child_fox');
  public $result_howl_fox = array('message' => "さんは|化狐|でした", 'type' => 'result_child_fox');
  public $result_critical_fox = array('message' => "さんは|寿羊狐|でした", 'type' => 'result_child_fox');
  public $result_cupid = array('message' => "さんは|キューピッド|でした", 'delimiter' => array('|' => 'lovers'));
  public $result_self_cupid = array('message' => "さんは|求愛者|でした", 'type' => 'result_cupid');
  public $result_moon_cupid = array('message' => "さんは|かぐや姫|でした", 'type' => 'result_cupid');
  public $result_mind_cupid = array('message' => "さんは|女神|でした", 'type' => 'result_cupid');
  public $result_sweet_cupid = array('message' => "さんは|弁財天|でした", 'type' => 'result_cupid');
  public $result_minstrel_cupid = array('message' => "さんは|吟遊詩人|でした", 'type' => 'result_cupid');
  public $result_triangle_cupid = array('message' => "さんは|小悪魔|でした", 'type' => 'result_cupid');
  public $result_revive_cupid = array('message' => "さんは|邪仙|でした", 'type' => 'result_cupid');
  public $result_snow_cupid = array('message' => "さんは|寒戸婆|でした", 'type' => 'result_cupid');
  public $result_angel = array('message' => "さんは|天使|でした", 'type' => 'result_cupid');
  public $result_rose_angel = array('message' => "さんは|薔薇天使|でした", 'type' => 'result_angel');
  public $result_lily_angel = array('message' => "さんは|百合天使|でした", 'type' => 'result_angel');
  public $result_exchange_angel = array('message' => "さんは|魂移使|でした", 'type' => 'result_angel');
  public $result_ark_angel = array('message' => "さんは|大天使|でした", 'type' => 'result_angel');
  public $result_sacrifice_angel = array('message' => "さんは|守護天使|でした", 'type' => 'result_angel');
  public $result_scarlet_angel = array('message' => "さんは|紅天使|でした", 'type' => 'result_angel');
  public $result_cursed_angel = array('message' => "さんは|堕天使|でした", 'type' => 'result_angel');
  public $result_lovers = array('message' => "さんは|恋人|でした", 'type' => 'result_cupid');
  public $result_quiz = array('message' => "さんは|出題者|でした", 'delimiter' => array('|' => 'quiz'));
  public $result_vampire = array('message' => "さんは|吸血鬼|でした", 'delimiter' => array('|' => 'vampire'));
  public $result_incubus_vampire = array('message' => "さんは|青髭公|でした", 'type' => 'result_vampire');
  public $result_succubus_vampire = array('message' => "さんは|飛縁魔|でした", 'type' => 'result_vampire');
  public $result_doom_vampire = array('message' => "さんは|冥血鬼|でした", 'type' => 'result_vampire');
  public $result_sacrifice_vampire = array('message' => "さんは|吸血公|でした", 'type' => 'result_vampire');
  public $result_soul_vampire = array('message' => "さんは|吸血姫|でした", 'type' => 'result_vampire');
  public $result_scarlet_vampire = array('message' => "さんは|屍鬼|でした", 'type' => 'result_vampire');
  public $result_chiroptera = array('message' => "さんは|蝙蝠|でした", 'delimiter' => array('|' => 'chiroptera'));
  public $result_poison_chiroptera = array('message' => "さんは|毒蝙蝠|でした", 'type' => 'result_chiroptera');
  public $result_cursed_chiroptera = array('message' => "さんは|呪蝙蝠|でした", 'type' => 'result_chiroptera');
  public $result_boss_chiroptera = array('message' => "さんは|大蝙蝠|でした", 'type' => 'result_chiroptera');
  public $result_elder_chiroptera = array('message' => "さんは|古蝙蝠|でした", 'type' => 'result_chiroptera');
  public $result_cute_chiroptera = array('message' => "さんは|萌蝙蝠|でした", 'type' => 'result_chiroptera');
  public $result_scarlet_chiroptera = array('message' => "さんは|紅蝙蝠|でした", 'type' => 'result_chiroptera');
  public $result_dummy_chiroptera = array('message' => "さんは|夢求愛者|でした", 'type' => 'result_chiroptera');
  public $result_fairy = array('message' => "さんは|妖精|でした", 'type' => 'result_chiroptera');
  public $result_spring_fairy = array('message' => "さんは|春妖精|でした", 'type' => 'result_fairy');
  public $result_summer_fairy = array('message' => "さんは|夏妖精|でした", 'type' => 'result_fairy');
  public $result_autumn_fairy = array('message' => "さんは|秋妖精|でした", 'type' => 'result_fairy');
  public $result_winter_fairy = array('message' => "さんは|冬妖精|でした", 'type' => 'result_fairy');
  public $result_greater_fairy = array('message' => "さんは|大妖精|でした", 'type' => 'result_fairy');
  public $result_light_fairy = array('message' => "さんは|光妖精|でした", 'type' => 'result_fairy');
  public $result_dark_fairy = array('message' => "さんは|闇妖精|でした", 'type' => 'result_fairy');
  public $result_grass_fairy = array('message' => "さんは|草妖精|でした", 'type' => 'result_fairy');
  public $result_sun_fairy = array('message' => "さんは|日妖精|でした", 'type' => 'result_fairy');
  public $result_moon_fairy = array('message' => "さんは|月妖精|でした", 'type' => 'result_fairy');
  public $result_star_fairy = array('message' => "さんは|星妖精|でした", 'type' => 'result_fairy');
  public $result_flower_fairy = array('message' => "さんは|花妖精|でした", 'type' => 'result_fairy');
  public $result_shadow_fairy = array('message' => "さんは|影妖精|でした", 'type' => 'result_fairy');
  public $result_mirror_fairy = array('message' => "さんは|鏡妖精|でした", 'type' => 'result_fairy');
  public $result_sweet_fairy = array('message' => "さんは|恋妖精|でした", 'type' => 'result_fairy');
  public $result_ice_fairy = array('message' => "さんは|氷妖精|でした", 'type' => 'result_fairy');
  public $result_ogre = array('message' => "さんは|鬼|でした", 'delimiter' => array('|' => 'ogre'));
  public $result_orange_ogre = array('message' => "さんは|前鬼|でした", 'type' => 'result_ogre');
  public $result_indigo_ogre = array('message' => "さんは|後鬼|でした", 'type' => 'result_ogre');
  public $result_poison_ogre = array('message' => "さんは|榊鬼|でした", 'type' => 'result_ogre');
  public $result_west_ogre = array('message' => "さんは|金鬼|でした", 'type' => 'result_ogre');
  public $result_east_ogre = array('message' => "さんは|風鬼|でした", 'type' => 'result_ogre');
  public $result_north_ogre = array('message' => "さんは|水鬼|でした", 'type' => 'result_ogre');
  public $result_south_ogre = array('message' => "さんは|隠行鬼|でした", 'type' => 'result_ogre');
  public $result_incubus_ogre = array('message' => "さんは|般若|でした", 'type' => 'result_ogre');
  public $result_wise_ogre = array('message' => "さんは|夜行鬼|でした", 'type' => 'result_ogre');
  public $result_power_ogre = array('message' => "さんは|星熊童子|でした", 'type' => 'result_ogre');
  public $result_revive_ogre = array('message' => "さんは|茨木童子|でした", 'type' => 'result_ogre');
  public $result_sacrifice_ogre = array('message' => "さんは|酒呑童子|でした", 'type' => 'result_ogre');
  public $result_yaksa = array('message' => "さんは|夜叉|でした", 'type' => 'result_ogre');
  public $result_betray_yaksa = array('message' => "さんは|夜叉丸|でした", 'type' => 'result_yaksa');
  public $result_cursed_yaksa = array('message' => "さんは|滝夜叉姫|でした", 'type' => 'result_yaksa');
  public $result_succubus_yaksa = array('message' => "さんは|荼枳尼天|でした", 'type' => 'result_yaksa');
  public $result_hariti_yaksa = array('message' => "さんは|鬼子母神|でした", 'type' => 'result_yaksa');
  public $result_power_yaksa = array('message' => "さんは|阿修羅|でした", 'type' => 'result_yaksa');
  public $result_dowser_yaksa = array('message' => "さんは|毘沙門天|でした", 'type' => 'result_yaksa');
  public $result_duelist = array('message' => "さんは|決闘者|でした", 'delimiter' => array('|' => 'duelist'));
  public $result_valkyrja_duelist = array('message' => "さんは|戦乙女|でした", 'type' => 'duelist');
  public $result_critical_duelist = array('message' => "さんは|剣闘士|でした", 'type' => 'duelist');
  public $result_triangle_duelist = array('message' => "さんは|舞首|でした", 'type' => 'duelist');
  public $result_doom_duelist = array('message' => "さんは|黒幕|でした", 'type' => 'duelist');
  public $result_cowboy_duelist = array('message' => "さんは|無鉄砲者|でした", 'type' => 'duelist');
  public $result_avenger = array('message' => "さんは|復讐者|でした", 'type' => 'duelist');
  public $result_poison_avenger = array('message' => "さんは|山わろ|でした", 'type' => 'result_avenger');
  public $result_cursed_avenger = array('message' => "さんは|がしゃどくろ|でした", 'type' => 'result_avenger');
  public $result_critical_avenger = array('message' => "さんは|狂骨|でした", 'type' => 'result_avenger');
  public $result_revive_avenger = array('message' => "さんは|夜刀神|でした", 'type' => 'result_avenger');
  public $result_cute_avenger = array('message' => "さんは|草履大将|でした", 'type' => 'result_avenger');
  public $result_patron = array('message' => "さんは|後援者|でした", 'type' => 'duelist');
  public $result_soul_patron = array('message' => "さんは|家神|でした", 'type' => 'result_patron');
  public $result_sacrifice_patron = array('message' => "さんは|身代わり地蔵|でした", 'type' => 'result_patron');
  public $result_shepherd_patron = array('message' => "さんは|羊飼い|でした", 'type' => 'result_patron');
  public $result_critical_patron = array('message' => "さんは|ひんな神|でした", 'type' => 'result_patron');
  public $result_mania = array('message' => "さんは|神話マニア|でした", 'delimiter' => array('|' => 'mania'));
  public $result_trick_mania = array('message' => "さんは|奇術師|でした", 'type' => 'result_mania');
  public $result_basic_mania = array('message' => "さんは|求道者|でした", 'type' => 'result_mania');
  public $result_soul_mania = array('message' => "さんは|覚醒者|でした", 'type' => 'result_mania');
  public $result_dummy_mania = array('message' => "さんは|夢語部|でした", 'type' => 'result_mania');
  public $result_unknown_mania = array('message' => "さんは|鵺|でした", 'type' => 'result_mania');
  public $result_fire_mania = array('message' => "さんは|青行灯|でした", 'type' => 'result_mania');
  public $result_wirepuller_mania = array('message' => "さんは|黒衣|でした", 'type' => 'result_mania');
  public $result_sacrifice_mania = array('message' => "さんは|影武者|でした", 'type' => 'result_mania');
  public $result_resurrect_mania = array('message' => "さんは|僵尸|でした", 'type' => 'result_mania');
  public $result_revive_mania = array('message' => "さんは|五徳猫|でした", 'type' => 'result_mania');

  public $result_failed = array('message' => "さんの占いに失敗しました");
  public $result_mage_failed = array('message' => "さんの鑑定に失敗しました");
  public $result_sex_male = array('message' => "さんは|男性|でした", 'delimiter' => array('|' => 'sex_male'));
  public $result_sex_female = array('message' => "さんは|女性|でした", 'delimiter' => array('|' => 'lovers'));
  public $result_psycho_mage_normal = array('message' => "さんは正常でした");
  public $result_psycho_mage_liar = array('message' => "さんは|嘘|をついています", 'type' => 'result_wolf');
  public $result_stargazer_mage_ability = array('message' => "さんは|投票能力|を持っています", 'type' => 'result_wolf');
  public $result_stargazer_mage_nothing = array('message' => "さんは投票能力を持っていません");
  public $result_stolen = array('message' => "さんの死体が盗まれました！");
  public $result_psycho_necromancer_human = array('message' => "さんの前世は|村人|でした", 'type' => 'result_human');
  public $result_psycho_necromancer_wolf = array('message' => "さんの前世は|人狼|でした", 'type' => 'result_wolf');
  public $result_psycho_necromancer_mad = array('message' => "さんの前世は|狂人|でした", 'type' => 'result_mad');
  public $result_psycho_necromancer_mania = array('message' => "さんの前世は|神話マニア|でした", 'type' => 'result_mania');
  public $result_embalm_reposeful = array('message' => "さんの死顔は安らかな表情でした");
  public $result_embalm_agony = array('message' => "さんの死顔は|苦悶|の表情でした", 'type' => 'result_wolf');
  public $result_attempt = array('message' => "さんは命を狙われたようです");
  public $result_wolf_avoid = array('message' => "さんへの|襲撃|を回避しました", 'type' => 'result_wolf');

  public $mage_result = array('message' => "|占い|結果： ", 'type' => 'result_mage');
  public $voodoo_killer_success = array('message' => "さんの|解呪|に成功しました！", 'type' => 'result_mage');
  public $necromancer_result = array('message' => "|霊能|結果： ", 'type' => 'result_necromancer');
  public $medium_result = array('message' => "|神託|結果： ", 'type' => 'result_medium');
  public $emissary_necromancer_header = array(
    'message' => "#霊能#結果： _処刑_者に投票した_処刑_者と同一陣営の人は",
    'type' => 'necromancer');
  public $priest_header = array(
    'message' => "|神託|結果： 現在、生存している#村人#陣営は",
    'delimiter' => array('|' => 'priest', '#' => 'human'));
  public $priest_footer = array('message' => "人です");
  public $bishop_priest_header = array(
    'message' => "|神託|結果： 現在、死亡した#非村人#陣営は",
    'type' => 'priest_header', 'delimiter' => array('#' => 'wolf'));
  public $dowser_priest_header = array(
    'message' => "|神託|結果： 現在の生存者が所有しているサブ役職の合計は",
    'type' => 'priest_header');
  public $dowser_priest_footer = array('message' => "個です");
  public $weather_priest_header = array('message' => "|神託|結果： 明日の天候は", 'type' => 'priest_header');
  public $crisis_priest_result = array('message' => "陣営が勝利目前です");
  public $side_wolf = array('message' => "|人狼|", 'type' => 'result_wolf');
  public $side_fox = array('message' => "|妖狐|", 'type' => 'result_fox');
  public $side_lovers = array('message' => "|恋人|", 'type' => 'result_cupid');
  public $holy_priest_header = array(
    'message' => "|神託|結果： 該当者たちの勝利陣営の合計は",
    'type' => 'priest_header');
  public $border_priest_header = array(
    'message' => "|神託|結果： 昨夜、あなたの境界に触れた人数は",
    'type' => 'priest_header');
  public $guard_hunted = array('message' => "さんを|狩る|ことに成功しました！", 'type' => 'result_guard');
  public $guard_success = array('message' => "さん|護衛|成功！", 'type' => 'result_guard');
  public $reporter_result_header = array('message' => "|張り込み|結果： ", 'type' => 'result_guard');
  public $reporter_result_footer = array('message' => "さんに|襲撃|されました！", 'type' => 'result_wolf');
  public $anti_voodoo_success = array('message' => "さんの|厄払い|に成功しました！", 'type' => 'result_guard');
  public $poison_cat_success = array('message' => "さん|蘇生|成功！", 'type' => 'result_poison_cat');
  public $poison_cat_failed = array('message' => "さん蘇生失敗");
  public $pharmacist_nothing = array('message' => "さんは毒を持っていません");
  public $pharmacist_poison = array('message' => "さんは|毒|を持っています", 'type' => 'result_pharmacist');
  public $pharmacist_strong = array('message' => "さんは|強い毒|を持っています", 'type' => 'result_pharmacist');
  public $pharmacist_limited = array('message' => "さんは|限定的な毒|を持っています", 'type' => 'result_pharmacist');
  public $pharmacist_success = array('message' => "さんの|解毒|に成功しました", 'type' => 'result_pharmacist');
  public $pharmacist_cured = array('message' => "さんの|治療|に成功しました", 'type' => 'result_pharmacist');
  public $assassin_result = array('message' => "|暗殺|結果： ", 'type' => 'result_assassin');
  public $wolf_result = array('message' => "|襲撃|結果： ", 'type' => 'result_wolf');
  public $possessed_target = array('message' => "さんに|憑依|しています ", 'type' => 'result_wolf');
  public $fox_targeted = array('message' => "昨晩、|人狼|に狙われたようです", 'type' => 'result_wolf');
  public $vampire_result = array('message' => "|吸血|結果： ", 'type' => 'result_vampire');
  public $exchange_header = array('message' => "あなたは３日目に");
  public $exchange_footer = array('message' => "さんに|憑依|します", 'type' => 'result_wolf');
  public $sympathy_result = array('message' => "|共感|結果： ", 'type' => 'result_mind_scanner');
  public $presage_result_header = array('message' => "|受託|結果： ", 'type' => 'result_mind_scanner');
  public $clairvoyance_result_header = array('message' => "|透視|結果： ", 'type' => 'result_mind_scanner');
  public $clairvoyance_result_footer = array(
    'message' => "さんに能力を行使したようです",
    'type' => 'result_mind_scanner');
  public $prediction_weather_grassy = array('message' => "|スコール|です", 'type' => 'liar');
  public $prediction_weather_mower = array('message' => "|酸性雨|です", 'type' => 'no_last_words');
  public $prediction_weather_blind_vote = array('message' => "|晴嵐|です", 'delimiter' => array('|' => 'vote'));
  public $prediction_weather_no_fox_dead = array('message' => "|天気雨|です", 'type' => 'result_mage');
  public $prediction_weather_critical = array('message' => "|烈日|です", 'type' => 'authority');
  public $prediction_weather_blind_talk_day = array('message' => "|強風|です", 'type' => 'no_last_words');
  public $prediction_weather_blind_talk_night = array('message' => "|風雨|です", 'type' => 'no_last_words');
  public $prediction_weather_full_moon = array('message' => "|満月|です", 'type' => 'result_wolf');
  public $prediction_weather_new_moon = array('message' => "|新月|です", 'type' => 'result_wolf');
  public $prediction_weather_no_contact = array('message' => "|花曇|です", 'type' => 'result_wolf');
  public $prediction_weather_invisible = array('message' => "|黄砂|です", 'type' => 'liar');
  public $prediction_weather_rainbow = array('message' => "|虹|です", 'type' => 'liar');
  public $prediction_weather_side_reverse = array('message' => "|ダイヤモンドダスト|です", 'type' => 'liar');
  public $prediction_weather_line_reverse = array('message' => "|バナナの皮|です", 'type' => 'liar');
  public $prediction_weather_actor = array('message' => "|スポットライト|です", 'type' => 'liar');
  public $prediction_weather_critical_luck = array('message' => "|タライ|です", 'type' => 'upper_luck');
  public $prediction_weather_no_sudden_death = array('message' => "|凪|です", 'type' => 'chicken');
  public $prediction_weather_thunderbolt = array('message' => "|青天の霹靂|です", 'type' => 'chicken');
  public $prediction_weather_no_last_words = array('message' => "|涙雨|です", 'type' => 'no_last_words');
  public $prediction_weather_no_dream = array('message' => "|熱帯夜|です", 'type' => 'result_wolf');
  public $prediction_weather_full_ogre = array('message' => "|朧月|です", 'type' => 'result_ogre');
  public $prediction_weather_seal_ogre = array('message' => "|叢雲|です", 'type' => 'result_ogre');
  public $prediction_weather_full_revive = array('message' => "|雷雨|です", 'type' => 'result_poison_cat');
  public $prediction_weather_no_revive = array('message' => "|快晴|です", 'type' => 'result_poison_cat');
  public $prediction_weather_brownie = array('message' => "|慈雨|です", 'type' => 'result_brownie');
  public $prediction_weather_whisper_ringing = array('message' => "|波風|です", 'type' => 'no_last_words');
  public $prediction_weather_howl_ringing = array('message' => "|小夜嵐|です", 'type' => 'no_last_words');
  public $prediction_weather_sweet_ringing = array('message' => "|流星群|です", 'type' => 'no_last_words');
  public $prediction_weather_deep_sleep = array('message' => "|春時雨|です", 'type' => 'no_last_words');
  public $prediction_weather_silent = array('message' => "|木漏れ日|です", 'type' => 'no_last_words');
  public $prediction_weather_missfire_revive = array('message' => "|疎雨|です", 'type' => 'result_poison_cat');
  public $prediction_weather_no_hunt = array('message' => "|川霧|です", 'type' => 'result_guard');
  public $prediction_weather_full_guard = array('message' => "|蒼天|です", 'type' => 'result_guard');
  public $prediction_weather_frostbite = array('message' => "|雪|です", 'type' => 'chicken');
  public $prediction_weather_alchemy_pharmacist = array('message' => "|梅雨|です", 'type' => 'result_pharmacist');
  public $prediction_weather_hyper_random_voter = array('message' => "|雹|です", 'type' => 'authority');
  public $prediction_weather_half_moon = array('message' => "|半月|です", 'type' => 'result_mage');
  public $prediction_weather_half_guard = array('message' => "|曇天|です", 'type' => 'result_guard');
  public $prediction_weather_passion = array('message' => "|箒星|です", 'type' => 'liar');
  public $prediction_weather_no_poison = array('message' => "|旱魃|です", 'type' => 'result_poison');
  public $prediction_weather_psycho_infected = array('message' => "|濃霧|です", 'type' => 'result_vampire');
  public $prediction_weather_hyper_critical = array('message' => "|台風|です", 'type' => 'authority');
  public $prediction_weather_boost_cute = array('message' => "|萌動|です", 'type' => 'no_last_words');
  public $prediction_weather_no_authority = array('message' => "|蜃気楼|です", 'type' => 'authority');
  public $prediction_weather_force_assassin_do = array('message' => "|紅月|です", 'type' => 'result_assassin');
  public $prediction_weather_corpse_courier_mad = array('message' => "|砂塵嵐|です", 'type' => 'result_necromancer');
  public $prediction_weather_full_wizard = array('message' => "|霧雨|です", 'type' => 'result_wizard');
  public $prediction_weather_debilitate_wizard = array('message' => "|木枯らし|です", 'type' => 'result_wizard');
  public $prediction_weather_no_trap = array('message' => "|雪明り|です", 'type' => 'result_wolf');
  public $prediction_weather_no_sacrifice = array('message' => "|蛍火|です", 'type' => 'result_wolf');
  public $prediction_weather_no_reflect_assassin = array('message' => "|日蝕|です", 'type' => 'result_assassin');
  public $prediction_weather_no_cursed = array('message' => "|月蝕|です", 'type' => 'result_mage');
  public $prediction_weather_blinder = array('message' => "|宵闇|です", 'type' => 'no_last_words');
  public $prediction_weather_mind_open = array('message' => "|白夜|です", 'type' => 'result_mind_scanner');
  public $prediction_weather_aurora = array('message' => "|極光|です", 'type' => 'no_last_words');
}

class WishRoleList{
  public $role_none             = array('message' => "←無し");
  public $role_human            = array('message' => "←村人");
  public $role_mage             = array('message' => "←占い師");
  public $role_necromancer      = array('message' => "←霊能者");
  public $role_medium           = array('message' => "←巫女");
  public $role_priest           = array('message' => "←司祭");
  public $role_guard            = array('message' => "←狩人");
  public $role_common           = array('message' => "←共有者");
  public $role_detective_common = array('message' => "←探偵");
  public $role_poison           = array('message' => "←埋毒者");
  public $role_poison_cat       = array('message' => "←猫又");
  public $role_pharmacist       = array('message' => "←薬師");
  public $role_assassin         = array('message' => "←暗殺者");
  public $role_mind_scanner     = array('message' => "←さとり");
  public $role_jealousy         = array('message' => "←橋姫");
  public $role_brownie          = array('message' => "←座敷童子");
  public $role_wizard           = array('message' => "←魔法使い");
  public $role_doll             = array('message' => "←上海人形");
  public $role_escaper          = array('message' => "←逃亡者");
  public $role_wolf             = array('message' => "←人狼");
  public $role_boss_wolf        = array('message' => "←白狼");
  public $role_poison_wolf      = array('message' => "←毒狼");
  public $role_possessed_wolf   = array('message' => "←憑狼");
  public $role_sirius_wolf      = array('message' => "←天狼");
  public $role_mad              = array('message' => "←狂人");
  public $role_fanatic_mad      = array('message' => "←狂信者");
  public $role_trap_mad         = array('message' => "←罠師");
  public $role_fox              = array('message' => "←妖狐");
  public $role_child_fox        = array('message' => "←子狐");
  public $role_cupid            = array('message' => "←キューピッド");
  public $role_angel            = array('message' => "←天使");
  public $role_mind_cupid       = array('message' => "←女神");
  public $role_quiz             = array('message' => "←出題者");
  public $role_vampire          = array('message' => "←吸血鬼");
  public $role_chiroptera       = array('message' => "←蝙蝠");
  public $role_fairy            = array('message' => "←妖精");
  public $role_ogre             = array('message' => "←鬼");
  public $role_yaksa            = array('message' => "←夜叉");
  public $role_duelist          = array('message' => "←決闘者");
  public $role_avenger          = array('message' => "←復讐者");
  public $role_patron           = array('message' => "←後援者");
  public $role_mania            = array('message' => "←神話マニア");
  public $role_unknown_mania    = array('message' => "←鵺");
}

//imagegif($image, "c:\\temp\\result.gif"); // ファイルに出力する場合
#$builder = new MessageImageBuilder('WishRoleList'); $builder->Output('role_patron');
$builder = new MessageImageBuilder('RoleMessageList');
//$builder->OutputAll();
//$builder->Output('mirror_fairy', array(1, 1, 1, 0, 0.5, 0, 1, -0.5)); //位置調整
#$builder->Save('mirror_fairy');
#$builder->Test('poison_ogre');
#$builder->Output('prediction_weather_aurora');
#$builder->Output('poison'); //128
$builder->Output('fire_mania');
