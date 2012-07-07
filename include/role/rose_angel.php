<?php
/*
  ◆薔薇天使 (rose_angel)
  ○仕様
  ・共感者判定：両方男性
*/
RoleManager::LoadFile('angel');
class Role_rose_angel extends Role_angel{
  function __construct(){ parent::__construct(); }

  protected function IsSympathy($lovers_a, $lovers_b){
    return $lovers_a->IsMale() && $lovers_b->IsMale();
  }
}
