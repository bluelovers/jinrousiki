<?php
/*
  ◆疫病神 (plague)
  ○仕様
  ・処刑者決定：除外 (自分の投票先)
*/
RoleManager::LoadFile('decide');
class Role_plague extends Role_decide{
  function __construct(){ parent::__construct(); }

  function DecideVoteKill(){ $this->DecideVoteKillEscape(); }
}
