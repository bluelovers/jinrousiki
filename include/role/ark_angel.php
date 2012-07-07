<?php
/*
  ◆大天使 (ark_angel)
  ○仕様
  ・結果表示：共感者
  ・共感者判定：無効
*/
RoleManager::LoadFile('angel');
class Role_ark_angel extends Role_angel{
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date == 2) OutputSelfAbilityResult('SYMPATHY_RESULT');
  }

  protected function IsSympathy($lovers_a, $lovers_b){ return false; }
}
