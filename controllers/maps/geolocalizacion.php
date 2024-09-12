<?php

include('../../db/db.php');

$link = connect();

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("marcadores");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table

$query = "SELECT * FROM posicionbuzones2 WHERE 1";
$result = mysqli_query($link,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error($link));
}

header("Content-type: text/xml;charset=UTF-8");

// Iterate through the rows, adding XML nodes for each

while ($row = mysqli_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marcador");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name",$row['nombre']);
  $newnode->setAttribute("address", $row['direccion']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['tipo']);
  $newnode->setAttribute("id", $row['id']);
}

echo $dom->saveXML();
