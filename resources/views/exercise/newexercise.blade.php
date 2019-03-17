@php
    $listExercise = \App\Exercise::orderby('code','desc')->take(5)->get();
@endphp

<div class="panel panel-danger">
    <div class="panel-heading"><b style="color: black">New exercise</b></div>
    <div class="panel-body">
        @foreach($listExercise as $exercise)
            <p><a href="/exercise/{{$exercise->code}}">{{$exercise->code}}</a><span style="float: right"><a
                            href="#">{{$exercise->team}}</a></span></p>
        @endforeach
    </div>
</div>