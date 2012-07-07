<?php
/**
 * リアルタイム制(real_time)
 * ゲームの進行時間を指定します。昼と夜の発言時間を分単位で指定します。
 * offに設定すると発言数によってシーンが切り替わります。
 * @author enogu
 */
class Option_real_time extends RoomOptionItem {
  function __construct() {
    parent::__construct(RoomOption::GAME_OPTION);
  }

  function LoadMessages() {
    global $TIME_CONF;
    $this->defaultDayTime = $TIME_CONF->default_day;
    $this->defaultNightTime = $TIME_CONF->default_night;
    $this->caption = 'リアルタイム制';
    $this->explain = '制限時間が実時間で消費されます';
  }

  function CollectPostParam(RoomOption $option) {
    if (isset($_POST[$this->name])) {
      $value = $_POST[$this->name];
      if ($value == 'on') {
        global $TIME_CONF;
        $day = isset($_POST["{$this->name}_day"]) ? $_POST["{$this->name}_day"] : $TIME_CONF->default_day;
        $night = isset($_POST["{$this->name}_night"]) ? $_POST["{$this->name}_night"] : $TIME_CONF->default_night;
        $option->Set($this, $this->name, array(is_numeric($day) ? (int)$day : 0, is_numeric($night) ? (int)$night : 0));
      }
      else {
        $option->Set($this, $this->name, false);
      }
    }
  }
}
?>
