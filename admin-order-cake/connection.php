<?php

$servername = "localhost";
$username = "rounavza_cakekorner_testing";
$password = "rounavza_cakekorner_testing";
$dbname = "rounavza_cakekorner_testing"; 

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "rounavza_cakekorner";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
