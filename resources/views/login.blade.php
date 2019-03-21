@extends('templates')
@section('content')
    <script src="/indexpage/js/validateform.js"></script>

    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form id="loginss" method="post" action="/account/logintopage" role="form">
                <legend style="text-align: center">Login with us</legend>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="usernamelg" placeholder="Your username"
                           required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="passwordlg" class="form-control" value=""
                           placeholder="Your password" required="required">
                    <p style="color: #AF2018" id="error">{{Session::get('mess')}}</p>
                </div>
                <button style="margin-left: 130px" id="btnLoginsubmit" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login now</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>

    </div>


@endsection
