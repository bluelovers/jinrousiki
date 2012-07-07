<?php
class Option_room_name extends TextRoomOptionItem {
  public $collect = null;
  public $caption = '村の名前';
  public $footer  = '村';

  function  __construct() {
    parent::__construct(RoomOption::NOT_OPTION);
  }
}
