<?php
/*
  ◆猫神 (sacrifice_cat)
  ○仕様
  ・蘇生率：100% / 誤爆無し
  ・蘇生後：死亡
*/
RoleManager::LoadFile('poison_cat');
class Role_sacrifice_cat extends Role_poison_cat{
  public $revive_rate   = 100;
  public $missfire_rate =   0;
  function __construct(){ parent::__construct(); }

  function ReviveAction(){
    global $USERS;
    $USERS->Kill($this->GetActor()->user_no, 'SACRIFICE');
  }
}
