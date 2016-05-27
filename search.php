<?php
  include("server/PHP/Database.php");
  $db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>routr - results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD7rWGqvYfHMPhTMETa0JlKwAo6nA-Zu8"
          type="text/javascript"></script>
  <script type="text/javascript">
  function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-27.4710, 153.0234),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file - and path
      downloadUrl("server/PHP/createMapMarkers.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var suburb = markers[i].getAttribute("suburb");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("long")));
          var html = "<b>" + name + "</b> <br/>" + address;
          //var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }
    function doNothing() {}

  </script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 <body onload="load()">
<!-- Navigation fixed -->
<?php include('server/includes/fixedNav.tpl.php'); ?>

<main>
  <?php //include('server/includes/login.tpl.php'); ?>

  <section class="results">
    <div class="searchbar-container">

      <div class="searchbar-items">
        <i class="material-icons icon-search">search</i>

        <form action="search.php" method="GET" id="searchWifiForm">
          <span class="input-wrapper">
            <input type="search" name="searchBox" id="searchBox" placeholder="Search">
            <i class="material-icons icon-clear" id="clearBtn">clear</i>
          </span>
      </div>
      <hr class="line">
      <div class="options">
        <div class="options-wrapper">

          <?php include('server/includes/searchRating.tpl.php'); ?>


          <?php $db->populateSuburbDropdown(); ?>

          <input type="Submit" value="Search" id="btn-backup-search">
          </form>
        </div>
      </div>
    </div>

    <div class="container pull-down">
      <article class="results-container">
        <div class="container">
          <div class="review-cards">
            <?php
//            include("server/PHP/Database.php");
            //Checking if the requests are set, if they are not than the variable is set to empty to prevent an error when inserting the data
            $searchBox = isset($_GET["searchBox"]) ? $_GET["searchBox"] : '';
            $suburb = isset($_GET["search-suburb"]) ? $_GET["search-suburb"] : '';
            $rating = isset($_GET["search-rating"]) ? $_GET["search-rating"] : '';
            $address = "";
//            $db = new Database();


            if (!isset($_GET["searchBox"])) {
              $db->showAll();
            } else {
              $db->searchQuery($searchBox, $address, $suburb, $rating);
              if (isset($_GET['search-rating'])) {
                $reviewAndRating = $db->getReviewIfRating();
              }
            }


            //            $rating = $db->getAverageForRating($searchBox);


            $searchBox = isset($_GET["searchBox"]) ? $_GET["searchBox"] : '';
            $suburb = isset($_GET["search-suburb"]) ? $_GET["search-suburb"] : '';


            $rating = isset($_GET["search-rating"]) ? $_GET["search-rating"] : '';
            $address = "";

            if (!isset($_GET["searchBox"])) {
              $showAll = $db->showAll($db);
            } else {
              $test = $db->searchQuery($searchBox, $address, $suburb, $rating);
            }


//            $rating = $db->getAverageForRating($searchBox);

//            $reviewAndRating = $db->getReviewIfRating();
            ?>
          </div>
        </div>
      </article>

      <div id="map" style="width: 800px; height: 500px"></div>


      <?php include('server/includes/initialState.tpl.php'); ?>

      <?php //include('server/includes/noResultsFound.tpl.php'); ?>

    </div>
  </section>
</main>

<!-- Footer -->
<?php include('server/includes/footer.tpl.php'); ?>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
