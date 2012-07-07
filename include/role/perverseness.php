<?php
/*
  ◆天邪鬼 (perverseness)
  ○仕様
  ・ショック死：自分の投票先に複数の人が投票している
*/
RoleManager::LoadFile('chicken');
class Role_perverseness extends Role_chicken{
  public $sudden_death = 'PERVERSENESS';
  function __construct(){ parent::__construct(); }

  function IsSuddenDeath(){
    return ! $this->IgnoreSuddenDeath() && $this->GetVoteTargetCount() > 1;
  }
}
