<?php 
require './default.php';
$orderID = $con->real_escape_string($_REQUEST['orderID']);
$firstName = $con->real_escape_string($_REQUEST['customerFirstName']);
$lastName = $con->real_escape_string($_REQUEST['customerLastName']);
$phoneNumber = $con->real_escape_string($_REQUEST['phoneNumber']);
$emailAddress = $con->real_escape_string($_REQUEST['email']);
$paymentStatus = $con->real_escape_string($_REQUEST['paymentStatus']);
$occasion = $con->real_escape_string($_REQUEST['occasion']);
$customMessage = $con->real_escape_string($_REQUEST['customMessage']);
$specialInstructions = $con->real_escape_string($_REQUEST['specialInstructions']);
$orderAmount= $con->real_escape_string($_REQUEST['orderAmount']);
if($specialInstructions == ''){
    $specialInstructions = '-';
}else{
    $specialInstructions = $specialInstructions;
}

$query = "UPDATE `orders` SET `customerFirstName`='$firstName',`orderAmount`='$orderAmount',`customerLastName`='$lastName',`customerPhone`='$phoneNumber',
`customerEmail`='$emailAddress',`paymentStatus`='$paymentStatus',`occasion`='$occasion',`customMessage`='$customMessage',`specialInstructions`='$specialInstructions' WHERE `orderID`='$orderID'";
if ($con->query($query) === TRUE) {
    echo "success";
  } else {
    echo "error";
  }
  