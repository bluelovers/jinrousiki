<?php
/*
  ◆不器用 (normal_voice)
  ○仕様
  ・声量変換：「普通声」固定
*/
RoleManager::LoadFile('strong_voice');
class Role_normal_voice extends Role_strong_voice{
  function __construct(){ parent::__construct(); }
}
