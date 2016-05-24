<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>routr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
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
        <div class="brand"><a href="index.html">routr</a></div>
        <ul>
            <li id="active"><a href="#" id="user"><i class="material-icons user-icon">person</i><strong>
                        Elliott</strong></a></li> <!--userProfile.html -->
            <li><a href="registration.html">Register</a></li>
            <li><a href="search.html">Find Wifi</a></li>
        </ul>
    </div>
</nav> <!-- navigation -->

<main>
    <div class="overlay">
        <div class="modal">
            <p class="btn-close">
                <i class="material-icons">clear</i>
            </p>
            <h2 class="article-head">Login</h2>
            <hr class="article-title-rule">

            <form action="submit" class="login-form">
                <div class="input-group">
                    <input type="text" name="name" id="username" class="lbl-highlight">
                    <label for="firstName">First Name</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="lbl-highlight">
                    <label for="password">Password</label>
                </div>
                <a href="registration.html" class="login-notify muted">Don't have an account? Click here</a>
                <input type="submit" name="login" value="Sign in" id="login">
            </form>

        </div>
    </div> <!-- login overlay -->

    <section>
        <article class="search-index">
            <h2 class="article-head">Find Wifi</h2>
            <hr class="article-title-rule">
            <form method="get" action="results.html">
                <div class="input-group">
                    <input type="search" id="searchbar-home">
                    <label for="search">Search by name, suburb or rating...</label>
                </div>
                <button type="submit" id="search-btn">Search</button>
            </form>
        </article>
        <article class="profile-reviews">
            <svg class="arc-svg" viewBox="0 0 1440 69" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path
                        d="M1440,69.0315425 L1440,0 L0,0 L0,69.0315425 C233.264983,25.0227325 473.943868,2 720,2 C966.056132,2 1206.73502,25.0227325 1440,69.0315425 Z"
                        id="Combined-Shape"></path>
                </g>
            </svg>
            <h2 class="article-head">Recent Places</h2>
            <hr class="article-title-rule">
            <?php
            include('server/php/pdoMaster.php');

            include('server/php/databaseQueries.php');



            $pdo = getPDO();
            $result = $pdo->prepare('SELECT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE FROM hotspots.items LIMIT 9;');
            $result->execute();



            echo '<article class="results-container">';
            echo '<div class="container">';
            echo '<div class="review-cards">';
            $anAverage = new Database(getPDO());
            $anAverage->getAverageForRating('7th Brigade Park');
            foreach ($result as $hotspot) {

                echo '<a href="sampleItem.html" class="review-card">';
                echo '<div class="media">';
                echo '<img src="https://maps.googleapis.com/maps/api/streetview?maptype=satellite&heading=151.78&pitch=-0.76&location=' . $hotspot['LATITUDE'] . ',' . $hotspot['LONGITUDE'] . '&zoom=18&size=300x200" alt="hotspot-img">';
                echo '</div>';
                echo '<div class="desc">';
                // Change to database values from sql query
//                echo '<div class"title">' . $hotspot['NAME'] . '</div>';
//                echo '<div class"muted">' . $hotspot['RATING'] . '</div>';
//                echo '<div class"title">' .  . '</div>';
//                echo '<div class"muted">' . $hotspot['ADDRESS'] . $hotspot['SUBURB'] .  '</div>';
                echo '<div class"muted">' . $hotspot['SUBURB'] .  '</div>';
                echo '</div>';
                echo '</a>';

            }
            echo '</div>';
            echo '</article>';

            ?>

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
                <li><a href="search.html">Find Wifi</a></li>
                <li><a href="registration.html">Register</a></li>
                <li><a href="userProfile.html">Your Profile</a></li>
            </ul>
        </nav>
    </section>
    <section class="copyright">
        <article>Copyright 2016</article>
    </section>
</footer> <!-- footer -->
<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/geo.js"></script>
</body>
</html>