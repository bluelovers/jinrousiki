function output_shared_room(id, display) {
  var message  = 'Now loading ... ';
  document.getElementById(display).innerHTML = message;

  var xml_http = false;
  try {
    xml_http = new ActiveXObject('Microsoft.XMLHTTP');
  } catch (e) {
    xml_http = false;
  }
  if (! xml_http && typeof XMLHttpRequest != 'undefined') {
    xml_http = new XMLHttpRequest();
  }
  if (! xml_http) {
    document.getElementById(display).innerHTML = message + 'failed';
    return false;
  }

  xml_http.open('GET', 'shared_room.php?id=' + id);
  xml_http.onreadystatechange = function() {
    if (xml_http.readyState == 4 && xml_http.status == 200) {
      document.getElementById(display).innerHTML = xml_http.responseText;
    }
  }
  xml_http.send(null);
}
