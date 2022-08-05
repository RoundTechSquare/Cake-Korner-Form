<?php
require './default.php';

if (isset($_SESSION['admin'])) {
} else {
    header("location: ./logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Artesia Orders | Cake Korner</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source Sans Pro:300,400,500,600,700" rel="stylesheet" />
    <style>
        .datatableElements {
            display: flex;
            border: none !important;
        }

        .datatableDiv {
            border: none !important;
        }

        .datatableInformation {
            padding-top: 10px;
            padding-left: 10px;
            padding: 10px;
            border: none !important;
        }

        .datatablePagination {
            align-items: flex-end;
            float: right;
        }

        #table_id_paginate .current {
            background: transparent;
            box-shadow: none;
            border: none;
            color: #DE85AD !important;
        }

        #table_id_paginate .next {
            background: transparent;
            box-shadow: none;
            border: none;
            color: #DE85AD !important;
        }

        #table_id_paginate .previous {
            background: transparent;
            box-shadow: none;
            border: none;
            color: #DE85AD !important;
        }

        .datatablePagination {
            position: absolute;
            bottom: 0;
            right: 0;
            padding: 10px;
        }

        .datatableSearch {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
        }
    </style>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <!--Pageloader-->
        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>

        <!-- SIDEBAR -->
        <?php require('./sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="app-projects" class="view-wrapper view-wrapper-full" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile" data-sidebar-open>

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->
                        <div class="huro-hamburger nav-trigger push-resize" data-sidebar="home-sidebar">
                            <span class="menu-toggle has-chevron">
                                <span class="icon-box-toggle">
                                    <span class="rotate">
                                        <i class="icon-line-top"></i>
                                        <i class="icon-line-center"></i>
                                        <i class="icon-line-bottom"></i>
                                    </span>
                                </span>
                            </span>
                        </div>
                        <div class="title-wrap">
                            <h1 class="title is-4">Artesia Orders</h1>
                        </div>
                        <div class="toolbar ml-auto">
                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </div>
                            <a class="toolbar-link right-panel-trigger" href="./index">
                                <i data-feather="log-out"></i>
                            </a>
                        </div>
                    </div>
                    <div class="page-title has-text-centered">


                        <div class="toolbar ml-auto">
                            <div class="field">




                                <div class="title-wrap  mt-2 pt-1">
                                    <div id="reportrange" style="cursor:pointer ;" class="control has-icon">

                                        <div class="input">
                                            <div class="form-icon">
                                                <i data-feather="calendar"></i>
                                            </div>&nbsp;
                                            <span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-caret-down"></i>

                                        </div>
                                    </div>

                                </div>
                                <input type='hidden' id="filterDatePicker">
                                <input type='hidden' id="startDate">
                                <input type='hidden' id="endDate">
                            </div>
                            <div class="title mt-0 pt-0">
                                <button onclick="setDate()" class="button  h-button is-primary">Apply</button>
                                <button onclick="clearFilters()" class="button  h-button is-primary">Clear Filter</button>
                            </div>


                        </div>
                    </div>
                    <script>
                        function clearFilters() {
                            var formData = new FormData();
                            formData.append("locationID", "1");
                            formData.append("filterOption", "clearFilters");
                            $.ajax({
                                url: "./set-date.php",
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    if (data == "success") {
                                        notyf.success("Filter applied");
                                        setTimeout(reloadPage, 1500);

                                        function reloadPage() {
                                            window.location.reload();
                                        }

                                    } else if (data == "error") {
                                        notyf.error("Failed to apply filter");
                                    } else {
                                        notyf.error("Something went wrong!");
                                    }
                                }
                            });
                        }
                    </script>

                    <?php
                    if (isset($_SESSION['locationOneEndDate'])) {
                        $explodedEndDate = explode("-", $_SESSION['locationOneEndDate']);
                    }

                    if (isset($_SESSION['locationOneStartDate'])) {
                        $explodedStartDate = explode("-", $_SESSION['locationOneStartDate']);
                    }
                    ?>
                    <script type="text/javascript">
                        $(function() {

                            var start = <?php if (isset($_SESSION['locationOneStartDate'])) { ?>
                            moment('<?= $explodedStartDate[0] ?>-<?= $explodedStartDate[1] ?>-<?= $explodedStartDate[2] ?>', 'MM-DD-YYYY')
                            <?php } else { ?>moment() <?php } ?>;

                            var end = <?php if (isset($_SESSION['locationOneEndDate'])) { ?>
                            moment('<?= $explodedEndDate[0] ?>-<?= $explodedEndDate[1] ?>-<?= $explodedEndDate[2] ?>', 'MM-DD-YYYY')
                        <?php } else { ?> moment() <?php } ?>;


                            function cb(start, end) {

                                $('#reportrange span').html(start.format('MM-DD-YYYY') + ' to ' + end.format('MM-DD-YYYY'));
                                $("#filterDatePicker").val(start.format('MM-DD-YYYY') + ' to ' + end.format('MM-DD-YYYY'));
                                $("#startDate").val(start.format('MM-DD-YYYY'));
                                $("#endDate").val(end.format('MM-DD-YYYY'));
                            }

                            $('#reportrange').daterangepicker({
                                startDate: start,
                                endDate: end,

                                ranges: {
                                    'Today': [moment(), moment()],
                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                }
                            }, cb);

                            cb(start, end);

                        });
                    </script>
                    <div class="page-content-inner" id="bodyPage">

                        <script>
                            function setDate() {
                                var filterDatePicker = $("#filterDatePicker").val();
                                var startDate = $("#startDate").val();
                                var endDate = $("#endDate").val();
                                const notyf = new Notyf({
                                    duration: 1500,
                                    position: {
                                        x: 'right',
                                        y: 'top',
                                    },
                                });
                                if (filterDatePicker == '' || filterDatePicker == undefined) {
                                    notyf.error("Please select date first");
                                } else {
                                    var formData = new FormData();
                                    formData.append("filterDatePicker", filterDatePicker);
                                    formData.append("startDate", startDate);
                                    formData.append("endDate", endDate);
                                    formData.append("filterOption", "updateFilters");
                                    formData.append("locationID", "1");

                                    $.ajax({
                                        url: "./set-date.php",
                                        type: 'POST',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            if (data == "success") {
                                                notyf.success("Filter applied");
                                                setTimeout(reloadPage, 1500);

                                                function reloadPage() {
                                                    window.location.reload();
                                                }

                                            } else if (data == "error") {
                                                notyf.error("Failed to apply filter");
                                            } else {
                                                notyf.error("Something went wrong!");
                                            }
                                        }
                                    });
                                }
                            }
                        </script>


                        <!-- Datatable -->
                        <div class="table-wrapper" data-simplebar>
                            <table id="table_id" class="table is-datatable is-hoverable table-is-bordered">
                                <thead>
                                    <tr>
                                        <th style="font-size: 10px;padding:10px">ID</th>
                                        <th>Customer Details</th>
                                        <th>Order Details</th>
                                        <th>Cake Details</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    if (isset($_SESSION['locationOneQuery'])) {
                                        $query = $_SESSION['locationOneQuery'];
                                    } else {
                                        $query = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `orders`.`locationID` = '1' AND `dateCreated`='$dateCreated'";
                                    }
                                    $result = $con->query($query);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <tr class="datatable-info">
                                                <td style="font-size: 10px;padding:10px"><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $i ?></span></td>
                                                <td style="white-space: nowrap;">
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Name : </strong><?= $row['customerFirstName'] . ' ' . $row['customerLastName'] ?></p>
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Phone Number : </strong><?= $row['customerPhone']  ?></p>
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Email Address : </strong><?= $row['customerEmail'] ?></p>
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Order Date : </strong><?= $row['dateCreated'] ?></p>

                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Payment Status : </strong>

                                                        <?php
                                                        if ($row['paymentStatus'] == "Paid") {
                                                            echo '<span class="tag is-rounded is-success  mx-2 is-light">Paid</span>';
                                                        } else if ($row['paymentStatus'] == "Not Paid") {
                                                            echo '<span class="tag is-rounded is-danger  mx-2 is-light">Not Paid</span>';
                                                        } else if ($row['paymentStatus'] == "E-payment") {
                                                            echo '<span class="tag is-rounded is-primary mx-2 is-light">E-payment</span>';
                                                        } else {
                                                            echo '<span class="tag is-rounded is-danger  mx-2 is-light">Not Paid</span>';
                                                        }
                                                        ?>
                                                    </p>

                                                </td>
                                                <td style="white-space: nowrap;">
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Order Type : </strong><?= $row['orderType'] ?></p>
                                                    <?php
                                                    if ($row['orderType'] == 'Pickup') { ?>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Pickup Details : </strong><?= $row['orderPickupDate'] . ', ' . $row['orderPickupTime']  ?></p>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Pickup Person : </strong><?= $row['orderPickupPerson'] ?></p>
                                                    <?php } else if ($row['orderType'] == 'Delivery') { ?>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Delivery Address : </strong><br><?= $row['deliveryAddress1'] . ', ' . $row['deliveryAppartmentNumber']  ?></p>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $row['deliveryCity'] . ', ' . $row['deliveryState'] . ', ' . $row['deliveryZIP']  ?></p>
                                                    <?php }

                                                    ?>

                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Pickup/Delivery Date : </strong> <?php if ($row['orderType'] == 'Pickup') {
                                                                                                                                                                                                        echo $row['orderPickupDate'];
                                                                                                                                                                                                    } else if ($row['orderType'] == 'Delivery') {
                                                                                                                                                                                                        echo $row['dateCreated'];
                                                                                                                                                                                                    } ?></p>
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Cake Type : </strong>
                                                        <?php
                                                        $cakeTypeQuery = "SELECT * FROM `caketype` WHERE `id`='$row[cakeType]'";
                                                        $cakeTypeResult = $con->query($cakeTypeQuery);

                                                        if ($cakeTypeResult->num_rows > 0) {
                                                            // output data of each row
                                                            while ($cakeTypeRow = $cakeTypeResult->fetch_assoc()) {
                                                                echo $cakeTypeRow["typeName"];
                                                            }
                                                        } else {
                                                            echo "Cake Type not found!";
                                                        }
                                                        ?></p>
                                                    <?php
                                                    if ($row['cakeSizeType'] == 'squareCake') {

                                                    ?>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Square Cake Type : </strong>
                                                            <?php
                                                            $sheetTypeQuery = "SELECT * FROM `cakesheet` WHERE `id`='$row[cakeShape]'";
                                                            $sheetTypeResult = $con->query($sheetTypeQuery);

                                                            if ($sheetTypeResult->num_rows > 0) {
                                                                // output data of each row
                                                                while ($sheetTypeRow = $sheetTypeResult->fetch_assoc()) {
                                                                    echo $sheetTypeRow["size"];
                                                                }
                                                            } else {
                                                                echo "Sheet Type not found!";
                                                            }
                                                            ?></p>
                                                    <?php
                                                    } else if ($row['cakeSizeType'] == 'roundCake') {
                                                    ?>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Round Cake Type : </strong>
                                                            <?php
                                                            $cakeSizeQuery = "SELECT * FROM `cakesize` WHERE `id`='$row[cakeShape]'";
                                                            $cakeSizeResult = $con->query($cakeSizeQuery);

                                                            if ($cakeSizeResult->num_rows > 0) {
                                                                // output data of each row
                                                                while ($cakeSizeRow = $cakeSizeResult->fetch_assoc()) {
                                                                    echo $cakeSizeRow["cakeSize"];
                                                                }
                                                            } else {
                                                                echo "Cake Size not found!";
                                                            }
                                                            ?></p>
                                                    <?php } else   if ($row['cakeSizeType'] == 'other') { ?>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Custom Cake Type : </strong>
                                                            <?php echo $row['cakeShape']; ?></p>
                                                    <?php } ?>
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Cake Flavor : </strong>
                                                        <?php

                                                        if ($row['cakeType'] == 2) {
                                                            if ($row['cakeFlavorsType'] == 'custom') {
                                                                echo $row['cakeFlavors'] . " (Custom Flavor)";
                                                            } else {
                                                                $sql = "SELECT * FROM `veganflavors` WHERE `id`='$row[cakeFlavors]'";
                                                                $specialResult = $con->query($sql);

                                                                if ($specialResult->num_rows > 0) {
                                                                    // output data of each row
                                                                    while ($specialRow = $specialResult->fetch_assoc()) {
                                                                        echo $specialRow['name'] . " (Vegan)";;
                                                                    }
                                                                } else {
                                                                    echo "No Flavors found";
                                                                }
                                                            }
                                                        } else if ($row['cakeType'] == 1) {
                                                            if ($row['cakeFlavorsType'] == '-') {
                                                            } else if ($row['cakeFlavorsType'] == 'regular') {
                                                                $sql = "SELECT * FROM `regularflavors` WHERE `id`='$row[cakeFlavors]'";
                                                                $regularResult = $con->query($sql);

                                                                if ($regularResult->num_rows > 0) {
                                                                    // output data of each row
                                                                    while ($regularRow = $regularResult->fetch_assoc()) {
                                                                        echo $regularRow['name'] . " (Regular)";;
                                                                    }
                                                                } else {
                                                                    if ($row['cakeFlavorsType'] == 'custom') {
                                                                        echo $row['cakeFlavors'] . " (Custom Flavor)";
                                                                    } else {
                                                                        echo "No Flavors found";
                                                                    }
                                                                }
                                                            } else if ($row['cakeFlavorsType'] == 'special') {
                                                                $sql = "SELECT * FROM `specialflavors` WHERE `id`='$row[cakeFlavors]'";
                                                                $specialResult = $con->query($sql);

                                                                if ($specialResult->num_rows > 0) {
                                                                    // output data of each row
                                                                    while ($specialRow = $specialResult->fetch_assoc()) {
                                                                        echo $specialRow['name'] . " (Sepcial)";;
                                                                    }
                                                                } else {
                                                                    if ($row['cakeFlavorsType'] == 'custom') {
                                                                        echo $row['cakeFlavors'] . " (Custom Flavor)";
                                                                    } else {
                                                                        echo "No Flavors found";
                                                                    }
                                                                }
                                                            } else  if ($row['cakeFlavorsType'] == 'custom') {
                                                                echo $row['cakeFlavors'] . " (Custom Flavor)";
                                                            }
                                                        } else   if ($row['cakeType'] == 3) {
                                                            if ($row['cakeFlavorsType'] == 'custom') {
                                                                echo $row['cakeFlavors'] . " (Custom Flavor)";
                                                            } else {
                                                                $sql = "SELECT * FROM `sugarfreeflavors` WHERE `id`='$row[cakeFlavors]'";
                                                                $sugarFreeResult = $con->query($sql);

                                                                if ($sugarFreeResult->num_rows > 0) {
                                                                    // output data of each row
                                                                    while ($sugarFreeRow = $sugarFreeResult->fetch_assoc()) {
                                                                        echo $sugarFreeRow['name'] . " (Sugar Free)";
                                                                    }
                                                                } else {
                                                                    if ($row['cakeFlavorsType'] == 'custom') {
                                                                        echo $row['cakeFlavors'] . " (Custom Flavor)";
                                                                    } else {
                                                                        echo "No Flavors found";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                </td>

                                                <td style="white-space: nowrap;">
                                                    <div class="d-flex" style="justify-content: space-between;">
                                                        <a target="_blank" href="./edit-detail.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" style="border: none;background:transparent" class="button is-elevated">
                                                            <span class="icon is-small">
                                                                <i class="fas fa-edit" style="color: #DE85AD;"></i>
                                                            </span>
                                                        </a>
                                                        <a target="_blank" href="./order-detail.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" style="margin-left: 0px;border: none;background:transparent" class="button   is-elevated">
                                                            <span class="icon is-small">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                        </a>
                                                        <a href="./delete-order.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" class="button  is-elevated" style="margin-left: 0px;border: none;background:transparent">
                                                            <span class="icon is-small">
                                                                <i class="fas fa-trash" style="color: red;"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="2">No Record Found</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Concatenated plugins -->
        <script src="assets/js/app.js"></script>
        <!-- Huro js -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/main.js" async></script>
        <script src="assets/js/components.js" async></script>
        <script src="assets/js/popover.js" async></script>
        <script src="assets/js/widgets.js" async></script>
        <!-- Additional Features -->
        <script src="assets/js/touch.js" async></script>
        <script src="assets/js/syntax.js" async></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable({
                    pageSize: 10,

                    filterText: "Type to Filter... ",
                    filterInputClass: "input",
                    counterText: function(s, n, a, t, i) {
                        return "Showing " + a + " to " + t + " of " + i + " items.";
                    },
                    counterDivSelector: ".datatable-info span",
                    pagingDivSelector: "#paging-first-datatable",

                    nextPage: '<i class="fas fa-angle-right"></i>',
                    prevPage: '<i class="fas fa-angle-left"></i>',
                    "searching": true,
                    language: {
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '<span class="text-primary"><i class="fas fa-angle-left"></i> Previous </span>',
                            next: '<span class="text-primary">  Next <i class="fas fa-angle-right"></i></span>'
                        }
                    },
                    "dom": "<'row datatableElements datatableInformation'<'col-sm-6'i><'col-sm-6 datatableSearch'f>>" +
                        "<'row datatableDiv'<'col-sm-12'tr>>" +
                        "<'row datatableElements datatableInformation'<'col-sm-5'l><'col-sm-7 datatablePagination'p>>",
                });
            });
        </script>
        <?php
        if (isset($_REQUEST['message']) == "Success") {
        ?>
            <script>
                const notyf = new Notyf({
                    duration: 2500,
                    position: {
                        x: 'right',
                        y: 'top',
                    },
                });
                notyf.success('The record is deleted successfully');
            </script>
        <?php
        } else if (isset($_REQUEST['message']) == "Error") {
        ?>
            <script>
                const notyf = new Notyf({
                    duration: 2500,
                    position: {
                        x: 'right',
                        y: 'top',
                    },
                });
                notyf.error('Failed to delete the record. Please try again');
            </script>
        <?php
        }
        ?>

        <!-- cake-korner js -->
        <script src="assets/js/functions.js"></script>

        <script src="assets/js/components.js" async></script>
        <script src="assets/js/popover.js" async></script>
        <script src="assets/js/widgets.js" async></script>


        <!-- Additional Features -->
        <script src="assets/js/touch.js" async></script>

        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    </div>
</body>

</html>