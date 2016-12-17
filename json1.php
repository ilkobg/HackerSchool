<?php

    $host = "localhost";
    $username = "wordpress";
    $password = "MyWPPassword";
    $dbname = "wordpress";
    $con = mysqli_connect($host, $username, $password, $dbname) or die('Error in Connecting: ' . mysqli_error($con));


    $st = mysqli_prepare ($con, 'INSERT INTO mappoints (mapID, pointLat, pointLong, pointText) VALUES (?, ?, ?, ?) ') or die(mysqli_error($con));

    mysqli_stmt_bind_param($st, 'idds', $mapID , $lat, $lng, $name) or die (mysqli_error($st));

    $json = file_get_contents('./city.list.us.json');


    $data = json_decode($json, true);
    $data = $data['elements'];

     foreach ($data as $row) {
      
	$mapID = 1;
        $name = $row["name"];
    	$lng = $row["coord"]["lon"];
    	$lat = $row["coord"]["lat"];
        

	//$st = "INSERT INTO mappoints (mapID, pointLat, pointLong, pointText) VALUES( $mapID, $lat, $lng, $name)";
     mysqli_stmt_execute($st);

   }

    
      mysqli_close($con);
?>
