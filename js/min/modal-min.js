var login = document.getElementById('user');
var overlay = document.getElementsByClassName('overlay')[0];
var closeBtn = document.getElementsByClassName('btn-close')[0];

var width = window.innerWidth;
var height = window.innerHeight;

login.addEventListener("click", function() {

  overlay.offsetLeft = (width - overlay.offsetWidth /2) + document.body.scrollLeft + "px";
  overlay.offsetTop = (height - overlay.offsetHeight /2) + document.body.scrollTop + "px";

  overlay.style.display = "flex";
}, false);

closeBtn.addEventListener("click", function() {
  overlay.style.display = "none";
}, false);


