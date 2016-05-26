<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>routr - results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD7rWGqvYfHMPhTMETa0JlKwAo6nA-Zu8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <!-- <body onload="load()"> for google maps --> 
    <!-- Navigation fixed -->
    <?php include('server/includes/fixedNav.tpl.php'); ?>

  <main>
    <?php include('server/includes/login.tpl.php'); ?>

    <section class="results">
      <div class="searchbar-container">

        <div class="searchbar-items">

          <i class="material-icons icon-search">search</i>
          <form action="search.php" method="post" id="searchWifiForm">
            <span class="input-wrapper">
              <input type="search" name="searchBox" id="searchBox" placeholder="Search">
              <i class="material-icons icon-clear" id="clearBtn">clear</i>
            </span>
          </form>
        </div>
        <hr class="line">
        <div class="options">
          <div class="options-wrapper">
            <input type="checkbox" name="incSuburbs" id="incSuburbs">
            <span class="muted white">Include surrounding suburbs</span>

            <select name="search-rating" class="rating-select-box">
              <option value="" disabled selected>Rating...</option>
              <option value="1">1 - generate with PHP</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>

            <select name="search-suburb" class="suburb-select-box">
              <option value="" disabled selected>Suburb...</option>
              <option value="1">Generate with PHP</option>
              <option value="2">Grange</option>
              <option value="3">Ashgrove</option>
              <option value="4">Toowong</option>
              <option value="5">Mt Gravatt</option>
            </select>

            <input type="submit" value="Search" id="btn-backup-search">
          </div>
        </div>
      </div>
        <div class="container pull-down">

          <!-- <article class="results-container">
            <div class="container">
              <div class="review-cards">
                <a href="sampleItem.html" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Grange Library Wifi</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">79 Evelyn Street • Grange</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Mt Coot-tha Botanic Gardens Library Wifi</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Administration Building • Toowong</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Post Office Square</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Queen &amp; Adelaide St • Brisbane City</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Garden City Library Wifi</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Garden City Shopping Centre, Corner Logan &amp; Kessels Road • Mt Gravatt</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Kenmore Library Wifi</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Kenmore Village Shopping Centre, Brookfield Road • Kenmore</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Toowong Library Wifi</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Toowong Village Shopping Centre, Sherwood Road • Toowong</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Wynnum Library Wifi</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Wynnum Civic Centre, 66 Bay Terrace • Wynnum</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Rocks Riverside Park</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Counihan Rd • Seventeen Mile Rocks</div>
                  </div>
                </a>
                <a href="#" class="review-card">
                  <div class="media"><img src="images/test-img.png" alt="placeholder img"></div>
                  <div class="desc">
                    <div class="title">Inala Library Wifi</div>
                    <div class="muted">Rating 1 out of 5</div>
                    <div class="muted">Inala Shopping Centre, Corsair Ave • Inala</div>
                  </div>
                </a>
              </div>
            </div>
          </article> -->

          <?php include('server/includes/initialState.tpl.php'); ?>

          <?php include('server/includes/noResultsFound.tpl.php'); ?>



          If results found:
          <h1>SHOW MAP WITH RESULTS - as pop up?</h1>
          <h2>Then card layout or table underneath</h2>

        </div>
    </section>
  </main>

  <!-- Footer -->
  <?php include('server/includes/footer.tpl.php'); ?>

  <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
