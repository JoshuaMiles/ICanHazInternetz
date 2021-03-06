<?php

/**
 * Class Database
 * Used predominantly for reviews but also creates the PDO used in User
 */
class Database {

  private $db;


  // The constructor is the only object with the ability to create a PDO
  function __construct() {
    $db_name = 'n8598177';
    $db_username = 'n8598177';
    $db_password = 'Em003080#77';
    $db_host = "fastapps04.qut.edu.au";


    try {
      $pdo = new PDO ("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    } catch (PDOException $e) {
      echo $e;
      exit();
    }

    // Attaches the PDO to the object
    $this->db = $pdo;
    return $this->db;
  }

  /**
   * Used to get return the PDO if another class needs to use it
   * @return PDO
   */
  public function getPDO() {
    return $this->db;
  }

  /**
   *
   * Shows 9 hotspots
   * @param $name
   * @param $suburb
   * @param $rating
   */
  public function distinctRecentReviewQuery() {

    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE FROM n8598177.items LIMIT 9;');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }


  //Populates the fields within the individual item page
  public function sampleItemQuery($hotspotName) {

    $qry = $this->db->prepare('SELECT NAME,ADDRESS,SUBURB, LATITUDE,LONGITUDE FROM n8598177.items WHERE NAME = ?');
    $qry->bindParam(1, $hotspotName);
    $qry->execute();

    foreach ($qry as $hotspot) {

      include('server/includes/item.tpl.php');
    }
  }

  // Queries the Database for all of the items
  public function showAll() {
    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE FROM n8598177.items;');
    $qry->execute();
    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }


  public function reviewItemQuery() {

    $qry = $this->db->prepare('SELECT DISTINCT NAME,EMAIL,RATING FROM n8598177.items, n8598177.reviews INNER JOIN WHERE n8598177.items.EMAIL=n8598177.reviews.EMAIL ');
    $qry->execute();

    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }

//The Query used to search the database for a certain element
  public function searchQuery($postName, $postAddress, $postSuburb) {
    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE,rating FROM n8598177.items,n8598177.reviews WHERE ADDRESS LIKE "' . $postAddress . '" OR items.NAME LIKE "' . $postName . '" OR items.Suburb LIKE "' . $postSuburb . '" LIMIT 1');
    $qry->execute();
    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }


  /**
   * Used to insert a comment into the database
   * @param $postEmail
   * @param $hotspotName
   * @param $firstName
   * @param $rating
   * @param $comment
   */

  public function insertComment($postEmail, $hotspotName, $firstName, $currentTime, $rating, $comment) {

    $intTime = (int)$currentTime;
    $intRating = (int)$rating;

    try {
      $sql = $this->db->prepare('INSERT INTO n8598177.reviews( email, hotspotName, firstName, reviewDate, rating, comment ) VALUES (:postEmail, :hotspotName, :firstName, :currentTime, :rating,:comment)');
      if (!$sql) {
        die();
      }
      // Inside of the array each individual argument is inserted into the specfic index value before the command is executed
      $sql->execute(array(
        ":postEmail" => $postEmail,
        ":hotspotName" => $hotspotName,
        ":firstName" => $firstName,
        ":currentTime" => $intTime,
        ":rating" => $intRating,
        ":comment" => $comment
      ));

    } catch (PDOException $e) {
      // if there is an error it is caught and returned
      echo("Error! :" . $e->getMessage() . "</br>");
      return false;
    }
  }


  /**
   * Gets the an item if there is an item attached to it
   */
  public function getReviewIfRating() {
    //Try to get distinct
    $qry = $this->db->prepare('SELECT DISTINCT NAME,ADDRESS,SUBURB,LATITUDE,LONGITUDE,reviews.rating FROM n8598177.items INNER JOIN reviews ON reviews.hotspotName=items.NAME ');
    $qry->execute();
    foreach ($qry as $hotspot) {
      include('server/includes/recentReview.tpl.php');
    }
  }


  /**
   * Gets the review given the hotspot name
   * @param $hotspotName
   */
  public function showReview($hotspotName) {
    $qry = $this->db->prepare('SELECT DISTINCT firstName,reviewDate,rating,comment FROM  reviews WHERE hotspotName = ?');
    $qry->bindParam(1, $hotspotName);
    $qry->execute();
    foreach ($qry as $review) {
      include('server/includes/comment.tpl.php');
    }
  }


  /**
   * Gets all of the suburbs from the items database and adds them to a dropdown menu
   */
  public function populateSuburbDropdown() {

    $qry = $this->db->prepare('SELECT DISTINCT SUBURB FROM n8598177.items;');
    $qry->execute();

    echo('
    <select name="search-suburb" class="suburb-select-box">
      <option disabled selected value="">Suburb...</option>
   ');
    foreach ($qry as $hotspot) {
      echo '<option value="' . $hotspot['SUBURB'] . '">' . $hotspot['SUBURB'] . '</option>';
    }
    echo '</select>';
  }
}

?>
