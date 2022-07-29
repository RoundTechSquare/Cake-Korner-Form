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

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source Sans Pro:300,400,500,600,700" rel="stylesheet" />

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
                            <a class="toolbar-link right-panel-trigger" href="./index">
                                <i data-feather="log-out"></i>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!-- Datatable -->
                        <div class="table-wrapper" data-simplebar>
                            <table id="contactform-table" class="table is-datatable is-hoverable table-is-bordered">
                                <thead>
                                    <tr>
                                        <th>Order.No</th>
                                        <th>Customer Details</th>
                                        <th>Order Details</th>
                                        <th>Cake Details</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `orders`.`locationID` = '1' ORDER BY `orderID` DESC";
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
                                                        $cakeTypeQuery = "SELECT * FROM `caketype` WHERE `id`='$row[cakeTypeID]'";
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
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Sheet Type : </strong>
                                                        <?php
                                                        $sheetTypeQuery = "SELECT * FROM `cakesheet` WHERE `id`='$row[sheetTypeID]'";
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
                                                    <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Round Cake Type : </strong>
                                                        <?php
                                                        $cakeSizeQuery = "SELECT * FROM `cakesize` WHERE `id`='$row[roundCakeID]'";
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
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    <div class="d-flex" style="justify-content: space-between;">
                                                        <a target="_blank" href="./order-detail.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" class="button is-primary is-circle is-elevated">
                                                            <span class="icon is-small">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                        </a>
                                                        <a href="./delete-order.php?orderID=<?= $row['orderID'] ?>&locationID=<?= $row['locationID'] ?>" class="button is-circle is-elevated" style="margin-left: 10px;">
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
                        <div id="paging-first-datatable" class="pagination datatable-pagination">
                            <div class="datatable-info">
                                <span></span>
                            </div>
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
            if ($('#contactform-table').length) {
                new DataTable(document.querySelector("#contactform-table"), {
                    pageSize: 20,
                    filers: {
                        name: !0
                    },
                    filterText: "Type to Filter... ",
                    filterInputClass: "input",
                    counterText: function(s, n, a, t, i) {
                        return "Showing " + a + " to " + t + " of " + i + " items.";
                    },
                    counterDivSelector: ".datatable-info span",
                    pagingDivSelector: "#paging-first-datatable",
                    firstPage: !1,
                    lastPage: !1,
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
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row datatableElements datatableInformation'<'col-sm-5'l><'col-sm-7 datatablePagination'p>>",
                });
            }
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
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    </div>
</body>

</html>