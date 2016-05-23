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
    <header>
      <div class="branding"> <!--wrapper -->
        <div id="brand-group">
          <div class="logo"></div>
          <h1>routr</h1>
          <p>find your local wifi</p>
        </div>
      </div>
  </header> <!-- header -->
  <nav id="nav">
    <div class="navbar">
      <div class="brand"><a href="index.php">routr</a></div>
      <ul>
        <li id="active"><a href="#" id="user"><i class="material-icons user-icon">person</i><strong> Login</strong></a></li>
        <li><a href="registration.php">Register</a></li>
        <li><a href="search.php">Find Wifi</a></li>
      </ul>
    </div>
  </nav> <!-- navigation -->

  <main>
    <?php require_once('server/includes/login.tpl.php'); ?> <!-- login popup modal -->

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

          <h1>Change this to pull reviewed hotspots ordered by date limit 6 or 9</h1>


        </div>
      </article>
    </section>
  </main> <!-- content area -->

  <footer>
    <section class="container">
      <div class="brand">
        <a href="index.html"><img src="images/routr-logo-sml.png" alt="logo"/></a>
        <p class="title">routr</p>
      </div>
        <nav class="footer">
          <ul>
            <li><a href="search.php">Find Wifi</a></li>
            <li><a href="registration.php">Register</a></li>
            <li><a href="userProfile.php">Your Profile</a></li>
          </ul>
        </nav>
    </section>
    <section class="copyright">
      <article>Copyright 2016</article>
    </section>
  </footer> <!-- footer -->

  <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
