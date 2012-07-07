<?php
/*
  ◆イタコ (evoke_scanner)
  ○仕様
  ・追加役職：口寄せ
*/
RoleManager::LoadFile('mind_scanner');
class Role_evoke_scanner extends Role_mind_scanner{
  public $mind_role = 'mind_evoke';
  function __construct(){ parent::__construct(); }

  function IsVote(){ global $ROOM; return parent::IsVote() && ! $ROOM->IsOpenCast(); }

  function IgnoreVote(){
    global $ROOM;

    if(! is_null($str = parent::IgnoreVote())) return $str;
    return $ROOM->IsOpenCast() ?
      '「霊界で配役を公開しない」オプションがオフの時は投票できません' : NULL;
  }
}
