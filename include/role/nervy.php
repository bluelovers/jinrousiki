<?php
/*
  ◆自信家 (nervy)
  ○仕様
  ・ショック死：同一陣営に投票
*/
RoleManager::LoadFile('chicken');
class Role_nervy extends Role_chicken{
  public $sudden_death = 'NERVY';
  function __construct(){ parent::__construct(); }

  function IsSuddenDeath(){
    return ! $this->IgnoreSuddenDeath() &&
      $this->GetActor()->GetCamp(true) == $this->GetVoteUser()->GetCamp(true);
  }
}
