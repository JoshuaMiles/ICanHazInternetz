<?php
  include('Database.php');
  $db = new Database();

  // XML file defaults
  $dom = new DOMDocument('1.0');
  $node = $dom->createElement('markers');
  $parnode = $dom->appendChild($node);

  $result = $db->sampleItemQuery();

  if (!$result) {
    die('Invalid query' . mysql_error());
  }

  header("Content-type: text/xml");

  while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['type']);
}

  // foreach($result as $row) {
  //     $node = $dom->createElement('marker');
  //     $newnode = $parnode->appendChild($node);
  //
  //
  //     $newnode->setAttribute('name', $row['NAME']);
  //     $newnode->setAttribute('address', $row['ADDRESS']);
  //     $newnode->setAttribute('suburb', $row['SUBURB']);
  //     $newnode->setAttribute('postcode', $row['POSTCODE']);
  //     $newnode->setAttribute('lat', $row['LATITUDE']);
  //     $newnode->setAttribute('long', $row['LONGITUDE']);
  // }
  echo $dom->saveXML();
?>
