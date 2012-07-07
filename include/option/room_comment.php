<?php
class Option_room_comment extends TextRoomOptionItem {
  public $collect = null;
  public $caption = '村についての説明';
  public $footer  = '';

  function  __construct() {
    parent::__construct(RoomOption::NOT_OPTION);
  }
}
