<?php
//-- クラス定義 --//
//時間設定表示用クラス
class TimeCalculation {
  public $spend_day;      //非リアルタイム制の発言で消費される時間 (昼)
  public $spend_night;    //非リアルタイム制の発言で消費される時間 (夜)
  public $silence_day;    //非リアルタイム制の沈黙で経過する時間 (昼)
  public $silence_night;  //非リアルタイム制の沈黙で経過する時間 (夜)
  public $silence;        //非リアルタイム制の沈黙になるまでの時間
  public $sudden_death;   //制限時間を消費後に突然死するまでの時間
  public $alert;          //警告音開始
  public $alert_distance; //警告音の間隔
  public $die_room;       //自動廃村になるまでの時間
  public $establish_wait; //次の村を立てられるまでの待ち時間

  function __construct(){
    global $ROOM_CONF, $TIME_CONF;

    $day_seconds   = floor(12 * 60 * 60 / $TIME_CONF->day);
    $night_seconds = floor( 6 * 60 * 60 / $TIME_CONF->night);

    $this->spend_day      = ConvertTime($day_seconds);
    $this->spend_night    = ConvertTime($night_seconds);
    $this->silence_day    = ConvertTime($TIME_CONF->silence_pass * $day_seconds);
    $this->silence_night  = ConvertTime($TIME_CONF->silence_pass * $night_seconds);
    $this->silence        = ConvertTime($TIME_CONF->silence);
    $this->sudden_death   = ConvertTime($TIME_CONF->sudden_death);
    $this->alert          = ConvertTime($TIME_CONF->alert);
    $this->alert_distance = ConvertTime($TIME_CONF->alert_distance);
    $this->die_room       = ConvertTime($ROOM_CONF->die_room);
    $this->establish_wait = ConvertTime($ROOM_CONF->establish_wait);
  }
}

//-- 関数定義 --//
//情報一覧ページ HTML ヘッダ出力
function OutputInfoPageHeader($title, $level = 0, $css = 'info'){
  $top  = str_repeat('../', $level + 1);
  $info = $level == 0 ? './' : str_repeat('../', $level);
  OutputHTMLHeader('[' . $title . ']', 'info/' . $css);
  echo <<<EOF
</head>
<body>
<h1>{$title}</h1>
<p>
<a target="_top" href="{$top}">&lt;= TOP</a>
<a target="_top" href="{$info}">← 情報一覧</a>
</p>

EOF;
}

//役職情報ページ HTML ヘッダ出力
function OutputRolePageHeader($title){
  OutputHTMLHeader('新役職情報 - ' . '[' . $title . ']', 'new_role');
  echo <<<EOF
</head>
<body>
<h1>{$title}</h1>
<p>
<a target="_top" href="../">&lt;= 情報一覧</a>
<a target="_top" href="./">&lt;- メニュー</a>
<a href="summary.php">← 一覧表</a>
</p>

EOF;
}

//配役テーブル出力
function OutputCastTable($min = 0, $max = null){
  global $ROLE_DATA, $CAST_CONF;

  //設定されている役職名を取得
  $stack = array();
  foreach ($CAST_CONF->role_list as $key => $value) {
    if ($key < $min) continue;
    $stack = array_merge($stack, array_keys($value));
    if ($key == $max) break;
  }
  $role_list = $ROLE_DATA->SortRole(array_unique($stack)); //表示順を決定

  $header = '<table class="member">';
  $str = '<tr><th>人口</th>';
  foreach ($role_list as $role) $str .= $ROLE_DATA->GenerateMainRoleTag($role, 'th');
  $str .= '</tr>'."\n";
  echo $header . $str;

  //人数毎の配役を表示
  foreach ($CAST_CONF->role_list as $key => $value) {
    if ($key < $min) continue;
    $tag = "<td><strong>{$key}</strong></td>";
    foreach ($role_list as $role) {
      $tag .= '<td>' . (isset($value[$role]) ? $value[$role] : 0) . '</td>';
    }
    echo '<tr>' . $tag . '</tr>'."\n";
    if ($key == $max) break;
    if ($key % 20 == 0) echo $str;
  }
  echo '</table>';
}

//他のサーバの部屋画面ロード用データを出力
function OutputSharedRoomList(){
  global $SHARED_CONF;

  if ($SHARED_CONF->disable) return false;

  $str = '<script type="text/javascript" src="../javascript/shared_room.js"></script>'."\n";
  $count = 0;
  foreach ($SHARED_CONF->server_list as $server => $array) {
    $count++;
    extract($array);
    if ($disable) continue;

    $str .= <<<EOF
<div id="server{$count}"></div>
<script language="javascript"><!--
output_shared_room({$count}, "server{$count}");
--></script>

EOF;
  }
  echo $str;
}

//他のサーバの部屋画面を出力
function OutputSharedRoom($id){
  global $SHARED_CONF;

  if ($SHARED_CONF->disable) return false;

  $count = 0;
  foreach ($SHARED_CONF->server_list as $server => $array) {
    if ($count++ == $id) break;
  }
  extract($array);
  if ($disable) return false;

  if (! $SHARED_CONF->CheckConnection($url)) { //サーバ通信状態チェック
    $data = $SHARED_CONF->host . ": Connection timed out ({$SHARED_CONF->time} seconds)";
    echo $SHARED_CONF->GenerateSharedServerRoom($name, $url, $data);
    return false;
  }

  //部屋情報を取得
  if (($data = @file_get_contents($url.'room_manager.php')) == '') return false;
  if ($encode != '' && $encode != $SHARED_CONF->encode) {
    $data = mb_convert_encoding($data, $SHARED_CONF->encode, $encode);
  }
  if (ord($data{0}) == '0xef' && ord($data{1}) == '0xbb' && ord($data{2}) == '0xbf') { //BOM 消去
    $data = substr($data, 3);
  }
  if ($separator != '') {
    $split_list = mb_split($separator, $data);
    $data = array_pop($split_list);
  }
  if ($footer != '') {
    if (($position = mb_strrpos($data, $footer)) === false) return false;
    $data = mb_substr($data, 0, $position + mb_strlen($footer));
  }
  if ($data == '') return false;

  $replace_list = array('href="' => 'href="' . $url, 'src="'  => 'src="' . $url);
  $data = strtr($data, $replace_list);
  echo $SHARED_CONF->GenerateSharedServerRoom($name, $url, $data);
}
