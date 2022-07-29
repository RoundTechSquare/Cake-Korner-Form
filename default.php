<?php 

require './connection.php';
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


//session details Start
session_start();
//session details End
