<?php
/*
  ◆はぐれ者 (mind_lonely)
  ○仕様
*/
class Role_mind_lonely extends Role{
  public $mix_in = 'silver_wolf';
  function __construct(){ parent::__construct(); }

  protected function IgnoreAbility(){ global $ROOM; return $ROOM->date < 2; }

  function Whisper($builder, $voice){
    return $this->GetActor()->IsWolf() && parent::Whisper($builder, $voice);
  }
}
