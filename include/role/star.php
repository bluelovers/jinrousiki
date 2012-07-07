<?php
/*
  ◆人気者 (star)
  ○仕様
  ・得票数：-1
*/
class Role_star extends Role{
  function __construct(){ parent::__construct(); }

  function FilterVotePoll(&$number){ $number--; }
}
