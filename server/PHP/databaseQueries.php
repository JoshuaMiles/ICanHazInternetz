<?php

class Database {

  function __construct($connection) {
    $this->db = $connection;
  }


  /**
   * @param $name
   * @param $suburb
   * @param $rating
   */
  public function sampleItemQuery() {

    $address = '';


    $qry = $this->db->prepare('SELECT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE FROM hotspots.items LIMIT 9;'); // :name , address = :address, suburb = :suburb, rating = :rating');
    $qry->execute();

    echo '<article class="results-container">';
    echo '<div class="container">';
    echo '<div class="review-cards">';


    foreach ($qry as $hotspot) {

      echo '<a itemscope itemtype="http://schema.org/GeoCoordinates" href="sampleItem.html" class="review-card">';
      echo '<div class="media">';
      echo '<input type ="hidden" itemprop="latitude" content="' . $hotspot['LATITUDE'] . '">';
      echo '<input type ="hidden" itemprop="longitude" content="' . $hotspot['LONGITUDE'] . '">';
      echo '<img  src="https://maps.googleapis.com/maps/api/streetview?maptype=satellite&heading=151.78&pitch=-0.76&location=' . $hotspot['LATITUDE'] . ',' . $hotspot['LONGITUDE'] . '&zoom=18&size=300x200" alt="hotspot-img">';
      echo '</div>';
      echo '<div itemscope itemtype="http://schema.org/Place" class="desc">';
      // Change to database values from sql query
      echo '<div class"title">' . $hotspot['NAME'] . '</div>';
//                echo '<div itemprop="AggregateRating" class"muted">' . $hotspot['RATING'] . '</div>';

      echo '<div itemprop="address" class"muted">' . $hotspot['ADDRESS'] . ',' . $hotspot['SUBURB'] . '</div>';
//                echo '<div class"muted">' . $hotspot['SUBURB'] .  '</div>';
      echo '</div>';
      echo '</a>';
    }
    echo '</div>';
    echo '</article>';

  }

  public function reviewItemQuery() {


    $qry = $this->db->prepare('SELECT NAME,EMAIL,RATING FROM hotspots.items, hotspots.reviews INNER JOIN WHERE hotspots.items.EMAIL=hotspots.reviews.EMAIL ');  // :name , address = :address, suburb = :suburb, rating = :rating');

    $qry->execute(); // run query


    foreach ($qry as $hotspot) {
      echo '<article class="results-container">';
      echo '<div class="container">';
      echo '<div class="review-cards">';
      echo '<a href="sampleItem.html" class="review-card">';
      echo '<div class="media">';
      echo '<img src="images/img-test.png" alt="hotspot-img">';
      echo '</div>';
      echo '<div class="desc">';
      // Change to database values from sql query
      echo '<div class"title">' . $hotspot['NAME'] . '</div>';
      echo '<div class"muted">' . $hotspot['RATING'] . '</div>';
      echo '<div class"muted">' . $hotspot['ADDRESS'] . $hotspot['SUBURB'] . '</div>';
      echo '</div>';
      echo '</a>';
      echo '</div>';
      echo '</article>';
    }


  }


  public function insert($postEmail, $hotspotName, $firstName, $rating, $comment) {

    echo "INSERT INTO hotspots.reviews( email, hotspotName,firstName, reviewDate ,rating, comment ) VALUES $postEmail,$hotspotName,$firstName," . time() . ",$rating,$comment<br>";

    $qry = $this->db->prepare('
        INSERT INTO
        hotspots.reviews(`email`, `hotspotName`, `firstName`, `reviewDate`, `rating`, `comment`)
        VALUES (:postEmail, :hotspotName, :firstName, :reviewDate, :rating, :comment)');  // :name , address = :address, suburb = :suburb, rating = :rating');

    $qry->execute(array(
      ':postEmail' => $postEmail,
      ':hotspotName' => $hotspotName,
      ':firstName' => $firstName,
      ':reviewDate' => time(),
      ':rating' => $rating,
      ':comment' => $comment
    ));

    print_r($this->db->errorInfo());


  }


  public function getAverageForRating($hotspotName) {


    $qry = $this->db->prepare('SELECT AVG(rating) FROM hotspots.reviews WHERE hotspotName=');

    $qry->execute(array(
      ':hotspotName' => $hotspotName
    ));

    foreach ($qry as $avg) {
      echo $avg;
    }


  }


}

?>


