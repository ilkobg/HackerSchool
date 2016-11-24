<?php 
 
  include 'connect.php';
   
  $createmaptable = 'CREATE TABLE IF NOT EXISTS maps (
  ID int AUTO_INCREMENT,
  PRIMARY KEY (ID),
  centerLat decimal (5,3),
      centerLong decimal (6,3),
      zoom  tinyint
  );';
 
  if(!$result = $con->query($createmaptable)){
    die('There was an error running the query [' . $con->error . ']');
  }
 
  $createmappointtable = 'CREATE TABLE IF NOT EXISTS mappoints (
  ID int AUTO_INCREMENT,
  PRIMARY KEY (ID),
      mapID int, 
  pointLat decimal (5,3),
      pointLong decimal (6,3),
      pointText text
  );';
 
  if(!$result = $con->query($createmappointtable)){
    die('There was an error running the query [' . $con->error . ']');
  }




	$maps = array(
  array(1, 45.52, -122.682, 9), 
  array(2, -33.98, 18.424, 10), 
  array(3, 57.48, -4.225, 12)
); 
 
$mappoints = array(
  array(1, 45.249, -122.897, "Champoeg State Park"), 
  array(1, 45.374, -121.696, "Mount Hood"), 
  array(2, -33.807, 18.366, "Robben Island"), 
  array(2, -33.903, 18.411, "Cape Town Stadium"), 
  array(3, 57.481, -4.225, "Inverness Bus Station"), 
  array(3, 57.476, -4.226, "Inverness Castle"), 
  array(3, 57.487, -4.139, "The Barn Church") 
);
 
foreach ($maps as $ind) {
  $newline = "INSERT INTO maps 
    (ID, centerLat, centerLong, zoom) 
    VALUES ($ind[0], $ind[1], $ind[2], $ind[3])";
 
  if(!$insertmap = $con->query($newline)){
    die('There was an error running the query [' . $con->error . ']');
  }
}
 
foreach ($mappoints as $indpt) {
  $newline = "INSERT INTO mappoints 
    (mapID, pointLat, pointLong, pointText) 
    VALUES ($indpt[0], $indpt[1], $indpt[2], '$indpt[3]')";
 
  if(!$insertmap = $con->query($newline)){
    die('There was an error running the query [' . $con->error . ']');
  }
}
 
?>
