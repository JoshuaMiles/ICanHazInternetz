<?php $firstName = $user->getFirstName() ?>

<div class="cmt-wrapper">
  <div class="cmt-box">
    <div class="cmt-body">
      <strong class="user-name">  <?php echo $firstName; ?>  </strong>
      <span class="muted"> <?php echo date('d-m-y'); ?></span>
      <form class="addReviewForm" action="" method="post">
        <textarea name="comment" class="muted" id="userComment" rows="5"
                  placeholder="Your rating helps others find better Wifi."></textarea>
        <p name="userRating" id="rating-title">Rating:</p>
        <input type="radio" name="radio" class="addRating" value="1">1
        <input type="radio" name="radio" id="" class="addRating" value="2">2
        <input type="radio" name="radio" id="" class="addRating" value="3">3
        <input type="radio" name="radio" id="" class="addRating" value="4">4
        <input type="radio" name="radio" id="" class="addRating" value="5">5

        <?php
          if (!isset($_SESSION['logged_in'])) {
            echo('<a href="index.php" id="user" class="login-notify">Login to add a review</a>');
          } else if (isset($_SESSION['logged_in'])) {
            echo('<button name="submit" type="submit" id="submitReview">Submit comment</button>');

          }
        ?>
        <div class="clearfix"></div>
      </form>
      <?php
        if (isset($_POST['submit'])) {
          $selectedRating = $_POST['radio'];
          $currentTime = time();
          // Inserts review into database
          $database->insertComment($_SESSION['email'], $hotspotName, $firstName, $currentTime, $selectedRating, $_POST['comment']);
          // Auto refresh
          header("Refresh:0");
        }
      ?>
    </div>
  </div>
</div>
