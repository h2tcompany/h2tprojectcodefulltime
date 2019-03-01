<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đổi mật khẩu</title>
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
    <script src="/indexpage/js/validateform.js"></script>
    <!--===============================================================================================-->
    <script>
        $(document).ready(function () {

            $('#btnChange').on('click', function () {
                if ($('#newpass').val() === $('#confirm').val()) {
                    $.ajax({
                        url: '/account/changePassword',
                        data: {
                            oldpass: $('#oldpass').val(),
                            newpass: $('#newpass').val(),
                            username: $('#username').val(),
                            '_token': '{{csrf_token()}}'
                        },
                        method: "POST",
                        success: function (data) {
                            if (data.stt === 'ok') {
                                // swal("Thay đổi mật khẩu thành công!", "<h1>Hello World!</h1><p>Have a nice day!</p>", "success");
                                var el = document.createElement("a");
                                el.href = "/account/login_page";
                                el.innerText = "Nhấn vào đây để đăng nhập vào hệ thống.";
                                swal({
                                    title: "Mật khẩu thay đổi thành công.",
                                    icon: "success",
                                    content: el,
                                });
                            } else if (data.stt === 'failed') {
                                $('#error').html('Mật khẩu cũ không chính xác.');
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
            <form id="change" class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						Change your password
					</span>

                <div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" id="oldpass" type="password" name="oldpass">
                    <span class="focus-input100" data-placeholder="Mật khẩu cũ"></span>
                </div>
                <div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" id="newpass" type="password" name="newpass">
                    <span class="focus-input100" data-placeholder="Mật khẩu mới"></span>
                </div>
                <div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" id="confirm" type="password" name="confirm">
                    <span class="focus-input100" data-placeholder="Xác nhận mật khẩu"></span>
                </div>
            </form>
            <p style="color: red" id="error"></p>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button id="btnChange" class="login100-form-btn">
                        Change now
                    </button>
                </div>
            </div>
            <input type="text" style="display: none" id="username" value="{{Session::get('acc')->username}}"/>
            <div class="text-center p-t-115">
                <a class="txt1" href="/">
                    Home
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


</body>
</html>
