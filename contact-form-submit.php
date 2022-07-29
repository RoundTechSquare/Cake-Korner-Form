<?php


if(!isset($_POST['name']))
{
  header("Location: ./index.php");
}
  require_once('./connection.php');
 
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];
date_default_timezone_set('America/Los_Angeles');
$current_time = date("j F  Y , g:i:s a", time());


$sql = "INSERT INTO `contact_form`(`name`, `email`, `phone`, `message`, `timestamp`) VALUES (
  '$name','$email','$phone','$message','$current_time')";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "error";
}
