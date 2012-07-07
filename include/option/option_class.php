<?php
//オプションパーサ
class OptionParser {
  public $row;
  public $options = array();

  function __construct($value){
    $this->row = $value;
    foreach (explode(' ', $this->row) as $option){
      if (empty($option)) continue;
      $items = explode(':', $option);
      $this->options[$items[0]] = count($items) > 1 ? array_slice($items, 1) : true;
    }
  }

  function  __isset($name) {
    return isset($this->options[$name]);
  }

  function  __unset($name) {
    unset($this->options[$name]);
  }

  function __get($name){
    if (isset($this->options[$name])) {
      $value = $this->options[$name];
      $this->$name = $value;
      return $value;
    }
    $this->$name = false;
    return null;
  }

  function __set($name, $value){
    //Note:$value === falseの時unsetする代わりに__toStringで値がfalseの項目を省略する仕様に改めた(2011-01-14 enogu)
    $this->options[$name] = $value;
  }

  function __toString(){
    return $this->ToString();
  }

  function ToString($items = null) {
    if (isset($items)) {
      $filter = array_flip(is_array($items) ? $items : func_get_args());
    }
    else {
      $filter = $this->options;
    }
    $result = array();
    foreach (array_intersect_key($this->options, $filter) as $name => $value) {
      if (is_bool($value)) {
        if ($value) $result[] = $name;
      }
      elseif (is_array($value)) {
        $result[] = "{$name}:" . implode(':', $value);
      }
      elseif (! empty($value)) {
        $result[] = "{$name}:{$value}";
      }
    }
    return implode(' ', $result);
  }

  function Option($value){
    $this->__construct($value);
    foreach ($this->options as $name => $value) $this->__get($name);
  }

  function Exists($name){ return array_key_exists($name, $this->options); }
}

//オプションマネージャ
class OptionManager{
  public $path;
  public $stack;
  public $loaded;

  //特殊普通村編成リスト
  public $role_list = array(
    'detective', 'poison', 'assassin', 'wolf', 'boss_wolf', 'poison_wolf', 'possessed_wolf',
    'sirius_wolf', 'fox', 'child_fox', 'cupid', 'medium', 'mania');

  //特殊サブ配役リスト
  public $cast_list = array(
    'decide', 'authority', 'joker', 'deep_sleep', 'blinder', 'mind_open',
    'perverseness', 'liar', 'gentleman', 'critical', 'sudden_death', 'quiz');

  function __construct(){
    $this->path = JINRO_INC . '/option';
    $this->stack  = new StdClass();
    $this->loaded = array();
  }

  protected function Load($name){
    if (is_null($name) || ! file_exists($file = $this->path . '/' . $name . '.php')) return false;
    if (in_array($name, $this->loaded)) return true;
    require_once($file);
    $this->loaded[] = $name;
    return true;
  }

  function SetRole(&$list, $count){
    global $ROOM;

    foreach ($this->role_list as $option) {
      if (! $ROOM->IsOption($option) || ! $this->Load($option)) continue;
      $class  = 'Option_' . $option;
      $filter = new $class();
      $filter->SetRole($list, $count);
    }
  }

  function Cast(&$list, &$rand){
    global $ROOM;

    $delete = $this->stack->delete;
    foreach ($this->cast_list as $option) {
      if (! $ROOM->IsOption($option) || ! $this->Load($option)) continue;
      $class  = 'Option_' . $option;
      $filter = new $class();
      $stack  = $filter->Cast($list, $rand);
      if (is_array($stack)) $delete = array_merge($delete, $stack);
    }
    $this->stack->delete = $delete;
  }
}
