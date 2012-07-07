<?php
/*
  ◆誘毒者 (guide_poison)
  ○仕様
  ・毒：毒能力者
  ・襲撃毒死回避：毒能力者以外
*/
RoleManager::LoadFile('poison');
class Role_guide_poison extends Role_poison{
  function __construct(){ parent::__construct(); }

  function IsPoisonTarget($user){ return $user->IsRoleGroup('poison'); }

  function AvoidPoisonEat($user){ return ! $user->IsRoleGroup('poison'); }
}
