<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$number = $_REQUEST['number'];
$message = $_REQUEST['message'];
date_default_timezone_set('Asia/Kolkata');
$time = date("j F  Y", time());

$mail = new PHPMailer;
try {
    $mail->isSMTP();
    $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tsl'; // ssl is depracated
    $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only



    //Credentials from whom mails needs to be sent
    $mail->Username = "darsh@roundtechsquare.com";
    $mail->Password = 'd@Rshdrh1234darsh';


    //Company mail and name which is displayed at first
    $mail->setFrom("darsh@roundtechsquare.com", "Cake Korner");

    // the address to which mail needed to be sent
    $mail->addAddress("freakyboi1908@gmail.com");


    //Main subject of email 
    $mail->Subject = 'New Enquiry';
    $mail->msgHTML('
        <table>
        <tr>
            <td>
                Name : ' . $name . '
            </td> 
        </tr>
       
        <tr>
            <td>
                Phone : ' . $phone . ' 
            </td>
        </tr>

        <tr>
            <td>
                Message : ' . $message . '
            </td>
        </tr>

        <tr>
            <td>
                Email : ' . $email . '
            </td>
        </tr>

        </table>
        ');

    $mail->AltBody = 'HTML messaging not supported';
    if ($mail->send()) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error"));
    }
} catch (Exception $e) {
    echo json_encode(array("status" => "error"));
}
