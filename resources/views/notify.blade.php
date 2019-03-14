@extends('templates')
@section('content')

    <div class="col-sm-9">
        <div class="alert alert-danger">
            <h1 style="color: black; font-family:monospace; font-size: 15px ">{{$message}}</h1>
        </div>
        <div class="row">
            @if(isset($reportexam))
                @include('reportexam')
            @endif
        </div>
        <div class="row">
            <div align="center">
                <a href="/" class="btn btn-lg btn-primary">Go to home</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        @include('activity')
    </div>
@endsection
