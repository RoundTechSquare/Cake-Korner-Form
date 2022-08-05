<?php require './connection.php' ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="./assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/vendors/nice-select/css/nice-select.css" rel="stylesheet">
    <link href="./assets/vendors/elagent-icon/style.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Special Cake Order | Cake Korner</title>
    <style>
        #fileSelectLabel {
            background-color: indigo;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        #file-chosen {
            margin-left: 0.3rem;
            font-family: sans-serif;
        }

        .signature-component {
            text-align: left;
            display: inline-block;
            max-width: 100%;
        }

        .signature-component h1 {
            margin-bottom: 0;
        }

        .signature-component h2 {
            margin: 0;
            font-size: 100%;
        }

        .signature-component button {
            padding: 1em;
            background: transparent;
            box-shadow: 2px 2px 4px #777;
            margin-top: 0.5em;
            border: 1px solid #777;
            font-size: 1rem;
        }

        .signature-component button.toggle {
            background: rgba(255, 0, 0, 0.2);
        }

        .signature-component canvas {
            display: block;
            position: relative;
            border: 1px solid;
        }

        .signature-component img {
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
</head>

<body>
    <div class="body_wrapper frm-vh-md-100">
        <div class="formify_body formify_signup_fullwidth formify_signup_fullwidth_two d-flex">
            <div class="formify_left_fullwidth formify_left_top_logo frm-vh-md-100 d-flex align-items-center justify-content-center" data-bg-color="#FFEFF9">
                <a href="#" class="top_logo"><img src="./assets/img/cake-korner-logo.png" alt=""></a>
                <img class="img-fluid left-banner" src="./assets/img/left-banner.png" alt="">
            </div>
            <div class="formify_right_fullwidth d-flex align-items-center justify-content-center">
                <div class="form_tab_two">
                    <ul class="nav nav-tabs form_tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="Location-tab" data-toggle="tab" href="#Location" role="tab" aria-controls="Location" aria-selected="true">
                                <span>1</span>
                                Location
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Customer-tab" data-toggle="tab" href="#Customer" role="tab" aria-controls="Customer" aria-selected="true">
                                <span>2</span>
                                Customer Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Cakedetails-tab" data-toggle="tab" href="#Cakedetails" role="tab" aria-controls="Cakedetails" aria-selected="true">
                                <span>3</span>
                                Cake Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Otherdetails-tab" data-toggle="tab" href="#Otherdetails" role="tab" aria-controls="Otherdetails" aria-selected="true">
                                <span>4</span>
                                Other Details
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane" id="Location" role="tabpanel" aria-labelledby="Location-tab" style="display: block;">
                            <div class="formify_box" style="width: 100%">
                                <h4 class="form_title">Select the <span>Location</span></h4>
                                <p style="margin-bottom: 0px;">You want to order the cake at</p>
                                <div class="d-flex locations" style="justify-content: space-between;">
                                    <script>
                                        var locationStartTime = '';
                                        var locationEndTime = '';
                                    </script>
                                    <?php
                                    $query = "SELECT `id`, `streetName`, `city`, `postalCode`, `state`, `country`, `phoneNumber`,`locationTiming` FROM `locations` WHERE 1";
                                    $result = $con->query($query);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $explodedTime = explode("-", $row['locationTiming']);
                                            $startTime = $explodedTime[0];
                                            $endTime = $explodedTime[1];
                                    ?>
                                            <div class="address-box" style="margin-left: 10px;">
                                                <input type="radio" class="address-radio" onclick="$('#phoneNumberSelected').attr('href', 'tel:<?= $row['phoneNumber'] ?>' ); 
                                                $('#phoneNumberSelected').html('<?= $row['phoneNumber'] ?>'); 
                                                locationStartTime = '<?= $startTime ?>';
                                                locationEndTime = '<?= $endTime ?>';
                                                $('#workingHourTiming').html(' Working hours : '+locationStartTime+' to '+ locationEndTime);
                                               " name="address" value="<?= $row['id'] ?>">
                                                <div class="shop-details">
                                                    <h5>Cake Korner</h5>
                                                    <p><?= $row['city'] ?>, <?= $row['state'] ?> <?= $row['postalCode'] ?></p>
                                                    <p><?= $row['streetName'] ?>, <?= $row['city'] ?><br /><?= $row['state'] ?> <?= $row['postalCode'] ?>,<?= $row['country'] ?></p>
                                                    <p>Phone: <?= $row['phoneNumber'] ?></p>
                                                </div>
                                                </input>
                                            </div>
                                        <?php $i++;
                                        }
                                    } else {
                                        ?>
                                        <p>No Locations found.</p>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="next_button text-right">
                                    <!-- <input type="hidden" id="phoneNumberSelected" /> -->
                                    <p id="error_display" style="display: none;color: red">Please fill above details</p>
                                    <button type="button" onclick="locationSelected()" class="btn thm_btn red_btn">Next <i class="arrow_right"></i></button>
                                </div>
                                <script>
                                    function locationSelected() {
                                        const notyf = new Notyf({
                                            duration: 2000,
                                            position: {
                                                x: 'right',
                                                y: 'top',
                                            },
                                        });
                                        var location = "";
                                        if ($('input[name=address]:checked').length > 0) {
                                            location = document.querySelector('input[name=address]:checked').value;
                                            console.log(location);

                                        }
                                        if (location == "") {
                                            notyf.error('Please select the location first');
                                        } else {
                                            document.getElementById('Customer').style.display = 'flex';
                                            $('#Customer-tab').addClass('active show');
                                            document.getElementById('Location').style.display = 'none';
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="tab-pane" id="Customer" role="tabpanel" aria-labelledby="Customer-tab" style="display: none;">
                            <div class="formify_box">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="input_title" for="fName">First Name</label>
                                        <input type="text" class="form-control" id="fName" placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="input_title" for="lName">Last Name</label>
                                        <input type="text" class="form-control" id="lName" placeholder="Enter Last Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="input_title" for="phone">Phone number</label>
                                        <input type="text" class="form-control" required id="phone" placeholder="12256128602" maxlength="13">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="input_title" for="cEmail">Email address</label>
                                        <input type="email" class="form-control" id="cEmail" placeholder="Email address">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="input_title" for="orderType">Select Order Type</label>
                                        <div class="d-flex" style="margin-top: -5px;">
                                            <div class="d-flex" style="align-items: center;">
                                                <input type="radio" class="form-control checkbox" name="orderType" id="pickup" value="Pickup" onclick="$('#submitBtn').show();">Pickup</input>
                                            </div>
                                            <div class="d-flex ml-4" style="align-items: center;">
                                                <input type="radio" class="form-control checkbox" name="orderType" id="delivery" value="Delivery" onclick="$('#submitBtn').hide();">Delivery</input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ml-0 pickup-toggle" style="width: 100%;">
                                        <div class="form-group col-md-6">
                                            <label class="input_title" for="datepicker">Order Pickup Date</label>
                                            <input type="text" id="datepicker" class="form-control datepicker-control" placeholder="06/02/2022">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="input_title" for="orderPickupTime">Order Pickup Time</label>
                                            <input type="time" id="orderPickupTime" class="form-control" style="padding-right: 10px" onchange="console.log(this.value)" placeholder="11:59 PM"></input>
                                            <p id="workingHourTiming" style="margin-top: 5px"></p>
                                        </div>
                                        <!-- <div class="form-group col-md-12">
                                            <label class="input_title" for="orderPickupName">Order Pickup Person
                                                Name</label>
                                            <input type="text" id="orderPickupName" class="form-control" placeholder="John Doe"></input>
                                        </div> -->
                                    </div>
                                    <div class="row ml-0 delivery-toggle" style="max-width: 100%;">
                                        <div class="form-group col-md-12">
                                            <label class="input_title" for="orderDeliveryAddress">Delivery
                                                Address</label>
                                            <input type="text" id="orderDeliveryAddress" class="form-control" placeholder="Street Name"></input>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" id="orderDeliveryAppartment" class="form-control" placeholder="Appartment Number"></input>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" id="orderDeliveryCity" class="form-control" placeholder="City"></input>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" id="orderDeliveryState" class="form-control" placeholder="State"></input>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" id="orderDeliveryZIP" class="form-control" placeholder="ZIP Code"></input>
                                        </div>
                                        <p class="delivery-condition" style="margin-top: 0px;">All the deliveries will be charged <span class="shipping-price">$30</span> separately having distance 20 miles
                                            away from the restaurant.</p>
                                        <div class="d-flex two-btn" style="width: 100%;">
                                            <button type="button" class="btn thm_btn red_btn  ml-4 agree-btn" onclick="$('#submitBtn').show();">I Agree<i class="arrow_right"></i></button>
                                            <button type="button" class="btn thm_btn red_btn next_tab ml-4 decline-btn" onclick="declineOption()">I Decline<i class="arrow_right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="next_button text-right" style="justify-content: space-between; display: flex; align-items: center">
                                    <button type="button" onclick="$('#Location').show();$('#Customer').hide();" class="btn thm_btn red_btn"><i class="arrow_left"></i> Previous</button>
                                    <button type="button" id="submitBtn" onclick="CustomerDetails()" class="btn thm_btn red_btn" style="display: none;">Next<i class="arrow_right"></i></button>
                                </div>
                            </div>
                            <script>
                                function declineOption() {
                                    const notyf = new Notyf({
                                        duration: 1500,
                                        position: {
                                            x: 'right',
                                            y: 'top',
                                        },
                                    });
                                    notyf.error('You have declined the terms and conditions for the delivery of cake.');
                                    setTimeout(redirection, 1500);

                                    function redirection() {
                                        window.location.reload();
                                    }
                                }

                                function CustomerDetails() {
                                    const notyf = new Notyf({
                                        duration: 1500,
                                        position: {
                                            x: 'right',
                                            y: 'top',
                                        },
                                    });
                                    var fName = document.getElementById('fName').value;
                                    var lName = document.getElementById('lName').value;
                                    var email = document.getElementById('cEmail');
                                    var phone = document.getElementById('phone');

                                    var phonePatternValue = phone.value;
                                    var emailPatternValue = email.value;
                                    var phonePattern = new RegExp("^((\\(\\d{3}\\))|\\d{3})[- .]?\\d{3}[- .]?\\d{4}$");
                                   

                                    var orderPickupDate = document.getElementById('datepicker').value;
                                    var orderPickupTime = document.getElementById('orderPickupTime').value;
                                    // var orderPickupPerson = document.getElementById('orderPickupName').value;
                                    var deliveryStreetName = document.getElementById('orderDeliveryAddress').value;
                                    var deliveryAppartmentNumber = document.getElementById('orderDeliveryAppartment').value;
                                    var deliveryCity = document.getElementById('orderDeliveryCity').value;
                                    var deliveryState = document.getElementById('orderDeliveryState').value;
                                    var deliveryZip = document.getElementById('orderDeliveryZIP').value;
                                    var orderType = ""

                                    if ($('input[name=orderType]:checked').length > 0) {
                                        orderType = document.querySelector('input[name=orderType]:checked').value;
                                        console.log(orderType);
                                    }
                                    var emailPatternConfirmation = 'valid';


                                    if (email.value == '' || email.value == ' ') {
                                        emailPatternConfirmation = 'valid';
                                    }
                                    console.log(emailPatternConfirmation);
                                    console.log(email.value);
                                    /* VALIDATIONS */
                                    if (orderType == "") {
                                        notyf.error('Please select the order type');
                                        document.querySelector('input[name=orderType]').focus();
                                    } else if (orderType == "Pickup") {
                                        if (emailPatternConfirmation == 'notValid' || (phonePattern.test(phonePatternValue) != true) || fName == "" || lName == "" || phone == "" || orderPickupDate == "" || orderPickupTime == "") {
                                            if (emailPatternConfirmation == 'notValid') {
                                                notyf.error('Please enter valid email address');
                                                email.value = "";
                                                email.focus();
                                            } else if (phonePattern.test(phonePatternValue) != true) {
                                                notyf.error('Please enter valid mobile number');
                                                phone.value = "";
                                                phone.focus();
                                            } else {
                                                if (fName == "") {
                                                    document.getElementById('fName').focus();
                                                } else if (lName == "") {
                                                    document.getElementById('lName').focus();
                                                } else if (phone == "") {
                                                    document.getElementById('phone').focus();
                                                } else if (orderPickupDate == "") {
                                                    document.getElementById('datepicker').focus();
                                                } else if (orderPickupTime == "") {
                                                    document.getElementById('orderPickupTime').focus();
                                                }
                                                notyf.error('Please fill all the details');
                                            }
                                        } else {
                                            console.log(locationStartTime);
                                            console.log(locationEndTime);
                                            console.log(orderPickupTime);

                                            if (orderPickupTime < String(locationEndTime) && orderPickupTime > String(locationStartTime)) {
                                                document.getElementById('Cakedetails').style.display = 'flex';
                                                $('#Cakedetails-tab').addClass('active show');
                                                document.getElementById('Customer').style.display = 'none';
                                            } else {
                                                notyf.error('Please select time within working hours');
                                            }
                                        }
                                    } else if (orderType == "Delivery") {
                                        if (fName == "" || lName == "" || phone == "" || deliveryStreetName == "" || deliveryCity == "" || deliveryState == "" || deliveryZip == "") {
                                            if (fName == "") {
                                                document.getElementById('fName').focus();
                                            } else if (lName == "") {
                                                document.getElementById('lName').focus();
                                            } else if (phone == "") {
                                                document.getElementById('phone').focus();
                                            } else if (deliveryStreetName == "") {
                                                document.getElementById('orderDeliveryAddress').focus();
                                            } else if (deliveryState == "") {
                                                document.getElementById('orderDeliveryState').focus();
                                            } else if (deliveryCity == "") {
                                                document.getElementById('orderDeliveryCity').focus();
                                            } else if (deliveryZip = "") {
                                                document.getElementById('orderDeliveryZIP').focus();
                                            }
                                            notyf.error('Please fill all the details');
                                        } else {
                                            document.getElementById('Cakedetails').style.display = 'flex';
                                            $('#Cakedetails-tab').addClass('active show');
                                            document.getElementById('Customer').style.display = 'none';
                                        }
                                    } else {
                                        notyf.error('Please fill all the details');
                                    }
                                }
                            </script>
                        </div>
                        <div class="tab-pane" id="Cakedetails" role="tabpanel" aria-labelledby="Cakedetails-tab" style="display: none;">
                            <div class="formify_box">
                                <div class="signup_form row">
                                    <div class="col-lg-12" style="margin-top: 10px;">
                                        <h6 class="form_title" style="font-size: 18px;">Select <span>Cake Type</span>
                                        </h6>
                                    </div>
                                    <?php
                                    $query = "SELECT `id`, `typeName` FROM `caketype` WHERE 1";
                                    $result = $con->query($query);
                                    if ($result->num_rows > 0) {
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <div class="form-group col-lg-4" style="display:flex;margin-top:5px;">
                                                <input style="width: 15px; height: 15px; margin-right: 10px; margin-top: 5px" <?php echo ($row['id'] == 1) ? 'checked="checked"' : '' ?> type="radio" id="eggType<?= $row['id'] ?>" class=" form-control" name="cakeType" value="<?= $row['id'] ?>" />
                                                <label class="input_title" for="eggType<?= $row['id'] ?>"><?= $row['typeName'] ?></label>
                                            </div>
                                    <?php $i++;
                                        }
                                    }
                                    ?>
                                    <div class="row ml-0">
                                        <div class="col-lg-12" style="margin-top: 30px;">
                                            <h6 class="form_title" style="font-size: 18px; margin-bottom: 0px;">Select
                                                <span>By Sheet</span>
                                            </h6>
                                        </div>
                                        <?php
                                        $query = "SELECT `id`, `size`, `servings`, `sheetImg` FROM `cakesheet` WHERE 1";
                                        $result = $con->query($query);
                                        if ($result->num_rows > 0) {
                                            $i = 1;
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <div class="form-group col-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <input type="radio" class="form-control checkbox-02" name="cakeShape" id="cakeSheet<?= $row['id'] ?>" value="<?= $row['id'] ?>" onchange="$('#cakeSizeType').val('squareCake')">
                                                        <p class="sheet-select"><?= $row['size'] ?></p>
                                                    </div>
                                                    <p class="extra-info">( <?= $row['servings'] ?> Servings )</p>
                                                    <?php echo
                                                    '<label class="input_title sheet-image" for="cakeSheet' . $row['id'] . '"><img src="data:image/jpeg;base64,' . base64_encode($row['sheetImg']) . '" style="width: 80px; height: auto;"></label>'
                                                    ?>
                                                </div>
                                        <?php $i++;
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="row ml-0">
                                        <div class="col-lg-12" style="margin-top: 30px;">
                                            <h6 class="form_title" style="font-size: 18px; margin-bottom: 0px;">Select
                                                <span>Round Cake</span> Size
                                            </h6>
                                        </div>
                                        <?php
                                        $query = "SELECT `id`, `cakeSize`, `servings`, `sizeImg` FROM `cakesize` WHERE 1";
                                        $result = $con->query($query);
                                        if ($result->num_rows > 0) {
                                            $i = 1;
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <div class="form-group col-lg-4">
                                                    <div class="d-flex align-items-center">
                                                        <input type="radio" class="form-control checkbox-02" name="cakeShape" id="cakeSize<?= $row['id'] ?>" value="<?= $row['id'] ?>" onchange="$('#cakeSizeType').val('roundCake')">
                                                        <p class="round-cake-select"><?= $row['cakeSize'] ?></p>
                                                    </div>
                                                    <p class="extra-info">( <?= $row['servings'] ?> servings )</p>
                                                    <?php echo
                                                    '<label class="input_title sheet-image" for="cakeSize' . $row['id'] . '"><img src="data:image/jpeg;base64,' . base64_encode($row['sizeImg']) . '" style="width: 100px; height: auto;"></label>'
                                                    ?>
                                                </div>
                                        <?php $i++;
                                            }
                                        }
                                        ?>
                                    </div>
                                    <input type="hidden" id="cakeSizeType">
                                    <div id="vegetarian" class="row ml-0">

                                        <div class="col-lg-12" style="margin-top: 30px;">
                                            <h6 class="form_title" style="font-size: 20px;">Select <span>Fresh
                                                    Cream</span>
                                            </h6>
                                        </div>
                                        <div id="innerCream" class="col-lg-12" style="display:block">

                                            <div>
                                                <h6 class="form_title" style="font-size: 16px;">Regular Flavors</h6>
                                            </div>
                                            <div class="row">
                                                <?php
                                                $query = "SELECT `id`, `name` FROM `regularflavors` WHERE 1";
                                                $result = $con->query($query);
                                                if ($result->num_rows > 0) {
                                                    $i = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <div class="form-group col-lg-4" style="display:flex;margin-top:5px">
                                                            <input style="width:20px; height:20px; margin-right:10px" type="radio" onclick="$('#vegetarianFlavorsType').val('regular')" name="cakeFlavors" value="<?= $row['id'] ?>" class="form-control vegetarianFlavors" id="vegetarianFlavorsRegular-<?= $row['id'] ?>">
                                                            <label class="input_title" for="vegetarianFlavorsRegular-<?= $row['id'] ?>"><?= $row['name'] ?></label>
                                                        </div>
                                                <?php $i++;
                                                    }
                                                }
                                                ?>
                                                <input type="hidden" id="vegetarianFlavorsType" />
                                            </div>
                                            <div>
                                                <h6 class="form_title" style="font-size: 16px; margin-top: 15px;">Special Flavors</h6>
                                            </div>
                                            <div class="row">
                                                <?php
                                                $query = "SELECT `id`, `name` FROM `specialflavors` WHERE 1";
                                                $result = $con->query($query);
                                                if ($result->num_rows > 0) {
                                                    $i = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <div class="form-group col-lg-4" style="display:flex;margin-top:5px">
                                                            <input style="width:20px;height:20px;margin-right:10px" type="radio" name="cakeFlavors" onclick="$('#vegetarianFlavorsType').val('special')" value="<?= $row['id'] ?>" class="form-control vegetarianFlavors" id="vegetarianFlavorsSpecial-<?= $row['id'] ?>"><label class="input_title" for="vegetarianFlavorsSpecial-<?= $row['id'] ?>"><?= $row['name'] ?></label>
                                                        </div>
                                                <?php $i++;
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="veganCream" class="row ml-0">
                                        <div class="col-lg-12" style="margin-top: 30px;">
                                            <h6 class="form_title" style="font-size: 20px;">Select <span>Fresh
                                                    Cream</span>
                                            </h6>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <?php
                                                $query = "SELECT `id`, `name` FROM `veganflavors` WHERE 1";
                                                $result = $con->query($query);
                                                if ($result->num_rows > 0) {
                                                    $i = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <div class="form-group col-lg-3" style="display:flex;margin-top:5px">
                                                            <input style="width:20px;height:20px;margin-right:10px" type="radio" onclick="$('#vegetarianFlavorsType').val('-')" name="cakeFlavors" class="form-control veganFlavors" value="<?= $row['id'] ?>" id="veganFlavors-<?= $row['id'] ?>"><label class="input_title" for="veganFlavors-<?= $row['id'] ?>"><?= $row['name'] ?></label>
                                                        </div>
                                                <?php $i++;
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="specialCake" class="row ml-0">
                                        <div class="col-lg-12" style="margin-top: 30px;">
                                            <h6 class="form_title" style="font-size: 20px;">Select <span>Flavor</span>
                                            </h6>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row" style="margin-left: 5px;">
                                                <?php
                                                $query = "SELECT `id`, `name` FROM `sugarfreeflavors` WHERE 1";
                                                $result = $con->query($query);
                                                if ($result->num_rows > 0) {
                                                    $i = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <div class="form-group col-lg-3" style="display:flex;margin-top:5px">
                                                            <input style="width:20px;height:20px;margin-right:10px" type="radio" onclick="$('#vegetarianFlavorsType').val('-')" name="cakeFlavors" class="form-control sugarFreeFlavors" value="<?= $row['id'] ?>" id="sugarFreeFlavors-<?= $row['id'] ?>"><label class="input_title" for="sugarFreeFlavors-<?= $row['id'] ?>"><?= $row['name'] ?></label>
                                                        </div>
                                                <?php $i++;
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="next_button d-flex align-items-center justify-content-between">
                                    <button type="button" onclick="$('#Customer').show();$('#Cakedetails').hide();" class="btn thm_btn red_btn"><i class="arrow_left"></i> Previous</button>
                                    <button type="button" onclick="cakeDetailsSelected()" class="btn thm_btn red_btn">Next<i class="arrow_right"></i></button>
                                </div>
                            </div>
                            <script>
                                function cakeDetailsSelected() {
                                    const notyf = new Notyf({
                                        duration: 2000,
                                        position: {
                                            x: 'right',
                                            y: 'top',
                                        },
                                    });

                                    var cakeType = "";
                                    var cakeShape = "";
                                    var cakeFlavors = "";



                                    if ($('input[name=cakeType]:checked').length > 0) {
                                        cakeType = document.querySelector('input[name=cakeType]:checked').value;
                                    }
                                    if ($('input[name=cakeShape]:checked').length > 0) {
                                        cakeShape = document.querySelector('input[name=cakeShape]:checked').value;
                                    }

                                    if ($('input[name=cakeFlavors]:checked').length > 0) {
                                        cakeFlavors = document.querySelector('input[name=cakeFlavors]:checked').value;
                                    }

                                    if (cakeType == 1) {
                                        var vegetarianFlavorsType = $("#vegetarianFlavorsType").val();
                                    } else {
                                        var vegetarianFlavorsType = "none";
                                    }



                                    /* VALIDATIONS */
                                    if (cakeType == "") {
                                        document.querySelector('input[name=cakeType]').focus();
                                        notyf.error('Please select the type of cake');
                                    } else {

                                        if (cakeType == "" || cakeShape == "" || cakeFlavors == "" || vegetarianFlavorsType == '') {
                                            if (cakeType == "") {
                                                document.querySelector('input[name=cakeType]').focus();
                                            } else if (sheetType == "") {
                                                document.querySelector('input[name=cakeShape]').focus();
                                            } else if (vegetarianFlavors == "") {
                                                document.querySelector('input[name=vegetarianFlavors]').focus();
                                            }
                                            notyf.error('Please fill all the details');
                                        } else {
                                            document.getElementById('Otherdetails').style.display = 'flex';
                                            $('#Otherdetails-tab').addClass('active show');
                                            document.getElementById('Cakedetails').style.display = 'none';
                                        }
                                    }
                                }
                            </script>
                        </div>
                        <div class="tab-pane" id="Otherdetails" role="tabpanel" aria-labelledby="Otherdetails-tab" style="display: none;">
                            <div class="formify_box" id="OtherdetailsDiv">
                                <div class="signup_form row">
                                    <div class="form-group col-lg-6">
                                        <label class="input_title" for="occasion">Select Occasion</label>
                                        <select class="form-control" id="occasion" onchange="if(this.value == 'other'){$('#otherOptionDiv').show();}else{$('#otherOptionDiv').hide();}">
                                            <option value="-" selected disabled>Select Occasion</option>
                                            <option value="Birthday">Birthday</option>
                                            <option value="Anniversary">Anniversary</option>
                                            <option value="Graduation">Graduation</option>
                                            <option value="ItsaBoy">It's a Boy</option>
                                            <option value="ItsaGirl">It's a Girl</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6" id="otherOptionDiv" style="display: none;">
                                        <label class="input_title" for="otherName">Other*</label>
                                        <input type="text" name="otherName" id="otherName" class="form-control" placeholder="Write occasion" />
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="input_title" for="customMessage">Custom Message</label>
                                        <textarea name="custom-message" id="customMessage" class="form-control" style="height: 100px;" placeholder="Custom Message here..."></textarea>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="input_title" for="specialInstructions">Any Special Instructions</label>
                                        <textarea name="custom-message" id="specialInstructions" class="form-control" style="height: 100px;" placeholder="Mention your instructions here..."></textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="input_title" for="inspirationUploadDesign">Upload Design or Inspiration Ideas if any*</label>

                                        <br>

                                        <!-- actual upload which is hidden -->
                                        <input accept="image/*" onchange="loadFile(event)" type="file" id="inspirationUploadDesign" hidden />
                                        <label id="fileSelectLabel" for="inspirationUploadDesign">Choose File</label>
                                        <span id="file-chosen">No file chosen</span>
                                        <img id="uploadDesign" style="max-width: 100%;">
                                        <input type="hidden" id="inspirationUploadDesignURL">

                                    </div>
                                    <script>
                                        var globalImages = [];
                                        var imagesUploadStatus = "No";
                                        var loadFile = function(event) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                var output = document.getElementById('uploadDesign');
                                                output.src = reader.result;
                                                imagesUploadStatus = "Yes";
                                                globalImages.push(reader.result);
                                            };
                                            reader.readAsDataURL(event.target.files[0]);
                                        };
                                        const actualBtn = document.getElementById('inspirationUploadDesign');

                                        const fileChosen = document.getElementById('file-chosen');

                                        actualBtn.addEventListener('change', function() {
                                            fileChosen.textContent = this.files[0].name;

                                        })
                                    </script>
                                    <div class="form-group col-lg-12">
                                        <label class="input_title" for="cupcakesOption">Do you require cup cakes? (Minimum of 12)</label>
                                        <div class="d-flex" style="margin-top: -5px;">
                                            <div class="d-flex" style="align-items: center;">
                                                <input type="radio" name="cupcake" class="form-control checkbox cupcake" id="cupcakesOption-Yes" value="Yes" />Yes
                                            </div>
                                            <div class="d-flex ml-4" style="align-items: center;">
                                                <input type="radio" name="cupcake" class="form-control checkbox cupcake" id="cupcakesOption-No" value="No" />No
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12" id="cupCakeSize">
                                        <label class="input_title" for="cakeSizeOption">Cake Size</label>
                                        <div class="d-flex" style="margin-top: -5px;">
                                            <div class="d-flex" style="align-items: center;">
                                                <input type="radio" name="cupCakeSize" class="form-control checkbox" id="cakeSizeOption" value="Mini">Mini</input>
                                            </div>
                                            <div class="d-flex ml-4" style="align-items: center;">
                                                <input type="radio" name="cupCakeSize" class="form-control checkbox" id="cakeSizeOption" value="Regular">Regular</input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12" id="cupCakeFlavor">
                                        <div>
                                            <h6 class="form_title" style="font-size: 18px;">Select <span>Flavor</span></h6>
                                        </div>
                                        <div>
                                            <h6 class="form_title" style="font-size: 16px;">Regular Flavors</h6>
                                        </div>
                                        <div class="row">
                                            <?php
                                            $query = "SELECT `id`, `name` FROM `regularflavors` WHERE 1";
                                            $result = $con->query($query);
                                            if ($result->num_rows > 0) {
                                                $i = 1;
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <div class="form-group col-lg-4" style="display:flex;margin-top:5px">
                                                        <input style="width:20px; height:20px; margin-right:10px" type="radio" onclick="$('#cupCakeType').val('regular');" name="cupCakeFlavors" value="<?= $row['id'] ?>" class="form-control cupcakeRegularFlavors" id="cupcakeRegularFlavor-<?= $row['id'] ?>"><label class="input_title" for="cupcakeRegularFlavor-<?= $row['id'] ?>"><?= $row['name'] ?></label>
                                                    </div>
                                            <?php $i++;
                                                }
                                            }
                                            ?>
                                            <input type="hidden" id="cupCakeType" />
                                        </div>
                                        <div>
                                            <h6 class="form_title" style="font-size: 16px; margin-top: 10px;">Special Flavors</h6>
                                        </div>
                                        <div class="row">
                                            <?php
                                            $query = "SELECT `id`, `name` FROM `cupcakespecialflavors` WHERE 1";
                                            $result = $con->query($query);
                                            if ($result->num_rows > 0) {
                                                $i = 1;
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <div class="form-group col-lg-4" style="display:flex;margin-top:5px">
                                                        <input style="width:20px; height:20px;margin-right:10px" onclick="$('#cupCakeType').val('special');" type="radio" name="cupCakeFlavors" value="<?= $row['id'] ?>" class="form-control cupcakeSpecialFlavors" id="cupcakeSpecialFlavor-<?= $row['id'] ?>"><label class="input_title" for="cupcakeSpecialFlavor-<?= $row['id'] ?>"><?= $row['name'] ?></label>
                                                    </div>
                                            <?php $i++;
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12" id="cupCakeQuantity">
                                        <label class="input_title" for="quantity">Quantity</label>
                                        <input type="number" id="cupCakeQuantityFinal" name="quantity" class="form-control" placeholder="Quantity" />
                                    </div>


                                    <div class="form-group col-lg-12">
                                        <p><strong style="color: red">Note: </strong>Please make sure the details filled in the form are correct and verified carefully. In case of any queries, feel free to contact us at <a id="phoneNumberSelected" href="tel:5628653200" style="color: #E084AC;">(562) 865-3200</a> or <a href="mailto:cakes@cakekorner.com" style="color: #E084AC;">cakes@cakekorner.com</a></p>
                                    </div>

                                    <section class="signature-component">
                                        <div class="col-sm-12 mt-3">
                                            <h4 style="text-align: start;color: #E084AC;">Draw Signature</h4>
                                            <h6 class="" style="font-weight: 500;text-align: start; ">with mouse or
                                                touch</h6>
                                        </div>
                                        <div class="col-sm-12">
                                            <canvas id="signature-pad" name="signature-pad" width="372" height="200"></canvas>

                                            <div class="mt-3">
                                                <span class="text-danger" id="errorSignature" style="font-size: 10px;padding-bottom:7px;display:none;font-weight:700">Click
                                                    on Save Button</span>
                                                <a id="save" style="padding: 10px;border:1px solid #E084AC;padding-top:5px;padding-bottom:5px;font-size:1rem">Save</a>
                                                <a id="clear" style="padding: 10px;border:1px solid #E084AC;padding-top:5px;padding-bottom:5px;font-size:1rem">Clear</a>
                                            </div>
                                            <img name='canvasImage' style="display: none;" id="canvasImage">
                                        </div>
                                    </section>
                                    <input type="text" class="form-control" style="display:none" id="canvasImageInput" name="canvasImageInput">

                                    <div class="form-group col-lg-12">
                                        <input type="checkbox" name="disclaimers" id="disclaimers" class="" placeholder="Write occasion" />
                                        <label class="input_title mx-2" for="disclaimers">I agree to all the above mentioned details. </label><span><span style="color:#E084AC">Disclaimers </span>and <span style="color:#E084AC">Cancellation </span> policies</span>
                                    </div>
                                    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
                                    <script>
                                        /*!
                                         * Modified
                                         * Signature Pad v1.5.3
                                         * https://github.com/szimek/signature_pad
                                         *
                                         * Copyright 2016 Szymon Nowak
                                         * Released under the MIT license
                                         */
                                        var SignaturePad = (function(document) {
                                            "use strict";

                                            var log = console.log.bind(console);

                                            var SignaturePad = function(canvas, options) {
                                                var self = this,
                                                    opts = options || {};

                                                this.velocityFilterWeight = opts.velocityFilterWeight || 0.7;
                                                this.minWidth = opts.minWidth || 0.5;
                                                this.maxWidth = opts.maxWidth || 2.5;
                                                this.dotSize = opts.dotSize || function() {
                                                    return (self.minWidth + self.maxWidth) / 2;
                                                };
                                                this.penColor = opts.penColor || "black";
                                                this.backgroundColor = opts.backgroundColor || "rgba(0,0,0,0)";
                                                this.throttle = opts.throttle || 0;
                                                this.throttleOptions = {
                                                    leading: true,
                                                    trailing: true
                                                };
                                                this.minPointDistance = opts.minPointDistance || 0;
                                                this.onEnd = opts.onEnd;
                                                this.onBegin = opts.onBegin;

                                                this._canvas = canvas;
                                                this._ctx = canvas.getContext("2d");
                                                this._ctx.lineCap = 'round';
                                                this.clear();

                                                // we need add these inline so they are available to unbind while still having
                                                //  access to 'self' we could use _.bind but it's not worth adding a dependency
                                                this._handleMouseDown = function(event) {
                                                    if (event.which === 1) {
                                                        self._mouseButtonDown = true;
                                                        self._strokeBegin(event);
                                                    }
                                                };

                                                var _handleMouseMove = function(event) {
                                                    event.preventDefault();
                                                    if (self._mouseButtonDown) {
                                                        self._strokeUpdate(event);
                                                        if (self.arePointsDisplayed) {
                                                            var point = self._createPoint(event);
                                                            self._drawMark(point.x, point.y, 5);
                                                        }
                                                    }
                                                };

                                                this._handleMouseMove = _.throttle(_handleMouseMove, self.throttle, self.throttleOptions);
                                                //this._handleMouseMove = _handleMouseMove;

                                                this._handleMouseUp = function(event) {
                                                    if (event.which === 1 && self._mouseButtonDown) {
                                                        self._mouseButtonDown = false;
                                                        self._strokeEnd(event);
                                                    }
                                                };

                                                this._handleTouchStart = function(event) {
                                                    if (event.targetTouches.length == 1) {
                                                        var touch = event.changedTouches[0];
                                                        self._strokeBegin(touch);
                                                    }
                                                };

                                                var _handleTouchMove = function(event) {
                                                    // Prevent scrolling.
                                                    event.preventDefault();

                                                    var touch = event.targetTouches[0];
                                                    self._strokeUpdate(touch);
                                                    if (self.arePointsDisplayed) {
                                                        var point = self._createPoint(touch);
                                                        self._drawMark(point.x, point.y, 5);
                                                    }
                                                };
                                                this._handleTouchMove = _.throttle(_handleTouchMove, self.throttle, self.throttleOptions);
                                                //this._handleTouchMove = _handleTouchMove;

                                                this._handleTouchEnd = function(event) {
                                                    var wasCanvasTouched = event.target === self._canvas;
                                                    if (wasCanvasTouched) {
                                                        event.preventDefault();
                                                        self._strokeEnd(event);
                                                    }
                                                };

                                                this._handleMouseEvents();
                                                this._handleTouchEvents();
                                            };

                                            SignaturePad.prototype.clear = function() {
                                                var ctx = this._ctx,
                                                    canvas = this._canvas;

                                                ctx.fillStyle = this.backgroundColor;
                                                ctx.clearRect(0, 0, canvas.width, canvas.height);
                                                ctx.fillRect(0, 0, canvas.width, canvas.height);
                                                this._reset();
                                            };

                                            SignaturePad.prototype.showPointsToggle = function() {
                                                this.arePointsDisplayed = !this.arePointsDisplayed;
                                            };

                                            SignaturePad.prototype.toDataURL = function(imageType, quality) {
                                                var canvas = this._canvas;
                                                return canvas.toDataURL.apply(canvas, arguments);
                                            };

                                            SignaturePad.prototype.fromDataURL = function(dataUrl) {
                                                var self = this,
                                                    image = new Image(),
                                                    ratio = window.devicePixelRatio || 1,
                                                    width = this._canvas.width / ratio,
                                                    height = this._canvas.height / ratio;

                                                this._reset();
                                                image.src = dataUrl;
                                                image.onload = function() {
                                                    self._ctx.drawImage(image, 0, 0, width, height);
                                                };
                                                this._isEmpty = false;
                                            };

                                            SignaturePad.prototype._strokeUpdate = function(event) {
                                                var point = this._createPoint(event);
                                                if (this._isPointToBeUsed(point)) {
                                                    this._addPoint(point);
                                                }
                                            };

                                            var pointsSkippedFromBeingAdded = 0;
                                            SignaturePad.prototype._isPointToBeUsed = function(point) {
                                                // Simplifying, De-noise
                                                if (!this.minPointDistance)
                                                    return true;

                                                var points = this.points;
                                                if (points && points.length) {
                                                    var lastPoint = points[points.length - 1];
                                                    if (point.distanceTo(lastPoint) < this.minPointDistance) {
                                                        // log(++pointsSkippedFromBeingAdded);
                                                        return false;
                                                    }
                                                }
                                                return true;
                                            };

                                            SignaturePad.prototype._strokeBegin = function(event) {
                                                this._reset();
                                                this._strokeUpdate(event);
                                                if (typeof this.onBegin === 'function') {
                                                    this.onBegin(event);
                                                }
                                            };

                                            SignaturePad.prototype._strokeDraw = function(point) {
                                                var ctx = this._ctx,
                                                    dotSize = typeof(this.dotSize) === 'function' ? this.dotSize() : this.dotSize;

                                                ctx.beginPath();
                                                this._drawPoint(point.x, point.y, dotSize);
                                                ctx.closePath();
                                                ctx.fill();
                                            };

                                            SignaturePad.prototype._strokeEnd = function(event) {
                                                var canDrawCurve = this.points.length > 2,
                                                    point = this.points[0];

                                                if (!canDrawCurve && point) {
                                                    this._strokeDraw(point);
                                                }
                                                if (typeof this.onEnd === 'function') {
                                                    this.onEnd(event);
                                                }
                                            };

                                            SignaturePad.prototype._handleMouseEvents = function() {
                                                this._mouseButtonDown = false;

                                                this._canvas.addEventListener("mousedown", this._handleMouseDown);
                                                this._canvas.addEventListener("mousemove", this._handleMouseMove);
                                                document.addEventListener("mouseup", this._handleMouseUp);
                                            };

                                            SignaturePad.prototype._handleTouchEvents = function() {
                                                // Pass touch events to canvas element on mobile IE11 and Edge.
                                                this._canvas.style.msTouchAction = 'none';
                                                this._canvas.style.touchAction = 'none';

                                                this._canvas.addEventListener("touchstart", this._handleTouchStart);
                                                this._canvas.addEventListener("touchmove", this._handleTouchMove);
                                                this._canvas.addEventListener("touchend", this._handleTouchEnd);
                                            };

                                            SignaturePad.prototype.on = function() {
                                                this._handleMouseEvents();
                                                this._handleTouchEvents();
                                            };

                                            SignaturePad.prototype.off = function() {
                                                this._canvas.removeEventListener("mousedown", this._handleMouseDown);
                                                this._canvas.removeEventListener("mousemove", this._handleMouseMove);
                                                document.removeEventListener("mouseup", this._handleMouseUp);

                                                this._canvas.removeEventListener("touchstart", this._handleTouchStart);
                                                this._canvas.removeEventListener("touchmove", this._handleTouchMove);
                                                this._canvas.removeEventListener("touchend", this._handleTouchEnd);
                                            };

                                            SignaturePad.prototype.isEmpty = function() {
                                                return this._isEmpty;
                                            };

                                            SignaturePad.prototype._reset = function() {
                                                this.points = [];
                                                this._lastVelocity = 0;
                                                this._lastWidth = (this.minWidth + this.maxWidth) / 2;
                                                this._isEmpty = true;
                                                this._ctx.fillStyle = this.penColor;
                                            };

                                            SignaturePad.prototype._createPoint = function(event) {
                                                var rect = this._canvas.getBoundingClientRect();
                                                return new Point(
                                                    event.clientX - rect.left,
                                                    event.clientY - rect.top
                                                );
                                            };

                                            SignaturePad.prototype._addPoint = function(point) {
                                                var points = this.points,
                                                    c2, c3,
                                                    curve, tmp;

                                                points.push(point);

                                                if (points.length > 2) {
                                                    // To reduce the initial lag make it work with 3 points
                                                    // by copying the first point to the beginning.
                                                    if (points.length === 3) points.unshift(points[0]);

                                                    tmp = this._calculateCurveControlPoints(points[0], points[1], points[2]);
                                                    c2 = tmp.c2;
                                                    tmp = this._calculateCurveControlPoints(points[1], points[2], points[3]);
                                                    c3 = tmp.c1;
                                                    curve = new Bezier(points[1], c2, c3, points[2]);
                                                    this._addCurve(curve);

                                                    // Remove the first element from the list,
                                                    // so that we always have no more than 4 points in points array.
                                                    points.shift();
                                                }
                                            };

                                            SignaturePad.prototype._calculateCurveControlPoints = function(s1, s2, s3) {
                                                var dx1 = s1.x - s2.x,
                                                    dy1 = s1.y - s2.y,
                                                    dx2 = s2.x - s3.x,
                                                    dy2 = s2.y - s3.y,

                                                    m1 = {
                                                        x: (s1.x + s2.x) / 2.0,
                                                        y: (s1.y + s2.y) / 2.0
                                                    },
                                                    m2 = {
                                                        x: (s2.x + s3.x) / 2.0,
                                                        y: (s2.y + s3.y) / 2.0
                                                    },

                                                    l1 = Math.sqrt(1.0 * dx1 * dx1 + dy1 * dy1),
                                                    l2 = Math.sqrt(1.0 * dx2 * dx2 + dy2 * dy2),

                                                    dxm = (m1.x - m2.x),
                                                    dym = (m1.y - m2.y),

                                                    k = l2 / (l1 + l2),
                                                    cm = {
                                                        x: m2.x + dxm * k,
                                                        y: m2.y + dym * k
                                                    },

                                                    tx = s2.x - cm.x,
                                                    ty = s2.y - cm.y;

                                                return {
                                                    c1: new Point(m1.x + tx, m1.y + ty),
                                                    c2: new Point(m2.x + tx, m2.y + ty)
                                                };
                                            };

                                            SignaturePad.prototype._addCurve = function(curve) {
                                                var startPoint = curve.startPoint,
                                                    endPoint = curve.endPoint,
                                                    velocity, newWidth;

                                                velocity = endPoint.velocityFrom(startPoint);
                                                velocity = this.velocityFilterWeight * velocity +
                                                    (1 - this.velocityFilterWeight) * this._lastVelocity;

                                                newWidth = this._strokeWidth(velocity);
                                                this._drawCurve(curve, this._lastWidth, newWidth);

                                                this._lastVelocity = velocity;
                                                this._lastWidth = newWidth;
                                            };

                                            SignaturePad.prototype._drawPoint = function(x, y, size) {
                                                var ctx = this._ctx;

                                                ctx.moveTo(x, y);
                                                ctx.arc(x, y, size, 0, 2 * Math.PI, false);
                                                this._isEmpty = false;
                                            };

                                            SignaturePad.prototype._drawMark = function(x, y, size) {
                                                var ctx = this._ctx;

                                                ctx.save();
                                                ctx.moveTo(x, y);
                                                ctx.arc(x, y, size, 0, 2 * Math.PI, false);
                                                ctx.fillStyle = 'rgba(255, 0, 0, 0.2)';
                                                ctx.fill();
                                                ctx.restore();
                                            };

                                            SignaturePad.prototype._drawCurve = function(curve, startWidth, endWidth) {
                                                var ctx = this._ctx,
                                                    widthDelta = endWidth - startWidth,
                                                    drawSteps, width, i, t, tt, ttt, u, uu, uuu, x, y;

                                                drawSteps = Math.floor(curve.length());
                                                ctx.beginPath();
                                                for (i = 0; i < drawSteps; i++) {
                                                    // Calculate the Bezier (x, y) coordinate for this step.
                                                    t = i / drawSteps;
                                                    tt = t * t;
                                                    ttt = tt * t;
                                                    u = 1 - t;
                                                    uu = u * u;
                                                    uuu = uu * u;

                                                    x = uuu * curve.startPoint.x;
                                                    x += 3 * uu * t * curve.control1.x;
                                                    x += 3 * u * tt * curve.control2.x;
                                                    x += ttt * curve.endPoint.x;

                                                    y = uuu * curve.startPoint.y;
                                                    y += 3 * uu * t * curve.control1.y;
                                                    y += 3 * u * tt * curve.control2.y;
                                                    y += ttt * curve.endPoint.y;

                                                    width = startWidth + ttt * widthDelta;
                                                    this._drawPoint(x, y, width);
                                                }
                                                ctx.closePath();
                                                ctx.fill();
                                            };

                                            SignaturePad.prototype._strokeWidth = function(velocity) {
                                                return Math.max(this.maxWidth / (velocity + 1), this.minWidth);
                                            };

                                            var Point = function(x, y, time) {
                                                this.x = x;
                                                this.y = y;
                                                this.time = time || new Date().getTime();
                                            };

                                            Point.prototype.velocityFrom = function(start) {
                                                return (this.time !== start.time) ? this.distanceTo(start) / (this.time - start.time) : 1;
                                            };

                                            Point.prototype.distanceTo = function(start) {
                                                return Math.sqrt(Math.pow(this.x - start.x, 2) + Math.pow(this.y - start.y, 2));
                                            };

                                            var Bezier = function(startPoint, control1, control2, endPoint) {
                                                this.startPoint = startPoint;
                                                this.control1 = control1;
                                                this.control2 = control2;
                                                this.endPoint = endPoint;
                                            };

                                            // Returns approximated length.
                                            Bezier.prototype.length = function() {
                                                var steps = 10,
                                                    length = 0,
                                                    i, t, cx, cy, px, py, xdiff, ydiff;

                                                for (i = 0; i <= steps; i++) {
                                                    t = i / steps;
                                                    cx = this._point(t, this.startPoint.x, this.control1.x, this.control2.x, this.endPoint.x);
                                                    cy = this._point(t, this.startPoint.y, this.control1.y, this.control2.y, this.endPoint.y);
                                                    if (i > 0) {
                                                        xdiff = cx - px;
                                                        ydiff = cy - py;
                                                        length += Math.sqrt(xdiff * xdiff + ydiff * ydiff);
                                                    }
                                                    px = cx;
                                                    py = cy;
                                                }
                                                return length;
                                            };

                                            Bezier.prototype._point = function(t, start, c1, c2, end) {
                                                return start * (1.0 - t) * (1.0 - t) * (1.0 - t) +
                                                    3.0 * c1 * (1.0 - t) * (1.0 - t) * t +
                                                    3.0 * c2 * (1.0 - t) * t * t +
                                                    end * t * t * t;
                                            };

                                            return SignaturePad;
                                        })(document);

                                        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                                            backgroundColor: 'rgba(255, 255, 255, 0)',
                                            penColor: 'rgb(0, 0, 0)',
                                            velocityFilterWeight: .7,
                                            minWidth: 0.5,
                                            maxWidth: 2.5,
                                            throttle: 16, // max x milli seconds on event update, OBS! this introduces lag for event update
                                            minPointDistance: 3,
                                        });
                                        var saveButton = document.getElementById('save'),
                                            clearButton = document.getElementById('clear'),
                                            showPointsToggle = document.getElementById('showPointsToggle');

                                        saveButton.addEventListener('click', function(event) {
                                            var data = signaturePad.toDataURL('image/png');
                                            var canvas_img_data = signaturePad.toDataURL('image/png');
                                            var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                                            console.log(img_data);
                                            $("#canvasImageInput").val(canvas_img_data);
                                            console.log(img_data);
                                            document.getElementById("canvasImage").src = "data:image/gif;base64," + img_data;
                                            document.getElementById('save').style.backgroundColor = '#E084AC';
                                            document.getElementById('save').style.color = 'white';
                                            document.getElementById('errorSignature').style.display = 'none';
                                        });
                                        clearButton.addEventListener('click', function(event) {
                                            signaturePad.clear();
                                        });
                                        showPointsToggle.addEventListener('click', function(event) {
                                            signaturePad.showPointsToggle();
                                            showPointsToggle.classList.toggle('toggle');
                                        });
                                    </script>
                                    <div class="form-group col-lg-12 d-flex align-items-center justify-content-between">
                                        <button type="button" onclick="$('#Cakedetails').show();$('#Otherdetails').hide();" class="btn thm_btn red_btn"><i class="arrow_left"></i> Previous</button>
                                        <button type="button" onclick="formSubmit()" class="btn thm_btn red_btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container my-auto py-5" id="successPage" style="display: none;">
                            <div class="row text-center">
                                <div class="col-lg-9 col-xl-7 mx-auto">
                                    <img src="./assets/img/success.gif" class="mb-3" style="width: 15%;" />
                                    <h5 class="mb-2" style="font-weight: 800; font-size: 22px;">Your Order has been placed.
                                    </h5>
                                    <p>Thank you for ordering cake from Cake Korner. Contact us if you have any queries.</p>
                                    <a href="../index" class="btn thm_btn red_btn">Return to Homepage</a>
                                </div>
                            </div>
                        </div>
                        <script>
                            function formSubmit() {

                                var occasion = document.getElementById('occasion').value;
                                var customMessage = document.getElementById('customMessage').value;

                                var cupcakeQuantity = document.getElementById('cupCakeQuantityFinal').value;
                                var signature = document.getElementById('canvasImageInput').value;

                                if ($('input[name=cupcake]:checked').length > 0) {
                                    var cupCakes = document.querySelector('input[name=cupcake]:checked').value;
                                }



                                var formSubmitApproval = '';
                                if (cupCakes == "No") {
                                    if (occasion == "" || customMessage == "" || signature == "") {
                                        if (occasion == "") {
                                            document.getElementById('occasion').focus();
                                        } else if (customMessage == "") {
                                            document.getElementById('customMessage').focus();
                                        } else if (signature == "") {
                                            document.getElementById('canvasImageInput').focus();
                                        }
                                        notyf.error('Please fill all the details');
                                    } else {
                                        formSubmitApproval = 'Approved';
                                        console.log(formSubmitApproval);
                                    }
                                } else if (cupCakes == "Yes") {
                                    var flavor = "";

                                    var cupCakeType = $('#cupCakeType').val();

                                    if ($('input[name=cupCakeSize]:checked').length > 0) {
                                        var cupCakeSize = document.querySelector('input[name=cupCakeSize]:checked').value;
                                    }




                                    if (cupCakeType == 'regular') {
                                        var cupCakeRegularFlavorsFinal = document.querySelector('input[name=cupCakeFlavors]:checked').value;
                                        var cupCakeSpecialFlavorsFinal = '-';
                                        var flavor = "flavor";
                                        cupCakeFlavors = document.querySelector('input[name=cupCakeFlavors]:checked').value;
                                    } else if (cupCakeType == 'special') {
                                        var flavor = "flavor";
                                        var cupCakeRegularFlavorsFinal = '-';
                                        cupCakeFlavors = document.querySelector('input[name=cupCakeFlavors]:checked').value;
                                        var cupCakeSpecialFlavorsFinal = document.querySelector('input[name=cupCakeFlavors]:checked').value;
                                    }

                                    if (occasion == "" || customMessage == "" || signature == "" || cupCakeSize == "" || flavor == "" || cupcakeQuantity == "") {
                                        if (occasion == "") {
                                            document.getElementById('occasion').focus();
                                        } else if (customMessage == "") {
                                            document.getElementById('customMessage').focus();
                                        } else if (signature == "") {
                                            document.getElementById('canvasImageInput').focus();
                                        } else if (cupCakeSize == "") {
                                            document.querySelector('input[name=cupCakeSize]').focus();
                                        } else if (flavor == "") {
                                            document.querySelector('input[name=cupCakeFlavors]').focus();
                                        } else if (cupcakeQuantity == "") {
                                            document.getElementById('quantity').focus();
                                        }
                                        notyf.error('Please fill all the details');
                                    } else {
                                        formSubmitApproval = 'Approved';

                                    }

                                }
                                if (formSubmitApproval == 'Approved') {


                                    submitForm();


                                }
                            }

                            function submitForm() {
                                const notyf = new Notyf({
                                    duration: 2000,
                                    position: {
                                        x: 'right',
                                        y: 'top',
                                    },
                                });
                                var imageFinal = [];
                                var firstName = document.getElementById('fName').value;
                                console.log(firstName);
                                var lastName = document.getElementById('lName').value;
                                console.log(lastName);
                                var emailAddress = document.getElementById('cEmail').value;
                                console.log(emailAddress);
                                var phoneNumber = document.getElementById('phone').value;
                                console.log(phoneNumber);

                                var orderType = document.querySelector('input[name=orderType]:checked').value;
                                console.log(orderType);

                                var orderDatepicker = document.getElementById('datepicker').value;
                                console.log(orderDatepicker);
                                var orderPickupTime = document.getElementById('orderPickupTime').value;
                                console.log(orderPickupTime);
                                // var orderPickupName = document.getElementById('orderPickupName').value;
                                // console.log(orderPickupName);

                                var orderDeliveryAddress = document.getElementById('orderDeliveryAddress').value;
                                console.log(orderDeliveryAddress);
                                var orderDeliveryAppartment = document.getElementById('orderDeliveryAppartment').value;
                                console.log(orderDeliveryAppartment);
                                var orderDeliveryCity = document.getElementById('orderDeliveryCity').value;
                                console.log(orderDeliveryCity);
                                var orderDeliveryState = document.getElementById('orderDeliveryState').value;
                                console.log(orderDeliveryState);
                                var orderDeliveryZIP = document.getElementById('orderDeliveryZIP').value;
                                console.log(orderDeliveryZIP);

                                var cakeType = document.querySelector('input[name=cakeType]:checked').value;
                                console.log(cakeType);
                                var cakeShape = document.querySelector('input[name=cakeShape]:checked').value;
                                console.log(cakeShape);
                                var cakeFlavors = document.querySelector('input[name=cakeFlavors]:checked').value;
                                console.log(cakeFlavors);
                                var vegetarianFlavorsType = document.getElementById('vegetarianFlavorsType').value;

                                if (vegetarianFlavorsType == "") {
                                    vegetarianFlavorsType = "-";
                                } else {
                                    vegetarianFlavorsType = vegetarianFlavorsType;
                                }
                                console.log(vegetarianFlavorsType);
                                var occasion = document.getElementById('occasion').value;
                                console.log(occasion);
                                var otherOccasion = document.getElementById('otherName').value;
                                console.log(otherOccasion);
                                var customMessage = document.getElementById('customMessage').value;
                                console.log(customMessage);
                                var specialInstructions = document.getElementById('specialInstructions').value;
                                console.log(specialInstructions);



                                // Check file selected or not




                                console.log(imageFinal);


                                var signature = document.getElementById('canvasImageInput').value;

                                var cupCakes = document.querySelector('input[name=cupcake]:checked').value;
                                if (cupCakes == "Yes") {
                                    var cupCakeSize = document.querySelector('input[name=cupCakeSize]:checked').value;
                                    var cupCakeType = document.querySelector('#cupCakeType').value;
                                    var cupCakeFlavors = document.querySelector('input[name=cupCakeFlavors]:checked').value;
                                    var cupCakeQuantity = document.querySelector('#cupCakeQuantityFinal').value
                                } else {
                                    var cupCakeSize = "-";
                                    var cupCakeType = "-";
                                    var cupCakeFlavors = "-";
                                    var cupCakeQuantity = "-";
                                }

                                var cakeSizeType = $("#cakeSizeType").val();

                                console.log(cupCakes);
                                console.log(cupCakeSize);
                                console.log(cupCakeType);
                                console.log(cupCakeFlavors);
                                console.log(cupCakeQuantity);


                                const dataSend = {
                                    locationID: document.querySelector('input[name=address]:checked').value,
                                    customerFirstName: firstName,
                                    customerLastName: lastName,
                                    customerPhone: phoneNumber,
                                    customerEmail: emailAddress,
                                    orderType: orderType,
                                    orderPickupDate: orderDatepicker,
                                    orderPickupTime: orderPickupTime,
                                    deliveryAddress1: orderDeliveryAddress,
                                    deliveryAppartmentNumber: orderDeliveryAppartment,
                                    deliveryCity: orderDeliveryCity,
                                    deliveryState: orderDeliveryState,
                                    deliveryZIP: orderDeliveryZIP,
                                    cakeType: cakeType,
                                    cakeSizeType: cakeSizeType,
                                    cakeShape: cakeShape,
                                    cakeFlavors: cakeFlavors,
                                    cakeFlavorsType: vegetarianFlavorsType,
                                    occasion: occasion,
                                    otherOccasion: otherOccasion,
                                    customMessage: customMessage,
                                    specialInstructions: specialInstructions,
                                    inspirationUploadDesign: globalImages,
                                    imagesUploadStatus: imagesUploadStatus,
                                    cupcake: cupCakes,
                                    cupCakeSizeOption: cupCakeSize,
                                    cupCakeType: cupCakeType,
                                    cupCakeFlavors: cupCakeFlavors,
                                    cupCakeQuantity: cupCakeQuantity,
                                    signature: signature

                                }
                                const jsonString = JSON.stringify(dataSend);
                                $.ajax({
                                    type: "POST",
                                    url: "./submit-form.php",
                                    data: jsonString,
                                    contentType: 'application/json',
                                    success: function(response) {
                                        if (response == 'success') {
                                            document.getElementById('successPage').style.display = 'block';
                                            document.getElementById('Otherdetails').style.display = 'none';
                                        } else {
                                            notyf.error('Something went wrong. Please try again later.');
                                        }
                                    },
                                    complete: function() {},
                                    error: function(xhr, textStatus, errorThrown) {
                                        notyf.error('Something went wrong. Please try again later.')
                                        return false;
                                    }
                                });


                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                   minDate: 0,
                dateFormat: "mm-dd-yy"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".address-box").click(function() {
                $(".address-box").addClass("active");
                $(".address-box-02").removeClass("active");
            });
            $(".address-box-02").click(function() {
                $(".address-box-02").addClass("active");
                $(".address-box").removeClass("active");
            });
            $("#successButton").click(function() {
                $("#successPage").show();
                $("#OtherdetailsDiv").hide();
            });
        });
    </script>
    <script>
        $('.pickup-toggle').hide();
        $('.delivery-toggle').hide();
        $('#cupcakesOption-No').prop('checked', true);
        $('#pickup').on('change', function() {
            if ($('#pickup').is(':checked')) {
                $('.pickup-toggle').show();
                $('.delivery-toggle').hide();
                $('#delivery').prop('checked', false);
            } else {
                $('.pickup-toggle').hide();
            }
        })
        $('#delivery').on('change', function() {
            if ($('#delivery').is(':checked')) {
                $('.delivery-toggle').show();
                $('.pickup-toggle').hide();
                $('#pickup').prop('checked', false);
            } else {
                $('.delivery-toggle').hide();
            }
        })
        $(document).ready(function() {
            if ($('#cupcakesOption-No').is(':checked')) {
                $('#cupCakeFlavor').hide();
                $('#cupCakeSize').hide();
                $('#cupCakeQuantity').hide();
            }
        })
        $('.cupcake').on('change', function() {
            if ($('#cupcakesOption-No').is(':checked')) {
                $('#cupCakeFlavor').hide();
                $('#cupCakeSize').hide();
                $('#cupCakeQuantity').hide();
            } else if ($('#cupcakesOption-Yes').is(':checked')) {
                $('#cupCakeFlavor').show();
                $('#cupCakeSize').show();
                $('#cupCakeQuantity').show();
            }
        })
    </script>
    <script>
        $('#veganCream').hide();
        $('#specialCake').hide();
        $('#eggType1').is(':checked');
        $('#eggType2').on('change', function() {
            if ($('#eggType2').is(':checked')) {
                $('#veganCream').show();
                $('#vegetarian').hide();
                $('#specialCake').hide();
                $('#eggType1').prop('checked', false);
                $('#eggType3').prop('checked', false);
            } else {
                $('#veganCream').hide();
            }
        })
        $('#eggType3').on('change', function() {
            if ($('#eggType3').is(':checked')) {
                $('#specialCake').show();
                $('#vegetarian').hide();
                $('#veganCream').hide();
                $('#eggType2').prop('checked', false);
                $('#eggType1').prop('checked', false);
            } else {
                $('#specialCream').hide();
            }
        })
        $('#eggType1').on('change', function() {
            if ($('#eggType1').is(':checked')) {
                $('#vegetarian').show();
                $('#specialCake').hide();
                $('#veganCream').hide();
                $('#eggType2').prop('checked', false);
                $('#eggType3').prop('checked', false);
            } else {
                $('#vegetarian').hide();
            }
        })
    </script>
</body>

</html>