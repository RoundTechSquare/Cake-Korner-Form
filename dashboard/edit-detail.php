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
            $customerFirstName = $row['customerFirstName'];
            $customerLastName = $row['customerLastName'];
            $customerPhone = $row['customerPhone'];
            $customerEmail = $row['customerEmail'];
            $paymentStatus = $row['paymentStatus'];
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

    <title>Edit Details | Cake Korner</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source Sans Pro:300,400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">



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
                            <h1 class="title is-4 has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">Order Detail </h1>
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
                                <div class="section-wrap pb-2 px-2 printAdd">
                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">Order Detail : <?php
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
                                                                                                                        ?></h2>
                                </div>
                                <div class="columns">

                                    <div class="column is-8">
                                        <div class="profile-card">
                                            <!-- CUSTOMER DETAILS START -->
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">CUSTOMER DETAILS</h2>
                                                </div>
                                                <div class="section-content">
                                                    <div class="columns">
                                                        <div class="column is-6">

                                                            <div class="field">
                                                                <div class="control">
                                                                    <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">First Name: </strong></label>
                                                                    <input type="text" class="input" id="customerFirstName" value="<?= $customerFirstName ?>" placeholder="Name">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="column is-6">
                                                            <div class="field">
                                                                <div class="control">
                                                                    <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Last Name: </strong></label>
                                                                    <input type="text" class="input" id="customerLastName" value="<?= $customerLastName ?>" placeholder="Name">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="columns">
                                                        <div class="column is-6">

                                                            <div class="field">
                                                                <div class="control">
                                                                    <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Phone Number: </strong></label>
                                                                    <input type="text" class="input" id="phoneNumber" value="<?= $customerPhone ?>" placeholder="Phone Number">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="column is-6">

                                                            <div class="field">
                                                                <div class="control">
                                                                    <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Email Address: </strong></label>
                                                                    <input type="text" class="input" id="email" value="<?= $customerEmail ?>" placeholder="Name">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- CUSTOMER DETAILS END -->

                                            <!-- ORDER TYPE DETAILS START -->
                                            <?php
                                            if ($orderType == 'Pickup') {
                                            ?>
                                                <div class="profile-card-section">
                                                    <div class="section-title">
                                                        <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">ORDER TYPE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">
                                                
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Confirmation Code: </strong>    #<?= $orderConfirmationCode?></p>
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
                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Confirmation Code: </strong>    #<?= $orderConfirmationCode?></p>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Order Type: </strong><?= $orderType ?></p>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Delivery Address: </strong><?= $deliveryAddress1 . ', ' . $deliveryAppartmentNumber . ', ' . $deliveryCity . ', ' . $deliveryState . ', ' . $deliveryZIP ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- ORDER TYPE DETAILS END -->

                                            <!-- OTHER DETAILS START -->
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">OTHER DETAILS</h2>
                                                </div>
                                                <div class="section-content">
                                                    <div class="columns">
                                                        <div class="column is-4">

                                                            <div class="field">
                                                                <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Occasion: </strong>
                                                                    <br>
                                                                    <div class="select control mt-1">

                                                                        <select class="input" id="occasion">
                                                                            <option disabled <?php if ($occasion != '' || $occasion != ' ') {
                                                                                                    if ($occasion == '-') {
                                                                                                        echo "selected";
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    }
                                                                                                } else {
                                                                                                    echo "";
                                                                                                } ?> value="-">Select Occasion</option>
                                                                            <option <?php if ($occasion != '' || $occasion != ' ') {
                                                                                        if ($occasion == 'Birthday') {
                                                                                            echo "selected";
                                                                                        } else {
                                                                                            echo "";
                                                                                        }
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?> value="Birthday">Birthday</option>
                                                                            <option <?php if ($occasion != '' || $occasion != ' ') {
                                                                                        if ($occasion == 'Anniversary') {
                                                                                            echo "selected";
                                                                                        } else {
                                                                                            echo "";
                                                                                        }
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?> value="Anniversary">Anniversary</option>
                                                                            <option <?php if ($occasion != '' || $occasion != ' ') {
                                                                                        if ($occasion == 'Graduation') {
                                                                                            echo "selected";
                                                                                        } else {
                                                                                            echo "";
                                                                                        }
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?> value="Graduation">Graduation</option>
                                                                            <option <?php if ($occasion != '' || $occasion != ' ') {
                                                                                        if ($occasion == "It's a Boy") {
                                                                                            echo "selected";
                                                                                        } else {
                                                                                            echo "";
                                                                                        }
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?> value="It's a Boy">It's a Boy</option>
                                                                            <option <?php if ($occasion != '' || $occasion != ' ') {
                                                                                        if ($occasion == "It's a Girl") {
                                                                                            echo "selected";
                                                                                        } else {
                                                                                            echo "";
                                                                                        }
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?> value="It's a Girl">It's a Girl</option>
                                                                            <option <?php if ($occasion != '' || $occasion != ' ') {
                                                                                        if ($occasion == 'other') {
                                                                                            echo "selected";
                                                                                        } else {
                                                                                            echo "";
                                                                                        }
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?> value="other">Other</option>
                                                                        </select>
                                                                    </div>
                                                            </div>

                                                        </div>
                                                        <div class="column is-8">

                                                            <div class="field">
                                                                <div class="control">
                                                                    <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Custom Message: </strong>
                                                                        <textarea class="input" id="customMessage" placeholder="Custom Message"><?= $customMessage ?></textarea>
                                                                </div>
                                                            </div>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="columns">
                                                        <div class="column is-6">
                                                            <div class="field">
                                                                <div class="control">
                                                                    <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Special Instructions:</strong>
                                                                        <textarea class="input" id="specialInstructions" placeholder="Special Instructions"><?= $specialInstructions ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column is-6">

                                                            <div class="field">
                                                                <label class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Payment Status: </strong></label>
                                                                <br>
                                                                <div class="select control mt-1">

                                                                    <select class="input" id="paymentStatus">
                                                                        <option disabled <?php  ?> value="-">Select Payment Status</option>
                                                                        <option <?php if ($paymentStatus != '' || $paymentStatus != ' ') {
                                                                                    if ($paymentStatus == 'Paid') {
                                                                                        echo "selected";
                                                                                    } else {
                                                                                        echo "";
                                                                                    }
                                                                                } else {
                                                                                    echo "";
                                                                                } ?> value="Paid">Paid</option>
                                                                        <option <?php if ($paymentStatus != '' || $paymentStatus != ' ') {
                                                                                    if ($paymentStatus == 'Not Paid' || $paymentStatus == '-') {
                                                                                        echo "selected";
                                                                                    } else {
                                                                                        echo "";
                                                                                    }
                                                                                } else {
                                                                                    echo "";
                                                                                } ?> value="Not Paid">Not Paid</option>
                                                                        <option <?php if ($paymentStatus != '' || $paymentStatus != ' ') {
                                                                                    if ($paymentStatus == 'E-payment') {
                                                                                        echo "selected";
                                                                                    } else {
                                                                                        echo "";
                                                                                    }
                                                                                } else {
                                                                                    echo "";
                                                                                } ?> value="E-payment">E-payment</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                            <!-- OTHER DETAILS END -->

                                            <!-- CAKE DETAILS START -->
                                            <div class="profile-card-section" <?php
                                                                                if ($cupcake == "Yes") {
                                                                                } else { ?> style="border-bottom: 0px;" <?php                                                      }
                                                                                                                        ?>>
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
                                                    } else   if ($cupCcakeSizeTypeakeType == 'other') { ?>
                                                        <p style="white-space: nowrap;" class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong>Custom Cake Type : </strong>
                                                            <?php echo $cakeShape; ?></p>
                                                    <?php } ?>


                                                    <?php
                                                    if ($cakeFlavorsType == 'custom') { ?>
                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Cake Flavor: </strong><?= $cakeFlavors ?> (custom)</p>
                                                        <?php } else {
                                                        if ($cakeType == 1) {
                                                            if ($cakeFlavorsType == 'regular') {
                                                                $query = "SELECT * FROM `regularflavors` WHERE `id`=$cakeType";
                                                            } else if ($cakeFlavorsType == 'special') {
                                                                $query = "SELECT * FROM `specialflavors` WHERE `id`=$cakeType";
                                                            }
                                                        } else if ($cakeType == 2) {
                                                            $query = "SELECT * FROM `veganflavors` WHERE `id`=$cakeType";
                                                        } else if ($cakeType == 3) {
                                                            $query = "SELECT * FROM `sugarfreeflavors` WHERE `id`=$cakeType";
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
                                                    if ($themeCake != '') {
                                                        $query = "SELECT * FROM `themeCake` WHERE `themeCakeID`=$themeCake";
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
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- CAKE DETAILS END -->



                                            <!-- CUPCAKE DETAILS START -->.
                                            <?php
                                            if ($cupcake == "Yes") {
                                            ?>
                                                <div class="profile-card-section " style="border-bottom: 0px;">
                                                    <div class="section-title">
                                                        <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">CUPCAKE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">
                                                        <div class="network-notifications">
                                                            <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Cupcake Size: </strong><?= $cupCakeType ?></p>
                                                            <?php
                                                            if ($cupcakeRegularFlavors == "-" && $cupcakeSpecialFlavors != "-") {
                                                                $query = "SELECT * FROM `cupcakespecialflavors` WHERE `id`=$cupCakeFlavors";
                                                                $result = $con->query($query);
                                                                if ($result->num_rows > 0) {
                                                                    $i = 1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Flavor: </strong><?= $row['name'] ?></p>
                                                                    <?php $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                                    <?php
                                                                }
                                                            } else {
                                                                $query = "SELECT * FROM `regularflavors` WHERE `id`=$cupCakeFlavors";
                                                                $result = $con->query($query);
                                                                if ($result->num_rows > 0) {
                                                                    $i = 1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                        <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90"><strong class="has-dark-text dark-inverted " style="padding-right: 5px">Flavor: </strong><?= $row['name'] ?></p>
                                                                    <?php $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <p class="has-dark-text dark-inverted is-font-alt is-weight-500 rem-90">No records found</p>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                                echo "<p style='padding-top:0px;margin-top:-30px'></p>";
                                            }
                                            ?>
                                            <!-- CUPCAKE DETAILS END -->
                                        </div>
                                    </div>

                                    <!-- SIDEBAR -->
                                    <div class="column is-4">


                                        <!-- SIGNATURE START -->
                                        <div class="profile-card">

                                            <div class="profile-card-section no-padding">
                                                <div class="columns">
                                                    <div class="column is-6">
                                                        <div class="section-title">
                                                            <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">SIGNATURE</h2>
                                                        </div>
                                                        <div class="section-content">
                                                            <img src="<?php echo $signature; ?>" style="height: 50px; width: auto" alt="Signature" />
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <!-- SIGNATURE END -->


                                        <!-- Image SUGGESTION START -->
                                        <div class="profile-card">
                                            <div class="profile-card-section no-padding">
                                                <div class="section-title">
                                                    <h2 class="has-dark-text dark-inverted " style="font-weight: 700;">INSPIRATION UPLOAD DESIGN </h2>
                                                </div>
                                                <div class="section-content"> <?php

                                                                                if ($inspirationUploadDesign == ''  || $inspirationUploadDesign == '- ' || $inspirationUploadDesign == '-') {
                                                                                    echo "<p>No Image Uploaded</p>";
                                                                                } else { ?>
                                                        <img src=".<?php echo $inspirationUploadDesign; ?>" style="height: 150px; width: auto" alt="Signature" />
                                                        ?>

                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Image SUGGESTION END -->
                                    </div>

                                </div>
                                <input type="hidden" id="orderID" value="<?= $orderID ?>">

                                <button onclick="updateRecords()" class="button h-button is-primary is-elevated printRemove">
                                    <span class="icon">
                                        <i data-feather="arrow-up-circle"></i>
                                    </span>
                                    <span>Update Order Details</span>
                                </button>
                                <script>
                                    function updateRecords() {
                                        const notyf = new Notyf({
                                            duration: 1500,
                                            position: {
                                                x: 'right',
                                                y: 'top',
                                            },
                                        });

                                        var customerFirstName = $('#customerFirstName').val();
                                        var customerLastName = $('#customerLastName').val();
                                        var phoneNumber = $('#phoneNumber').val();
                                        var email = $('#email').val();
                                        var paymentStatus = $('#paymentStatus').val();
                                        var occasion = $('#occasion').val();
                                        var customMessage = $('#customMessage').val();
                                        var specialInstructions = $('#specialInstructions').val();
                                        var orderID = $('#orderID').val();
                                        if (customerFirstName == '' || customerFirstName == ' ' || customerLastName == '' || customerLastName == ' ' || phoneNumber == '' || phoneNumber == ' ' || email == '' || email == ' ' || paymentStatus == '' || paymentStatus == ' ' ||
                                            occasion == '' || occasion == ' ' || customMessage == '' || customMessage == ' ' || orderID == '' || orderID == ' ') {
                                            notyf.error("Please fill all fields!");
                                        } else {
                                            var formData = new FormData();
                                            formData.append("orderID", orderID);
                                            formData.append("customerFirstName", customerFirstName);
                                            formData.append("customerLastName", customerLastName);
                                            formData.append("phoneNumber", phoneNumber);

                                            formData.append("email", email);
                                            formData.append("paymentStatus", paymentStatus);

                                            formData.append("occasion", occasion);
                                            formData.append("customMessage", customMessage);

                                            formData.append("specialInstructions", specialInstructions);

                                            $.ajax({
                                                url: "./update-order.php",
                                                type: 'POST',
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    if (data == "error") {
                                                        notyf.error("Something went wrong!");
                                                    } else if (data == "success") {
                                                        notyf.success("Order Details Updated!");
                                                        setTimeout(reloadPage, 2500);

                                                        function reloadPage() {
                                                            window.location.reload();
                                                        }

                                                    } else {
                                                        notyf.error("Something went wrong!");
                                                    }
                                                }
                                            });

                                        }

                                    }
                                </script>
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