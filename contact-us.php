<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/fontawesome/css/all.min.css">
    <!-- Elmentkit Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/elementskit-icon-pack/assets/css/ekiticons.css">
    <!-- jquery-ui css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/timepicker/jquery-ui-timepicker.min.css">
    <!-- modal video css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/modal-video/modal-video.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- light box css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/fancybox/dist/jquery.fancybox.min.css">
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick-theme.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Contact Us | Cake Korner</title>
</head>

<body class="home">
    <div id="siteLoader" class="site-loader">
        <div class="preloader-content">
            <img src="assets/images/loader1.html" alt="">
        </div>
    </div>
    <div id="page" class="full-page">

        <!-- HEADER START -->
        <?php require('./header.php') ?>
        <!-- HEADER END -->

        <main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
                <div class="inner-baner-container" style="background-image: url(assets/images/footer-banner.jpg);">
                    <div class="container">
                        <div class="inner-banner-content">
                            <h1 class="page-title">Contact Us</h1>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </section>
            <!-- Inner Banner html end-->
            <!-- contact form html start -->
            <div class="contact-page-section">
                <div class="contact-form-inner">
                    <div class="container">
                        <div class="contact-from-container">
                            <div>
                                <div class="artesia-map" style="height: 380px; padding-bottom: 10px">
                                    <h5 style="font-family: 'Trade-Gothic-Bold'; font-size: 20px">Artesia, CA</h5>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.921818934656!2d-118.08623753370752!3d33.86590567292237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd2d094104a813%3A0x88f3afa56f1f0667!2sThe%20Cake%20Korner!5e0!3m2!1sen!2sin!4v1654836246231!5m2!1sen!2sin" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="san-diego-map" style="height: 380px; padding-top: 10px">
                                    <h5 style="font-family: 'Trade-Gothic-Bold'; font-size: 20px">San Diego, CA</h5>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.1003305961804!2d-117.1267390489243!3d32.895515485146646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dbf9f7163ec2d9%3A0x32251489ac4494ef!2sThe%20Cake%20Korner!5e0!3m2!1sen!2sin!4v1654836292443!5m2!1sen!2sin" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="contact-from-wrap" style="background-image: url(assets/images/banner-img1.jpg);">
                                <div class="section-heading">
                                    <div class="sub-title">GET IN TOUCH</div>
                                    <h2 class="section-title">Drop Us A Line</h2>
                                    <div class="title-divider">
                                        <img src="assets/images/title-divider.png" alt="divider">
                                    </div>
                                </div>
                                <form class="contact-form" id="contactForm" method="POST" onsubmit="contactForm()" action="">
                                    <p class="width-full">
                                        <input type="text" id="name" required name="name" placeholder="Name*">
                                    </p>
                                    <p>
                                        <input type="email" id="email" required name="email" placeholder="Email*">
                                    </p>
                                    <p>
                                        <input type="text" id="phone" required name="number" placeholder="Phone Number*">
                                    </p>
                                    <p class="width-full">
                                        <textarea rows="8" name="message" required id="message" placeholder="Message*"></textarea>
                                    </p>
                                    <button type="submit" class="sendMessageButton">SEND MESSAGE</button>
                                </form>
                                <script>
                                    $("#contactForm").submit(function(e) {
                                        e.preventDefault();
                                    });

                                    function contactForm() {
                                        const notyf = new Notyf({
                                            duration: 2000,
                                            position: {
                                                x: 'right',
                                                y: 'top',
                                            },
                                        });
                                        var name = document.getElementById("name");
                                        var email = document.getElementById("email");
                                        var phone = document.getElementById("phone");
                                        var message = document.getElementById("message");
                                        var phonePatternValue = phone.value;
                                        var emailPatternValue = email.value;
                                        var phonePattern = new RegExp("^((\\(\\d{3}\\))|\\d{3})[- .]?\\d{3}[- .]?\\d{4}$");
                                        var emailPattern = new  RegExp("^[a-z A-Z 0-9]{4,20}@+[a-z A-z]{2,30}[\.]{1}[c C]{1}[A-Z a-z]{1,6}([\.]{1}[A-Z a-z]{2,6})?$");
                                        
                                        var emailPatternConfirmation = 'valid';
                                          if (email.value == '' || email.value == ' ') {
                                        emailPatternConfirmation = 'valid';
                                    }
                                    
                                        if ((emailPattern.test(emailPatternValue) != true) || (phonePattern.test(phonePatternValue) != true)) {
                                            if (emailPattern.test(emailPatternValue) != true) {
                                                notyf.error('Please enter valid email address');
                                                email.value = "";
                                                email.focus();
                                            }
                                            if (phonePattern.test(phonePatternValue) != true) {
                                                notyf.error('Please enter valid mobile number');
                                                phone.value = "";
                                                phone.focus();
                                            }
                                        } else {
                                            var formData = new FormData();
                                            formData.append("name", name.value);
                                            formData.append("phone", phone.value);
                                            formData.append("email", email.value);
                                            formData.append("message", message.value);
                                            $.ajax({
                                                url: "./contact-form-submit.php",
                                                type: 'POST',
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    console.log(data);
                                                    if (data == "New record created successfully") {
                                                        notyf.success('Your details have been submitted successfully. We will contact you shortly.')
                                                    } else if (data == "error") {
                                                        notyf.error('Something went wrong. Please try again later.')
                                                    }
                                                }
                                            });
                                            document.getElementById("contactForm").reset();
                                        }
                                    }
                                </script>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact form html end -->
        </main>
        <!-- site footer html start  -->

        <!-- FOOTER START -->
        <?php require('./footer.php') ?>
        <!-- FOOTER END -->

        <a id="backTotop" href="#" class="to-top-icon">
            <i class="fas fa-chevron-up"></i>
        </a>
        <!-- custom search field html -->
        <div class="header-search-form">
            <div class="container">
                <div class="header-search-container">
                    <form class="search-form" role="search" method="get">
                        <input type="text" name="s" placeholder="Enter your text...">
                    </form>
                    <a href="#" class="search-close">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <!-- <script src="assets/vendors/jquery/jquery.js"></script> -->
    <script src="assets/vendors/waypoint/jquery.waypoints.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendors/timepicker/jquery-ui-timepicker.min.js"></script>
    <script src="assets/vendors/countdown-date-loop-counter/loopcounter.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.js"></script>
    <script src="assets/vendors/modal-video/jquery-modal-video.min.js"></script>
    <script src="assets/vendors/masonry/masonry.pkgd.min.js"></script>
    <script src="assets/vendors/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/vendors/slick-nav/jquery.slicknav.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <!-- START: Sending form script -->
</body>

</html>