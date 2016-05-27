<?php
  //add pdo and db stuff here
  echo('
    <select name="search-rating" class="rating-select-box">
    <option disabled selected value="">Rating...</option>
  ');

  foreach($db as $rating) {
    echo '<option value="'.$rating['rating'].'">'.$rating['rating'].'</option>';
  }
  echo '</select>';
?>
