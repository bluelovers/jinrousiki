<?php
/*
  ◆野狐禅 (immolate_fox)
  ○仕様
  ・人狼襲撃カウンター：能力発現
  ・勝利：能力発現所持
*/
RoleManager::LoadFile('fox');
class Role_immolate_fox extends Role_fox{
  function __construct(){ parent::__construct(); }

  function FoxEatCounter($user){ $this->GetActor()->AddRole('muster_ability'); }

  function Win($winner){ return $this->GetActor()->IsRole('muster_ability'); }
}
