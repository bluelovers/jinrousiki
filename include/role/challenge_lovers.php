<?php
/*
  ◆難題 (challenge_lovers)
  ○仕様
  ・ショック死
    + 5 日目以降恋人の相方と同じ人に投票しないとショック死する。
    + 複数の恋人がいる場合は誰か一人と同じならショック死しない。
  ・人狼襲撃耐性：5 日目以内
*/
class Role_challenge_lovers extends Role{
  public $mix_in = 'chicken';
  public $sudden_death = 'CHALLENGE';
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ global $ROOM; return $ROOM->date < 2; }

  function SuddenDeath(){
    global $ROOM, $USERS;

    if($this->IgnoreSuddenDeath() || $ROOM->date < 5) return;
    if(! is_array($cupid_list = $this->GetStack())){ //QP のデータをセット
      $cupid_list = array();
      foreach(array_keys($this->GetStack('target')) as $uname){
	$user = $USERS->ByRealUname($uname);
	if($user->IsLovers()){
	  foreach($user->GetPartner('lovers') as $id) $cupid_list[$id][] = $user->user_no;
	}
      }
      //PrintData($cupid_list, 'QP');
      $this->SetStack($cupid_list);
    }
    $target = $this->GetStack('target');
    $stack  = array_keys($target, $target[$this->GetUname()]);
    //PrintData($stack, $this->GetUname());

    $id = $this->GetActor()->user_no;
    foreach($this->GetActor()->GetPartner('lovers') as $cupid_id){
      if(! array_key_exists($cupid_id, $cupid_list)) return;
      foreach($cupid_list[$cupid_id] as $lovers_id){
	if($lovers_id != $id && in_array($USERS->ByID($lovers_id)->uname, $stack)) return;
      }
    }
    $this->SetSuddenDeath($this->sudden_death);
  }

  function WolfEatResist(){ return $this->GetActor()->IsChallengeLovers(); }
}
