<?php
/*
  MessageImageGenerator.php
  Ver. 1.0 作成
  Ver. 1.1 #の処理を追加
  Ver. 1.9 デリミタを登録制に変更。入れ子に対応
  Ver. 1.91 色が変化しない不具合を修正
*/

class Delimiter{
  public $c; // デリミタ文字
  public $r; // RGB色指定の赤成分値
  public $g; // RGB色指定の緑成分値
  public $b; // RGB色指定の青成分値

  /*
    コンストラクタ
    $c デリミタ文字
    $r RGB色指定の赤成分値
    $g RGB色指定の緑成分値
    $b RGB色指定の青成分値
  */
  function __construct($c, $r, $g, $b){
    $this->c = $c;
    $this->r = $r;
    $this->g = $g;
    $this->b = $b;
  }
}

class MessageImageGenerator{
  public $font;   // フォントパス
  public $size;   // フォントサイズ
  public $width;  // 半角1文字あたりの幅
  public $height; // 半角1文字あたりの高さ
  public $x_margin; // マージン幅
  public $y_margin; // マージン高さ
  public $def_col;  // デフォルト文字色のRGB値
  public $def_bgc;  // デフォルト背景色のRGB値
  public $is_trans; // 背景色を透明にするかどうか
  public $delimiters; // デリミタ情報、色を格納する配列
  /*
    コンストラクタ
    $font 使用するTrueTypeフォントのパス
    $size フォントサイズ
    $x_margin マージン幅
    $y_margin マージン高さ
  */
  function __construct($font = "C:\\WINDOWS\\Fonts\\msgothic.ttc", $size = 12,
		       $x_margin = 5, $y_margin = 2, $is_trans = false){
    $this->font = $font;
    $this->size = $size;
    $this->x_margin = $x_margin;
    $this->y_margin = $y_margin;
    $this->def_col = array(0, 0, 0);
    $this->def_bgc = array(255, 255, 255);
    $this->is_trans = $is_trans;
    $this->delimiters = array();

    //フォント幅・高さの測定。もっといい定跡があればそちらに変更する予定。
    $r_a   = imagettfbbox($this->size, 0, $this->font, "A");
    $r_a2  = imagettfbbox($this->size, 0, $this->font, "A");
    $r_a2v = imagettfbbox($this->size, 0, $this->font, "A\nA");
    $this->width  = $r_a2[2]  - $r_a[2];
    $this->height = $r_a2v[1] - $r_a[1];
  }
  /*
    新規デリミタを追加する関数
    $nd 新しいデリミタと使用色を定義したDelimiterクラス
  */
  function AddDelimiter($nd){
    foreach($this->delimiters as &$d){ // 既に登録されているデリミタかどうか調べる
      if($d->c == $nd->c){
        $d = $nd; //登録済みのデリミタを上書きする
        return;
      }
    }
    array_push($this->delimiters, $nd); // 新しいデリミタを追加する
  }
  /*
    登録されているデリミタを削除する関数
    $c デリミタ文字
  */
  function DeleteDelimiter($c){
    for($i = 0; $i < count($this->delimiters); $i++){
      if($this->delimiters[$i]->c == $c){
        array_splice($this->delimiters, $i, 1); //登録されているデリミタを削除する
        return;
      }
    }
  }
  /*
    登録されているデリミタクラスを取得する関数
    $c デリミタ文字
    返り値 対応するデリミタクラス。登録されていない場合はデフォルトのデリミタクラス
  */
  function GetDelimiter($c){
    for($i = 0; $i < count($this->delimiters); $i++){
      if($this->delimiters[$i]->c == $c){
        return $this->delimiters[$i];
      }
    }
    return new Delimiter('', 0, 0, 0);
  }
  /*
    登録されているデリミタから分割用の正規表現文字列を作成する関数
    返り値 正規表現文字列
  */
  function GenerateDelimiterRegEx(){
    if(count($this->delimiters) == 0) return '';
    $regex_str = '/[';
    foreach($this->delimiters as $d){
      //正規表現で特別な意味を持つ文字をデリミタとして使う場合は、ここで\を挿入する必要あり
      switch($d->c){
      case '|':
        $regex_str .= '\|';
	break;

      case '/':
        $regex_str .= '\/';
	break;

      default:
        $regex_str .= $d->c;
	break;
      }
    }
    return $regex_str . ']/';
  }
  /*
    文字データの整形処理
    必要なら文字コード変換や正規表現の処理を実行する
  */
  function GetMessage($str, $regex){
    $message = $regex == '' ? $str : preg_replace($regex, '', $str);
    return mb_convert_encoding($message, 'UTF-8', 'auto');
  }
  /*
    役職説明、能力実行結果などのメッセージ用画像ファイルを生成する関数
    $msg 作成したいメッセージ文。改行有効。||で囲んだ部分を指定した色で書く
    返り値 画像データ
  */
  function GetImage($msg, $calib = array()) {
    //スタック用配列。一番下にどのデリミタともマッチしない文字列をセットしておく
    $d_stack = array("default");

    //$plain_msg_len = strlen($plain_msg);
    //echo "plain_r: $plain_msg_len ";
    $regex_str = $this->GenerateDelimiterRegEx();
    $plain_msg = $this->GetMessage($msg, $regex_str);
    //print $plain_msg;
    $plain_r = imagettfbbox($this->size, 0, $this->font, $plain_msg);
    //echo print_r($plain_r, true) . '<br>';

    // 画像の生成
    $img = imagecreatetruecolor($plain_r[2] - $plain_r[6] + $this->x_margin * 2,
				$plain_r[3] - $plain_r[7] + $this->y_margin * 2);
    $col_char = imagecolorallocate($img, $this->def_col[0], $this->def_col[1], $this->def_col[2]);
    $col_back = imagecolorallocate($img, $this->def_bgc[0], $this->def_bgc[1], $this->def_bgc[2]);
    $color = $col_char; // 文字描画色をデフォルト文字色に設定
    if($this->is_trans) imagecolortransparent($img, $col_back); // 背景を透明色に設定する場合
    imagefill($img, 0, 0, $col_back);

    // 各行ごとに処理
    $y_disp = $this->y_margin;
    foreach(preg_split('/\n/', $msg, -1, PREG_SPLIT_NO_EMPTY) as $line){
      //この行でどれだけ消費するか計算
      //echo $line.'<br>';
      $line_len = mb_strlen($line);
      $line_plain = $this->GetMessage($line, $regex_str);
      $r = imagettfbbox($this->size, 0, $this->font, $line_plain);
      //echo "line_r: $line_len "; print_r($r); echo "<br>";

      // 強調部分の色を変えつつ表示
      $array_msg = $regex_str == '' ? array(array($line, 0))
                                    : preg_split($regex_str, $line, -1, PREG_SPLIT_OFFSET_CAPTURE);
      //$x_disp = $this->x_margin;
      //echo print_r($array_msg, true) . '<br>';
      $str_total = '';
      $r_str_old = ''; //位置補正用
      for($i = 0; $i < count($array_msg); $i++){
	$str_len = mb_strlen($array_msg[$i][0]);
	//echo 'str_r: ' . $str_len . ' -> "' . $array_msg[$i][0] . '"<br>';
	$str = mb_convert_encoding($array_msg[$i][0], 'UTF-8', 'auto');
	//echo $str.'<br>';
	$str_total .= $str;
	$r_str       = imagettfbbox($this->size, 0, $this->font, $str);
	$r_str_total = imagettfbbox($this->size, 0, $this->font, $str_total);
	if(is_array($r_str_old) && count($calib) > 0){ //位置補正処理
	  $diff = $r_str_total[2] - ($r_str[2] + $r_str_old[2]);
	  if($diff != 0) $r_str[2] += floor($diff * array_shift($calib));
	}
	$r_str_old = $r_str_total; //補正用の現在値を保存
	//echo print_r($r_str, true) . '<br>';
	//echo print_r($r_str_total, true) . '<br>';

	// 文字色の決定
	if($array_msg[$i][1] > 0){
	  //echo $str_len . '<br>';
	  $c_d = $this->GetDelimiter($line[$array_msg[$i][1] - 1]);
	  if($d_stack[0] == $c_d->c){
	    //既に同じデリミタがスタックにある→現在の色指定を解除
	    array_shift($d_stack);
	    $c_d = $this->GetDelimiter($d_stack[0]);
	  }
	  else{
	    //現在のデリミタをスタックに追加
	    array_unshift($d_stack, $c_d->c);
	  }
	  //echo $d_stack[0] . '<br>';
	  $color = imagecolorallocate($img, $c_d->r, $c_d->g, $c_d->b);
	}
	
	//文字列の描画
	imagettftext($img, $this->size, 0, $this->x_margin + $r_str_total[2] - $r_str[2] - 2,
		     0 - $r[5] + $y_disp, $color, $this->font, $str);
	//Boldにするときは下の行も実行
	/*
	imagettftext($img, $this->size, 0, $this->x_margin + $r_str_total[2] - $r_str[2] + 1,
		     0 - $r[5] + $y_disp, $color, $this->font, $str);
	$x_disp += $str_len * $this->width + $r[0];
	*/
      }
      $y_disp += $this->height;
    }
    return $img;
  }
}

/* サンプルとして紹介されていたBold出力関数。濃すぎるので没。
function drawboldtext($image, $size, $angle, $x_cord, $y_cord, $color, $fontfile, $text)
{
   $_x = array(1, 0, 1, 0, -1, -1, 1, 0, -1);
   $_y = array(0, -1, -1, 0, 0, -1, 1, 1, 1);
   for($n=0;$n<=8;$n++)
   {
     ImageTTFText($image, $size, $angle, $x_cord+$_x[$n], $y_cord+$_y[$n], $color, $fontfile, $text);
   }
}
*/
/*
header("Content-Type: image/gif");
$gen = new MessageImageGenerator("C:\\WINDOWS\\Fonts\\uzura.ttf", 12, 5, 2, false);
$gen->AddDelimiter(new Delimiter("|",255,0,0));
$gen->AddDelimiter(new Delimiter("#",0,0,255));

$image = $gen->GetImage("[役割]\n　あなたは|人狼|です。\n　夜の間に他の|人狼|と協力し村人一人を殺害できます。" .
                        "あなたはその|強力|な力で村人を喰い殺すのです！");
//$image = $gen->GetImage("t|e|s#t#", 255, 0, 0, 0, 0, 255);
//imagegif($image, "c:\\temp\\result.gif"); // ファイルに出力する場合
imagegif($image);
*/
