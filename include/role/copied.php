<?php
/*
  ◆元神話マニア (copied)
  ○仕様
  ・結果表示：2日目
*/
class Role_copied extends Role{
  public $result = 'MANIA_RESULT';
  public $display_date = 2;
  function __construct(){ parent::__construct(); }

  protected function OutputImage(){ return; }

  protected function OutputResult(){
    global $ROOM;
    if($this->display_date == $ROOM->date) OutputSelfAbilityResult($this->result);
  }
}
