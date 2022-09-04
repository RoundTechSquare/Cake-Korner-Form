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
    <title>Cup Cakes | Cake Korner</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            <h1 class="page-title">Gallery</h1>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </section>
            <!-- Inner Banner html end-->
            <!-- gallery section html start -->
            <div class="gallery-section">
                <div class="container">
                    <div class="gallery-outer-wrap mt-5">
                        <div class="section-heading" style="margin-bottom: 20px;">
                            <h2 class="section-title" style="font-family: 'Playfair Display', sans-serif; font-weight: 700;">Cup Cakes</h2>
                            <div class="title-divider">
                                <img src="assets/images/title-divider.png" alt="divider">
                            </div>
                        </div>
                        <div class="gallery-inner-wrap gallery-container grid">
                            <?php
                            for ($i = 1; $i < 7; $i++) { ?>

                                <div class="single-gallery grid-item">
                                    <figure class="gallery-img">
                                        <a href="./assets/images/gallery-two/CupCake/cupcake-<?= $i ?>.jpg" data-fancybox="gallery">
                                            <img src="./assets/images/gallery-two/CupCake/cupcake-<?= $i ?>.png" style="border-radius: 10px;" alt="Cake Korner Gallery cupcake-<?= $i ?>.png" />
                                            <h4 style="border-radius: 10px;">
                                                <img src="./assets/images/eye.png" style="width: 30px; height: auto;" />
                                            </h4>
                                        </a>
                                    </figure>
                                </div>
                            <?php }

                            ?>
                        </div>

                        <!-- <div class="gallery-inner-wrap gallery-container grid">
                            <?php
                            for ($i = 7; $i < 12; $i++) { ?>
                                <div class="single-gallery grid-item hideShwp">
                                    <figure class="gallery-img">
                                        <a href="./assets/images/gallery-two/cupcake-<?= $i ?>.png" data-fancybox="gallery">
                                            <img src="./assets/images/gallery-two/cupcake-<?= $i ?>.jpg" style="border-radius: 10px;" alt="Cake Korner Gallery cupcake-<?= $i ?>.png" />
                                            <h4 style="border-radius: 10px;">
                                                <img src="./assets/images/eye.png" style="width: 30px; height: auto;" />
                                            </h4>
                                        </a>
                                    </figure>
                                </div>
                            <?php }

                            ?>
                        </div> -->
                        <div class="view-more-button ">
                            <button type="button" class="view-more" onclick='loadDiv()'>VIEW MORE</button>
                        </div>
                    </div>

                    <script>
                        function loadDiv() {
                            $.ajax({
                                url: "./view-more-cupcake.php",
                                type: 'POST',
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    if (data != '') {
                                        console.log(data);


                                        $('.gallery-inner-wrap').css("height", "1200px");
                                        $(".gallery-outer-wrap").replaceWith(data);
                                    } else {
                                        alert("NONS");
                                    }
                                }
                            });

                        }
                    </script>

                </div>
            </div>
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
        <!-- offcanvas html -->
    </div>

    <!-- JavaScript -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/vendors/jquery/jquery.js"></script>
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
</body>

</html>