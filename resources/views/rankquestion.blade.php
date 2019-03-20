@extends("templates")

@section('content')

    <div class="col-sm-9">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Team</th>
                <th>Score</th>
            </tr>
            </thead>
            <tbody>
            @php
                    $i = 0;
                    @endphp
            @foreach($listAcc2 as $acc)
                @php
                    $i++;
                @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td><a href="/profile/{{$acc->username}}">{{$acc->name}}</a></td>
                    <td><a href="/team/{{$acc->teamleader}}">{{$acc->teamleader}}</a></td>
                    <td>{{$acc->score}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
        {!! $listAcc2->links()!!}
    </div>
    <div class="col-sm-3">
        @include('topcoder')
        @include('exercise.newexercise')
        @include('exercise.lastsubmission')
        @include('activity')
    </div>

@endsection