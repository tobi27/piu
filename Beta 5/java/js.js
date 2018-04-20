var height = $(window).height();
var heightmargin = (height/2)-(361.800/2);
document.getElementById('topsign').style.marginTop = heightmargin + "px";
var heightmargin2 = (height/2)-(361.800/2);
document.getElementById('site').style.marginTop = heightmargin2 + "px";
document.getElementById('wb').style.width = "150px";
var registerheight = (height/2)-(336/2);
document.getElementById('register').style.marginTop = registerheight + "px";
document.getElementById('registeroverlay').style.top = "-" + height + "px";
var i = 1;var logindivwidth = document.getElementById("logindiv").offsetWidth + 10;
document.getElementById('logindiv').style.marginRight = "-" + logindivwidth + "px";
function login() {
  document.getElementById( "log" ).setAttribute( "onClick", "javascript: loginabort();");
  document.getElementById('logindiv').style.marginRight = "0px";
  document.getElementById('logindiv').style.marginRight = "0px";
}
function loginabort() {
  document.getElementById( "log" ).setAttribute( "onClick", "javascript: login();");
  document.getElementById('logindiv').style.marginRight = "-" + logindivwidth + "px";
}
function search() {
  document.getElementById('search').style.width = "25%";
  document.getElementById('search').style.paddingLeft = "10px";
  $("#searchicon").hide(250);
}
function register() {
  document.getElementById('registeroverlay').style.top = "0";
  document.getElementById('logindiv').style.marginRight = "-" + logindivwidth + "px";
  document.getElementById( "log" ).setAttribute( "onClick", "javascript: login();");
}
function registerabort(){
  document.getElementById('registeroverlay').style.top = "-" + height + "px";
}
function chroma() {
    rgb();
}
function rgb() {
  window.setTimeout(chroma, 10);
  var color = Math.floor(Math.random() * 3);
  if (color == 0) {
    document.getElementById('nav').style.backgroundColor = "rgb(255,0,0)";
    document.getElementById('content').style.backgroundColor = "rgb(255,0,0)";
    document.getElementById('site').style.backgroundColor = "rgb(255,0,0)";
  }
  if (color == 1) {
    document.getElementById('nav').style.backgroundColor = "rgb(0,255,0)";
    document.getElementById('content').style.backgroundColor = "rgb(0,255,0)";
document.getElementById('site').style.backgroundColor = "rgb(0,255,0)";
  }
  if (color == 2) {
    document.getElementById('nav').style.backgroundColor = "rgb(255,255,0)";
    document.getElementById('content').style.backgroundColor = "rgb(255,255,0)";
    document.getElementById('site').style.backgroundColor = "rgb(255,255,0)";
  }
}
