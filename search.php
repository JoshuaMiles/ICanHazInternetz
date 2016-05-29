<?php
  include("server/PHP/requireMaster.php");
  session_start();
  $user = User::fromSession();
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
  <script type="text/javascript" src="js/map.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body onload="load()">
<!-- Navigation fixed -->
<?php include('server/includes/fixedNav.tpl.php'); ?>

<main>
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

          <input type="checkbox" name="incSuburbs" id="incSuburbs">
          <span class="muted white">Include surrounding suburbs</span>
          <!-- Generates the rating dropdown -->
          <?php include('server/includes/searchRating.tpl.php'); ?>
          <!-- Used to populate the suburb dropdown -->
          <?php $database->populateSuburbDropdown(); ?>
          <input type="Submit" value="Search" id="btn-backup-search">
          </form>
        </div>
      </div>
    </div>

    <div class="container pull-down">

      <?php include('server/includes/initialState.tpl.php'); ?>

      <article class="results-container">
        <div class="container">
          <div class="review-cards">
            <?php
              //Checking if the requests are set, if they are not than the variable is set to empty to prevent an error when inserting the data
              $searchBox = isset($_GET["searchBox"]) ? $_GET["searchBox"] : '';
              $suburb = isset($_GET["search-suburb"]) ? $_GET["search-suburb"] : '';
              $rating = isset($_GET["search-rating"]) ? $_GET["search-rating"] : '';
              $address = "";

              $database->searchQuery($searchBox, $address, $suburb, $rating);

              // Populates the page with all of the items or all searched
              if (!isset($_GET["searchBox"])) {
                $database->showAll();
              } else if (isset($_GET['search-rating'])) {
                // $reviewAndRating = $db->getReviewIfRating();
              }
            ?>
          </div>
        </div>
      </article>
    </div>
  </section>
</main>

<!-- Footer -->
<?php include('server/includes/footer.tpl.php'); ?>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
