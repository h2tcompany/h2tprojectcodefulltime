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
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            @csrf
            <form id="loginss" class="login100-form validate-form" method="post" action="/account/logintopage">
					<span class="login100-form-title p-b-26">
						Sign in
					</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" id="usernamelg" type="text" name="username">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" id="passwordlg" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <p style="color: red" id="error"></p>
                <p style="color: red" id="err">{{Session::get('message')}}</p>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button id="btnLoginsubmit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>
                <div class="text-center p-t-115">
                    <a class="txt1" href="/">
                        Home
                    </a>
                    |
                    <a class="txt2" href="/account/register_page">
                        Sign Up
                    </a>
                    |
                    <a class="txt2" href="/account/forgot">
                        Forgot password?
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="/indexpage/vendor/jquery/jquery.min.js"></script>
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
