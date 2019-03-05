<!DOCTYPE html>
<html lang="vi_VN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="description"
          content="Examination for Java, Javascript, CSharp, Notepad online and more. You can share for earn money. You can create room for examination and share for your student"/>
    <meta name="keywords"
          content="codefulltime, paste, note online, share code, learn with question,@if(isset($paste)){{$paste->tag}}@endif"/>
    <meta name="author" content="H2TCompany"/>


    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    @include('editor')
</head>
<body>

<div class="container">
    <nav style="margin-top: 10px" class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Codefulltime</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @if($seeing =='examination') class="active" @endif id="lienhe"><a href="/"><i class="fas fa-clipboard"></i> Examination</a></li>
                @if(Session::get('acc') == null)

                    <li  class=" @if($seeing =='account')active @endif  dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="lienhe"><a href="/account/register_page"><i
                                            class="fas fa-user-plus"></i>
                                    Sign up</a></li>
                            <li id="lienhe"><a href="/account/login_page"><i
                                            class="fas fa-sign-in-alt"></i> Sign
                                    in</a></li>
                            <li id="lienhe"><a href="/account/forgotpassword"><i
                                        class="fas fa-key"></i> Forgot your password
                                    </a></li>
                        </ul>
                    </li>
                @endif
                @if(Session::get('acc') != null)

                    <li class=" @if($seeing =='account')active @endif  dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="lienhe"><a href="#"><i class="fas fa-user"></i>
                                    Chào {{Session::get('acc')->name}}</a></li>
                            <li id="lienhe"><a href="/account/changeyourpassword"><i class="fas fa-key"></i>
                                    Change password</a></li>
                            <li id="lienhe"><a href="/account/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>

                        </ul>
                    </li>

                    <li style="display: none" @if($seeing =='addquestion') class="active" @endif id="lienhe"><a href="/question/addquestion"><i class="fas fa-clipboard"></i>
                            Add question</a></li>

                @endif
                    <li @if($seeing =='paste') class="active" @endif id="lienhe"><a href="/paste/all"><i class="fas fa-clipboard"></i>
                            Paste</a></li>

            </ul>

            <div class="navbar-form navbar-left">
                <form action="/paste/search">
                    <div class="form-group">
                        <input type="text" name="key" id="key" class="form-control"
                               value=""
                               placeholder="Anything in website" required>
                    </div>
                    <button type="submit" id="btnSearch" class="btn btn-default">Search</button>
                </form>
            </div>

        </div>
    </nav>

    @yield('content')

</div>
</body>
</html>
