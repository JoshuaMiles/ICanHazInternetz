<?php
echo('
    <a href="sampleItem.php?name=' . $hotspot['NAME'] . '" class="review-card">
      <div class="media">
        <input type="hidden" itemprop="latitude" content="' . $hotspot['LATITUDE'] . '">
        <input type="hidden" itemprop="longitude" content="' . $hotspot['LONGITUDE'] . '">
        <img src="https://maps.googleapis.com/maps/api/streetview?maptype=satellite&pitch=-0.76&location=' . $hotspot['LATITUDE'] . ',' . $hotspot['LONGITUDE'] . '&zoom=18&size=300x250" alt="hotspot-img">
      </div>
      <div itemscope itemtype="http://schema.org/Place" class="desc">
        <div class="title">' . $hotspot['NAME'] . '</div>
        <div itemprop="address" class="muted">' . $hotspot['ADDRESS'] . ' • ' . $hotspot['SUBURB'] . '</div>
      </div>
    </a>
  ');
?>
