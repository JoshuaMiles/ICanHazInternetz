// Setup //
var width = window.innerWidth;
var height = window.innerHeight;

// Login //
// var login = document.getElementById('user');
// var overlay = document.getElementsByClassName('overlay')[0];
// var closeBtn = document.getElementsByClassName('btn-close')[0];

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

// function openLoginModal() {
//   overlay.offsetLeft = (width - overlay.offsetWidth /2) + document.body.scrollLeft + "px";
//   overlay.offsetTop = (height - overlay.offsetHeight /2) + document.body.scrollTop + "px";
//   overlay.style.display = "flex";
// }

// function closeLoginModal() {
//   overlay.style.display = "none";
// }

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
// if (login)
//   login.addEventListener("click", openLoginModal, false);
if (includeSuburbs)
  includeSuburbs.addEventListener("change", showNearbyResults, false);
if (searchBox)
  searchBox.addEventListener("keyup", toggleClearBtn, false);
if (clearBtn)
  clearBtn.addEventListener("click", clearSearch, false);

function processLogin(){

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
    switch (request.status){
      case 200:
        console.log('youre logged in');
        // closeBtn.click();
        break;
      default:
        console.log('you couldnt log in ');
    }
  };

  var req_object = {
    email : document.querySelector('#username').value,
    password : document.querySelector('#password').value
  };
  request.open("POST", '/index.php', true);

  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  // send the request to the server
  request.send('email=' + encodeURIComponent(req_object.email) + '&password=' + encodeURIComponent(req_object.password));
}

// now, you need to hook in to the form's onsubmit, so you can stop it doing whatever it is doing.
var form = document.querySelector('.login-form');//find your form

form.addEventListener('submit', function(e){
  e.preventDefault();
  processLogin();
});
