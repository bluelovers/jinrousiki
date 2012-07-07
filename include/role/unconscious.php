<?php
/*
  ◆無意識 (unconscious)
  ○仕様
  ・役職表示：村人
*/
class Role_unconscious extends Role{
  public $display_role = 'human';
  function __construct(){ parent::__construct(); }
}
