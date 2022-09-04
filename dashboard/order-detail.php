<?php
require './connection.php';
session_start();
if (isset($_SESSION['admin']) && isset($_REQUEST['orderID']) && isset($_REQUEST['locationID'])) {
    $query = "SELECT * FROM `orders`  WHERE `orders`.`isActive` = 'yes' AND `orders`.`locationID` = '$_REQUEST[locationID]' AND `orders`.`orderID` = '$_REQUEST[orderID]'";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $orderID = $row['orderID'];
            $orderConfirmationCode = $row['orderConfirmationCode'];
            $customerName = $row['customerFirstName'] . ' ' . $row['customerLastName'];
            $customerPhone = $row['customerPhone'];
            $customerEmail = $row['customerEmail'];
            $paymentStatus = $row['paymentStatus'];
            $orderAmount = $row['orderAmount'];
            $orderType = $row['orderType'];
            $orderPickupDate = $row['orderPickupDate'];
            $orderPickupTime = $row['orderPickupTime'];
            $orderPickupPerson = $row['orderPickupPerson'];
            $deliveryAddress1 = $row['deliveryAddress1'];
            $deliveryAppartmentNumber = $row['deliveryAppartmentNumber'];
            $deliveryCity = $row['deliveryCity'];
            $deliveryState = $row['deliveryState'];
            $deliveryZIP = $row['deliveryZIP'];
            $cakeType = $row['cakeType'];
            $cakeShape = $row['cakeShape'];
            $cakeSizeType = $row['cakeSizeType'];
            $cakeFlavors = $row['cakeFlavors'];
            $cakeFlavorsType = $row['cakeFlavorsType'];
            $themeCake = $row['themeCake'];
            $occasion = $row['occasion'];
            $otherOccasion = $row['otherOccasion'];
            $customMessage = $row['customMessage'];
            $specialInstructions = $row['specialInstructions'];
            $inspirationUploadDesign = $row['inspirationUploadDesign'];
            $cupcake = $row['cupcake'];
            $cupCakeSizeOption = $row['cupCakeSizeOption'];
            $cupCakeType = $row['cupCakeType'];

            $cupCakeFlavors = $row['cupCakeFlavors'];
            $cupCakeQuantity = $row['cupCakeQuantity'];

            $signature = $row['signature'];
            $dateCreated = $row['dateCreated'];
        }
    }
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

    <title>Order Details | Cake Korner</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source Sans Pro:300,400,500,600,700" rel="stylesheet" />

    <style>
        .printAdd {
            display: none;
        }

        @media print {

            html,
            body {
                height: 100%;
                margin: 0 !important;
                padding: 0 !important;
                top: 0px;
                bottom: 0px;
                position: relative;
                font-size: 17px;
                overflow: hidden;

            }

            .printRemove {
                display: none;
            }

            .printAdd {
                display: block;
            }
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
        <div class="printRemove">
            <?php require('./sidebar.php') ?>
        </div>


        <!-- Content Wrapper -->
        <div id="user-profile" class="view-wrapper view-wrapper-full" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile" data-sidebar-open>

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered printRemove">
                        <!-- Sidebar Trigger -->
                        <div onclick="window.close();" class="huro-hamburger nav-trigger  push-resize" data-sidebar="home-sidebar">
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
                            <h1 class="title is-4 has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">Order Detail</h1>
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

                        <!--User profile-->
                        <div class="profile-wrapper">
                            <div class="profile-body">
                                <div class="section-wrap   px-2 printAdd" style="position: relative;bottom:0px">

                                    <img class="" src="./assets/img/cake-korner-logo.png" style="width:auto;height:70px" alt="">
                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;float:right">Store Name : <?php
                                                                                                                                $sql = "SELECT * FROM `locations` WHERE `id`='$_REQUEST[locationID]'";
                                                                                                                                $result = $con->query($sql);

                                                                                                                                if ($result->num_rows > 0) {
                                                                                                                                    // output data of each row
                                                                                                                                    while ($locationRow = $result->fetch_assoc()) {
                                                                                                                                        echo $locationRow['city'];
                                                                                                                                    }
                                                                                                                                } else {
                                                                                                                                    echo "No location found!";
                                                                                                                                }
                                                                                                                                ?><br><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Confirmation Code: </strong> #<?= $orderConfirmationCode ?></span></h2>

                                </div>
                                <div class="profile-card">
                                    <!-- CUSTOMER DETAILS START -->
                                    <div class="columns" style="border-bottom: 1px solid #E3E3E3;">
                                        <div class="column is-6">
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">CUSTOMER DETAILS</h2>
                                                </div>
                                                <div class="section-content">

                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Name: </strong><?= $customerName ?></p>
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Phone Number: </strong><?= $customerPhone ?></p>
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Email Address: </strong><?= $customerEmail ?></p>
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90" style="white-space:nowrap"><strong class="has-dark-text dark-inverted " style="padding-right: 5px;white-space:nowrap">Payment Status: </strong><?php if ($paymentStatus == '-') {
                                                                                                                                                                                                                                                                                echo "Not Paid";
                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                echo $paymentStatus;
                                                                                                                                                                                                                                                                            } ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><span class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px;white-space:nowrap">Order Amount: </strong>$<?php if ($orderAmount == '-') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                echo "0";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                echo $orderAmount;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } ?></span></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="profile-card-section no-padding">
                                                <div class="section-title">
                                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">SIGNATURE </h2>
                                                </div>
                                                <div class="section-content">
                                                    <img src="<?php echo $signature; ?>" style="height: 50px; width: auto" alt="Signature" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CUSTOMER DETAILS END -->

                                    <!-- ORDER TYPE DETAILS AND CAKE DETAILS START -->
                                    <div class="columns" style="border-bottom: 1px solid #E3E3E3;">
                                        <div class="column is-6">
                                            <?php
                                            if ($orderType == 'Pickup') {
                                            ?>
                                                <div class="profile-card-section">
                                                    <div class="section-title">
                                                        <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">ORDER TYPE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">

                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Order Type: </strong><?= $orderType ?></p>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Pickup Date: </strong><?= $orderPickupDate ?></p>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Pickup Time: </strong><?= $orderPickupTime  ?></p>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Pickup Person Name: </strong><?= $orderPickupPerson ?></p>



                                                    </div>
                                                </div>

                                            <?php
                                            } else if ($orderType == 'Delivery') {
                                            ?>
                                                <div class="profile-card-section">
                                                    <div class="section-title">
                                                        <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">ORDER TYPE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Order Type: </strong><?= $orderType ?></p>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Delivery Address: </strong><?= $deliveryAddress1 . ', ' . $deliveryAppartmentNumber . ', ' . $deliveryCity . ', ' . $deliveryState . ', ' . $deliveryZIP ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="column is-6">
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">OTHER DETAILS</h2>
                                                </div>
                                                <div class="section-content">
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Occasion: </strong><?= $occasion ?></p>
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Custom Message: </strong><?= $customMessage ?></p>
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Special Instructions : </strong><?= $specialInstructions ?></p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- ORDER TYPE DETAILS AND CAKE DETAILS END -->

                                    <!-- OTHER DETAILS START -->
                                    <div class="columns" style="border-bottom: 1px solid #E3E3E3;">
                                        <div class="column is-6">
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">CAKE DETAILS</h2>
                                                </div>
                                                <div class="section-content">
                                                    <?php
                                                    $query = "SELECT * FROM `caketype` WHERE `id`=$cakeType";
                                                    $result = $con->query($query);
                                                    if ($result->num_rows > 0) {
                                                        $i = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Cake Type: </strong><?= $row['typeName'] ?></p>
                                                        <?php $i++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php

                                                    if ($cakeSizeType == 'squareCake') {

                                                        $query = "SELECT * FROM `cakesheet` WHERE `id`=$cakeShape";
                                                        $result = $con->query($query);
                                                        if ($result->num_rows > 0) {
                                                            $i = 1;
                                                            while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                                <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Sheet Type: </strong><?= $row['size'] ?></p>
                                                            <?php $i++;
                                                            }
                                                        } else {
                                                            ?>
                                                            <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                        <?php
                                                        }
                                                    } else if ($cakeSizeType == 'roundCake') {

                                                        ?>
                                                        <?php
                                                        $query = "SELECT * FROM `cakesize` WHERE `id`=$cakeShape";
                                                        $result = $con->query($query);
                                                        if ($result->num_rows > 0) {
                                                            $i = 1;
                                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                                <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Size of Cake: </strong><?= $row['cakeSize'] ?></p>
                                                            <?php $i++;
                                                            }
                                                        } else {
                                                            ?>
                                                            <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                        <?php
                                                        }
                                                    } else   if ($cakeSizeType == 'other') { ?>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Custom Cake Type : </strong>
                                                            <?php echo $cakeShape; ?></p>
                                                    <?php } ?>


                                                    <?php
                                                    if ($cakeFlavorsType == 'custom') { ?>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Cake Flavor: </strong><?= $cakeFlavors ?> (custom)</p>
                                                        <?php } else {
                                                        if ($cakeType == 1) {
                                                            if ($cakeFlavorsType == 'regular') {
                                                                $query = "SELECT * FROM `regularflavors` WHERE `id`=$cakeFlavors";
                                                            } else if ($cakeFlavorsType == 'special') {
                                                                $query = "SELECT * FROM `specialflavors` WHERE `id`=$cakeFlavors";
                                                            }
                                                        } else if ($cakeType == 2) {
                                                            $query = "SELECT * FROM `veganflavors` WHERE `id`=$cakeFlavors";
                                                        } else if ($cakeType == 3) {
                                                            $query = "SELECT * FROM `sugarfreeflavors` WHERE `id`=$cakeFlavors";
                                                        }

                                                        $result = $con->query($query);
                                                        if ($result->num_rows > 0) {
                                                            $i = 1;
                                                            while ($rowFlavor = $result->fetch_assoc()) {
                                                        ?>
                                                                <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Cake Flavor: </strong><?= $rowFlavor['name'] ?> (<?= $cakeFlavorsType ?>)</p>
                                                            <?php $i++;
                                                            }
                                                        } else {

                                                            ?>
                                                            <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                    <?php
                                                    if ($themeCake != '-') {
                                                        $query = "SELECT * FROM `themecake` WHERE `themeCakeID`=$themeCake";
                                                        $result = $con->query($query);
                                                        if ($result->num_rows > 0) {
                                                            $i = 1;
                                                            while ($rowTheme = $result->fetch_assoc()) {
                                                    ?>
                                                                <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">
                                                                    <strong class="has-dark-text dark-inverted " style="padding-right: 5px">Theme Cake Type: </strong><?= $rowTheme['themeName'] ?> (#<?= $themeCake ?>)
                                                                </p>
                                                        <?php
                                                            }
                                                        }
                                                    } else { ?>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">
                                                            <strong class="has-dark-text dark-inverted " style="padding-right: 5px">Theme Cake Type: </strong>No Theme Cake Selected
                                                        </p>
                                                    <?php }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <?php
                                            if ($cupcake == "Yes") {
                                            ?>

                                                <div class="profile-card-section no-padding">
                                                    <div class="section-title">
                                                        <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">CUPCAKE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">
                                                        <div class="network-notifications">
                                                            <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Cupcake Size: </strong><?= $cupCakeSizeOption ?></p>
                                                            <?php
                                                            if ($cupCakeType == "special") {
                                                                $query = "SELECT * FROM `cupcakespecialflavors` WHERE `id`=$cupCakeFlavors";
                                                                $result = $con->query($query);
                                                                if ($result->num_rows > 0) {
                                                                    $i = 1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Flavor: </strong><?= $row['name'] ?> (Special)</p>
                                                                    <?php $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                                    <?php
                                                                }
                                                            } else if ($cupCakeType == "regular") {
                                                                $query = "SELECT * FROM `regularflavors` WHERE `id`=$cupCakeFlavors";
                                                                $result = $con->query($query);
                                                                if ($result->num_rows > 0) {
                                                                    $i = 1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Flavor: </strong><?= $row['name'] ?> (Regular)</p>
                                                                    <?php $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                            <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Cupcake Quantity: </strong><?= $cupCakeQuantity ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"></p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- OTHER DETAILS END -->

                                    <!-- SIGNATURE START -->

                                    <div class="profile-card-section">
                                        <div class="section-title">
                                            <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">INSPIRATION UPLOAD DESIGN </h2>
                                        </div>

                                        <div class="section-content d-flex" style=" display: flex;flex-wrap: wrap;justify-content: flex-start;"> <?php

                                                                                                                                                    if ($inspirationUploadDesign == ''  || $inspirationUploadDesign == '- ' || $inspirationUploadDesign == '-') {
                                                                                                                                                        echo "<p>No Image Uploaded</p>";
                                                                                                                                                    } else {
                                                                                                                                                        $explodedInspirationUploadDesign = explode(",", $inspirationUploadDesign);
                                                                                                                                                        for ($i = 0; $i < count($explodedInspirationUploadDesign); $i++) { ?>
                                                    <img src=".<?php echo $explodedInspirationUploadDesign[$i]; ?>" style="height: 150px; width: auto;padding: 5px;" class="d-flex" alt="Inspirational Design Image" />
                                                <?php }
                                                ?>



                                            <?php }
                                            ?>
                                        </div>


                                    </div>

                                    <!-- SIGNATURE END -->
                                </div>


                                <button onclick="window.print();" class="button h-button is-primary is-elevated printRemove">
                                    <span class="icon">
                                        <i data-feather="printer"></i>
                                    </span>
                                    <span>Print Order Details</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Huro Scripts-->
    <!--Load Mapbox-->
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
    <script src="assets/js/profile.js" async></script>
    <script src="assets/js/syntax.js" async></script>
    </div>
</body>

</html>