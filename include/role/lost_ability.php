<?php
/*
  ◆能力喪失 (lost_ability)
  ○仕様
  ・役職表示：比丘尼のみ専用画像
*/
class Role_lost_ability extends Role{
  function __construct(){ parent::__construct(); }

  protected function OutputImage(){
    if($this->GetActor()->IsRole('awake_wizard')) $this->display_role = 'ability_awake_wizard';
    parent::OutputImage();
  }
}
