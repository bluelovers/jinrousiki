<?php
class FeedEngine {
  public $url;
  public $title;
  public $description;
  public $items = array();

  function Initialize($filename){
    global $INIT_CONF;
    if (include(JINRO_INC . "/feedengine/$filename")) {
      $segments = explode('_', substr($filename, 0, -4));
      foreach($segments as $segment){
        $class .= ucfirst($segment);
      }
      return new $class();
    }
    return false;
  }

  function SetChannel($title, $url, $description='') {
    $this->title = $title;
    $this->url = $url;
    $this->description = $description;
  }

  function AddItem($title, $url, $description) {
    return $this->items[] = array(
      'title'=>$title,
      'url'=>$url,
      'description'=>$description
    );
  }

  function decode($value) {
    global $SERVER_CONF;
    return mb_convert_encoding($value, $SERVER_CONF->encoding, 'auto');
  }

  function Import($url) {
    $RDF = simplexml_load_string(file_get_contents($url));
    $this->title = self::decode((string)$RDF->title);
    $this->url = (string)$RDF->link;
    $this->description = self::decode((string)$RDF->description);
    foreach($RDF->item as $item) {
      $this->ImportItem($item);
    }
  }

  function ImportItem($item) {
    $title = self::decode((string)$item->title);
    $link = (string)$item->link;
    $description = self::decode($item->description->asXML());
    return $this->AddItem($title, $link, $description);
  }

  function Export($filename) {
    $list_items = '';
    $item_contents = '';
    foreach($this->items as $item) {
      extract($item, EXTR_PREFIX_ALL, 'item');
      $list_items .= '<rdf:li rdf:resource="'.$item_url.'"/>';
      $item_contents .= <<<XML_RDF
<item rdf:about="{$item_url}">
<title>{$item_title}</title>
<link>{$item_url}</link>
<description>{$item_description}</description>
</item>
XML_RDF;
    }

    $document = <<<XML_RDF
<?xml version="1.0" encoding="UTF-8"?>
<rdf:RDF xml:lang="ja" xmlns="http://purl.org/rss/1.0/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
<channel about="{$this->url}{$filename}">
<title>{$this->title}</title>
<link>{$this->url}</link>
<description>{$this->description}</description>
<items>
<rdf:Seq>
{$list_items}
</rdf:Seq>
</items>
</channel>
{$item_contents}
</rdf:RDF>
XML_RDF;
    global $SERVER_CONF;
    return mb_convert_encoding($document, 'UTF-8', $SERVER_CONF->encoding);
  }
}
