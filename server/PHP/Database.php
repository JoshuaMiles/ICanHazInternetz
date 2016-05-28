<?php

class Database {

  private $db;
  private $hotspotName;

  function __construct() {
    $db_name = 'hotspots';
    $db_username = 'root';
    $db_password = '';
    $db_host = "127.0.0.1:3306";
    try {
      $pdo = new PDO ("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    } catch (PDOException $e) {
      echo $e;
      exit();
    }
    $this->db = $pdo;
    return $this->db;
  }

  public function getPDO() {
    return $this->db;
  }

  /**
   * @param $name
   * @param $suburb
   * @param $rating
   */
  public function distinctRecentReviewQuery() {

    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE FROM hotspots.items LIMIT 9;');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }

  public function getHotspotName(){
    return $this->hotspotName;
  }

  public function sampleItemQuery($hotspotName) {

    $qry = $this->db->prepare('SELECT NAME,ADDRESS,SUBURB, LATITUDE,LONGITUDE FROM hotspots.items WHERE NAME = ?');
    $qry-> bindParam(1,$hotspotName);
    $qry->execute();
//    $data = $qry->fetch();

//    $this->hotspotName = $data['NAME'];

    foreach ($qry as $hotspot) {
      include('server/includes/item.tpl.php');
    }
  }

  public function showAll() {

    $address = '';

    // No limit
    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE FROM hotspots.items;');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }


  public function reviewItemQuery() {

    $qry = $this->db->prepare('SELECT DISTINCT NAME,EMAIL,RATING FROM hotspots.items, hotspots.reviews INNER JOIN WHERE hotspots.items.EMAIL=hotspots.reviews.EMAIL ');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }

  public function searchQuery($postName, $postAddress, $postSuburb) {
    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE,rating FROM hotspots.items,hotspots.reviews WHERE ADDRESS LIKE "' . $postAddress . '" OR items.NAME LIKE "' . $postName . '" OR items.Suburb LIKE "' . $postSuburb . '" LIMIT 1');
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

  public function getReviewIfRating() {
    //
//Try to get distinct
    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE,reviews.rating FROM hotspots.items INNER JOIN reviews ON reviews.hotspotName=items.NAME ');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }

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

  public function populateSuburbDropdown() {

    $qry = $this->db->prepare('SELECT DISTINCT SUBURB FROM hotspots.items;');
    $qry->execute();

    echo('
    <select name="search-suburb" class="suburb-select-box">
      <option disabled selected value="">Suburb...</option>
   ');
    foreach($qry as $hotspot) {
      echo '<option value="'.$hotspot['SUBURB'].'">'.$hotspot['SUBURB'].'</option>';
    }
    echo '</select>';
  }
}
?>
