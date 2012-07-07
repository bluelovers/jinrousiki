<?php
/**
 * オプション入力画面を表示するためのツールを提供します。
 * @author enogu
 */
class OptionForm {
  function GenerateRow(RoomOptionItem $item) {
    if ($item->enabled) {
      $type = $this->GetType($item);
      if (!empty($type)) {
        $item->LoadMessages();
        echo <<<HTML
  <tr>
  <td><label for="{$item->name}">{$item->caption}：</label></td>
  <td>
HTML;
        $this->$type($item);
        echo <<<HTML
  </td>
  </tr>
HTML;
      }
    }
  }

  function GetType(RoomOptionItem $item) {
    if ($item instanceof Option_real_time) {
      return 'realtime';
    }
		else {
			return $item->formtype;
		}
  }

  function HorizontalRule() {
    echo '<tr><td colspan="2"><hr></td></tr>';
  }

  function textbox(RoomOptionItem $item, $type = 'textbox') {
    $footer = isset($item->footer) ? $item->footer : '('.$item->explain.')';
		$footer = LineToBR($footer);
    $size = isset($item->size) ? 'size="'.$item->size.'"' : '';
    echo <<<HTML
<input type="{$type}" id="{$item->name}" name="{$item->formname}" {$size} value="{$item->value}">
<span class="explain">$footer</span>
HTML;
  }
  function password(RoomOptionItem $item) {
    $this->textbox($item, 'password');
  }

  function checkbox(RoomOptionItem $item, $type = 'checkbox') {
    $footer = isset($item->footer) ? $item->footer : '('.$item->explain.')';
		$footer = LineToBR($footer);
    $checked = $item->value ? ' checked' : '';
    echo <<<HTML
<input type="{$type}" id="{$item->name}" name="{$item->formname}" value="{$item->formvalue}"{$checked}>
<span class="explain">{$footer}</span>

HTML;
  }
  function radio(RoomOptionItem $item) {
    $this->checkbox($item, 'radio');
  }

  function select(RoomOptionItem $item) {
    $options = '';
    foreach ($item->GetItems() as $code => $child) {
      if ($child instanceof RoomOptionItem) {
				$child->LoadMessages();
        $label = $child->caption;
      }
      else {
        $label = $child;
      }
      if (!is_string($code)) {
        $code = $label;
      }
      $selected = $code == $item->value ? ' selected' : '';
      $options .= "<option value=\"{$code}\" {$selected}>{$label}</option>\n";
    }
		$explain = LineToBR($item->explain);
    echo <<<HTML
<select id="{$item->name}" name="{$item->formname}">
<optgroup label="{$item->label}">
{$options}</optgroup>
</select>
<span class="explain">({$explain})</span>
HTML;
  }

  function realtime(Option_real_time $item) {
    $checked = $item->value ? ' checked' : '';
		$explain = LineToBR($item->explain);
    echo <<<HTML
<input type="checkbox" id="{$item->name}" name="{$item->formname}" value="on"{$checked}>
<span class='explain'>({$explain}　昼：<input type="text" name="{$item->formname}_day" value="{$item->defaultDayTime}" size="2" maxlength="2">分 夜：<input type="text" name="{$item->formname}_night" value="{$item->defaultNightTime}" size="2" maxlength="2">分)</span>
</td>

HTML;
  }

  function group(RoomOptionItem $item) {
    foreach ($item->GetItems() as $key => $child) {
      $type = $child->formtype;
      if (!empty($type)) {
        $child->LoadMessages();
				if ($type == 'radio') {
					$child->formname = $item->formname;
					$child->formvalue = $key;
				}
        $this->$type($child);
        echo "<br>\n";
      }
    }
  }
}
