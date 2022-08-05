<?php require './default.php';
$locationID = $con->real_escape_string($_REQUEST['locationID']);
$datePicked = $con->real_escape_string($_REQUEST['datePicked']);
if ($datePicked == '' || $datePicked == ' ' || $datePicked == 'undefined' || $locationID == '' || $locationID == ' ' || $locationID == 'undefined') {
    echo "error";
} else {
    if ($locationID == '1') {
        $_SESSION['DateLocationOne'] = $locationID;
        if (isset($_SESSION['dateFilterDateLocationOne'])) {
            if ($datePicked == '' || $datePicked == ' ' || $datePicked == 'undefined') {

                unset($_SESSION['dateFilterDateLocationOne']);
                echo "error";
            } else {
                $_SESSION['dateFilterDateLocationOne'] = $datePicked;
                echo "success";
            }
        } else {
            if ($datePicked == '' || $datePicked == ' ' || $datePicked == 'undefined') {
                echo "error";
            } else {
                $_SESSION['dateFilterDateLocationOne'] = $datePicked;
                echo "success";
            }
        }
    } else if ($locationID == '2') {
        $_SESSION['DateLocationTwo'] = $locationID;
        if (isset($_SESSION['dateFilterDateLocationTwo'])) {
            if ($datePicked == '' || $datePicked == ' ' || $datePicked == 'undefined') {
                echo "error";
                unset($_SESSION['dateFilterDateLocationTwo']);
            } else {
                $_SESSION['dateFilterDateLocationTwo'] = $datePicked;
                echo "success";
            }
        } else {
            if ($datePicked == '' || $datePicked == ' ' || $datePicked == 'undefined') {
                echo "error";
            } else {
                $_SESSION['dateFilterDateLocationTwo'] = $datePicked;
                echo "success";
            }
        }
    }
}
