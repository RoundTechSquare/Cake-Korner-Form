<?php
require './connection.php';
session_start();
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
            border:none !important;
        }
        .datatableDiv{
            border:none !important;
        }

        .datatableInformation {
            padding-top: 10px;
            padding-left: 10px;
            padding: 10px;
            border:none !important;
        }

        .datatablePagination {
            align-items: flex-end;
            float: right;
        }

        #table_id_paginate  .current {
            background: transparent;
            box-shadow: none;
            border: none;
            color: #DE85AD !important;
        }

        #table_id_paginate  .next {
            background: transparent;
            box-shadow: none;
            border: none;
            color: #DE85AD !important;
        }

        #table_id_paginate  .previous {
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

                    <div class="page-content-inner">

                        <!-- Datatable -->
                        <div class="table-wrapper" data-simplebar>
                            <table id="table_id" class="table is-datatable is-hoverable table-is-bordered">
                                <thead>
                                    <tr>
                                        <th>Order.No</th>
                                        <th>Customer Details</th>
                                        <th>Order Details</th>
                                        <th>Cake Details</th>
                                        <th>Order Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `orders`.`locationID` = '1'";
                                    $result = $con->query($query);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <tr class="datatable-info">
                                                <td style="white-space: nowrap;"><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $i ?></span></td>
                                                <td style="white-space: nowrap;">
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Name : </strong><?= $row['customerFirstName'] . ' ' . $row['customerLastName'] ?></p>
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Phone Number : </strong><?= $row['customerPhone']  ?></p>
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Email Address : </strong><?= $row['customerEmail'] ?></p>
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
                                                    <?= $row['dateCreated'] ?>
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    <div class="d-flex" style="justify-content: space-between;">
                                                        <a target="_blank" href="./edit-detail.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" style="border: none;" class="button is-elevated">
                                                            <span class="icon is-small">
                                                                <i class="fas fa-edit" style="color: #DE85AD;"></i>
                                                            </span>
                                                        </a>
                                                        <a target="_blank" href="./order-detail.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" style="margin-left: 0px;border: none;" class="button   is-elevated">
                                                            <span class="icon is-small">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                        </a>
                                                        <a href="./delete-order.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" class="button  is-elevated" style="margin-left: 0px;border: none;">
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

        <!-- jet-international js -->
        <script src="assets/js/functions.js"></script>

        <script src="assets/js/components.js" async></script>
        <script src="assets/js/popover.js" async></script>
        <script src="assets/js/widgets.js" async></script>


        <!-- Additional Features -->
        <script src="assets/js/touch.js" async></script>

        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    </div>
</body>

</html>