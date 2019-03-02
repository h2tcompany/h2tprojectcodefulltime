@extends('templates')
@section('content')
    <script src="/indexpage/js/validateform.js"></script>
    <style>
        #loginss{
            padding-top: 60px;
        }
        input{
            margin: 5px;
        }
    </style>
    <div class="container">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div align="center" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form id="loginss" class="form-group"  method="post" action="/account/logintopage" role="form">
                <legend>Login with us</legend>
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" class="form-control" name="username" id="usernamelg" placeholder="Your username" required="required" >
                    <input type="password" name="password" id="passwordlg" class="form-control" value="" placeholder="Your password" required="required">
                </div>
                <p style="color: #AF2018" id="error">{{Session::get('mess')}}</p>
                <button id="btnLoginsubmit" type="submit" class="btn btn-primary">Login now</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>

    </div>


@endsection
