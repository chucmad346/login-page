<?php
    
    $dbhostName = "localhost"; 
    $dbuserName = "chucmad";  
    $dbPassword = "mad/1/fam";  
    $dbName = "madfam database";   
    $con = mysqli_connect($dbhostName, $dbuserName, $dbPassword, $dbName);
    if(!$con){
        die("failed to connect");
    }
?>