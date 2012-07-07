<?php
/*
  ◆雪女 (snow_trap_mad)
  ○仕様
*/
RoleManager::LoadFile('trap_mad');
class Role_snow_trap_mad extends Role_trap_mad{
  function __construct(){ parent::__construct(); }

  protected function IsVoteTrap(){ return true; }

  protected function SetTrapAction($user, $uname){
    $this->AddStack($uname, 'snow_trap', $user->uname);
  }

  function TrapToTrap(){
    //雪女が自分自身以外に罠を仕掛けた場合、設置先に罠があった場合は凍傷になる
    $stack = $this->GetStack('snow_trap');
    $count = array_count_values($stack);
    foreach($stack as $uname => $target_uname){
      if($uname != $target_uname && $count[$target_uname] > 1){
	$this->AddSuccess($uname, 'frostbite');
      }
    }

    foreach($this->GetStack('trap') as $uname => $target_uname){ //罠師の凍傷判定
      if($uname != $target_uname && in_array($target_uname, $stack)){
	$this->AddSuccess($uname, 'frostbite');
      }
    }
  }

  function TrapKill($user, $uname){
    if($this->IsTrap($uname)) $user->AddDoom(1, 'frostbite');
    return false;
  }

  function DelayTrap($user, $uname){
    if($this->IsTrap($uname)) $this->AddSuccess($user->uname, 'frostbite');
    return false;
  }

  protected function IsTrap($uname){ return in_array($uname, $this->GetStack('snow_trap')); }

  function TrapStack($user, $uname){ return $this->DelayTrap($user, $uname); }

  function DelayTrapKill(){ return; }
}
