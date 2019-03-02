@extends('templates')
@section('content')
    <script src="/indexpage/js/validateform.js"></script>
    <style>
        #change {
            padding-top: 60px;
        }

        input {
            margin: 5px;
        }
    </style>
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
    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div align="center" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form id="change" class="form-group" method="post" role="form">
                <legend>Change your password</legend>
                <div class="form-group">
                    <label for=""></label>
                    <input type="password" class="form-control" name="oldpass" id="oldpass"
                           placeholder="Current password">
                    <input type="password" name="newpass" id="newpass" class="form-control" value=""
                           placeholder="New password">
                    <input type="password" name="confirm" id="confirm" class="form-control" value=""
                           placeholder="Confirm your password">
                </div>
            </form>
            @if(Session::get('mess') != null)
            <p style="color: #AF2018">{{Session::get('mess')}}</p>
            @endif
            <p style="color: #AF2018" id="error"></p>
            <button id="btnChange" class="btn btn-primary">Change now</button>
            <input type="text" style="display: none" id="username" value="{{Session::get('acc')->username}}"/>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>

    </div>


@endsection
