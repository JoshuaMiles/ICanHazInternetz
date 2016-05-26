<?php
  // Change this to our db connection
  include('config.php');

  // XML file defaults
  $dom = new DOMDocument('1.0');
  $node = $dom->createElement('markers');
  $parnode = $dom->appendChild($node);

  $query = "SELECT * FROM wifihotspots";
  $result = $pdo->query($query);

  if (!$result) {
    die('Invalid query' . mysql_error());
  }

  header("Content-type: text/xml");

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