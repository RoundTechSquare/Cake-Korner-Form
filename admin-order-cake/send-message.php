<?php
require './connection.php';

require_once '../vendor/autoload.php';


use Twilio\Rest\Client;

$account_sid = "ACab64633b8f0b45f90552c36f102a992a";
$auth_token = "5ae69150746c3ac42c023fa14550521c";

$twilio_number = "+12525011243";
$orderID =   $_SESSION['orderIDRandom'];
$client = new Client($account_sid, $auth_token);
$client->messages->create(
    '+1' . $customerPhone,
    array(
        'from' => $twilio_number,
        'body' => 'Your order #' . $orderID . ' has been successfully placed! Thank you for choosing CakeKorner to be a part of your occasion!'
    )
);
$status = 1;
