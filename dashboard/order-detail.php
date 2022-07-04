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
            $customerName = $row['customerFirstName'] . ' ' . $row['customerLastName'];
            $customerPhone = $row['customerPhone'];
            $customerEmail = $row['customerEmail'];
            $orderType = $row['orderType'];
            $orderPickupDate = $row['orderPickupDate'];
            $orderPickupTime = $row['orderPickupTime'];
            $orderPickupPerson = $row['orderPickupPerson'];
            $deliveryAddress1 = $row['deliveryAddress1'];
            $deliveryAppartmentNumber = $row['deliveryAppartmentNumber'];
            $deliveryCity = $row['deliveryCity'];
            $deliveryState = $row['deliveryState'];
            $deliveryZIP = $row['deliveryZIP'];
            $cakeTypeID = $row['cakeTypeID'];
            $sheetTypeID = $row['sheetTypeID'];
            $roundCakeID = $row['roundCakeID'];
            $insideRegularFlavors = $row['insideRegularFlavors'];
            $insideSpecialFlavors = $row['insideSpecialFlavors'];
            $outsideRegularFlavors = $row['outsideRegularFlavors'];
            $outsideSpecialFlavors = $row['outsideSpecialFlavors'];
            $veganFlavors = $row['veganFlavors'];
            $sugarFreeFlavors = $row['sugarFreeFlavors'];
            $occasion = $row['occasion'];
            $name = $row['name'];
            $customMessage = $row['customMessage'];
            $cupcakesRequired = $row['cupcakesRequired'];
            $cupcakeSize = $row['cupcakeSize'];
            $cupcakeRegularFlavors = $row['cupcakeRegularFlavors'];
            $cupcakeSpecialFlavors = $row['cupcakeSpecialFlavors'];
            $cupcakeQuantity = $row['cupcakeQuantity'];
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
        <div id="user-profile" class="view-wrapper view-wrapper-full" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile" data-sidebar-open>

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
                            <h1 class="title is-4">Order Detail</h1>
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
                                <div class="columns">
                                    <div class="column is-8">
                                        <div class="profile-card">
                                            <!-- CUSTOMER DETAILS START -->
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 style="font-weight: 700;">CUSTOMER DETAILS</h2>
                                                </div>
                                                <div class="section-content">
                                                    <p><strong style="padding-right: 5px">Name: </strong><?= $customerName ?></p>
                                                    <p><strong style="padding-right: 5px">Phone Number: </strong><?= $customerPhone ?></p>
                                                    <p><strong style="padding-right: 5px">Email Address: </strong><?= $customerEmail ?></p>
                                                </div>
                                            </div>
                                            <!-- CUSTOMER DETAILS END -->

                                            <!-- ORDER TYPE DETAILS START -->
                                            <?php
                                            if ($orderType == 'Pickup') {
                                            ?>
                                                <div class="profile-card-section">
                                                    <div class="section-title">
                                                        <h2 style="font-weight: 700;">ORDER TYPE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">
                                                        <p><strong style="padding-right: 5px">Order Type: </strong><?= $orderType ?></p>
                                                        <p><strong style="padding-right: 5px">Pickup Date: </strong><?= $orderPickupDate ?></p>
                                                        <p><strong style="padding-right: 5px">Pickup Time: </strong><?= $orderPickupTime  ?></p>
                                                        <p><strong style="padding-right: 5px">Pickup Person Name: </strong><?= $orderPickupPerson ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            } else if ($orderType == 'Delivery') {
                                            ?>
                                                <div class="profile-card-section">
                                                    <div class="section-title">
                                                        <h2 style="font-weight: 700;">ORDER TYPE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">
                                                        <p><strong style="padding-right: 5px">Order Type: </strong><?= $orderType ?></p>
                                                        <p><strong style="padding-right: 5px">Delivery Address: </strong><?= $deliveryAddress1 . ', ' . $deliveryAppartmentNumber . ', ' . $deliveryCity . ', ' . $deliveryState . ', ' . $deliveryZIP ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- ORDER TYPE DETAILS END -->

                                            <!-- OTHER DETAILS START -->
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 style="font-weight: 700;">OTHER DETAILS</h2>
                                                </div>
                                                <div class="section-content">
                                                    <p><strong style="padding-right: 5px">Occasion: </strong><?= $occasion ?></p>
                                                    <p><strong style="padding-right: 5px">Name to be written: </strong><?= $name ?></p>
                                                    <p><strong style="padding-right: 5px">Custom Message: </strong><?= $customMessage ?></p>
                                                </div>
                                            </div>
                                            <!-- OTHER DETAILS END -->

                                            <!-- SIGNATURE START -->
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <h2 style="font-weight: 700;">SIGNATURE</h2>
                                                </div>
                                                <div class="section-content">
                                                    <img src="<?php echo $signature; ?>" style="height: 50px; width: auto" alt="Signature" />
                                                </div>
                                            </div>
                                            <!-- SIGNATURE END -->
                                        </div>
                                    </div>

                                    <!-- SIDEBAR -->
                                    <div class="column is-4">

                                        <!-- CAKE DETAILS START -->
                                        <div class="profile-card">
                                            <div class="profile-card-section no-padding">
                                                <div class="section-title">
                                                    <h2 style="font-weight: 700;">CAKE DETAILS</h2>
                                                </div>
                                                <div class="section-content">
                                                    <?php
                                                    $query = "SELECT * FROM `caketype` WHERE `id`=$cakeTypeID";
                                                    $result = $con->query($query);
                                                    if ($result->num_rows > 0) {
                                                        $i = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <p><strong style="padding-right: 5px">Cake Type: </strong><?= $row['typeName'] ?></p>
                                                        <?php $i++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <p>No records found</p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    $query = "SELECT * FROM `cakesheet` WHERE `id`=$sheetTypeID";
                                                    $result = $con->query($query);
                                                    if ($result->num_rows > 0) {
                                                        $i = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <p><strong style="padding-right: 5px">Sheet Type: </strong><?= $row['size'] ?></p>
                                                        <?php $i++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <p>No records found</p>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    $query = "SELECT * FROM `cakesize` WHERE `id`=$roundCakeID";
                                                    $result = $con->query($query);
                                                    if ($result->num_rows > 0) {
                                                        $i = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <p><strong style="padding-right: 5px">Size of Cake: </strong><?= $row['cakeSize'] ?></p>
                                                        <?php $i++;
                                                        }
                                                    } else {
                                                        ?>
                                                        <p>No records found</p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CAKE DETAILS END -->

                                        <?php
                                        $query = "SELECT * FROM `caketype` WHERE `id`=$cakeTypeID";
                                        $result = $con->query($query);
                                        if ($result->num_rows > 0) {
                                            $i = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['typeName'] == "Vegetarian/Eggless") {
                                        ?>
                                                    <!-- INSIDE FLAVOR DETAILS START -->
                                                    <div class="profile-card">
                                                        <div class="profile-card-section no-padding">
                                                            <div class="section-title">
                                                                <h2 style="font-weight: 700;">INSIDE FLAVOR</h2>
                                                            </div>
                                                            <div class="section-content">
                                                                <div class="network-notifications">
                                                                    <?php
                                                                    if ($insideRegularFlavors == "-" && $insideSpecialFlavors != "-") {
                                                                        $query = "SELECT * FROM `specialflavors` WHERE `id`=$insideSpecialFlavors";
                                                                        $result = $con->query($query);
                                                                        if ($result->num_rows > 0) {
                                                                            $i = 1;
                                                                            while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                                <h3 style="font-size: 18px; margin-bottom: 0px"><?= $row['name'] ?></h3>
                                                                            <?php $i++;
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <p>No records found</p>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        $query = "SELECT * FROM `regularflavors` WHERE `id`=$insideRegularFlavors";
                                                                        $result = $con->query($query);
                                                                        if ($result->num_rows > 0) {
                                                                            $i = 1;
                                                                            while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                                <h3 style="font-size: 18px; margin-bottom: 0px"><?= $row['name'] ?></h3>
                                                                            <?php $i++;
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <p>No records found</p>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- INSIDE FLAVOR DETAILS END -->

                                                    <!-- OUTSIDE FLAVOR DETAILS START -->
                                                    <div class="profile-card">
                                                        <div class="profile-card-section no-padding">
                                                            <div class="section-title">
                                                                <h2 style="font-weight: 700;">OUTSIDE FLAVOR</h2>
                                                            </div>
                                                            <div class="section-content">
                                                                <div class="network-notifications">
                                                                    <?php
                                                                    if ($outsideRegularFlavors == "-" && $outsideSpecialFlavors != "-") {
                                                                        $query = "SELECT * FROM `specialflavors` WHERE `id`=$outsideSpecialFlavors";
                                                                        $result = $con->query($query);
                                                                        if ($result->num_rows > 0) {
                                                                            $i = 1;
                                                                            while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                                <h3 style="font-size: 18px; margin-bottom: 0px"><?= $row['name'] ?></h3>
                                                                            <?php $i++;
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <p>No records found</p>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        $query = "SELECT * FROM `regularflavors` WHERE `id`=$outsideRegularFlavors";
                                                                        $result = $con->query($query);
                                                                        if ($result->num_rows > 0) {
                                                                            $i = 1;
                                                                            while ($row = $result->fetch_assoc()) {
                                                                            ?>
                                                                                <h3 style="font-size: 18px; margin-bottom: 0px"><?= $row['name'] ?></h3>
                                                                            <?php $i++;
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <p>No records found</p>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- OUTSIDE FLAVOR DETAILS END -->
                                                <?php
                                                } else if ($row['typeName'] == "Vegan") {
                                                ?>
                                                    <div class="profile-card">
                                                        <div class="profile-card-section no-padding">
                                                            <div class="section-title">
                                                                <h2 style="font-weight: 700;">FLAVOR</h2>
                                                            </div>
                                                            <div class="section-content">
                                                                <div class="network-notifications">
                                                                    <?php
                                                                    $query = "SELECT * FROM `veganflavors` WHERE `id`=$veganFlavors";
                                                                    $result = $con->query($query);
                                                                    if ($result->num_rows > 0) {
                                                                        $i = 1;
                                                                        while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                            <h3 style="font-size: 18px; margin-bottom: 0px"><?= $row['name'] ?></h3>
                                                                        <?php $i++;
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <p>No records found</p>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="profile-card">
                                                        <div class="profile-card-section no-padding">
                                                            <div class="section-title">
                                                                <h2 style="font-weight: 700;">FLAVOR</h2>
                                                            </div>
                                                            <div class="section-content">
                                                                <div class="network-notifications">
                                                                    <?php
                                                                    $query = "SELECT * FROM `sugarfreeflavors` WHERE `id`=$sugarFreeFlavors";
                                                                    $result = $con->query($query);
                                                                    if ($result->num_rows > 0) {
                                                                        $i = 1;
                                                                        while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                            <h3 style="font-size: 18px; margin-bottom: 0px"><?= $row['name'] ?></h3>
                                                                        <?php $i++;
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <p>No records found</p>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>

                                        <!-- CUPCAKE DETAILS START -->
                                        <?php
                                        if ($cupcakesRequired == "Yes") {
                                        ?>
                                            <div class="profile-card">
                                                <div class="profile-card-section no-padding">
                                                    <div class="section-title">
                                                        <h2 style="font-weight: 700;">CUPCAKE DETAILS</h2>
                                                    </div>
                                                    <div class="section-content">
                                                        <div class="network-notifications">
                                                            <p><strong style="padding-right: 5px">Cupcake Size: </strong><?= $cupcakeSize ?></p>
                                                            <?php
                                                            if ($cupcakeRegularFlavors == "-" && $cupcakeSpecialFlavors != "-") {
                                                                $query = "SELECT * FROM `cupcakespecialflavors` WHERE `id`=$cupcakeSpecialFlavors";
                                                                $result = $con->query($query);
                                                                if ($result->num_rows > 0) {
                                                                    $i = 1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                                        <p><strong style="padding-right: 5px">Flavor: </strong><?= $row['name'] ?></p>
                                                                    <?php $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <p>No records found</p>
                                                                    <?php
                                                                }
                                                            } else {
                                                                $query = "SELECT * FROM `regularflavors` WHERE `id`=$cupcakeRegularFlavors";
                                                                $result = $con->query($query);
                                                                if ($result->num_rows > 0) {
                                                                    $i = 1;
                                                                    while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                                                        <p><strong style="padding-right: 5px">Flavor: </strong><?= $row['name'] ?></p>
                                                                    <?php $i++;
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <p>No records found</p>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <p></p>
                                        <?php
                                        }
                                        ?>
                                        <!-- CUPCAKE DETAILS END -->
                                    </div>
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