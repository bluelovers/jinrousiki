<?php
/*
  ◆ゴマすり (flattery)
  ○仕様
  ・ショック死：自分の投票先に他の人が投票していない
*/
RoleManager::LoadFile('chicken');
class Role_flattery extends Role_chicken{
  public $sudden_death = 'FLATTERY';
  function __construct(){ parent::__construct(); }

  function IsSuddenDeath(){
    return ! $this->IgnoreSuddenDeath() && $this->GetVoteTargetCount() < 2;
  }
}
