<?php
  //add pdo and db stuff here
  echo('
    <select name="search-suburb" class="suburb-select-box">
    <option disabled selected value="">Suburb...</option>
  ');

  foreach($qry as $hotspot) {
    echo '<option value="'.$hotspot['SUBURB'].'">'.$hotspot['SUBURB'].'</option>';
  }
  echo '</select>';
?>
