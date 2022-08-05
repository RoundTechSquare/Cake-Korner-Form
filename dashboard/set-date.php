<?php require './default.php';
$locationID = $con->real_escape_string($_REQUEST['locationID']);

$filterOption = $con->real_escape_string($_REQUEST['filterOption']);


if ($filterOption == 'updateFilters') {
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
            if (isset($_SESSION['filterDatePickerLocationTwo'])) {
                if ($filterDatePicker == '' || $filterDatePicker == ' ' || $filterDatePicker == 'undefined') {

                    unset($_SESSION['filterDatePickerLocationTwo']);
                    unset($_SESSION['locationTwoQuery']);
                    unset($_SESSION['locationTwoStartDate']);
                    unset($_SESSION['locationTwoEndDate']);
                    echo "error";
                } else {
                    $_SESSION['filterDatePickerLocationTwo'] = $filterDatePicker;
                    $_SESSION['locationTwoStartDate'] = $startDate;
                    $_SESSION['locationTwoEndDate'] = $endDate;
                    $_SESSION['locationTwoQuery'] = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `dateCreated` BETWEEN '$startDate' AND '$endDate' AND `orders`.`locationID` = '2'";
                    echo "success";
                }
            } else {
                if ($filterDatePicker == '' || $filterDatePicker == ' ' || $filterDatePicker == 'undefined') {
                    echo "error";
                } else {
                    $_SESSION['filterDatePickerLocationTwo'] = $filterDatePicker;
                    $_SESSION['locationTwoStartDate'] = $startDate;
                    $_SESSION['locationTwoEndDate'] = $endDate;
                    $_SESSION['locationTwoQuery'] = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `dateCreated` BETWEEN '$startDate' AND '$endDate' AND `orders`.`locationID` = '2'";
                    echo "success";
                }
            }
        }
    }
} else if ($filterOption == 'clearFilters') {
    if ($locationID == '1') {
        if (isset($_SESSION['filterDatePickerLocationOne'])) {
            unset($_SESSION['filterDatePickerLocationOne']);
        }

        if (isset($_SESSION['locationOneQuery'])) {
            unset($_SESSION['locationOneQuery']);
        }

        if (isset($_SESSION['locationOneStartDate'])) {
            unset($_SESSION['locationOneStartDate']);
        }

        if (isset($_SESSION['locationOneEndDate'])) {
            unset($_SESSION['locationOneEndDate']);
        }
        echo "success";
    } else if ($locationID == '2') {
        if (isset($_SESSION['filterDatePickerLocationTwo'])) {
            unset($_SESSION['filterDatePickerLocationTwo']);
        }

     

        if (isset($_SESSION['locationTwoQuery'])) {
            unset($_SESSION['locationTwoQuery']);
        }

        if (isset($_SESSION['locationTwoStartDate'])) {
            unset($_SESSION['locationTwoStartDate']);
        }

        if (isset($_SESSION['locationTwoEndDate'])) {
            unset($_SESSION['locationTwoEndDate']);
        }
        echo "success";
    } else {
        echo "error";
    }
}
