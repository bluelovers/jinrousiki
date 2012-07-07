<?php
/*
  ◆鵺 (unknown_mania)
  ○仕様
  ・追加役職：なし
*/
RoleManager::LoadFile('mania');
class Role_unknown_mania extends Role_mania {
  public $camp_copy = true;
  function __construct(){ parent::__construct(); }

  protected function GetRole($user){ return $this->GetManiaRole($this->GetActor()); }

  protected function GetManiaRole($user){ return null; }

  protected function CopyAction($user, $role){
    $user->AddRole($this->GetCopiedRole() . (is_null($role) ? '' : ' ' . $role));
  }

  protected function GetCopiedRole(){ return $this->GetActor()->GetID('mind_friend'); }
}
