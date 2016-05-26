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
    $qry = $this->db->prepare('SELECT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE FROM hotspots.items LIMIT 9;');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }


  public function reviewItemQuery() {

    $qry = $this->db->prepare('SELECT NAME,EMAIL,RATING FROM hotspots.items, hotspots.reviews INNER JOIN WHERE hotspots.items.EMAIL=hotspots.reviews.EMAIL ');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }

  public function searchQuery($postName, $postAddress, $postSuburb) {

    $qry = $this->db->prepare('SELECT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE,rating FROM hotspots.items,hotspots.reviews WHERE ADDRESS LIKE "' . $postAddress . '" OR items.NAME LIKE "' . $postName . '" OR items.Suburb LIKE "' . $postSuburb . '"');
    $qry->execute();


    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }


  public function insert($postEmail, $hotspotName, $firstName, $rating, $comment) {

    // echo "INSERT INTO hotspots.reviews( email, hotspotName,firstName, reviewDate ,rating, comment ) VALUES $postEmail,$hotspotName,$firstName," . time() . ",$rating,$comment<br>";

    $qry = $this->db->prepare('
          INSERT INTO
          hotspots.reviews(`email`, `hotspotName`, `firstName`, `reviewDate`, `rating`, `comment`)
          VALUES (:postEmail, :hotspotName, :firstName, :reviewDate, :rating, :comment)');

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

  public function getReviewIfRating(){
    //

    $qry = $this->db->prepare('SELECT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE,reviews.rating FROM hotspots.items INNER JOIN reviews ON reviews.hotspotName=items.NAME');
    $qry->execute();

    

  }


  public function getAverageForRating($hotspotName) {



    $qry = $this->db->prepare('SELECT AVG(rating) FROM hotspots.reviews WHERE hotspotName=');
    $qry->execute(array(
      ':hotspotName' => $hotspotName
    ));
    foreach ($qry as $avg) {
      return $avg;
    }
  }


}

?>
