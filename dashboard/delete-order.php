<?php
require './connection.php';
session_start();
if (isset($_SESSION['admin']) && isset($_REQUEST['orderID']) && isset($_REQUEST['locationID'])) {
    $query = "UPDATE `orders` SET `isActive` = 'no' WHERE `orderID` = '$_REQUEST[orderID]'";
    if ($con->query($query) === TRUE) {
        if ($_REQUEST['locationID'] == "1") {
            header("location: ./artesia-orders.php?message=Success");
        } else if ($_REQUEST['locationID'] == "2") {
            header("location: ./san-diego-orders.php?message=Success");
        }
    } else {
        if ($_REQUEST['locationID'] == "1") {
            header("location: ./artesia-orders.php?message=Error");
        } else if ($_REQUEST['locationID'] == "2") {
            header("location: ./san-diego-orders.php?message=Error");
        }
    }
} else {
    header("location: ./logout.php");
}
?>