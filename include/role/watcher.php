<?php
/*
  ◆傍観者 (watcher)
  ○仕様
  ・投票数：0
*/
class Role_watcher extends Role {
  function __construct(){ parent::__construct(); }

  function FilterVoteDo(&$number){ $number = 0; }
}
