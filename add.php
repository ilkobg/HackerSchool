<?php 
$xmlDoc = new DOMDocument();
$xmlDoc->load("PlaceSearchResponse.xml");
$mysql_hostname = "localhost"; // Example : localhost
$mysql_user     = "wordpress";
$mysql_password = "MyWPPassword";
$mysql_database = "wordpress";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");

$xmlObject = $xmlDoc->getElementsByTagName('result');
$itemCount = $xmlObject->length;

for ($i=0; $i < $itemCount; $i++){

	

     $lat = $xmlObject->result($i)->getElementsByTagName('lat')->result(0)->childNodes->result(0)->nodeValue;
     $lng  = $xmlObject->result($i)->getElementsByTagName('lng')->result(0)->childNodes->result(0)->nodeValue;
     $sql   = "INSERT INTO `points` (lat, lng) VALUES ('$lat', '$lng')";
     mysql_query($sql);
     print "Finished Item $title n<br/>";
	
}

?>
