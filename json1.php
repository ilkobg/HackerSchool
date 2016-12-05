<?php

    $host = "localhost";
    $username = "wordpress";
    $password = "MyWPPassword";
    $dbname = "wordpress";
    $con = mysqli_connect($host, $username, $password, $dbname) or die('Error in Connecting: ' . mysqli_error($con));


    $json = file_get_contents('./city.list.us.json'); 

    $data = json_decode($json, true);
    $data = $data['elements'];


     foreach ($data as $row) {
      
	$mapID = 1;
        $name = $row["name"];
    	$lng = $row["coord"]["lon"];
    	$lat = $row["coord"]["lat"];
        

$sql = "INSERT INTO mappoints (mapID, pointLat, pointLong, pointText)
    VALUES( $mapID, $lat, $lng, '$name')";
    if( ! mysqli_query($con,$sql) )
    {
        die ('Error : ' . mysqli_error($con));
    }


   }

    
      mysqli_close($con);
?>
