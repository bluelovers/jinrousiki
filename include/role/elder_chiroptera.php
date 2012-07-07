<?php
/*
  ◆古蝙蝠 (elder_chiroptera)
  ○仕様
  ・投票数：+1
*/
class Role_elder_chiroptera extends Role{
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ $number++; }
}
