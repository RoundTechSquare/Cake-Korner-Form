<?php

require './default.php';
if (!isset($_POST['newsletterEmail'])) {
    header("Location: ./index.php");
}
require_once('./connection.php');

$newsletterEmail = $_POST['newsletterEmail'];
date_default_timezone_set('America/Los_Angeles');
$current_time = date("j F  Y , g:i:s a", time());

$sql = "SELECT * FROM `newsletter_subscriptions` WHERE `email` = '$newsletterEmail'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "Email Address already exists";
} else {
    $sql = "INSERT INTO `newsletter_subscriptions`(`email`, `timestamp`) VALUES ('$newsletterEmail','$current_time')";
    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "error";
    }
}
