<?php
/*
  ◆百合天使 (lily_angel)
  ○仕様
  ・共感者判定：両方女性
*/
RoleManager::LoadFile('angel');
class Role_lily_angel extends Role_angel{
  function __construct(){ parent::__construct(); }

  protected function IsSympathy($lovers_a, $lovers_b){
    return $lovers_a->IsFemale() && $lovers_b->IsFemale();
  }
}
