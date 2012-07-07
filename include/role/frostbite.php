<?php
/*
  ◆凍傷 (frostbite)
  ○仕様
  ・ショック死：発動当日に無得票
*/
RoleManager::LoadFile('febris');
class Role_frostbite extends Role_febris{
  public $sudden_death = 'FROSTBITE';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    OutputAbilityResult($this->role . '_header', $ROOM->date, $this->role . '_footer');
  }

  function IsSuddenDeath(){ return parent::IsSuddenDeath() && $this->GetVotedCount() == 0; }
}
