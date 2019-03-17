@extends("templates")

@section('content')

    <div class="col-sm-9">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Best score</th>
                <th>Team</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($exercises as $exercise)

                <tr>
                    <td><a href="/exercise/{{$exercise->code}}">{{$exercise->name}}</a></td>
                    <td>{{$exercise->bestscore}}</td>
                    <td><a href="#">{{$exercise->getTeam->name}}</a></td>
                    <td><a class="btn btn-success" href="/exercises/submit/{{$exercise->code}}">Submit now</a></td>
                </tr>

            @endforeach
            </tbody>
        </table>
        {!! $exercises->links()!!}
    </div>
    <div class="col-sm-3">
        @include('topcoder')
        @include('exercise.newexercise')
        @include('exercise.lastsubmission')
        @include('activity')
    </div>

@endsection