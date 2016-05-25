<?php include_once('server/PHP/databaseQueries.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>routr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
  <!-- Header -->
  <?php require_once('server/includes/header.tpl.php'); ?>

  <!-- Navigation -->
  <?php require_once('server/includes/nav.tpl.php'); ?>

  <!-- Content -->
  <main>
    <!-- Login -->
    <?php require_once('server/includes/login.tpl.php'); ?>

    <section>
      <article class="search-index">
        <h2 class="article-head">Find Wifi</h2>
        <hr class="article-title-rule">
        <form method="POST" action="search.php">
          <div class="input-group">
            <input type="search" name="searchInput" id="searchbar-home">
            <label for="search">Search by name, suburb or rating...</label>
          </div>
          <button type="submit" id="search-btn">Search</button>
        </form>
      </article>

      <article class="profile-reviews">
        <svg class="arc-svg" viewBox="0 0 1440 69" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <path d="M1440,69.0315425 L1440,0 L0,0 L0,69.0315425 C233.264983,25.0227325 473.943868,2 720,2 C966.056132,2 1206.73502,25.0227325 1440,69.0315425 Z" id="Combined-Shape"></path>
          </g>
        </svg>
        <h2 class="article-head">Recent Places</h2>
        <hr class="article-title-rule">

        <div class="container">
          <div class="review-cards">
            <?php
              // include('server/php/pdoMaster.php');
              // $pdo = getPDO();
              // $query = new Database($pdo);
              //
              // $query->sampleItemQuery();
            ?>
        </div>
      </article>
    </section>
  </main> <!-- content area -->

    <!-- Footer -->
    <?php require_once('server/includes/footer.tpl.php'); ?>

  <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>