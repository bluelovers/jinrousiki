<?php
/*
  ◆独身貴族 (celibacy)
  ○仕様
  ・ショック死：恋人からの得票
*/
RoleManager::LoadFile('chicken');
class Role_celibacy extends Role_chicken{
  public $sudden_death = 'CELIBACY';
  function __construct(){ parent::__construct(); }

  function SuddenDeath(){
    global $USERS;

    if($this->IgnoreSuddenDeath()) return;
    foreach($this->GetVotedUname() as $uname){
      if($USERS->ByRealUname($uname)->IsLovers()){
	$this->SetSuddenDeath($this->sudden_death);
	break;
      }
    }
  }
}
