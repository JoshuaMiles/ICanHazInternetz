<?php
  echo('
    <h2 class="article-head hotspot">' .$hotspot['NAME']. '</h2>
    <hr class="article-title-rule">
    <div class="img-item">
      <img src="https://maps.googleapis.com/maps/api/streetview?maptype=satellite&heading=151.78&pitch=-0.76&location=' . $hotspot['LATITUDE'] . ',' . $hotspot['LONGITUDE'] . '&zoom=18&size=800x250" alt="map of wifi hotspot">
      <a href="#userComment" class="cta">
        <i class="material-icons add-review">mode_edit</i>
      </a>
    </div>
  ');
  //Change the map link to the map view rather than streetview
?>
