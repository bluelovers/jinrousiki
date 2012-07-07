<?php
/*
  ◆堕天使 (cursed_angel)
  ○仕様
  ・共感者判定：別陣営
  ・ショック死：恋人からの得票
*/
RoleManager::LoadFile('angel');
class Role_cursed_angel extends Role_angel{
  public $mix_in = 'chicken';
  public $sudden_death = 'SEALED';
  function __construct(){ parent::__construct(); }

  protected function IsSympathy($lovers_a, $lovers_b){
    return $lovers_a->GetCamp() != $lovers_b->GetCamp();
  }

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
