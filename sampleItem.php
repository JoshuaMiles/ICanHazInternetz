<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>routr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
<!--removed header to gain more screen real estate, and better view of search results -->
  <nav id="fixed-nav">
    <div id="fixed-container">
      <div class="brand"><a href="index.php">routr</a></div>
      <ul>
        <li id="active"><a href="#" id="user"><i class="material-icons user-icon">person</i><strong> Login</strong></a></li>
        <li><a href="registration.php">Register</a></li>
        <li><a href="search.php">Find Wifi</a></li>
      </ul>
    </div>
  </nav> <!-- navigation -->

  <main>
    <?php require_once('server/includes/login.tpl.php'); ?>

    <section>
      <article>
        <div class="container">
          <div class="item-container">
            <h2 class="article-head hotspot">Grange Public Library Wifi</h2>
            <hr class="article-title-rule">
            <div class="img-item">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14165.6641786731!2d153.00885146977544!3d-27.42514189999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b9159d688d2a2d7%3A0x83b7b25eb32b49eb!2sBrisbane+City+Council+-+Grange+Library!5e0!3m2!1sen!2sau!4v1462080935000" width="800" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
              <a href="#userComment" class="cta"><i class="material-icons add-review">mode_edit</i></a>
            </div>
            <article class="comments-section">
              <h2 class="reviewTitle recommendedReviews"><span class="highlight">Recommend Reviews</span> for Grange Public Library Wifi</h2>
              <div class="comment-wrapper">
                <div class="cmt-box">
                  <div class="user-img">
                    <img src="images/user-img-1.png" alt="user-image">
                  </div>
                  <div class="cmt-body">
                    <strong class="user-name">John Doe</strong>
                    <span class="muted">3 days ago</span>
                    <p class="cmt-text"><q>This place had awesome bean bags!</q></p>
                    <span class="star-rating muted">4.5</span>
                  </div>
                </div>

                <div class="cmt-box">
                  <div class="user-img">
                    <img src="images/user-img-2.png" alt="user-image">
                  </div>
                  <div class="cmt-body">
                    <strong class="user-name">Jane Doe</strong>
                    <span class="muted">6 days ago</span>
                    <p class="cmt-text"><q>Had a coffee cart right outside the entrance, awesome find.</q></p>
                    <span class="star-rating muted">4.5</span>
                  </div>
                </div>
              </div>
              <hr/>
              <h2 id="yourReview" class="reviewTitle yourReview highlight">Your Review</h2>
              <div class="cmt-wrapper">
                <div class="cmt-box">
                  <div class="cmt-body">
                    <strong class="user-name">Your Username</strong>
                    <span class="muted">now</span>
                    <textarea name="userComment" class="muted" id="userComment" rows="5" placeholder="Your rating helps others find better Wifi."></textarea>
                    <span class="star-rating muted">
                      <ul class="select-rating">
                        <a href="#" class="star"></a>
                        <a href="#" class="star"></a>
                        <a href="#" class="star"></a>
                        <a href="#" class="star"></a>
                        <a href="#" class="star"></a>
                      </ul>
                    </span>
                    <a href="#" id="user" class="login-notify">Login to add a review</a>
                    <button id="submitReview">Submit comment</button>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </article>
    </section>
  </main>

  <footer>
    <section class="container">
      <div class="brand">
        <a href="index.php"><img src="../images/routr-logo-sml.png" alt="logo"/></a>
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
