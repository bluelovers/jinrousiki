<?php
/*
  ◆幻視者 (dummy_scanner)
  ○仕様
  ・役職表示：村人
  ・追加役職：なし
*/
RoleManager::LoadFile('mind_scanner');
class Role_dummy_scanner extends Role_mind_scanner{
  public $display_role = 'human';
  public $action    = NULL;
  public $mind_role = NULL;
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROLE_IMG, $ROOM;
    $role = 'mind_read';
    if($ROOM->date > 1 && ! $this->GetActor()->IsRole($role)) $ROLE_IMG->Output($role);
  }
}
