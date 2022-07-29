<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin Register | Cake Korner</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source Sans Pro:300,400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="huro-app" class="app-wrapper">

        <!--Full pageloader-->
        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">
            <!--Page body-->
            <div class="auth-wrapper-inner is-single">
                <!--Fake navigation-->
                <div class="auth-nav">
                    <div class="left"></div>
                    <div class="center">
                        <a href="/" class="header-item">
                            <img class="light-image" src="assets/img/cake-korner-logo.webp" style="height: 70px; width: auto; margin-top: 30px" alt="">
                            <img class="dark-image" src="assets/img/cake-korner-logo.webp" style="height: 70px; width: auto; margin-top: 30px" alt="">
                        </a>
                    </div>
                    <div class="right">
                        <label class="dark-mode ml-auto">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                    </div>
                </div>
                <!--Single Centered Form-->
                <div class="single-form-wrap">
                    <div class="inner-wrap">
                        <!--Form Title-->
                        <div class="auth-head">
                            <h2>Join Us Now.</h2>
                            <p>Start by creating your account</p>
                            <a href="./index">I already have an account </a>
                        </div>
                        <!--Form-->
                        <div class="form-card">
                            <form id="registerForm" action="" method="POST" onsubmit="registerForm()">
                                <div id="signin-form" class="login-form">
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input class="input" required id="username" type="text" placeholder="Username">
                                            <span class="form-icon">
                                                <i data-feather="user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input class="input" required id="email" type="text" placeholder="Email Address">
                                            <span class="form-icon">
                                                <i data-feather="mail"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input class="input" required id="password" type="password" placeholder="Password">
                                            <span class="form-icon">
                                                <i data-feather="lock"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="field">
                                        <div class="control has-icon">
                                            <input class="input" id="cpassword" type="password" placeholder="Repeat Password">
                                            <span class="form-icon">
                                                <i data-feather="lock"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Submit -->
                                    <div class="control login">
                                        <button type="submit" class="button h-button is-primary is-bold is-fullwidth is-raised">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                            <script>
                                $("#registerForm").submit(function(e) {
                                    e.preventDefault();
                                })

                                function registerForm() {
                                    const notyf = new Notyf({
                                        duration: 2500,
                                        position: {
                                            x: 'right',
                                            y: 'top',
                                        },
                                    });
                                    var username = document.getElementById("username");
                                    var email = document.getElementById("email");
                                    var password = document.getElementById("password");
                                    var confirmPassword = document.getElementById("cpassword");
                                    if (password.value == confirmPassword.value) {
                                        if (username.value == "" || email.value == "" || password.value == "" || confirmPassword.value == "") {
                                            notyf.error('Please fill required fields.');
                                        } else {
                                            var formData = new FormData();
                                            formData.append("username", username.value);
                                            formData.append("email", email.value);
                                            formData.append("password", password.value);
                                            formData.append("cpassword", confirmPassword.value);

                                            $.ajax({
                                                url: './create-account.php',
                                                type: 'POST',
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    if (data == "error") {
                                                        notyf.error('Failed to Create your Account. Please try again later.');
                                                    } else if (data == "Success") {
                                                        notyf.success('The account has been created successfully');
                                                        document.getElementById("registerForm").reset();
                                                        setTimeout(reloadPage, 1000);
                                                        function reloadPage() {
                                                            window.location.href = './index';
                                                        }
                                                    } else {
                                                        notyf.error('Failed to Create your Account. Please try again later.');
                                                    }
                                                }
                                            })
                                        }
                                    } else {
                                        notyf.error("Password don't match. Enter the password again.");
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Huro Scripts-->
        <!-- Concatenated plugins -->
        <script src="assets/js/app.js"></script>
        <!-- Huro js -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/auth.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    </div>
</body>

</html>