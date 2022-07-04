<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


/*$server = "localhost";
 $username = "rounavza_cakekornerwebsite";
$password = "rounavza_cakekornerwebsite";
$dbname = "rounavza_cakekornerwebsite"; */

$server = "localhost";
$username = "root";
$password = "";
$dbname = "rounavza_cakekorner";

$con = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
