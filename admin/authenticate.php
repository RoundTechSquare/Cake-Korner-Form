<?php 
require './connection.php';
session_start();
if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    $query = "SELECT * FROM `admin_users` WHERE `username` = '$username'";
    $result = $con->query($query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $password = $row['password'];
            $adminID = $row['adminID'];

            if ($pwd == $password || password_verify($pwd, $password)) {
                $_SESSION['admin'] = "admin";
                echo "Success";
            } else {
                $_SESSION['adminError'] = "adminError";
                echo "Error";
            }
        }
    } else {
        echo "Error";
    }
}
?>