<?php
/*
  ◆吠耳鳴 (howl_ringing)
  ○仕様
*/
class Role_howl_ringing extends Role{
  public $mix_in = 'wolf';
  function __construct(){ parent::__construct(); }

  function Whisper($builder, $voice){
    return $builder->flag->{$this->role} && $this->Howl($builder, $voice);
  }
}
