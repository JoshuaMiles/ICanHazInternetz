<?php
  echo('
    <a href="sampleItem.html" class="review-card">
      <div class="media">
        <input type="hidden" itemprop="latitude" content="'.$hotspot['LATITUDE'].'">
        <input type="hidden" itemprop="longitude" content="'.$hotspot['LONGITUDE'].'">
        <img src="https://maps.googleapis.com/maps/api/streetview?maptype=satellite&heading=151.78&pitch=-0.76&location=' . $hotspot['LATITUDE'] . ',' . $hotspot['LONGITUDE'] . '&zoom=18&size=" alt="hotspot-img">
      </div>
      <div itemscope itemtype="http://schema.org/Place" class="desc">
        <div class="title">' . $hotspot['NAME'] . '</div>
        <div itemprop="address" class="muted">' . $hotspot['ADDRESS'] . '•' . $hotspot['SUBURB'] . '</div>
        <div itemprop="AggregateRating" class="muted">' . $hotspot['RATING'] . '</div>
      </div>
    </a>
  ');
?>
