<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


/*$server = "localhost";
 $username = "rounavza_cakekorner";
$password = "rounavza_cakekorner";
$dbname = "rounavza_cakekorner"; */

$server = "localhost";
$username = "root";
$password = "";
$dbname = "rounavza_cakekorner";

$con = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
