<?php
/*
  ◆反逆者 (rebel)
  ○仕様
  ・処刑投票：権力者と同じ人に投票すると権力者 -2 / 反逆者 -1
*/
RoleManager::LoadFile('authority');
class Role_rebel extends Role_authority {
  function __construct(){ parent::__construct(); }

  function Rebel(&$message_list, &$count_list){
    //能力発動判定
    $role   = 'authority';
    $self   = $this->GetStack();
    $target = $this->GetStack($role);
    $uname  = $this->GetStack($this->role . '_uname');
    if (is_null($self) || is_null($target) || $uname != $this->GetStack($role . '_uname')) return;

    //権力者 -2 / 反逆者 -1
    $count = 0;
    $list =& $message_list[$target]['vote'];
    $list > 2 ? $count += 2 : $count += $list;
    $list > 2 ? $list  -= 2 : $list = 0;

    $list =& $message_list[$self]['vote'];
    $list > 1 ? $count++ : $count += $list;
    $list > 1 ? $list--  : $list = 0;

    //投票先の得票数を補正する
    $list =& $message_list[$uname]['poll'];
    $list > $count ? $list -= $count : $list = 0;
    $count_list[$uname] = $list;
  }
}
