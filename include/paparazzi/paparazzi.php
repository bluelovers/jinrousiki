<?php
//コメントとカテゴリを指定して、ログに新しい行を追加します。
//引数
//$comment  : ログに追加するメッセージの本体を指定します。
//$category : ログに追加するデータの分類名を指定します。この引数は省略可能です。
//            指定しなかった場合、規定値として'general'が設定されます。
function shot($comment, $category = 'general'){
  global $PAPARAZZI;
  return is_object($PAPARAZZI) ? $PAPARAZZI->shot($comment, $category) : $comment;
}

//テスト対象を起動してからこの関数が呼ばれるまでの時間を計測し、結果を挿入します。
//引数
//$label : 測定時間にラベルを付けます。この引数は省略可能です。指定しなかった場合、ラベルは表示されません。
function InsertBenchResult($label = false){
  global $PAPARAZZI;
  if(is_object($PAPARAZZI)) $PAPARAZZI->InsertBenchResult($label);
}

//トレースログを挿入します。
function InsertLog(){
  global $PAPARAZZI;
  if(is_object($PAPARAZZI)) $PAPARAZZI->InsertLog();
}

//トレースログの出力文字列を取得します。
function CollectLog($force = false){
  global $PAPARAZZI;
  return is_object($PAPARAZZI) ? $PAPARAZZI->CollectLog($force) : NULL;
}

//トレースログをデータベースに書き込みます。
function SaveLog($room_no, $uname, $action){
  global $PAPARAZZI;
  if(is_object($PAPARAZZI)) $PAPARAZZI->save($room_no, $uname, $action);
}
