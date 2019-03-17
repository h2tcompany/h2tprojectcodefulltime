@extends('templates')
@section('content')

    <div class="col-sm-9">
        @foreach($pastes as $paste)
            <h1><a href="/{{$paste->code}}">{{$paste->title}}</a></h1>
            <p>Author: {{$paste->username}} | Time: {{$paste->time}} | Views: {{$paste->views}}</p>
            <hr>
        @endforeach
        {!! $pastes->links()!!}
    </div>
    <div class="col-sm-3">
        @include('recentpaste')
        @include('activity')
        @include('toprank')
        @include('searchingg')

    </div>
@endsection
