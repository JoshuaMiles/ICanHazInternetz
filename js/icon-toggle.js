var searchBox = document.getElementById('searchBox');
// var clearBtn = document.getElementById('clearBtn');

//
// searchField.addEventListener('keyup', function() {
//   clearBtn.style.visibility = "visible";
// }, false);
//
// clearBtn.addEventListener('click', function() {
//   searchField.innerHTML = "text";
// }, false);

(function() {
  var clearBtn = document.getElementById('clearBtn');
  
  searchBox.onkeyup = function() {
    // Show clear button if text value not empty
    clearBtn.style.visibility = (this.value.length) ? "visible" : "hidden";
  };

  // Hide the clear button on click, and reset the input value
  clearBtn.onclick = function() {
    this.style.visibility = "hidden";
    searchBox.value = "";
  };
})();
