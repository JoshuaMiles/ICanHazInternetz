<?php
  echo('

    <div class="cmt-box">
      <div class="user-img">
        <img src="images/usr-icon.png" alt="user-image">
      </div>
      <div class="cmt-body">
        <strong class="user-name">'. $review['firstName'] .'</strong>
        <span class="muted">' . gmdate("d-m-y",$review['reviewDate']) .'</span>
        <p class="cmt-text">
          <q>'. $review['comment'] .'</q>
        </p>
        <span class="star-rating muted">'. $review['rating'] .'</span>
      </div>
    </div>
  ');
?>

