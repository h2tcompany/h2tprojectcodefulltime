@extends('templates')
@section('content')
    <script>
        $(document).ready(function () {
            $('#btnCreate').on('click', function () {
                var np = $('#new').val();
                var cf = $('#confirm').val();
                var _check = true;
                if (np === '' || np === undefined) {
                    $('#error').html('Please enter a value into the form');
                    $('#new').css('border', 'solid 1px red');
                    _check = false;
                }
                if (cf === '' || cf === undefined) {
                    $('#error').html('Please enter a value into the form');
                    $('#confirm').css('border', 'solid 1px red');
                    _check = false;
                }
                if (np.length < 8) {
                    $('#error').html('Password must be greater than 8 characters');
                    $('#new').css('border', 'solid 1px red');
                    _check = false;
                }
                if (np !== cf) {
                    $('#error').html('Password incorrect');
                    $('#new').css('border', 'solid 1px red');
                    $('#confirm').css('border', 'solid 1px red');
                    _check = false;
                }
                if (_check) {
                    $.ajax({
                        url: '/account/create-new-password',
                        data: {
                            p: $('#new').val(),
                            email:$('#email').val(),
                            username: $('#username').val(),
                            '_token': '{{csrf_token()}}'
                        },
                        method: "POST",
                        success: function (data) {
                            if (data.notify === 'thanhcong'){
                                var el = document.createElement("a");
                                el.href = "/";
                                el.innerText = "Click here to redirect to Home page.";
                                swal({
                                    title: "Password has changed.",
                                    icon: "success",
                                    content: el,
                                });
                            }
                        }
                    })
                }
                return true;
            });
            $('#create').on('keyup', function () {
                var np = $('#new').val();
                var cf = $('#confirm').val();
                if (np !== '') {
                    $('#error').html('');
                    $('#new').css('border', 'solid 1px green');
                }
                if (cf !== '') {
                    $('#error').html('');
                    $('#confirm').css('border', 'solid 1px green');

                }
                return true;
            })

        });
    </script>
    <style>
        input {
            margin: 5px;
        }
    </style>

    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div align="center" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form id="create" method="post">
                <legend>Create new password</legend>
                <div class="form-group">
                    <input type="password" class="form-control" name="new" id="new" placeholder="New password">
                    <input type="password" class="form-control" name="confirm" id="confirm"
                           placeholder="Confirm your password">

                </div>
                {{--@if(session('flash_message'))--}}
                {{--<p style="color: red" id="error" >{{session('flash_message')}}</p>--}}
                {{--@endif--}}
                {{--@if(session('notify'))--}}
                {{--<p style="color: green" id="notify" >{{session('notify')}}</p>--}}
                {{--@endif--}}
                {{--<p style="color: green" id="notify" ></p>--}}
            </form>
            <p style="color: red" id="error"></p>
            <input style="display: none" type="text" id="username" value="{{request('username')}}">
            <input style="display: none" type="text" id="email" value="{{request('email')}}">
            <button id="btnCreate" type="button" class="btn btn-primary">Create new password</button>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>

    </div>


@endsection
