<?php
/*
  ◆長老 (elder)
  ○仕様
  ・投票数：+1
*/
class Role_elder extends Role{
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ $number++; }
}
