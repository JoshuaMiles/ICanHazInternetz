// Setup //
var width = window.innerWidth;
var height = window.innerHeight;

// Login //
var login = document.getElementById('user');
var overlay = document.getElementsByClassName('overlay')[0];
var closeBtn = document.getElementsByClassName('btn-close')[0];

// Logout //
var logoutBtn = document.getElementById('logout');

// Search Page //
var includeSuburbs = document.querySelector('#incSuburbs');
var searchBox = document.getElementById('searchBox');
var clearBtn = document.getElementById('clearBtn');


//-- Functions -- //
function showNearbyResults() {
  if (!includeSuburbs.checked) {
    return; //if not checked return nothing
  }
  navigator.geolocation.getCurrentPosition(function(pos){
    console.log(pos);
    //set search buffer radius in here
    return pos; //else return the coords
  });
}

function openLoginModal() {
  overlay.offsetLeft = (width - overlay.offsetWidth /2) + document.body.scrollLeft + "px";
  overlay.offsetTop = (height - overlay.offsetHeight /2) + document.body.scrollTop + "px";
  overlay.style.display = "flex";
}

function closeLoginModal() {
  overlay.style.display = "none";
}

function logout() {
  console.log('logged out');
}

function toggleClearBtn() {
  // Show clear btn if input field is not empty
  clearBtn.style.visibility = (this.value.length) ? "visible" : "hidden";
}

function clearSearch() {
  // Hides the clear btn and clears the input text
  this.style.visibility = "hidden";
  searchBox.value = "";
}


//-- Event Listeners -- //
login.addEventListener("click", openLoginModal, false);
closeBtn.addEventListener("click", closeLoginModal, false);
logout.addEventListener("click", logout, false);
includeSuburbs.addEventListener("change", showNearbyResults, false);
searchBox.addEventListener("keyup", toggleClearBtn, false);
clearBtn.addEventListener("click", clearSearch, false);
