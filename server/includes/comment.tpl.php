<?php
echo('
    <div class="cmt-box">
      <div class="user-img">
        <img src="images/usr-icon.png" alt="user-image">
      </div>
      <div class="cmt-body">
      <strong itemprop="author" class="user-name">' . $review['firstName'] . '</strong>
        <!-- gmdate used to convert unix time, previously stored at comment creation, to the associated date  -->
        <span class="muted">' . gmdate("d-m-y", $review['reviewDate']) . '</span>
        <p class="cmt-text">
          <q>' . $review['comment'] . '</q>
        </p>
        <div itemscope itemtype="http://schema.org/Rating">
          <span itemprop="ratingValue" class="star-rating muted">Rating: ' . $review['rating'] . '/5</span>
        </div>
    </div>
  ');
?>
