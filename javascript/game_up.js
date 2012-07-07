function auto_clear(){
  if(self.document.send){
    self.document.send.say.value = '';
    self.document.send.say.focus();
    self.document.send.font_type.options[1].selected = true;
  }
}
function set_focus(){
  parent.frames['up'].document.forms['send'].say.focus();
}
function reload_game(){
  document.forms['reload_game'].submit();
}
function reload_middle_frame(){
  parent.frames['middle'].document.forms['reload_middle_frame'].submit();
}
