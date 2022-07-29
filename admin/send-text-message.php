<?php

require_once '../vendor/autoload.php';


use Twilio\Rest\Client;

$account_sid = "<account SID>";
$auth_token = "<auth Token>";

$twilio_number = "<Twilio number>";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    '+918758899701',
    array(
        'from' => $twilio_number,
        'body' => 'Your order #aaasd has been successfully placed! Thank you for choosing CakeKorner to be a part of your occasion!'
    )
);
$status = 1;
