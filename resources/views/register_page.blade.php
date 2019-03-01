<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="/login/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--===============================================================================================-->
    <script>
        $(document).ready(function () {
            $('#submit').on('click', function () {
                var name = $('#name').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                if (name !== '' && username !== '' && email !== '' && password !== '') {
                    $.ajax({
                        url: '/account/signupProcessing',
                        data: {
                            name: $('#name').val(),
                            username: $('#username').val(),
                            email: $('#email').val(),
                            password: $('#password').val(),
                            '_token': '{{csrf_token()}}'
                        },
                        method: "POST",
                        success: function (data) {
                            if (data.stt === 'ok') {
                                var el = document.createElement("a");
                                el.href = "/account/login_page";
                                el.innerText = "Click here to redirect to Login Page.";
                                swal({
                                    title: "Success register your account.",
                                    icon: "success",
                                    content: el,
                                });
                            }
                        }
                    })
                }
            })
        })
    </script>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            @csrf
            <form id="reg" class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						Sign Up
					</span>
                <div class="wrap-input100 validate-input">
                    <input class="input100" id="name" type="text" name="name">
                    <span class="focus-input100" data-placeholder="Your name"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" id="username" type="text" name="username">
                    <span class="focus-input100" data-placeholder="Username"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" id="email" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" id="password" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
            </form>
            <p style="color: red" id="error"></p>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button id="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>
            </div>
            <div class="text-center p-t-115">
                <a class="txt2" href="/">
                    Home
                </a> |
                <a class="txt2" href="/account/login_page">
                    Login
                </a>

            </div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/bootstrap/js/popper.js"></script>
<script src="/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/daterangepicker/moment.min.js"></script>
<script src="/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/login/js/main.js"></script>
<script src="/indexpage/js/validateform.js"></script>

</body>
</html>
