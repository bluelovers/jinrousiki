<?php
/* mb-emulator.php by Andy
 * email : webmaster@matsubarafamily.com
 *
 * license based on GPL(GNU General Public License)
 *
 * Ver.0.35 (2004/9/26)
 */



include dirname(__FILE__).'/convert.table';
include dirname(__FILE__).'/sjistouni.table';
include dirname(__FILE__).'/unitosjis.table';

$ini_file = parse_ini_file(dirname(__FILE__).'/mb-emulator.ini');

$_language = $ini_file['language'];
$_internal_encoding = $ini_file['internal_encoding'];
$_lang_array = array (
	'Japanese', 'ja', 'English', 'en', 'uni'
	);

$_mb_encoding = array (
	'AUTO' => 0,
	'ASCII' => 0,
	'EUC-JP' => 1,
	'EUC' => 1,
	'SJIS' => 2,
	'SHIFT-JIS' => 2,
	'SJIS-WIN' => 2,
	'JIS' => 3,
	'ISO-2022-JP' => 3,
	'UTF-8' => 4,
	'UTF8' => 4,
	'UTF-16'=>5
	);


if (!(mb_detect_order($ini_file['detect_order'])))
	$_detect_order = array ("ASCII", "JIS", "UTF-8", "EUC-JP", "SJIS");



$sjis_match = "[\x81-\x9F,\xE0-\xFC]([\x40-\xFC])|[\x01-\x7F]|[\xA0-\xDF]";
$euc_match = "[\xa1-\xfe]([\xa1-\xfe])|[\x01-\x7f]|\x8e([\xa0-\xdf])";
$utf8_match = "[\x01-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF][\x80-\xBF]";



function mb_convert_encoding( $str, $to_encoding, $from_encoding = '')
{
	global $_internal_encoding, $_mb_encoding;

	$to_encoding = strtoupper($to_encoding);
	$from_encoding = mb_detect_encoding($str, $from_encoding);
	
	switch ($_mb_encoding[$from_encoding]) {
		case 1: //euc-jp
			switch($_mb_encoding[$to_encoding]) {
				case 2: //sjis
					return _euctosjis($str);
				case 3: //jis
					$str = _euctosjis($str);
					return _sjistojis($str);
				case 4: //utf8
					return _euctoutf8($str);
				case 5: //utf16
					$str = _euctoutf8($str);
					return _utf8toutf16($str);
				default:
					return $str;
			}
		case 2: //sjis
			switch($_mb_encoding[$to_encoding]) {
				case 1: //euc-jp
					return _sjistoeuc($str);
				case 3: //jis
					return _sjistojis($str);
				case 4: //utf8
					return _sjistoutf8($str);
				case 5: //utf16
					$str = _sjistoutf8($str);
					return _utf8toutf16($str);
				default:
					return $str;
			}
		case 3: //jis
			switch($_mb_encoding[$to_encoding]) {
				case 1: //euc-jp
					$str = _jistosjis($str);
					return _sjistoeuc($str);
				case 2: //sjis
					return _jistosjis($str);
				case 4: //utf8
					$str = _jistosjis($str);
					return _sjistoutf8($str);
				case 5: //utf16
					$str = _jistosjis($str);
					$str = _sjistoutf8($str);
					return _utf8toutf16($str);
				default:
					return $str;
			}
		case 4: //utf8
			switch($_mb_encoding[$to_encoding]) {
				case 1: //euc-jp
					return _utf8toeuc($str);
				case 2: //sjis
					return _utf8tosjis($str);
				case 3: //jis
					$str = _utf8tosjis($str);
					return _sjistojis($str);
				case 5: //utf16
					return _utf8toutf16($str);
				default:
					return $str;
			}
		case 5: //utf16
			$str = _utf16toutf8($str);
			switch($_mb_encoding[$to_encoding]) {
				case 1: //euc-jp
					return _utf8toeuc($str);
				case 2: //sjis
					return _utf8tosjis($str);
				case 3: //jis
					$str = _utf8tosjis($str);
					return _sjistojis($str);
				case 4: //utf8
					return $str;
				default:
					return _utf8toutf16($str);
			}
		default:
			return $str;
	}
}




function _sjistoeuc(&$str)
{
	global $sjis_match, $_sjistoeuc_byte1, $_sjistoeuc_byte2, $_sjistoeuc_byte1_shift;
	
	$max = preg_match_all("/$sjis_match/", $str, $allchars);  // 文字の配列に分解
	$str_EUC = '';
	for ($i = 0; $i < $max; ++$i) {
		$num = ord($allchars[0][$i]);  // 各文字の1バイト目を数値として取り出す
		if ($num2 = ord($allchars[1][$i])) { // 2バイト目がある場合
			$shift = $_sjistoeuc_byte1_shift[$num2];
			$str_EUC .= chr($_sjistoeuc_byte1[$num] + $shift)
					   .chr($_sjistoeuc_byte2[$shift][$num2]);
		} elseif ($num <= 0x7F) {//英数字
			$str_EUC .= chr($num);
		} else { //半角カナ
			$str_EUC .= chr(0x8E).chr($num);
		}
	}
	return $str_EUC;
}


function _euctosjis(&$str)
{
	global $euc_match, $_euctosjis_byte1, $_euctosjis_byte2;
	$max = preg_match_all("/$euc_match/", $str, $allchars);  // 文字の配列に分解
	$str_SJIS = '';
	for ($i = 0; $i < $max; ++$i) {
		$num = ord($allchars[0][$i]);  // 各文字の1バイト目を数値として取り出す
		if ($num2 = ord($allchars[1][$i])) { // 漢字の場合
			$str_SJIS .= chr($_euctosjis_byte1[$num]);
			if ($num & 1)
				$str_SJIS .= chr($_euctosjis_byte2[0][$num2]);
			else
				$str_SJIS .= chr($_euctosjis_byte2[1][$num2]);
		} elseif ($num3 = ord($allchars[2][$i])) {//半角カナ
			$str_SJIS .= chr($num3);
		} else { //英数字
			$str_SJIS .= chr($num);
		}
	}
	return $str_SJIS;
}

function _sjistojis(&$str)
{
	global $sjis_match, $_sjistoeuc_byte1, $_sjistoeuc_byte2, $_sjistoeuc_byte1_shift;
	
	$max = preg_match_all("/$sjis_match/", $str, $allchars);  // 文字の配列に分解
	$str_JIS = '';
	$mode = 0; // 英数
	for ($i = 0; $i < $max; ++$i) {
		$num = ord($allchars[0][$i]);  // 各文字の1バイト目を数値として取り出す
		if ($num2 = ord($allchars[1][$i])) { // 2バイト目がある場合
			if ($mode != 1) {
				$mode = 1;
				$str_JIS .= chr(0x1b).'$B';
			}
			$shift = $_sjistoeuc_byte1_shift[$num2];
			$str_JIS .= chr(($_sjistoeuc_byte1[$num] + $shift) & 0x7F)
					   .chr($_sjistoeuc_byte2[$shift][$num2] & 0x7F);
		} elseif ($num > 0x80) {//半角カナ
			if ($mode != 2) {
				$mode = 2;
				$str_JIS .= chr(0x1B).'(I';
			}
			$str_JIS .= chr($num & 0x7F);
		} else {//半角英数
			if ($mode != 0) {
				$mode = 0;
				$str_JIS .= chr(0x1B).'(B';
			}
			$str_JIS .= chr($num);
		}
	}
	if ($mode != 0) {
		$str_JIS .= chr(0x1B).'(B';
	}
	return $str_JIS;
}

function _sub_jtosj($match)
{
	global $_euctosjis_byte1, $_euctosjis_byte2;
	$num = ord($match[0]);
	$num2 = ord($match[1]);
	$s = chr($_euctosjis_byte1[$num | 0x80]);
	if ($num & 1) {
		$s .= chr($_euctosjis_byte2[0][$num2 | 0x80]);
	} else {
		$s .= chr($_euctosjis_byte2[1][$num2 | 0x80]);
	}
	return $s;
}

function _jistosjis(&$str)
{
	global $_euctosjis_byte1, $_euctosjis_byte2;
	
	
	$jis_match = "(?:^|\x1b\(B)([^\x1b]*)|\x1b$B([^\x1b]*)|\x1b\(I([^\x1b]*)";
	$max = preg_match_all("/$jis_match/", $str, $allchunks, PREG_SET_ORDER);  // 文字種ごとの配列に分解
	$st = '';
	for ($i = 0; $i < $max; ++$i) {
		if (ord($allchunks[$i][1])) { //英数にマッチ
			$st .= $allchunks[$i][1];
		} elseif (ord($allchunks[$i][2])) { //漢字にマッチ
			$tmp = substr($allchunks[$i][0], 3, strlen($allchunks[$i][0]));
			$st .= preg_replace_callback("/.(.)/","_sub_jtosj", $tmp);
		} elseif (ord($allchunks[$i][3])) { //半角カナにマッチ
			$st .= preg_replace("/./e","chr(ord['$1'] | 0x80);",$allchunks[$i][3]);
		}
	}
	return $st;
}


function _ucs2utf8($uni)
{
	if ($uni <= 0x7f)
		return chr($uni);
	elseif ($uni <= 0x7ff) {
		$y = ($uni >> 6) & 0x1f;
		$x = $uni & 0x3f;
		return chr(0xc0 | $y).chr(0x80 | $x);
	} else {
		$z = ($uni >> 12) & 0x0f;
		$y = ($uni >> 6) & 0x3f;
		$x = $uni & 0x3f;
		return chr(0xe0 | $z).chr(0x80 | $y).chr(0x80 | $x);
	}
}

function _sjistoutf8(&$str)
{

	global $sjis_match, $sjistoucs2;
	$st = '';
	$max = preg_match_all("/$sjis_match/", $str, $allchars);  // 文字の配列に分解
	for ($i = 0; $i < $max; ++$i) {
		$num = ord($allchars[0][$i]);  // 各文字の1バイト目を数値として取り出す
		if ($num2 = ord($allchars[1][$i])) { // 2バイト目がある場合
			$ucs2 = $sjistoucs2[($num << 8) | $num2];
			$st .= _ucs2utf8($ucs2);
		} elseif ($num > 0x80) {//半角カナ
			$st .= _ucs2utf8(0xfec0 + $num);
		} else {//半角英数
			$st .= chr($num);
		}
	}
	return $st;
}

function _utf8ucs2($st)
{
	$num = ord($st);
	if (!($num & 0x80)) //1byte
		return $num;
	elseif (($num & 0xe0) == 0xc0) {//2bytes
		$num2 = ord(substr($st, 1,1));
		return (($num & 0x1f) << 6) | ($num2 & 0x3f);
	} else  { //3bytes
		$num2 = ord(substr($st, 1,1));
		$num3 = ord(substr($st, 2,1));
		return (($num & 0x0f) << 12) | (($num2 & 0x3f) << 6) | ($num3 & 0x3f);
	}
}

function _utf8tosjis(&$str)
{
	global $utf8_match, $ucs2tosjis;
	$st = '';
	$max = preg_match_all("/$utf8_match/", $str, $allchars);  // 文字の配列に分解
	for ($i = 0; $i < $max; ++$i) {
		$num = _utf8ucs2($allchars[0][$i]); //ucs2の値を取り出す
		if ($num < 0x80)
			$st .= chr($num);
		elseif ((0xff61 <= $num) && ($num <= 0xff9f))
			$st .= chr($num - 0xfec0);
		else {
			$sjis = $ucs2tosjis[$num];
			$st .= chr($sjis >> 8) . chr($sjis & 0xff);
		}
	}
	return $st;
}

function _euctoutf8(&$str)
{
	global $euc_match, $sjistoucs2, $_euctosjis_byte1, $_euctosjis_byte2;
	$st = '';
	$max = preg_match_all("/$euc_match/", $str, $allchars);  // 文字の配列に分解
	for ($i = 0; $i < $max; ++$i) {
		$num = ord($allchars[0][$i]);  // 各文字の1バイト目を数値として取り出す
		if ($num2 = ord($allchars[1][$i])) { // 2バイト目がある場合
			if ($num & 1)
				$sjis = ($_euctosjis_byte1[$num] << 8) | $_euctosjis_byte2[0][$num2];
			else
				$sjis = ($_euctosjis_byte1[$num] << 8) | $_euctosjis_byte2[1][$num2];
			$st .= _ucs2utf8($sjistoucs2[$sjis]);
		} elseif ($num3 = ord($allchars[2][$i])) {
			$st .= _ucs2utf8(0xfec0 + $num3);
		} else {//半角英数
			$st .= chr($num);
		}
	}
	return $st;
}

function _utf8toeuc(&$str)
{
	global $utf8_match, $ucs2tosjis, $_sjistoeuc_byte1, $_sjistoeuc_byte2, $_sjistoeuc_byte1_shift;
	$st = '';
	$max = preg_match_all("/$utf8_match/", $str, $allchars);  // 文字の配列に分解
	for ($i = 0; $i < $max; ++$i) {
		$num = _utf8ucs2($allchars[0][$i]); //ucs2の値を取り出す
		if ($num < 0x80)
			$st .= chr($num);
		elseif ((0xff61 <= $num) && ($num <= 0xff9f)) //半角カナ
			$st .= chr(0x8e) . chr($num - 0xfec0);
		else {
			$sjis = $ucs2tosjis[$num];
			$upper = $sjis >> 8;
			$lower = $sjis & 0xff;
			$shift = $_sjistoeuc_byte1_shift[$lower];
			$st .= chr($_sjistoeuc_byte1[$upper] + $shift)
				   .chr($_sjistoeuc_byte2[$shift][$lower]);
		}
	}
	return $st;
}

function _utf8toutf16(&$str)
{
	global $utf8_match;
	$st = '';
	$max = preg_match_all("/$utf8_match/", $str, $allchars);  // 文字の配列に分解
	for ($i = 0; $i < $max; ++$i) {
		$num = _utf8ucs2($allchars[0][$i]); //ucs2の値を取り出す
		$st .= chr(($num >> 8) & 0xff).chr($num & 0xff);
	}
	return $st;
}

function _utf16toutf8(&$str)
{
	global $utf8_match;
	$st = '';
	$ar = unpack("n*", $str);
	foreach($ar as $char) {
		$st .= _ucs2utf8($char);
	}
	return $st;
}


function mb_detect_order($encoding_list = '')
{
	global $_detect_order, $_mb_encoding;
	
	
	if ($encoding_list) {
		if (is_string($encoding_list)) {
			$encoding_list = strtoupper($encoding_list);
			$encoding_list = split(', *', $encoding_list);
		}
		foreach($encoding_list as $encode)
			if (!array_key_exists($encode, $_mb_encoding)) return FALSE;
		$_detect_order = $encoding_list;
		return TRUE;
	}
	return $_detect_order;
}

function _is_Ascii(&$str)
{
	return (!ereg("[\x80-\xFF]", $str) && !ereg("\x1B", $str));
}

function _is_JIS(&$str)
{
	return (!ereg("[\x80-\xFF]", $str) && ereg("\x1B", $str));
}

function _is_SJIS(&$str)
{
	$sjis_match = 
	"[\x01-\x7F]|[\xA0-\xDF]|[\x81-\xFC][\x40-\xFC]";
	return (preg_match("/^($sjis_match)+$/", $str) == 1);
}

function _is_EUCJP(&$str)
{
	$euc_match = 
	"[\x01-\x7F]|\x8E[\xA0-\xDF]|\x8F[xA1-\xFE][\xA1-\xFE]|[\xA1-\xFE][\xA1-\xFE]";
	return (preg_match("/^($euc_match)+$/", $str) == 1);
}

function _is_UTF8(&$str)
{
	$utf8_match = 
	"[\x01-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF][\x80-\xBF]";
	return (preg_match("/^($utf8_match)+$/", $str) == 1);
}

function mb_detect_encoding( $str , $encoding_list = '')
{
	global $_mb_encoding;

	if ($encoding_list == '') 
			$encoding_list = mb_detect_order();
	if (!is_array($encoding_list)) {
		$encoding_list = strtoupper($encoding_list);
		if ($encoding_list == 'AUTO') {
			$encoding_list = mb_detect_order();
		} else {
			$encoding_list = split(', *', $encoding_list);
		}
	}
	foreach($encoding_list as $encode) {
		switch ($_mb_encoding[$encode]) {
			case 0 : //ascii
				if (_is_ASCII($str)) return 'ASCII';
				break;
			case 1 : //euc-jp
				if (_is_EUCJP($str)) return 'EUC-JP';
				break;
			case 2 : //shift-jis
				if (_is_SJIS($str)) return 'SJIS';
				break;
			case 3 : //jis
				if (_is_JIS($str)) return 'JIS';
				break;
			case 4 : //utf-8
				if (_is_UTF8($str)) return 'UTF-8';
				break;
		}
	}
	return $encode;
}


?>