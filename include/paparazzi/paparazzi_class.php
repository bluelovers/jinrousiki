<?php
class Paparazzi{
  public $version = 'paparazzi Ver. 2.0 beta2';
  public $date;
  public $memory;
  public $time;
  public $log;

  function __construct(){
    $this->date   = date('Y-m-d H:i:s');
    $this->time   = microtime();
    $this->memory = memory_get_usage();
    $this->log    = array();
  }

  function GetElapsedTime(){
    return microtime() - $this->time;
  }

  function shot($comment, $category = 'general'){
    $this->log[] = array('time'     => $this->GetElapsedTime(),
			 'memory'   => memory_get_usage() - $this->memory,
			 'category' => $category,
			 'comment'  => $comment);
    return $comment;
  }

  function InsertBenchResult($label = NULL){
    echo (is_null($label) ? '' : $label . ':') . sprintf('%f[s]', $this->GetElapsedTime());
  }

  function CollectLog($force = false){
    if(! $force && $this->written) return;
    $this->written |= ! $force;

    $output = '<dl>';
    foreach ($this->log as $item){
      extract($item, EXTR_PREFIX_ALL, 'unsafe');
      $category = EscapeStrings($unsafe_category);
      $comment  = EscapeStrings($unsafe_comment);
      $output .= "<dt>($unsafe_time) : $unsafe_memory</dt><dd>$category : $comment</dd>";
    }
    return $output . '</dl>';
  }

  function InsertLog(){
    echo $this->CollectLog();
  }

  function Save($room_no, $uname, $action){
    if($this->serialized) return;

    $this->ModifySchema();

    //シーンの登録
    $items  = 'room_no, reported_time, uname, action';
    $values = "$room_no, '{$this->date}', '$uname', '$action'";
    shot(InsetDataBase('pp_articles', $items, $values));
    $article_id = mysql_insert_id();

    //ログの記録
    $items = 'article_id, step_no, elapsed_time, category, note';
    foreach ($this->log as $i => $item){
      extract($item, EXTR_PREFIX_ALL, 'unsafe');
      $category = mysql_real_escape_string($unsafe_category);
      $comment  = mysql_real_escape_string($unsafe_comment);
      $values = "$article_id, $i, $unsafe_time, '$category', '$comment'";
      shot(InsetDataBase('pp_album', $items, $values));
    }
    $this->serialized = true;
  }

  function ModifySchema(){
    mysql_query('CREATE TABLE IF NOT EXISTS pp_articles (
			article_id INT AUTO_INCREMENT PRIMARY KEY,
			room_no INT NOT NULL,
			reported_time DATETIME NOT NULL,
			uname TEXT NOT NULL,
			action TINYTEXT NOT NULL,
			INDEX room (room_no)
		) TYPE = MYISAM');
    mysql_query('CREATE TABLE IF NOT EXISTS pp_album (
			article_id INT NOT NULL,
			step_no INT NOT NULL,
			elapsed_time DOUBLE NOT NULL,
			category TINYTEXT NOT NULL,
			note TEXT NOT NULL,
			PRIMARY KEY(article_id, step_no)
		) TYPE = MYISAM');
  }
}
