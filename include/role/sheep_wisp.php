<?php
/*
  ◆羊皮 (sheep_wisp)
  ○仕様
*/
class Role_sheep_wisp extends Role{
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ return ! $this->IsDoom(); }
}
