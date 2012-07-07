<?php
/*
  ◆共有者 (common)
  ○仕様
  ・仲間表示：共有者系
*/
class Role_common extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputPartner(){
    $stack = array();
    foreach($this->GetUser() as $user){
      if($this->IsActor($user->uname)) continue;
      if($this->IsCommonPartner($user)) $stack[] = $user->handle_name;
    }
    OutputPartner($stack, 'common_partner');
  }

  //仲間判定
  protected function IsCommonPartner($user){ return $user->IsCommon(true); }

  //囁き
  function Whisper($builder, $voice){
    global $MESSAGE;

    if(! $builder->flag->common_whisper) return false; //スキップ判定
    $str = $MESSAGE->common_talk;
    $builder->RawAddTalk('', '共有者の小声', $str, $voice, '', 'talk-common', 'say-common');
    return true;
  }
}
