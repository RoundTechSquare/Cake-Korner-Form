<?php 
require './connection.php';
$username = $con->real_escape_string($_REQUEST['username']);
$email = $con->real_escape_string($_REQUEST['email']);
$password = password_hash($con->real_escape_string($_REQUEST['password']), PASSWORD_DEFAULT);

// DEFAULT TIMEZONE
date_default_timezone_set('America/Los_Angeles');
// TIMESTAMP
date_default_timezone_set('America/Los_Angeles');
$timestampCreated = date("j F  Y , g:i:s a", time());

// DATE CREATED
$year = date("Y");
$month = date("m");
$day = date('d');
$dateCreated = $month . '-' . $day . '-' . $year;

$insertQuery = "INSERT INTO `admin_users`(`username`, `email`, `password`, `dateCreated`, `timestamp`) VALUES ('$username','$email','$password','$dateCreated','$timestampCreated')";

if ($con->query($insertQuery) == TRUE) {
    echo "Success";
} else {
    echo "Error";
}

$con->close();

?>