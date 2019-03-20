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
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            @if(Session::get('acc')->username == $detailsProfile->username)
                <div class="row">
                    <div class="col-sm-6 col-md-2">
                        @if($detailsProfile->gioitinh == 1)
                            <div class="about-img">
                                <img style="width: 100%"
                                     src="/indexpage/img/male.png"
                                     class="img-fluid rounded b-shadow-a" alt="avatar">
                            </div>
                        @endif
                        @if($detailsProfile->gioitinh == 0)
                            <div class="about-img">
                                <img style="width: 100%"
                                     src="/indexpage/img/female.png"
                                     class="img-fluid rounded b-shadow-a" alt="avatar">
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-10">
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
                        <a type="button" onclick="showProfile()" class="btn btn-link"><i class="far fa-eye"></i> Goto edit form</a>
                        <a href="/" class="btn btn-link"><i class="fas fa-home"></i>
                            Back to home
                        </a>
                    </div>
                </div>

               <div style="display: none" id="profile">
                   <hr/>
                   @csrf
                   <form action="/profile/edit_profile" method="post" role="form">
                       <input style="display: none" type="text" name="code" value="{{$detailsProfile->codeprofile}}">
                       <legend>Edit your profile of account</legend>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <p>Date:<b style="color: #AF2018">*</b><input class="form-control"
                                                                             type="text"
                                                                             name="date"
                                                                             id="datepicker"
                                                                             value="{{$detailsProfile->ngaysinh}}"
                                                                             requigreen="requigreen">
                               </p>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <p>Phone number:<b style="color: #AF2018">*</b><input
                                       class="form-control" name="phone"
                                       type="text" id="phone"
                                       value="{{$detailsProfile->sodienthoai}}"
                                       requigreen="requigreen"></p>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <p>Address:<b style="color: #AF2018">*</b><input
                                       class="form-control" name="address"
                                       type="text" id="address"
                                       value="{{$detailsProfile->diachi}}"
                                       requigreen="requigreen"></p>
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
                               <p>Level: <input type="text" name="trinhdo" class="form-control"
                                                value="{{$detailsProfile->trinhdo}}">
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
                                       requigreen="requigreen"
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
                       @if(Session::get('mess') != null)<p style="color: green">{{Session::get('mess')}}</p>@endif
                       <button style="margin-left: 250px" type="submit" class="btn btn-primary"><i class="fas fa-edit"></i>
                           Edit your information
                       </button>
                       <a onclick="hideProfile()" class="btn btn-link"><i class="far fa-eye-slash"></i>
                           Hide edit form
                       </a>
                   </form>
                   <br/>
                   <br/>
               </div>
        </div>
    @endif
    @if(Session::get('acc')->username != $detailsProfile->username)
        <div class="row">
            <div class="col-sm-6 col-md-2">
                @if($detailsProfile->gioitinh == 1)
                    <div class="about-img">
                        <img style="width: 100%"
                             src="/indexpage/img/male.png"
                             class="img-fluid rounded b-shadow-a" alt="avatar">
                    </div>
                @endif
                @if($detailsProfile->gioitinh == 0)
                    <div class="about-img">
                        <img style="width: 100%"
                             src="/indexpage/img/female.png"
                             class="img-fluid rounded b-shadow-a" alt="avatar">
                    </div>
                @endif
            </div>
            <div class="col-sm-6 col-md-10">
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
                <a href="/" class="btn btn-success"><i class="fas fa-home"></i>
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
                                <div class="col-sm-6 col-md-3">
                                    @if($detailsProfile->gioitinh == 1)
                                        <div class="about-img">
                                            <img style="width: 100%"
                                                 src="/indexpage/img/male.png"
                                                 class="img-fluid rounded b-shadow-a" alt="">
                                        </div>
                                    @endif
                                    @if($detailsProfile->gioitinh == 0)
                                        <div class="about-img">
                                            <img style="width: 100%"
                                                 src="/indexpage/img/female.png"
                                                 class="img-fluid rounded b-shadow-a" alt="">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 col-md-9">
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
                                    <a style="margin-left: 15px" href="/" class="btn btn-success"><i
                                            class="fas fa-home"></i>
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
                                                                                  requigreen="requigreen"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Phone number:<b style="color: #AF2018">*</b><input class="form-control"
                                                                                          name="phone"
                                                                                          type="text" id="phone"
                                                                                          requigreen="requigreen"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <p>Address:<b style="color: #AF2018">*</b><input class="form-control" name="address"
                                                                                     type="text" id="address"
                                                                                     requigreen="requigreen"></p>
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
                                                                                            requigreen="requigreen"
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
                    <a style="margin-left: 15px" href="/" class="btn btn-success"><i class="fas fa-home"></i>
                        Back to home
                    </a>
                    <br/>
                    <br/>
                    <br/>
                </form>
            </div>
        @endif
        @if(Session::get('acc')->username != $acc->username)
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                @csrf
                <form action="">
                    <legend>Information of this account has not been updated</legend>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input style="color: green" type="text" id="Name" class="form-control"
                                           readonly="readonly" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input style="color: green" type="text" id="Email" class="form-control"
                                           readonly="readonly" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-sm-3 col-form-label">Date of birth</label>
                                <div class="col-sm-9">
                                    <input style="color: green" type="text" id="date" class="form-control"
                                           readonly="readonly" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">Phone number</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="phone"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="address"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="strength" class="col-sm-3 col-form-label">Strength</label>
                                <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="strength"
                                          class="form-control">This infomation has not been updated by user</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Weakness" class="col-sm-3 col-form-label">Weakness</label>
                                <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="Weakness"
                                          class="form-control">This infomation has not been updated by user</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="specialize" class="col-sm-3 col-form-label">Specialize</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="specialize"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Level" class="col-sm-3 col-form-label">Level</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="Level"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Gender" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <input name="gender" type="radio" id="Gender" readonly="readonly" value="0">Male
                                    <input name="gender" type="radio" id="Gender1" readonly="readonly" value="0">Female
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group row">
                                <label for="skill" class="col-sm-3 col-form-label">Skill</label>
                                <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="skill"
                                          class="form-control">This infomation has not been updated by user</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Favorite" class="col-sm-3 col-form-label">Favorite</label>
                                <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="Favorite"
                                          class="form-control">This infomation has not been updated by user</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Project" class="col-sm-3 col-form-label">Project</label>
                                <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="Project"
                                          class="form-control">This infomation has not been updated by user</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Facebook" class="col-sm-3 col-form-label">Facebook</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="Facebook"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Youtube" class="col-sm-3 col-form-label">Youtube</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="Youtube"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Github" class="col-sm-3 col-form-label">Github</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="Github"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Skype" class="col-sm-3 col-form-label">Skype</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="Skype"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Twitter" class="col-sm-3 col-form-label">Twitter</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="Twitter"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Website" class="col-sm-3 col-form-label">Website</label>
                                <div class="col-sm-9">
                                    <input style="color: green" readonly="readonly" type="text" id="Website"
                                           class="form-control" value="This infomation has not been updated by user"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <a style="margin-left: 350px" href="/" class="btn btn-success"><i class="fas fa-home"></i>
                        Back to home
                    </a>
                    <br/>
                    <br/>
                    <br/>
                </form>
            </div>
        @endif
    @endif

    {{--Tài khoản chưa cập nhật thông tin và chưa đăng nhập--}}
    @if($detailsProfile == null && Session::get('acc') == null)
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            @csrf
            <form action="">
                <legend>Information of this account has not been updated</legend>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input style="color: green" type="text" id="Name" class="form-control"
                                       readonly="readonly" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input style="color: green" type="text" id="Email" class="form-control"
                                       readonly="readonly" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label">Date of birth</label>
                            <div class="col-sm-9">
                                <input style="color: green" type="text" id="date" class="form-control"
                                       readonly="readonly" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone number</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="phone"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="address"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="strength" class="col-sm-3 col-form-label">Strength</label>
                            <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="strength"
                                          class="form-control">This infomation has not been updated by user</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Weakness" class="col-sm-3 col-form-label">Weakness</label>
                            <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="Weakness"
                                          class="form-control">This infomation has not been updated by user</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="specialize" class="col-sm-3 col-form-label">Specialize</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="specialize"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Level" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="Level"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Gender" class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <input name="gender" type="radio" id="Gender" readonly="readonly" value="0">Male
                                <input name="gender" type="radio" id="Gender1" readonly="readonly" value="0">Female
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group row">
                            <label for="skill" class="col-sm-3 col-form-label">Skill</label>
                            <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="skill"
                                          class="form-control">This infomation has not been updated by user</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Favorite" class="col-sm-3 col-form-label">Favorite</label>
                            <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="Favorite"
                                          class="form-control">This infomation has not been updated by user</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Project" class="col-sm-3 col-form-label">Project</label>
                            <div class="col-sm-9">
                                <textarea style="color: green" readonly="readonly" type="text" id="Project"
                                          class="form-control">This infomation has not been updated by user</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Facebook" class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="Facebook"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Youtube" class="col-sm-3 col-form-label">Youtube</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="Youtube"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Github" class="col-sm-3 col-form-label">Github</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="Github"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Skype" class="col-sm-3 col-form-label">Skype</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="Skype"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Twitter" class="col-sm-3 col-form-label">Twitter</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="Twitter"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Website" class="col-sm-3 col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input style="color: green" readonly="readonly" type="text" id="Website"
                                       class="form-control" value="This infomation has not been updated by user"/>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <a style="margin-left: 350px" href="/" class="btn btn-success"><i class="fas fa-home"></i>
                    Back to home
                </a>
                <br/>
                <br/>
                <br/>
            </form>
        </div>
    @endif
    <script>
        function showProfile() {
            var profile = document.getElementById('profile');
            profile.style.display = 'block';
        }
        function hideProfile() {
            var profile = document.getElementById('profile');
            profile.style.display = 'none';
        }
    </script>
@endsection
