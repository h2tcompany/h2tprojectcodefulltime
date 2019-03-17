@php
    $listAcc1 = \App\Account::orderby('score','desc')->where('role','<>',0)->take(5)->get();
    $listAcc2 = \App\Account::orderby('scoreexercise','desc')->where('role','<>',0)->take(5)->get();
@endphp

<div class="panel panel-danger">
    <div class="panel-heading"><b style="color: black">Top high score</b></div>
    <div class="panel-body">
        @foreach($listAcc1 as $acc)
            <p><a href="/profile/{{$acc->username}}">{{$acc->username}}</a><span class="badge" style="float: right">{{$acc->score}}</span></p>
        @endforeach
    </div>
    <div class="panel-footer">
        <a href="/" class="btn btn-success">Go to examination</a>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading"><b style="color: black">Top coder</b></div>
    <div class="panel-body">
        @foreach($listAcc2 as $acc)
            <p><a href="/profile/{{$acc->username}}">{{$acc->username}}</a><span class="badge" style="float: right">{{$acc->score}}</span></p>
        @endforeach
    </div>
    <div class="panel-footer">
        <a href="/" class="btn btn-success">Go to submission</a>
    </div>
</div>
