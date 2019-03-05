@extends('templates')
@section('content')
    <script src="/indexpage/js/validateform.js"></script>

    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div align="center" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form id="reset" method="post" action="/account/get-new-password">
                <legend>Reset password</legend>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Your username">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="emailrs"
                           placeholder="Your current email of account" required="required">

                </div>
                @if(session('flash_message'))
                    <p style="color: red" id="error">{{session('flash_message')}}</p>
                @endif
                @if(session('notify'))
                    <p style="color: green" id="notify">{{session('notify')}}</p>
                @endif
                <p style="color: green" id="notify"></p>
                <p style="color: red" id="error"></p>
                <button id="btnRe" type="submit" class="btn btn-primary">Get new password now</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>

    </div>


@endsection
