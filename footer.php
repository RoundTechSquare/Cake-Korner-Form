<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<footer id="colophon" class="site-footer footer-primary" style="background-image: url(assets/images/footer-banner.jpg);">
    <div class="top-footer">
        <div class="container">
            <div class="upper-footer">
                <div class="footer-logo text-center">
                    <a href="#">
                        <img src="assets/images/cake-korner-logo.webp" alt="Cake Korner">
                    </a>
                </div>
            </div>
            <div class="lower-footer">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="widget widget-contact-detail">
                            <span class="widget-title-icon">
                                <i aria-hidden="true" class="icon icon-store"></i>
                            </span>
                            <h4 class="widget-title" style="font-weight: 600;">
                                1<sup>st</sup> Home of Cake Korner
                            </h4>
                            <ul>
                                <li>18168 Pioneer Blvd, Artesia, CA 90701</li>
                                <li>
                                    <a href="mailto:cakes@cakekorner.com"><span class="__cf_email__">cakes@cakekorner.com</span></a>
                                </li>
                                <li>
                                    <a href="tel:5628653200">Ph No: (562) 865-3200 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-contact-detail">
                            <span class="widget-title-icon">
                                <i aria-hidden="true" class="icon icon-store"></i>
                            </span>
                            <h4 class="widget-title" style="font-weight: 600;">
                                2<sup>nd</sup> Home of Cake Korner
                            </h4>
                            <ul>
                                <li> 9494 Black Mountain Rd, San Diego 92126</li>
                                <li>
                                    <a href="mailto:cakes@cakekorner.com"><span class="__cf_email__">cakes@cakekorner.com</span></a>
                                </li>
                                <li>
                                    <a href="tel:6199924262">Ph No: (619) 992-4262</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget widget-subscribe">
                            <span class="widget-title-icon">
                                <i aria-hidden="true" class="icon icon-envelope11"></i>
                            </span>
                            <h4 class="widget-title">
                                Subscribe Newsletter
                            </h4>
                            <div class="footer-subscribe-form-wrap">
                                <p>Subscribe to our newsletter to get regular update about offers !!</p>
                                <form id="newsletterForm" method="POST" action="" onsubmit="newsletterForm()" class="footer-subscribe-form">
                                    <input type="email" id="newsletterEmail" required name="email" placeholder="Enter your email*">
                                    <button type="submit">
                                        <i aria-hidden="true" class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                                <script>
                                    $("#newsletterForm").submit(function(e) {
                                        e.preventDefault();
                                    });

                                    function newsletterForm() {
                                        const notyf = new Notyf({
                                            duration: 2000,
                                            position: {
                                                x: 'right',
                                                y: 'top',
                                            },
                                        });
                                        var newsletterEmail = document.getElementById('newsletterEmail');
                                        var emailPatternValue = newsletterEmail.value;
                                        var emailPattern = new RegExp("^[a-z A-Z 0-9]{4,20}@+[a-z A-z]{2,6}[\.]{1}[c C]{1}[A-Z a-z]{1,6}([\.]{1}[A-Z a-z]{2,6})?$");
                                        if ((emailPattern.test(emailPatternValue) != true)) {
                                            if (emailPattern.test(emailPatternValue) != true) {
                                                notyf.error('Please enter valid email address');
                                                email.value = "";
                                                email.focus();
                                            }
                                        } else {
                                            var formData = new FormData();
                                            formData.append("newsletterEmail", newsletterEmail.value);
                                            $.ajax({
                                                url: "./newsletter-form-submit.php",
                                                type: 'POST',
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    if (data == "New record created successfully") {
                                                        notyf.success('You have successfully subscribed to our newsletter.')
                                                    } else if (data == "error") {
                                                        notyf.error('Something went wrong. Please try again later.')
                                                    } else if (data == "Email Address already exists") {
                                                        notyf.error('Email address already exists. Please try again with other email address')
                                                    }
                                                }
                                            });
                                            document.getElementById('newsletterForm').reset();
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
    <div class="bottom-footer text-center">
        <div class="container">
            <div class="social-links">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/thecakekorner" target="_blank">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/thecakekorner/" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="copy-right d-inline-block">Copyright &copy; 2022 The Cake Korner. All Rights Reserved.</div>
        </div>
    </div>
    <div class="overlay"></div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>