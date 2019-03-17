@php
    $listSubmission= \App\Submission::orderby('code','desc')->take(10)->get();
@endphp
<div class="panel panel-danger">
    <div class="panel-heading"><b style="color: black">Latest submission</b></div>
    <div class="panel-body">
        @foreach($listSubmission as $submission)
            <p><a href="/exercise/{{$submission->codeexercise}}">{{$submission->codeexercise}}</a>
                <a href="/exercise/{{$submission->username}}">{{$submission->username}}</a>
                <span class="badge" style="float: right">{{$submission->score}}</span></p>
        @endforeach
    </div>

</div>
