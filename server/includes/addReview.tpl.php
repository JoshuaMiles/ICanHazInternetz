<div class="cmt-wrapper">
  <div class="cmt-box">
    <div class="cmt-body">

      <strong class = "user-name">  <?php echo $user->getFirstName() ?>  </strong>
<!--///TODO show the data which is currently now-->
      <span class="muted"> <?php echo  date('d-m-y'); ?></span>
      <textarea name="userComment" class="muted" id="userComment" rows="5" placeholder="Your rating helps others find better Wifi."></textarea>
      <span class="star-rating muted">
        <select name="select-rating" id="" class="select-rating">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </span>

      <?php
        if(!isset($_SESSION['logged_in'])) {
          echo('<a href="#" id="user" class="login-notify">Login to add a review</a>');
        } else if(isset($_SESSION['logged_in'])){
          echo('<button id="submitReview">Submit comment</button>');
        }

      ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
