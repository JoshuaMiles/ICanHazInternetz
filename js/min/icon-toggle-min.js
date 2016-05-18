var searchBox = document.getElementById('searchBox');
var clearBtn = document.getElementById('clearBtn');


searchBox.addEventListener('keyup', function() {
  // Show clear button if input is not empty
  clearBtn.style.visibility = (this.value.length) ? "visible" : "hidden";
}, false);

clearBtn.addEventListener('click', function() {
  // Clear text in input field
  this.style.visibility = "hidden";
  searchBox.value = "";
}, false);


