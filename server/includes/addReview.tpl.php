<div class="cmt-wrapper">
  <div class="cmt-box">
    <div class="cmt-body">
      <strong class="user-name">Your Username</strong>
      <span class="muted">now</span>
      <textarea name="userComment" class="muted" id="userComment" rows="5" placeholder="Your rating helps others find better Wifi."></textarea>
      <span class="star-rating muted">
        <?php
          //add pdo and db stuff here
          echo '<select class="select-rating">';
          foreach($qry as $rating) {
            echo '<option class="star" value="'.$rating['rating'].'">'.$rating['rating'].'</option>';
          }
          echo '</select>';
        ?>

        <ul class="select-rating">
          <a href="#" class="star"></a>
          <a href="#" class="star"></a>
          <a href="#" class="star"></a>
          <a href="#" class="star"></a>
          <a href="#" class="star"></a>
        </ul>
      </span>

      <?php
        if(!isset($_SESSION['username'])) {
          echo('<a href="#" id="user" class="login-notify">Login to add a review</a>');
        }
        echo('<button id="submitReview">Submit comment</button>');
      ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
