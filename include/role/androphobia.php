<?php
/*
  ◆男性恐怖症 (androphobia)
  ○仕様
  ・ショック死：男性に投票
*/
RoleManager::LoadFile('chicken');
class Role_androphobia extends Role_chicken{
  public $sudden_death = 'ANDROPHOBIA';
  function __construct(){ parent::__construct(); }

  function IsSuddenDeath(){ return ! $this->IgnoreSuddenDeath() && $this->GetVoteUser()->IsMale(); }
}
