<?php
//ゲームの時間設定
class TimeConfig {
  //投票待ち超過時間 (秒) (この時間を過ぎても未投票の人がいたら突然死処理されます)
  public $sudden_death = 180;

  //サーバダウン判定時間 (秒)
  //超過のマイナス時間がこの閾値を越えた場合はサーバが一時的にダウンしていたと判定して、
  //超過時間をリセットします
  public $server_disconnect = 90;

  //警告音開始 (秒) (超過の残り時間がこの時間を切っても未投票の人がいたら警告音が鳴ります)
  public $alert = 90;

  //警告音感覚 (秒) (警告音の鳴る間隔)
  public $alert_distance = 6;

  //-- リアルタイム制 --//
  public $default_day   = 5; //昼の制限時間の初期値 (分)
  public $default_night = 3; //夜の制限時間の初期値 (分)

  //-- 会話を用いた仮想時間制 --//
  //昼の制限時間 (昼は12時間、spend_time=1(半角100文字以内) で 12時間 ÷ $day 進みます)
  public $day = 96;

  //夜の制限時間 (夜は 6時間、spend_time=1(半角100文字以内) で  6時間 ÷ $night 進みます)
  public $night = 24;

  //非リアルタイム制でこの閾値を過ぎると沈黙となり、設定した時間が進みます(秒)
  public $silence = 60;

  //沈黙経過時間 (12時間 ÷ $day(昼) or 6時間 ÷ $night (夜) の $silence_pass 倍の時間が進みます)
  public $silence_pass = 8;

  public $wait_morning = 15; //早朝待機制の待機時間 (秒)
}
