<?php
/*
  ◆夢共有者 (dummy_common)
  ○仕様
  ・役職表示：共有者
  ・仲間表示：身代わり君
*/
RoleManager::LoadFile('common');
class Role_dummy_common extends Role_common{
  public $display_role = 'common';
  function __construct(){ parent::__construct(); }

  protected function IsCommonPartner($user){ return $user->IsDummyBoy(); }
}
