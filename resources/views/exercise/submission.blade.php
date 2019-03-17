@extends("templates")

@section('content')

    <div class="col-sm-9">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Exercise code</th>
                <th>Time submit</th>
                <th>Score</th>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ds as $submission)

                <tr>
                    <td><a href="/exercise/{{$submission->exercisecode}}">{{$submission->exercisecode}}</a></td>
                    <td>{{$submission->timesubmit}}</td>
                    <td>{{$submission->score}}</td>
                    <td>{{$submission->username}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
        {!! $ds->links()!!}
    </div>


@endsection