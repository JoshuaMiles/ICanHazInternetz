<?php
  // Load database connection
  require('Database.php');
  $db = new Database();

  $pdo = $db->getPDO();

  // Start XML file, create parent node
  $dom = new DOMDocument("1.0");
  $node = $dom->createElement("markers");
  $parnode = $dom->appendChild($node);

  // Select all the rows in the markers table
  $query = "SELECT * FROM hotspots.items";
  $result = $pdo->prepare($query);
  $result->execute();
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }

  header("Content-type: text/xml");

  // Iterate through the rows, adding XML nodes for each
  foreach($result as $row) {
    $node = $dom->createElement('marker');
    $newnode = $parnode->appendChild($node);


    $newnode->setAttribute('name', $row['NAME']);
    $newnode->setAttribute('address', $row['ADDRESS']);
    $newnode->setAttribute('suburb', $row['SUBURB']);
    $newnode->setAttribute('postcode', $row['POSTCODE']);
    $newnode->setAttribute('lat', $row['LATITUDE']);
    $newnode->setAttribute('long', $row['LONGITUDE']);
  }

  echo $dom->saveXML();
?>
