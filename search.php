<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>routr - results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD7rWGqvYfHMPhTMETa0JlKwAo6nA-Zu8"
          type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- <body onload="load()"> for google maps -->
<!-- Navigation fixed -->
<?php include('server/includes/fixedNav.tpl.php'); ?>

<main>
  <?php //include('server/includes/login.tpl.php'); ?>

  <section class="results">
    <div class="searchbar-container">

      <div class="searchbar-items">
        <i class="material-icons icon-search">search</i>
        <form  action="search.php" method="GET" id="searchWifiForm">
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

          Replace with includes for dropdowns

          <?php //include('server/includes/searchRating.tpl.php'); ?>

          <!-- <select name="search-rating" class="rating-select-box">
            <option value="" disabled selected>Rating...</option>
            <option value="1">1 - generate with PHP</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select> -->

          <?php //include('server/includes/suburbSelect.tpl.php'); ?>

          <!-- <select name="search-suburb" class="suburb-select-box">
            <option value="" disabled selected>Suburb...</option>
            <option value="1">Generate with PHP</option>
            <option value="Grange">Grange</option>
            <option value="3">Ashgrove</option>
            <option value="4">Toowong</option>
            <option value="5">Mt Gravatt</option>
          </select> -->

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
              include("server/PHP/databaseQueries.php");
              include("server/php/pdoMaster.php");
              $db = new Database(getPDO());
              $searchBox =isset( $_GET["searchBox"]) ? $_GET["searchBox"] : '';
              $suburb = isset( $_GET["search-suburb"]) ? $_GET["search-suburb"] : '';



              $rating =  isset( $_GET["search-rating"]) ? $_GET["search-rating"] : '';
              $address = "";

              if(!isset( $_GET["searchBox"])){
                $showAll = $db->showAll($db);
              } else {
                $test = $db->searchQuery($searchBox, $address , $suburb , $rating);
              }


              $rating = $db->getAverageForRating($searchBox);

              $reviewAndRating = $db->getReviewIfRating();
            ?>
          </div>
        </div>
      </article>

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
