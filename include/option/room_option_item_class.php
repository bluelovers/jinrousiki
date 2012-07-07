<?php
abstract class RoomOptionItem {
  public $name;
  public $enabled;

  public $collect = 'SetOption';

  /*
  public $formtype;
  public $formname;
  public $formvalue;
  public $value;
  public $caption;
  public $explain;
  */

  function  __construct($group) {
    global $GAME_OPT_CONF;
    $this->name = array_pop(explode('Option_', get_class($this)));
    RoomOption::SetGroup($group, $this);
    $enable = "{$this->name}_enable";
    $this->enabled = isset($GAME_OPT_CONF->$enable) ? $GAME_OPT_CONF->$enable : true;
    $default = "default_{$this->name}";
    if (isset($GAME_OPT_CONF->$default)) {
      $this->value = $GAME_OPT_CONF->$default;
    }
    $this->formname = $this->name;
    $this->formvalue = $this->value;
  }

  function SetOption(RoomOption $option, $value) {
    $option->Set($this, $this->name, $value);
  }

  function CollectPostParam(RoomOption $option) {
    if (isset($_POST[$this->name]) && isset($this->collect)) {
      call_user_func_array(array($this, $this->collect), array($option, $_POST[$this->name]));
    }
  }

  abstract function LoadMessages();

  function CastOnce(&$list, &$rand, $str = ''){
    $list[array_pop($rand)] .= ' ' . $this->name . $str;
    return array($this->name);
  }

  function CastAll(&$list){
    foreach(array_keys($list) as $id) $list[$id] .= ' ' . $this->name;
    return array($this->name);
  }
}

/**
 * チェックボックス型の標準的な村立てオプション項目を提供します。
 */
abstract class CheckRoomOptionItem extends RoomOptionItem {
  function  __construct($group) {
    parent::__construct($group);
    $this->formtype = 'checkbox';
    $this->formvalue = 'on';
  }

  function SetOption(RoomOption $option, $value) {
    $checked = $value == $this->formvalue && !empty($this->formvalue);
    $option->Set($this, $this->name, $checked);
  }

  function SetOptionAsKeyValue(RoomOption $option, $value) {
    $checked = $value == $this->formvalue && !empty($this->formvalue);
    if ($checked) {
      $option->Set($this, $this->name, $this->formvalue);
    }
  }

  function SetOptionAsValue(RoomOption $option, $value) {
    $checked = $value == $this->formvalue && !empty($this->formvalue);
    $option->Set($this, $this->formvalue, $checked);
  }
}

/**
 * セレクタ型の村立てオプション項目を提供します。
 */
abstract class SelectorRoomOptionItem extends RoomOptionItem {
  public $label;
  public $items;
  public $items_source;
  public $conf_name = 'GAME_OPT_CONF';

  function  __construct($group) {
    parent::__construct($group);
    $this->formtype = 'select';
    $this->items_source = "{$this->name}_items";
  }

  function CollectValue(RoomOption $option, $value) {
    $items = $this->GetItems();
    if (isset($items[$value]) && !empty($value)) {
      $child = $items[$value];
      if ($child instanceof RoomOptionItem) {
	$option->Set($this, $child->name, true);
      }
      else {
	$option->Set($this, $value, true);
      }
    }
  }

  function GetItems() {
    if (!isset($this->items)) {
      $this->items = array();
      $CONF = &$GLOBALS[$this->conf_name];
      $list = $this->items_source;
      if (isset($CONF->$list)) {
	foreach ($CONF->$list as $key => $value) {
	  if (is_string($key)) {
	    if ($this->ItemIsAvailable($key)) {
	      $this->items[$key] = $value;
	    }
	  }
	  else if (is_string($value)) {
	    $item = RoomOption::Get($value);
	    if (isset($item) && $item->enabled) {
	      $this->items[$item->name] = $item;
	    }
	  }
	  else {
	    $this->items[] = $value;
	  }
	}
      }
    }
    return $this->items;
  }

  function ItemIsAvailable($name) {
    global $GAME_OPT_CONF;
    $enable = "{$name}_enable";
    return isset($GAME_OPT_CONF->$enable) ? $GAME_OPT_CONF->$enable : true;
  }
}

/**
 * テキスト型の村立てオプション項目を提供します。
 */
abstract class TextRoomOptionItem extends RoomOptionItem {
  public $size;
  public $footer;

  function  __construct($group) {
    parent::__construct($group);
    $this->formtype = 'textbox';
  }

  function  LoadMessages() {
    global $ROOM_CONF;
    $size = "{$this->name}_input";
    if (isset($ROOM_CONF->$size)) {
      $this->size = $ROOM_CONF->$size;
    }
  }
}
