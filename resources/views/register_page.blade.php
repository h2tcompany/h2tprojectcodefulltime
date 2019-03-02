@extends('templates')
@section('content')
    <script src="/indexpage/js/validateform.js"></script>
    <style>
        #reg {
            padding-top: 60px;
        }

        input {
            margin: 5px;
        }
    </style>
    <script>
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        $(document).ready(function () {
            $('#submit').on('click', function () {
                var name = $('#name').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                if (name !== '' && username !== '' && email !== '' && password !== '' && password.length >= 8 && validateEmail(email)) {
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
    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div align="center" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form id="reg" class="form-group" method="post" role="form">
                <legend>Sign up for start</legend>
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your name"
                           required="required">
                    <input type="text" name="username" id="username" class="form-control" value=""
                           placeholder="Your username" required="required">
                    <input type="email" name="email" id="email" class="form-control" value=""
                           placeholder="Your email" required="required">
                    <input type="password" name="password" id="password" class="form-control" value=""
                           placeholder="Your password" required="required">
                </div>
            </form>
            <p style="color: #AF2018" id="error">{{Session::get('mess')}}</p>
            <button id="submit" class="btn btn-primary">Register now</button>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>

    </div>
@endsection
