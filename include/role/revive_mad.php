<?php
/*
  ◆尸解仙 (revive_mad)
  ○仕様
*/
class Role_revive_mad extends Role{
  public $mix_in = 'revive_pharmacist';
  function __construct(){ parent::__construct(); }
}
