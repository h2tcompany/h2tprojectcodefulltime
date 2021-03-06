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
                <li @if($seeing =='examination') class="active" @endif id="lienhe"><a href="/"><i
                                class="glyphicon glyphicon-random"></i>&nbsp;&nbsp;Examination</a></li>
                @if(Session::get('acc') == null)

                    <li class=" @if($seeing =='account')active @endif  dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span
                                    class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Account
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="lienhe"><a href="/account/register_page"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Sign
                                    up</a></li>
                            <li id="lienhe"><a href="/account/login_page"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Sign
                                    in</a></li>
                            <li id="lienhe"><a href="/account/forgotpassword"><i class="fas fa-key"></i>&nbsp;&nbsp;Forgot
                                    your password
                                </a></li>
                        </ul>
                    </li>
                @endif
                @if(Session::get('acc') != null)

                    <li class=" @if($seeing =='account')active @endif  dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span
                                    class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Account
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="lienhe"><a href="/profile/{{Session::get('acc')->username}}"><i
                                            class="glyphicon glyphicon-export"></i>&nbsp;&nbsp;Chào {{Session::get('acc')->name}}
                                </a></li>
                            <li id="lienhe"><a href="/account/changeyourpassword"><i
                                            class="glyphicon glyphicon-transfer"></i>&nbsp;&nbsp;Change password</a>
                            </li>
                            <li id="lienhe"><a href="/account/logout"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Logout</a>

                        </ul>
                    </li>

                    <li style="display: none" @if($seeing =='addquestion') class="active" @endif id="lienhe"><a
                                href="/question/addquestion"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Add
                            question</a></li>

                @endif
                <li @if($seeing =='paste') class="active" @endif id="lienhe"><a href="/paste/all"><i
                                class="fas fa-clipboard"></i>&nbsp;&nbsp;Paste</a></li>

            </ul>

            <div class="navbar-form navbar-left">
                {{--/dashboard/search--}}
                <form action="#">
                    <div class="form-group">
                        <input type="text" name="key" id="key" class="form-control"
                               value=""
                               placeholder="Anything in website" required>
                    </div>
                    <button type="submit" id="btnSearch" class="btn btn-default"><span
                                class="glyphicon glyphicon-search"></span></button>
                </form>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">

                    <li class=" @if($seeing =='rank')active @endif  dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-tower"></span> &nbsp;&nbsp;Rank
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="lienhe"><a href="/rank/exercise">Exercise</a>
                            </li>
                            <li id="lienhe"><a href="/rank/examination">Examination</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">

                    <li class=" @if($seeing =='exercise')active @endif  dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span
                                    class="glyphicon glyphicon-signal"></span>&nbsp;&nbsp;Exercise
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="lienhe"><a href="/exercises/all"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;List
                                    exercise</a></li>
                            <li id="lienhe"><a href="/submissions/all"><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;Submission</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    @yield('content')

</div>
</body>
</html>
