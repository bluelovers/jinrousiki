<?php
/*
  ◆大声 (strong_voice)
  ○仕様
  ・声量変換：「大声」固定 (ゲームプレイ中・生存時 / 呼び出し側で対応)
*/
class Role_strong_voice extends Role{
  public $voice_list = array('weak', 'normal', 'strong');
  function __construct(){ parent::__construct(); }

  //声量変換
  function FilterVoice(&$voice, &$str){ $voice = array_shift(explode('_', $this->role)); }

  //声量シフト
  function ShiftVoice(&$voice, &$str, $up = true){
    global $MESSAGE;

    if(($key = array_search($voice, $this->voice_list)) === false) return;
    if($up){
      if(++$key >= count($this->voice_list)){
	$str = $MESSAGE->howling;
	return;
      }
    }
    else{
      if(--$key < 0){
	$str = $MESSAGE->common_talk;
	return;
      }
    }
    $voice = $this->voice_list[$key];
  }
}
