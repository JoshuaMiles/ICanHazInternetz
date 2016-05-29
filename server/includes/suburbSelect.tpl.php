<?php
  echo('
    <select name="search-suburb" class="suburb-select-box">
      <option disabled selected value="">Suburb...</option>
   ');
  foreach($db as $hotspot) {
    echo '<option value="'.$hotspot['SUBURB'].'">'.$hotspot['SUBURB'].'</option>';
  }
  echo '</select>';
?>
