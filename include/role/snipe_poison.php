<?php
/*
  ◆狙毒者 (snipe_poison)
  ○仕様
  ・毒：処刑投票先と同陣営 (恋人は恋人陣営)
*/
RoleManager::LoadFile('poison');
class Role_snipe_poison extends Role_poison{
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){ return $user->IsCamp($this->GetVoteUser()->GetCamp(true), true); }
}
