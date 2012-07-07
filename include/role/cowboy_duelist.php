<?php
/*
  ◆無鉄砲者 (cowboy_duelist)
  ○仕様
  ・投票数：-1
*/
RoleManager::LoadFile('valkyrja_duelist');
class Role_cowboy_duelist extends Role_valkyrja_duelist{
  public $self_shoot = true;
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ $number--; }
}
