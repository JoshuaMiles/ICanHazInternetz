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
if (includeSuburbs)
  includeSuburbs.addEventListener("change", showNearbyResults, false);
if (searchBox)
  searchBox.addEventListener("keyup", toggleClearBtn, false);
if (clearBtn)
  clearBtn.addEventListener("click", clearSearch, false);


// Login function

function processLogin() {

  var request = new XMLHttpRequest();

  // Setup an request object to be passed using ajax
  var req_object = {
    email : document.querySelector('#username').value,
    password : document.querySelector('#password').value
  };

  function emailIsEmpty() {

    return req_object.email === "";
    // if (req_object.email.value === "") {
    //   // document.getElementById('errors').innerHTML = "Please enter an email address";
    // }
  }

  function passwordIsEmpty() {

    return req_object.password === "";
      // if (req_object.password.value === "") {
      //   document.getElementById('errors').innerHTML = "Please enter a password";
      // }
  }

  request.onreadystatechange = function(){
    switch (request.status){
      case 200:
        console.log('Logged in');
        window.location.href = 'search.php';
        break;
      default:
        if (emailIsEmpty() === true || passwordIsEmpty() === true) {
          document.getElementById('errors').innerHTML = "Please enter an email address and a password";
        } else {
          //document.getElementById('errors').innerHTML = "Incorrect email address or password";
        }
        console.log('Login failed');
    }
  };

  // Setup an request object to be passed using ajax
  // var req_object = {
  //   email : document.querySelector('#username').value,
  //   password : document.querySelector('#password').value
  // };


  // If data OK - post values and reload index.php
  request.open("POST", '/index.php', true);

  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  // send the request to the server
  request.send('email=' + encodeURIComponent(req_object.email) + '&password=' + encodeURIComponent(req_object.password));
}

var form = document.querySelector('.login-form');

form.addEventListener('submit', function(e){
  // Prevents the form from automatically submitting - to check for valid input
  e.preventDefault();
  // Callback
  processLogin();
});
