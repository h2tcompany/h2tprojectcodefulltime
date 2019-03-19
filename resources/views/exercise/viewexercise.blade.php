@extends('templates')
@php
    $acc = Session::get('acc');
@endphp
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.0/showdown.min.js"></script>

    <script>
        $(document).ready(function () {
            var converter = new showdown.Converter();
            var a = $('#contenth-hide').html();
            $('#content').html(converter.makeHtml(a));


        });


    </script>
    <style>
        .CodeMirror {
            border: 1px solid black;
            font-size: 13px
        }

        .cm-header {
            font-family: arial;
        }

        .cm-header-1 {
            font-size: 150%;
        }

        .cm-header-2 {
            font-size: 130%;
        }

        .cm-header-3 {
            font-size: 120%;
        }

        .cm-header-4 {
            font-size: 110%;
        }

        .cm-header-5 {
            font-size: 100%;
        }

        .cm-header-6 {
            font-size: 90%;
        }

        .cm-strong {
            font-size: 140%;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
        }
    </style>
    <div class="col-sm-9">
        <h1>{{$exercise->name}} | {{$exercise->code}}</h1>
        <div id="content"></div>
        <div id="contenth-hide" style="display: none">{{$exercise->question}}</div>
        <h3><span class="glyphicon glyphicon-calendar"></span> Time limit: {{$exercise->timelimit}} seconds</h3>
        <h3>Best core: {{$exercise->bestscore}}</h3><br>
        <a class="btn btn-primary" href="/exercises/submit/{{$exercise->code}}" style="color:white;"><span class="glyphicon glyphicon-send"></span> Submit now</a>
    </div>
    <div class="col-sm-3">
        @include('exercise.lastsubmission')
        @include('activity')
        @include('toprank')
    </div>


@endsection