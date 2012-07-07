function submit_icon_search(page){
  if(window.document.forms.icon_search){
    window.document.forms.icon_search.page.value = page;
    window.document.forms.icon_search.submit();
  }
  else{
    window.document.forms[0].page.value = page;
    window.document.forms[0].submit();
  }
  return false;
}
