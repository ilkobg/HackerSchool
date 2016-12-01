<?php

    $host = "localhost";
    $username = "wordpress";
    $password = "MyWPPassword";
    $dbname = "wordpress";
    $con = mysqli_connect($host, $username, $password, $dbname) or die('Error in Connecting: ' . mysqli_error($con));


    $st = mysqli_prepare($con, 'INSERT INTO points(  name, lat,   lng) VALUES (?, ?, ?)') or die(mysqli_error($con));

 
    mysqli_stmt_bind_param($st, 'sdd', $name, $lat, $lng);


    
    //$filename = 'http://bulk.openweathermap.org/sample/city.list.us.json.gz';

   /// $filename = '/home/ilko/Desktop/json/city.list.us.json';
    $json = file_get_contents('./city.list.us.json');   

  //  $data = array ();
    $data = json_decode($json, true);

 print_r ($data);
   foreach ((array)$data as $row) {
        // get city details
	//$id = NULL;
        $name = $row["name"];
    	$lng = $row["coord"]["lon"];
    	$lat = $row["coord"]["lat"];
        
/*$sql = "INSERT INTO points (name, lat, lon)
    VALUES( '$name', $lat, $lon)";
    if(!mysqli_query($con,$sql))
    {
        die('Error : ' . mysqli_error($con));
    }
*/
$st = "INSERT INTO points (  name, lat, lng)
    //VALUES( '$name', '$lat', '$lng')";
        mysqli_stmt_execute($st);
    }
    
   
    mysqli_close($con);
?>
