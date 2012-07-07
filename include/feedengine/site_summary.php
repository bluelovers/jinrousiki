<?php
$INIT_CONF->LoadClass('ROOM_IMG', 'ROOM_OPT');

class SiteSummary extends FeedEngine {
  var $room_info = array();

  function Build() {
    global $SERVER_CONF, $ROOM_IMG;
    $this->SetChannel($SERVER_CONF->title, $SERVER_CONF->site_root, $SERVER_CONF->comment);
    $rooms = RoomDataSet::LoadOpeningRooms();
    foreach ($rooms->rows as $room) {
      $title = "{$room->name}村";
      $url = "{$this->uri}game_view.php?room_no={$room->id}";
      $options = RoomOption::Wrap($room->game_option->row, $room->option_role->row)->GenerateImageList();
      $status = $ROOM_IMG->Generate($room->status);
      $description = <<<XHTML
<div>
<a href="{$url}">
{$status}<span class='room_no'>[{$room->id}番地]</span><h2>{$title}</h2>
～ {$room->comment} 〜 {$options}(最大{$room->max_user}人)
</a>
</div>

XHTML;
      $description = strtr($description, array('./' => $this->url));
      $description = preg_replace('#(<img .*?[^/])>#i', '$1/>', $description);
      $this->AddItem($title, $url, $description);
    }
  }
}
