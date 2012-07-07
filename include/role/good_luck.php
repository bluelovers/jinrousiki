<?php
/*
  ◆幸運 (good_luck)
  ○仕様
  ・処刑者決定：除外 (自分)
*/
RoleManager::LoadFile('decide');
class Role_good_luck extends Role_decide{
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ $this->SetStack($this->GetUname()); }

  function DecideVoteKill(){ $this->DecideVoteKillEscape(); }
}
