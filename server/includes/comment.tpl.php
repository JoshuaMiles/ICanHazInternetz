<?php
  echo('
    <div class="cmt-box">
      <div class="user-img">
        <img src="images/usr-icon.png" alt="user-image">
      </div>
      <div class="cmt-body">
        <strong class="user-name">'. $members['NAME'] .'</strong>
        <span class="muted">'. $reviews['DATE'] .'</span>
        <p class="cmt-text">
          <q>'. $reviews['COMMENT'] .'</q>
        </p>
        <span class="star-rating muted">'. $reviews['RATING'] .'</span>
      </div>
    </div>
  ');
?>
<!-- <div class="cmt-box">
  <div class="user-img">
    <img src="images/usr-icon.png" alt="user-image">
  </div>
  <div class="cmt-body">
    <strong class="user-name">Jane Doe</strong>
    <span class="muted">6 days ago</span>
    <p class="cmt-text"><q>Had a coffee cart right outside the entrance, awesome find.</q></p>
    <span class="star-rating muted">4.5</span>
  </div>
</div> -->
