<?php
class Name {
  private $db;

  function __construct($connection) {
    $this->db = $connection;
  }

  public
  function getName() {

  }

  public
  function setName($postEmail) {
    try {
      $statement = $this->db->prepare('SELECT firstName FROM hotspots.members WHERE email = ?');
      $statement->bindValue(1, $postEmail);
      $statement->execute();
      
      


    } catch (PDOException $e) {
      die("Error! :" . $e->getMessage() . "</br>");
    }
  }

}

?>

