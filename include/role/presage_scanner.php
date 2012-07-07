<?php
/*
  ◆件 (presage_scanner)
  ○仕様
  ・追加役職：受託者
  ・人狼襲撃：受託者に襲撃者を通知
*/
RoleManager::LoadFile('mind_scanner');
class Role_presage_scanner extends Role_mind_scanner{
  public $mind_role = 'mind_presage';
  function __construct(){ parent::__construct(); }

  function WolfEatCounter($target){
    global $ROOM, $USERS;

    $actor = $this->GetActor();
    foreach($this->GetUser() as $user){
      if($user->IsPartner($this->mind_role, $actor->user_no)){
	$result = $USERS->GetHandleName($target->uname, true);
	$target = $USERS->GetHandleName($actor->uname, true);
	$ROOM->ResultAbility('PRESAGE_RESULT', $result, $target, $user->user_no);
	break;
      }
    }
  }
}
