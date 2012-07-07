<?php
//-- 音源設定 --//
class SoundConfig extends SoundConfigBase {
  public $path      = 'swf'; //音源のパス
  public $extension = 'swf'; //拡張子

  public $entry            = 'sound_entry';            //入村
  public $full             = 'sound_full';             //定員
  public $morning          = 'sound_morning';          //夜明け
  public $revote           = 'sound_revote';           //再投票
  public $novote           = 'sound_novote';           //未投票告知
  public $alert            = 'sound_alert';            //未投票警告
  public $objection_male   = 'sound_objection_male';   //異議あり(男)
  public $objection_female = 'sound_objection_female'; //異議あり(女)
}
