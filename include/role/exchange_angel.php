<?php
/*
  ◆魂移使 (exchange_angel)
  ○仕様
  ・共感者判定：特殊 (集計後)
*/
RoleManager::LoadFile('angel');
class Role_exchange_angel extends Role_angel{
  function __construct(){ parent::__construct(); }

  protected function IsSympathy($lovers_a, $lovers_b){ return false; }

  //交換憑依処理
  function Exchange(){
    global $USERS;

    //変数を初期化
    $angel_list    = array();
    $lovers_list   = array();
    $fix_list      = array();
    $exchange_list = array();
    foreach($this->GetUser() as $user){ //魂移使が打った恋人の情報を収集
      if($user->IsDummyBoy() || ! $user->IsLovers()) continue;
      foreach($user->GetPartner('lovers') as $cupid_id){
	if($USERS->ById($cupid_id)->IsRole('exchange_angel')){
	  $angel_list[$cupid_id][] = $user->user_no;
	  $lovers_list[$user->user_no][] = $cupid_id;
	  if($user->IsPossessedGroup()) $fix_list[$cupid_id] = true; //憑依能力者なら対象外
	}
      }
    }
    //PrintData($angel_list, 'angel: 1st');
    //PrintData($lovers_list, 'lovers: 1st');

    foreach($angel_list as $id => $lovers_stack){ //抽選処理
      if(array_key_exists($id, $fix_list)) continue;
      $duplicate_stack = array();
      //PrintData($fix_list, 'fix_angel:'. $id);
      foreach($lovers_stack as $lovers_id){
	foreach($lovers_list[$lovers_id] as $cupid_id){
	  if(! array_key_exists($cupid_id, $fix_list)) $duplicate_stack[$cupid_id] = true;
	}
      }
      //PrintData($duplicate_stack, 'duplicate:' . $id);
      $duplicate_list = array_keys($duplicate_stack);
      if(count($duplicate_list) > 1){
	$exchange_list[] = GetRandom($duplicate_list);
	foreach($duplicate_list as $duplicate_id) $fix_list[$duplicate_id] = true;
      }
      else{
	$exchange_list[] = $id;
      }
      $fix_list[$id] = true;
    }
    //PrintData($exchange_list, 'exchange');

    foreach($exchange_list as $id){
      $target_list = $angel_list[$id];
      $lovers_a = $USERS->ByID($target_list[0]);
      $lovers_b = $USERS->ByID($target_list[1]);
      $lovers_a->AddRole('possessed_exchange[' . $target_list[1] . ']');
      $lovers_b->AddRole('possessed_exchange[' . $target_list[0] . ']');
      $this->SetSympathy($lovers_a, $lovers_b);
    }
  }
}
