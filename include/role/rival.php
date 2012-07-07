<?php
/*
  ◆宿敵 (rival)
  ○仕様
  ・勝利判定：生存 + 自分以外の宿敵生存者全滅 (恋人は判定対象外)
*/
class Role_rival extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputImage(){ return; }

  protected function OutputPartner(){
    $target = $this->GetActor()->partner_list;
    $stack  = array();
    foreach($this->GetUser() as $user){
      if($this->IsActor($user->uname)) continue;
      if($user->IsPartner($this->role, $target)) $stack[] = $user->handle_name; //憑依は追跡しない
    }
    OutputPartner($stack, 'partner_header', 'rival_footer');
  }

  function FilterWin(&$flag){
    if(! $flag || $this->GetActor()->IsLovers()) return;
    if($this->IsDead()){
      $flag = false;
      return;
    }
    $stack = $this->GetActor()->partner_list;
    foreach($this->GetUser() as $user){
      if(! $this->IsActor($user->uname) && $user->IsPartner($this->role, $stack) &&
	 $user->IsLive()){
	$flag = false;
	return;
      }
    }
  }
}
