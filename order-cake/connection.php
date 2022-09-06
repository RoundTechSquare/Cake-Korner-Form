<?php 

$servername = "localhost";
$username = "rounavza_cakekorner";
$password = "rounavza_cakekorner";
$dbname = "rounavza_cakekorner"; 

//  $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "rounavza_cakekorner"; 

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
