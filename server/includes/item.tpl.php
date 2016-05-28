<?php
  echo('
    <h2 class="article-head hotspot">' .$_GET['name']. '</h2>
    <hr class="article-title-rule">
    <div class="img-item">
//  Shows the map of the current item
      <img src="https://maps.googleapis.com/maps/api/staticmap?maptype=mapview&center=' . $hotspot['LATITUDE'] . ',' . $hotspot['LONGITUDE'] . '&zoom=18&size=800x250" alt="map of wifi hotspot">
      <a href="#userComment" class="cta">
        <i class="material-icons add-review">mode_edit</i>
      </a>
    </div>
  ');
?>
