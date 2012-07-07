<?php
/*
  ◆熱病 (febris)
  ○仕様
  ・ショック死：発動当日
*/
RoleManager::LoadFile('chicken');
class Role_febris extends Role_chicken{
  public $sudden_death = 'FEBRIS';
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ return ! $this->IsDoom(); }

  protected function OutputImage(){ return; }

  protected function OutputResult(){
    global $ROOM;
    OutputAbilityResult($this->role . '_header', $ROOM->date, 'sudden_death_footer');
  }

  function IsSuddenDeath(){ return ! $this->IgnoreSuddenDeath() && $this->IsDoom(); }
}
