@php
    $listRecent = \App\Paste::orderby('code','desc')->take(5)->get();
@endphp

<div class="panel panel-danger">
    <div class="panel-heading"><b style="color: black">Recent Pastes</b></div>
    <div class="panel-body">
        @foreach($listRecent as $paste)
            <p><a href="/{{$paste->code}}">{{$paste->title}}</a></p>
        @endforeach
    </div>
</div>