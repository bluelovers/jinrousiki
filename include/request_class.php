<?php
//-- 引数解析の基底クラス --//
class RequestBase {
  //データ展開
  function ToArray(){
    $stack = array();
    foreach ($this as $key => $value) $stack[$key] = $value;
    return $stack;
  }

  //引数解析
  protected function GetItems($items){
    $spec_list = func_get_args();
    $processor = array_shift($spec_list);
    $src_list  = @array('get' => $_GET, 'post' => $_POST, 'file' => $_FILES['file']);
    foreach ($spec_list as $spec) {
      list($src, $item) = explode('.', $spec);
      if (array_key_exists($src, $src_list)) {
	$value_list = $src_list[$src];
      }
      else {
	$value_list = $_REQUEST;
	$item = $spec;
      }

      if (is_array($value_list) && array_key_exists($item, $value_list)) {
	$value = $value_list[$item];
      }
      elseif (! $this->GetDefault($item, $value)) {
	$value = null;
      }

      $this->$item = empty($processor) ? $value :
	(method_exists($this, $processor) ? $this->$processor($value) : $processor($value));
    }
  }

  //初期値設定
  protected function GetDefault($item, &$value){ return false; }

  //存在判定
  protected function Exists($arg){ return ! empty($arg); }

  //有効判定
  protected function IsOn($arg){ return $arg == 'on'; }

  //村番号判定
  protected function IsRoomNo($arg){
    $room_no = intval($arg);
    if ($room_no < 1) OutputActionResult('村番号エラー', '無効な村番号です: ' . $room_no);
    return $room_no;
  }

  //仮想村判定
  function IsVirtualRoom(){
    return isset($this->TestItems) && $this->TestItems->is_virtual_room;
  }

  //ページセット
  protected function SetPage($arg){
    if ($arg == 'all') return $arg;
    $int = intval($arg);
    return $int > 0 ? $int : 1;
  }

  //テスト用パラメータセット
  protected function AttachTestParameters(){
    global $SERVER_CONF;
    if ($SERVER_CONF->debug_mode) $this->TestItems = new RequestTestParams();
  }
}

//-- テスト用パラメータ設定クラス --//
class RequestTestParams extends RequestBase {
  function __construct(){
    $this->GetItems(null, 'post.test_users', 'post.test_room', 'post.test_mode');
    $this->is_virtual_room = isset($this->test_users);
  }
}

//-- game 用共通クラス --//
class RequestBaseGame extends RequestBase {
  function __construct(){
    global $GAME_CONF;

    $this->GetItems('intval', 'get.room_no', 'get.auto_reload');
    $min = min($GAME_CONF->auto_reload_list);
    if ($this->auto_reload != 0 && $this->auto_reload < $min) $this->auto_reload = $min;
    $this->add_role = null;
  }
}

//-- game play 用共通クラス --//
class RequestBaseGamePlay extends RequestBaseGame {
  function __construct(){
    parent::__construct();
    $this->GetItems('IsOn', 'get.list_down', 'get.play_sound');
  }
}

//-- icon 用共通クラス --//
class RequestBaseIcon extends RequestBase {
  function __construct(){
    EncodePostData();
    $this->GetItems('EscapeStrings', 'post.icon_name', 'post.appearance',
		    'post.category', 'post.author', 'post.color');
    $this->GetItems('intval', 'post.icon_no');
    $this->GetItems('Exists', 'post.search');
  }

  protected function GetIconData(){
    $this->GetItems('SetPage', 'page'); //get・post に限定しないこと
    $this->GetItems('EscapeStrings', 'appearance', 'category', 'author', 'keyword');
    $this->GetItems('IsOn', 'sort_by_name');
    $this->GetItems('Exists', 'search');
  }
}

//-- login.php --//
class RequestLogin extends RequestBase {
  function __construct(){
    EncodePostData();
    $this->GetItems('intval', 'get.room_no');
    $this->GetItems('IsOn', 'post.login_manually');
    $this->GetItems('ConvertTrip', 'post.uname');
    $this->GetItems('EscapeStrings', 'password');
  }
}

//-- user_manager.php --//
class RequestUserManager extends RequestBaseIcon {
  function __construct(){
    EncodePostData();
    $this->GetItems('IsRoomNo', 'get.room_no');
    $this->GetItems('intval', 'post.icon_no', 'get.user_no');
    $this->GetItems('EscapeStrings', 'post.password');
    $this->GetItems('Exists', 'post.entry');
    $this->GetItems(null, 'post.trip', 'post.profile', 'post.sex', 'post.role');
    $this->GetItems('IsOn', 'post.login_manually');
    $this->GetIconData();
    EscapeStrings($this->profile, false);
    if ($this->entry) {
      $this->GetItems('ConvertTrip', 'post.uname', 'post.handle_name');
    }
    else {
      $this->GetItems('EscapeStrings', 'post.uname', 'post.trip', 'post.handle_name');
    }
  }
}

//-- game_frame.php --//
class RequestGameFrame extends RequestBaseGamePlay {
  function __construct(){
    parent::__construct();
    $this->GetItems('IsOn', 'get.dead_mode');

    $url = '?room_no=' . $this->room_no . '&auto_reload=' . $this->auto_reload;
    if ($this->play_sound) $url .= '&play_sound=on';
    if ($this->list_down)  $url .= '&list_down=on';
    $this->url = $url;
  }
}

//-- game_up.php --//
class RequestGameUp extends RequestBaseGamePlay {
  function __construct(){
    parent::__construct();
    $this->GetItems('IsOn', 'get.dead_mode', 'get.heaven_mode');

    $url = '?room_no=' . $this->room_no . '&auto_reload=' . $this->auto_reload;
    if ($this->play_sound)  $url .= '&play_sound=on';
    if ($this->list_down)   $url .= '&list_down=on';
    if ($this->dead_mode)   $url .= '&dead_mode=on';
    if ($this->heaven_mode) $url .= '&heaven_mode=on';
    $this->url = $url;
  }
}

//-- game_play.php --//
class RequestGamePlay extends RequestBaseGamePlay {
  function __construct(){
    EncodePostData();
    parent::__construct();
    $this->GetItems('IsOn', 'get.dead_mode', 'get.heaven_mode', 'post.set_objection');
    $this->GetItems('EscapeStrings', 'post.font_type');
    $this->GetItems(null, 'post.say');
    EscapeStrings($this->say, false);
    $this->last_words = $this->font_type == 'last_words';
  }
}

//-- game_log.php --//
class RequestGameLog extends RequestBase {
  function __construct(){
    $this->GetItems('IsRoomNo', 'get.room_no');
    $this->GetItems('intval', 'get.date', 'get.user_no');
    $this->GetItems(null, 'get.scene');
    if ($this->IsInvalidScene()) OutputActionResult('引数エラー', '無効な引数です');
  }

  private function IsInvalidScene(){
    switch ($this->scene) {
    case 'beforegame':
      return $this->date != 0;

    case 'day':
    case 'night':
      return $this->date < 1;

    case 'aftergame':
    case 'heaven':
      return false;

    default:
      return true;
    }
  }
}

//-- game_vote.php --//
class RequestGameVote extends RequestBaseGamePlay {
  //変数の用途
  /*
    vote         : 投票ボタンを押した or 投票ページの表示の制御用
    revote_count : 昼の再投票回数
    target_no    : 投票先の user_no (キューピッドがいるため単純に整数型にキャストしてはだめ)
    situation    : 投票の分類 (Kick・処刑・占い・人狼襲撃など)
  */
  function __construct(){
    parent::__construct();
    $this->GetItems('intval', 'post.revote_count');
    $this->GetItems('IsOn', 'post.vote');
    $this->GetItems(null, 'post.target_no', 'post.situation');
    $this->AttachTestParameters(); //テスト用引数のロード

    $url_option = 'room_no=' . $this->room_no;
    if ($this->auto_reload > 0) $url_option .= '&auto_reload=' . $this->auto_reload;
    if ($this->play_sound)      $url_option .= '&play_sound=on';
    if ($this->list_down)       $url_option .= '&list_down=on';
    $this->post_url = 'game_vote.php?' . $url_option;
    $this->back_url = '<a href="game_up.php?' . $url_option . '">←戻る &amp; reload</a>';
  }
}

//-- old_log.php --//
class RequestOldLog extends RequestBase {
  function __construct(){
    $this->GetItems('intval', 'get.db_no');
    $this->GetItems('IsOn', 'get.watch');
    if ($this->is_room = isset($_GET['room_no'])) {
      $this->GetItems('intval', 'get.room_no', 'get.user_no');
      $this->GetItems('IsOn', 'get.reverse_log', 'get.heaven_talk', 'get.heaven_only',
		      'get.add_role', 'get.personal_result', 'get.time');
      $this->AttachTestParameters();
    }
    else {
      $this->GetItems(null, 'get.reverse');
      $this->GetItems('SetPage', 'get.page');
    }
  }
}

//-- icon_view.php --//
class RequestIconView extends RequestBaseIcon {
  function __construct(){
    $this->GetIconData();
    $this->GetItems('intval', 'get.icon_no');
    $this->GetItems(null, 'get.category', 'get.appearance', 'get.author');
    $this->room_no = null;
  }
}

//-- icon_edit.php --//
class RequestIconEdit extends RequestBaseIcon {
  function __construct(){
    parent::__construct();
    $this->GetItems('EscapeStrings', 'post.password');
    $this->GetItems('IsOn', 'post.disable');
  }
}

//-- icon_upload.php --//
class RequestIconUpload extends RequestBaseIcon {
  function __construct(){
    parent::__construct();
    $this->GetItems('intval', 'file.size');
    $this->GetItems(null, 'post.command', 'file.type', 'file.tmp_name');
  }
}

//-- shared_room.php --//
class RequestSharedRoom extends RequestBase {
  function __construct(){
    $this->GetItems('intval', 'get.id');
  }
}

//-- src/upload.php --//
class RequestSrcUpload extends RequestBase {
  function __construct(){
    EncodePostData();
    $this->GetItems('EscapeStrings', 'post.name', 'post.caption', 'post.user', 'post.password');
  }
}
