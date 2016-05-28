<div class="cmt-wrapper">
  <div class="cmt-box">
    <div class="cmt-body">

      <strong class = "user-name">  <?php echo $user->getFirstName() ?>  </strong>
<!--///TODO show the data which is currently now-->
      <span class="muted"> <?php echo  date('d-m-y'); ?></span>
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
