@extends('templates')
@section('content')
    <script src="/indexpage/js/validateform.js"></script>

    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div align="center" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form id="loginss" method="post" action="/account/logintopage" role="form">
                <legend>Login with us</legend>
                <div class="form-group">
                    <label for="usernamelg">Username</label>
                    <input type="text" class="form-control" name="username" id="usernamelg" placeholder="Your username"
                           required="required">
                </div>
                <div class="form-group">
                    <label for="passwordlg">Password</label>
                    <input type="password" name="password" id="passwordlg" class="form-control" value=""
                           placeholder="Your password" required="required">
                    <p style="color: #AF2018" id="error">{{Session::get('mess')}}</p>
                </div>
                <button id="btnLoginsubmit" type="submit" class="btn btn-primary">Login now</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>

    </div>


@endsection
