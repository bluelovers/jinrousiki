function output_diff_time(time){
  var i = time.split(",");
  var server = new Date(i[0], i[1] - 1, i[2], i[3], i[4], i[5]);
  var local  = new Date();
  document.write(Math.floor((local - server) / 1000));
}
