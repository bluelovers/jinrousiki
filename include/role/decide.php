<?php
/*
  ◆決定者 (decide)
  ○仕様
  ・処刑者決定：自分の投票先
*/
class Role_decide extends Role{
  function __construct(){ parent::__construct(); }

  function SetVoteDay($uname){ $this->SetStack($uname); }

  //処刑者決定
  function DecideVoteKill(){
    if($this->IsVoteKill()) return;
    $target = $this->GetStack();
    if(in_array($target, $this->GetVotePossible())) $this->SetVoteKill($target);
  }

  //処刑者ユーザ名登録
  function SetVoteKill($uname){ return $this->SetStack($uname, 'vote_kill_uname'); }

  //処刑者候補取得
  function GetVotePossible(){ return $this->GetStack('vote_possible'); }

  //処刑者除外
  function DecideVoteKillEscape(){
    if($this->IsVoteKill()) return;
    $stack = & $this->GetVotePossible();
    $key = array_search($this->GetStack(), $stack);
    if($key === false) return;
    unset($stack[$key]);
    //候補が一人になった場合は処刑者決定
    if(count($stack) == 1) $this->SetVoteKill(array_shift($stack));
  }

  //単一処刑者候補判定
  function DecideVoteKillSame(){
    if($this->IsVoteKill() || ! is_array($this->GetStack()) ||
       count($stack = $this->GetMaxVotedUname()) != 1) return true;
    $this->SetVoteKill(array_shift($stack));
    return false;
  }

  //最大得票者投票者ユーザ名取得
  function GetMaxVotedUname(){
    return array_intersect($this->GetVotePossible(), $this->GetStack());
  }
}
