@php
    $listAcc = \App\Account::orderby('score','asc')->where('role','<>',0)->take(5)->get();
@endphp

<div class="panel panel-danger">
    <div class="panel-heading"><b style="color: black">Top high score</b></div>
    <div class="panel-body">
        @foreach($listAcc as $acc)
            <p><a href="#">{{$acc->username}}</a><span class="badge" style="float: right">{{$acc->score}}</span></p>
        @endforeach
    </div>
</div>