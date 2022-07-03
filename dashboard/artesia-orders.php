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

    <title>Dashboard | Cake Korner</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

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
                            <h1 class="title is-4">Contact Us Forms</h1>
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
                            <table id="contactform-table" class="table is-datatable is-hoverable table-is-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT `orders`.`orderID`, `orders`.`locationID`, `orders`.`customerFirstName`, `orders`.`customerLastName` FROM `orders` LEFT JOIN `locations` ON `orders`.`locationID` = `locations`.`id`";
                                    $result = $con->query($query);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <tr class="datatable-info">
                                                <td style="white-space: nowrap;"><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $i ?></span></td>
                                                <td style="white-space: nowrap;"><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $row['orderID'] ?></span></td>
                                                <td style="white-space: nowrap;"><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $row['locationID'] ?></span></td>
                                                <td style="white-space: nowrap;"><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $row['customerFirstName']. ' ' .$row['customerLastName'] ?></span></td>
                                                <td style="white-space: nowrap;"><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><?= $row['customerLastName'] ?></span></td>
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
    </div>
</body>

</html>