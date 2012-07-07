<?php
/*
  ◆短気 (impatience)
  ○仕様
  ・ショック死：再投票
  ・処刑者決定：優先順位が低めの決定者相当
*/
RoleManager::LoadFile('chicken');
class Role_impatience extends Role_chicken{
  public $mix_in = 'decide';
  public $sudden_death = 'IMPATIENCE';
  function __construct(){ parent::__construct(); }

  function IsSuddenDeath(){ return ! $this->IgnoreSuddenDeath() && ! $this->IsVoteKill(); }
}
