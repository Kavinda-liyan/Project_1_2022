<?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "crystaltech";

    //create connection...
    $dbConnection = new mysqli($host, $dbUsername, $dbPassword, $dbname)  or die(mysqli_error($dbConnection));;
?>