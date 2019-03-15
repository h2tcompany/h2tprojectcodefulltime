@extends('templates')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
    {{--Tài khoản đã cập nhật thông tin và đã đăng nhập--}}
    @if($detailsProfile != null && Session::get('acc') != null)
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            @if(Session::get('acc')->username == $detailsProfile->username)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-4">
                                            @if($detailsProfile->gioitinh == 1)
                                                <div class="about-img">
                                                    <img style="width: 100%"
                                                         src="/indexpage/img/male.png"
                                                         class="img-fluid rounded b-shadow-a" alt="">
                                                </div>
                                            @endif
                                            @if($detailsProfile->gioitinh == 0)
                                                <div class="about-img">
                                                    <img style="width: 50%"
                                                         src="/indexpage/img/female.png"
                                                         class="img-fluid rounded b-shadow-a" alt="">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-9 col-md-8">
                                            <div class="about-info">
                                                <p><span class="title-s"><b>Name:</b> </span>
                                                    <span>{{$acc->name}}</span></p>
                                                <p><span class="title-s"><b>Email:</b> </span>
                                                    <span>{{$acc->email}}</span>
                                                </p>
                                                <p><span class="title-s"><b>Phone:</b> </span>
                                                    <span>{{$detailsProfile->sodienthoai}}</span></p>
                                                <p><span class="title-s"><b>Date of birth:</b> </span>
                                                    <span>{{$detailsProfile->ngaysinh}}</span></p>
                                                <p><span class="title-s"><b>Address:</b> </span>
                                                    <span>{{$detailsProfile->diachi}}</span></p>
                                                <p><span class="title-s"><b>Strength:</b> </span>
                                                    <span>{{$detailsProfile->diemmanh}}</span></p>
                                                <p><span class="title-s"><b>Weakness:</b> </span>
                                                    <span>{{$detailsProfile->diemyeu}}</span></p>
                                                <p><span class="title-s"><b>Favorite:</b> </span>
                                                    <span>{{$detailsProfile->sothich}}</span></p>
                                                <p><span class="title-s"><b>Skills:</b> </span>
                                                    <span>{{$detailsProfile->kynang}}</span></p>
                                                <p><span class="title-s"><b>Project:</b> </span>
                                                    <span>{{$detailsProfile->duan}}</span></p>
                                                <p><span class="title-s"><b>Link facebook:</b> </span>
                                                    <span><a href="{{$detailsProfile->fb}}">{{$detailsProfile->fb}}</a></span>
                                                </p>
                                                <p><span class="title-s"><b>Link youtube:</b> </span>
                                                    <span><a
                                                            href="{{$detailsProfile->youtube}}">{{$detailsProfile->youtube}}</a></span>
                                                </p>
                                                <p><span class="title-s"><b>Link twitter:</b> </span>
                                                    <span><a
                                                            href="{{$detailsProfile->twitter}}">{{$detailsProfile->twitter}}</a></span>
                                                </p>
                                                <p><span class="title-s"><b>Link Github:</b> </span>
                                                    <span><a
                                                            href="{{$detailsProfile->githhub}}">{{$detailsProfile->githhub}}</a></span>
                                                </p>
                                                <p><span class="title-s"><b>Link skype:</b> </span>
                                                    <span><a
                                                            href="{{$detailsProfile->skype}}">{{$detailsProfile->skype}}</a></span>
                                                </p>
                                                <p><span class="title-s"><b>Link website:</b> </span>
                                                    <span><a
                                                            href="{{$detailsProfile->website}}">{{$detailsProfile->website}}</a></span>
                                                </p>
                                                <p><span class="title-s"><b>Level:</b> </span>
                                                    <span>{{$detailsProfile->trinhdo}}</span></p>
                                                <p><span class="title-s"><b>Specialize:</b> </span>
                                                    <span>{{$detailsProfile->chuyenmon}}</span></p>
                                                @if($detailsProfile->gioitinh == 1)
                                                    <p><span class="title-s"><b>Gender:</b> </span>
                                                        <span>Nam</span></p>
                                                @endif
                                                @if($detailsProfile->gioitinh == 0)
                                                    <p><span class="title-s"><b>Gender:</b> </span>
                                                        <span>Nữ</span></p>
                                                @endif
                                                <p><span class="title-s"><b>Time work for a week:</b> </span>
                                                    <span>{{$detailsProfile->sogiolamviec}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-me pt-4 pt-md-0">
                                        @csrf
                                        <form style="padding-left: 120px" action="/profile/edit_profile" method="post" role="form">
                                            <input style="display: none" type="text" name="code" value="{{$detailsProfile->codeprofile}}">
                                            <legend>Edit your infomation of account</legend>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Date:<b style="color: #AF2018">*</b><input class="form-control"
                                                                                                  type="text"
                                                                                                  name="date"
                                                                                                  id="datepicker"
                                                                                                  value="{{$detailsProfile->ngaysinh}}"
                                                                                                  required="required">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Phone number:<b style="color: #AF2018">*</b><input
                                                            class="form-control" name="phone"
                                                            type="text" id="phone"
                                                            value="{{$detailsProfile->sodienthoai}}"
                                                            required="required"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Address:<b style="color: #AF2018">*</b><input
                                                            class="form-control" name="address"
                                                            type="text" id="address"
                                                            value="{{$detailsProfile->diachi}}"
                                                            required="required"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your strength:<textarea name="diemmanh" id="diemmanh"
                                                                               class="form-control" cols="30"
                                                                               rows="2">{{$detailsProfile->diemmanh}}</textarea></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your weakness:<textarea name="diemyeu" id="diemyeu"
                                                                               class="form-control" cols="30"
                                                                               rows="2">{{$detailsProfile->diemyeu}}</textarea></p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Level: <input type="text" name="trinhdo" class="form-control" value="{{$detailsProfile->trinhdo}}">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Speciallize: <input type="text" name="chuyenmon"
                                                                           class="form-control" id=""
                                                                           value="{{$detailsProfile->chuyenmon}}"
                                                                           placeholder=""></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Time work for a week: <input type="text" name="sogiolamviec"
                                                                                    class="form-control"
                                                                                    value="{{$detailsProfile->sogiolamviec}}"
                                                                                    id="" placeholder=""></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 radio">
                                                    <p>Gender:<b style="color: #AF2018">*</b></p>
                                                    @if($detailsProfile->gioitinh == 1)
                                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                            <label>
                                                                <input type="radio" name="gioitinh" value="1"
                                                                       checked="true">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                            <label>
                                                                <input type="radio" name="gioitinh" value="0">
                                                                Female
                                                            </label>
                                                        </div>
                                                        @endif
                                                    @if($detailsProfile->gioitinh == 0)
                                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                            <label>
                                                                <input type="radio" name="gioitinh" value="1">
                                                                Mail
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                            <label>
                                                                <input type="radio" name="gioitinh" value="0"
                                                                       checked="true">
                                                                Female
                                                            </label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your Skills:<b style="color: #AF2018">*</b><textarea
                                                            name="kinang" id="kinang"
                                                            class="form-control" cols="30"
                                                            required="required"
                                                            rows="2">{{$detailsProfile->kynang}}</textarea></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your favorite:<textarea name="sothich" id="sothich"
                                                                               class="form-control" cols="30"
                                                                               rows="2">{{$detailsProfile->sothich}}</textarea></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your project:<textarea name="duan" id="duan" class="form-control"
                                                                              cols="30"
                                                                              rows="2"
                                                        >{{$detailsProfile->duan}}</textarea></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your Facebook: <input type="text" name="fb" class="form-control"
                                                                             id=""
                                                                             placeholder=""
                                                                             value="{{$detailsProfile->fb}}"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your Youtube: <input type="text" name="youtube"
                                                                            class="form-control" id=""
                                                                            placeholder=""
                                                                            value="{{$detailsProfile->youtube}}"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your Twitter: <input type="text" name="twitter"
                                                                            class="form-control" id=""
                                                                            value="{{$detailsProfile->twitter}}"
                                                                            placeholder=""></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your Github: <input type="text" name="git" class="form-control"
                                                                           value="{{$detailsProfile->githhub}}"
                                                                           id="" placeholder="">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your Skype: <input type="text" name="skype" class="form-control"
                                                                          value="{{$detailsProfile->skype}}"
                                                                          id=""
                                                                          placeholder=""></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p>Your website: <input type="text" name="website"
                                                                            class="form-control" id=""
                                                                            value="{{$detailsProfile->website}}"
                                                                            placeholder=""></p>
                                                </div>

                                            </div>
                                        </form>
                                        <br/>
                                        @if(Session::get('mess') != null)<p style="color: green">{{Session::get('mess')}}</p>@endif
                                        <button style="margin-left: 130px" type="submit" class="btn btn-primary"><i class="fas fa-edit"></i>
                                            Edit your information
                                        </button>
                                        <a  href="/" class="btn btn-success"><i class="fas fa-home"></i>
                                            Back to home
                                        </a>
                                        <br/>
                                        <br/>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::get('acc')->username != $detailsProfile->username)
                <div class="row">
                    <div class="col-sm-6 col-md-5">
                        @if($detailsProfile->gioitinh == 1)
                            <div class="about-img">
                                <img style="width: 35%; margin-left: 130px"
                                     src="/indexpage/img/male.png"
                                     class="img-fluid rounded b-shadow-a" alt="">
                            </div>
                        @endif
                        @if($detailsProfile->gioitinh == 0)
                            <div class="about-img">
                                <img style="width: 35%; margin-left: 130px"
                                     src="/indexpage/img/female.png"
                                     class="img-fluid rounded b-shadow-a" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-7">
                        <div class="about-info">
                            <p><span class="title-s"><b>Name:</b> </span>
                                <span>{{$acc->name}}</span></p>
                            <p><span class="title-s"><b>Email:</b> </span>
                                <span>{{$acc->email}}</span>
                            </p>
                            <p><span class="title-s"><b>Phone:</b> </span>
                                <span>{{$detailsProfile->sodienthoai}}</span></p>
                            <p><span class="title-s"><b>Date of birth:</b> </span>
                                <span>{{$detailsProfile->ngaysinh}}</span></p>
                            <p><span class="title-s"><b>Address:</b> </span>
                                <span>{{$detailsProfile->diachi}}</span></p>
                            <p><span class="title-s"><b>Strength:</b> </span>
                                <span>{{$detailsProfile->diemmanh}}</span></p>
                            <p><span class="title-s"><b>Weakness:</b> </span>
                                <span>{{$detailsProfile->diemyeu}}</span></p>
                            <p><span class="title-s"><b>Favorite:</b> </span>
                                <span>{{$detailsProfile->sothich}}</span></p>
                            <p><span class="title-s"><b>Skills:</b> </span>
                                <span>{{$detailsProfile->kynang}}</span></p>
                            <p><span class="title-s"><b>Project:</b> </span>
                                <span>{{$detailsProfile->duan}}</span></p>
                            <p><span class="title-s"><b>Link facebook:</b> </span>
                                <span><a href="{{$detailsProfile->fb}}">{{$detailsProfile->fb}}</a></span>
                            </p>
                            <p><span class="title-s"><b>Link youtube:</b> </span>
                                <span><a
                                        href="{{$detailsProfile->youtube}}">{{$detailsProfile->youtube}}</a></span>
                            </p>
                            <p><span class="title-s"><b>Link twitter:</b> </span>
                                <span><a
                                        href="{{$detailsProfile->twitter}}">{{$detailsProfile->twitter}}</a></span>
                            </p>
                            <p><span class="title-s"><b>Link Github:</b> </span>
                                <span><a
                                        href="{{$detailsProfile->githhub}}">{{$detailsProfile->githhub}}</a></span>
                            </p>
                            <p><span class="title-s"><b>Link skype:</b> </span>
                                <span><a
                                        href="{{$detailsProfile->skype}}">{{$detailsProfile->skype}}</a></span>
                            </p>
                            <p><span class="title-s"><b>Link website:</b> </span>
                                <span><a
                                        href="{{$detailsProfile->website}}">{{$detailsProfile->website}}</a></span>
                            </p>
                            <p><span class="title-s"><b>Level:</b> </span>
                                <span>{{$detailsProfile->trinhdo}}</span></p>
                            <p><span class="title-s"><b>Specialize:</b> </span>
                                <span>{{$detailsProfile->chuyenmon}}</span></p>
                            @if($detailsProfile->gioitinh == 1)
                                <p><span class="title-s"><b>Gender:</b> </span>
                                    <span>Nam</span></p>
                            @endif
                            @if($detailsProfile->gioitinh == 0)
                                <p><span class="title-s"><b>Gender:</b> </span>
                                    <span>Nữ</span></p>
                            @endif
                            <p><span class="title-s"><b>Time work for a week:</b> </span>
                                <span>{{$detailsProfile->sogiolamviec}}</span></p>
                        </div>
                        <a style="margin-left: 15px"  href="/" class="btn btn-success"><i class="fas fa-home"></i>
                            Back to home
                        </a>
                    </div>
                </div>
            @endif
            <br>
        </div>
    @endif

    {{--Tài khoản đã cập nhật thông tin và chưa đăng nhập--}}
    @if($detailsProfile != null && Session::get('acc') == null)
        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-full">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    @if($detailsProfile->gioitinh == 1)
                                        <div class="about-img">
                                            <img style="width: 60%; margin-left: 60px"
                                                 src="/indexpage/img/male.png"
                                                 class="img-fluid rounded b-shadow-a" alt="">
                                        </div>
                                    @endif
                                    @if($detailsProfile->gioitinh == 0)
                                        <div class="about-img">
                                            <img style="width: 60%; margin-left: 60px"
                                                 src="/indexpage/img/female.png"
                                                 class="img-fluid rounded b-shadow-a" alt="">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <div class="about-info">
                                        <p><span class="title-s"><b>Name:</b> </span>
                                            <span>{{$acc->name}}</span></p>
                                        <p><span class="title-s"><b>Email:</b> </span>
                                            <span>{{$acc->email}}</span>
                                        </p>
                                        <p><span class="title-s"><b>Phone:</b> </span>
                                            <span>{{$detailsProfile->sodienthoai}}</span></p>
                                        <p><span class="title-s"><b>Date of birth:</b> </span>
                                            <span>{{$detailsProfile->ngaysinh}}</span></p>
                                        <p><span class="title-s"><b>Address:</b> </span>
                                            <span>{{$detailsProfile->diachi}}</span></p>
                                        <p><span class="title-s"><b>Strength:</b> </span>
                                            <span>{{$detailsProfile->diemmanh}}</span></p>
                                        <p><span class="title-s"><b>Weakness:</b> </span>
                                            <span>{{$detailsProfile->diemyeu}}</span></p>
                                        <p><span class="title-s"><b>Favorite:</b> </span>
                                            <span>{{$detailsProfile->sothich}}</span></p>
                                        <p><span class="title-s"><b>Skills:</b> </span>
                                            <span>{{$detailsProfile->kynang}}</span></p>
                                        <p><span class="title-s"><b>Project:</b> </span>
                                            <span>{{$detailsProfile->duan}}</span></p>
                                        <p><span class="title-s"><b>Link facebook:</b> </span>
                                            <span><a href="{{$detailsProfile->fb}}">{{$detailsProfile->fb}}</a></span>
                                        </p>
                                        <p><span class="title-s"><b>Link youtube:</b> </span>
                                            <span><a
                                                    href="{{$detailsProfile->youtube}}">{{$detailsProfile->youtube}}</a></span>
                                        </p>
                                        <p><span class="title-s"><b>Link twitter:</b> </span>
                                            <span><a
                                                    href="{{$detailsProfile->twitter}}">{{$detailsProfile->twitter}}</a></span>
                                        </p>
                                        <p><span class="title-s"><b>Link Github:</b> </span>
                                            <span><a
                                                    href="{{$detailsProfile->githhub}}">{{$detailsProfile->githhub}}</a></span>
                                        </p>
                                        <p><span class="title-s"><b>Link skype:</b> </span>
                                            <span><a
                                                    href="{{$detailsProfile->skype}}">{{$detailsProfile->skype}}</a></span>
                                        </p>
                                        <p><span class="title-s"><b>Link website:</b> </span>
                                            <span><a
                                                    href="{{$detailsProfile->website}}">{{$detailsProfile->website}}</a></span>
                                        </p>
                                        <p><span class="title-s"><b>Level:</b> </span>
                                            <span>{{$detailsProfile->trinhdo}}</span></p>
                                        <p><span class="title-s"><b>Specialize:</b> </span>
                                            <span>{{$detailsProfile->chuyenmon}}</span></p>
                                        @if($detailsProfile->gioitinh == 1)
                                            <p><span class="title-s"><b>Gender:</b> </span>
                                                <span>Nam</span></p>
                                        @endif
                                        @if($detailsProfile->gioitinh == 0)
                                            <p><span class="title-s"><b>Gender:</b> </span>
                                                <span>Nữ</span></p>
                                        @endif
                                        <p><span class="title-s"><b>Time work for a week:</b> </span>
                                            <span>{{$detailsProfile->sogiolamviec}}</span></p>
                                    </div>
                                    <a style="margin-left: 15px"  href="/" class="btn btn-success"><i class="fas fa-home"></i>
                                        Back to home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{--Tài khoản chưa cập nhật thông tin và đã đăng nhập--}}
    @if($detailsProfile == null && Session::get('acc') != null)
        @if(Session::get('acc')->username == $acc->username)
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                @csrf
                <form action="/profile/update_profile" method="post" role="form">
                    <legend>Update your infomation of account</legend>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Date:<b style="color: #AF2018">*</b><input class="form-control" type="text"
                                                                                  name="date" id="datepicker"
                                                                                  placeholder="MM/dd/YYYY"
                                                                                  required="required"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Phone number:<b style="color: #AF2018">*</b><input class="form-control"
                                                                                          name="phone"
                                                                                          type="text" id="phone"
                                                                                          required="required"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Address:<b style="color: #AF2018">*</b><input class="form-control" name="address"
                                                                                     type="text" id="address"
                                                                                     required="required"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your strength:<textarea name="diemmanh" id="diemmanh"
                                                               class="form-control" cols="30"
                                                               rows="2"></textarea></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your weakness:<textarea name="diemyeu" id="diemyeu"
                                                               class="form-control" cols="30"
                                                               rows="2"></textarea></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Level: <input type="text" name="trinhdo" class="form-control">
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Speciallize: <input type="text" name="chuyenmon" class="form-control" id=""
                                                           placeholder=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Time work for a week: <input type="text" name="sogiolamviec" class="form-control"
                                                                    id="" placeholder=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 radio">
                                    <p>Gender:<b style="color: #AF2018">*</b>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label>
                                            <input type="radio" name="gioitinh" value="1" checked="checked">
                                            Male
                                        </label>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label>
                                            <input type="radio" name="gioitinh" value="0">
                                            FeMale
                                        </label>
                                    </div>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your Skills:<b style="color: #AF2018">*</b><textarea name="kinang" id="kinang"
                                                                                            class="form-control"
                                                                                            cols="30"
                                                                                            required="required"
                                                                                            rows="2"></textarea></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your favorite:<textarea name="sothich" id="sothich"
                                                               class="form-control" cols="30"
                                                               rows="2"></textarea></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your project:<textarea name="duan" id="duan" class="form-control" cols="30"
                                                              rows="2"></textarea></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your Facebook: <input type="text" name="fb" class="form-control" id=""
                                                             placeholder=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your Youtube: <input type="text" name="youtube" class="form-control" id=""
                                                            placeholder=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your Twitter: <input type="text" name="twitter" class="form-control" id=""
                                                            placeholder=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your Github: <input type="text" name="git" class="form-control" id=""
                                                           placeholder="">
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your Skype: <input type="text" name="skype" class="form-control" id=""
                                                          placeholder=""></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Your website: <input type="text" name="website" class="form-control" id=""
                                                            placeholder=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update your information
                    </button>
                    <a style="margin-left: 15px"  href="/" class="btn btn-success"><i class="fas fa-home"></i>
                        Back to home
                    </a>
                    <br/>
                    <br/>
                    <br/>
                </form>
            </div>
        @endif
        @if(Session::get('acc')->username != $acc->username)
            <h1 style="color: blue"><b>This profile has not been updated by the user</b></h1>
            <a href="/">Quay về trang chủ</a>
        @endif
    @endif

    {{--Tài khoản chưa cập nhật thông tin và chưa đăng nhập--}}
    @if($detailsProfile == null && Session::get('acc') == null)
        <h1 style="color: blue"><b>This profile has not been updated by the user</b></h1>
        <a href="/">Quay về trang chủ</a>
    @endif

@endsection
