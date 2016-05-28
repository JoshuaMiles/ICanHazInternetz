<div class="cmt-wrapper">
  <div class="cmt-box">
    <div class="cmt-body">
      <strong class="user-name">  <?php echo $user->getFirstName() ?>  </strong>
      <span class="muted"> <?php echo date('d-m-y'); ?></span>
      <form class="addReviewForm" action="sampleItem.php" method="post">
        <textarea name="userComment" class="muted" id="userComment" rows="5" placeholder="Your rating helps others find better Wifi."></textarea>
          <p id="rating-title">Rating:</p>
          <input type="radio" name="rating-value" id="" class="addRating" value="1">1
          <input type="radio" name="rating-value" id="" class="addRating" value="2">2
          <input type="radio" name="rating-value" id="" class="addRating" value="3">3
          <input type="radio" name="rating-value" id="" class="addRating" value="4">4
          <input type="radio" name="rating-value" id="" class="addRating" value="5">5
          <?php
            if(!isset($_SESSION['logged_in'])) {
              echo('<a href="#" id="user" class="login-notify">Login to add a review</a>');
            } else if(isset($_SESSION['logged_in'])){
              echo('<button id="submitReview">Submit comment</button>');
            }

          ?>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
