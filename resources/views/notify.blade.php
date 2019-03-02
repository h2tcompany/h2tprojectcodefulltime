@extends('templates')
@section('content')

    <div class="col-sm-9">
        <h1 style="color: blue; font-family:monospace; font-size: 15px ">{{$message}}</h1>
    </div>
    <div class="col-sm-9">
        @include('activity')
    </div>
@endsection
