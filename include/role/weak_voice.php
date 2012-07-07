<?php
/*
  ◆小声 (weak_voice)
  ○仕様
  ・声量変換：「小声」固定
*/
RoleManager::LoadFile('strong_voice');
class Role_weak_voice extends Role_strong_voice{
  function __construct(){ parent::__construct(); }
}
