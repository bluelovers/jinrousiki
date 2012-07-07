<?php
/*
  ◆恋人 (lovers)
  ○仕様
*/
class Role_lovers extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputImage(){ return; }

  protected function OutputPartner(){
    global $ROOM, $USERS;

    $target = $this->GetActor()->partner_list;
    $stack  = array();
    foreach($this->GetUser() as $user){
      if($this->IsActor($user->uname)) continue;
      if($user->IsPartner($this->role, $target) ||
	 $this->GetActor()->IsPartner('dummy_chiroptera', $user->user_no) ||
	 ($ROOM->date == 1 && $user->IsPartner('sweet_status', $target))){ //夢求愛者・悲恋対応
	$stack[] = $USERS->GetHandleName($user->uname, true); //憑依追跡
      }
    }
    OutputPartner($stack, 'partner_header', 'lovers_footer');
  }

  //囁き (恋耳鳴)
  function Whisper($builder, $voice){
    global $MESSAGE;

    if(! $builder->flag->sweet_ringing) return false; //スキップ判定
    $str = $MESSAGE->lovers_talk;
    foreach($builder->filter as $filter) $filter->FilterWhisper($voice, $str); //フィルタリング処理
    $builder->RawAddTalk('', '恋人の囁き', $str, $voice);
    return true;
  }
}
