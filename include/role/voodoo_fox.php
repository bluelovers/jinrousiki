<?php
/*
  ◆九尾 (voodoo_fox)
  ○仕様
*/
RoleManager::LoadFile('fox');
class Role_voodoo_fox extends Role_fox{
  public $mix_in = 'voodoo_mad';
  public $action = 'VOODOO_FOX_DO';
  public $submit = 'voodoo_do';
  function __construct(){ parent::__construct(); }

  function OutputAction(){ OutputVoteMessage('wolf-eat', $this->submit, $this->action); }
}
