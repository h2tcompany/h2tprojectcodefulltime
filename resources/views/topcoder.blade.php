@php
    $listAcc2 = \App\Account::orderby('scoreexercise','desc')->where('role','<>',0)->take(5)->get();
@endphp

<div class="panel panel-danger">
    <div class="panel-heading"><b style="color: black">Top coder</b></div>
    <div class="panel-body">
        @foreach($listAcc2 as $acc)
            <p><a href="/profile/{{$acc->username}}">{{$acc->username}}</a><span class="badge" style="float: right">{{$acc->score}}</span></p>
        @endforeach
    </div>
    <div class="panel-footer">
        <a href="/exercises/all" class="btn btn-success">Go to exercise</a>
    </div>
</div>
