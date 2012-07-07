<?php
/*
  ◆猩々 (clairvoyance_scanner)
  ○仕様
  ・追加役職：なし
  ・投票結果：透視
  ・投票：2日目以降
*/
RoleManager::LoadFile('mind_scanner');
class Role_clairvoyance_scanner extends Role_mind_scanner{
  public $mind_role = NULL;
  public $result = 'CLAIRVOYANCE_RESULT';
  public $ignore_message = '初日は透視できません';
  function __construct(){ parent::__construct(); }

  protected function OutputResult(){
    global $ROOM;
    if($ROOM->date > 2) OutputSelfAbilityResult($this->result);
  }

  function IsVote(){ global $ROOM; return $ROOM->date > 1; }

  /*
    複数の投票イベントを持つタイプが出現した場合は複数のメッセージを発行する必要がある
    対象が NULL でも有効になるタイプ (キャンセル投票はスキップ) は想定していない
  */
  function Report($user){
    global $ROOM, $USERS;

    foreach($this->GetStack('vote_data') as $action => $vote_stack){
      if(strpos($action, '_NOT_DO') !== false ||
	 ! array_key_exists($user->user_no, $vote_stack)) continue;
      $actor_id     = $this->GetActor()->user_no;
      $target_name  = $USERS->ByVirtual($user->user_no)->handle_name;
      $target_stack = $vote_stack[$user->user_no];

      if($user->IsRole('barrier_wizard')){
	$result_stack = array();
	foreach(explode(' ', $target_stack) as $id){
	  $voted_user = $USERS->ByVirtual($id);
	  $result_stack[$voted_user->user_no] = $voted_user->handle_name;
	}
	ksort($result_stack);
	foreach($result_stack as $result){
	  $ROOM->ResultAbility($this->result, $result, $target_name, $actor_id);
	}
      }
      else{
	$result = $USERS->ByVirtual($target_stack)->handle_name;
	$ROOM->ResultAbility($this->result, $result, $target_name, $actor_id);
      }
    }
  }
}
