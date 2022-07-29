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
// $orderPickupPerson = $con->real_escape_string($object['orderPickupPerson']);
$deliveryAddress1 = $con->real_escape_string($object['deliveryAddress1']);
$deliveryAppartmentNumber = $con->real_escape_string($object['deliveryAppartmentNumber']);
$deliveryCity = $con->real_escape_string($object['deliveryCity']);
$deliveryState = $con->real_escape_string($object['deliveryState']);
$deliveryZIP = $con->real_escape_string($object['deliveryZIP']);

$cakeType = $con->real_escape_string($object['cakeType']);
$cakeShape = $con->real_escape_string($object['cakeShape']);
$cakeSizeType = $con->real_escape_string($object['cakeSizeType']);
$cakeFlavors = $con->real_escape_string($object['cakeFlavors']);
$cakeFlavorsType = $con->real_escape_string($object['cakeFlavorsType']);

$occasion = $con->real_escape_string($object['occasion']);
$otherOccasion = $con->real_escape_string($object['otherOccasion']);
$customMessage = $con->real_escape_string($object['customMessage']);
$specialInstructions = $con->real_escape_string($object['specialInstructions']);
$inspirationUploadDesign = $object['inspirationUploadDesign'];
$imagesUploadStatus = $con->real_escape_string($object['imagesUploadStatus']);
$cupcake = $con->real_escape_string($object['cupcake']);
$cupCakeSizeOption = $con->real_escape_string($object['cupCakeSizeOption']);

$cupCakeType = $con->real_escape_string($object['cupCakeType']);
$cupCakeFlavors = $con->real_escape_string($object['cupCakeFlavors']);
$cupCakeQuantity = $con->real_escape_string($object['cupCakeQuantity']);
$signature = $con->real_escape_string($object['signature']);

$query = "INSERT INTO `orders`(`locationID`,`cakeSizeType`, `customerFirstName`, `customerLastName`, `customerPhone`, `customerEmail`, `orderType`, `orderPickupDate`, `orderPickupTime`,  `deliveryAddress1`, `deliveryAppartmentNumber`, `deliveryCity`, `deliveryState`, `deliveryZIP`, `cakeType`, `cakeShape`, `cakeFlavors`, `cakeFlavorsType`, `occasion`, `otherOccasion`,  `customMessage`, `specialInstructions`,  `cupcake`, `cupCakeSizeOption`, `cupCakeType`, `cupCakeFlavors`, `cupCakeQuantity`, `signature`, `isActive`, `dateCreated`, `timestamp`)
                       VALUES ('$locationID','$cakeSizeType', '$customerFirstName', '$customerLastName', '$customerPhone', '$customerEmail', '$orderType', '$orderPickupDate', '$orderPickupTime', '$deliveryAddress1', '$deliveryAppartmentNumber', '$deliveryCity', '$deliveryState', '$deliveryZIP', '$cakeType', '$cakeShape', '$cakeFlavors', '$cakeFlavorsType', '$occasion', '$otherOccasion', '$customMessage', '$specialInstructions',  '$cupcake', '$cupCakeSizeOption', '$cupCakeType', '$cupCakeFlavors', '$cupCakeQuantity', '$signature', 'Yes', '$dateCreated', '$timestampCreated')  ";

$generate_order_id = random_int(100000, 999999);
$_SESSION['orderIDRandom'] = $generate_order_id;
if ($con->query($query) === TRUE) {

    $last_id = $con->insert_id;
    if ($imagesUploadStatus == "Yes") {
        $imageFilePath = "";
        for ($index = 0; $index < count($object['inspirationUploadDesign']); $index++) {
            $fileIndex = ($index + 1);

            $img = $object['inspirationUploadDesign'][$index]; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
            $extension = explode('/', mime_content_type($object['inspirationUploadDesign'][$index]))[1];
            $img = str_replace('data:image/' . $extension . ';base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            file_put_contents("../assets/images/inspiration-upload/" . "inspiration-upload-" . "$last_id" . "-" . "$fileIndex" . "." . $extension . "", $data);
            if ($index == 0) {
                $imageFilePath = "./assets/images/inspiration-upload/" . "inspiration-upload-" . "$last_id" . "-" . "$fileIndex" . "." . $extension . "";
            } else {
                $imageFilePath = $imageFilePath . ',' . "./assets/images/inspiration-upload/" . "inspiration-upload-" . "$last_id" . "-" . "$fileIndex" . "." . $extension . "";
            }
        }


        $sql = "UPDATE `orders` SET `inspirationUploadDesign`='$imageFilePath',`orderConfirmationCode`='$generate_order_id' WHERE `orderID`=$last_id";

        if ($con->query($sql) === true) {
            require './send-message.php';
        } else {
            $status = -1;
        }
    } else {

        $sql = "UPDATE `orders` SET `orderConfirmationCode`='$generate_order_id' WHERE `orderID`=$last_id";

        if ($con->query($sql) === true) {
            require './send-message.php';
        } else {
            $status = -1;
        }
    }
} else {
    $status = -1;
}
if ($status == 1) {
    echo "success";
} else {
    echo "error";
}
