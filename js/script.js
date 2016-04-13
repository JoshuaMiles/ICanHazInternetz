var login = document.getElementById('user');
var overlay = document.getElementsByClassName('overlay')[0];
var closeBtn = document.getElementsByClassName('btn-close')[0];

login.addEventListener("click", function() {
  overlay.style.display = "flex";
}, false);

closeBtn.addEventListener("click", function() {
  overlay.style.display = "none";
});
