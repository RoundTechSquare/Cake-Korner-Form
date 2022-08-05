<?php require './default.php';
$locationID = $con->real_escape_string($_REQUEST['locationID']);
$filterDatePicker = $con->real_escape_string($_REQUEST['filterDatePicker']);

$startDate = $con->real_escape_string($_REQUEST['startDate']);
$endDate = $con->real_escape_string($_REQUEST['endDate']);
if ($filterDatePicker == '' || $filterDatePicker == ' ' || $filterDatePicker == 'undefined' || $locationID == '' || $locationID == ' ' || $locationID == 'undefined') {
    echo "error";
} else {
    if ($locationID == '1') {
        if (isset($_SESSION['filterDatePickerLocationOne'])) {
            if ($filterDatePicker == '' || $filterDatePicker == ' ' || $filterDatePicker == 'undefined') {

                unset($_SESSION['filterDatePickerLocationOne']);
                unset($_SESSION['locationOneQuery']);
                unset($_SESSION['locationOneStartDate']);
                unset($_SESSION['locationOneEndDate']);
                echo "error";
            } else {
                $_SESSION['filterDatePickerLocationOne'] = $filterDatePicker;
                $_SESSION['locationOneStartDate'] = $startDate;
                $_SESSION['locationOneEndDate'] = $endDate;
                $_SESSION['locationOneQuery'] = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `dateCreated` BETWEEN '$startDate' AND '$endDate' AND `orders`.`locationID` = '1'";
                echo "success";
            }
        } else {
            if ($filterDatePicker == '' || $filterDatePicker == ' ' || $filterDatePicker == 'undefined') {
                echo "error";
            } else {
                $_SESSION['filterDatePickerLocationOne'] = $filterDatePicker;
                $_SESSION['locationOneStartDate'] = $startDate;
                $_SESSION['locationOneEndDate'] = $endDate;
                $_SESSION['locationOneQuery'] = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `dateCreated` BETWEEN '$startDate' AND '$endDate' AND `orders`.`locationID` = '1'";
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
