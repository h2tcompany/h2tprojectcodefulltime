@extends('templates')
@section('content')
    {{--Tài khoản đã cập nhật thông tin và đã đăng nhập--}}
    @if($detailsProfile != null && Session::get('acc') != null)
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            @if(Session::get('acc')->username == $detailsProfile->detailsofaccount)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="about-img">
                                                <img style="width: 100%"
                                                     src="https://www.secret-source.eu/wp-content/uploads/2017/11/Laravel-logo.jpg"
                                                     class="img-fluid rounded b-shadow-a" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-7">
                                            <div class="about-info">
                                                <p><span class="title-s"><b>Name:</b> </span>
                                                    <span>{{$acc->name}}</span></p>
                                                <p><span class="title-s"><b>Profile:</b> </span>
                                                    <span>{{$detailsProfile->profile}}</span></p>
                                                <p><span class="title-s"><b>Email:</b> </span>
                                                    <span>{{$acc->email}}</span>
                                                </p>
                                                <p><span class="title-s"><b>Phone:</b> </span>
                                                    <span>{{$detailsProfile->phonenumber}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-mf">
                                        <p class="title-s">Skill</p>
                                        @if($detailsProfile->skillone != null)
                                            <span>{{$detailsProfile->skillone}}</span> <span
                                                class="pull-right">{{$detailsProfile->percentone}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width: {{$detailsProfile->percentone}};" aria-valuenow="85"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if($detailsProfile->skilltwo != null)
                                            <span>{{$detailsProfile->skilltwo}}</span> <span
                                                class="pull-right">{{$detailsProfile->percenttwo}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width: {{$detailsProfile->percenttwo}}" aria-valuenow="75"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if($detailsProfile->skillthree != null)
                                            <span>{{$detailsProfile->skillthree}}</span> <span
                                                class="pull-right">{{$detailsProfile->percentthree}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width: {{$detailsProfile->percentthree}}" aria-valuenow="50"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                        @if($detailsProfile->skillfour != null)
                                            <span>{{$detailsProfile->skillfour}}</span> <span
                                                class="pull-right">{{$detailsProfile->percentfour}}</span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                     style="width: {{$detailsProfile->percentfour}}" aria-valuenow="90"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-me pt-4 pt-md-0">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                <b>About me</b>
                                            </h5>
                                        </div>
                                        <p class="lead">
                                        <p>{{$detailsProfile->aboutme}}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @csrf
                    <form action="/profile/edit_profile" method="post">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <h2>Update your profile account</h2>
                                <hr/>
                                <input type="text" style="display: none" name="codeprofile" value="{{$detailsProfile->codeprofile}}">
                                <label for="phone">Phone number: </label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{$detailsProfile->phonenumber}}"
                                       title="Phone number"
                                       required="required"/>
                                <label for="profile">Profile: </label>
                                <input type="text" name="profile" id="profile" class="form-control"
                                       value="{{$detailsProfile->profile}}"
                                       title="Profile"
                                       required="required"/>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label for="skill1">What's skill one?: </label>
                                        <input type="text" name="skill1" id="skill1" class="form-control"
                                               value="{{$detailsProfile->skillone}}"
                                               title="skill1"
                                               required="required"/>
                                        <label for="skill2">What's skill two?: </label>
                                        <input type="text" name="skill2" id="skill2" class="form-control"
                                               value="{{$detailsProfile->skilltwo}}"
                                               title="skill2"
                                               required="required"/>
                                        <label for="skill3">What's skill three?: </label>
                                        <input type="text" name="skill3" id="skill3" class="form-control"
                                               value="{{$detailsProfile->skillthree}}"
                                               title="skill3"
                                               required="required"/>
                                        <label for="skill4">What's skill four?: </label>
                                        <input type="text" name="skill4" id="skill4" class="form-control"
                                               value="{{$detailsProfile->skillfour}}"
                                               title="skill4"
                                               required="required"/>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label for="pskill1">Percent of skill one?: </label>
                                        <input type="text" name="pskill1" id="pskill1" class="form-control"
                                               value="{{$detailsProfile->percentone}}"
                                               title="skill1"
                                               required="required"/>
                                        <label for="pskill2">Percent of skill two?: </label>
                                        <input type="text" name="pskill2" id="pskill2" class="form-control"
                                               value="{{$detailsProfile->percenttwo}}"
                                               title="skill2"
                                               required="required"/>
                                        <label for="pskill3">Percent of skill three?: </label>
                                        <input type="text" name="pskill3" id="pskill3" class="form-control"
                                               value="{{$detailsProfile->percentthree}}"
                                               title="skill3"
                                               required="required"/>
                                        <label for="pskill4">Percent of skill four?: </label>
                                        <input type="text" name="pskill4" id="pskill4" class="form-control"
                                               value="{{$detailsProfile->percentfour}}"
                                               title="skill4"
                                               required="required"/>
                                    </div>
                                </div>

                                <label for="about">About you: </label>
                                <textarea name="about" class="form-control" id="about" rows="5"
                                          required="required">{{$detailsProfile->aboutme}}</textarea>
                                <br/>
                                @if(Session::get('mess') != null)<p
                                    style="color: green">{{Session::get('mess')}}</p>@endif
                                <button type="submit" class="btn btn-primary">Edit your profile</button>
                                <br/>
                                <br/>
                                <br/>
                            </div>

                        </div>
                    </form>
                </div>
            @endif
            @if(Session::get('acc')->username != $detailsProfile->detailsofaccount)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box-shadow-full">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-5">
                                                <div class="about-img">
                                                    <img style="width: 100%"
                                                         src="https://www.secret-source.eu/wp-content/uploads/2017/11/Laravel-logo.jpg"
                                                         class="img-fluid rounded b-shadow-a" alt="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-7">
                                                <div class="about-info">
                                                    <p><span class="title-s"><b>Name:</b> </span>
                                                        <span>{{$acc->name}}</span></p>
                                                    <p><span class="title-s"><b>Profile:</b> </span>
                                                        <span>{{$detailsProfile->profile}}</span></p>
                                                    <p><span class="title-s"><b>Email:</b> </span>
                                                        <span>{{$acc->email}}</span>
                                                    </p>
                                                    <p><span class="title-s"><b>Phone:</b> </span>
                                                        <span>{{$detailsProfile->phonenumber}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="skill-mf">
                                            <p class="title-s">Skill</p>
                                            @if($detailsProfile->skillone != null)
                                                <span>{{$detailsProfile->skillone}}</span> <span
                                                    class="pull-right">{{$detailsProfile->percentone}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{$detailsProfile->percentone}};" aria-valuenow="85"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            @endif
                                            @if($detailsProfile->skilltwo != null)
                                                <span>{{$detailsProfile->skilltwo}}</span> <span
                                                    class="pull-right">{{$detailsProfile->percenttwo}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{$detailsProfile->percenttwo}}" aria-valuenow="75"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            @endif
                                            @if($detailsProfile->skillthree != null)
                                                <span>{{$detailsProfile->skillthree}}</span> <span
                                                    class="pull-right">{{$detailsProfile->percentthree}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{$detailsProfile->percentthree}}" aria-valuenow="50"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            @endif
                                            @if($detailsProfile->skillfour != null)
                                                <span>{{$detailsProfile->skillfour}}</span> <span
                                                    class="pull-right">{{$detailsProfile->percentfour}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{$detailsProfile->percentfour}}" aria-valuenow="90"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about-me pt-4 pt-md-0">
                                            <div class="title-box-2">
                                                <h5 class="title-left">
                                                    <b>About me</b>
                                                </h5>
                                            </div>
                                            <p class="lead">
                                            <p>{{$detailsProfile->aboutme}}</p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <div class="about-img">
                                        <img style="width: 100%"
                                             src="https://www.secret-source.eu/wp-content/uploads/2017/11/Laravel-logo.jpg"
                                             class="img-fluid rounded b-shadow-a" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <div class="about-info">
                                        <p><span class="title-s"><b>Name:</b> </span>
                                            <span>{{$acc->name}}</span></p>
                                        <p><span class="title-s"><b>Profile:</b> </span>
                                            <span>{{$detailsProfile->profile}}</span></p>
                                        <p><span class="title-s"><b>Email:</b> </span>
                                            <span>{{$acc->email}}</span>
                                        </p>
                                        <p><span class="title-s"><b>Phone:</b> </span>
                                            <span>{{$detailsProfile->phonenumber}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-mf">
                                <p class="title-s">Skill</p>
                                @if($detailsProfile->skillone != null)
                                    <span>{{$detailsProfile->skillone}}</span> <span
                                        class="pull-right">{{$detailsProfile->percentone}}</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                             style="width: {{$detailsProfile->percentone}};" aria-valuenow="85"
                                             aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                @endif
                                @if($detailsProfile->skilltwo != null)
                                    <span>{{$detailsProfile->skilltwo}}</span> <span
                                        class="pull-right">{{$detailsProfile->percenttwo}}</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                             style="width: {{$detailsProfile->percenttwo}}" aria-valuenow="75"
                                             aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                @endif
                                @if($detailsProfile->skillthree != null)
                                    <span>{{$detailsProfile->skillthree}}</span> <span
                                        class="pull-right">{{$detailsProfile->percentthree}}</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                             style="width: {{$detailsProfile->percentthree}}" aria-valuenow="50"
                                             aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                @endif
                                @if($detailsProfile->skillfour != null)
                                    <span>{{$detailsProfile->skillfour}}</span> <span
                                        class="pull-right">{{$detailsProfile->percentfour}}</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                             style="width: {{$detailsProfile->percentfour}}" aria-valuenow="90"
                                             aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-me pt-4 pt-md-0">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        <b>About me</b>
                                    </h5>
                                </div>
                                <p class="lead">
                                <p>{{$detailsProfile->aboutme}}</p>
                                </p>
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
            @csrf
            <div class="row">
                <form action="/profile/update_profile" method="post" role="form">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <h2>Update your profile account</h2>
                            <hr/>
                            <label for="phone">Phone number: </label>
                            <input type="text" name="phone" id="phone" class="form-control" value=""
                                   title="Phone number"
                                   required="required"/>
                            <label for="profile">Profile: </label>
                            <input type="text" name="profile" id="profile" class="form-control" value=""
                                   title="Profile"
                                   required="required" placeholder="Example: fullstack developer"/>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <label for="skill1">What's skill one?: </label>
                                    <input type="text" name="skill1" id="skill1" class="form-control" value=""
                                           title="skill1"
                                           required="required" placeholder="Example: HTML"/>
                                    <label for="skill2">What's skill two?: </label>
                                    <input type="text" name="skill2" id="skill2" class="form-control" value=""
                                           title="skill2"
                                           required="required" placeholder="Example: JAVA"/>
                                    <label for="skill3">What's skill three?: </label>
                                    <input type="text" name="skill3" id="skill3" class="form-control" value=""
                                           title="skill3"
                                           required="required" placeholder="Example: JAVASCRIPT"/>
                                    <label for="skill4">What's skill four?: </label>
                                    <input type="text" name="skill4" id="skill4" class="form-control" value=""
                                           title="skill4"
                                           required="required" placeholder="Example: PYTHON"/>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <label for="pskill1">Percent of skill one?: </label>
                                    <input type="text" name="pskill1" id="pskill1" class="form-control" value=""
                                           title="skill1"
                                           required="required" placeholder="Example: 80%"/>
                                    <label for="pskill2">Percent of skill two?: </label>
                                    <input type="text" name="pskill2" id="pskill2" class="form-control" value=""
                                           title="skill2"
                                           required="required" placeholder="Example: 75%"/>
                                    <label for="pskill3">Percent of skill three?: </label>
                                    <input type="text" name="pskill3" id="pskill3" class="form-control" value=""
                                           title="skill3"
                                           required="required" placeholder="Example: 90%"/>
                                    <label for="pskill4">Percent of skill four?: </label>
                                    <input type="text" name="pskill4" id="pskill4" class="form-control" value=""
                                           title="skill4"
                                           required="required" placeholder="Example: 85%"/>
                                </div>
                            </div>

                            <label for="about">About you: </label>
                            <textarea name="about" class="form-control" id="about" rows="5"
                                      required="required"></textarea>
                            <br/>
                            @if(Session::get('mess') != null)<p
                                style="color: green">{{Session::get('mess')}}</p>@endif
                            @if(Session::get('acc') != null)
                                <button type="submit" class="btn btn-primary">Update your profile</button>@endif
                            <br/>
                            <br/>
                            <br/>
                        </div>

                    </div>
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
