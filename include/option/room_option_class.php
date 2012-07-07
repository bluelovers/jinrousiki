<?php
class RoomOption extends OptionParser {
  static function ShowBuildRoomForm() {
    global $GAME_OPT_CONF, $ROOM_CONF, $TIME_CONF;
    require_once(dirname(__FILE__).'/option_form_class.php');

    $builder = new OptionForm();

    $builder->GenerateRow(self::Get('room_name'));
    $builder->GenerateRow(self::Get('room_comment'));
    $builder->GenerateRow(self::Get('max_user'));

    $builder->HorizontalRule();

    $builder->GenerateRow(self::Get('wish_role'));
    $builder->GenerateRow(self::Get('real_time'));
    $builder->GenerateRow(self::Get('wait_morning',
				    '早朝待機制',
				    '夜が明けてから一定時間の間発言ができません'));
    $builder->GenerateRow(self::Get('open_vote', 
				    '投票した票数を公表する',
				    '「権力者」などのサブ役職が分かりやすくなります'));
    $builder->GenerateRow(self::Get('seal_message',
				    '天啓封印',
				    '一部の個人通知メッセージが表示されなくなります'));
    $builder->GenerateRow(self::Get('open_day',
				    'オープニングあり', 'ゲームが1日目「昼」からスタートします'));

    $builder->HorizontalRule();

    $builder->GenerateRow(self::Get('dummy_boy_selector'));
    $builder->GenerateRow(self::Get('gm_password'));
    $builder->GenerateRow(self::Get('gerd'));

    $builder->HorizontalRule();

    $builder->GenerateRow(self::Get('not_open_cast_selector'));

    $builder->HorizontalRule();

    $builder->GenerateRow(self::Get('poison'));
    $builder->GenerateRow(self::Get('assassin'));
    $builder->GenerateRow(self::Get('wolf'));
    $builder->GenerateRow(self::Get('boss_wolf'));
    $builder->GenerateRow(self::Get('poison_wolf'));
    $builder->GenerateRow(self::Get('possessed_wolf'));
    $builder->GenerateRow(self::Get('sirius_wolf'));
    $builder->GenerateRow(self::Get('fox'));
    $builder->GenerateRow(self::Get('child_fox'));
    $builder->GenerateRow(self::Get('cupid'));
    $builder->GenerateRow(self::Get('medium'));
    $builder->GenerateRow(self::Get('mania'));
    $builder->GenerateRow(self::Get('decide'));
    $builder->GenerateRow(self::Get('authority'));

    $builder->HorizontalRule();

    $builder->GenerateRow(self::Get('liar'));
    $builder->GenerateRow(self::Get('gentleman'));
    $builder->GenerateRow(self::Get('sudden_death'));
    $builder->GenerateRow(self::Get('perverseness'));
    $builder->GenerateRow(self::Get('deep_sleep'));
    $builder->GenerateRow(self::Get('mind_open'));
    $builder->GenerateRow(self::Get('blinder'));
    $builder->GenerateRow(self::Get('critical'));
    $builder->GenerateRow(self::Get('joker'));
    $builder->GenerateRow(self::Get('death_note'));
    $builder->GenerateRow(self::Get('detective'));
    $builder->GenerateRow(self::Get('weather'));
    $builder->GenerateRow(self::Get('festival'));
    $builder->GenerateRow(self::Get('replace_human_selector'));
    $builder->GenerateRow(self::Get('change_common_selector'));
    $builder->GenerateRow(self::Get('change_mad_selector'));
    $builder->GenerateRow(self::Get('change_cupid_selector'));

    $builder->HorizontalRule();

    $builder->GenerateRow(self::Get('special_role'));

    $builder->HorizontalRule();

    $builder->GenerateRow(self::Get('topping'));
    $builder->GenerateRow(self::Get('boost_rate'));

    $builder->GenerateRow(self::Get('chaos_open_cast'));
    $builder->GenerateRow(self::Get('sub_role_limit'));
    $builder->GenerateRow(self::Get('secret_sub_role',
				    'サブ役職を表示しない',
				    'サブ役職が分からなくなります：闇鍋モード専用オプション'));

    self::End();
  }

  static $icon_order = array(
    'wish_role', 'real_time', 'dummy_boy', 'gm_login', 'gerd', 'wait_morning', 'open_vote',
    'seal_message', 'open_day', 'not_open_cast', 'auto_open_cast', 'poison', 'assassin', 'wolf',
    'boss_wolf', 'poison_wolf', 'possessed_wolf', 'sirius_wolf', 'fox', 'child_fox', 'cupid',
    'medium', 'mania', 'decide', 'authority', 'detective', 'liar', 'gentleman', 'deep_sleep',
    'blinder', 'mind_open', 'sudden_death', 'perverseness', 'critical', 'joker', 'death_note',
    'weather', 'festival', 'replace_human', 'full_mad', 'full_cupid', 'full_quiz', 'full_vampire',
    'full_chiroptera', 'full_mania', 'full_unknown_mania', 'change_common', 'change_hermit_common',
    'change_mad', 'change_fanatic_mad', 'change_whisper_mad', 'change_immolate_mad', 'change_cupid',
    'change_mind_cupid', 'change_triangle_cupid', 'change_angel', 'duel', 'gray_random', 'quiz',
    'chaos', 'chaosfull', 'chaos_hyper', 'chaos_verso', 'topping', 'boost_rate', 'chaos_open_cast',
    'chaos_open_cast_camp', 'chaos_open_cast_role', 'secret_sub_role', 'no_sub_role',
    'sub_role_limit_easy', 'sub_role_limit_normal', 'sub_role_limit_hard');

  static $definitions = array();
  static $categories = array();
  static $currentCategory = 'general';

  //これらのプロパティは設定されたオプションのゲーム用/役職用の分割に使用されている。詳しくはGetOptionStringメソッドを見よ。
  //異なるパラメータで同じクラスのグローバル変数を複数生成できるようになった場合、またはroomテーブルのオプション属性が統合された場合、
  //これらのプロパティを使用する必要はなくなると思われる。(2012-01-15 enogu)
  const NOT_OPTION = '';
  const GAME_OPTION = 'game_option';
  const ROLE_OPTION = 'role_option';
  public $groups = array();

  static function Category($category) {
    self::$categories[$category] = array();
    self::$currentCategory = $category;
  }

  static function End() {
    self::$currentCategory = null;
  }

  static function SetGroup($group, $item) {
    $item->group = $group;
    if ($item instanceof RoomOptionItemGroup) {
      foreach ($item->items as $child) {
        self::SetGroup($group, $child);
      }
    }
  }

  static function Get($item) {
    if (!isset(self::$definitions[$item])) {
      $file = dirname(__FILE__)."/{$item}.php";
      if (file_exists($file)) {
	require_once($file);
	$class = 'Option_'.$item;
	self::$definitions[$item] = new $class();
      }
      else {
	self::$definitions[$item] = null;
      }
    }
    return self::$definitions[$item];
  }

  static function Wrap($option) {
    $result = new RoomOption();
    foreach (func_get_args() as $opt) {
      if ($opt instanceof OptionParser) {
        array_merge($result->options, $opt->options);
      }
      elseif (is_string($opt)) {
        $result->Option($opt);
      }
    }
    return $result;
  }

  function  __construct($value = '') {
    parent::__construct($value);
  }

  function OutputCategory($category, $border = false) {
    OutputView(self::$categories[$category], $border);
  }

  function OutputView($items = 'all', $border = false) {
    if ($items == 'all') {
      $items = array_keys(self::$definitions);
    }
    else if (!is_array($items)) {
      $items = array_flip(func_get_args());
    }
    foreach(self::$categories as $category) {
      $target = array_intersect($category, $items);
      if (!empty($target)) {
        foreach ($target as $item) {
          echo(self::$definitions[$item]->GenerateView());
        }
        if ($border) {
          echo '<tr><td colspan="2"><hr></td></tr>';
        }
      }
    }
  }

  function LoadPostParams($target = null) {
    $items = is_array($target) ? $target : func_get_args();
    $all = empty($items);
    foreach ($_POST as $key => $value) {
      $def = self::Get($key);
      if (isset($def) && ($all || in_array($def->name, $items))) {
        $def->CollectPostParam($this);
      }
    }
  }

  function Set($item, $name, $value) {
    if ($item instanceof RoomOptionItem) {
      $this->groups[$item->group][$name] = true;
    }
    else {
      $this->groups[$item][$name] = true;
    }
    parent::__set($name, $value);
  }

  function GetCaption($name) {
    if (is_object($object = self::Get($name))) {
      return $object->caption;
    }
    return false;
  }

  function GetMessage($name) {
    if (isset(self::$definitions[$name])) {
      return self::$definitions[$name]->description;
    }
    return false;
  }

  function GetOptionString($type = null) {
    if (! isset($type)) {
      return $this->ToString();
    }
    elseif (isset($this->groups[$type])) {
      return $this->ToString(array_keys($this->groups[$type]));
    }
  }

  /** ゲームオプションの画像タグを作成する */
  function GenerateImageList() {
    global $ROOM_IMG, $CAST_CONF;

    $str = '';
    foreach(self::$icon_order as $option){
      $define = self::Get($option);
      if(!isset($define, $this->$option)) {
	continue;
      }
      $define->LoadMessages();
      $footer = '';
      $sentence = $define->caption;
      if(property_exists($CAST_CONF, $option) && is_int($CAST_CONF->$option)){
	$sentence .= '(' . $CAST_CONF->$option . '人～)';
      }
      switch($option){
      case 'real_time':
        list($day, $night) = $this->options[$option];
        $sentence .= "　昼： {$day} 分　夜： {$night} 分";
	$footer = '['. $day . '：' . $night . ']';
	break;
	
      case 'topping':
      case 'boost_rate':
	$type = $this->options[$option][0];
	$items = $define->GetItems();
	$sentence .= '(Type' . $items[$type] . ')';
	$footer = '['. strtoupper($type) . ']';
	break;
      }
      $str .= $ROOM_IMG->Generate($option, $sentence) . $footer;
    }
    return $str;
  }
}
