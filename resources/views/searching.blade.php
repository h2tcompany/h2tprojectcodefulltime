@extends('templates')
@section('content')

    <div class="col-sm-9">
        @foreach($total as $item)
            @if($item instanceof \App\Paste)
                <h1><a href="/{{$item->code}}">{{$item->title}}</a></h1>
                <p>Author: {{$item->username}} | Time: {{$item->time}} | Views: {{$item->views}}</p>
                <hr>
            @endif

            @if($item instanceof \App\Exercise)
                <h1><a href="/exercise/{{$item->code}}">{{$item->name}}</a></h1>
                <hr>
            @endif

            @if($item instanceof \App\Question)
                <h1><a href="/{{$item->code}}">{{substr($item->ques,0,15)}}</a></h1>
                <hr>
            @endif

        @endforeach

    </div>
    <div class="col-sm-3">
        @include('recentpaste')
        @include('activity')
        @include('rank')
        @include('searchingg')

    </div>
@endsection