<?php 
 
  include 'connect.php';
   
  $createmaptable = 'CREATE TABLE IF NOT EXISTS maps (
  ID int AUTO_INCREMENT,
  PRIMARY KEY (ID),
  centerLat decimal (10,8),
      centerLong decimal (10,7),
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
  array(1, 42.642856, 23.338207, 10), 
  array(2, -33.98, 18.424, 10), 
  array(3, 57.48, -4.225, 12)
); 
 
$mappoints = array(
  array(1, 42.6569463, 23.3528502, "TU Sofia"), 
  array(1, 42.6713643, 23.2933343, "Telebid Pro Ltd."), 
  array(1, 42.6704525, 23.3487647, "MusalaSoft"), 
  array(1, 42.6935118, 23.3325988, "Sofia University"), 
  array(1, 42.6875921, 23.3330531, "National Stadium Vasil Levski"), 
  array(1, 42.6943839, 23.324006, "National Theathre Ivan Vazov"), 
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
