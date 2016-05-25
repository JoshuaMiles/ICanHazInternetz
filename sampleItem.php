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
  <!-- Navigation fixed -->
  <?php require_once('server/includes/fixedNav.tpl.php'); ?>

  <main>
    <!-- Login -->
    <?php require_once('server/includes/login.tpl.php'); ?>

    <!-- Content -->
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
                  <?php require_once('server/includes/comment.tpl.php'); ?>
                </div>
              <hr/>

              <h2 id="yourReview" class="reviewTitle yourReview highlight">Your Review</h2>
                <?php require_once('server/includes/addReview.tpl.php'); ?>
            </article>
          </div>
        </div>
      </article>
    </section>
  </main>

    <!-- Footer -->
    <?php require_once('server/includes/footer.tpl.php'); ?>

  <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
