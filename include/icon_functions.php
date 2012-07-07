<?php

//村で使用中のアイコンチェック
function IsUsingIcon($id){
  $query = 'SELECT icon_no FROM user_icon INNER JOIN ' .
    '(user_entry INNER JOIN room USING (room_no)) USING (icon_no) ' .
    "WHERE icon_no = {$id} AND room.status IN ('waiting', 'playing')";
  return FetchCount($query) > 0;
}

//文字列長チェック
function CheckIconText($title, $url){
  global $RQ_ARGS, $USER_ICON;

  $stack = array();
  $list  = array('icon_name'  => 'アイコン名',
		 'appearance' => '出典',
		 'category'   => 'カテゴリ',
		 'author'     => 'アイコンの作者');
  foreach($list as $key => $label){
    $value = $RQ_ARGS->$key;
    if(strlen($value) > $USER_ICON->name){
      OutputActionResult($title, $label . ': ' . $USER_ICON->MaxNameLength() . $url);
    }
    $stack[$key] = strlen($value) > 0 ? $value : null;
  }
  return $stack;
}

//RGB カラーチェック
function CheckColorString($str, $title, $url){
  if(strlen($str) != 7 || substr($str, 0, 1) != '#' || ! ctype_xdigit(substr($str, 1, 7))){
    $error = '色指定が正しくありません。<br>'."\n" .
      '指定は (例：#6699CC) のように RGB 16進数指定で行ってください。<br>'."\n" .
      '送信された色指定 → <span class="color">' . $str . '</span>';
    OutputActionResult($title, $error . $url);
  }
  return strtoupper($str);
}

//アイコン削除
function DeleteIcon($id, $file){
  global $ICON_CONF;

  if(! FetchBool('DELETE FROM user_icon WHERE icon_no = ' . $id)) return false; //削除処理
  unlink($ICON_CONF->path . '/' . $file); //ファイル削除
  OptimizeTable('user_icon'); //テーブル最適化 + コミット
  return true;
}

function OutputIconList($base_url = 'icon_view'){
  global $RQ_ARGS;

  /*
    初回表示前に検索条件をリセットする
    TODO:リファラーをチェックすることでGETリクエストによる取得にも対処できる
    現時点ではGETで直接検索を試みたユーザーのセッション情報まで配慮していないが、
    いずれ必要になるかも知れない (enogu)
  */
  if(is_null($RQ_ARGS->page)) unset($_SESSION['icon_view']);

  //編集フォームの表示
  if($base_url == 'icon_view'){
    $footer = <<<HTML
</fieldset>
</form>

HTML;
    if($RQ_ARGS->icon_no > 0){
      $params = $RQ_ARGS->ToArray();
      unset($params['icon_no']);
      echo <<<HTML
<div class="link"><a href="icon_view.php">→アイコン一覧に戻る</a></div>
<form action="icon_edit.php" method="POST">
<fieldset><legend>アイコン設定の変更</legend>

HTML;
      OutputIconEditForm($RQ_ARGS->icon_no);
      echo $footer;
    }
    else{
      echo <<<HTML
<form id="icon_search" method="GET">
<fieldset><legend>ユーザアイコン一覧</legend>

HTML;
      ConcreteOutputIconList($base_url);
      echo $footer;
    }
  }
  else{
    ConcreteOutputIconList($base_url);
  }
}

function OutputIconEditForm($icon_no){
  global $ICON_CONF, $USER_ICON, $RQ_ARGS;

  $size = ' size="' . $USER_ICON->name . '" maxlength="' . $USER_ICON->name . '"';
  foreach(FetchAssoc("SELECT * FROM user_icon WHERE icon_no = {$icon_no}") as $selected){
    extract($selected, EXTR_PREFIX_ALL, 'selected');
    $location = $ICON_CONF->path . '/' . $selected_icon_filename;
    $checked  = $selected_disable > 0 ? ' checked' : '';
    echo <<<EOF
<form method="POST" action="icon_edit.php">
<input type="hidden" name="icon_no" value="{$selected_icon_no}">
<table cellpadding="3">
<tr><td rowspan="7"><img src="{$location}" style="border:3px solid {$selected_color};"></td>
<td><label for="name">アイコンの名前</label></td>
<td><input type="text" id="name" name="icon_name" value="{$selected_icon_name}"{$size}></td></tr>

<tr><td><label for="appearance">出典</label></td>
<td><input type="text" id="appearance" name="appearance" value="{$selected_appearance}"{$size}></td></tr>

<tr><td><label for="category">カテゴリ</label></td>
<td><input type="text" id="category" name="category" value="{$selected_category}"{$size}></td></tr>

<tr><td><label for="author">アイコンの作者</label></td>
<td><input type="text" id="author" name="author" value="{$selected_author}"{$size}></td></tr>

<tr><td><label for="color">アイコン枠の色</label></td>
<td><input type="text" id="color" name="color" value="{$selected_color}" size="10px" maxlength="7"> (例：#6699CC)</td></tr>

<tr><td><label for="disable">非表示</label></td>
<td><input type="checkbox" id="disable" name="disable" value="on"{$checked}></td></tr>

<tr><td><label for="password">編集パスワード</label></td>
<td><input type="password" id="password" name="password" size="20" value=""></td></tr>

<tr><td colspan="3"><input type="submit" value="変更"></td></tr>
</table>
</form>

EOF;
  }
}

function ConcreteOutputIconList($base_url = 'icon_view'){
  global $ICON_CONF, $USER_ICON, $RQ_ARGS;

  //-- 内部関数の定義 --//
  //検索項目とタイトル、検索条件のセットから選択肢を抽出し、表示します。
  function _outputSelectionByType($type, $caption, $filter = array()){
    global $RQ_ARGS;

    //選択状態の抽出
    $selection_source = $RQ_ARGS->search ? $RQ_ARGS->$type : $_SESSION['icon_view'][$type];
    $selected = empty($selection_source) ? array()
      : (is_array($selection_source) ? $selection_source : array($selection_source));
    $_SESSION['icon_view'][$type] = $selected;
    //PrintData($selection_source, $type);
    if($type == 'keyword') return $selected;

    //選択肢の生成
    $query = "SELECT DISTINCT {$type} FROM user_icon WHERE {$type} IS NOT NULL";
    if(count($filter) > 0) $query .= ' AND ' . implode(' AND ', $filter);
    $list = FetchArray($query);

    //表示
    echo <<<HTML
<td>
<label for="{$type}[]">{$caption}</label><br>
<select name="{$type}[]" size="6" multiple>
<option value="__all__">全て</option>

HTML;
    array_unshift($list, '__null__');
    foreach($list as $name){
      printf(
        '<option value="%s"%s>%s</option>',
        $name,
        in_array($name, $selected) ? ' selected' : '',
        $name == '__null__' ? 'データ無し' : (strlen($name) > 0 ? $name : '空欄')
      );
    }
    echo "</select>\n</td>\n";
    return in_array('__all__', $selected) ? array() : $selected;
  }

  //検索項目と検索値のセットから抽出条件を生成します。
  function _generateInClause($type, $values){
    if(in_array('__null__', $values)) return $type.' IS NULL';

    $safe_values = array();
    foreach($values as $value){
      $safe_values[] = sprintf("'%s'", EscapeStrings($value));
    }
    return $type.' IN ('.implode(',', $safe_values).')';
  }

  //-- ヘッダ出力 --//
  $colspan     = $USER_ICON->column * 2;
  $line_header = '<tr><td colspan="' . $colspan . '">';
  $line_footer = '</td></tr>'."\n";
  $url_header  = '<a href="' . $base_url . '.php?';
  $url_option  = array();
  $query_stack = array();
  $category_list = GetIconCategoryList('category');
  //PrintData($category_list);
  echo '<table class="selector">'."\n<tr>\n";

  //検索条件の表示
  $where_cond = array();
  if($base_url == 'user_manager') $where_cond[] = "disable IS NOT TRUE";
  $selected_categories = _outputSelectionByType('category', 'カテゴリ');
  if(0 < count($selected_categories)){
    foreach($selected_categories as $cat) $url_option[] = "category[]={$cat}";
    $where_cond[] = _generateInClause('category', $selected_categories);
  }

  $selected_appearances = _outputSelectionByType('appearance', '出典');
  if(0 < count($selected_appearances)){
    foreach($selected_appearances as $apr) $url_option[] = "appearance[]={$apr}";
    $where_cond[] = _generateInClause('appearance', $selected_appearances);
  }

  $selected_authors = _outputSelectionByType('author', 'アイコン作者');
  if(0 < count($selected_authors)){
    foreach($selected_authors as $ath) $url_option[] = "author[]={$ath}";
    $where_cond[] = _generateInClause('author', $selected_authors);
  }

  $selected_keywords = _outputSelectionByType('keyword', 'キーワード');
  if(0 < count($selected_keywords)){
    $str = "LIKE '%{$selected_keywords[0]}%'";
    $where_cond[] = "(category {$str} OR appearance {$str} OR author {$str} OR icon_name {$str})";
  }
  else{
    $selected_keywords = array('');
  }
  //PrintData($where_cond);

  $sort_by_name_checked = $RQ_ARGS->sort_by_name ? ' checked' : '';
  echo <<<EOF
</tr>
<tr>
<td colspan="{$colspan}">
<label for="sort_by_name"><input id="sort_by_name" name="sort_by_name" type="checkbox" value="on"$sort_by_name_checked>名前順に並べ替える</label>
<label for="keyword">キーワード：<input id="keyword" name="keyword" type="text" value="{$selected_keywords[0]}"></label>
<input id="search" name="search" type="submit" value="検索">
<input id="page" name="page" type="hidden" value="1">
</td></tr></table>

EOF;

  //検索結果の表示
  if($is_icon_view = empty($RQ_ARGS->room_no)){
    echo <<<HTML
<table>
<caption>
[S] 出典 / [C] カテゴリ / [A] アイコンの作者<br>
アイコンをクリックすると編集できます (要パスワード)
</caption>
<thead>
<tr>

HTML;
  }
  if($is_user_entry = isset($RQ_ARGS->room_no)){
    echo <<<HTML
<table>
<caption>
あなたのアイコンを選択して下さい。
</caption>
<thead>
<tr>

HTML;
  }

  //ユーザアイコンのテーブルから一覧を取得
  $query = 'SELECT * FROM user_icon WHERE ';
  $where_cond[] = 'icon_no > 0';
  $query .= implode(' AND ', $where_cond) . ' ORDER BY ' .
    ($RQ_ARGS->sort_by_name ? 'icon_name, icon_no' : 'icon_no, icon_name');
  if($RQ_ARGS->page != 'all'){
    $limit_min = $ICON_CONF->view * ($RQ_ARGS->page - 1);
    if($limit_min < 1) $limit_min = 0;
    $query .= sprintf(' LIMIT %d, %d', $limit_min, $ICON_CONF->view);
  }
  //PrintData($query);

  $records = FetchAssoc($query);
  $query = 'SELECT COUNT(icon_no) AS total_count FROM user_icon WHERE ';
  $where_cond[] = 'icon_no > 0';
  $query .= implode(' AND ', $where_cond);
  $total_count = FetchResult($query);
  $PAGE_CONF = $ICON_CONF;
  $PAGE_CONF->count = $total_count;
  $PAGE_CONF->url     = $base_url;
  $PAGE_CONF->current = $RQ_ARGS->page;
  $PAGE_CONF->option  = $url_option;
  $PAGE_CONF->attributes  = array('onclick' => 'return "return submit_icon_search(\'$page\');";');
  if($RQ_ARGS->room_no > 0) $PAGE_CONF->option[] = 'room_no=' . $RQ_ARGS->room_no;
  if($RQ_ARGS->icon_no > 0) $PAGE_CONF->option[] = 'icon_no=' . $RQ_ARGS->icon_no;
  echo '<td colspan="' . $colspan . '" class="page-link">';
  //PrintData($PAGE_CONF, 'PAGE_CONF');
  OutputPageLink($PAGE_CONF);
  echo <<<HTML
</td>
</tr>
</thead>
<tbody>
<tr>

HTML;

  //アイコン情報の表示
  $icon_list = array();
  $columns = 0;
  if($is_icon_view){
    $method = 'OutputIconDetailsForIconView';
  }
  elseif($is_user_entry){
    $method = 'OutputIconDetailsForUserEntry';
  }
  else{
    $method = false;
  }
  if($method !== false){
    foreach($records as $icon_info) {
      $method($icon_info, array('cellwidth'=>162));
      if($USER_ICON->column <= ++$columns){
        $columns = 0;
        echo '</tr><tr>';
      }
    }
  }
  echo <<<HTML
</tr>
</tbody>
</table>

HTML;
}

function OutputIconDetailsForIconView($icon_info, $format_info){
  global $ICON_CONF;

  extract($icon_info);
  extract($format_info, EXTR_PREFIX_ALL, 'frm');
  $location = $ICON_CONF->path . '/' . $icon_filename;
  $wrapper_width = $icon_width + 6;
  $info_width = $frm_cellwidth - $icon_width;
  $edit_url = "icon_view.php?icon_no={$icon_no}";
  if($disable > 0) $icon_name = '<s>'.$icon_name.'</s>';
  echo <<<HTML
<td class="icon-details">
<label for="icon_{$icon_no}">
<a href="{$edit_url}" class="icon_wrapper" style="width:{$wrapper_width}px">
<img alt="{$icon_name}" src="{$location}" width="{$icon_width}" height="{$icon_height}" style="border:3px solid {$color};">
</a>
<ul style="width:{$info_width}px;">
<li><a href="{$edit_url}">No. {$icon_no}</a></li>
<li><a href="{$edit_url}">{$icon_name}</a></li>
<li><font color="{$color}">◆</font>{$color}</li>

HTML;

  $data = '';
  if(! empty($appearance)) $data .= '<li>[S]' . $appearance;
  if(! empty($category))   $data .= '<li>[C]' . $category;
  if(! empty($author))     $data .= '<li>[A]' . $author;
  echo $data;
  echo <<<HTML
</ul>
</label>
</td>

HTML;
}

function OutputIconDetailsForUserEntry($icon_info, $format_info){
  global $ICON_CONF;

  extract($icon_info);
  extract($format_info, EXTR_PREFIX_ALL, 'frm');
  $location = $ICON_CONF->path . '/' . $icon_filename;
  $wrapper_width = $icon_width + 6;
  $info_width = $frm_cellwidth - $wrapper_width;
  echo <<<HTML
<td class="icon_details"><label for="icon_{$icon_no}"><img alt="{$icon_name}" src="{$location}" width="{$icon_width}" height="{$icon_height}" style="border:3px solid {$color};"><br clear="all">
<input type="radio" id="icon_{$icon_no}" name="icon_no" value="{$icon_no}"> No. {$icon_no}<br>
<font color="{$color}">◆</font>{$icon_name}</label></td>

HTML;
}

function GetIconCategoryList($type, $limit = '', $query_stack = array()){
  $stack = array('SELECT', 'FROM user_icon WHERE', 'IS NOT NULL GROUP BY', 'ORDER BY icon_no');
  if(count($query_stack) > 0){
    $list = $query_stack;
    $list[] = '';
    $stack[1] .= ' ' . implode(' AND ', $list);
  }
  return FetchArray(implode(" {$type} ", $stack) . $limit);
}
