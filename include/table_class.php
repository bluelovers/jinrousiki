<?php
class Table{
  public $name;
  public $default_charset;
  public $engine;
  public $fields  = array();
  public $indices = array();

  function __construct(){}

  function Exists($use_cache = true){
    if($use_cache){
      return isset($this->exists) ? $this->exists : ($this->exists = $this->Exists(false));
    }

    $list = FetchArray("SHOW TABLES LIKE {$this->name}");
    foreach($list as $field){
      if($field == $this->name) return true;
    }
    return false;
  }

  function Update(){}
}
