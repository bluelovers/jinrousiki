<?php
/*
  ◆不運 (bad_luck)
  ○仕様
  ・処刑者決定：自分
*/
RoleManager::LoadFile('decide');
class Role_bad_luck extends Role_decide{
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ $this->SetStack($this->GetUname()); }
}
