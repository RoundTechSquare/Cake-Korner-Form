<?php 
require './connection.php';
session_start();
//set default timezone
date_default_timezone_set('America/Los_Angeles');

//timestamps
//start
date_default_timezone_set('America/Los_Angeles');
$timestampCreated = date("j F  Y , g:i:s a", time());
//end

//date
//start
$year = date("Y");
$month = date("m");
$day = date('d');
$dateCreated = $month . '-' . $day . '-' . $year;
//end

$requestPayload = file_get_contents('php://input');
$object = json_decode($requestPayload, true);

$locationID = $con->real_escape_string($object['locationID']);
$customerFirstName = $con->real_escape_string($object['customerFirstName']);
$customerLastName = $con->real_escape_string($object['customerLastName']);
$customerPhone = $con->real_escape_string($object['customerPhone']);
$customerEmail = $con->real_escape_string($object['customerEmail']);
$orderType = $con->real_escape_string($object['orderType']);
$orderPickupDate = $con->real_escape_string($object['orderPickupDate']);
$orderPickupTime = $con->real_escape_string($object['orderPickupTime']);
$orderPickupPerson = $con->real_escape_string($object['orderPickupPerson']);
$deliveryAddress1 = $con->real_escape_string($object['deliveryAddress1']);
$deliveryAppartmentNumber = $con->real_escape_string($object['deliveryAppartmentNumber']);
$deliveryCity = $con->real_escape_string($object['deliveryCity']);
$deliveryState = $con->real_escape_string($object['deliveryState']);
$deliveryZIP = $con->real_escape_string($object['deliveryZIP']);
$cakeTypeID = $con->real_escape_string($object['cakeTypeID']);
$sheetTypeID = $con->real_escape_string($object['sheetTypeID']);
$roundCakeID = $con->real_escape_string($object['roundCakeID']);
$insideRegularFlavors = $con->real_escape_string($object['insideRegularFlavors']);
$insideSpecialFlavors = $con->real_escape_string($object['insideSpecialFlavors']);
$outsideRegularFlavors = $con->real_escape_string($object['outsideRegularFlavors']);
$outsideSpecialFlavors = $con->real_escape_string($object['outsideSpecialFlavors']);
$veganFlavors = $con->real_escape_string($object['veganFlavors']);
$sugarFreeFlavors = $con->real_escape_string($object['sugarFreeFlavors']);
$occasion = $con->real_escape_string($object['occasion']);
$name = $con->real_escape_string($object['name']);
$customMessage = $con->real_escape_string($object['customMessage']);
$cupcakesRequired = $con->real_escape_string($object['cupcakesRequired']);
$cupcakeSize = $con->real_escape_string($object['cupcakeSize']);
$cupcakeRegularFlavors = $con->real_escape_string($object['cupcakeRegularFlavors']);
$cupcakeSpecialFlavors = $con->real_escape_string($object['cupcakeSpecialFlavors']);
$cupcakeQuantity = $con->real_escape_string($object['cupcakeQuantity']);
$signature = $con->real_escape_string($object['signature']);

$query = "INSERT INTO `orders`(`locationID`, `customerFirstName`, `customerLastName`, `customerPhone`, `customerEmail`, `orderType`, `orderPickupDate`, `orderPickupTime`, `orderPickupPerson`, `deliveryAddress1`, `deliveryAppartmentNumber`, `deliveryCity`, `deliveryState`, `deliveryZIP`, `cakeTypeID`, `sheetTypeID`, `roundCakeID`, `insideRegularFlavors`, `insideSpecialFlavors`, `outsideRegularFlavors`, `outsideSpecialFlavors`, `veganFlavors`, `sugarFreeFlavors`, `occasion`, `name`, `customMessage`, `cupcakesRequired`, `cupcakeSize`, `cupcakeRegularFlavors`, `cupcakeSpecialFlavors`, `cupcakeQuantity`, `signature`, `isActive`, `dateCreated`, `timestamp`) VALUES 
('$locationID','$customerFirstName','$customerLastName','$customerPhone','$customerEmail','$orderType','$orderPickupDate','$orderPickupTime','$orderPickupPerson','$deliveryAddress1','$deliveryAppartmentNumber','$deliveryCity','$deliveryState','$deliveryZIP','$cakeTypeID','$sheetTypeID','$roundCakeID','$insideRegularFlavors','$insideSpecialFlavors','$outsideRegularFlavors','$outsideSpecialFlavors','$veganFlavors','$sugarFreeFlavors','$occasion','$name','$customMessage','$cupcakesRequired','$cupcakeSize','$cupcakeRegularFlavors','$cupcakeSpecialFlavors','$cupcakeQuantity','$signature','yes','$dateCreated','$timestampCreated')";

if ($con->query($query) === TRUE) {
    echo "success";
} else {
    echo "error";
}

?>