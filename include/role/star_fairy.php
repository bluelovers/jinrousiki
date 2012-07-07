<?php
/*
  ◆星妖精 (star_fairy)
  ○仕様
  ・悪戯：死亡欄妨害 (星座)
*/
RoleManager::LoadFile('flower_fairy');
class Role_star_fairy extends Role_flower_fairy {
  public $result = 'CONSTELLATION';
  function __construct(){ parent::__construct(); }
}
