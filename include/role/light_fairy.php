<?php
/*
  ◆光妖精 (light_fairy)
  ○仕様
  ・悪戯：迷彩 (公開者)
*/
RoleManager::LoadFile('fairy');
class Role_light_fairy extends Role_fairy {
  public $bad_status = 'mind_open';
  function __construct(){ parent::__construct(); }

  function FairyAction($user){
    $target = $this->GetWolfTarget();
    if (! $target->wolf_killed || ! $target->IsSame($user->uname)) return false;
    $this->AddStack($this->GetProperty('bad_status'), 'event');
  }
}
