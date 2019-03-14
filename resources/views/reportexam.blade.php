@php
    $acc = Session::get('acc');
    $rpExam = \App\ReportExam::where('code',$reportexam)->first();
@endphp
<div class="col-sm-8">
    <div class="panel panel-primary">
        <div class="panel-heading"><b style="color: black">Your result</b></div>
        <div class="panel-body">
            @if($acc!= null)
                <p><b>Username</b>: {{$acc->username}}</p>
            @endif
            <p><b>Score</b>: {{$rpExam->score}}</p>
            <p><b>Times learn in group [{{$rpExam->team}}] and team [{{$rpExam->getLang->name}}]</b>: {{$rpExam->times}}</p>
            <p><b>Time</b>: {{$rpExam->time}}</p>
            <p><b>Language of question</b>: {{$rpExam->getLang->name}}</p>
            <p><b>Team of question</b>: {{$rpExam->team}}</p>
        </div>
    </div>
</div>
<div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading"><b style="color: black">List question answered</b></div>
        <div class="panel-body">
            @foreach(explode(',', $rpExam->listquestion) as $str)
                <p><a href="#">{{trim($str)}}</a></p>
            @endforeach
        </div>
    </div>
</div>