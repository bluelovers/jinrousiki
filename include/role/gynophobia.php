<?php
/*
  ◆女性恐怖症 (gynophobia)
  ○仕様
  ・ショック死：女性に投票
*/
RoleManager::LoadFile('chicken');
class Role_gynophobia extends Role_chicken{
  public $sudden_death = 'GYNOPHOBIA';
  function __construct(){ parent::__construct(); }

  function IsSuddenDeath(){
    return ! $this->IgnoreSuddenDeath() && $this->GetVoteUser()->IsFemale();
  }
}
