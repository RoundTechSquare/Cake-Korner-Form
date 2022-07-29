<?php
require './connection.php';

require_once '../vendor/autoload.php';


use Twilio\Rest\Client;

$account_sid = "<account SID>";
$auth_token = "<auth Token>";

$twilio_number = "<Twilio number>";
$orderID =   $_SESSION['orderIDRandom'];
$client = new Client($account_sid, $auth_token);
$client->messages->create(
    '+91' . $customerPhone,
    array(
        'from' => $twilio_number,
        'body' => 'Your order #' . $orderID . ' has been successfully placed! Thank you for choosing CakeKorner to be a part of your occasion!'
    )
);
$status = 1;
