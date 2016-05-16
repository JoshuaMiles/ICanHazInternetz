var includeSuburbs = document.querySelector('#surroundSuburbs');

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

includeSuburbs.addEventListener("change", showNearbyResults);
