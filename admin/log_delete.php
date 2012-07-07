<?php
exit; //未完成に付き使用しないこと。
require_once 'contenttype_set.php';  //ヘッダを強制日本語EUC-JP指定
require_once 'game_functions.php';


//MySQLに接続
if( ($dbHandle = ConnectDatabase()) == NULL)
{
	exit;
}


print("<html><head>");
print("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">");
print("<title>汝は人狼なりや？[過去ログ編集]</title> \r\n");
print("<style type=\"text/css\"><!--\r\n");

$background_color = $background_color_aftergame;
$text_color = $text_color_aftergame;
$a_color = 'blue';
$a_vcolor = 'blue';
$a_acolor = 'red';

	print("body{background-color:white;background-image: url(\"img/old_log_bg.jpg\");background-repeat: no-repeat;");
	print("background-position: 100% 100%;background-attachment: fixed }");
	print("table{filter:alpha(opacity=80,enabled=80)}");
	print("body{background-color:$background_color;color:$text_color;}\r\n");

print("A:link{ color: $a_color; } A:visited{ color: $a_vcolor; } A:active{ color: $a_acolor; } A:hover{ color: red; } \r\n");
print(".day{  background-color:$background_color_day; color : $text_color_day;} \r\n");
print(".night{background-color:$background_color_night; color: $text_color_night;} \r\n");
print(".beforegame{background-color:$background_color_beforegame; color : $text_color_beforegame;} \r\n");
print(".aftergame{ background-color:$background_color_aftergame; color : $text_color_aftergame;} \r\n");
print(".heaven{ background-color:#cccccc; color : black;} \r\n");
print(".column { MARGIN: 0px; BORDER-LEFT:#ffffff 1px solid; PADDING-LEFT:6px; BORDER-TOP:#ffffff 1px solid; PADDING-TOP:3px;
	BORDER-RIGHT:  #ffffff 0px solid; PADDING-RIGHT:  3px; BORDER-BOTTOM: #ffffff 0px solid; PADDING-BOTTOM: 3px; 
	COLOR: #ffffff; BACKGROUND-COLOR: #526CD6; } \r\n");
	
print(".row { MARGIN: 0px; BORDER-LEFT:#ffffff 1px solid; PADDING-LEFT:6px; BORDER-TOP:#ffffff 1px solid; PADDING-TOP:3px; 
	BORDER-RIGHT:  #ffffff 0px solid; PADDING-RIGHT:  3px; BORDER-BOTTOM: #ffffff 0px solid; PADDING-BOTTOM: 3px; 
	COLOR: #333333; BACKGROUND-COLOR: #F2EACE; } \r\n");
print("--></style>\r\n");

print("</head><body>\r\n");


OldLogListOutput;



print("</body></html> \r\n");

	//変数の基本設定を行う
	//$keep_num:データベースに残す村数
	//$base_url:人狼スクリプトを設置してあるアドレス
	
	//$keep_numについて
	//user_entryテーブルで村数の確認をしている為、余り小さくしてはいけない。
	//稼動中の村のテーブルにまで手を出してしまう可能性がある（現状は１０〜１５がよろしいかと）。
	$keep_num = 15;
	
	//ベースアドレスの設定
	$base_url = "http://www12.atpages.jp/yaruo/jinro/";

	//現在のDB中にある部屋総数をカウントする
	$res_oldlog_list = mysql_query("select room_no from room where status = 'finished'");
	$finished_room_count = mysql_num_rows($res_oldlog_list);
	print("現在の村数：".$finished_room_count."<br>");

	//最も古い部屋のナンバーを取得する
	$res_oldlog_list = mysql_query("select room_no from user_entry WHERE room_no > 0 ORDER BY room_no");
	$oldest_room_no = mysql_result($res_oldlog_list,0,0);
	print("現在のHTML化された村数(実数は-1する)：".$oldest_room_no."<br>");

	//最も新しい部屋のナンバーを取得する
	$res_oldlog_list = mysql_query("select room_no from room where status = 'finished' ORDER BY room_no DESC");
	$latest_room_no = mysql_result($res_oldlog_list,0,0);
	$latest_room_no = $latest_room_no - $keep_num;
	$now_room_count = $finished_room_count - $oldest_room_no;


	//ＨＴＭＬ化されていない村の数が$keep_numより大きかった場合、村数が$keep_numと同じになるまでログ保存とテーブル削除を実行する
	if($now_room_count >= $keep_num){
		for(;$oldest_room_no <=$latest_room_no ;$oldest_room_no++){
			$log_url = $base_url."old_log.php?log_mode=on&room_no=".$oldest_room_no."&heaven_talk=on";
			$logdata = file_get_contents($log_url);
			$error = file_put_contents("log/".$oldest_room_no.".html",$logdata);
			$log_url = $base_url."old_log.php?log_mode=on&room_no=".$oldest_room_no."&reverse_log=on&heaven_talk=on";
			$logdata = file_get_contents($log_url);
			$error_r = file_put_contents("log/".$oldest_room_no."_r.html",$logdata);
			$message = "部屋番号".$oldest_room_no."を保存しました<br>";
			echo $message;
			//テーブルデータの削除
			if(($error == FALSE) || ($error_r == FALSE)){
				$message = "ファイル出力エラーが発生した為、テーブルデータの削除は行いませんでした。<br>";
				echo $message;
			}
			else{
				mysql_query("DELETE FROM talk WHERE room_no = $oldest_room_no");
				mysql_query("DELETE FROM user_entry WHERE room_no = $oldest_room_no");
				mysql_query("DELETE FROM system_message WHERE room_no = $oldest_room_no");
				mysql_query("DELETE FROM vote WHERE room_no = $oldest_room_no");
				$message = "部屋番号".$oldest_room_no."のテーブルデータを全て削除しました<br>";
				echo $message;
			}
		}
	}
	else{
	print("現在テーブルデータは最小限です。これ以上削除する必要はありません。");
	}


//MySQLとの接続を閉じる
DisconnectDatabase($dbHandle);

?>
